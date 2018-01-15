<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Evaluasi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('evaluasi_m');
	}
	public function index()
	{
		$this->load->view('evaluasi/show_evaluasi_v');
	}
	// MENAMPILKAN DATA ADA DUA CARA 
	public function getdata()
	{
		$bulanmulai=$this->input->get_post('bulanmulai'); 
		$bulanselesai=$this->input->get_post('bulanselesai');
		$tahun=$this->input->get_post('tahun');
		$table=$this->evaluasi_m->getdata($bulanmulai,$bulanselesai,$tahun);
		
		foreach ($table as $key => $value) {
			// $value2=$this->evaluasi_m->gettotal($value['id_job']);
			$r=array();
			$r[]=$key+1;
			$r[]=$value['nama_perusahaan'];
			$r[]="<span class='number-format2'>Rp. $value[fee]</span>";
			$r[]="<span class='number-format2'>Rp. $value[tjaker]</span>";
			$r[]="<span class='number-format2'>Rp. $value[tlembur]</span>";
			$r[]="<span class='number-format2'>Rp. $value[tope]</span>";

			$r[]="<button class='btn btn-outline-primary btn-sm btn-detail' value='$value[id_perusahaan]'
						data-toggle='popover' data-placement='top' data-content='Detail'>
							<i class='fa fa-search-plus'></i>
						</button>  
						";
						// <button class='btn btn-outline-danger btn-sm btn-delete' value='$value[id_job]'>
							// <i class='fa fa-trash-o'></i>
						// </button>

			$data[]=$r;
		}
		if ($table) {
			echo json_encode( array('data' =>  $data ));
		}
		else{
			echo json_encode( array('data' =>  0));
		}
		
	}
	
	public function getdetailevaluasi($id='dipakai sesuai ajax')
	{
		$idperusahaan=$this->input->get_post('idperusahaan'); 
		$bulanmulai=$this->input->get_post('bulanmulai'); 
		$bulanselesai=$this->input->get_post('bulanselesai');
		$tahun=$this->input->get_post('tahun');
		$result=$this->evaluasi_m->getdetailevaluasi($idperusahaan,$bulanmulai,$bulanselesai,$tahun);
		echo json_encode($result);
	}

	public function getevaluasitable($id='dipakai sesuai ajax')
	{
		$idperusahaan=$this->input->get_post('idperusahaan'); 
		$bulanmulai=$this->input->get_post('bulanmulai'); 
		$bulanselesai=$this->input->get_post('bulanselesai');
		$tahun=$this->input->get_post('tahun');
		$table=$this->evaluasi_m->getevaluasitable($idperusahaan,$bulanmulai,$bulanselesai,$tahun);
		$tbody='';
		$no=1;
		foreach ($table as $key => $value) {
			$gaji=0;
			for ($bulan=$bulanmulai; $bulan <=$bulanselesai ; $bulan++) { 
				$result=$this->db->
				query("select 
							(select total_gaji from tbl_penggajian where bulan=$bulan && tahun=$tahun && npwp='$value[npwp]') / 
							(select count(*) from tbl_timesheet where bulan=$bulan && tahun=$tahun && npwp='$value[npwp]') 
							as gaji from tbl_user where npwp='$value[npwp]'")->row_array();
				$gaji+=ceil($result['gaji']);
			}
			$tbody.= "<tr>
						<td>$no</td>
						<td>$value[nama_user]</td>
						<td><span class='number-format2'>Rp. $value[total_jamkerja]</span></td>
						<td><span class='number-format2'>Rp. $value[total_lembur]</span></td>
						<td><span class='number-format2'>Rp. $value[total_ope]</span></td>
						<tr>";
			$no++;
		}
		$data['tbody'][]=$tbody;
		echo json_encode($data);
	}

	

	public function printpage($print){

	
		$idperusahaan=$this->input->get_post('idperusahaan'); 
		$bulanmulai=$this->input->get_post('bulanmulai'); 
		$bulanselesai=$this->input->get_post('bulanselesai');
		$tahun=$this->input->get_post('tahun');

		$detail=$this->evaluasi_m->getdetailevaluasi($idperusahaan,$bulanmulai,$bulanselesai,$tahun);
		$table=$this->evaluasi_m->getevaluasitable($idperusahaan,$bulanmulai,$bulanselesai,$tahun);
		$data['table']="";
		$no=1;
		foreach ($table as $key => $value) {
			$gaji=0;
			for ($bulan=$bulanmulai; $bulan <=$bulanselesai ; $bulan++) { 
				$result=$this->db->
				query("select 
							(select total_gaji from tbl_penggajian where bulan=$bulan && tahun=$tahun && npwp='$value[npwp]') / 
							(select count(*) from tbl_timesheet where bulan=$bulan && tahun=$tahun && npwp='$value[npwp]') 
							as gaji from tbl_user where npwp='$value[npwp]'")->row_array();
				$gaji+=ceil($result['gaji']);
			}
			$data['table'].= "<tr>
						<td>$no</td>
						<td>$value[nama_user]</td>
						<td><span class='number-format3'>Rp. $value[total_jamkerja]</span></td>
						<td><span class='number-format3'>Rp. $value[total_lembur]</span></td>
						<td><span class='number-format3'>Rp. $value[total_ope]</span></td>
						<td><span class='number-format3'>Rp. $gaji</span></td>
						<tr>";
			$no++;
		}
		$data['nama_perusahaan']=$detail['nama_perusahaan'];
		$data['periode']=$detail['periode'];
    $data['print']='evaluasi';
		
		
		$this->load->view('templates/print',$data);
	}
}