<section class="content-header">
  <h4>
  <span>
    <i class="fa fa-briefcase"></i> <span>Job</span></a>
   </span>
  </h4>
</section>
   
<!-- Main content -->
<section class="content">

<div class="box">
	
	<div class="box-header with-border">	
		<div class="row">
			<form class="form-date">
			<label class="control-label col-sm-1">Periode: </label>
			<div class="col-md-2">
				<select class="form-control" name="bulan">
					<option value="alltime" selected="true">All Time</option>
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

			
			<div class="col-md-2">
				<input type="number" name="tahun" class="form-control" readonly="true">
			</div>
			<div class="col-md-2">
				<button type="submit" class="form-control btn btn-outline-info btn-go">Go</button>
			</div>
			</form>
			<div class="col-md-4 col-md-offset-1 ">
				<div class="pull-right">
					<button class="btn btn-outline-info btn-add"><i class="fa fa-plus"></i><br>Add Job</button> 
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
									<th>Tanggal Mulai</th>
									<th>Fee</th>
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
									<th>Tanggal Mulai</th>
									<th>Fee</th>
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

<div class="modal fade modal-add-job" role="dialog">
<div class="modal-dialog ">
	<div class="modal-content">
	    <div class="modal-header">
	    	<button type="button" class="close" data-dismiss="modal">&times;</button>
	        <h4 class="modal-title">Add Data</h4>
	    </div>

	  	<form class="form-horizontal form-add">
	    <div class="modal-body">

        <div class="form-group">
          <label for="Nama Perusahaan" class="col-sm-3 control-label">Job Number</label>

          <div class="col-sm-9">
            <input type="text" class="form-control" name="jobnumber">
          </div>
        </div>

				<div class="form-group">
					<label class="control-label col-sm-3">Tanggal Mulai: </label>
					<div class="col-md-9">
						<input type="text" name="tanggalmulai" class="form-control">
					</div>
				</div>
				<div class="form-group">
          <label class="col-sm-3 control-label">Fee</label>
          <div class="col-sm-1">
            Rp.
          </div>
          <div class="col-sm-8">
            <input type="text" class="form-control number-format" name="fee">
          </div>
        </div>
				<br>

				<div class="form-group">
          <label class="col-sm-3 control-label">Search</label>

          <div class="col-sm-9">
            <input type="text" class="form-control" name="searchperusahaan">
          </div>
        </div>

				<div class="form-group">
          <label class="col-sm-3 control-label">Nama Perusahaan</label>

          <div class="col-sm-9">
          	<input type="hidden" class="form-control" name="idperusahaan">
          	<input type="hidden" class="form-control" name="status" value="dikerjakan">
            <input type="text" class="form-control" name="namaperusahaan" readonly="">
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-3 control-label">Jumlah Kota</label>

          <div class="col-sm-9">
            <input type="text" class="form-control" name="jumlahkota" readonly="">
          </div>
        </div>
        
			</div>
			<div class="modal-footer">
      	<button type="submit" name='submit' class="btn btn-outline-info">Add</button>
      	<button type="reset" class="btn btn-outline-danger">Reset</button>
        <button type="button" class="btn btn-default" data-dismiss="modal" >Close</button>
		  </div>
		  </form>
	</div>
	</div>
</div>

<div class="modal fade modal-edit-job" role="dialog">
<div class="modal-dialog ">
	<div class="modal-content">
	    <div class="modal-header">
	    	<button type="button" class="close" data-dismiss="modal">&times;</button>
	        <h4 class="modal-title">Edit Data</h4>
	    </div>

	  	<form class="form-horizontal form-edit">
	  	<div class="modal-body">

        <div class="form-group">
          <label for="Nama Perusahaan" class="col-sm-3 control-label">Job Number</label>

          <div class="col-sm-9">
          	<input type="hidden" class="form-control" name="idjob">
            <input type="text" class="form-control" name="jobnumber">
          </div>
        </div>

        <!-- <div class="form-group">
	       	<label class="control-label col-sm-3">Bulan: </label>
					<div class="col-md-9">
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
				</div> -->

				<div class="form-group">
					<label class="control-label col-sm-3">Tanggal Mulai: </label>
					<div class="col-md-9">
						<input type="text" name="tanggalmulai" class="form-control">
					</div>
				</div>
				<div class="form-group">
          <label class="col-sm-3 control-label">Fee</label>
          <div class="col-sm-1">
            Rp.
          </div>
          <div class="col-sm-8">
            <input type="text" class="form-control number-format" name="fee">
          </div>
        </div>
				<br>
				
				<div class="form-group">
          <label class="col-sm-3 control-label">Search</label>

          <div class="col-sm-9">
            <input type="text" class="form-control" name="searchperusahaan">
          </div>
        </div>

				<div class="form-group">
          <label class="col-sm-3 control-label">Nama Perusahaan</label>

          <div class="col-sm-9">
          	<input type="hidden" class="form-control" name="idperusahaan">
            <input type="text" class="form-control" name="namaperusahaan" readonly="">
          </div>
        </div>


        <div class="form-group">
          <label class="col-sm-3 control-label">Jumlah Kota</label>

          <div class="col-sm-9">
            <input type="text" class="form-control" name="jumlahkota" readonly="">
          </div>
        </div>
        
        <div class="form-group">
          <label class="col-sm-3 control-label">Status</label>
          <div class="col-sm-9">
            <select class="form-control" name="status">
            	<option value="dikerjakan">Dikerjakan</option>
            	<option value="selesai">Selesai</option>
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

<div class="modal fade modal-delete" role="dialog">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
			  <button type="button" class="close" data-dismiss="modal">&times;</button>
			  <h4 class="modal-title">Delete data</h4>
			</div>
			<div class="modal-body infobody">
			  <b>Anda yakin?</b> <br>
			  <small>Data yang terhapus tidak dapat di kembalikan</small>
			</div>
			<div class="modal-footer">
			  <button type="button" class="btn btn-outline-danger btn-submit">Delete</button>
			  <button type="button" class="btn btn-default" data-dismiss="modal" >Cancel</button>
			        
			</div>
		</div>
 	</div>
 </div>

<div class="alert alert-success alert-infor">
  <i class="icon fa fa-check"></i>
  <span>Success alert preview. This alert is dismissable.</span>
</div>

<script type="text/javascript">
$('input[name=tanggalmulai]').datepicker({ format: 'dd M yyyy'});
function loadtable(){
	$(".table-dikerjakan").DataTable().destroy()
	$(".table-selesai").DataTable().destroy()
	$(".table-dikerjakan").DataTable({
	  	"ajax":{
			"url":"<?php echo base_url('job/getdikerjakan') ?>?"+$('.form-date').serialize(),
			"type":"POST",
			stateSave: true
		}
	 })
	$(".table-selesai").DataTable({
	  	"ajax":{
			"url":"<?php echo base_url('job/getselesai') ?>?"+$('.form-date').serialize(),
			"type":"POST",
			stateSave: true
		}
	 })
	}	
function autocomplete(modal){
	$( modal+" input[name=searchperusahaan]" ).autocomplete({
	minLength:1,
	autoFocus:true,
	source: function( request, response ) {
    $.ajax( {
      url: "Job/autocomperusahaan",
      dataType: "json",
      data: {search: $(modal+' input[name=searchperusahaan]').val() },
      success: function(data) {
        response(data);
      }
    })
  },
	select: function(event,data){
  	$.ajax({
			url:"<?php echo base_url('Job/chooseperusahaan') ?>", 
			data:{id:data.item.value},
			dataType:'json',
			success:function(data){;
				$(modal+' input[name=searchperusahaan]').val("");
				$(modal+' input[name=idperusahaan]').val(data.id_perusahaan);
				$(modal+' input[name=namaperusahaan]').val(data.nama_perusahaan)
				$(modal+' input[name=jumlahkota]').val(data.jumlah_kota);	
			}
		})
	}

  });
}
// -------------------------------------------------------------------------------------------------------------

// SET DATE
var date=new Date();
var tahun=date.getFullYear();
$('.form-date input[name=tahun]').val(tahun);

$('.form-date select[name=bulan]').change(function(){
	$('.form-date input[name=tahun]').prop('readonly',true);
	if ($(this).val()!='alltime') {
		$('.form-date input[name=tahun]').prop('readonly',false);
	}
})


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

// ADD ITEM
$('.btn-add').on('click',function(){
	$('.form-add').trigger('reset')
	$('.modal-add-job').modal('show');
	// AUTO COMPLETE SEARCH PERUSAHAAN
	autocomplete('.modal-add-job');

})
 $('.form-add').validate({
	rules:{
		jobnumber:{
      required:true,
      remote:{
        url: "<?php echo base_url('Job/checkjobnumber'); ?>",
        type: "post",
        data: {
          koderegister: function() {
            return $( ".form-add input[name=jobnumber]" ).val();
          }
        }
      }
    },
		tanggalmulai:{
			required:true
		},
		fee:{
			required:true
		},
		namaperusahaan:{
			required:true
		}
	},
	messages:{
    jobnumber:{
      remote:'Job Number has been registered'
    }
  }, 
	submitHandler:function(form){
		$.ajax({
		  url:"<?php echo base_url('job/add') ?>", 
		  type:'post',
		  data:$('.form-add').serialize(),
		  success: function(data){
			 	$('.modal-add-job').modal('hide');
				loadtable()
			 	showAlert(data)
		  }
		});
	}
})

// EDIT ITEM
$('.table-dikerjakan,.table-selesai').on('click','.btn-edit',function(){
	var id=$(this).val();
	$.ajax({
		url:"<?php echo base_url('job/getedit') ?>", 
		data:{id:id},
		dataType:'json',
		success:function(data){
			$('.modal-edit-job input[name=idjob]').val(data.id_job);
			$('.modal-edit-job input[name=idperusahaan]').val(data.id_perusahaan);
			$('.modal-edit-job input[name=jobnumber]').val(data.job_number);
			$('.modal-edit-job input[name=tanggalmulai]').val(data.tanggal_mulai);
			$('.modal-edit-job input[name=namaperusahaan]').val(data.nama_perusahaan);
			$('.modal-edit-job input[name=jumlahkota]').val(data.jumlah_kota);
			$('.modal-edit-job input[name=fee]').val(data.fee);
			$('.modal-edit-job select[name=status]').val(data.status);
		  $('.modal-edit-job').modal('show');
					
		}
	})
})
	
	// AUTO COMPLETE SEARCH PERUSAHAAN
	autocomplete('.modal-edit-job');
	$('.form-edit').validate({
	rules:{
		jobnumber:{
			required:true
		},
		tanggalmulai:{
			required:true
		},
		fee:{
			required:true
		},
		namaperusahaan:{
			required:true
		}
	},
	submitHandler:function(form){
		$.ajax({
		  url:"<?php echo base_url('job/edit') ?>", 
		  type:'post',
		  data:$('.form-edit').serialize(),
		  success: function(data){
			  $('.modal-edit-job').modal('hide');
				loadtable()
			 	showAlert(data)
			 	
		  }
		});
	}
})

// DELETE ITEM
$('.table-dikerjakan,.table-selesai').on('click','.btn-delete',function(){
	var id=$(this).val();
	$('.modal-delete').modal('show');
	$('.modal-delete .btn-submit').click(function(){
		$.ajax({
			url:"<?php echo base_url('job/delete') ?>", 
			data:{id:id},
			success:function(data){
				$('.modal-delete').modal('hide');
				loadtable()
			 	showAlert(data)
			}
		})
	})

})


	
	
</script>

