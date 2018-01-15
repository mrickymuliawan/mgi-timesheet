<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
	}
	public function index()
	{
		if ($this->session->has_userdata('namauser')) {
			redirect(base_url('home'));
		}


		else if($this->input->post('submit')){
			$this->form_validation->set_rules
			('npwp', 'npwp','required|callback_validasilogin' );
			
			if ($this->form_validation->run() === FALSE) 
			{
				$this->load->view('login/login_v');
			}
			else
			{
				$npwp  =  $this->input->post('npwp');
				$result=$this->db->get_where('tbl_user',array('npwp'=>$npwp))->row_array();
				$sessiondata=array('namauser'=>$result['nama_user'],'npwp'=>$result['npwp'],'role'=>$result['role']);
				$this->session->set_userdata($sessiondata);
				redirect(base_url('home'));
			}
			
		}
		else{
			$this->load->view('login/login_v');
		}

	}
	public function adminlogin(){
		$npwp  =  $this->input->get_post('npwp');
		$result=$this->db->get_where('tbl_user',array('npwp'=>$npwp))->row_array();
		$sessiondata=array('namauser'=>$result['nama_user'],'npwp'=>$result['npwp'],'role'=>$result['role']);
		$this->session->set_userdata($sessiondata);
		redirect(base_url('home'));
	}
	public function validasilogin($npwp){
		$this->form_validation->set_message('validasilogin', 'Invalid NPWP or Password');
		$password=$this->input->post('password');;
		$password=hash('ripemd160', $password);
		$result=$this->db->get_where('tbl_user',array('npwp' => $npwp,'password' => $password,'status' => 'aktif'));
		if($result->num_rows() == 0){
			return false;

		}
		else{
			return true;
		}
	}

	public function logout(){
		$session = array('namauser','npwp','role');
		$this->session->unset_userdata($session);
		$this->session->sess_destroy();
		redirect(base_url('login'));
	}

	public function test($p){
		$pass= hash('ripemd160', $p);
		echo "$pass";
	}
	
}
