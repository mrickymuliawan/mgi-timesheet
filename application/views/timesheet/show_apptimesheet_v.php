<section class="content-header">
  <h4>
  <span>
    <i class="fa fa-check" aria-hidden=true></i> <span>Approve Timesheet</span>
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

				<ul class="nav nav-tabs">
				  <li class="active"><a data-toggle="tab" href="#per1">Periode 1-15</a></li>
				  <li><a data-toggle="tab" href="#per2">Periode 16-31</a></li>
				</ul>
				<br>
				<div class="tab-content">

				  <div id="per1" class="tab-pane fade in active">
				   
							<table class="table table-hover table-striped table-data periode1" width="100%">
								<thead>
									<th>Nama</th>
									<th>Total Jam Lembur</th>
									<th>Total Jam Kerja</th>
									<th>Tools</th>
								</thead>
								<tbody>
									
								</tbody>
								<tfoot>
									
								</tfoot>
							</table>
				  </div>
					
					

				  <div id="per2" class="tab-pane fade">
				    
							<table class="table table-hover table-striped table-data periode2" width="100%">
								<thead>
									<th>Nama</th>
									<th>Total Jam Lembur</th>
									<th>Total Jam Kerja</th>
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
							<input type="text" name='periode' class="form-control" readonly="true">
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
					</div>
					<br>
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
				  <li class="active"><a data-toggle="tab" href="#timesheet">Timesheet</a></li>
				  <li><a data-toggle="tab" href="#report">Report</a></li>
				</ul>

				<div class="tab-content">

				  <div id="timesheet" class="tab-pane fade in active table-responsive">
	
						<table class="table table-hover table-bordered table-timesheet">
							<thead>
								
							</thead>
							<tbody>
								
							</tbody>
							<tfoot>
								
							</tfoot>
						</table>		
				  </div>
					
					<div id="report" class="tab-pane fade table-responsive">
						<table class="table table-hover table-striped table-bordered table-report">
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
				<a class="btn btn-outline-primary btn-print" target="_blank">Print <i class="fa fa-print"></i></a>
				<button type="button" class="btn btn-outline-success" name="approve">Approve</button>
				<button type="button" class="btn btn-outline-danger" name="cancel">Cancel</button>
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
	$(".periode1").DataTable().destroy()
	$(".periode2").DataTable().destroy()
	$(".periode1").DataTable({
	  	"ajax":{
			"url":"<?php echo base_url('apptimesheet/getall1') ?>?"+$('.form-date').serialize(),
			"type":"POST",
			stateSave: true
		}
	 })
	$(".periode2").DataTable({
	  	"ajax":{
			"url":"<?php echo base_url('apptimesheet/getall2') ?>?"+$('.form-date').serialize(),
			"type":"POST",
			stateSave: true
		}
	 })
	}	
	function loadtimesheet(npwp,periode){
		$.ajax({
		url:'<?php echo base_url('apptimesheet/gettimesheet') ?>'+periode,
		data:$('.form-date').serialize()+'&npwp='+npwp,
		dataType:'json',
		success:function(data){
				$('.modal-timesheet').modal('show')
				$('.table-timesheet thead').html(data.thead);
				$('.table-timesheet tbody').html(data.tbody);
				$('.table-timesheet tfoot').html(data.tfoot);

				$('.modal-timesheet input[name=periode]').val(data['detailtimesheet']['periode']);
				$('.modal-timesheet input[name=npwp]').val(data['detailtimesheet']['npwp']);
				$('.modal-timesheet input[name=nama]').val(data['detailtimesheet']['nama_user']);
				
				$('.modal-timesheet input[name=cuti]').val(data['detailtimesheet']['cuti']);
				$('.modal-timesheet input[name=sakit]').val(data['detailtimesheet']['sakit']);
				$('.modal-timesheet input[name=izin]').val(data['detailtimesheet']['izin']);			}
		})

		// button print
		var urltimesheet="<?= base_url('penggajian/printpage/timesheet')?>"+periode+"/?npwp="+npwp+"&"+$('.form-date').serialize();
		var urlreport="<?= base_url('penggajian/printpage/report/?periode=')?>"+periode+"&npwp="+npwp+"&"+$('.form-date').serialize();
		// button print
		$('.modal-timesheet .btn-print').attr('href',urltimesheet);
		$('.modal-timesheet li a[data-toggle="tab"]').on('shown.bs.tab', function () {
		  var tab=$(this).attr('href');
		  if(tab=='#timesheet'){
		  	$('.modal-timesheet .btn-print').attr('href',urltimesheet);
		  }
		  else if(tab=='#report'){
		  	$('.modal-timesheet .btn-print').attr('href',urlreport);
		  }
		})
		
	}

	function loadreporttab(npwp,per){
		$.ajax({
		url:'<?php echo base_url('Apptimesheet/getreporttab/') ?>'+per,
		data:$('.form-date').serialize()+'&npwp='+npwp,
		dataType:'json',
		success:function(data){
			$('.table-report tbody').html(data.tbody);
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


	// LOAD FIRST TIME
	loadtable()

	// EDIT BULAN DAN TAHUN
	$('.form-date').validate({
		submitHandler:function(form){
		loadtable();
		
		}
	})

	// REFRESH 
	$('.btn-refresh').on('click',function(){
		loadtable();
		
	})

	$('.table-data').on('click','.btn-details',function(){
		var npwp=$(this).siblings('input[name=npwp]').val()
		var periode=$(this).siblings('input[name=periode]').val()
		loadtimesheet(npwp,periode)
		loadreporttab(npwp,periode)
		// click approve
 		$('.modal-timesheet button[name=approve]').on('click',function(){
 			$.ajax({
		  url:"<?php echo base_url('apptimesheet/approvetimesheet') ?>",
		  data:$('.form-date').serialize()+"&npwp="+npwp+"&periode="+periode,
		  success: function(data){
			  loadtimesheet(npwp,periode)
				loadreporttab(npwp,periode)
				
			 	showAlert(data) 	
		  }
			});
 		})

 		// click cancel
 		$('.modal-timesheet button[name=cancel]').on('click',function(){
 			$.ajax({
		  url:"<?php echo base_url('apptimesheet/cancelapprove') ?>",
		  data:$('.form-date').serialize()+"&npwp="+npwp+"&periode="+periode,
		  success: function(data){
			  loadtimesheet(npwp,periode)
				loadreporttab(npwp,periode)
				
			 	showAlert(data) 	
		  }
			});
 		})

 	})


	
</script>