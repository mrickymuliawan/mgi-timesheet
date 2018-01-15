<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class evaluasi_m extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}
	public function getdata($bulanmulai,$bulanselesai,$tahun){
		$query=$this->db->query
		("select pr.id_perusahaan,nama_perusahaan, fee, sum(total_jamkerja)tjaker,sum(total_lembur)tlembur,sum(total_ope) tope from tbl_perusahaan pr join tbl_timesheet ts on pr.id_perusahaan = ts.id_perusahaan 
			where bulan>=$bulanmulai && bulan<=$bulanselesai && tahun =$tahun group by ts.id_perusahaan ");
		return $query->result_array();
	}

	public function getdetailevaluasi($idperusahaan,$bulanmulai,$bulanselesai,$tahun){
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
		("select concat('$bulantext[$bulanmulai] - $bulantext[$bulanselesai] $tahun')periode, pr.id_perusahaan, nama_perusahaan, fee, sum(total_jamkerja)tjaker,sum(total_lembur)tlembur, sum(total_ope) tope from tbl_perusahaan pr join tbl_timesheet ts on pr.id_perusahaan = ts.id_perusahaan 
			where bulan>=$bulanmulai && bulan<=$bulanselesai && tahun =$tahun && pr.id_perusahaan='$idperusahaan' ");
		return $query->row_array();
	}
	public function getevaluasitable($idperusahaan,$bulanmulai,$bulanselesai,$tahun)
	{
		
		$query=$this->db->query
		("select ts.npwp,nama_user,total_jamkerja,total_lembur,total_ope from tbl_user us join tbl_timesheet ts
			on us.npwp=ts.npwp 
			where id_perusahaan='$idperusahaan' && bulan>=$bulanmulai && bulan<=$bulanselesai && tahun=$tahun group by ts.npwp");
		return $query->result_array();
	}

}

/* End of file job_m.php */
/* Location: ./application/models/job_m.php */