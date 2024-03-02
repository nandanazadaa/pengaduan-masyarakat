<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_kategori extends CI_Model {


    public function joinkategori()
    {
        $this->db->select('*');
        $this->db->FROM('sub_kategori');
        $this->db->JOIN('kategori','kategori.id_kategori=sub_kategori.id_kategori');
        return $this->db->get();
    }
    public function kategori()
    {
        $this->db->select('*');
        $this->db->FROM('sub_kategori');
        $this->db->JOIN('kategori','kategori.id=sub_kategori.id_kategori');
        return $this->db->get();
    }

    function add_kategori($data)
    {
        $this->db->insert('kategori', $data);
    }

    function kategori2()
    {
        return $this->db->get_where('kategori', ['kategori' => $this->input->post('kategori')])->row_array();
    }
    function tampilkategori()
    {
        return $this->db->get('kategori');
    }

    // function join_subkategori()
    // {
    //     $this->db->select('*');
    //     $this->db->from('sub_kategori');
    //     $this->db->join('kategori', 'kategori.id_kategori=sub_kategori.id_kategori');
    //     return $this->db->get();
    // }

    // function add_subkategori($data)
    // {
    //     $this->db->insert('sub_kategori', $data);
    // }

    
}