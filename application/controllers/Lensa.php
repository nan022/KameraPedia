<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Lensa extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Lensa_model');
    }

    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['lensa'] = $this->Lensa_model->get();        
        $this->load->view("layout/header", $data);
        $this->load->view("lensa/vw_lensa", $data);
        $this->load->view("layout/footer", $data);
    }

    public function userView()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['lensa'] = $this->Lensa_model->get();        
        $this->load->view("layout/header", $data);
        $this->load->view("lensa/vw_user_lensa", $data);
        $this->load->view("layout/footer", $data);
    }

    function tambah()
    {
        $data['judul'] = "Halaman Tambah lensa";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['univ'] = $this->Lensa_model->get();
        $this->form_validation->set_rules('nama', 'Nama lensa', 'required', [
            'required' => 'Nama lensa Wajib di isi'
        ]);
        $this->form_validation->set_rules('merek', 'Merek lensa', 'required', [
            'required' => 'Merek lensa Wajib di isi'
        ]);
        $this->form_validation->set_rules('jenis', 'Jenis', 'required', [
            'required' => 'Jenis lensa Wajib di isi'
        ]);
        $this->form_validation->set_rules('url', 'URL', 'required', [
            'required' => 'URL Wajib di isi'
        ]);
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required', [
            'required' => 'Deskripsi Wajib di isi'
        ]);
        if ($this->form_validation->run() == false) {
            $this->load->view("layout/header", $data);
            $this->load->view("lensa/vw_tambah_lensa", $data);
            $this->load->view("layout/footer");
        } else {
            $data = [
                'nama' => $this->input->post('nama'),
                'merek' => $this->input->post('merek'),
                'jenis' => $this->input->post('jenis'),
                'url' => $this->input->post('url'),
                'gambar' => $this->input->post('gambar'),
                'deskripsi' => $this->input->post('deskripsi'),
            ];
            $upload_image = $_FILES['gambar']['name'];
            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size'] = '2048';
                $config['upload_path'] = './assets/img/lens/';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('gambar')) {
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('gambar', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }
            $this->Lensa_model->insert($data, $upload_image);
            $this->session->set_flashdata('message', '<div class="m-alert m-alert--outline m-alert--outline-2x alert alert-primary alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>Data lensa berhasil ditambahkan</div>');
            redirect('lensa');
        }
    }

    public function detail($id)
    {
        $data['judul'] = "Halaman Detail lensa";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['lensa'] = $this->Lensa_model->getById($id);
        $this->load->view("layout/header", $data);
        $this->load->view("lensa/vw_detail_lensa", $data);
        $this->load->view("layout/footer", $data);
    }

    public function hapus($id)
    {
        $this->Lensa_model->delete($id);
        $this->session->set_flashdata('message', '<div class="m-alert m-alert--outline m-alert--outline-2x alert alert-primary alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button> Data Lensa berhasil di Hapus</div>');
        redirect('lensa');
    }

    public function edit($id)
    {
        $data['judul'] = "Halaman Edit lensa";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['lensa'] = $this->Lensa_model->getById($id);
        $this->form_validation->set_rules('nama', 'Nama lensa', 'required', [
            'required' => 'Nama lensa Wajib di isi'
        ]);
        $this->form_validation->set_rules('merek', 'Merek lensa', 'required', [
            'required' => 'Merek lensa Wajib di isi'
        ]);
        $this->form_validation->set_rules('jenis', 'Jenis', 'required', [
            'required' => 'Jenis lensa Wajib di isi'
        ]);
        $this->form_validation->set_rules('url', 'URL', 'required', [
            'required' => 'URL Wajib di isi'
        ]);
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required', [
            'required' => 'Deskripsi Wajib di isi'
        ]);
        if ($this->form_validation->run() == false) {
            $this->load->view("layout/header", $data);
            $this->load->view("lensa/vw_ubah_lensa", $data);
            $this->load->view("layout/footer", $data);
        } else {
            $data = [
                'nama' => $this->input->post('nama'),
                'merek' => $this->input->post('merek'),
                'jenis' => $this->input->post('jenis'),
                'url' => $this->input->post('url'),
                'gambar' => $this->input->post('gambar'),
                'deskripsi' => $this->input->post('deskripsi'),
            ];
            $upload_image = $_FILES['gambar']['name'];
            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '2048';
                $config['upload_path'] = './assets/img/lens/';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('gambar')) {
                    $old_image = $data['lensa']['gambar'];
                    if ($old_image != 'Screenshots_TAK.PNG') {
                        unlink(FCPATH . 'assets/img/lens/' . $old_image);
                    }
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('gambar', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }
            $id = $this->input->post('id_lensa');
            $this->Lensa_model->update(['id_lensa' => $id], $data, $upload_image);
            $this->session->set_flashdata('message', '<div class="m-alert m-alert--outline m-alert--outline-2x alert alert-primary alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>Data lensa berhasil di Ubah</div>');
            redirect('lensa');
        }
    }
}
