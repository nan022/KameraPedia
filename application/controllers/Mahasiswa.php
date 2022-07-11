<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mahasiswa extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mahasiswa_model');
        $this->load->model('Universitas_model');
    }

    public function index()
    {
        $data['judul'] = "Halaman Mahasiswa";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['mahasiswa'] = $this->Mahasiswa_model->get();        
        $this->load->view("layout/header", $data);
        $this->load->view("mahasiswa/vw_mahasiswa", $data);
        $this->load->view("layout/footer", $data);
    }

    function tambah()
    {
        $data['judul'] = "Halaman Tambah Mahasiswa";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['univ'] = $this->Universitas_model->get();
        $this->form_validation->set_rules('nama_mhs', 'Nama Mahasiswa', 'required', [
            'required' => 'Nama Mahasiswa Wajib di isi'
        ]);
        $this->form_validation->set_rules('jk', 'Jenis Kelamin', 'required', [
            'required' => 'Jenis Kelamin Wajib di isi'
        ]);
        $this->form_validation->set_rules('no_hp', 'Nomor Hp', 'required|integer', [
            'required' => 'Nomor Hp Mahasiswa Wajib di isi',
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
            'required' => 'Semester Mahasiswa Wajib di isi',
        ]);
        $this->form_validation->set_rules('id_univ', 'Universitas', 'required', [
            'required' => 'Universitas Wajib di isi',
        ]);
        $this->form_validation->set_rules('tahun_akademik', 'Tahun Akademik', 'required', [
            'required' => 'Tahun Akademik Wajib di isi',
        ]);
        if ($this->form_validation->run() == false) {
            $this->load->view("layout/header", $data);
            $this->load->view("mahasiswa/vw_tambah_mahasiswa", $data);
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
                'id_univ' => $this->input->post('id_univ'),
                'tahun_akademik' => $this->input->post('tahun_akademik'),
            ];
            $this->Mahasiswa_model->insert($data);
            $this->session->set_flashdata('message', '<div class="m-alert m-alert--outline m-alert--outline-2x alert alert-success alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            </button>
            <strong>Yeay!!!</strong> Data mahasiswa berhasil ditambahkan.
        </div>');
            redirect('Mahasiswa');
        }
    }

    public function detail($id)
    {
        $data['judul'] = "Halaman Detail Mahasiswa";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['mahasiswa'] = $this->Mahasiswa_model->getById($id);
        $this->load->view("layout/header", $data);
        $this->load->view("mahasiswa/vw_detail_mahasiswa", $data);
        $this->load->view("layout/footer", $data);
    }

    public function hapus($id)
    {
        $this->Mahasiswa_model->delete($id);
        $this->session->set_flashdata('message', '<div class="m-alert m-alert--outline m-alert--outline-2x alert alert-success alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            </button> Data mahasiswa berhasil di Hapus
        </div>');
        redirect('Mahasiswa');
    }

    public function edit($id)
    {
        $data['judul'] = "Halaman Edit Mahasiswa";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['univ'] = $this->Universitas_model->get();
        $data['mahasiswa'] = $this->Mahasiswa_model->getById($id);
        $this->form_validation->set_rules('nama_mhs', 'Nama Mahasiswa', 'required', [
            'required' => 'Nama Mahasiswa Wajib di isi'
        ]);
        $this->form_validation->set_rules('jk', 'Jenis Kelamin', 'required', [
            'required' => 'Jenis Kelamin Wajib di isi'
        ]);
        $this->form_validation->set_rules('no_hp', 'Nomor Hp', 'required|integer', [
            'required' => 'Nomor Hp Mahasiswa Wajib di isi',
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
            'required' => 'Semester Mahasiswa Wajib di isi',
        ]);
        $this->form_validation->set_rules('id_univ', 'Universitas', 'required', [
            'required' => 'Universitas Wajib di isi',
        ]);
        $this->form_validation->set_rules('tahun_akademik', 'Tahun Akademik', 'required', [
            'required' => 'Tahun Akademik Wajib di isi',
        ]);
        if ($this->form_validation->run() == false) {
            $this->load->view("layout/header", $data);
            $this->load->view("mahasiswa/vw_ubah_mahasiswa", $data);
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
                'id_univ' => $this->input->post('id_univ'),
                'tahun_akademik' => $this->input->post('tahun_akademik'),
            ];
            $id = $this->input->post('id');
            $this->Mahasiswa_model->update(['id' => $id], $data);
            $this->session->set_flashdata('message', '<div class="m-alert m-alert--outline m-alert--outline-2x alert alert-success alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            </button>
            <strong>Yeay!!!</strong> Data mahasiswa berhasil di Ubah
        </div>');
            redirect('Mahasiswa');
        }
    }
}
