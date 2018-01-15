<section class="content-header">
  <h4>
  <span>
    <i class="fa fa-money" aria-hidden=true></i> <span>Billing</span></a>
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
			<div class="col-md-offset-2 col-md-2">
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
				  <li class="active"><a data-toggle="tab" href="#dikerjakan">Dikerjakan</a></li>
				  <li><a data-toggle="tab" href="#selesai">Selesai</a></li>
				</ul>

				<div class="tab-content">
				<br>
				  <div id="dikerjakan" class="tab-pane fade in active">
				   	<table class="table table-striped table-hover table-dikerjakan" width="100%">
							<thead>
								<tr>
									<th>No.</th>
									<th>Job Number</th>
									<th>Nama Perusahaan</th>
									<th>Fee</th>
									<th>Total Transport Lembur</th>
									<th>Total Uang Makan</th>
									<th>Total OPE</th>
									<th>Tools</th>
								</tr>
							</thead>
							<tbody>

							</tbody>
						</table>
							
				  </div>

				  <div id="selesai" class="tab-pane fade">
				  	<table class="table table-striped table-hover table-selesai" width="100%">
							<thead>
								<tr>
									<th>No.</th>
									<th>Job Number</th>
									<th>Nama Perusahaan</th>
									<th>Fee</th>
									<th>Total Transport Lembur</th>
									<th>Total Uang Makan</th>
									<th>Total OPE</th>
									<th>Tools</th>
								</tr>
							</thead>
							<tbody>

							</tbody>
						</table>
				  </div>

				</div>
				
			</div>
		</div>
	</div>

</div>

</section>

<div class="modal fade modal-detail modal-full" role="dialog">
<div class="modal-dialog">
	<div class="modal-content">
	    <div class="modal-header">
	    	<button type="button" class="close" data-dismiss="modal">&times;</button>
	        <h4 class="modal-title">Detail Billing</h4>
	    </div>
	  	<div class="modal-body">

			
		  

			
					<form class="form-horizontal">
		        <div class="form-group">
		          <label for="Nama Perusahaan" class="col-sm-2 control-label">Job Number</label>
		          <div class="col-sm-4">
		            <input type="text" class="form-control" name="jobnumber" readonly> 
		          </div>
		        </div>
						<div class="form-group">
		          <label for="Nama Perusahaan" class="col-sm-2 control-label">Nama Perusahaan</label>
		          <div class="col-sm-4">
		            <input type="text" class="form-control" name="namaperusahaan" readonly>
		          </div>
		        </div>
		        <div class="form-group">
		          <label for="Nama Perusahaan" class="col-sm-2 control-label">Periode</label>
		          <div class="col-sm-4">
		            <input type="text" class="form-control" name="periode" readonly>
		          </div>
		        </div>
						<div class="form-group">
		          <label for="Nama Perusahaan" class="col-sm-2 control-label">Fee</label>
		          <div class="col-sm-1">Rp. </div>
		          <div class="col-sm-3">
		            <input type="text" class="form-control number-format" name="fee" readonly>
		          </div>
		        </div>
		        <ul class="nav nav-tabs">
						  <li class="active"><a data-toggle="tab" href="#tab1">Detail</a></li>
						  <li><a data-toggle="tab" href="#tab2">Report</a></li>
						</ul>
		        </form>
		        <div class="tab-content">
			  		<div id="tab1" class="tab-pane fade in active">
		        <!-- <form class="form-horizontal">
		        
		        <div class="form-group">
		          <label for="Nama Perusahaan" class="col-sm-2 control-label">Total Transport Lembur</label>
		          <div class="col-sm-1">Rp. </div>
		          <div class="col-sm-3">
		            <input type="text" class="form-control number-format" name="tottranslembur" readonly>
		          </div>
		        </div>
		        <div class="form-group">
		          <label for="Nama Perusahaan" class="col-sm-2 control-label">Total Uang Makan</label>
		          <div class="col-sm-1">Rp. </div>
		          <div class="col-sm-3">
		            <input type="text" class="form-control number-format" name="totuangmakan" readonly>
		          </div>
		        </div>
		        <div class="form-group">
		          <label for="Nama Perusahaan" class="col-sm-2 control-label">Total OPE</label>
		          <div class="col-sm-1">Rp. </div>
		          <div class="col-sm-3">
		            <input type="text" class="form-control number-format" name="totope" readonly>
		          </div>
		        </div>
						
						<br>
				  </form> -->
					<div class="table-responsive">
						<table class="table table-striped table-hover table-detail" width="100%">
							<thead>
								<tr>
									<th>No.</th>
									<th>Email</th>
									<th>Nama Auditor</th>
									<th>Total Ope</th>
									<th>Total Transport Lembur</th>
									<th>Total Uang Makan</th>
								</tr>
							</thead>
							<tbody>

							</tbody>
						</table>	
					</div>
			  </div>
			  <div id="tab2" class="tab-pane fade in table-responsive">
					<table class="table table-hover table-striped table-bordered report">
						<thead>
							<tr>
								<th>No.</th>
								<th>Tanggal</th>
								<th>Nama Auditor</th>
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
	$(".table-dikerjakan").DataTable().destroy()
	$(".table-selesai").DataTable().destroy()
	$(".table-dikerjakan").DataTable({
	  	"ajax":{
			"url":"<?php echo base_url('billing/getdikerjakan') ?>?"+$('.form-date').serialize(),
			"type":"POST",
			stateSave: true
		}
	 })
	$(".table-selesai").DataTable({
	  	"ajax":{
			"url":"<?php echo base_url('billing/getselesai') ?>?"+$('.form-date').serialize(),
			"type":"POST",
			stateSave: true
		}
	 })
	}	


// -------------------------------------------------------------------------------------------------------------

// SET DATE
var date=new Date();
var bulan=date.getMonth()+1;
var tahun=date.getFullYear();
$('.form-date select[name=bulan]').val(bulan);
$('.form-date input[name=tahun]').val(tahun);

// HAPUS EVENT AGAR TIDAK REPEAT
offevent('.modal')

// LOAD DATA TABLE
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




$('.table-dikerjakan,.table-selesai').on('click','.btn-detail',function(){
	var idjob=$(this).val();
	$.ajax({
		url:"<?php echo base_url('billing/getdetailbilling') ?>", 
		data:$('.form-date').serialize()+"&idjob="+idjob,
		dataType:'json',
		success:function(data){
			$('.modal-detail input[name=jobnumber]').val(data.job_number);
			$('.modal-detail input[name=namaperusahaan]').val(data.nama_perusahaan);
			$('.modal-detail input[name=periode]').val(data.periode);
			$('.modal-detail input[name=fee]').val(data.fee);
			$('.modal-detail input[name=tottranslembur]').val(data.tottranslembur);
			$('.modal-detail input[name=totuangmakan]').val(data.totuangmakan);
			$('.modal-detail input[name=totope]').val(data.totope);

			// button print
			var urldetail="<?= base_url('billing/printpage/detail?idjob=')?>"+data.id_job+"&"+$('.form-date').serialize();
			var urlreport="<?= base_url('billing/printpage/report?idjob=')?>"+data.id_job+"&"+$('.form-date').serialize();
			// button print
			$('.modal-detail .btn-print').attr('href',urldetail);
			$('.modal-detail li a[data-toggle="tab"]').on('shown.bs.tab', function () {
			  var tab=$(this).attr('href');
			  if(tab=='#tab1'){
			  	$('.modal-detail .btn-print').attr('href',urldetail);
			  }
			  else if(tab=='#tab2'){
			  	$('.modal-detail .btn-print').attr('href',urlreport);
			  }
			})
			$.ajax({
				url:"<?php echo base_url('billing/getdetailuser') ?>", 
				data:{idjob:idjob},
				dataType:'json',
				success:function(data){
					$('.table-detail tbody').html(data.tbody);

				}
			})	
			$.ajax({
				url:'<?php echo base_url('billing/getreporttab') ?>',
				data:{idjob:idjob},
				dataType:'json',
				success:function(data){
					$('.report tbody').html(data.tbody);

					$('.modal-detail').modal('show');
					}
			})
		}
	})
})

	
	
</script>

