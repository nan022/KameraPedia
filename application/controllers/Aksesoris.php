<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Aksesoris extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Aksesoris_model');
    }

    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['aksesoris'] = $this->Aksesoris_model->get();        
        $this->load->view("layout/header", $data);
        $this->load->view("aksesoris/vw_aksesoris", $data);
        $this->load->view("layout/footer", $data);
    }

    public function userView()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['aksesoris'] = $this->Aksesoris_model->get();        
        $this->load->view("layout/header", $data);
        $this->load->view("aksesoris/vw_user_aksesoris", $data);
        $this->load->view("layout/footer", $data);
    }

    function tambah()
    {
        $data['judul'] = "Halaman Tambah aksesoris";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['aksesoris'] = $this->Aksesoris_model->get();
        $this->form_validation->set_rules('nama', 'Nama aksesoris', 'required', [
            'required' => 'Nama aksesoris Wajib di isi'
        ]);
        $this->form_validation->set_rules('deskripsi', 'Deskripsi aksesoris', 'required', [
            'required' => 'Deskripsi aksesoris Wajib di isi'
        ]);
        // $this->form_validation->set_rules('jenis', 'Jenis', 'required', [
        //     'required' => 'Jenis aksesoris Wajib di isi'
        // ]);
        $this->form_validation->set_rules('url', 'URL', 'required', [
            'required' => 'URL Wajib di isi'
        ]);
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required', [
            'required' => 'Deskripsi Wajib di isi'
        ]);
        if ($this->form_validation->run() == false) {
            $this->load->view("layout/header", $data);
            $this->load->view("aksesoris/vw_tambah_aksesoris", $data);
            $this->load->view("layout/footer");
        } else {
            $data = [
                'nama' => $this->input->post('nama'),
                'merek' => $this->input->post('merek'),
                'url' => $this->input->post('url'),
                'gambar' => $this->input->post('gambar'),
                'deskripsi' => $this->input->post('deskripsi'),
            ];
            $upload_image = $_FILES['gambar']['name'];
            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size'] = '2048';
                $config['upload_path'] = './assets/img/aks/';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('gambar')) {
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('gambar', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }
            $this->Aksesoris_model->insert($data, $upload_image);
            $this->session->set_flashdata('message', '<div class="m-alert m-alert--outline m-alert--outline-2x alert alert-primary alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>Data aksesoris berhasil ditambahkan</div>');
            redirect('aksesoris');
        }
    }

    public function detail($id)
    {
        $data['judul'] = "Halaman Detail aksesoris";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['aksesoris'] = $this->Aksesoris_model->getById($id);
        $this->load->view("layout/header", $data);
        $this->load->view("aksesoris/vw_detail_aksesoris", $data);
        $this->load->view("layout/footer", $data);
    }

    public function hapus($id)
    {
        $this->Aksesoris_model->delete($id);
        $this->session->set_flashdata('message', '<div class="m-alert m-alert--outline m-alert--outline-2x alert alert-primary alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button> Data aksesoris berhasil di Hapus</div>');
        redirect('aksesoris');
    }

    public function edit($id)
    {
        $data['judul'] = "Halaman Edit aksesoris";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['aksesoris'] = $this->Aksesoris_model->getById($id);
        $this->form_validation->set_rules('nama', 'Nama aksesoris', 'required', [
            'required' => 'Nama aksesoris Wajib di isi'
        ]);
        $this->form_validation->set_rules('deskripsi', 'Deskripsi aksesoris', 'required', [
            'required' => 'Deskripsi aksesoris Wajib di isi'
        ]);
        // $this->form_validation->set_rules('jenis', 'Jenis', 'required', [
        //     'required' => 'Jenis aksesoris Wajib di isi'
        // ]);
        $this->form_validation->set_rules('url', 'URL', 'required', [
            'required' => 'URL Wajib di isi'
        ]);
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required', [
            'required' => 'Deskripsi Wajib di isi'
        ]);
        if ($this->form_validation->run() == false) {
            $this->load->view("layout/header", $data);
            $this->load->view("aksesoris/vw_ubah_aksesoris", $data);
            $this->load->view("layout/footer", $data);
        } else {
            $data = [
                'nama' => $this->input->post('nama'),
                'merek' => $this->input->post('merek'),
                'url' => $this->input->post('url'),
                'deskripsi' => $this->input->post('deskripsi'),
            ];
            $upload_image = $_FILES['gambar']['name'];
            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '2048';
                $config['upload_path'] = './assets/img/aks/';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('gambar')) {
                    $old_image = $data['aksesoris']['gambar'];
                    if ($old_image != 'Screenshots_TAK.PNG') {
                        unlink(FCPATH . 'assets/img/aks/' . $old_image);
                    }
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('gambar', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }
            $id = $this->input->post('id_aksesoris');
            $this->Aksesoris_model->update(['id_aksesoris' => $id], $data);
            $this->session->set_flashdata('message', '<div class="m-alert m-alert--outline m-alert--outline-2x alert alert-primary alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>Data aksesoris berhasil di Ubah</div>');
            redirect('aksesoris');
        }
    }
}
