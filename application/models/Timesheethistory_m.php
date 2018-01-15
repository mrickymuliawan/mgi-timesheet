<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class timesheethistory_m extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}
	public function getall($npwp){
		$result=$this->db->
		query("select bulan,tahun, npwp  from tbl_timesheet where npwp='$npwp' group by bulan order by bulan desc");
		return $result->result_array();
	}

}

/* End of file timesheethistory_m.php */
/* Location: ./application/models/timesheethistory_m.php */