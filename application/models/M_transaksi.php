<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_transaksi extends CI_Model
{
    public function getAllTransaksi()
    {
        $data =  $this->db->get('transaksi.*');
        return $this->db->get($data);
    }

    public function allPelanggan()
    {
        $data = $this->db->get('pelanggan')->result();
        return $data;
    }

    public function getAllDiskon($diskon)
    {
        $data =  $this->db->get_where('pelanggan', array('diskon' => $diskon));
        return $data->result_array();
    }

    public function saveTransaksi($dataTransaksi)
    {
        $this->db->insert('transaksi', $dataTransaksi);

        if ($this->db->affected_rows() > 0) {
            return $this->db->insert_id();
        } else {
            return false;
        }
    }
}
