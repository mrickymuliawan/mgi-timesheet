<section class="content-header">
  <h4>
  <span>
    <i class="fa fa-building-o"></i> <span>Perusahaan</span></a>
   </span>
  </h4>
</section>
   
<!-- Main content -->
<section class="content">

<div class="box">
	
	<div class="box-header with-border">	
		<div class="row">
			<div class="col-md-offset-8 col-md-4">
				<div class="pull-right">
					<button class="btn btn-outline-info btn-add"><i class="fa fa-plus"></i><br>Add Perusahaan</button> 
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
							<th>Nama Perusahaan</th>
							<th>Alamat</th>
							<th>Kota</th>
							<th>OPE</th>
							<th>FEE</th>
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

<div class="modal fade modal-form-add" role="dialog">
<div class="modal-dialog ">
	<div class="modal-content">
	    <div class="modal-header">
	    	<button type="button" class="close" data-dismiss="modal">&times;</button>
	        <h4 class="modal-title">Add Data</h4>
	    </div>

	  	<form class="form-horizontal form-add">
	    <div class="modal-body">

        <div class="form-group">
          <label for="Nama Perusahaan" class="col-sm-3 control-label">Nama Perusahaan</label>

          <div class="col-sm-9">
            <input type="text" class="form-control" name="namaperusahaan">
          </div>
        </div>
       
        <div class="form-group">
          <label for="alamat" class="col-sm-3 control-label">Alamat</label>

          <div class="col-sm-9">
            <textarea class="form-control" name="alamat"></textarea>
          </div>
        </div>
         <div class="form-group">
          <label for="Kota" class="col-sm-3 control-label">Kota</label>

          <div class="col-sm-9">
            <input type="text" class="form-control" name="kota">
          </div>
        </div>
        <div class="form-group">
          <label for="OPE" class="col-sm-3 control-label">OPE</label>
          <div class="col-sm-1">
            Rp.
          </div>
          <div class="col-sm-8">
            <input type="text" class="form-control number-format" name="ope">
          </div>
        </div>
        <div class="form-group">
          <label for="" class="col-sm-3 control-label">Fee</label>
          <div class="col-sm-1">
            Rp.
          </div>
          <div class="col-sm-8">
            <input type="text" class="form-control number-format" name="fee">
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

<div class="modal fade modal-form-edit" role="dialog">
<div class="modal-dialog ">
	<div class="modal-content">
	    <div class="modal-header">
	    	<button type="button" class="close" data-dismiss="modal">&times;</button>
	        <h4 class="modal-title">Edit Data</h4>
	    </div>

	  	<form class="form-horizontal form-edit">
	    <div class="modal-body">
        <div class="form-group">
          <label for="idperusahaan" class="col-sm-3 control-label">ID Perusahaan</label>

          <div class="col-sm-9">
            <input type="text" class="form-control" name="idperusahaan" readonly>
          </div>
        </div>
        <div class="form-group">
          <label for="Nama Perusahaan" class="col-sm-3 control-label">Nama Perusahaan</label>

          <div class="col-sm-9">
            <input type="text" class="form-control" name="namaperusahaan">
          </div>
        </div>
       
        <div class="form-group">
          <label for="alamat" class="col-sm-3 control-label">Alamat</label>

          <div class="col-sm-9">
            <textarea class="form-control" name="alamat"></textarea>
          </div>
        </div>
         <div class="form-group">
          <label for="Kota" class="col-sm-3 control-label">Kota</label>

          <div class="col-sm-9">
            <input type="text" class="form-control" name="kota">
          </div>
        </div>
        <div class="form-group">
          <label for="OPE" class="col-sm-3 control-label">OPE</label>
          <div class="col-sm-1">
            Rp.
          </div>
          <div class="col-sm-8">
            <input type="text" class="form-control number-format" name="ope">
          </div>
        </div>
        <div class="form-group">
          <label for="" class="col-sm-3 control-label">Fee</label>
          <div class="col-sm-1">
            Rp.
          </div>
          <div class="col-sm-8">
            <input type="text" class="form-control number-format" name="fee">
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

// HAPUS EVENT AGAR TIDAK REPEAT
offevent('.modal')

// LOAD DATA TABLE
var table=$(".table-data").DataTable({
	"ajax":{
		"url":"<?php echo base_url('perusahaan/getall') ?>", 
		"type":"POST",
		stateSave: true
	}
})

// REFRESH 
$('.btn-refresh').on('click',function(){
	table.ajax.reload(null,false);
})

// ADD ITEM
$('.btn-add').on('click',function(){
	$('.form-add').trigger('reset')
	$('.modal-form-add').modal('show');
})
 $('.form-add').validate({
	rules:{
		namaperusahaan:{
			required:true
		},
		alamat:{
			required:true
		},
		kota:{
			required:true
		},
		ope:{
			required:true
		},
		fee:{
			required:true
		}
	},
	submitHandler:function(form){
		$.ajax({
		  url:"<?php echo base_url('perusahaan/add') ?>", 
		  type:'post',
		  data:$('.form-add').serialize(),
		  success: function(data){
			 	$('.modal-form-add').modal('hide');
				table.ajax.reload(null,false);
			 	showAlert(data)
		  }
		});
	}
})

// EDIT ITEM
$('.table-data').on('click','.btn-edit',function(){
	var id=$(this).val();
	$.ajax({
		url:"<?php echo base_url('perusahaan/getedit') ?>", 
		data:{id:id},
		dataType:'json',
		success:function(data){
			$('.modal-form-edit input[name=idperusahaan]').val(data.id_perusahaan);
			$('.modal-form-edit input[name=namaperusahaan]').val(data.nama_perusahaan);
			$('.modal-form-edit textarea[name=alamat]').val(data.alamat);
			$('.modal-form-edit input[name=kota]').val(data.kota);
			$('.modal-form-edit input[name=ope]').val(data.ope);
			$('.modal-form-edit input[name=fee]').val(data.fee);
		  $('.modal-form-edit').modal('show');
					
		}
	})
})

	$('.form-edit').validate({
	rules:{
		namaperusahaan:{
			required:true
		},
		alamat:{
			required:true
		},
		kota:{
			required:true
		},
		ope:{
			required:true
		},
		fee:{
			required:true
		}
	},
	submitHandler:function(form){
		$.ajax({
		  url:"<?php echo base_url('perusahaan/edit') ?>", 
		  type:'post',
		  data:$('.form-edit').serialize(),
		  success: function(data){
			  $('.modal-form-edit').modal('hide');
				table.ajax.reload(null,false);
			 	showAlert(data)
			 	
		  }
		});
	}
})

// DELETE ITEM
$('.table-data').on('click','.btn-delete',function(){
	var id=$(this).val();
	$('.modal-delete').modal('show');
	$('.modal-delete .btn-submit').click(function(){
		$.ajax({
			url:"<?php echo base_url('perusahaan/delete') ?>", 
			data:{id:id},
			success:function(data){
				$('.modal-delete').modal('hide');
				table.ajax.reload(null,false);
			 	showAlert(data)
			}
		})
	})

})


	
	
</script>

