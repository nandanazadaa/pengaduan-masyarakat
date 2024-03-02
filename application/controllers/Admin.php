<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{


    public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('M_kategori');
	}

    public function index()
    {
        $data['bar_graph'] = $this->M_pengaduan->card_admin();

        $data['title'] = 'Admin Dashboard';
        $data['user'] = $this->db->get_where('petugas', ['username' => $this->session->userdata('username')])->row_array();

        $this->load->view('templates/admin_header', $data);
        $this->load->view('templates/admin_topbar', $data);
        $this->load->view('templates/admin_sidebar', $data);
        $this->load->view('Dashboard/Admin/admin_dashboard', $data);
        $this->load->view('templates/admin_footer', $data);
    }

    public function admin_kategori()
    {
        $data['title'] = 'Admin Kategori';
        $data['user'] = $this->db->get_where('petugas', ['username' => $this->session->userdata('username')])->row_array();
        $data['kategori'] = $this->db->get('kategori')->result_array();
        $data['joinkategori'] = $this->M_kategori->joinkategori()->result_array();

        $this->load->model('M_kategori');
        $data['sub_kategori'] = $this->db->get('sub_kategori')->result_array();
        $this->load->model('M_kategori');

        $this->load->view('templates/admin_header', $data);
        $this->load->view('templates/admin_topbar', $data);
        $this->load->view('templates/admin_sidebar', $data);
        $this->load->view('Dashboard/Admin/admin_kategori', $data);
        $this->load->view('templates/admin_footer', $data);
    }
    

    public function add_admin_kategori()
    {
        $data = [
            'kategori' => $this->input->post('kategori')
        ];

        $this->M_kategori->add_kategori($data);
        $this->session->set_flashdata('kategori', '<div class="alert alert-success" role="alert" > Data berhasil ditambahkan!</div>');
        redirect('Admin/admin_kategori');
    }

    public function add_subkategori()
    {
        $kategori_data = $this->M_kategori->kategori2();

        $data = [
            'id_kategori' => $kategori_data['id_kategori'],
            'sub_kategori' => $this->input->post('subkategori')
        ];


        $this->M_subkategori->add_subkategori($data);
        $this->M_subkategori->join_subkategori()->result_array();
        $this->session->set_flashdata('subkategori', '<div class="alert alert-success" role="alert" > Data berhasil ditambahkan!</div>');
        redirect('Admin/admin_kategori');
    }

    public function delete_kategori($id)
    {
        $this->db->where('id_kategori', $id);
        $this->db->delete('kategori');
        $this->session->set_flashdata('del_kategori', '<div class="alert alert-success" role="alert"> Data Berhasil Dihapus! </div>');
        redirect('Admin/admin_kategori/');
    }


    public function delete_subkategori($id)
    {
        $this->db->where('id_subkategori', $id);
        $this->db->delete('sub_kategori');
        $this->session->set_flashdata('subkategori', '<div class="alert alert-success" role="alert"> Data Berhasil Dihapus </div>');
        redirect('Admin/admin_kategori/');
    }

    public function edit_kategori($edit_id)
    {
        $edit_id = $this->input->post('edit_id');
        $edit_kategori = $this->input->post('edit_kategori');

        $update = array(
            'kategori' =>  $edit_kategori,
        );
        $this->db->where('id_kategori', $edit_id);
        $this->db->update('kategori', $update);
        $this->session->set_flashdata('kategori', '<div class="alert alert-success" role="alert" > Data berhasil diupdate!</div>');
        redirect('Admin/admin_kategori');
    }

    public function edit_subkategori($id)
    {
        $data = [
            'id_kategori' => $this->input->post('kategori'),
            'sub_kategori' => $this->input->post('sub_kategori')
        ];

        $this->M_subkategori->join_editsubkategori($id, $data);
        $this->session->set_flashdata('subkategori', '<div class="alert alert-success" role="alert"> Data berhasil diupdate! </div>');
        redirect('Admin/admin_kategori');
    }

    public function admin_detail()
    {
        $data['title'] = 'Admin Dashboard';
        $data['user'] = $this->db->get_where('petugas', ['username' => $this->session->userdata('username')])->row_array();
        // $data['pengaduanaje'] = $this->db->get('pengaduan')->result_array();
        $data['pengaduan'] = $this->db->get('pengaduan')->result_array();
        $data['kategori'] = $this->db->get('kategori')->result_array();
        $data['pengaduanaapa'] = $this->M_pengaduan->join1()->result_array();
        $data['sub_kategori']=$this->db->get('sub_kategori')->result_array();
        // $data['get_user']=$this->M_pengaduan->get_user()->row_array();

        $this->load->view('templates/admin_header', $data);
        $this->load->view('templates/admin_topbar', $data);
        $this->load->view('templates/admin_sidebar', $data);
        $this->load->view('Dashboard/Admin/admin_detail_masyarakat', $data);
        $this->load->view('templates/admin_footer', $data);
    }

    public function detail_pengaduan($id)
    {
        $data['title'] = 'Admin Dashboard';
        $data['joinpengaduan2'] = $this->M_pengaduan->join_pengaduan2($id)->result_array();
        $data['tanggapan'] = $this->M_pengaduan->tanggapan($id)->result_array();

        $this->load->view('templates/admin_header', $data);
        $this->load->view('templates/admin_topbar', $data);
        $this->load->view('templates/admin_sidebar', $data);
        $this->load->view('Dashboard/Admin/admin_detail_pengaduan', $data);
        $this->load->view('templates/admin_footer', $data);
    }

    public function tindakan_pengaduan($id)
    {
        $data['user'] = $this->db->get_where('petugas', ['username' => $this->session->userdata('username')])->row_array();

        $data['pengaduan'] = $this->M_pengaduan->joinpengaduan2($id)->result_array();
        $data['tanggapan'] = $this->M_pengaduan->add_pengaduan($id)->result_array();
        // $data['get_user']=$this->M_pengaduan->get_user($id)->row_array();

        $this->load->view('templates/admin_header', $data);
        $this->load->view('templates/admin_sidebar', $data);
        $this->load->view('templates/admin_topbar', $data);
        $this->load->view('Dashboard/Admin/admin_tanggapan', $data);
        $this->load->view('templates/admin_footer', $data);
    }

    public function add_tindakanpengaduan($id)
    {
        $data = [
            'id_pengaduan' => $id,
            'tgl_tanggapan' => date('Y-m-d'),
            'tanggapan' => $this->input->post('tanggapan'),
            'nama_petugas' => $this->session->userdata('nama_petugas'),
        ];

        $this->M_pengaduan->addtindakan($data);

        $update = [
            'status' => $this->input->post('status'),
        ];

        $this->M_pengaduan->addtindakan2($update, $id);
        $this->session->set_flashdata('tindakan', '<div class="alert alert-success" role="alert"> Data berhasil di tambahkan </div>');
        redirect('Admin/admin_detail');
    }



    // Admin Petugas

    public function admin_petugas()
    {
        $data['title'] = 'Admin Petugas';
        $data['user'] = $this->db->get_where('petugas', ['username' => $this->session->userdata('username')])->row_array();
        $data['sidebar'] = $this->db->get('masyarakat')->result_array();
        $data['petugas'] = $this->db->get('petugas')->result_array();

        $this->load->view('templates/admin_header', $data);
        $this->load->view('templates/admin_topbar', $data);
        $this->load->view('templates/admin_sidebar', $data);
        $this->load->view('Dashboard/Admin/admin_petugas', $data);
        $this->load->view('templates/admin_footer', $data);
    }

    public function add_admin_petugas()
    {
        $data = [
            'username' => htmlspecialchars($this->input->post('username', true)),
            'nama_petugas' => htmlspecialchars($this->input->post('nama', true)),
            'level' => htmlspecialchars($this->input->post('level', true)),
            'no_telp' => htmlspecialchars($this->input->post('no_telp', true)),
            'password' => password_hash(
                $this->input->post('password1'),
                PASSWORD_DEFAULT
            ),
            'is_active' => 1,
            'level' => 3,
        ];
        $this->db->insert('petugas', $data);
        redirect('Admin/admin_petugas');
    }

    public function add_petugas_register()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'trim|required');
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');
        $this->form_validation->set_rules('no_telp', 'No_Telp', 'trim|required');
        $this->form_validation->set_rules('level', 'Level', 'trim|required');

        $data = [
            'nama_petugas' => htmlspecialchars($this->input->post('nama')),
            'username' => htmlspecialchars($this->input->post('username')),
            'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            'no_telp' => htmlspecialchars($this->input->post('no_telp')),
            'level' => htmlspecialchars($this->input->post('level'))
        ];

        $this->M_admin->tambah_petugas($data);
        $this->session->set_flashdata('petugas', '<div class="alert alert-success" role="alert"> Data berhasil ditambahkan </div>');
        redirect('Admin/admin_petugas');
    }
    
    public function edit_petugas($id)
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');
        $this->form_validation->set_rules('no_telp', 'No_telp', 'required|trim');
        $this->form_validation->set_rules('level', 'Level', 'required|trim');

        $data = [
            'nama_petugas' => htmlspecialchars($this->input->post('nama')),
            'username' => htmlspecialchars($this->input->post('username')),
            'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            'no_telp' => htmlspecialchars($this->input->post('no_telp')),
            'level' => htmlspecialchars($this->input->post('level'))
        ];

        $this->M_admin->edit_petugas($data, $id);
        $this->session->set_flashdata('petugas', '<div class="alert alert-success" role="alert"> Data berhasil Diperbarui </div>');
        redirect('Admin/admin_petugas');
    }

    public function ban_petugas($id)
    {
        $data = [
            'level' => 'ban'
        ];

        $this->M_admin->ban_petugas($id, $data);
        $this->session->set_flashdata('petugas', '<div class="alert alert-success" role="alert"> User berhasil diban </div>');
        redirect('Admin/admin_petugas');
    }

    public function delete_petugas($id)
    {
        $this->M_admin->delete_petugas($id);
        $this->session->set_flashdata('petugas', '<div class="alert alert-success" role="alert"> Data berhasil dihapus </div>');
        redirect('Admin/admin_petugas');
    }
    


    // Admin Masyarakat
    public function admin_masyarakat()
    {
        $data['title'] = 'Admin Petugas';
        $data['user'] = $this->db->get_where('petugas', ['username' => $this->session->userdata('username')])->row_array();
        $data['masyarakat'] = $this->db->get('masyarakat')->result_array();
        // $data['get_user']=$this->M_pengaduan->get_user()->row_array();


        $this->load->view('templates/admin_header', $data);
        $this->load->view('templates/admin_topbar', $data);
        $this->load->view('templates/admin_sidebar', $data);
        $this->load->view('Dashboard/Admin/admin_masyarakat', $data);
        $this->load->view('templates/admin_footer', $data);
    }

    public function edit_masyarakat($id)
    {
        {
            $data = [
                'nik' => $this->input->post('nik'),
                'nama' => $this->input->post('nama'),
                'username' => $this->input->post('username'),
                'no_telp' => $this->input->post('no_telp'),
                'active' => 'active',
            ];
    
            $this->M_masyarakat->edit_masyarakat($data, $id);
            $this->session->set_flashdata('masyarakat', '<div class="alert alert-success" role="alert"> Data berhasil diupdate! </div>');
            redirect('Admin/admin_masyarakat');
        }
    }

    public function delete_masyarakat($id)
    {
        $this->M_masyarakat->delete_masyarakat($id);
        $this->session->set_flashdata('masyarakat', '<div class="alert alert-success" role="alert"> User berhasil dihapus! </div>');
        redirect('Admin/admin_masyarakat');
    }

    public function ban_masyarakat($id)
    {
        $data = [
            'active' => 'suspend'
        ];

        $this->M_masyarakat->ban_masyarakat($id, $data);
        $this->session->set_flashdata('masyarakat', '<div class="alert alert-success" role="alert"> User berhasil dibanned! </div>');
        redirect('Admin/admin_masyarakat');
    }

    public function laporan_pdf()
    {
        $data['masyarakat'] = $this->M_pengaduan->masyarakat();
		$data['petugas'] = $this->M_pengaduan->tampilpetugas();
        $pengaduan = $this->M_pengaduan->joinpengaduandata2()->result_array();

        $data = array(
            "dataku" => array(
                "nama" => "Petani Kode",
                "url" => "http://petanikode.com"
            ),
            'pengaduan' => $pengaduan
        );
    
        $this->load->library('pdf');
        $data['title'] = 'Laporan Pengaduan';
        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->filename = "pengaduan-masyarakat.pdf";
        $this->pdf->load_view('Dashboard/Admin/admin_pdf', $data);    
    }

    public function admin_profile()
    {
        $data['user'] = $this->db->get_where('petugas', ['username' => $this->session->userdata('username')])->row_array();
        $data['title'] = 'Profile Anda';
        $profile['get'] = $this->M_admin->profile();
        

        $this->load->view('Templates/admin_header',$data);
        $this->load->view('Templates/admin_topbar',$data);
        $this->load->view('Templates/admin_sidebar',$data);
        $this->load->view('Dashboard/Admin/admin_profile',$profile);
        $this->load->view('Templates/admin_footer',$data);
    }
}
