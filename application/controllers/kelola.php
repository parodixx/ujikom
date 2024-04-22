<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kelola extends CI_Controller
{
    public function saveProduk()
    {
        $this->form_validation->set_rules('kode_produk', 'Kode Produk', 'required|trim');

        $data = [
            'kode_produk' => $this->input->post('kode_produk'),
            'nama_produk' => $this->input->post('nama_produk'),
            'harga' => $this->input->post('harga'),
            'stok' => $this->input->post('stok'),
        ];

        $this->db->insert('produk', $data);
        redirect('admin/barang');
    }
    public function savePetugas()
    {
        $this->form_validation->set_rules('nama_petugas', 'Nama Petugas', 'required|trim');

        $data = [
            'nama_petugas' => $this->input->post('nama_petugas'),
            'username' => $this->input->post('username'),
            'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            'role_id' => '2',
        ];

        $this->db->insert('petugas', $data);
        redirect('admin/petugas');
    }

    public function editProduk($id)
    {
        $this->form_validation->set_rules('kode_produk', 'Kode Produk', 'required|trim');

        $data = [
            'kode_produk' => $this->input->post('kode_produk'),
            'nama_produk' => $this->input->post('nama_produk'),
            'harga' => $this->input->post('harga'),
            'stok' => $this->input->post('stok'),
        ];

        $this->db->where('id', $id);
        $this->db->update('produk', $data);
        redirect('admin/barang');
    }

    public function hapusProduk($id)
    {
        $this->db->where('id', $id);;
        $this->db->delete('produk');
        redirect('admin/barang');
    }
    public function deletePetugas($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('user');
        redirect('admin/petugas');
    }

    public function updateStatus($id)
    {
        $data = [
            'is_active' => 'nonaktif'
        ];
        $this->db->where('id', $id);
        $this->db->update('user', $data);
        redirect('admin/petugas');
    }
    public function updatePetugas($id)
    {
        $data = [
            'nama' => $this->input->post('nama_petugas'),
            'username' => $this->input->post('username'),
        ];
        $this->db->where('id', $id);
        $this->db->update('user', $data);
        redirect('admin/petugas');
    }

    public function saveTransaksi()
    {

        $data = [
            // 'id_pelanggan' => $this->input->post('member'),
            'tanggal_penjualan' => $this->input->post('tanggal'),
            'total_harga' => $this->input->post('total'),
        ];
        // var_dump($data);
        // die;

        $this->db->insert('penjualan', $data);
        redirect('admin/transaksi');
    }

    public function getDiskon()
    {
        $diskon = $this->db->get('diskon')->result();
        echo json_encode($diskon);
    }
}
