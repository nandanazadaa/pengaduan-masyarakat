<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Petugas extends CI_Controller
{

    public function index()
    {
        $data['title'] = 'Petugas Page';
        $data['user'] = $this->db->get_where('petugas', ['username' => $this->session->userdata('username')])->row_array();
        $data['bar_graph'] = $this->M_pengaduan->card_admin();

        $this->load->view('Templates/petugas_header',$data);
        $this->load->view('Templates/petugas_topbar',$data);
        $this->load->view('Templates/petugas_sidebar',$data);
        $this->load->view('Dashboard/Petugas/petugas_dashboard', $data);
        $this->load->view('Templates/petugas_footer',$data);
    }

    public function petugas_kategori()
    {
        $data['title'] = 'Petugas Kategori';
        $data['user'] = $this->db->get_where('petugas', ['username' => $this->session->userdata('username')])->row_array();
        $data['kategori'] = $this->db->get('kategori')->result_array();
        $data['joinkategori'] = $this->M_kategori->joinkategori()->result_array();

        $this->load->model('M_kategori');
        $data['sub_kategori'] = $this->db->get('sub_kategori')->result_array();
        $this->load->model('M_kategori');

        $this->load->view('Templates/petugas_header',$data);
        $this->load->view('Templates/petugas_topbar',$data);
        $this->load->view('Templates/petugas_sidebar',$data);
        $this->load->view('Dashboard/Petugas/petugas_kategori', $data);
         $this->load->view('Templates/petugas_footer',$data);
    }

    public function petugas_masyarakat()
    {
        $data['title'] = 'Home Page';
        $data['user'] = $this->db->get_where('petugas', ['username' => $this->session->userdata('username')])->row_array();
        $data['masyarakat'] = $this->db->get('masyarakat')->result_array();

        $this->load->view('Templates/petugas_header',$data);
        $this->load->view('Templates/petugas_topbar',$data);
        $this->load->view('Templates/petugas_sidebar',$data);
        $this->load->view('Dashboard/Petugas/petugas_masyarakat', $data);
         $this->load->view('Templates/petugas_footer',$data);
    }

    public function petugas()
    {
        $data['title'] = 'Home Page';
        $data['user'] = $this->db->get_where('petugas', ['username' => $this->session->userdata('username')])->row_array();
        $data['petugas'] = $this->db->get('petugas')->result_array();

        $this->load->view('Templates/petugas_header',$data);
        $this->load->view('Templates/petugas_topbar',$data);
        $this->load->view('Templates/petugas_sidebar',$data);
        $this->load->view('Dashboard/Petugas/petugas_petugas', $data);
         $this->load->view('Templates/petugas_footer',$data);
    }

    public function petugas_laporan()
    {
        $data['title'] = 'Admin Dashboard';
        $data['user'] = $this->db->get_where('petugas', ['username' => $this->session->userdata('username')])->row_array();
        // $data['pengaduanaje'] = $this->db->get('pengaduan')->result_array();
        $data['pengaduan'] = $this->db->get('pengaduan')->result_array();
        $data['kategori'] = $this->db->get('kategori')->result_array();
        $data['pengaduanaapa'] = $this->M_pengaduan->join1()->result_array();
        $data['sub_kategori']=$this->db->get('sub_kategori')->result_array();

        $this->load->view('Templates/petugas_header',$data);
        $this->load->view('Templates/petugas_topbar',$data);
        $this->load->view('Templates/petugas_sidebar',$data);
        $this->load->view('Dashboard/Petugas/petugas_laporan', $data);
        $this->load->view('Templates/petugas_footer',$data);

    }
    public function tindakan_pengaduan($id)
    {
        $data['user'] = $this->db->get_where('petugas', ['username' => $this->session->userdata('username')])->row_array();

        $data['pengaduan'] = $this->M_pengaduan->joinpengaduan2($id)->result_array();
        $data['tanggapan'] = $this->M_pengaduan->add_pengaduan($id)->result_array();

        $this->load->view('Templates/petugas_header', $data);
        $this->load->view('Templates/petugas_sidebar', $data);
        $this->load->view('Templates/petugas_topbar', $data);
        $this->load->view('Dashboard/Petugas/petugas_tanggapan', $data);
        $this->load->view('Templates/petugas_footer', $data);
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
        redirect('Petugas/tindakan_pengaduan');
    }

    public function petugas_profile()
    {
        $data['user'] = $this->db->get_where('petugas', ['username' => $this->session->userdata('username')])->row_array();
        $data['title'] = 'Profile Anda';
        $profile['get'] = $this->M_admin->profile();
        

        $this->load->view('Templates/petugas_header',$data);
        $this->load->view('Templates/petugas_topbar',$data);
        $this->load->view('Templates/petugas_sidebar',$data);
        $this->load->view('Dashboard/Petugas/petugas_profile',$profile);
        $this->load->view('Templates/petugas_footer',$data);
    }
}
