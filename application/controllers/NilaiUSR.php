<?php
defined('BASEPATH') or exit('No direct script access allowed');

class NilaiUSR extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view("layout/header", $data);
        $this->load->view("user/vw_nilai_mhs", $data);
        $this->load->view("layout/footer", $data);
    }
}
