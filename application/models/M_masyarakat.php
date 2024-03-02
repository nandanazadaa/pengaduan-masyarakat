<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_masyarakat extends CI_Model {

    // ADMIN MASYARAKAT
    function edit_masyarakat($data, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('masyarakat', $data);
    }

    function delete_masyarakat($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('masyarakat');
    }

    function ban_masyarakat($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('masyarakat', $data);
    }

    function login($username)
    {
        return $this->db->get_where('masyarakat', ['username' => $username])->row_array();
    }
    
    function profile()
    {    
        return $this->db->get_where('masyarakat', ['username'=> $this->session->userdata('username')])->row_array();    
    }

    function edit_profil($data, $nik)
    {
        $this->db->where('nik', $nik);
        $this->db->update('masyarakat', $data);
    }

}