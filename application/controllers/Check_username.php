<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Check_username extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->database('default');
        $this->load->model('latihan_model');
    }

    public function index()
    {
        $this->load->helper('form'); // supaya bisa gunakan form_open()
        $this->load->view('check_username');
    }

    public function insert()
    {
		$this->load->library('form_validation'); // supaya bisa menggunakan form_validation
        $this->form_validation->set_rules('username', 'Username', 'required|callback_username_check');
        
		if($this->form_validation->run() != false){
            $username = $this->input->post('username');
            $this->latihan_model->insert($username);
            redirect('check_username');
		}else{
			$this->index();
		}
    }

    public function username_check($username){
        $username = $this->latihan_model->getUser($username);

        if($username){
            $this->form_validation->set_message('username_check', 'Username sudah digunakan');
            return false;
        }else{
            return true;
        }
    }
    
}