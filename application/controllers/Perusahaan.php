<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perusahaan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('perusahaan_m');
	}
	public function index()
	{
		$this->load->view('perusahaan/show_perusahaan_v');
	}
	// MENAMPILKAN DATA ADA DUA CARA 
	public function getall()
	{

		$table=$this->perusahaan_m->getall();
		
		foreach ($table as $key => $value) {
			$r=array();
			$r[]=$key+1;
			$r[]=$value['nama_perusahaan'];
			$r[]="<span class='number-format2'>Rp. $value[fee]</span>";

			$r[]="<button class='btn btn-outline-info btn-sm btn-edit' value='$value[id_perusahaan]'
						data-toggle='popover' data-placement='top' data-content='Edit'>
							<i class='fa fa-edit'></i>
						</button>  
						";
						// <button class='btn btn-outline-danger btn-sm btn-delete' value='$value[id_perusahaan]'>
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


	// INSERT DATA
	public function add()
	{
		$namaperusahaan=$this->input->get_post('namaperusahaan');
		$fee=$this->input->get_post('fee');
		$jumlahkota=$this->input->get_post('jumlahkota');
		$data = array(
									'nama_perusahaan' => $namaperusahaan,
									'jumlah_kota' => $jumlahkota,
									'fee' => $fee);
		$this->perusahaan_m->insert($data);

		//input to tbl_perusahaandetail
		$lastrow=$this->db->query("select * from tbl_perusahaan order by id_perusahaan desc limit 1")->row_array();
		for ($i=1; $i <= $jumlahkota ; $i++) { 
			$data = array(
							'id_perusahaan' => $lastrow['id_perusahaan'],
 							'alamat' => $this->input->get_post("alamat$i"),
							'kota' => $this->input->get_post("kota$i"),
							'ope' => $this->input->get_post("ope$i")
							);
			$this->perusahaan_m->insert_detail($data);
		}
	}

	// MENGAMBIL id, BISA DENGAN AJAX URL ATAU AJAX DATA
	public function getedit($id='dipakai sesuai ajax')
	{
		$id=$this->input->get_post('id');
		$table=$this->perusahaan_m->getedit($id);
		echo json_encode($table);
	}

	// MENGAMBIL id, BISA DENGAN AJAX URL ATAU AJAX DATA
	public function edit($id='dipakai sesuai ajax')
	{
		$id=$this->input->get_post('idperusahaan');
		$namaperusahaan=$this->input->get_post('namaperusahaan');
		$fee=$this->input->get_post('fee');
		$jumlahkota=$this->input->get_post('jumlahkota');
		$data = array(
									'id_perusahaan' => $id,
									'nama_perusahaan' => $namaperusahaan,
									'jumlah_kota' => $jumlahkota,
									'fee' => $fee);
		$this->perusahaan_m->edit($id,$data);

		// perusahaan detaul
		for ($i=1; $i <= $jumlahkota ; $i++) { 
			$data = array(
							'id_perusahaan' => $id,
 							'alamat' => $this->input->get_post("alamat$i"),
							'kota' => $this->input->get_post("kota$i"),
							'ope' => $this->input->get_post("ope$i")
							);
			$this->perusahaan_m->edit_detail($id,$data);
		}
	}
	// MENGAMBIL id, BISA DENGAN AJAX URL ATAU AJAX DATA
	public function delete($id='dipakai sesuai ajax')
	{
		$id=$this->input->get_post('id');
		$this->perusahaan_m->delete($id);
	}

}