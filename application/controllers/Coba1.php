<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Coba1 extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->database('default');
        $this->load->model('latihan_model');
    }

    public function index()
    {
        $this->load->helper('form'); // supaya bisa gunakan form_open()
        $data['users'] = $this->latihan_model->getUsers();
        $this->load->view('coba1', $data);
    }

    public function insert()
    {
        $username = $this->input->post('username');
        $this->latihan_model->insert($username);
    
        // Ambil data users terbaru
        $users = $this->latihan_model->getUsers();
    
        // Buat response HTML untuk <select>
        $options = '<option selected>-- Pilih User --</option>';
        foreach ($users as $user) {
            $options .= '<option value="' . $user->id . '">' . $user->username . '</option>';
        }
    
        // Kembalikan response HTML
        echo $options;
    }
    
}