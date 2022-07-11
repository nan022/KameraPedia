<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Nilai extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Nilai_model');
        $this->load->model('Mahasiswa_model');
    }

    public function index()
    {
        $data['judul'] = "Halaman Nilai";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['nilai'] = $this->Nilai_model->get();
        $this->load->view("layout/header", $data);
        $this->load->view("nilai/vw_nilai", $data);
        $this->load->view("layout/footer", $data);
    }

    function tambah()
    {
        $data['judul'] = "Halaman Tambah Nilai";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['mhs'] = $this->Mahasiswa_model->get();
        $this->form_validation->set_rules('id_mhs', 'Nama Mahasiswa', 'required', [
            'required' => 'Nama Mahasiswa Wajib di isi'
        ]);
        $this->form_validation->set_rules('ipk', 'Indeks Presentase Komulatif (IPK)', 'required', [
            'required' => 'IPK Wajib di isi'
        ]);
        $this->form_validation->set_rules('semester', 'Semester', 'required|integer', [
            'required' => 'Semester Wajib di isi'
        ]);
        $this->form_validation->set_rules('bukti', 'Bukti', 'required', [
            'required' => 'Bukti Wajib di isi'
        ]);
        if ($this->form_validation->run() == false) {
            $this->load->view("layout/header", $data);
            $this->load->view("nilai/vw_tambah_nilai", $data);
            $this->load->view("layout/footer");
        } else {
            $data = [
                'id_mhs' => $this->input->post('id_mhs'),
                'ipk' => $this->input->post('ipk'),
                'bukti' => $this->input->post('bukti'),
                'semester' => $this->input->post('semester'),
            ];

            if (!empty($_FILES['bukti']['name'])) {
                $image = $this->_do_upload();
                $data['bukti'] = $image;
            }
            // $upload_image = $_FILES['bukti']['name'];
            // if ($upload_image) {
            //     $config['allowed_types'] = 'gif|jpg|png';
            //     $config['max_size'] = '2048';
            //     $config['upload_path'] = './assets/img/prodi/';
            //     $this->load->library('upload', $config);
            //     if ($this->upload->do_upload('bukti')) {
            //         $new_image = $this->upload->data('file_name');
            //         $this->db->set('bukti', $new_image);
            //     } else {
            //         echo $this->upload->display_errors();
            //     }
            //}
            $this->Nilai_model->insert($data);
            $this->session->set_flashdata('message', '<div class="m-alert m-alert--outline m-alert--outline-2x alert alert-success alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            </button> Data Nilai berhasil di Tambah
        </div>');
            redirect('Nilai');
        }
    }

    private function _do_upload()
    {
        $image_name = time().'-'.$_FILES["bukti"]['name'];

        $config['upload_path'] 		= 'assets/img/nilai/';
        $config['allowed_types'] 	= 'gif|jpg|png';
        $config['max_size'] 		= 100;
        $config['max_widht'] 		= 1000;
        $config['max_height']  		= 1000;
        $config['file_name'] 		= $image_name;

        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('bukti')) {
            $this->session->set_flashdata('msg', $this->upload->display_errors('', ''));
            redirect('');
        }
        return $this->upload->data('file_name');
    }

    public function detail($id)
    {
        $data['judul'] = "Halaman Detail Nilai";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['nilai'] = $this->Nilai_model->getById($id);
        $this->load->view("layout/header", $data);
        $this->load->view("Nilai/vw_detail_Nilai", $data);
        $this->load->view("layout/footer", $data);
    }

    public function hapus($id)
    {
        $this->Nilai_model->delete($id);
        $this->session->set_flashdata('message', '<div class="m-alert m-alert--outline m-alert--outline-2x alert alert-success alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            </button> Data Nilai berhasil di Hapus
        </div>');
        redirect('Nilai');
    }

    public function edit($id)
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['mhs'] = $this->Mahasiswa_model->get();
        $data['nilai'] = $this->Nilai_model->getById($id);
        $this->form_validation->set_rules('id_mhs', 'Nama Mahasiswa', 'required', [
            'required' => 'Nama Mahasiswa Wajib di isi'
        ]);
        $this->form_validation->set_rules('ipk', 'Indeks Presentase Komulatif (IPK)', 'required', [
            'required' => 'IPK Wajib di isi'
        ]);
        $this->form_validation->set_rules('semester', 'Semester', 'required|integer', [
            'required' => 'Semester Wajib di isi'
        ]);
        $this->form_validation->set_rules('bukti', 'Bukti', 'required', [
            'required' => 'Bukti Wajib di isi'
        ]);
        if ($this->form_validation->run() == false) {
            $this->load->view("layout/header", $data);
            $this->load->view("nilai/vw_ubah_nilai", $data);
            $this->load->view("layout/footer", $data);
        } else {
            $data = [
                'id_mhs' => $this->input->post('id_mhs'),
                'ipk' => $this->input->post('ipk'),
                'bukti' => $this->input->post('bukti'),
                'semester' => $this->input->post('semester'),
            ];
            $id = $this->input->post('id');
            $this->Nilai_model->update(['id' => $id], $data);
            $this->session->set_flashdata('message', '<div class="m-alert m-alert--outline m-alert--outline-2x alert alert-success alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            </button>
            <strong>Yeay!!!</strong> Data Nilai berhasil di Ubah
        </div>');
            redirect('Nilai');
        }
    }
}
