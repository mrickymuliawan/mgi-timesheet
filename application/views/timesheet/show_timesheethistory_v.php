<section class="content-header">
  <h4>
  <span>
    <i class="fa fa-clock-o" aria-hidden=true></i> <span>Timesheet History</span>
   </span>
  </h4>
</section>
   
<!-- Main content -->
<section class="content">

<div class="box">

	<div class="box-header with-border">
		<div class="row">
			
			<div class="col-md-offset-9 col-md-3"> 
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
						<th>Bulan</th>
						<th>Tahun</th>
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
						<label class="control-label col-md-2"><b>Periode</b></label>

						<div class="col-md-2">
							<input type="text" name='waktu' class="form-control" readonly="true">
						</div>	

					</div> <br>
					<div class="row">
						<label class="control-label col-md-2"><b>Email</b></label>
						<div class="col-md-2">
							<input type="text" name='npwp' class="form-control" readonly="true">
						</div>
				
						<label class="control-label col-md-1"><b>Nama</b></label>
						<div class="col-md-2">
							<input type="text" name='nama' class="form-control" readonly="true">
						</div>
					</div><br>
					<div class="row">
						
						<label class="col-md-offset-1 control-label col-md-1">Cuti: </label>
						<div class="col-md-2">
							<input type="text" name="cuti" class="form-control" readonly="">
						</div>
						<label class="control-label col-md-1">Sakit: </label>
						<div class="col-md-2">
							<input type="text" name="sakit" class="form-control" readonly="">
						</div>
						<label class="control-label col-md-1">Izin: </label>
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
				 </div>
			</div>
			<div class="modal-footer">
				<a class="btn btn-outline-primary btn-print" target="_blank">Print <i class="fa fa-print"></i> </a>
			  <button type="button" class="btn btn-default" data-dismiss="modal" >Close</button>
			        
			</div>
		</div>
 	</div>
 </div>

<div class="alert alert-warning alert-infor">
  <i class="icon fa fa-check"></i>
  <span>Success alert preview. This alert is dismissable.</span>
</div>

<script type="text/javascript">

	function loadtable(){

	$(".table-data").DataTable().destroy()
	// LOAD DATATABLE
	$(".table-data").DataTable({
	  	"ajax":{
			"url":"<?php echo base_url('timesheethistory/getall') ?>?"+$('.form-date').serialize(),
			"type":"POST",
			stateSave: true
		}
	 })
	}	
	function loadtimesheet(bulan,tahun,npwp,periode){
		$.ajax({
		url:'<?php echo base_url('timesheethistory/gettimesheet') ?>'+periode,
		data:{bulan:bulan,tahun:tahun},
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

				}
				var npwpdate="npwp="+npwp+"&bulan="+bulan+"&tahun="+tahun;

				$('.modal-timesheet .btn-print').attr('href','<?php echo base_url('timesheethistory/printpage/timesheet1/?') ?>'+npwpdate);
				$('a[data-toggle="tab"]').on('shown.bs.tab', function () {
				  var tab=$(this).attr('href');
				  if(tab=='#per1'){
				  	$('.modal-timesheet .btn-print').attr('href','<?php echo base_url('timesheethistory/printpage/timesheet1/?') ?>'+npwpdate);
				  }
				  else if(tab=='#per2'){
				  	$('.modal-timesheet .btn-print').attr('href','<?php echo base_url('timesheethistory/printpage/timesheet2/?') ?>'+npwpdate);
				  }
				  else if(tab=='#report1'){
				  	$('.modal-timesheet .btn-print').attr('href','<?php echo base_url('timesheethistory/printpage/report/?periode=1&') ?>'+npwpdate);
				  }
				  else if(tab=='#report2'){
				  	$('.modal-timesheet .btn-print').attr('href','<?php echo base_url('timesheethistory/printpage/report/?periode=2&') ?>'+npwpdate);
				  }
				})
				// alert(load)
				// load=load+1;
			}
		})
	}

	function loadreporttab(bulan,tahun,npwp,per){
		$.ajax({
		url:'<?php echo base_url('Timesheethistory/getreporttab/') ?>'+per,
		data:{bulan:bulan,tahun:tahun},
		dataType:'json',
		success:function(data){
			$('.report'+per+' tbody').html(data.tbody);
			}
		})
	}
	// HAPUS EVENT AGAR TIDAK REPEAT
	offevent('.modal')

	// ----------------------------------------------------------------------------------------------------
	

	loadtable()
	// EDIT BULAN DAN TAHUN
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
		var npwp=$(this).siblings('input[name=npwp]').val()
		var bulan=$(this).siblings('input[name=bulan]').val()
		var tahun=$(this).siblings('input[name=tahun]').val()
		loadtimesheet(bulan,tahun,npwp,1)
		loadtimesheet(bulan,tahun,npwp,2)
		loadreporttab(bulan,tahun,npwp,1)
		loadreporttab(bulan,tahun,npwp,2)
	})

	
</script>