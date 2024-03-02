<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pengaduan extends CI_Model {

    
    function pengaduan()
    {
        $this->db->select('*');
        $this->db->FROM('pengaduan');
        $this->db->JOIN('masyarakat','pengaduan.id_pengaduan=masyarakat.id');
        return $this->db->get();
    }

    function join1()
    {
        $this->db->select('*');
        $this->db->from('pengaduan');
        $this->db->join('kategori', 'kategori.id_kategori=pengaduan.id_kategori');
        $this->db->join('masyarakat', 'masyarakat.nik=pengaduan.nik');
        return $this->db->get();
    }

    function pengaduan2()
    {
        return $this->db->get('pengaduan');
    }

    function join_pengaduandata()
    {
        $this->db->select('*');
        $this->db->from('pengaduan');
        $this->db->join('kategori', 'kategori.id_kategori=pengaduan.id_kategori');
        $this->db->join('sub_kategori', 'sub_kategori.sub_kategori=pengaduan.sub_kategori');
        $this->db->join('masyarakat', 'masyarakat.nik=pengaduan.nik');
        return $this->db->get();
    }

    function add_pengaduan($id)
    {
        $this->db->select('*');
        $this->db->from('tanggapan');
        $this->db->join('pengaduan', 'pengaduan.id_pengaduan=tanggapan.id_pengaduan');
        $this->db->join('petugas', 'petugas.nama_petugas=tanggapan.nama_petugas');
        $this->db->where('pengaduan.id_pengaduan', $id);
        return $this->db->get();
    }

    function insertPengaduan($tambahPengaduan)
    {
        $this->db->insert('pengaduan', $tambahPengaduan);
    }

    function joinpengaduandata($nik)
    {
        $this->db->select('*');
        $this->db->from('pengaduan');
        $this->db->join('kategori', 'kategori.id_kategori=pengaduan.id_kategori');
        $this->db->join('sub_kategori', 'sub_kategori.sub_kategori=pengaduan.sub_kategori');
        $this->db->join('masyarakat', 'masyarakat.nik=pengaduan.nik');
        $this->db->where('pengaduan.nik', $nik);
        return $this->db->get();
    }
    
    function joinpengaduan2($id)
    {
        $this->db->select('*');
        $this->db->from('pengaduan');
        $this->db->join('kategori', 'kategori.id_kategori=pengaduan.id_kategori');
        $this->db->join('sub_kategori', 'sub_kategori.sub_kategori=pengaduan.sub_kategori');
        $this->db->join('masyarakat', 'masyarakat.nik=pengaduan.nik');
        $this->db->where('id_pengaduan', $id);
        return $this->db->get();
    }

    function tanggapan($id)
    {
        $this->db->select('*');
        $this->db->from('pengaduan');
        $this->db->join('tanggapan', 'tanggapan.id_pengaduan=pengaduan.id_pengaduan');
        $this->db->where('pengaduan.id_pengaduan', $id);
        return $this->db->get();
    }
    
    function addtindakan($data)
    {
        $this->db->insert('tanggapan', $data);
    }
    function addtindakan2($update, $id)
    {
        $this->db->where('id_pengaduan', $id);
        $this->db->update('pengaduan', $update);
    }

    function sub_pengaduan($data)
    {
        $this->db->insert('pengaduan',$data);
    }

    function get_user()
    {
        return $this->db->get_where('masyarakat', ['username' => $this->session->userdata('username')])->row_array();
    }

    function joinjo()
    {
        $this->db->select('*');
        $this->db->FROM('pengaduan');
        $this->db->JOIN('kategori','kategori.id_kategori=pengaduan.id_kategori');
        $this->db->join('masyarakat', 'masyarakat.nik=pengaduan.nik');
        return $this->db->get();
    }

    function joinji()
    {
        $this->db->select('*');
        $this->db->FROM('pengaduan');
        $this->db->JOIN('sub_kategori','sub_kategori.id_kategori=pengaduan.sub_kategori');
        return $this->db->get();
    }

    function card_admin()
    {
        $kondisi_pengaduan=array(
            'status' => 'segera'
        );
        $this->db->where($kondisi_pengaduan);
        $jumlah_pengaduan=$this->db->get('pengaduan')->num_rows();

        $kondisi_proses=array(
            'status' => 'proses'
        );
        $this->db->where($kondisi_proses);
        $jumlah_proses=$this->db->get('pengaduan')->num_rows();

        $kondisi_selesai=array(
            'status' => 'selesai'
        );
        $this->db->where($kondisi_selesai);
        $jumlah_selesai=$this->db->get('pengaduan')->num_rows();

        $bar_graph=array(
            'jumlah_laporan'=>$this->db->get('pengaduan')->num_rows(),
            'jumlah_pengaduan'=>$jumlah_pengaduan,
            'jumlah_proses'=>$jumlah_proses,
            'jumlah_selesai'=>$jumlah_selesai
        );
        return $bar_graph;
    }

    function card_masyarakat()
    {
        $kondisi_pengaduan=array(
            'status' => 'segera',
            'nik' => $this->session->userdata('nik')
        );
        $this->db->where($kondisi_pengaduan);
        $jumlah_pengaduan=$this->db->get('pengaduan')->num_rows();

        $kondisi_proses=array(
            'status' => 'proses',
            'nik' => $this->session->userdata('nik')
        );
        $this->db->where($kondisi_proses);
        $jumlah_proses=$this->db->get('pengaduan')->num_rows();

        $kondisi_selesai=array(
            'status' => 'selesai',
            'nik' => $this->session->userdata('nik')
        );
        $this->db->where($kondisi_selesai);
        $jumlah_selesai=$this->db->get('pengaduan')->num_rows();

        $bar_graph=array(
            'jumlah_laporan'=>$this->db->get('pengaduan')->num_rows(),
            'jumlah_pengaduan'=>$jumlah_pengaduan,
            'jumlah_proses'=>$jumlah_proses,
            'jumlah_selesai'=>$jumlah_selesai
        );
        return $bar_graph;
    }

    function masyarakat()
    {
        return $this->db->get('masyarakat')->result_array();
    }

    function tampilpetugas()
    {
        return $this->db->get('petugas')->result_array();
    }

    function joinpengaduandata2()
    {
        $this->db->select('*');
        $this->db->from('pengaduan');
        $this->db->join('kategori', 'kategori.id_kategori=pengaduan.id_kategori');
        $this->db->join('sub_kategori', 'sub_kategori.sub_kategori=pengaduan.sub_kategori');
        $this->db->join('masyarakat', 'masyarakat.nik=pengaduan.nik');
        return $this->db->get();
    }
}