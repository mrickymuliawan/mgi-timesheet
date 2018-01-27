<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_m');
	}
	public function index(){
		$this->load->view('user/show_user_v');
	}
	// MENAMPILKAN DATA ADA DUA CARA 
	public function getuser()
	{

		$table=$this->user_m->getuser();

		
		foreach ($table as $key => $value) {
			$r=array();
			$r[]=$key+1;
			$r[]=$value['npwp'];
			$r[]=$value['nama_user'];
			$r[]=$value['jabatan'];
			$r[]="<span class='number-format2'>Rp. $value[gaji_pokok]</span>";
			$r[]=$value['role'];
			$r[]=$value['status'];

			// saldo cuti menjadi hari
			$saldocuti=$value['saldo_cuti'];
			$saldojam=$saldocuti%8;
			$saldohari=($saldocuti-$saldojam)/8;
			$r[]="$saldocuti ($saldohari Hari $saldojam Jam)";

			$r[]="<button class='btn btn-outline-info btn-sm btn-edit' value='$value[npwp]' 
						 data-toggle='popover' data-placement='top' data-content='Edit'>
							<i class='fa fa-edit'></i>
						</button>  
						
						<a class='btn btn-outline-success btn-sm btn-login' href='login/adminlogin?npwp=$value[npwp]'
						data-toggle='popover' data-placement='top' data-content='Login'>
							<i class='fa fa-sign-in'></i>
						</a>  ";

			$data[]=$r;
		}
		if ($table) {
			echo json_encode( array('data' =>  $data ));
		}
		else{
			echo json_encode( array('data' =>  0));
		}
		
	}

	public function getadmin()
	{

		$table=$this->user_m->getadmin();

		
		foreach ($table as $key => $value) {
			$r=array();
			$r[]=$key+1;
			$r[]=$value['npwp'];
			$r[]=$value['nama_user'];
			$r[]=$value['jabatan'];
			$r[]=$value['role'];


			$r[]="<button class='btn btn-outline-info btn-sm btn-edit' value='$value[npwp]'
						data-toggle='popover' data-placement='top' data-content='Edit'>
							<i class='fa fa-edit'></i>
						</button>  
						";

			$data[]=$r;
		}
		if ($table) {
			echo json_encode( array('data' =>  $data ));
		}
		else{
			echo json_encode( array('data' =>  0));
		}
		
	}
	// ADD JAM CUTI
	public function addjamcuti(){
		$jumlahjam=$this->input->get_post('jumlahjam');
		$operasi=$this->input->get_post('operasi');
		$this->user_m->addjamcuti($jumlahjam,$operasi);
	}
	// INSERT DATA
	public function add()
	{
		$npwp=$this->input->get_post('npwp');
		$namauser=$this->input->get_post('namauser');
		$password=$this->input->get_post('password');
		$password=hash('ripemd160', $password);

		$jabatan=$this->input->get_post('jabatan');
		$gajipokok=$this->input->get_post('gajipokok');
		$tunjangantransport=$this->input->get_post('tunjangantransport');
		$tunjanganparkir=$this->input->get_post('tunjanganparkir');
		$tunjangankomunikasi=$this->input->get_post('tunjangankomunikasi');
		$role=$this->input->get_post('role');
		$status=$this->input->get_post('status');
		$saldocuti=$this->input->get_post('saldocuti');
		$uanglembur1=round(($gajipokok/173)*1.5,-2);
		$uanglembur2=round(($gajipokok/173)*2,-2);
		$data = array(
								'npwp' => $npwp,
								'nama_user' => $namauser,
								'password' => $password,
								'jabatan' => $jabatan,
								'gaji_pokok' => $gajipokok,
								'tunjangan_transport' => $tunjangantransport,
								'tunjangan_parkir' => $tunjanganparkir,
								'tunjangan_komunikasi' => $tunjangankomunikasi,
								'role' => $role,
								'status' => $status,
								'saldo_cuti' => $saldocuti,
								'uang_lembur1'=>$uanglembur1,
								'uang_lembur2'=>$uanglembur2);
		$this->user_m->insert($data);
	}

	// MENGAMBIL id, BISA DENGAN AJAX URL ATAU AJAX DATA
	public function getedit($id='dipakai sesuai ajax')
	{
		$npwp=$this->input->get_post('npwp');
		$table=$this->user_m->getedit($npwp);
		echo json_encode($table);
	}

	// MENGAMBIL id, BISA DENGAN AJAX URL ATAU AJAX DATA
	public function edit($id='dipakai sesuai ajax')
	{
		$npwp=$this->input->get_post('npwp');
		$namauser=$this->input->get_post('namauser');
		$jabatan=$this->input->get_post('jabatan');
		$gajipokok=$this->input->get_post('gajipokok');
		$tunjangantransport=$this->input->get_post('tunjangantransport');
		$tunjanganparkir=$this->input->get_post('tunjanganparkir');
		$tunjangankomunikasi=$this->input->get_post('tunjangankomunikasi');
		$role=$this->input->get_post('role');
		$status=$this->input->get_post('status');
		$saldocuti=$this->input->get_post('saldocuti');
		$uanglembur1=round(($gajipokok/173)*1.5,-2);
		$uanglembur2=round(($gajipokok/173)*2,-2);
		$data = array('npwp' => $npwp,
									'nama_user' => $namauser,
									'jabatan' => $jabatan,
									'gaji_pokok' => $gajipokok,
									'tunjangan_transport' => $tunjangantransport,
									'tunjangan_parkir' => $tunjanganparkir,
									'tunjangan_komunikasi' => $tunjangankomunikasi,
									'role' => $role,
									'status' => $status,
									'saldo_cuti' => $saldocuti,
									'uang_lembur1'=>$uanglembur1,
									'uang_lembur2'=>$uanglembur2);
		$this->user_m->edit($npwp,$data);
	}

	// MENGAMBIL id, BISA DENGAN AJAX URL ATAU AJAX DATA
	public function delete($id='dipakai sesuai ajax')
	{
		$npwp=$this->input->get_post('npwp');
		$this->user_m->delete($npwp);
	}
	public function checknpwp(){
		$npwp=$this->input->get_post('npwp');
		$result=$this->db->get_where('tbl_user',array('npwp' => $npwp ));
		if($result->num_rows() == 0){
			echo 'true';

		}
		else{
			echo 'false';
		}
	}
	public function resetpass()
	{
		$npwp=$this->input->get_post('npwp');
		$password=hash('ripemd160', $npwp);
		$data = array('npwp' => $npwp,
									'password' => $password);
		$this->user_m->resetpass($npwp,$data);
	}

}