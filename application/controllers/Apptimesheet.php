<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Apptimesheet extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('apptimesheet_m');
		$this->npwp=$this->session->userdata('npwp');
	}
	public function index(){
		$this->load->view('timesheet/show_apptimesheet_v');
	}

	public function getall1()
	{
		$npwp=$this->npwp;
		$bulan=$this->input->get_post('bulan'); 
		$tahun=$this->input->get_post('tahun');
		$periode=1;
		$table=$this->apptimesheet_m->getall($bulan,$tahun,$periode,$npwp);
		
		foreach ($table as $key => $value) {
			$tbody=array();
			$tbody[]=$value['nama_user'];
			$tbody[]=$value['totallembur'];
			$tbody[]=$value['totjaker'];

			$tbody[]="<input type='hidden' name='npwp' value='$value[npwp]'>
							<input type='hidden' name='periode' value='1'>
							<button class='btn btn-outline-primary btn-sm btn-details'
							data-toggle='popover' data-placement='top' data-content='Detail'>
								<i class='fa fa-search-plus'></i>
							</button>";
			$data[]=$tbody;
		}
		if ($table) {
			echo json_encode( array('data' =>  $data ));
		}
		else{
			echo json_encode( array('data' =>  0));
		}
	}

	public function getall2()
	{
		$npwp=$this->npwp;
		$bulan=$this->input->get_post('bulan'); 
		$tahun=$this->input->get_post('tahun');
		$periode=2;
		$table=$this->apptimesheet_m->getall($bulan,$tahun,$periode,$npwp);
		
		foreach ($table as $key => $value) {
			$tbody=array();
			$tbody[]=$value['nama_user'];
			$tbody[]=$value['totallembur'];
			$tbody[]=$value['totjaker'];

			$tbody[]="<input type='hidden' name='npwp' value='$value[npwp]'>
							<input type='hidden' name='periode' value='2'>
							<button class='btn btn-outline-primary btn-sm btn-details'>
								<i class='fa fa-search-plus'></i>
							</button>";
			$data[]=$tbody;
		}
		if ($table) {
			echo json_encode( array('data' =>  $data ));
		}
		else{
			echo json_encode( array('data' =>  0));
		}
	}

	public function gettimesheet1()
	{	
		// set nilai awal
		$npwp=$this->input->get_post('npwp');
		$bulan=$this->input->get('bulan'); 
		$tahun=$this->input->get('tahun');
		$libur =$this->getWeekend($tahun,$bulan);
		$liburcustom=$this->getLibur($tahun,$bulan,$npwp);
		$hari =$this->getDays($tahun,$bulan);


		// membuat thead table timesheet 				--------------> THEAD
		$thead="<tr class='nama-hari'>
							<th>Nama Perusahaan</th>
							<th>OPE</th>";
		for ($i=0; $i < 15; $i++) {
			$tanggal=$i+1; 
			$namahari=$this->db->query("select nama_hari,keterangan from tbl_libur where npwp='$npwp' and tanggal='$tahun/$bulan/$tanggal'")->row_array();
			if (in_array($i+1, $libur)) {
			  $thead.="<th class='td-libur td-disabled'><p>$tanggal</p> $hari[$i]</th>";
			}
			elseif (in_array($i+1, $liburcustom)) {
			  $thead.="<th class='td-libur-custom td-hover' ><div data-toggle='popover' 
			  						data-content='$namahari[nama_hari] - $namahari[keterangan]' data-placement='top'>
			  					<p>$tanggal</p> $hari[$i]</div>
			  					</th>";
			}
			else{
				$thead.="<th class='td-hari td-hover'><p>$tanggal</p> $hari[$i]</th>";
			}
		}
		$thead.="	<th>Total</th>
							<th>Total OPE</th>
							<th>PIC</th>
							<th>Status</th>
						</tr>";
		$data['thead'][]=$thead;

		// query mengambil jumlah timesheet per tanggal tahun dan periode
		$idtimesheet=$this->db->query
			("select tm.id_timesheet from tbl_perusahaan pr 
				inner join tbl_timesheet tm on pr.id_perusahaan = tm.id_perusahaan 
				where bulan=$bulan and periode=1 and tahun=$tahun and npwp='$npwp' 
				order by id_timesheet ")->result_array();
		// jika ada, buat table
		if ($idtimesheet) {

			// mngambil id timesheet dan tampilkan 	
			foreach ($idtimesheet as $key => $value) {
				$array[]=$value['id_timesheet'];
			}
			$length=count($array);
			for ($i=0; $i <$length ; $i++) { 

				// membuat tbody table timesheet 			--------------> TBODY
				$tbody="<tr>";

				$timesheet=$this->db->query
				("select pr.nama_perusahaan, pr.ope, tm.id_timesheet,
								 pr.id_perusahaan,total_jamkerja,total_ope,pic,status 
				from tbl_perusahaan pr inner join tbl_timesheet tm on pr.id_perusahaan = tm.id_perusahaan 
				where tm.id_timesheet=$array[$i]")->row_array();

				$timesheetpic=$this->db->query // ambil nama user sesuai npwp pic
				("select * from tbl_user where npwp='$timesheet[pic]'")->row_array();

				$tbody.="<td class='td-idtimesheet td-hover'>$timesheet[nama_perusahaan]
										 <input type='hidden' value='$timesheet[id_timesheet]' name='idtimesheet'>
										 <input type='hidden' value='$timesheet[nama_perusahaan]' name='namaperusahaan'></td>
										 <td>Rp. <span class='number-format2'>$timesheet[ope]</span></td>";

				for ($j=1; $j <=15 ; $j++) { 
					$timesheetdetail=$this->db->query
					("select jam_kerja,id_timesheet,tipe_kerja from tbl_timesheetdetail 
						where tanggal = $j and id_timesheet=$array[$i]")->row_array();
					
					if (in_array($j, $libur)) {
					    $tbody.="<td class='td-libur td-jamkerja td-hover'>$timesheetdetail[jam_kerja]
					    <input type='hidden' value='$j' name='tanggal'></td>";
					}
					elseif (in_array($j, $liburcustom)) {
					  $tbody.="<th class='td-libur-custom td-disabled'>-</th>";
					}
					else{
						$tbody.="<td class='td-jamkerja td-hover $timesheetdetail[tipe_kerja]'>$timesheetdetail[jam_kerja]
											 <input type='hidden' value='$j' name='tanggal'></td>";
					}
				}

				$tbody.="<td>$timesheet[total_jamkerja]</td>
										 <td>Rp. <span class='number-format2'>$timesheet[total_ope]</span></td>
										 <td class='td-pic td-hover'>
										 	$timesheetpic[nama_user] 
										 	<input type='hidden' name='namapic' value='$timesheetpic[nama_user]'>
										 	<input type='hidden' name='npwppic' value='$timesheetpic[npwp]'>
										 </td>
										 <td><span class='text-green'>$timesheet[status]</span></td>";

				$tbody.="</tr>";
				$data['tbody'][]=$tbody;
			}

			// membuat tfoot table timesheet 				--------------> TFOOT
			$timesheettotal=$this->db->query
			("select sum(total_lembur)totallembur, sum(total_jamkerja)totaljaker, sum(total_ope)totalope 
				from tbl_timesheet where bulan=$bulan and periode=1 and tahun=$tahun and npwp='$npwp'")->row_array();
			
			// tfoot total lembur
			$tfoot="<tr><th colspan='2' >Overtime</th>";
			for ($i=1; $i <=15 ; $i++) { 
				// total lembur per tanggal
				$totlembur=$this->db->query
				("select sum(lembur)totlembur from tbl_timesheetdetail td inner join tbl_timesheet ts
					on td.id_timesheet=ts.id_timesheet 
					where tanggal=$i and bulan=$bulan and tahun=$tahun and npwp='$npwp'")->row_array();
				if (in_array($i, $libur)) {
			  	$tfoot.="<th class='td-libur'>-</th>";
				}
				elseif (in_array($i, $liburcustom)) {
				  $tfoot.="<th class='td-libur-custom'>-</th>";
				}
				else{
					$tfoot.="<th>$totlembur[totlembur]</th>";
				}
			}			
			$tfoot.="<th>$timesheettotal[totallembur]</th>";
			$tfoot.="<th colspan='2'></th>";
			$tfoot.="<th></th>";
			$tfoot.="</tr>";
			$data['tfoot'][]=$tfoot;

			// tfoot total jam kerja
			$tfoot="<tr><th colspan='2' >Total</th>";	
			for ($i=1; $i <=15 ; $i++) { 
				// total jam kerja per tanggal
				$totjaker=$this->db->query
				("select sum(jam_kerja)totjaker from tbl_timesheetdetail td inner join tbl_timesheet ts
					on td.id_timesheet=ts.id_timesheet 
					where tanggal=$i and bulan=$bulan and tahun=$tahun and npwp='$npwp'")->row_array();
				
				if (in_array($i, $libur)) {
			  	$tfoot.="<th class='td-libur'>-</th>";
				}
				elseif (in_array($i, $liburcustom)) {
				  $tfoot.="<th class='td-libur-custom'>-</th>";
				}
				else{
					$tfoot.="<th>$totjaker[totjaker]</th>";
				}
			}
			$tfoot.="<th>$timesheettotal[totaljaker]</th>";
			$tfoot.="<th colspan='2'>Rp. <span class='number-format2'>$timesheettotal[totalope]</span></th>";
			$tfoot.="<th></th>";
			$tfoot.="</tr>";
			$data['tfoot'][]=$tfoot;

			// detail timesheet
			$detailtimesheet=$this->getDetailtimesheet(1,$npwp,$bulan,$tahun);
			$data['detailtimesheet']=$detailtimesheet;
			//encode
			echo json_encode($data);
		}
		else{
			$thead="<tr class='nama-hari'>
								<th>Nama Perusahaan</th>
								<th>OPE</th>";
			for ($i=0; $i < 15; $i++) { 
				$tanggal=$i+1; 
				if (in_array($i+1, $libur)) {
				  $thead.="<th class='td-libur td-disabled'><p>$tanggal</p> $hari[$i]</th>";
				}
				elseif (in_array($i+1, $liburcustom)) {
				  $thead.="<th class='td-libur-custom td-hover'><p>$tanggal</p> $hari[$i]</th>";
				}
				else{
					$thead.="<th class='td-hari td-hover'><p>$tanggal</p> $hari[$i]</th>";
				}
			}
			$thead.="	<th>Total</th>
								<th>Total OPE</th>
								<th>PIC</th>
								<th>Status</th>
							</tr>";
			$data['thead']=$thead;
			$data['tbody']="<p class='text-center'>No data</p>";
			$data['tfoot']="";
			echo json_encode($data);
		}
	}
	public function gettimesheet2()
	{
		// set nilai awal
		$npwp=$this->input->get_post('npwp');
		$bulan=$this->input->get('bulan'); 
		$tahun=$this->input->get('tahun');
		$libur=$this->getWeekend($tahun,$bulan);
		$liburcustom=$this->getlibur($tahun,$bulan,$npwp);
		$hari=$this->getDays($tahun,$bulan);
		$lastday=$this->getLastdays($tahun,$bulan);
		// membuat thead table timesheet 					--------------> THEAD
		$thead="<tr class='nama-hari'>
							<th>Nama Perusahaan</th>
							<th>OPE</th>";
		for ($i=15; $i < $lastday; $i++) {
			$tanggal=$i+1; 
			$namahari=$this->db->query("select nama_hari,keterangan from tbl_libur where npwp='$npwp' and tanggal='$tahun/$bulan/$tanggal'")->row_array(); 
			if (in_array($i+1, $libur) ) {
			  $thead.="<th class='td-libur td-disabled'><p>$tanggal</p> $hari[$i]</th>";
			}
			elseif (in_array($i+1, $liburcustom)) {
			  $thead.="<th class='td-libur-custom td-hover' ><div data-toggle='popover' 
			  						data-content='$namahari[nama_hari] - $namahari[keterangan]' data-placement='top'>
			  					<p>$tanggal</p> $hari[$i]</div>
			  					</th>";
			}
			else{
				$thead.="<th class='td-hari td-hover'><p>$tanggal</p> $hari[$i]</th>";
			}
		}
		$thead.="	<th>Total</th>
							<th>Total OPE</th>
							<th>PIC</th>
							<th>Status</th>
						</tr>";
		$data['thead'][]=$thead;
		// query mengambil jumlah timesheet per tanggal tahun dan periode
		$idtimesheet=$this->db->query
			("select tm.id_timesheet from tbl_perusahaan pr 
				inner join tbl_timesheet tm on pr.id_perusahaan = tm.id_perusahaan 
				where bulan=$bulan and periode=2 and tahun=$tahun and npwp='$npwp' 
				order by id_timesheet ")->result_array();
		// jika ada, buat table
		if ($idtimesheet) {
			// mngambil id timesheet dan tampilkan
			foreach ($idtimesheet as $key => $value) {
				$array[]=$value['id_timesheet'];
			}
			$length=count($array);
			for ($i=0; $i <$length ; $i++) { 

				// membuat tbody table timesheet 			--------------> TBODY
				$tbody="<tr>";

				$timesheet=$this->db->query
				("select pr.nama_perusahaan, pr.ope, tm.id_timesheet,
								 pr.id_perusahaan,total_jamkerja,total_ope,pic,status 
				from tbl_perusahaan pr inner join tbl_timesheet tm on pr.id_perusahaan = tm.id_perusahaan 
				where tm.id_timesheet=$array[$i]")->row_array();

				$timesheetpic=$this->db->query // ambil nama user sesuai npwp pic
				("select * from tbl_user where npwp='$timesheet[pic]'")->row_array();
				
				$tbody.="<td class='td-idtimesheet td-hover'>$timesheet[nama_perusahaan]
										 <input type='hidden' value='$timesheet[id_timesheet]' name='idtimesheet'>
										 <input type='hidden' value='$timesheet[nama_perusahaan]' name='namaperusahaan'></td>
										 <td>Rp. <span class='number-format2'>$timesheet[ope]</span></td>";

				for ($j=16; $j <=$lastday ; $j++) { 
					$timesheetdetail=$this->db->query
					("select jam_kerja,id_timesheet,tipe_kerja from tbl_timesheetdetail 
						where tanggal = $j and id_timesheet=$array[$i]")->row_array();
					if (in_array($j, $libur) or $j>$lastday) {
					    $tbody.="<td class='td-libur td-jamkerja td-hover'>$timesheetdetail[jam_kerja]
					    <input type='hidden' value='$j' name='tanggal'></td>";
					}
					elseif (in_array($j, $liburcustom)) {
					  $tbody.="<th class='td-libur-custom td-disabled'>-</th>";
					}
					else{
						$tbody.="<td class='td-jamkerja td-hover $timesheetdetail[tipe_kerja]'>$timesheetdetail[jam_kerja]
											 <input type='hidden' value='$j' name='tanggal'></td>";
					}
				}

				$tbody.="<td>$timesheet[total_jamkerja]</td>
										 <td>Rp. <span class='number-format2'>$timesheet[total_ope]</span></td>
										 <td class='td-pic td-hover'>
										 	$timesheetpic[nama_user] 
										 	<input type='hidden' name='namapic' value='$timesheetpic[nama_user]'>
										 	<input type='hidden' name='npwppic' value='$timesheetpic[npwp]'>
										 </td>
										 <td><span class='text-green'>$timesheet[status]</span></td>";

				$tbody.="</tr>";
				$data['tbody'][]=$tbody;
			}

			// membuat tfoot table timesheet 				--------------> TFOOT
			$timesheettotal=$this->db->query
			("select sum(total_lembur)totallembur, sum(total_jamkerja)totaljaker, sum(total_ope)totalope  
				from tbl_timesheet where bulan=$bulan and periode=2 and tahun=$tahun and npwp='$npwp'")->row_array();
			// tfoot total lembur
			$tfoot="<tr><th colspan='2' >Overtime</th>";
			for ($i=16; $i <=$lastday ; $i++) { 
				// total lembur per tanggal
				$totlembur=$this->db->query
				("select sum(lembur)totlembur from tbl_timesheetdetail td inner join tbl_timesheet ts
					on td.id_timesheet=ts.id_timesheet 
					where tanggal=$i and bulan=$bulan and tahun=$tahun and npwp='$npwp'")->row_array();
				if (in_array($i, $libur) or $i>$lastday) {
			  	$tfoot.="<th class='td-libur'>-</th>";
				}
				elseif (in_array($i, $liburcustom)) {
				  $tfoot.="<th class='td-libur-custom'>-</th>";
				}
				else{
					$tfoot.="<th>$totlembur[totlembur]</th>";
				}
			}
			$tfoot.="<th>$timesheettotal[totallembur]</th>";
			$tfoot.="<th colspan='2'></th>";
			$tfoot.="<th></th>";			
			$tfoot.="</tr>";
			$data['tfoot'][]=$tfoot;

			// tfoot total jam kerja
			$tfoot="<tr><th colspan='2' >Total</th>";	
			for ($i=16; $i <=$lastday ; $i++) { 
				// total jam kerja per tanggal
				$totjaker=$this->db->query
				("select sum(jam_kerja)totjaker from tbl_timesheetdetail td inner join tbl_timesheet ts
					on td.id_timesheet=ts.id_timesheet 
					where tanggal=$i and bulan=$bulan and tahun=$tahun and npwp='$npwp'")->row_array();
				if (in_array($i, $libur) or $i>$lastday) {
			  	$tfoot.="<th class='td-libur'>-</th>";
				}
				elseif (in_array($i, $liburcustom)) {
				  $tfoot.="<th class='td-libur-custom'>-</th>";
				}
				else{
					$tfoot.="<th>$totjaker[totjaker]</th>";
				}
			}
			$tfoot.="<th>$timesheettotal[totaljaker]</th>";
			$tfoot.="<th colspan='2'>Rp. <span class='number-format2'>$timesheettotal[totalope]</span></th>";
			$tfoot.="<th></th>";			
			$tfoot.="</tr>";
			$data['tfoot'][]=$tfoot;

			// detail timesheet
			$detailtimesheet=$this->getDetailtimesheet(2,$npwp,$bulan,$tahun);
			$data['detailtimesheet']=$detailtimesheet;
			//encode
			echo json_encode($data);
		}
		else{

			$thead="<tr class='nama-hari'>
								<th>Nama Perusahaan</th>
								<th>OPE</th>";
			for ($i=15; $i < $lastday; $i++) { 
				$tanggal=$i+1; 
				if (in_array($i+1, $libur)) {
				  $thead.="<th class='td-libur td-disabled'><p>$tanggal</p> $hari[$i]</th>";
				}
				elseif (in_array($i+1, $liburcustom)) {
				  $thead.="<th class='td-libur-custom td-hover'><p>$tanggal</p> $hari[$i]</th>";
				}
				else{
					$thead.="<th class='td-hari td-hover'><p>$tanggal</p> $hari[$i]</th>";
				}
			}
			$thead.="	<th>Total</th>
								<th>Total OPE</th>
								<th>PIC</th>
								<th>Status</th>
							</tr>";
			$data['thead']=$thead;
			$data['tbody']="<p class='text-center'>No data</p>";
			$data['tfoot']="";
			echo json_encode($data);
		}
	}
	// tab report timesheet
	function getreporttab($periode){
		$npwp=$this->input->get_post('npwp');
		$bulan=$this->input->get('bulan'); 
		$tahun=$this->input->get('tahun');
		$table=$this->db->
		query("select tanggal,nama_perusahaan,kota,td.transport_lembur,td.uang_makan,ope,pic,status from tbl_timesheet ts 
					join tbl_perusahaan pr on ts.id_perusahaan=pr.id_perusahaan 
					join tbl_timesheetdetail td  on ts.id_timesheet=td.id_timesheet
					where 
					npwp='$npwp' && bulan='$bulan' && tahun='$tahun' && periode='$periode'
					&& ((tipe_kerja='client') or (transport_lembur > 0 or uang_makan > 0)) 
					order by tanggal ")->result_array();
		$total=$this->db->
		query("select sum(total_transport_lembur) tlembur, sum(total_uang_makan) tumakan, sum(total_ope) tope 
					from tbl_timesheet
					where npwp='$npwp' && bulan='$bulan' && tahun='$tahun' && periode='$periode'")->row_array();
		$tbody='';
		$no=1;
		foreach ($table as $key => $value) {
			$pic=$this->db->get_where("tbl_user",array('npwp'=>$value['pic']))->row_array();
			$tbody.="<tr>";
			$tbody.="<td>$no</td>";
			$tbody.="<td>$value[tanggal]-$bulan-$tahun</td>";
			$tbody.="<td>$value[nama_perusahaan]</td>";
			$tbody.="<td>$value[kota]</td>";
			$tbody.="<td><span class='number-format2'>$value[transport_lembur]</span></td>";
			$tbody.="<td><span class='number-format2'>$value[uang_makan]</span></td>";
			$tbody.="<td><span class='number-format2'>$value[ope]</span></td>";
			$tbody.="<td>$pic[nama_user]</td>";
			$tbody.="<td><span class='text-green'>$value[status]</span></td>";
			$tbody.="</tr>";
			$no++;
		}
		$tbody.="<tr>";
		$tbody.="<th colspan=4>TOTAL</th>";
		$tbody.="<th><span class='number-format2'>$total[tlembur]</span></th>";
		$tbody.="<th><span class='number-format2'>$total[tumakan]</span></th>";
		$tbody.="<th><span class='number-format2'>$total[tope]</span></th>";
		$tbody.="<th colspan=2></th>";
		$tbody.="</tr>";
		$data['tbody']=$tbody;
		echo json_encode($data);
	}
	public function approvetimesheet(){
		$npwppic=$this->npwp;
		$npwp=$this->input->get_post('npwp');
		$bulan=$this->input->get_post('bulan');
		$tahun=$this->input->get_post('tahun');
		$periode=$this->input->get_post('periode');
		$this->apptimesheet_m->approvetimesheet($bulan,$tahun,$periode,$npwp,$npwppic,'approved');
	}
	public function cancelapprove(){
		$npwppic=$this->npwp;
		$npwp=$this->input->get_post('npwp');
		$bulan=$this->input->get_post('bulan');
		$tahun=$this->input->get_post('tahun');
		$periode=$this->input->get_post('periode');
		$this->apptimesheet_m->approvetimesheet($bulan,$tahun,$periode,$npwp,$npwppic,'');
	}
	public function getDetailtimesheet($periode,$npwp,$bulan,$tahun){
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
		if ($periode==1) {
			$range="1-15";
		}
		else{
			$range="16-31";
		}
		$detailtimesheet=$this->db->
		query("select ts.npwp, concat('$range $bulantext[$bulan] $tahun')periode, nama_user
					from tbl_timesheet ts
					inner join tbl_user tu on ts.npwp=tu.npwp 
					where ts.npwp='$npwp' and bulan=$bulan and periode=$periode and tahun=$tahun")->row_array();

		$query=$this->db->
		query("select (saldo_awal-saldo_akhir) cuti from tbl_controlcuti where
					npwp='$npwp' and bulan=$bulan and tahun=$tahun");
		$row=$query->row_array();
		$arr['cuti']=$this->saldotohari($row['cuti']);
		$query=$this->db->
		query("select count(nama_hari)sakit from tbl_libur where npwp='$npwp' and month(tanggal)='$bulan' and year(tanggal)='$tahun' and nama_hari='sakit'");
		$row=$query->row_array();
		$arr['sakit']=$row['sakit']." Hari";
		$query=$this->db->
		query("select count(nama_hari)izin from tbl_libur where npwp='$npwp' and month(tanggal)='$bulan' and year(tanggal)='$tahun' and nama_hari='izin'");
		$row=$query->row_array();
		$arr['izin']=$row['izin']." Hari";
		
		$detailtimesheet=array_merge($detailtimesheet,$arr);
		return $detailtimesheet;
	}

	//// -----------------SUPPORT FUNCTION----------------------- /////
	function saldotohari($saldo){
		// saldo cuti menjadi hari
		$saldocuti=$saldo;
		$saldojam=$saldocuti%8;
		$saldohari=($saldocuti-$saldojam)/8;
		$return="$saldohari Hari $saldojam Jam";
		return $return;
	}

	public function getWeekend($y,$m)
	{ 
	    $date = "$y-$m-01";
	    $first_day = date('N',strtotime($date));
	    $first_sunday = 7 - $first_day + 1; 
	    $first_saturday = 6 - $first_day + 1;
	    $last_day =  date('t',strtotime($date));
	    $days = array();
	    for($i=$first_saturday; $i<=$last_day; $i=$i+7 ){
	        $days[] = $i;
	    }

	    for($i=$first_sunday; $i<=$last_day; $i=$i+7 ){
	        $days[] = $i;
	    }

	    return  $days;

	}

	public function getLibur($y,$m,$n)
	{
    // ambil dari database libur
    $days=array();
    $npwp=$n;
    $where= array('npwp' => $npwp, 'month(tanggal)' => $m, 'year(tanggal)' => $y);
		$result=$this->db->get_where('tbl_libur',$where)->result_array();
		foreach ($result as $key => $value) {
			$days[] = date('d',strtotime($value['tanggal']));
		}
		return  $days;
	}
	public function getDays($y,$m){
		$days = array();
		$date = "$y-$m-01";
    $last_day =  date('t',strtotime($date));
    for ($i=1; $i <= $last_day; $i++) { 
    	$days[] = date('D',strtotime("$y-$m-$i"));
    }
    return $days;
	}
	public function getLastdays($y,$m){
		$date = "$y-$m-01";
    $last_day =  date('t',strtotime($date));
    return $last_day;
	}

	
}