<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kamera extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Kamera_model');
    }

    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['kamera'] = $this->Kamera_model->get();        
        $this->load->view("layout/header", $data);
        $this->load->view("kamera/vw_kamera", $data);
        $this->load->view("layout/footer", $data);
    }

    public function userView()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['kamera'] = $this->Kamera_model->get();        
        $this->load->view("layout/header", $data);
        $this->load->view("kamera/vw_user_kamera", $data);
        $this->load->view("layout/footer", $data);
    }

    function tambah()
    {
        $data['judul'] = "Halaman Tambah Kamera";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['kamera'] = $this->Kamera_model->get();
        $this->form_validation->set_rules('nama', 'Nama Kamera', 'required', [
            'required' => 'Nama Kamera Wajib di isi'
        ]);
        $this->form_validation->set_rules('merek', 'Merek Kamera', 'required', [
            'required' => 'Merek Kamera Wajib di isi'
        ]);
        $this->form_validation->set_rules('jenis', 'Jenis', 'required', [
            'required' => 'Jenis Kamera Wajib di isi'
        ]); 
        $this->form_validation->set_rules('sensor', 'Nama Sensor', 'required', [
            'required' => 'Nama sensor Wajib di isi'
        ]);
        $this->form_validation->set_rules('url', 'URL', 'required', [
            'required' => 'URL Wajib di isi'
        ]);
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required', [
            'required' => 'Deskripsi Wajib di isi'
        ]);
        if ($this->form_validation->run() == false) {
            $this->load->view("layout/header", $data);
            $this->load->view("kamera/vw_tambah_kamera", $data);
            $this->load->view("layout/footer");
        } else {
            $data = [
                'nama' => $this->input->post('nama'),
                'merek' => $this->input->post('merek'),
                'jenis' => $this->input->post('jenis'),
                'sensor' => $this->input->post('sensor'),
                'url' => $this->input->post('url'),
                'deskripsi' => $this->input->post('deskripsi'),
                'gambar' => $this->input->post('gambar'),
            ];
            $upload_image = $_FILES['gambar']['name'];
            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '2048';
                $config['upload_path'] = './assets/demo/demo5/img/cam/';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('gambar')) {
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('gambar', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }
            $this->Kamera_model->insert($data, $upload_image);
            $this->session->set_flashdata('message', '<div class="m-alert m-alert--outline m-alert--outline-2x alert alert-primary alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>Data Kamera berhasil ditambahkan</div>');
            redirect('Kamera');
        }
    }

    public function detail($id)
    {
        $data['judul'] = "Halaman Detail Kamera";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['kamera'] = $this->Kamera_model->getById($id);
        $this->load->view("layout/header", $data);
        $this->load->view("Kamera/vw_detail_kamera", $data);
        $this->load->view("layout/footer", $data);
    }

    public function hapus($id)
    {
        $this->Kamera_model->delete($id);
        $this->session->set_flashdata('message', '<div class="m-alert m-alert--outline m-alert--outline-2x alert alert-primary alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button> Data Kamera berhasil di Hapus</div>');
        redirect('Kamera');
    }

    public function edit($id)
    {
        $data['judul'] = "Halaman Edit Kamera";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['kamera'] = $this->Kamera_model->getById($id);
        $this->form_validation->set_rules('nama', 'Nama Kamera', 'required', [
            'required' => 'Nama Kamera Wajib di isi'
        ]);
        $this->form_validation->set_rules('merek', 'Merek Kamera', 'required', [
            'required' => 'Merek Kamera Wajib di isi'
        ]);
        $this->form_validation->set_rules('jenis', 'Jenis', 'required', [
            'required' => 'Jenis Kamera Wajib di isi'
        ]); 
        $this->form_validation->set_rules('sensor', 'Nama Sensor', 'required', [
            'required' => 'Nama sensor Wajib di isi'
        ]);
        $this->form_validation->set_rules('url', 'URL', 'required', [
            'required' => 'URL Wajib di isi'
        ]);
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required', [
            'required' => 'Deskripsi Wajib di isi'
        ]);
        if ($this->form_validation->run() == false) {
            $this->load->view("layout/header", $data);
            $this->load->view("kamera/vw_ubah_kamera", $data);
            $this->load->view("layout/footer", $data);
        } else {
            $data = [
                'nama' => $this->input->post('nama'),
                'merek' => $this->input->post('merek'),
                'jenis' => $this->input->post('jenis'),
                'sensor' => $this->input->post('sensor'),
                'url' => $this->input->post('url'),
                'gambar' => $this->input->post('gambar'),
                'deskripsi' => $this->input->post('deskripsi'),
            ];
            $upload_image = $_FILES['gambar']['name'];
            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '2048';
                $config['upload_path'] = './assets/img/cam/';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('gambar')) {
                    $old_image = $data['kamera']['gambar'];
                    if ($old_image != 'Screenshots_TAK.PNG') {
                        unlink(FCPATH . 'assets/img/cam/' . $old_image);
                    }
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('gambar', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }
            $id = $this->input->post('id_kamera');
            $this->Kamera_model->update(['id_kamera' => $id], $data, $upload_image);
            $this->session->set_flashdata('message', '<div class="m-alert m-alert--outline m-alert--outline-2x alert alert-primary alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>Data Kamera berhasil di Ubah</div>');
            redirect('Kamera');
        }
    }
}
