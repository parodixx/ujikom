<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_petugas extends CI_Model
{
    public function getAllPetugas()
    {
        $data =  $this->db->get('user')->result();
        return $data;
    }

    public function tampilRoleByName()
    {
        $this->db->select('user.*, role.nma_role');
        $this->db->from('user');
        $this->db->join('role', 'role.role_id = user.role_id');
        $data = $this->db->get()->result();
        return $data;
    }


    public function getAllRole()
    {
        return $this->db->get('role')->result_array();
    }

    public function countPetugas()
    {
        return $this->db->count_all('petugas');
    }
}
