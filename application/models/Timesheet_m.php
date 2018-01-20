<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class timesheet_m extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}

	// PERUSAHAAN
	public function addperusahaan($data)
	{
		$data=$this->security->xss_clean($data);
    $this->db->insert('tbl_timesheet',$data);
    echo "Data updated";
	}

	public function geteditperusahaan($id)
	{
		$idtimesheet = $id ;
		$query=$this->db->query
		("select ts.id_perusahaan, ts.id_job,job_number, id_timesheet, pr.nama_perusahaan, alamat, kota, ope
			from tbl_perusahaan pr 
		inner join tbl_timesheet ts
		on pr.id_perusahaan=ts.id_perusahaan join tbl_job jb on jb.id_job=ts.id_job
		 where id_timesheet=$idtimesheet");
		return $query->row_array();
	}
	public function editperusahaants($id,$data){
		$data=$this->security->xss_clean($data);
		$this->db->where('id_timesheet',$id);
		$this->db->update('tbl_timesheet', $data);

		// edit total ope
		$this->db->query
		("update tbl_timesheet t1,
			(select ope from tbl_timesheet t11 inner join tbl_perusahaan t22
			on t11.id_perusahaan=t22.id_perusahaan where id_timesheet=$id) t2,
			(select count(jam_kerja) totjaker from tbl_timesheetdetail where id_timesheet=$id and tipe_kerja='client') t3 
			set t1.total_ope=(t3.totjaker*t2.ope) where id_timesheet=$id
			");
		echo "Data updated";
	}
	public function deleteperusahaants($id){
		$result=$this->db->query
		("select tanggal,npwp,bulan,tahun,jenis_hari,periode from tbl_timesheet ts
		inner join tbl_timesheetdetail td on ts.id_timesheet=td.id_timesheet where td.id_timesheet='$id'")->result_array();
		foreach ($result as $key => $value) {
			$this->deletejamkerja($id,$value['tanggal'],$value['bulan'],$value['tahun'],$value['npwp'],$value['periode'],$value['jenis_hari']);
		}
		$tables=array('tbl_timesheet','tbl_timesheetdetail');
		$this->db->where('id_timesheet',$id);
		// $this->db->delete($tables);
		$this->db->delete('tbl_timesheet');
		$this->db->query("ALTER TABLE tbl_timesheet AUTO_INCREMENT = 1");
		echo "Data updated";
	}

	//  JAMKERJA
	public function geteditjaker($id,$tgl){
		// $where= array('id_timesheet' => $id, 'tanggal' => $tgl);
		// $result=$this->db->get_where('tbl_timesheetdetail',$where);
		// return $result->row_array();
		$result=array();
		$query=$this->db->query("select * from tbl_perusahaandetail where id_perusahaan=
(select id_perusahaan from tbl_timesheet where id_timesheet='$id')");
		$kota=$query->result_array();
		$res='';
		$i=1;
		foreach ($kota as $key => $value) {
			if ($i==1) {
				
				$res.="<option value='$value[id_perusahaandetail]' selected>$value[kota] - OPE: $value[ope]</option>";
			}
			else{
				$res.="<option value='$value[id_perusahaandetail]'>$value[kota] - OPE: $value[ope]</option>";

			}
			$i++;
		}
		$result['kota']=$res;
		$query=$this->db->query("select * from tbl_timesheetdetail where id_timesheet='$id' and tanggal='$tgl'");
		$result['detail']=$query->row_array();
		return $result;
	}
	public function editjaker($id,$data,$tgl,$bulan,$tahun,$npwp,$periode)
	{	

		$this->updatetotaltozero($npwp,$tgl,$bulan,$tahun,$periode);

		$data=$this->security->xss_clean($data);
		$where= array('id_timesheet' => $id, 'tanggal' => $tgl);
		$this->db->where($where);
		$this->db->delete('tbl_timesheetdetail');
		$this->db->insert('tbl_timesheetdetail',$data);

		// cek apakah total jaker pada tanggal itu lebih dr 8 atau kurang dari 8
		$result=$this->db->
		query("select sum(jam_kerja)jaker from tbl_timesheetdetail td join tbl_timesheet ts
					on td.id_timesheet=ts.id_timesheet 
					where tanggal='$tgl' and ts.npwp='$npwp' and ts.bulan='$bulan' and ts.tahun='$tahun'")->row_array();
		$jamkerja=$result['jaker']-8;

		if ($data['jenis_hari'] == 'libur') { // hari libur
			$result=$this->db->
			query("update tbl_timesheetdetail set lembur='$result[jaker]' where id_timesheet='$id' and tanggal='$tgl'");
		}
		elseif ($jamkerja >= 0) { // lembur	
			$result=$this->db->
			query("update tbl_timesheetdetail set lembur='$jamkerja' where id_timesheet='$id' and tanggal='$tgl'");
		}
		else{	// cuti
			$result=$this->db->
			query("update tbl_timesheetdetail set lembur='$jamkerja' where id_timesheet='$id' and tanggal='$tgl'");

		}
		$this->updateuangtambahan($id,$tgl,$bulan,$tahun,$npwp);
		$this->updatetotaltimesheet($id,$npwp,$bulan,$tahun,$periode);
		$this->updatepenggajian($npwp,$bulan,$tahun);
		$this->updatetblcuti($npwp,$bulan,$tahun);
    echo "Data updated";
    
	}
	public function deletejamkerja($id,$tgl,$bulan,$tahun,$npwp,$periode,$jenishari){
		
		$this->updatetotaltozero($npwp,$tgl,$bulan,$tahun,$periode);

		$where=array('id_timesheet' => $id, 'tanggal' => $tgl);
		$this->db->where($where);
		$this->db->delete('tbl_timesheetdetail');
		$query1="(select td.id_timesheet from tbl_timesheetdetail td inner join tbl_timesheet ts
							on td.id_timesheet=ts.id_timesheet
			 				where tanggal='$tgl' and npwp='$npwp' and bulan='$bulan' and tahun='$tahun' limit 1) id ";

		// cek apakah total jaker pada tanggal itu lebih dr 8 atau kurang dari 8
		$result=$this->db->
		query("select sum(jam_kerja)jaker from tbl_timesheetdetail td join tbl_timesheet ts
					on td.id_timesheet=ts.id_timesheet 
					where tanggal='$tgl' and ts.npwp='$npwp' and ts.bulan='$bulan' and ts.tahun='$tahun'")->row_array();
		$jamkerja=$result['jaker']-8;

		if ($jenishari=='libur') { // hari libur
				$result=$this->db->
				query("update tbl_timesheetdetail td inner join tbl_timesheet ts 
							on td.id_timesheet=ts.id_timesheet,
							$query1
							set lembur='$result[jaker]' where tanggal='$tgl' and ts.npwp='$npwp' and ts.bulan='$bulan' and ts.tahun='$tahun' and td.id_timesheet=id.id_timesheet");		
		}
		else { // lembur
				$result=$this->db->
				query("update tbl_timesheetdetail td inner join tbl_timesheet ts 
							on td.id_timesheet=ts.id_timesheet,
							$query1
							set lembur='$jamkerja' where tanggal='$tgl' and ts.npwp='$npwp' and ts.bulan='$bulan' and ts.tahun='$tahun' and td.id_timesheet=id.id_timesheet");		
		}

		$this->updatetotaltimesheet($id,$npwp,$bulan,$tahun,$periode);
		$this->updatepenggajian($npwp,$bulan,$tahun);
		$this->updatetblcuti($npwp,$bulan,$tahun);
	}
	
	function editpic($id,$data){
		$data=$this->security->xss_clean($data);
		$this->db->where('id_timesheet',$id);
		$this->db->update('tbl_timesheet',$data);
		echo "Data updated";
	}
	function geteditlibur($where){	
		$result=$this->db->get_where('tbl_libur',$where);
		return $result->row_array();
	}
	function editlibur($where,$data){
		$this->db->
		query("update tbl_user,
		(select count(nama_hari)*8 cuti from tbl_libur
		where npwp='$where[npwp]' && tanggal='$where[tanggal]' && nama_hari='cuti')jumlah 
		set saldo_cuti=saldo_cuti+jumlah.cuti where npwp='$where[npwp]'");
		// tambah dahulu sebelum dikurang lagi

		$data=$this->security->xss_clean($data);	
		$this->db->where(array("npwp"=>$where['npwp'],"tanggal"=>$where['tanggal']));
		$this->db->delete('tbl_libur');
		$this->db->insert('tbl_libur',$data);

		// if ($data['nama_hari'] == 'cuti') {			// jika hari=cuti
		// 	$this->db->
		// 	query("update tbl_user,
		// 	(select count(nama_hari)*8 cuti from tbl_libur
		// 	where npwp='$data[npwp]' && tanggal=$data[tanggal] && bulan='$data[bulan]' && tahun=$data[tahun] && nama_hari='cuti')jumlah 
		// 	set saldo_cuti=saldo_cuti-jumlah.cuti where npwp='$data[npwp]'");
		// 	}

		// update tbl cuti
		$this->updatetblcuti($where['npwp'],$where['bulan'],$where['tahun']);
		$this->updatepenggajian($where['npwp'],$where['bulan'],$where['tahun']);
		echo "Data updated";
	}
	function deletelibur($where,$data){
		// if ($data['nama_hari'] == 'cuti') {	
		// 	$this->db->query("update tbl_user set saldo_cuti=saldo_cuti+8 where npwp='$data[npwp]'");
		// 	$this->db->query("update tbl_controlcuti set saldo_akhir=saldo_akhir+8 
		// 		where npwp='$data[npwp]' && bulan=$where[bulan] && tahun=$where[tahun]");
		// }
		$this->db->where(array("npwp"=>$where['npwp'],"tanggal"=>$where['tanggal']));
		$this->db->delete('tbl_libur');
		// update tbl cuti
		$this->updatetblcuti($where['npwp'],$where['bulan'],$where['tahun']);
		$this->updatepenggajian($where['npwp'],$where['bulan'],$where['tahun']);
		echo "Data updated";
	}

	// ---------------------------------------------------------------------------------------------------
	
	function updatetblcuti($npwp,$bulan,$tahun){

		$tbluser=$this->db->	//ambil saldo cuti
		query("select saldo_cuti from tbl_user where npwp='$npwp'")->row_array();
		$tblcuti=$this->db-> //ambil row tbl cuti
		query("select * from tbl_controlcuti where bulan='$bulan' && tahun='$tahun' && npwp='$npwp'")->row_array();

		$cutijam=$this->db-> //ambil jumlah jam cuti (jenis hari!=libur)
		query("select count(distinct tanggal)tgl, sum(jam_kerja) totjaker from tbl_timesheetdetail td join tbl_timesheet ts
					on td.id_timesheet=ts.id_timesheet 
					where bulan='$bulan' && tahun='$tahun' && npwp='$npwp' && jenis_hari !='libur'")->row_array();

		$cutihari=$this->db-> //ambil jumlah hari cuti
		query("select count(nama_hari)*8 totcuti from tbl_libur
					where month(tanggal)='$bulan' && year(tanggal)='$tahun' && npwp='$npwp' && nama_hari='cuti'")->row_array();

		$jamlibur=$this->db-> //ambil jumlah jam pd hari sabtu/minggu
		query("select sum(jam_kerja)jaker from tbl_timesheetdetail td join tbl_timesheet ts
					on td.id_timesheet=ts.id_timesheet
					where bulan='$bulan' && tahun='$tahun' && npwp='$npwp' && jenis_hari='libur'")->row_array();

		$cutijamfix=$jamlibur['jaker']+$cutijam['totjaker']-($cutijam['tgl']*8); // selisih jam

		if ($cutijamfix>=0) { // jika lembur, cuti=0
			$cutijamfix=0;
		}
		$cutijamfix=abs($cutijamfix); 
		$totalcuti=$cutijamfix+$cutihari['totcuti'];

		if ($tblcuti==NULL) {//jika null buat baru
			
			$saldo_awal=$tbluser['saldo_cuti'];
			$saldo_akhir=$tbluser['saldo_cuti']-$totalcuti;
			$data=array('npwp'=>"$npwp",'bulan'=>"$bulan",'tahun'=>"$tahun","saldo_awal"=>"$saldo_awal",
									"saldo_akhir"=>"$saldo_akhir");
			// $this->db->where(array('npwp'=>"$npwp",'bulan'=>"$bulan",'tahun'=>"$tahun"));
			// $this->db->delete('tbl_controlcuti');
			$this->db->insert('tbl_controlcuti',$data);
				
		}
		else{ // jika tidak null update yang udah ada
			$result=$this->db->query("select saldo_awal from tbl_controlcuti 
					where bulan='$bulan' && tahun='$tahun' && npwp='$npwp'")->row_array();
			$saldo_akhir=$result['saldo_awal']-$totalcuti;
			$this->db->where(array('npwp'=>"$npwp",'bulan'=>"$bulan",'tahun'=>"$tahun"));
			$this->db->update('tbl_controlcuti',array("saldo_akhir"=>"$saldo_akhir"));
		}

		// update saldo cuti
		$this->db->where(array('npwp'=>"$npwp"));
		$this->db->update('tbl_user',array("saldo_cuti"=>"$saldo_akhir"));
	}

	function updatetotaltozero($npwp,$tgl,$bulan,$tahun,$periode){
		// update lembur dan cuti menjadi 0 dan total lembur/cuti
		$result=$this->db->
		query("update tbl_timesheetdetail td inner join tbl_timesheet ts
						on td.id_timesheet=ts.id_timesheet 
						set lembur=0 where tanggal='$tgl' and ts.npwp='$npwp' and ts.bulan='$bulan' and ts.tahun='$tahun'");

		$this->db->
		query("update tbl_timesheet set total_lembur=0, total_uanglembur=0 where
					npwp='$npwp' and bulan='$bulan' and tahun='$tahun' and periode='$periode'");
		}
	function updatetotaltimesheet($id,$npwp,$bulan,$tahun,$periode)
	{
		// update total transport lembur dan uang makan
		$this->db->query
		("update tbl_timesheet ts,
		(select sum(transport_lembur) tlembur,sum(uang_makan) umakan 
		from tbl_timesheetdetail where id_timesheet=$id) td
		set ts.total_transport_lembur=td.tlembur,ts.total_uang_makan=td.umakan where id_timesheet=$id");
		// update total jamkerja
		$this->db->query
		("update tbl_timesheet ts,
		(select sum(jam_kerja) totjaker from tbl_timesheetdetail where id_timesheet=$id) td
		set ts.total_jamkerja=td.totjaker where id_timesheet=$id");
		// update total ope
		$this->db->query
		("update tbl_timesheet main,
		(select sum(psd.ope)totope from tbl_timesheetdetail tsd join tbl_perusahaandetail psd
		on tsd.id_perusahaandetail=psd.id_perusahaandetail where id_timesheet='$id') sub1
			set main.total_ope=sub1.totope where id_timesheet='$id'
			");
		// update total lembur / cuti jika minus
		$this->db->query
		("update tbl_timesheet ts,
		(select sum(lembur)totlembur from tbl_timesheetdetail td
		inner join tbl_timesheet ts 
		on td.id_timesheet=ts.id_timesheet
		where npwp='$npwp' and bulan='$bulan' and tahun='$tahun' and periode='$periode') td
		set ts.total_lembur=td.totlembur where ts.id_timesheet='$id'");

		// update total uang lembur
		$result=$this->db->query // ambil jam lembur hari biasa
		("select count(distinct tanggal)jam1,sum(lembur)lembur from tbl_timesheetdetail td
		inner join tbl_timesheet ts
		on td.id_timesheet=ts.id_timesheet
		where bulan='$bulan' && tahun='$tahun' && npwp='$npwp' && jenis_hari='biasa' && lembur>0 && periode='$periode'
		")->row_array();
		$result2=$this->db->query // ambil jam lembur hari libur
		("select sum(jam_kerja)jamkerja from tbl_timesheetdetail td
		inner join tbl_timesheet ts
		on td.id_timesheet=ts.id_timesheet
		where bulan='$bulan' && tahun='$tahun' && npwp='$npwp' && jenis_hari='libur' && periode='$periode'
		")->row_array();
		$result3=$this->db->query
		("select sum(total_lembur)lembur from tbl_timesheet 
		where bulan='$bulan' && tahun='$tahun' && npwp='$npwp' && periode='$periode'")->row_array();

		$uanglembur=$this->db->query
			("select uang_lembur1,uang_lembur2 from tbl_user where npwp='$npwp'")->row_array();
			$jamkesatu=$result['jam1']*$uanglembur['uang_lembur1'];
			$jamkedua=($result3['lembur']-$result['jam1'])*$uanglembur['uang_lembur2'];
			$jamlibur=$result2['jamkerja']*$uanglembur['uang_lembur1'];
			$total=$jamkedua+$jamkesatu+$jamlibur;
		
		if ($result3['lembur']<=0) {
			("update tbl_timesheet set total_uanglembur=0 where id_timesheet='$id' ");
		}
		else{
			$this->db->query
			("update tbl_timesheet set total_uanglembur=$total where id_timesheet='$id' ");
		}
	}
		// memasukan ke table penggajian
	function updatepenggajian($npwp,$bulan,$tahun){
		$jumlah=$this->db->query("select 20-count(nama_hari) izin from tbl_libur
			where npwp='$npwp' and month(tanggal)='$bulan' and year(tanggal)='$tahun' and nama_hari='izin'")->row_array();
		$ttunjtransport=$jumlah['izin'];
		$cuti=$this->db->
		query("select * from tbl_controlcuti where npwp='$npwp' && bulan='$bulan' && tahun='$tahun'")->row_array();
		if ($cuti['saldo_akhir']<0) {
			$ttunjtransport=$ttunjtransport-1;
		}
		$res=$this->db->
		query("select ts.npwp, nama_user,
					coalesce(sum(total_jamkerja),0) jamkerja,
					coalesce(sum(total_lembur),0) jamlembur,
					(select coalesce(sum(total_ope),0) from tbl_timesheet 
					where npwp='$npwp' and bulan='$bulan' and tahun='$tahun' and periode=1)ope1,
					(select coalesce(sum(total_ope),0) from tbl_timesheet 
					where npwp='$npwp' and bulan='$bulan' and tahun='$tahun' and periode=2)ope2,
					sum(total_transport_lembur) tottranslembur,
					sum(total_uang_makan) totuangmakan,
					tunjangan_transport*$ttunjtransport tottunjtrans,
					tunjangan_komunikasi,
					tunjangan_parkir,
					gaji_pokok,
					uang_lembur1,
					uang_lembur2, 
					coalesce(sum(total_uanglembur),0) totaluanglembur, 
					(gaji_pokok+
					sum(total_uanglembur)+
					sum(total_transport_lembur)+
					sum(total_uang_makan)+
					(tunjangan_transport*$ttunjtransport)+
					sum(total_ope)) totalgaji  
					from tbl_timesheet ts
					inner join tbl_user tu on ts.npwp=tu.npwp 
					where ts.npwp='$npwp' and bulan='$bulan' and tahun='$tahun'")->row_array();
		$data=
		array('npwp'=>"$npwp",
					'bulan'=>"$bulan",
					'tahun'=>"$tahun",
					"nama_user"=>"$res[nama_user]",
					'total_jamkerja'=>"$res[jamkerja]",
					'total_jamlembur'=>"$res[jamlembur]",
					'ope1'=>"$res[ope1]",
					'ope2'=>"$res[ope2]",
					'tunjangan_parkir'=>"$res[tunjangan_parkir]",
					'tunjangan_komunikasi'=>"$res[tunjangan_komunikasi]",
					'total_transportlembur'=>"$res[tottranslembur]",
					'total_uangmakan'=>"$res[totuangmakan]",
					'total_tunjangantransport'=>"$res[tottunjtrans]",
					'gaji_pokok'=>"$res[gaji_pokok]",
					'uang_lembur1'=>"$res[uang_lembur1]",
					'uang_lembur2'=>"$res[uang_lembur2]",
					'total_uanglembur'=>"$res[totaluanglembur]",
					'total_gaji'=>"$res[totalgaji]"
					);
		$this->db->where(array('npwp'=>"$npwp",'bulan'=>"$bulan",'tahun'=>"$tahun"));
		$this->db->delete('tbl_penggajian');
		$this->db->insert('tbl_penggajian',$data);
	}

	function updateuangtambahan($idtimesheet,$tanggal,$bulan,$tahun,$npwp){
		$result=$this->db->query
		("select sum(lembur)lembur from tbl_timesheetdetail td join tbl_timesheet ts
			on td.id_timesheet=ts.id_timesheet 
			where tanggal='$tanggal' and ts.npwp='$npwp' and ts.bulan='$bulan' and ts.tahun='$tahun'")->row_array();
		if ($result['lembur'] <=1) {
			$this->db->
			query("update tbl_timesheetdetail set uang_makan=0 where id_timesheet='$idtimesheet' && tanggal='$tanggal' ");
		}
		if ($result['lembur'] <=3) {
			$this->db->
			query("update tbl_timesheetdetail set transport_lembur=0 where id_timesheet='$idtimesheet' && tanggal='$tanggal' ");
		}
	}


}

/* End of file timesheet_m.php */
/* Location: ./application/models/timesheet_m.php */