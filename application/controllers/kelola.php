<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kelola extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_transaksi');
    }

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

    public function saveSiTransaksi()
    {
        $input = $this->input->post(null, true);
        if ($input) {

            $data = [
                'nama' => $this->input->post('kasir'),
                'tanggal_transaksi' => $this->input->post('tanggal'),
                'no_faktur' => $this->input->post('no_faktur'),
                'member' => $this->input->post('member'),
                'total' => $this->input->post('total'),
                'diskon' => $this->input->post('diskon2'),
                'pembayaran' => $this->input->post('pembayaran'),
                'kembalian' => $this->input->post('kembalian'),
            ];
            $opot = $this->M_transaksi->saveTransaksi($data);
            if ($opot) {
                $var = $this->input->post('data');
                if ($var) {
                    $vir = array();
                    foreach ($var as $va) {
                        $vir[] = array(
                            'id_transaksi' => $opot,
                            'kode_produk' => $va['kodeProduk'],
                            'nama_produk' => $va['namaProduk'],
                            'harga_produk' => $va['hargaProduk'],
                            'qty' => $va['qty'],
                            'subtotal' => $va['totalHarga'],
                        );
                    }
                    $this->db->insert_batch('detailpenjualan', $vir);
                    $struk = $this->load->view('Admin/kelola/struk', compact('data', 'vir'), true);

                    $response = [
                        'success' => true,
                        'message' => 'Struk berhasil di-generate',
                        'struk' => $struk,
                    ];
                    header('Content-Type: application/json');
                    echo json_encode($response);
                } else {
                }
            } else {
            }
        } else {
        }
    }
}
