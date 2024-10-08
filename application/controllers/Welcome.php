<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
	}

	public function index()
	{
		$this->load->view('welcome_message');
	}
	public function insert(){

		$this->form_validation->set_rules('nama[]', 'Nama', 'required');

		if ($this->form_validation->run())
		{
			$nama = $this->input->post('nama');
	
			foreach ($nama as $key => $value) {
				echo $value . '<br>';
			}
		}
		$this->index();

	}
}
