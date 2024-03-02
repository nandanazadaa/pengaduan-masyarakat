<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_subkategori extends CI_Model {

    public function sub_kategori()
    {
        $this->db->select('*');
        $this->db->FROM('pengaduan');
        $this->db->JOIN('sub_kategori','pengaduan.id=sub_kategori.id');
        return $this->db->get();
    }

    function add_subkategori($data)
    {
        $this->db->insert('sub_kategori', $data);
    }

    function join_subkategori()
    {
        $this->db->select('*');
        $this->db->from('sub_kategori');
        $this->db->join('kategori', 'kategori.id_kategori=sub_kategori.id_kategori');
        return $this->db->get();
    }

    function tampilsubkat()
    {
        return $this->db->get('sub_kategori');
    }

    function join_editsubkategori($id, $data)
    {
        $this->db->set($data);
        $this->db->where('sub_kategori', $id);
        $this->db->update('sub_kategori', $data);
    }

}