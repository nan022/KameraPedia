<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profil extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model', 'userrole');
    }
    public function index()
    {
        $data['judul'] = "Halaman Profil";
        $data['user'] = $this->userrole->getBy();
        $this->load->view('layout/header', $data);
        $this->load->view('profil/vw_profil', $data);
        $this->load->view('layout/footer');
    }
//     public function sepatu()
//     {
//         $data['judul'] = "Halaman sepatu";
//         $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
//         $data['sepatu'] = $this->Sepatu->get();
//         $data['jlh'] = $this->Keranjang->jumlah();
//         $this->load->view("layout/header", $data);
//         $this->load->view("Profil/vw_sepatu", $data);
//         $this->load->view("layout/footer", $data);
//     }
//     public function keranjang($id)
//     {
//         //$data["keranjang"] = $this->Keranjang->get();
//         $data["judul"] = "Detail Sepatu";
//         $data['user'] = $this->userrole->getBy();
//         $data["sepatu"] = $this->Sepatu->getById($id);
//         $data["keranjang"] = $this->Keranjang->get();
//         $data['jlh'] = $this->Keranjang->jumlah();
//         $this->form_validation->set_rules('jumlah', 'Jumlah', 'required', [
//             'required' => 'Jumlah Wajib di isi'
//         ]);
//         if ($this->form_validation->run() == false) {
//             $this->load->view('layout/header', $data);
//             $this->load->view('Profil/vw_keranjang', $data);
//             $this->load->view("layout/footer", $data);
//         } else {
//             $data = [
//                 'id_user' => $this->session->userdata('id'),
//                 'id_sepatu' => $this->input->post('id'),
//                 'jumlah' => $this->input->post('jumlah'),
//                 'total' => $this->input->post('total'),
//                 'tanggal' => $this->input->post('tanggal'),
//             ];
//             $this->Keranjang->insert($data);
//             $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data sepatu Berhasil Ditambah ke keranjang!</div>');
//             redirect('Profil/detail');
//         }
//     }

//     public function detail()
//     {
//         $data["keranjang"] = $this->Keranjang->get();
//         $data["judul"] = "Detail Keranjang";
//         $data['user'] = $this->userrole->getBy();
//         $data["sepatu"] = $this->Sepatu->get();
//         $data['jlh'] = $this->Keranjang->jumlah();
//         $this->load->view('layout/header', $data);
//         $this->load->view('profil/vw_detail_keranjang', $data);
//         $this->load->view("layout/footer", $data);
//     }

//     public function delKeranjang($id)
//     {
//         $this->Keranjang->delete($id);
//         $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Dihapus!</div>');
//         redirect('Profil/detail');
//     }

//     public function pesanan()
//     {
//         $jumlah_beli = count($this->input->post('sepatu'));
//         $data_p = [
//             'no_penjualan' => $this->input->post('no_penjualan'),
//             'id_user' => $this->session->userdata('id'),
//             'tanggal' => $this->input->post('tanggal'),
//             'total_bayar' => $this->input->post('bayar'),
//             'alamat' => $this->input->post('alamat'),
//             'pembayaran' => $this->input->post('pembayaran'),
//             'keterangan' => $this->input->post('keterangan'),
//         ];
//         $upload_image = $_FILES['gambar']['name'];
//         if ($upload_image) {
//             $config['allowed_types'] = 'gif|jpg|png|jpeg';
//             $config['max_size'] = '2048';
//             $config['upload_path'] = './assets/img/pembayaran/';
//             $this->load->library('upload', $config);
//             if ($this->upload->do_upload('gambar')) {
//                 $new_image = $this->upload->data('file_name');
//                 $this->db->set('gambar', $new_image);
//             } else {
//                 echo $this->upload->display_errors();
//             }
//         }
//         $data_detail = [];
//         for ($i = 0; $i < $jumlah_beli; $i++) {
//             array_push($data_detail, ['id_sepatu' => $this->input->post('sepatu')[$i]]);
//             $data_detail[$i]['no_penjualan'] = $this->input->post('no_penjualan');
//             $data_detail[$i]['id_user'] = $this->session->userdata('id');
//             $data_detail[$i]['jumlah'] = $this->input->post('jumlah_p')[$i];
//             $data_detail[$i]['total'] = $this->input->post('total_p')[$i];
//         }
//         if ($this->Penjualan->insert($data_p, $upload_image) && $this->Detail->insert($data_detail)) {
//             for ($i = 0; $i < $jumlah_beli; $i++) {
//                 $this->Sepatu->min_stok($data_detail[$i]['jumlah'], $data_detail[$i]['id_sepatu']) or die('gagal min stok');
//             }
//             $id_us = $this->session->userdata('id');
//             $this->Keranjang->delete_all($id_us);
//             $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Pesanan Berhasil dibuat!</div>');
//             redirect('Profil/sepatu');
//         } else {
//             $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Pesanan Gagal dibuat!</div>');
//             redirect('Profil/sepatu');
//         }
//     }
//     public function pembelian()
//     {
//         $data['judul'] = "Data Pembelian";
//         $data['user'] = $this->userrole->getBy();
//         $data['pembelian'] = $this->Penjualan->getByUser();
//         $data['jlh'] = $this->Keranjang->jumlah();
//         $this->load->view('layout/header', $data);
//         $this->load->view('profil/pembelian_user', $data);
//         $this->load->view('layout/footer', $data);
//     }
//     public function statusbeli($id)
//     {
//         $data['judul'] = "Ubah Data Pembelian";
//         $data['user'] = $this->userrole->getBy();
//         $data['pembelian'] = $this->Penjualan->getByUser2($id);
//         $data['detailbeli'] = $this->Detail->getByUser($id);
//         $data['jlh'] = $this->Keranjang->jumlah();
//         $this->form_validation->set_rules('status', 'Status', 'required', [
//             'required' => 'Status Wajib di isi'
//         ]);
//         if ($this->form_validation->run() == false) {
//             $this->load->view("layout/header", $data);
//             $this->load->view("profil/detail_beli", $data);
//             $this->load->view("layout/footer");
//         } else {
//             $status = $this->input->post('status');
//             $nojual = $this->input->post('no_penjualan');
//             $this->Penjualan->updatestatus($status, $nojual);
//             $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Status Berhasil
// DiUbah!</div>');
//             redirect('Profil/pembelian');
//         }
    }