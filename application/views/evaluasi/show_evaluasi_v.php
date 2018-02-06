<section class="content-header">
  <h4>
  <span>
    <i class="fa fa-money" aria-hidden=true></i> <span>evaluasi</span></a>
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
				<select class="form-control" name="bulanmulai">
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
			<label class="control-label col-sm-1">Sampai dengan: </label>
			<div class="col-md-2">
				<select class="form-control" name="bulanselesai">
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
			<div class="col-md-1">
				<button type="submit" class="form-control btn btn-outline-info btn-go">Go</button>
			</div>
			</form>
			<div class=" col-md-2">
				<div class="pull-right">
					<button class="btn btn-outline-success btn-refresh"><i class="fa fa-refresh"></i><br>Refresh</button>
				</div>
			</div>
		</div>
	</div>

	<div class="box-body">
		<div class="row">	
			<div class="col-md-12 table-responsive">	
		   	<table class="table table-striped table-hover table-data" width="100%">
					<thead>
						<tr>
							<th>No.</th>
							<!-- <th>Job Number</th> -->
							<th>Nama Perusahaan</th>
							<th>Fee</th>
							<th>Total Jam Kerja</th>
							<th>Total Jam Lembur</th>
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

</section>

<div class="modal fade modal-detail modal-full" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			    <h4 class="modal-title">Detail evaluasi</h4>
			</div>
			<div class="modal-body">
				<form class="form-horizontal">
		
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
					  <label for="Nama Perusahaan" class="col-sm-2 control-label">Total Jam Kerja</label>
					  <div class="col-sm-1">Rp. </div>
					  <div class="col-sm-3">
					    <input type="text" class="form-control number-format" name="totjaker" readonly>
					  </div>
					</div>
					<div class="form-group">
					  <label for="Nama Perusahaan" class="col-sm-2 control-label">Total Lembur</label>
					  <div class="col-sm-1">Rp. </div>
					  <div class="col-sm-3">
					    <input type="text" class="form-control number-format" name="totlembur" readonly>
					  </div>
					</div>
					<div class="form-group">
					  <label for="Nama Perusahaan" class="col-sm-2 control-label">Total OPE</label>
					  <div class="col-sm-1">Rp. </div>
					  <div class="col-sm-3">
					    <input type="text" class="form-control number-format" name="totope" readonly>
					  </div>
					</div>
				</form>
			     

				<div class="table-responsive">
					<table class="table table-striped table-hover table-detail" width="100%">
						<thead>
							<tr>
								<th>No.</th>
								<!-- <th>Email</th> -->
								<th>Nama Auditor</th>
								<th>Total Jam Kerja</th>
								<th>Total Lembur</th>
								<th>Total OPE</th>
							</tr>
						</thead>
						<tbody>

						</tbody>
					</table>	
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
	$(".table-data").DataTable().destroy()
	$(".table-data").DataTable({
	  	"ajax":{
			"url":"<?php echo base_url('evaluasi/getdata') ?>?"+$('.form-date').serialize(),
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
$('.form-date select[name=bulanmulai]').val(bulan);
$('.form-date select[name=bulanselesai]').val(bulan);
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




$('.table-data').on('click','.btn-detail',function(){
	var idperusahaan=$(this).val();
	$.ajax({
		url:"<?php echo base_url('evaluasi/getdetailevaluasi') ?>", 
		data:$('.form-date').serialize()+"&idperusahaan="+idperusahaan,
		dataType:'json',
		success:function(data){
			// $('.modal-detail input[name=jobnumber]').val(data.job_number);
			// $('.modal-detail input[name=namaperusahaan]').val(data.nama_perusahaan);

			$('.modal-detail input[name=namaperusahaan]').val(data.nama_perusahaan);
			$('.modal-detail input[name=totjaker]').val(data.tjaker);
			$('.modal-detail input[name=totlembur]').val(data.tlembur);
			$('.modal-detail input[name=totope]').val(data.tope);
			$('.modal-detail input[name=periode]').val(data.periode);

			// button print
			var urldetail="<?= base_url('evaluasi/printpage/detail?idperusahaan=')?>"+idperusahaan+"&"+$('.form-date').serialize();
			$('.modal-detail .btn-print').attr('href',urldetail);

			$.ajax({
				url:"<?php echo base_url('evaluasi/getevaluasitable') ?>", 
				data:$('.form-date').serialize()+"&idperusahaan="+idperusahaan,
				dataType:'json',
				success:function(data){
					$('.table-detail tbody').html(data.tbody);
					$('.modal-detail').modal('show');
				}
			})	
			
		}
	})
})

	
	
</script>

