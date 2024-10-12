<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Latihan_model extends CI_Model
{
    public function getUsers()
    {
        return $this->db->get('users')->result();
    }
    public function getUser($username){
        return $this->db->get_where('users', ['username' => $username])->row();
    }
    public function insert($username)
    {
        $data = array(
            'username' => $username
        );
        $this->db->insert('users', $data);
    }
}
