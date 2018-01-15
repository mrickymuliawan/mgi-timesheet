<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class controlcuti_m extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}
	public function getall($bulan,$tahun){
		$query=$this->db->
		query("select *,nama_user,saldo_cuti from tbl_controlcuti ct inner join tbl_user us
			on ct.npwp=us.npwp
			where bulan='$bulan' && tahun='$tahun'");
		return $query->result_array();
	}


}

/* End of file controlcuti_m.php */
/* Location: ./application/models/controlcuti_m.php */