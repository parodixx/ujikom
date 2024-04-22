<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_barang');
        $this->load->model('M_petugas');
        $this->load->model('M_transaksi');
        check_login();
    }

    public function index()
    {
        $data['title'] = 'Dashboard Admin';
        $data['abc'] = 'Admin/index';
        $data['count'] = $this->M_barang->countProduk();
        $data['count1'] = $this->M_petugas->countPetugas();
        $this->load->view('Admin/templates/index', $data);
    }

    public function barang()
    {
        $data['title'] = 'Kelola Barang';
        $data['abc'] = 'Admin/Kelola/barang';
        $data['produk'] = $this->M_barang->allProduk();
        $this->load->view('Admin/templates/index', $data);
    }

    public function petugas()
    {
        $data['title'] = 'Petugas';
        $data['abc'] = 'Admin/Kelola/petugas';
        // $data['petugas1'] = $this->M_petugas->getAllRole();
        $data['petugas2'] = $this->M_petugas->getAllPetugas();
        // $data['petugas3'] = $this->M_petugas->tampilRoleByName();
        $this->load->view('Admin/templates/index', $data);
    }
    public function transaksi()
    {
        $data['title'] = 'Transaksi';
        $data['abc'] = 'Admin/Kelola/transaksi';
        $data['produk'] = $this->M_barang->allProduk();
        $data['petugas'] = $this->session->userdata('username');
        $data['pelanggan1'] = $this->M_transaksi->allPelanggan();
        $data['produk2'] = $this->db->get('produk')->result();
        $this->load->view('Admin/templates/index', $data);
    }
    public function petugass()
    {
        $data['title'] = 'Transaksi';
        $data['abc'] = 'Admin/Kelola/petugtug';
        $data['petugas'] = $this->session->userdata('username');
        $this->load->view('Admin/templates/index', $data);
    }

    public function getProduk()
    {
        $kodeproduk = $this->input->post('kodeProduk');
        $produk = $this->M_barang->getAllProduk($kodeproduk);
        echo json_encode($produk);
    }

    public function getDiskon()
    {
        $diskon = $this->input->post('diskon');
        $disk = $this->M_transaksi->getAllDiskon($diskon);
        echo json_encode($disk);
    }
}
