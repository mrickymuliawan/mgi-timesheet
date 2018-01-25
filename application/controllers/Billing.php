<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Billing extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('billing_m');
	}
	public function index()
	{
		$this->load->view('billing/show_billing_v');
	}
	// MENAMPILKAN DATA ADA DUA CARA 
	public function getdikerjakan()
	{
		$bulan=$this->input->get_post('bulan'); 
		$tahun=$this->input->get_post('tahun');
		$table=$this->billing_m->getdikerjakan($bulan,$tahun);
		
		foreach ($table as $key => $value) {
			$value2=$this->billing_m->gettotal($value['id_job']);
			$r=array();
			$r[]=$key+1;
			$r[]=$value['job_number'];
			$r[]=$value['nama_perusahaan'];
			$r[]="<span class='number-format2'>Rp. $value2[fee]</span>";
			$r[]="<span class='number-format2'>Rp. $value2[tottranslembur]</span>";
			$r[]="<span class='number-format2'>Rp. $value2[totuangmakan]</span>";
			$r[]="<span class='number-format2'>Rp. $value2[totope]</span>";

			$r[]="<button class='btn btn-outline-primary btn-sm btn-detail' value='$value[id_job]'
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
	public function getselesai()
	{
		$bulan=$this->input->get_post('bulan'); 
		$tahun=$this->input->get_post('tahun');
		$table=$this->billing_m->getselesai($bulan,$tahun);
		
		foreach ($table as $key => $value) {
			$value2=$this->billing_m->gettotal($value['id_job']);
			$r=array();
			$r[]=$key+1;
			$r[]=$value['job_number'];
			$r[]=$value['nama_perusahaan'];
			$r[]="<span class='number-format2'>Rp. $value2[fee]</span>";
			$r[]="<span class='number-format2'>Rp. $value2[tottranslembur]</span>";
			$r[]="<span class='number-format2'>Rp. $value2[totuangmakan]</span>";
			$r[]="<span class='number-format2'>Rp. $value2[totope]</span>";

			$r[]="<button class='btn btn-outline-info btn-sm btn-detail' value='$value[id_job]'
						data-toggle='popover' data-placement='top' data-content='Detail'>
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
	
	public function getdetailbilling($id='dipakai sesuai ajax')
	{
		$idjob=$this->input->get_post('idjob');
		$bulan=$this->input->get_post('bulan');
		$tahun=$this->input->get_post('tahun');
		$result=$this->billing_m->getdetailbilling($idjob,$bulan,$tahun);
		echo json_encode($result);
	}

	public function getdetailuser($id='dipakai sesuai ajax')
	{
		$idjob=$this->input->get_post('idjob');
		$table=$this->db->query
		("select distinct nama_user, ts.npwp from tbl_timesheet ts
			inner join tbl_user us on ts.npwp=us.npwp where id_job='$idjob'")->result_array();
		$tbody='';
		$no=1;
		foreach ($table as $key => $value) {
			$total=$this->db->query
			("select sum(total_ope)tope,sum(total_uang_makan)tumakan,sum(total_transport_lembur)ttranslembur 
				from tbl_timesheet 
				where id_job='$idjob' && npwp='$value[npwp]'")->row_array();
		
			$tbody.= "<tr>
						<td>$no</td>
						<td>$value[npwp]</td>
						<td>$value[nama_user]</td>
						<td><span class='number-format2'>Rp. $total[tope]</span></td>
						<td><span class='number-format2'>Rp. $total[tumakan]</span></td>
						<td><span class='number-format2'>Rp. $total[ttranslembur]</span></td>
						<tr>";
			$no++;
		}
		$data['tbody'][]=$tbody;
		echo json_encode($data);
	}

	// tab report timesheet
	function getreporttab(){
		$idjob=$this->input->get_post('idjob');
		$table=$this->db->
		query("select nama_user,tanggal,bulan,tahun,td.transport_lembur,td.uang_makan,ope,pic,ts.status 
						from tbl_timesheetdetail td 
						join tbl_timesheet ts  on td.id_timesheet=ts.id_timesheet
						join tbl_perusahaan pr on ts.id_perusahaan=pr.id_perusahaan 
						join tbl_perusahaandetail prd on td.id_perusahaandetail=prd.id_perusahaandetail
						join tbl_user us on ts.npwp=us.npwp 
						where 
						id_job='$idjob'
						&& ((tipe_kerja='client') or (transport_lembur > 0 or uang_makan > 0)) 
						 ")->result_array();
		$total=$this->db->
		query("select sum(total_transport_lembur) tlembur, sum(total_uang_makan) tumakan, sum(total_ope) tope 
					from tbl_timesheet
					where id_job='$idjob'")->row_array();
		$tbody='';
		$no=1;
		foreach ($table as $key => $value) {
			$pic=$this->db->get_where("tbl_user",array('npwp'=>$value['pic']))->row_array();
			$tbody.="<tr>";
			$tbody.="<td>$no</td>";
			$tbody.="<td>$value[tanggal]-$value[bulan]-$value[tahun]</td>";
			$tbody.="<td>$value[nama_user]</td>";
			$tbody.="<td><span class='number-format2'>$value[transport_lembur]</span></td>";
			$tbody.="<td><span class='number-format2'>$value[uang_makan]</span></td>";
			$tbody.="<td><span class='number-format2'>$value[ope]</span></td>";
			$tbody.="<td>$pic[nama_user]</td>";
			$tbody.="<td><span class='text-green'>$value[status]</span></td>";
			$tbody.="</tr>";
			$no++;
		}
		$tbody.="<tr>";
		$tbody.="<th colspan='3'>TOTAL</th>";
		$tbody.="<th><span class='number-format2'>$total[tlembur]</span></th>";
		$tbody.="<th><span class='number-format2'>$total[tumakan]</span></th>";
		$tbody.="<th><span class='number-format2'>$total[tope]</span></th>";
		$tbody.="<th colspan=2></th>";
		$tbody.="</tr>";
		$data['tbody']=$tbody;
		echo json_encode($data);
	}

	public function printpage($print){

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
		if ($print=='detail') {
			$idjob=$this->input->get_post('idjob');
			$bulan=$this->input->get_post('bulan');
			$tahun=$this->input->get_post('tahun');

			$detail=$this->billing_m->getdetailbilling($idjob,$bulan,$tahun);
			$table=$this->db->query
			("select distinct nama_user, ts.npwp from tbl_timesheet ts
				inner join tbl_user us on ts.npwp=us.npwp where id_job='$idjob'")->result_array();
			$data['table']="";
			$no=1;
			foreach ($table as $key => $value) {
				$total=$this->db->query
				("select sum(total_ope)tope,sum(total_uang_makan)tumakan,sum(total_transport_lembur)ttranslembur 
					from tbl_timesheet 
					where id_job='$idjob' && npwp='$value[npwp]'")->row_array();
			
				$data['table'].= "<tr>
							<td>$no</td>
							<td>$value[npwp]</td>
							<td>$value[nama_user]</td>
							<td><span class='number-format3'>Rp. $total[tope]</span></td>
							<td><span class='number-format3'>Rp. $total[tumakan]</span></td>
							<td><span class='number-format3'>Rp. $total[ttranslembur]</span></td>
							<tr>";
				$no++;
			}
			$data['nama_perusahaan']=$detail['nama_perusahaan'];
			$data['periode']="$bulantext[$bulan]-$tahun";
      $data['print']='billingdetail';
		}
		elseif($print=='report'){
			$idjob=$this->input->get_post('idjob');
			$bulan=$this->input->get_post('bulan');
			$tahun=$this->input->get_post('tahun');
			
			$table=$this->db->
			query("select nama_user,tanggal,bulan,tahun,td.transport_lembur,td.uang_makan,ope,pic,ts.status 
							from tbl_timesheetdetail td 
							join tbl_timesheet ts  on td.id_timesheet=ts.id_timesheet
							join tbl_perusahaan pr on ts.id_perusahaan=pr.id_perusahaan 
							join tbl_perusahaandetail prd on td.id_perusahaandetail=prd.id_perusahaandetail
							join tbl_user us on ts.npwp=us.npwp 
							where
							id_job='$idjob'
							&& ((tipe_kerja='client') or (transport_lembur > 0 or uang_makan > 0)) 
							 ")->result_array();
			$detail=$this->billing_m->getdetailbilling($idjob,$bulan,$tahun);
			$total=$this->db->
			query("select sum(total_transport_lembur) tlembur, sum(total_uang_makan) tumakan, 
						sum(total_ope) tope 
						from tbl_timesheet 
						where id_job='$idjob'")->row_array();
			$no=1;
			$data['table']="";
			
			foreach ($table as $key => $value) {
				$data['table'].=
				"<tr>
	        <td>$no </td>
	        <td>$value[tanggal]-$value[bulan]-$value[tahun]</td>
	        <td>$value[nama_user] </td>
	        <td><span class='number-format3'>$value[transport_lembur] </span></td>
	        <td><span class='number-format3'>$value[uang_makan] </span></td>
	        <td><span class='number-format3'>$value[ope] </span></td>
	        <td>$value[pic] </td>
	        <td>$value[status] </td>
	      </tr>";

	      $no++;
			}
				$data['table'].=
				"<tr>
	        <td colspan='3'></td>
	        <th><span class='number-format3'>$total[tlembur] </span></th>
	        <th><span class='number-format3'>$total[tumakan] </span></th>
	        <th><span class='number-format3'>$total[tope] </span></th>
	        <th colspan=2></th>
	      </tr>";
	      $data['nama_perusahaan']=$detail['nama_perusahaan'];
				$data['periode']="$bulantext[$bulan]-$tahun";
	      $data['print']='billingreport';
    }
		$this->load->view('templates/print',$data);
	}
}