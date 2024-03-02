
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_admin extends CI_Model {
    

    // ADMIN
    function login_admin($username)
    {
        return $this->db->get_where('petugas', ['username' => $username])->row_array();
    }

    function tambahtindakan($data)
    {
        $this->db->insert('tanggapan', $data);
    }

    function tambahtindakan2($update, $id)
    {
        $this->db->where('id_pengaduan', $id);
        $this->db->update('pengaduan', $update);
    }

    function profile()
    {    
        return $this->db->get_where('petugas', ['username'=> $this->session->userdata('username')])->row_array();    
    }

    function edit_profil($data)
    {
        $this->db->update('petugas', $data);
    }

    // END ADMIN

    // PETUGAS

    function tambah_petugas($data)
    {
        $this->db->insert('petugas', $data);
    }

    function edit_petugas($data,$id)
    {        
        $this->db->where('id_petugas', $id);
        $this->db->update('petugas', $data);      
    }

    function ban_petugas($id, $data)
    {
        $this->db->where('id_petugas', $id);
        $this->db->update('petugas', $data);
    }

    function delete_petugas($id)
    {
        $this->db->where('id_petugas', $id);
        $this->db->delete('petugas');
    }
    


    // END PETUGAS
}