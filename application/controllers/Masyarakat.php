    <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Masyarakat extends CI_Controller {

    //masyarakat

    public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation','upload');
		$this->load->model('M_pengaduan');

	}

    public function index()
    {
        $data['bar_graph'] = $this->M_pengaduan->card_masyarakat();

        $data['title'] = 'Admin Dashboard';
        $data['user'] = $this->db->get_where('masyarakat', ['username' => $this->session->userdata('username')])->row_array();
        $data['sidebar'] = $this->db->get('masyarakat')->result_array();

        $this->load->view('Templates/masyarakat_header',$data);
        $this->load->view('Templates/masyarakat_topbar',$data);
        $this->load->view('Templates/masyarakat_sidebar',$data);
        $this->load->view('Dashboard/Masyarakat/masyarakat_dashboard',$data);
        $this->load->view('Templates/masyarakat_footer',$data);
    }
    
    public function masyarakat_pengaduan()
    {
        $this->load->model('M_pengaduan');
        $data['title'] = 'Admin Pengaduan';
        $data['user'] = $this->db->get_where('masyarakat', ['username' => $this->session->userdata('username')])->row_array();
        // $data['joinpengaduan'] = $this->M_pengaduan->join_pengaduandata()->result_array();
        
        $data['kategori'] = $this->M_kategori->tampilkategori()->result_array();
        // $data['joinjo'] = $this->M_pengaduan->joinjo()->result_array();

        $nik = $this->M_pengaduan->get_user();
        $data['joinpengaduan'] = $this->M_pengaduan->joinpengaduandata($nik['nik'])->result_array();


        $this->load->view('Templates/masyarakat_header',$data);
        $this->load->view('Templates/masyarakat_topbar',$data);
        $this->load->view('Templates/masyarakat_sidebar',$data);
        $this->load->view('Dashboard/Masyarakat/masyarakat_pengaduan',$data);
        $this->load->view('Templates/masyarakat_footer',$data);
    }

	public function add_masyarakat_pengaduan()
	{
        $this->load->model('M_pengaduan');
        
        $user = $this->db->get_where('masyarakat', ['username' => $this->session->userdata('username')])->row_array();
		$kategori = $this->input->post('kategori');
		$sub_kategori = $this->input->post('sub_kategori');
		$isi_laporan = $this->input->post('isi_laporan');
		       
        $config['upload_path']          =  './assets/img/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        
        $this->upload->initialize($config);

        $this->upload->do_upload('foto');
        $upload_foto = $this->upload->data('file_name');

		$data = array(
            'nik' => $user['nik'],
            'tgl_pengaduan' => Date ('Y-m-d'),
	        'id_kategori' => $kategori,
	        'sub_kategori' => $sub_kategori,
	        'isi_laporan' => $isi_laporan,
            'foto' => $upload_foto,        
        );        
            
        $this->M_pengaduan->join_pengaduandata();
        $this->M_pengaduan->joinji();
    
        $this->session->set_flashdata('pengaduan', '<div class="alert alert-success" role="alert"> Data berhasil ditambahkan! </div>');
        redirect('Masyarakat/masyarakat_pengaduan');
	}

    public function masyarakat_detail_pengaduan($id)
    {
        $data['title'] = 'Detail Pengadiuan';
        $data['user'] = $this->db->get_where('masyarakat', ['username' => $this->session->userdata('username')])->row_array();

        $data['joinpengaduan2'] = $this->M_pengaduan->joinpengaduan2($id)->result_array();
        $data['tanggapan'] = $this->M_pengaduan->tanggapan($id)->result_array();

        $this->load->view('Templates/masyarakat_header',$data);
        $this->load->view('Templates/masyarakat_topbar',$data);
        $this->load->view('Templates/masyarakat_sidebar',$data);
        $this->load->view('Dashboard/Masyarakat/masyarakat_detail_pengaduan',$data);
        $this->load->view('Templates/masyarakat_footer',$data);
    }

    public function get_sub_kategori()
    {
        $id_kategori = $this->input->post('id');
        $sub_kategori = $this->db->get_where('sub_kategori', ['id_kategori' => $id_kategori])->result();
        echo json_encode($sub_kategori);
    }

    public function masyarakat_profile()
    {
        $data['user'] = $this->db->get_where('masyarakat', ['username' => $this->session->userdata('username')])->row_array();
        $data['title'] = 'Profile Anda';
        $profile['get'] = $this->M_masyarakat->profile();
        

        $this->load->view('Templates/masyarakat_header',$data);
        $this->load->view('Templates/masyarakat_profil',$data);
        $this->load->view('Templates/masyarakat_sidebar',$data);
        $this->load->view('Dashboard/Masyarakat/masyarakat_profile',$profile);
        $this->load->view('Templates/masyarakat_footer',$data);
    }

    public function edit_profile($nik)
    {
        $data = [
            'username' => $this->session->userdata('username'),
            'nama' => htmlspecialchars($this->input->post('nama')),
            'no_telp' => htmlspecialchars($this->input->post('no_telp')),
        ];
        
        $this->M_masyarakat->edit_profil($data, $nik);
        $this->session->set_flashdata('profile', '<div class="alert alert-success" role="alert"> Data Berhasil DiUpdate! </div>');
        redirect('Masyarakat/masyarakat_profile');
    }

//     public function change_avatar()
//     {
//         $config['upload_path'] = './uploads/avatars/'; // set the upload directory
// $config['allowed_types'] = 'gif|jpg|jpeg|png'; // set the allowed file types
// $config['max_size'] = 2048; // set the maximum file size (in KB)
// $config['file_name'] = uniqid(); // generate a unique filename
// $this->load->library('upload', $config); // load the upload library

// if (!$this->upload->do_upload('avatar')) {
//     // handle the error if the upload fails
// } else {
//     // get the uploaded file data
//     $upload_data = $this->upload->data();
//     $file_name = $upload_data['file_name'];
    
//     // update the user's avatar in the database
//     $this->load->model('user_model');
//     $this->user_model->update_avatar($user_id, $file_name);
    
//     // redirect the user to their profile page
//     redirect('user/profile');
// }

//     }
}