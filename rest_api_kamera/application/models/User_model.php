<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{
    public $table = 'user';
    public $id = 'user.id_user';
    public function get($id = null)
    {
        if ($id == null){
            return $this->db->get($this->table)->result_array();
        }else {
            return $this->db->get_where($this->table, ['id_user' => $id])->result_array();
        }
    }
    public function update($data, $id)
    {
        $this->db->update($this->table, $data, ['id_user' => $id]);
        return $this->db->affected_rows();
    }
    public function insert($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->affected_rows();
    }
    public function delete($id)
    {
        $this->db->delete($this->table, ['id_user' => $id]);
        return $this->db->affected_rows();
    }
}