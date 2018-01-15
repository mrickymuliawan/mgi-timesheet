<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class penggajian_m extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}
	public function getall($bulan,$tahun){
		$result=$this->db->
		query("select * from tbl_penggajian where bulan=$bulan and tahun=$tahun");
		return $result->result_array();
	}

}

/* End of file penggajian_m.php */
/* Location: ./application/models/penggajian_m.php */