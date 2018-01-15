<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Controlcuti extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Controlcuti_m');
		$this->npwp=$this->session->userdata('npwp');
	}
	public function index(){
		$this->load->view('controlcuti/show_controlcuti_v');
	}

	public function getall()
	{
		$npwp=$this->npwp;
		$bulan=$this->input->get_post('bulan'); 
		$tahun=$this->input->get_post('tahun');
		$table=$this->Controlcuti_m->getall($bulan,$tahun);
		foreach ($table as $key => $value) {
			
			$tbody=array();
			$tbody[]=$key+1;
			$tbody[]=$value['npwp'];
			$tbody[]=$value['nama_user'];
			$tbody[]=$this->saldotohari($value['saldo_awal']);																
			$tbody[]=$this->saldotohari($value['saldo_awal']-$value['saldo_akhir']); 
			$tbody[]=$this->saldotohari($value['saldo_akhir']); 
			$tbody[]=$this->saldotohari($value['saldo_cuti']); // saldo skrg

			$data[]=$tbody;
		}
		if ($table) {
			echo json_encode( array('data' =>  $data ));
		}
		else{
			echo json_encode( array('data' =>  0));
		}
	}
	function saldotohari($saldo){
		// saldo cuti menjadi hari
		$saldocuti=$saldo;
		$saldojam=$saldocuti%8;
		$saldohari=($saldocuti-$saldojam)/8;
		$return="$saldocuti ($saldohari Hari $saldojam Jam)";
		return $return;
	}
}