<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class billing_m extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}
	public function getdikerjakan($bulan,$tahun){
		if ($bulan=='alltime') {
			$query=$this->db->get_where('tbl_job',array('status' => 'dikerjakan'));
			return $query->result_array();
		}
		$query=$this->db->get_where('tbl_job',array('status' => 'dikerjakan','month(tanggal_mulai)'=>$bulan,'year(tanggal_mulai)'=>$tahun));
		return $query->result_array();
	}
	public function getselesai($bulan,$tahun){
		if ($bulan=='alltime') {
			$query=$this->db->get_where('tbl_job',array('status' => 'selesai'));
			return $query->result_array();
		}
		$query=$this->db->get_where('tbl_job',array('status' => 'selesai','month(tanggal_mulai)'=>$bulan,'year(tanggal_mulai)'=>$tahun));
		return $query->result_array();
	}
	 function gettotal($id){
	 	$query=$this->db->query
		("select COALESCE(sum(total_ope),0) totope,COALESCE(sum(total_transport_lembur),0) tottranslembur,COALESCE(sum(total_uang_makan),0) totuangmakan 
		from tbl_timesheet
		where id_job='$id'");
		return $query->row_array();
	 }

	public function getdetailbilling($idjob,$bulan,$tahun)
	{
		$bulantext= array('1' => 'Januari',
											'2' => 'Februari',
											'3' => 'Marert',
											'4' => 'April',
											'5' => 'Mei',
											'6' => 'Juni',
											'7' => 'Juli',
											'8' => 'Agustus',
											'9' => 'September',
											'10' => 'Oktober',
											'11' => 'November',
											'12' => 'Desember');

		$query=$this->db->query
		("select id_job,DATE_FORMAT(tanggal_mulai,'%d %M %Y')periode,nama_perusahaan,fee,job_number
			from tbl_job 
			
			where id_job='$idjob' ");
		return $query->row_array();
	}

}

/* End of file job_m.php */
/* Location: ./application/models/job_m.php */