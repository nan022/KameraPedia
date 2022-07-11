<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{
		$this->load->view('login');
	}
    public function home($nama = "")
    {
        echo "hello... ini adalah contoh codeigniter pertama saya ";
    }
    public function komentar()
    {
        echo "ini adalah function komentar ";
    }
}
