<section class="content-header">
  <h4>
  <span>
    <i class="fa fa-minus-circle" aria-hidden=true></i> <span>Control Cuti</span>
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
			<div class="col-md-4"> 
				<div class="pull-right">
					<button class="btn btn-outline-warning btn-jamcuti"><i class="fa fa-plus"></i><br>Add Cuti </button> 
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
						<th>Email</th>
						<th>Nama</th>
						<th>Saldo Awal bulan</th>
						<th>Total Cuti</th>
						<th>Saldo Akhir</th>
						<th>Saldo Sekarang</th>
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

<div class="modal fade modal-form-jamcuti" role="dialog">
<div class="modal-dialog modal-sm">
	<div class="modal-content">
	    <div class="modal-header">
	    	<button type="button" class="close" data-dismiss="modal">&times;</button>
	        <h4 class="modal-title">Edit Jam Cuti</h4>
	    </div>

	  	<form class="form-horizontal form-jamcuti">
	    <div class="modal-body">

        <div class="form-group">
          <label class="col-sm-5 control-label">Jumlah Jam</label>

          <div class="col-sm-4">
            <input type="number" class="form-control" name="jumlahjam" value="8">
          </div>
          <label class="col-sm-1 control-label">Jam</label>
        </div>

        <div class="form-group">
          <label class="col-sm-5 control-label">Operasi</label>

          <div class="col-sm-7">
            <select name='operasi' class="form-control">
            	<option value="+">tambah</option>
            	<option value="-">kurang</option>
            </select>
          </div>
        </div>

			</div>
			<div class="modal-footer">
      	<button type="submit" class="btn btn-outline-info">Save</button>
        <button type="button" class="btn btn-default" data-dismiss="modal" >Close</button>
		  </div>
		  </form>
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
			"url":"<?php echo base_url('controlcuti/getall') ?>?"+$('.form-date').serialize(),
			"type":"POST",
			stateSave: true
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

	// TAMBAH JAM CUTI
	$('.btn-jamcuti').on('click',function(){
		$('.form-jamcuti').trigger('reset')
		$('.modal-form-jamcuti').modal('show')
		$('.form-jamcuti').validate({
			rules:{
				jumlahjam:{
					required:true
				}
		  }, 
			submitHandler:function(form){
				$.ajax({
				  url:"<?php echo base_url('user/addjamcuti') ?>", 
				  type:'post',
				  data:$('.form-jamcuti').serialize(),
				  success: function(data){
					  $('.modal-form-jamcuti').modal('hide');
						loadtable()
					 	showAlert(data)
					 	
				  }
				});
			}
		})
	})	

	
</script>