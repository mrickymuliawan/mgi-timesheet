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
          <label for="" class="col-sm-3 control-label">Fee</label>
          <div class="col-sm-1">
            Rp.
          </div>
          <div class="col-sm-8">
            <input type="text" class="form-control number-format" name="fee">
          </div>
        </div>
				
				<div class="form-group">
          <label for="" class="col-sm-3 control-label">Jumlah Kota</label>
          <div class="col-sm-9">
            <select name="jumlahkota" id="" class="form-control">
            	<option value="1">1</option>
            	<option value="2">2</option>
            	<option value="3">3</option>
            </select>
          </div>
        </div>
        <hr />
				<div class="form-group">
          <label class="col-sm-2 control-label">Kota 1</label>
        </div>
        <div class="form-group">
          <label for="alamat" class="col-sm-3 control-label">Alamat</label>

          <div class="col-sm-9">
            <textarea class="form-control" name="alamat1"></textarea>
          </div>
        </div>
        <div class="form-group">
          <label for="Kota" class="col-sm-3 control-label">Kota</label>

          <div class="col-sm-4">
            <input type="text" class="form-control" name="kota1">
          </div>
          <label for="OPE" class="col-sm-1 control-label">OPE</label>
          <div class="col-sm-1">
            Rp.
          </div>
          <div class="col-sm-3">
            <input type="text" class="form-control number-format" name="ope1">
          </div>
        </div>
        <hr />

        <div class="div-kota2" style="display: none;">
        	<div class="form-group">
          <label class="col-sm-2 control-label">Kota 2</label>
        	</div>
	        <div class="form-group">
	          <label for="alamat" class="col-sm-3 control-label">Alamat</label>

	          <div class="col-sm-9">
	            <textarea class="form-control" name="alamat2"></textarea>
	          </div>
	        </div>
	        <div class="form-group">
	          <label for="Kota" class="col-sm-3 control-label">Kota</label>

	          <div class="col-sm-4">
	            <input type="text" class="form-control" name="kota2">
	          </div>
	          <label for="OPE" class="col-sm-1 control-label">OPE</label>
	          <div class="col-sm-1">
	            Rp.
	          </div>
	          <div class="col-sm-3">
	            <input type="text" class="form-control number-format" name="ope2">
	          </div>
	        </div>
	        <hr />
	      </div>

        <div class="div-kota3" style="display: none;">
	        <div class="form-group">
	          <label class="col-sm-2 control-label">Kota 3</label>
	        </div>
	        <div class="form-group">
	          <label for="alamat" class="col-sm-3 control-label">Alamat</label>

	          <div class="col-sm-9">
	            <textarea class="form-control" name="alamat3"></textarea>
	          </div>
	        </div>
	        <div class="form-group">
	          <label for="Kota" class="col-sm-3 control-label">Kota</label>

	          <div class="col-sm-4">
	            <input type="text" class="form-control" name="kota3">
	          </div>
	          <label for="OPE" class="col-sm-1 control-label">OPE</label>
	          <div class="col-sm-1">
	            Rp.
	          </div>
	          <div class="col-sm-3">
	            <input type="text" class="form-control number-format" name="ope3">
	          </div>
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
          <label for="" class="col-sm-3 control-label">Fee</label>
          <div class="col-sm-1">
            Rp.
          </div>
          <div class="col-sm-8">
            <input type="text" class="form-control number-format" name="fee">
          </div>
        </div>
        <div class="form-group">
          <label for="" class="col-sm-3 control-label">Jumlah Kota</label>
          <div class="col-sm-9">
            <select name="jumlahkota" id="" class="form-control">
            	<option value="1">1</option>
            	<option value="2">2</option>
            	<option value="3">3</option>
            </select>
          </div>
        </div>
        <hr />
				<div class="form-group">
          <label class="col-sm-2 control-label">Kota 1</label>
        </div>
        <div class="form-group">
          <label for="alamat" class="col-sm-3 control-label">Alamat</label>

          <div class="col-sm-9">
            <textarea class="form-control" name="alamat1"></textarea>
          </div>
        </div>
        <div class="form-group">
          <label for="Kota" class="col-sm-3 control-label">Kota</label>

          <div class="col-sm-4">
            <input type="text" class="form-control" name="kota1">
          </div>
          <label for="OPE" class="col-sm-1 control-label">OPE</label>
          <div class="col-sm-1">
            Rp.
          </div>
          <div class="col-sm-3">
            <input type="text" class="form-control number-format" name="ope1">
          </div>
        </div>
        <hr />

        <div class="div-kota2" style="">
        	<div class="form-group">
          <label class="col-sm-2 control-label">Kota 2</label>
        	</div>
	        <div class="form-group">
	          <label for="alamat" class="col-sm-3 control-label">Alamat</label>

	          <div class="col-sm-9">
	            <textarea class="form-control" name="alamat2"></textarea>
	          </div>
	        </div>
	        <div class="form-group">
	          <label for="Kota" class="col-sm-3 control-label">Kota</label>

	          <div class="col-sm-4">
	            <input type="text" class="form-control" name="kota2">
	          </div>
	          <label for="OPE" class="col-sm-1 control-label">OPE</label>
	          <div class="col-sm-1">
	            Rp.
	          </div>
	          <div class="col-sm-3">
	            <input type="text" class="form-control number-format" name="ope2">
	          </div>
	        </div>
	        <hr />
	      </div>

        <div class="div-kota3" style="">
	        <div class="form-group">
	          <label class="col-sm-2 control-label">Kota 3</label>
	        </div>
	        <div class="form-group">
	          <label for="alamat" class="col-sm-3 control-label">Alamat</label>

	          <div class="col-sm-9">
	            <textarea class="form-control" name="alamat3"></textarea>
	          </div>
	        </div>
	        <div class="form-group">
	          <label for="Kota" class="col-sm-3 control-label">Kota</label>

	          <div class="col-sm-4">
	            <input type="text" class="form-control" name="kota3">
	          </div>
	          <label for="OPE" class="col-sm-1 control-label">OPE</label>
	          <div class="col-sm-1">
	            Rp.
	          </div>
	          <div class="col-sm-3">
	            <input type="text" class="form-control number-format" name="ope3">
	          </div>
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
		alamat1:{
			required:true
		},
		kota1:{
			required:true
		},
		ope1:{
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
	$('.form-edit').trigger('reset')
	var id=$(this).val();
	$.ajax({
		url:"<?php echo base_url('perusahaan/getedit') ?>", 
		data:{id:id},
		dataType:'json',
		success:function(data){
			$('.modal-form-edit input[name=idperusahaan]').val(data[0]['id_perusahaan']);
			$('.modal-form-edit input[name=namaperusahaan]').val(data[0]['nama_perusahaan']);
			$('.modal-form-edit input[name=fee]').val(data[0]['fee']);
			$('.modal-form-edit select[name=jumlahkota]').val(data[0]['jumlah_kota']);
			for (var i = 0; i < data[0]['jumlah_kota']; i++) {
				j=i+1;
				$('.modal-form-edit textarea[name=alamat'+j+']').val(data[i]['alamat']);
				$('.modal-form-edit input[name=kota'+j+']').val(data[i]['kota']);
				$('.modal-form-edit input[name=ope'+j+']').val(data[i]['ope']);				
			}
		  $('.modal-form-edit').modal('show');
					
		}
	})
})

	$('.form-edit').validate({
	rules:{
		namaperusahaan:{
			required:true
		},
		alamat1:{
			required:true
		},
		kota1:{
			required:true
		},
		ope1:{
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

$('.modal-form-edit').on('show.bs.modal',function(){
	if ($('.modal-form-edit select[name=jumlahkota]').val()==2) {
		$('.div-kota2').show();
		$('.div-kota3').hide();
	}
	else if($('.modal-form-edit select[name=jumlahkota]').val()==3){
		$('.div-kota2').show();
		$('.div-kota3').show();
	}
	else{
		$('.div-kota2').hide();
		$('.div-kota3').hide();
	}
})
$('.modal-form-add').on('show.bs.modal',function(){
		$('.div-kota2').hide();
		$('.div-kota3').hide();
})
$('select[name=jumlahkota]').change(function(){
	if ($(this).val()==2) {
		$('.div-kota2').show();
		$('.div-kota3').hide();
	}
	else if($(this).val()==3){
		$('.div-kota2').show();
		$('.div-kota3').show();
	}
	else{
		$('.div-kota2').hide();
		$('.div-kota3').hide();
	}
})		
	
</script>

