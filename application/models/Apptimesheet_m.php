<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class apptimesheet_m extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}
	public function getall($bulan,$tahun,$periode,$npwp){
		$result=$this->db->
		query("select ts.npwp, nama_user,coalesce(sum(total_jamkerja),0)totjaker, periode, 
					coalesce(sum(total_lembur),0) totallembur
					from tbl_timesheet ts inner join tbl_user tu on ts.npwp=tu.npwp
					where bulan='$bulan' and periode='$periode' and tahun='$tahun' and pic='$npwp' group by npwp");
		return $result->result_array();
	}
	public function approvetimesheet($bulan,$tahun,$periode,$npwp,$npwppic,$status){
		$result=$this->db->
		query("update tbl_timesheet set status='$status' where
					bulan='$bulan' && tahun='$tahun' && npwp='$npwp' && periode='$periode' && pic='$npwppic' ");
		echo "Data updated";
	}
}

/* End of file apptimesheet_m.php */
/* Location: ./application/models/apptimesheet_m.php */