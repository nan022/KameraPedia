<?php

use Restserver\Libraries\REST_Controller;

defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';

class User extends REST_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model', 'usr');
    }

    public function index_get()
    {
        $id = $this->get('id_user');
        if ($id == null) {
            $usr = $this->usr->get();
        }else{
            $usr = $this->usr->get($id);
        }
        if ($usr){
            $this->response([
                'status' => true,
                'data'=> $usr
            ], REST_Controller::HTTP_OK);
        }else {
            $this->response([
                'status' => true,
                'message' => 'Id Tidak Di Temukan'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }

    public function index_delete()
    {
        $id = $this->delete('id_user');
        if ($id == null) {
            $this->response([
                'status' => false,
                'message' => 'Masukan Id'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }else{
            if ($this->usr->delete($id) > 0){
                $this->response([
                    'status' => true,
                    'id_user' => $id,
                    'message' => 'Data Berhasil dihapus'
                ], REST_Controller::HTTP_OK);
            }else{
                $this->response([
                    'status' => false,
                    'message' => 'Id Tidak ditemukan'
                ], REST_Controller::HTTP_NOT_FOUND);
            }
        }
    }

    public function index_post()
    {
        $data = [
            'nama' => $this->post('nama'),
            'email' => $this->post('email'),
            'password' => $this->post('password'),
            'role' => $this->post('role'),
        ];
        if ($this->usr->insert($data) > 0) {
            $this->response([
                'status' => false,
                'message' => 'Berhasil Menambahkan Data'
            ], REST_Controller::HTTP_CREATED);
        }else{
            $this->response([
                'status' => false,
                'message' => 'Gagal Menambahkan Data'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }

    public function index_put()
    {
        $id = $this->put('id_user');
        $data = [
            'nama' => $this->put('nama'),
            'email' => $this->put('email'),
            'password' => $this->put('password'),
            'email' => $this->put('email'),
        ];
        if ($this->usr->update($data, $id) > 0){
            $this->response([
                'status' => true,
                'message' => "Data berhasil diubah"
            ], REST_Controller::HTTP_OK);
        }else {
            $this->response([
                'status' => false,
                'message' => 'Gagal mengubah data'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }
}

