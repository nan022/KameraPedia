<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Universitas extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Universitas_model');
    }

    public function index()
    {
        $data['judul'] = "Halaman Universitas";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['universitas'] = $this->Universitas_model->get();
        $this->load->view("layout/header", $data);
        $this->load->view("universitas/vw_universitas", $data);
        $this->load->view("layout/footer", $data);
    }

    function tambah()
    {
        $data['judul'] = "Halaman Tambah Universitas";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->form_validation->set_rules('nama', 'Nama Universitas', 'required', [
            'required' => 'Nama Universitas Wajib di isi'
        ]);
        $this->form_validation->set_rules('alamat', 'Alamat', 'required', [
            'required' => 'Alamat Wajib di isi'
        ]);
        $this->form_validation->set_rules('akreditasi', 'Akreditasi', 'required', [
            'required' => 'Akreditasi Wajib di isi'
        ]);
        $this->form_validation->set_rules('email', 'Email', 'required', [
            'required' => 'Email Wajib di isi'
        ]);        
        if ($this->form_validation->run() == false) {
            $this->load->view("layout/header", $data);
            $this->load->view("universitas/vw_tambah_universitas", $data);
            $this->load->view("layout/footer");
        } else {
            $data = [
                'nama' => $this->input->post('nama'),
                'alamat' => $this->input->post('alamat'),
                'akreditasi' => $this->input->post('akreditasi'),
                'email' => $this->input->post('email'),
            ];
            $this->Universitas_model->insert($data);
            $this->session->set_flashdata('message', '<div class="m-alert m-alert--outline m-alert--outline-2x alert alert-success alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            </button>
            <strong>Yeay!!!</strong> Data Universitas berhasil ditambahkan.
        </div>');
            redirect('Universitas');
        }
    }

    // public function detail($id)
    // {
    //     $data['judul'] = "Halaman Detail Universitas";
    //     $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    //     $data['Universitas'] = $this->Universitas_model->getById($id);
    //     $this->load->view("layout/header", $data);
    //     $this->load->view("Universitas/vw_detail_Universitas", $data);
    //     $this->load->view("layout/footer", $data);
    // }

    public function hapus($id)
    {
        $this->Universitas_model->delete($id);
        $error = $this->db->error();
        if ($error['code'] == 0) {
            $this->session->set_flashdata('message', '<div class="m-alert m-alert--outline m-alert--outline-2x alert alert-success alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            </button> Data Universitas berhasil di Hapus
            </div>');
        } else {
            $this->session->set_flashdata('message', '<div class="m-alert m-alert--outline m-alert--outline-2x alert alert-danger alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            </button> Data Universitas Berelasi </div>');
        }
        redirect('Universitas');
        // $this->session->set_flashdata('message', '<div class="m-alert m-alert--outline m-alert--outline-2x alert alert-success alert-dismissible fade show" role="alert">
        //     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        //     </button> Data Universitas berhasil di Hapus
        // </div>');
        // redirect('Universitas');
    }

    public function edit($id)
    {
        $data['judul'] = "Halaman Edit Universitas";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['universitas'] = $this->Universitas_model->getById($id);
        $this->form_validation->set_rules('nama', 'Nama Universitas', 'required', [
            'required' => 'Nama Universitas Wajib di isi'
        ]);
        $this->form_validation->set_rules('alamat', 'Alamat', 'required', [
            'required' => 'Alamat Wajib di isi'
        ]);
        $this->form_validation->set_rules('akreditasi', 'Akreditasi', 'required', [
            'required' => 'Akreditasi Wajib di isi'
        ]);
        $this->form_validation->set_rules('email', 'Email', 'required', [
            'required' => 'Email Wajib di isi'
        ]);        
        if ($this->form_validation->run() == false) {
            $this->load->view("layout/header", $data);
            $this->load->view("Universitas/vw_ubah_universitas", $data);
            $this->load->view("layout/footer", $data);
        } else {
            $data = [
                'nama' => $this->input->post('nama'),
                'alamat' => $this->input->post('alamat'),
                'akreditasi' => $this->input->post('akreditasi'),
                'email' => $this->input->post('email'),
            ];
            $id = $this->input->post('id');
            $this->Universitas_model->update(['id' => $id], $data);
            $this->session->set_flashdata('message', '<div class="m-alert m-alert--outline m-alert--outline-2x alert alert-success alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            </button>
            <strong>Yeay!!!</strong> Data Universitas berhasil di Ubah
        </div>');
            redirect('Universitas');
        }
    }
}
