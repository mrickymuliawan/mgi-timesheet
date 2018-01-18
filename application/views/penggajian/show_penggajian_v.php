<section class="content-header">
  <h4>
  <span>
    <i class="fa fa-usd" aria-hidden=true></i> <span>Penggajian</span></a>
   </span>
  </h4>
</section>
   
<!-- Main content -->
<section class="content">

<div class="box">

	<div class="box-header with-border">
		<div class="row">
			<form class="form-date">
			<label class="control-label col-sm-1">Bulan: </label>
			<div class="col-md-2">
				<select class="form-control" name="bulan">
					<option value="1">Januari</option>
					<option value="2">Februari</option>
					<option value="3">Maret</option>
					<option value="4">April</option>
					<option value="5">Mei</option>
					<option value="6">Juni</option>
					<option value="7">Juli</option>
					<option value="8">Agustus</option>
					<option value="9">September</option>
					<option value="10">Oktober</option>
					<option value="11">November</option>
					<option value="12">Desember</option>
				</select>
			</div>

			<label class="control-label col-sm-1">Tahun: </label>
			<div class="col-md-2">
				<input type="number" name="tahun" class="form-control">
			</div>
			<div class="col-md-2">
				<button type="submit" class="form-control btn btn-outline-info btn-go">Go</button>
			</div>
			</form>
			<div class="col-md-offset-1 col-md-3"> 
				<div class="pull-right">
					<button class="btn btn-outline-success btn-refresh"><i class="fa fa-refresh"></i><br>Refresh</button>
				</div>
			</div>
		</div>

	</div>

	<div class="box-body">

		<div class="row">

			<div class="col-md-12 table-responsive">
				<table class="table table-hover table-striped table-data" width="100%">
					<thead>
						<th>No</th>
						<th>Nama</th>
						<th>Total Tunjangan Transport Lembur</th>
						<th>Tunjangan Transport</th>
						<th>Total Uang Lembur</th>
						<th>Total Uang Ope</th>
						<th>Gaji Pokok</th>
						<th>Total Gaji</th>
						<th>Tools</th>
					</thead>
					<tbody>
						
					</tbody>
					<tfoot>
						
					</tfoot>
				</table>
		  </div>

		</div>

	</div>

</div>
</section>




<div class="modal fade modal-timesheet modal-full" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
			  <button type="button" class="close" data-dismiss="modal">&times;</button>
			  <h4 class="modal-title">Detail Timesheet</h4>
			</div>
			<div class="modal-body">
				<form class="form-horizontal">
					<div class="row">		
						<label class="control-label col-md-2"><b>Bulan dan Tahun</b></label>
						<div class="col-md-2">
							<input type="text" name='waktu' class="form-control" readonly="true">
						</div>	
					</div> 

					<br>

					<div class="row">
						<label class="control-label col-md-2"><b>Email</b></label>
						<div class="col-md-2">
							<input type="text" name='npwp' class="form-control" readonly="true">
						</div>
						<label class="control-label col-md-1"><b>Nama</b></label>
						<div class="col-md-2">
							<input type="text" name='nama' class="form-control" readonly="true">
						</div>
					</div>

					<br>
					<div class="row">
						<label class="control-label col-sm-2">Cuti: </label>
						<div class="col-md-2">
							<input type="text" name="cuti" class="form-control" readonly="">
						</div>
						<label class="control-label col-sm-1">Sakit: </label>
						<div class="col-md-2">
							<input type="text" name="sakit" class="form-control" readonly="">
						</div>
						<label class="control-label col-sm-1">Izin: </label>
						<div class="col-md-2">
							<input type="text" name="izin" class="form-control" readonly="">
						</div>
						
					</div>
				</form>
				<br>
				<ul class="nav nav-tabs">
				  <li class="active"><a data-toggle="tab" href="#per1">Periode 1-15</a></li>
				  <li><a data-toggle="tab" href="#report1">Report 1-15</a></li>
				  <li><a data-toggle="tab" href="#per2">Periode 16-31</a></li>
				  <li><a data-toggle="tab" href="#report2">Report 16-31</a></li>
				  <li><a data-toggle="tab" href="#detailts3">Detail</a></li>
				</ul>

				<div class="tab-content">

				  <div id="per1" class="tab-pane fade in active table-responsive">

						<table class="table table-hover table-bordered table-timesheet periode1">
							<thead>
								
							</thead>
							<tbody>
								
							</tbody>
							<tfoot>
								
							</tfoot>
						</table>
					
				  </div>
					
					<div id="report1" class="tab-pane fade table-responsive">

						<table class="table table-hover table-striped table-bordered table-timesheet report1">
							<thead>
								<tr>
									<th>No</th>
									<th>Tanggal</th>
									<th>Nama Perusahaan</th>
									<th>Kota</th>
									<th>Transport Lembur</th>
									<th>Uang Makan</th>
									<th>OPE</th>
									<th>PIC</th>
									<th>Status</th>
								</tr>
							</thead>
							<tbody>
								
							</tbody>
							<tfoot>
								
							</tfoot>
						</table>
						
					</div>

				  <div id="per2" class="tab-pane fade in table-responsive">
				  
						<table class="table table-hover table-bordered table-timesheet periode2">
							<thead>
								
							</thead>
							<tbody>
								
							</tbody>
							<tfoot>
								
							</tfoot>
						</table>
						
				  </div>

					<div id="report2" class="tab-pane fade table-responsive">
							
						<table class="table table-hover table-striped table-bordered table-timesheet report2">
							<thead>
								<tr>
									<th>No</th>
									<th>Tanggal</th>
									<th>Nama Perusahaan</th>
									<th>Kota</th>
									<th>Transport Lembur</th>
									<th>Uang Makan</th>
									<th>OPE</th>
									<th>PIC</th>
									<th>Status</th>
								</tr>
							</thead>
							<tbody>
								
							</tbody>
							<tfoot>
								
							</tfoot>
						</table>
						
					</div>

				  <div id="detailts3" class="tab-pane fade">
				   	<br>
				   	<form class="form-horizontal">
							
							<div class="row">
								<label class="control-label col-md-2"><b>Jumlah Jam Kerja</b></label>
								<div class="col-md-3">
									<input type="text" name='jamkerja' class="form-control" readonly="true">
								</div>
						
								<label class="control-label col-md-2"><b>Jumlah Jam Lembur</b></label>
								<div class="col-md-3">
									<input type="text" name='jamlembur' class="form-control" readonly="true">
								</div>
							</div>
							<br>
							<div class="row">
								<label class="control-label col-sm-2">Total Tunjangan Transport Lembur: </label>
								<div class="col-md-1">Rp.</div>
								<div class="col-md-2">
									<input type="text" name="transportlembur" class="form-control number-format" readonly="">
								</div>
								<label class="control-label col-sm-2">Tunjangan Transport: </label>
								<div class="col-md-1">Rp.</div>
								<div class="col-md-2">
									<input type="text" name="tunjangantransport" class="form-control number-format" readonly="">
								</div>
							</div>
							
							<br>
							<div class="row">
								<label class="control-label col-md-2"><b>Total Uang OPE periode 1</b></label>
								<div class="col-md-1">Rp.</div>
								<div class="col-md-2">
									<input type="text" name='uangope1' class="form-control number-format" readonly="true">
								</div>
								<label class="control-label col-md-2"><b>Total Uang OPE periode 2</b></label>
								<div class="col-md-1">Rp.</div>
								<div class="col-md-2">
									<input type="text" name='uangope2' class="form-control number-format" readonly="true">
								</div>
							</div>
							<br>
							
							<br>
							<div class="row">
								<label class="control-label col-md-2"><b>Total Uang Lembur</b></label>
								<div class="col-md-1">Rp.</div>
								<div class="col-md-2">
									<input type="text" name='totaluanglembur' class="form-control number-format" readonly="true">
								</div>
								<label class="control-label col-md-2"><b>Gaji Pokok</b></label>
								<div class="col-md-1">Rp.</div>
								<div class="col-md-2">
									<input type="text" name='gajipokok' class="form-control number-format" readonly="true">
								</div>
							</div>
							<br>
							<div class="row">
								<label class="control-label col-md-2 text-green"><h4><b>TOTAL GAJI</b></h4></label>					
								<div class="col-md-1">Rp.</div>
								<div class="col-md-3">
									<input type="text" name='totalgaji' class="text-green form-control input-lg number-format" readonly="true">
								</div>
                <div class="col-md-4">
                	<div class="form-check form-check-inline">
										  <input class="form-check-input" type="checkbox" name="tunjanganparkir" id="tunjparkir">
										  <label class="form-check-label" for="tunjparkir">include Tunjangan Parkir</label>
										</div>
								</div>
								<div class="col-md-4">
                    <div class="form-check form-check-inline">
										  <input class="form-check-input" type="checkbox" name="tunjangankomunikasi" id="tunjkom">
										  <label class="form-check-label" for="tunjkom">include Tunjangan Komunikasi</label>
										</div>
								</div>
							</div>
						</form>
					
				   </div>

				 </div>
			</div>
			<div class="modal-footer">
				
				<a class="btn btn-outline-primary btn-print" target="_blank">Print <i class="fa fa-print"></i></a>
				<a class='btn btn-outline-success btn-login' href=''>
					Login   <i class='fa fa-sign-in'></i> 
				</a>  
				
			  <button type="button" class="btn btn-default" data-dismiss="modal" >Close</button>
			        
			</div>
		</div>
 	</div>
 </div>

<div class="alert alert-success alert-infor">
  <i class="icon fa fa-check"></i>
  <span>Success alert preview. This alert is dismissable.</span>
</div>

<script type="text/javascript">

	function loadtable(){

	$(".table-data").DataTable().destroy()
	// LOAD DATATABLE
	$(".table-data").DataTable({
	  	"ajax":{
			"url":"<?php echo base_url('penggajian/getall') ?>?"+$('.form-date').serialize(),
			"type":"POST",
			stateSave: true
		}
	 })
	}	
	function loadtimesheet(npwp,periode){
		$.ajax({
		url:'<?php echo base_url('penggajian/gettimesheet') ?>'+periode,
		data:$('.form-date').serialize()+'&npwp='+npwp,
		dataType:'json',
		success:function(data){
				$('.periode'+periode+' thead').html(data.thead);
				$('.periode'+periode+' tbody').html(data.tbody);
				$('.periode'+periode+' tfoot').html(data.tfoot);

				if (periode==1) {
					$('.modal-timesheet').modal('show')


					$('.modal-timesheet input[name=waktu]').val(data['detailtimesheet']['waktu']);
					$('.modal-timesheet input[name=npwp]').val(data['detailtimesheet']['npwp']);
					$('.modal-timesheet input[name=nama]').val(data['detailtimesheet']['nama_user']);

					$('.modal-timesheet input[name=cuti]').val(data['detailtimesheet']['cuti']);
					$('.modal-timesheet input[name=sakit]').val(data['detailtimesheet']['sakit']);
					$('.modal-timesheet input[name=izin]').val(data['detailtimesheet']['izin']);

					$('.modal-timesheet input[name=jamkerja]').val(data['detailtimesheet']['total_jamkerja']);
					$('.modal-timesheet input[name=jamlembur]').val(data['detailtimesheet']['total_jamlembur']);

					$('.modal-timesheet input[name=transportlembur]').val(data['detailtimesheet']['total_transportlembur']);
					$('.modal-timesheet input[name=tunjangantransport]').val(data['detailtimesheet']['total_tunjangantransport']);
					$('.modal-timesheet input[name=tunjanganparkir]').val(data['detailtimesheet']['tunjangan_parkir']);
					$('.modal-timesheet input[name=tunjangankomunikasi]').val(data['detailtimesheet']['tunjangan_komunikasi']);

					$('.modal-timesheet input[name=uangope1]').val(data['detailtimesheet']['ope1']);
					$('.modal-timesheet input[name=uangope2]').val(data['detailtimesheet']['ope2']);

					$('.modal-timesheet input[name=uanglembur1]').val(data['detailtimesheet']['uang_lembur1']);
					$('.modal-timesheet input[name=uanglembur2]').val(data['detailtimesheet']['uang_lembur2']);
					$('.modal-timesheet input[name=totaluanglembur]').val(data['detailtimesheet']['total_uanglembur']);

					$('.modal-timesheet input[name=gajipokok]').val(data['detailtimesheet']['gaji_pokok']);
					$('.modal-timesheet input[name=totalgaji]').val(data['detailtimesheet']['total_gaji']);
					$('.modal-timesheet .btn-login').attr("href","login/adminlogin?npwp="+data['detailtimesheet']['npwp']);
				}

				// button print
				var npwpdate="npwp="+npwp+"&"+$('.form-date').serialize();

				$('.modal-timesheet .btn-print').attr('href','<?php echo base_url('penggajian/printpage/timesheet1/?npwp=') ?>'+npwp+"&"+$('.form-date').serialize());
				$('a[data-toggle="tab"]').on('shown.bs.tab', function () {
				  var tab=$(this).attr('href');
				  if(tab=='#per1'){
				  	$('.modal-timesheet .btn-print').attr('href','<?php echo base_url('penggajian/printpage/timesheet1/?') ?>'+npwpdate);
				  }
				  else if(tab=='#per2'){
				  	$('.modal-timesheet .btn-print').attr('href','<?php echo base_url('penggajian/printpage/timesheet2/?') ?>'+npwpdate);
				  }
				  else if(tab=='#report1'){
				  	$('.modal-timesheet .btn-print').attr('href','<?php echo base_url('penggajian/printpage/report/?periode=1&') ?>'+npwpdate);
				  }
				  else if(tab=='#report2'){
				  	$('.modal-timesheet .btn-print').attr('href','<?php echo base_url('penggajian/printpage/report/?periode=2&') ?>'+npwpdate);
				  }
				})
				
			}
		})
	}

	function loadreporttab(npwp,per){
		$.ajax({
		url:'<?php echo base_url('Penggajian/getreporttab/') ?>'+per,
		data:$('.form-date').serialize()+'&npwp='+npwp,
		dataType:'json',
		success:function(data){
			$('.report'+per+' tbody').html(data.tbody);
			}
		})
	}
	// HAPUS EVENT AGAR TIDAK REPEAT
	offevent('.modal')

	// ----------------------------------------------------------------------------------------------------

	// SET DATE
	var date=new Date();
	var bulan=date.getMonth()+1;
	var tahun=date.getFullYear();
	$('.form-date select[name=bulan]').val(bulan);
	$('.form-date input[name=tahun]').val(tahun);

	loadtable()
	// EDIT BULAN DAN TAHUN BUTTON GO
	$('.form-date').validate({
		submitHandler:function(){
			loadtable()
		}
	})

	// REFRESH 
	$('.btn-refresh').on('click',function(){
		loadtable()
	})

	$('.table-data').on('click','.btn-details',function(){
		var npwp=$(this).val();
		loadtimesheet(npwp,1)
		loadtimesheet(npwp,2)
		loadreporttab(npwp,1)
		loadreporttab(npwp,2)
	})
	$('input[name=tunjangankomunikasi], input[name=tunjanganparkir').change(function(){
		var val=parseInt($(this).val());
		var gaji=parseInt($('input[name=totalgaji]').val());
		if ($(this).prop('checked')) {
			$('input[name=totalgaji]').val(gaji+val);
		}
		else{
			$('input[name=totalgaji]').val(gaji-val);
		}
	})
	
</script>