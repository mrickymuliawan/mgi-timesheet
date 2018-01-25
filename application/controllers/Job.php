<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Job extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('job_m');
	}
	public function index()
	{
		$this->load->view('job/show_job_v');
	}
	// MENAMPILKAN DATA ADA DUA CARA 
	public function getdikerjakan()
	{
		$bulan=$this->input->get_post('bulan'); 
		$tahun=$this->input->get_post('tahun');
		$table=$this->job_m->getdikerjakan($bulan,$tahun);
		foreach ($table as $key => $value) {
			$r=array();
			$r[]=$key+1;
			$r[]=$value['job_number'];
			$r[]=$value['id_perusahaan'];
			$r[]=$value['nama_perusahaan'];
			$r[]=$value['tanggal_mulai'];
			// $r[]="<span class='number-format2'>Rp. $value[total_transport_lembur]</span>";
			// $r[]="<span class='number-format2'>Rp. $value[total_ope]</span>";

			$r[]="<button class='btn btn-outline-info btn-sm btn-edit' value='$value[id_job]'
						data-toggle='popover' data-placement='top' data-content='Edit'>
							<i class='fa fa-edit'></i>
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
	public function getselesai()
	{
		$bulan=$this->input->get_post('bulan'); 
		$tahun=$this->input->get_post('tahun');
		$table=$this->job_m->getselesai($bulan,$tahun);
		foreach ($table as $key => $value) {
			$r=array();
			$r[]=$key+1;
			$r[]=$value['job_number'];
			$r[]=$value['id_perusahaan'];
			$r[]=$value['nama_perusahaan'];
			$r[]=$value['tanggal_mulai'];
			// $r[]="<span class='number-format2'>Rp. $value[total_transport_lembur]</span>";
			// $r[]="<span class='number-format2'>Rp. $value[total_ope]</span>";

			$r[]="<button class='btn btn-outline-info btn-sm btn-edit' value='$value[id_job]'>
							<i class='fa fa-edit'></i>
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
	// AUTO COMPLETE
	public function autocomperusahaan()
	{	
		$search=$this->input->get_post('search');
		$result=$this->db->query
			("select * from tbl_perusahaan where nama_perusahaan like '%$search%'")->result_array(); 
		foreach ($result as $key => $value) {
			$array[]=array("value"=>"$value[id_perusahaan]",
						   "label"=>"$value[nama_perusahaan] ");;
		}
		echo json_encode($array);
	}

	public function chooseperusahaan($id='dipakai sesuai ajax')
	{
		$id=$this->input->get_post('id');
		$result=$this->db->query
			("select * from tbl_perusahaan where id_perusahaan like '%$id%'")->row_array(); 
		echo json_encode($result);
	}
	// INSERT DATA
	public function add()
	{
		$jobnumber=$this->input->get_post('jobnumber');
		$tanggalmulai=date('Y/m/d',strtotime($this->input->get_post('tanggalmulai')));
		$idperusahaan=$this->input->get_post('idperusahaan');
		$namaperusahaan=$this->input->get_post('namaperusahaan');
		$status=$this->input->get_post('status');
		$data = array(
									'job_number' => $jobnumber,
									'tanggal_mulai' => $tanggalmulai,
									'id_perusahaan' => $idperusahaan,
									'nama_perusahaan' => $namaperusahaan,
									'status' => $status);
		$this->job_m->insert($data);
	}

	// MENGAMBIL id, BISA DENGAN AJAX URL ATAU AJAX DATA
	public function getedit($id='dipakai sesuai ajax')
	{
		$id=$this->input->get_post('id');
		$result=$this->job_m->getedit($id);
		echo json_encode($result);
	}

	// MENGAMBIL id, BISA DENGAN AJAX URL ATAU AJAX DATA
	public function edit($id='dipakai sesuai ajax')
	{
		$id=$this->input->get_post('idjob');
		$jobnumber=$this->input->get_post('jobnumber');
		$tanggalmulai=date('Y/m/d',strtotime($this->input->get_post('tanggalmulai')));
		$idperusahaan=$this->input->get_post('idperusahaan');
		$namaperusahaan=$this->input->get_post('namaperusahaan');
		$status=$this->input->get_post('status');
		$data = array('id_job' => $id,
									'job_number' => $jobnumber,
									'tanggal_mulai' => $tanggalmulai,
									'status' => $status,
									'id_perusahaan' => $idperusahaan,
									'nama_perusahaan' => $namaperusahaan,);
		$this->db->where('id_job', $id);
		$this->db->update('tbl_timesheet', array('id_perusahaan' => $idperusahaan));
		$this->job_m->edit($id,$data);
	}

	// MENGAMBIL id, BISA DENGAN AJAX URL ATAU AJAX DATA
	public function delete($id='dipakai sesuai ajax')
	{
		$id=$this->input->get_post('id');
		$this->job_m->delete($id);
	}
	public function checkjobnumber(){
		$jobnumber=$this->input->get_post('jobnumber');
		$result=$this->db->get_where('tbl_job',array('job_number' => $jobnumber ));
		if($result->num_rows() == 0){
			echo 'true';

		}
		else{
			echo 'false';
		}
	}
}