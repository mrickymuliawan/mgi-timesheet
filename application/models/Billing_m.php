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
		("select sum(total_ope)totope,sum(total_transport_lembur)tottranslembur,sum(total_uang_makan)totuangmakan, fee 
		from tbl_timesheet ts
		inner join tbl_perusahaan pr on ts.id_perusahaan=pr.id_perusahaan
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
		("select jb.id_job,concat('$bulantext[$bulan] $tahun')periode,jb.nama_perusahaan,fee,job_number,sum(total_ope)totope,sum(total_transport_lembur)tottranslembur,sum(total_uang_makan)totuangmakan 
			from tbl_job jb
			inner join tbl_timesheet ts
			on jb.id_job=ts.id_job
			inner join tbl_perusahaan pr
			on pr.id_perusahaan=ts.id_perusahaan
			where jb.id_job='$idjob' ");
		return $query->row_array();
	}

}

/* End of file job_m.php */
/* Location: ./application/models/job_m.php */