<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		if ($this->session->has_userdata('namauser')) {
			$this->load->view('templates/fulltemplate_v');
		}
		else{
			redirect(base_url('login'));
		}
	}
	
}
