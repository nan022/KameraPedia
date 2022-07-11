<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Beasiswa extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Beasiswa_model');
    }

    public function index()
    {
        $data['judul'] = "Halaman Beasiswa";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['beasiswa'] = $this->Beasiswa_model->get();
        $this->load->view("layout/header", $data);
        $this->load->view("beasiswa/vw_beasiswa", $data);
        $this->load->view("layout/footer", $data);
    }

    function tambah()
    {
        $data['judul'] = "Halaman Tambah Beasiswa";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->form_validation->set_rules('nama_mhs', 'Nama Beasiswa', 'required', [
            'required' => 'Nama Beasiswa Wajib di isi'
        ]);
        $this->form_validation->set_rules('jk', 'Jenis Kelamin', 'required', [
            'required' => 'Jenis Kelamin Wajib di isi'
        ]);
        $this->form_validation->set_rules('no_hp', 'Nomor Hp', 'required|integer', [
            'required' => 'Nomor Hp Beasiswa Wajib di isi',
            'integer' => 'NO HP harus Angka'
        ]);
        $this->form_validation->set_rules('kecamatan', 'Kecamatan', 'required', [
            'required' => 'Kecamatan Wajib di isi'
        ]);
        $this->form_validation->set_rules('bank', 'Nama Bank', 'required', [
            'required' => 'Nama Bank Wajib di isi'
        ]);
        $this->form_validation->set_rules('no_rek', 'Nomor Rekening', 'required', [
            'required' => 'Nomor Rekening Wajib di isi'
        ]);
        $this->form_validation->set_rules('prodi', 'Program Studi', 'required', [
            'required' => 'Program Studi Wajib di isi',
        ]);
        $this->form_validation->set_rules('semester', 'Semester', 'required', [
            'required' => 'Semester Beasiswa Wajib di isi',
        ]);
        if ($this->form_validation->run() == false) {
            $this->load->view("layout/header", $data);
            $this->load->view("Beasiswa/vw_tambah_Beasiswa", $data);
            $this->load->view("layout/footer");
        } else {
            $data = [
                'nama_mhs' => $this->input->post('nama_mhs'),
                'jk' => $this->input->post('jk'),
                'no_hp' => $this->input->post('no_hp'),
                'kecamatan' => $this->input->post('kecamatan'),
                'bank' => $this->input->post('bank'),
                'no_rek' => $this->input->post('no_rek'),
                'prodi' => $this->input->post('prodi'),
                'semester' => $this->input->post('semester'),
            ];
            $this->Beasiswa_model->insert($data);
            $this->session->set_flashdata('message', '<div class="m-alert m-alert--outline m-alert--outline-2x alert alert-success alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            </button>
            <strong>Yeay!!!</strong> Data Beasiswa berhasil ditambahkan.
        </div>');
            redirect('Beasiswa');
        }
    }

    public function detail($id)
    {
        $data['judul'] = "Halaman Detail Beasiswa";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['Beasiswa'] = $this->Beasiswa_model->getById($id);
        $this->load->view("layout/header", $data);
        $this->load->view("Beasiswa/vw_detail_Beasiswa", $data);
        $this->load->view("layout/footer", $data);
    }

    public function hapus($id)
    {
        $this->Beasiswa_model->delete($id);
        $this->session->set_flashdata('message', '<div class="m-alert m-alert--outline m-alert--outline-2x alert alert-success alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            </button> Data Beasiswa berhasil di Hapus
        </div>');
        redirect('Beasiswa');
    }

    public function edit($id)
    {
        $data['judul'] = "Halaman Edit Beasiswa";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['Beasiswa'] = $this->Beasiswa_model->getById($id);
        $this->form_validation->set_rules('nama_mhs', 'Nama Beasiswa', 'required', [
            'required' => 'Nama Beasiswa Wajib di isi'
        ]);
        $this->form_validation->set_rules('jk', 'Jenis Kelamin', 'required', [
            'required' => 'Jenis Kelamin Wajib di isi'
        ]);
        $this->form_validation->set_rules('no_hp', 'Nomor Hp', 'required|integer', [
            'required' => 'Nomor Hp Beasiswa Wajib di isi',
            'integer' => 'NO HP harus Angka'
        ]);
        $this->form_validation->set_rules('kecamatan', 'Kecamatan', 'required', [
            'required' => 'Kecamatan Wajib di isi'
        ]);
        $this->form_validation->set_rules('bank', 'Nama Bank', 'required', [
            'required' => 'Nama Bank Wajib di isi'
        ]);
        $this->form_validation->set_rules('no_rek', 'Nomor Rekening', 'required', [
            'required' => 'Nomor Rekening Wajib di isi'
        ]);
        $this->form_validation->set_rules('prodi', 'Program Studi', 'required', [
            'required' => 'Program Studi Wajib di isi',
        ]);
        $this->form_validation->set_rules('semester', 'Semester', 'required', [
            'required' => 'Semester Beasiswa Wajib di isi',
        ]);
        if ($this->form_validation->run() == false) {
            $this->load->view("layout/header", $data);
            $this->load->view("Beasiswa/vw_ubah_Beasiswa", $data);
            $this->load->view("layout/footer", $data);
        } else {
            $data = [
                'nama_mhs' => $this->input->post('nama_mhs'),
                'jk' => $this->input->post('jk'),
                'no_hp' => $this->input->post('no_hp'),
                'kecamatan' => $this->input->post('kecamatan'),
                'bank' => $this->input->post('bank'),
                'no_rek' => $this->input->post('no_rek'),
                'prodi' => $this->input->post('prodi'),
                'semester' => $this->input->post('semester'),
            ];
            $id = $this->input->post('id');
            $this->Beasiswa_model->update(['id' => $id], $data);
            $this->session->set_flashdata('message', '<div class="m-alert m-alert--outline m-alert--outline-2x alert alert-success alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            </button>
            <strong>Yeay!!!</strong> Data Beasiswa berhasil di Ubah
        </div>');
            redirect('Beasiswa');
        }
    }
}
