<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
	}

	// Login Masyarakat
	public function index()
	{

		$this->form_validation->set_rules('email', 'Email', 'required|trim');
		$this->form_validation->set_rules('password', 'Password', 'required|trim');

		if ($this->form_validation->run() == false) {

			// Gagal validasi
			$data['title'] = 'Login Masyarkat';

			$this->load->view('Templates/auth_header', $data);
			$this->load->view('Auth/Masyarakat/login', $data);
			$this->load->view('Templates/auth_header', $data);
		} else {

			// Lolos validasi
			$this->login();
		}
	}

	public function login()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$user 	  = $this->M_masyarakat->login($username);

		$user = $this->db->get_where('Masyarakat', ['username' => $username])->row_array();

		if ($user) {
			if (password_verify($password, $user['password'])) {
				$data = [
					'username' => $user['username'],
					'nama'     => $user['nama'],
					'nik'      => $user['nik'],
				];

				$this->session->set_userdata($data);
				if ($user['active'] == 'active' ) {
					redirect('Masyarakat');
				} elseif ($user['active'] == 'suspend' ) {
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Akun Ke Banned !! </div>');
					redirect('Auth');
				}
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Wrong password! </div>');
				redirect('Auth');
			}
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Email is not register </div>');
			redirect('Auth');
		}
	}

	public function registrasi()
	{
		$this->form_validation->set_rules('nik', 'Nik', 'required|trim');
		$this->form_validation->set_rules('username', 'Username', 'required|trim');
		$this->form_validation->set_rules('nama', 'nama', 'required|trim');
		$this->form_validation->set_rules('no_telp', 'No_telp', 'required|trim');

		$this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
			'matches' => 'password dont match !',
			'min_length' => 'password too short !',
		]);
		$this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');



		if ($this->form_validation->run() == false) {

			$data['title'] = 'Register Hotel';
			$this->load->view('Templates/auth_header', $data);
			$this->load->view('Auth/Masyarakat/registrasi', $data);
			$this->load->view('Templates/auth_header', $data);
		} else {

			$data = [
				'nik' => htmlspecialchars($this->input->post('nik', true)),
				'username' => htmlspecialchars($this->input->post('username', true)),
				'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
				'nama' => htmlspecialchars($this->input->post('nama', true)),
				'no_telp' => htmlspecialchars($this->input->post('no_telp', true)),
			];

			$this->db->insert('masyarakat', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			Congratulation your account has been created !
		  	</div>');
			redirect('Auth');
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('role_id');

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Anda Berhasil Logout!</div>');
		redirect('Auth');
	}

	// login admin
	public function admin_login()
	{
		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');

		if ($this->form_validation->run() == false) {
			$data['title'] = 'Login Admin';
			$this->load->view('Templates/auth_header', $data);
			$this->load->view('Auth/Admin/admin_login');
			$this->load->view('Templates/auth_footer');
		} else {
			// validasinya success
			$this->_admin_login();
		}
	}


	public function _admin_login()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$user     = $this->M_admin->login_admin($username);

		$user = $this->db->get_where('petugas', ['username' => $username])->row_array();

		// var_dump($user);
		// jika usernya ada
		if ($user) {
			// jika usernya aktif
			if ($user['is_active'] == 1) {
				// cek password
				if (password_verify($password, $user['password'])) {
					$data = [
						'username' => $user['username'],
						'nama_petugas' => $user['nama_petugas'],
                        'level'    => $user['level']
					];

					// kondisi
					$this->session->set_userdata($data);
                if ($user['level'] == 'admin') {
                    redirect('Admin');
                } else if ($user['level'] == 'petugas') {
                    redirect('petugas');
                } else if ($user['level'] == 'ban') {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> user di banned! </div>');
                    redirect('auth/admin_login');
                }				
				
				} else {
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Wrong password! </div>');
					redirect('Auth/admin_login');
				}
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> This Email has not been activeted </div>');
				redirect('Auth/admin_login');
			}
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Email is not register </div>');
			redirect('Auth/admin_login');
		}
	}

	public function admin_register()
	{
	    $this->form_validation->set_rules('nama_petugas', 'Nama_petugas', 'trim|required');
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');
        $this->form_validation->set_rules('telp', 'Telp', 'trim|required');
        $this->form_validation->set_rules('level', 'Level', 'trim|required');

	    if ($this->form_validation->run() == false) {
	        $data['title'] = 'Registration';
	        $this->load->view('Templates/auth_header', $data);
	        $this->load->view('Auth/Admin/admin_register');
	        $this->load->view('Templates/auth_footer');
	    } else {
	        $data = [
				'nama_petugas' => htmlspecialchars($this->input->post('nama')),
				'username' => htmlspecialchars($this->input->post('username')),
				'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
				'no_telp' => htmlspecialchars($this->input->post('no_telp')),
				'level' => htmlspecialchars($this->input->post('level'))
			];

			$this->M_admin->tambah_petugas($data);
	        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
	       Congratulation! your account has been created. Please Login</div>');
	        redirect('Auth/admin_login');
	    }
	}

	public function admin_logout()
	{
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('role_id');

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Anda Berhasil Logout!</div>');
		redirect('Auth/admin_login');
	}
}
