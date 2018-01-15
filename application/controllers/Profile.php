<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class profile extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		// $this->load->model('profile_m');
	}
	public function index(){
		$this->load->view('profile/show_profile_v');
	}

	public function edit()
	{
		$npwp=$this->input->get_post('npwp');
		$passwordlama=$this->input->get_post('passwordlama');
		$passwordbaru=$this->input->get_post('passwordbaru');
		$passwordhash=hash('ripemd160', $passwordbaru);
		$validasi=$this->validasipassword($npwp,$passwordlama);
		if ($validasi) {
			$data = array('password' => $passwordhash);
			$data=$this->security->xss_clean($data);
			$this->db->where('npwp', $npwp);
			$this->db->update('tbl_user', $data);
			echo "1";
		}
		else{
			echo "0";
		}
	}

	public function validasipassword($npwp,$p){
		$password=$p;
		$password=hash('ripemd160', $password);
		$result=$this->db->get_where('tbl_user',array('npwp' => $npwp,'password' => $password));
		if($result->num_rows() == 0){
			return false;
		}
		else{
			return true;
		}
	}

	public function resetpass()
	{
		$npwp=$this->input->get_post('npwp');
		$password=hash('ripemd160', $npwp);
		$data = array('password' => $password);
		$this->db->where('npwp', $npwp);
		$this->db->update('tbl_user', $data);
		echo "Password berhasil di reset";
	}

}