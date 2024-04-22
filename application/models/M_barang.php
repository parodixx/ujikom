<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_barang extends CI_Model
{
    public function getAllProduk($kodeproduk)
    {
        $data =  $this->db->get_where('produk', array('kode_produk' => $kodeproduk));
        return $data->result_array();
    }

    public function allProduk()
    {
        $data = $this->db->get('produk');
        return $data->result();
    }

    public function countProduk()
    {
        return $this->db->count_all('produk');
    }
}
