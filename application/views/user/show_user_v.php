<section class="content-header">
  <h4>
  <span>
    <i class="fa fa-address-card-o" aria-hidden=true></i> <span>User</span></a>
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
					<button class="btn btn-outline-warning btn-jamcuti"><i class="fa fa-plus"></i><br>Add Cuti </button> 
					<button class="btn btn-outline-info btn-add"><i class="fa fa-plus"></i><br>Add User</button> 
					<button class="btn btn-outline-success btn-refresh"><i class="fa fa-refresh"></i><br>Refresh</button>
				</div>
			</div>
		</div>
	</div>
	
	<div class="box-body">
		<div class="row">
			<div class="col-md-12 table-responsive">
				<ul class="nav nav-tabs">
				  <li class="active"><a data-toggle="tab" href="#user">User / Supervisor</a></li>
				  <li><a data-toggle="tab" href="#admin">Admin</a></li>
				</ul>

				<div class="tab-content">
				<br>
				  <div id="user" class="tab-pane fade in active">
				   <table class="table table-striped table-hover table-user" width="100%">
						<thead>
								<tr>
									<th>No.</th>
									<th>Email</th>
									<th>Nama user</th>
									<th>Jabatan</th>
									<th>Gaji Pokok</th>
									<th>Role</th>
									<th>Status</th>
									<th>Saldo Cuti</th>
									<th>Tools</th>
								</tr>
							</thead>
						<tbody>

						</tbody>
						</table>
							
				  </div>

				  <div id="admin" class="tab-pane fade">
				  	<table class="table table-striped table-hover table-admin" width="100%">
						<thead>
								<tr>
									<th>No.</th>
									<th>Email</th>
									<th>Nama user</th>
									<th>Jabatan</th>
									<th>Role</th>
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
          <label for="npwp" class="col-sm-3 control-label">Email</label>

          <div class="col-sm-9">
            <input type="text" class="form-control" name="npwp">
          </div>
        </div>
        <div class="form-group">
          <label for="namauser" class="col-sm-3 control-label">Nama user</label>

          <div class="col-sm-9">
            <input type="text" class="form-control" name="namauser">
          </div>
        </div>

        <div class="form-group">
          <label for="password" class="col-sm-3 control-label">Password</label>

          <div class="col-sm-9">
            <input type="password" class="form-control" name="password" readonly="true">
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-3 control-label">Role</label>

          <div class="col-sm-4">
            <select name='role' class="form-control">
            	<option value="user">User</option>
            	<option value="supervisor">Supervisor</option>
            	<option value="administrator">Administrator</option>
            </select>
          </div>
        </div>

       	<div class="form-group">
          <label for="" class="col-sm-3 control-label">Jabatan</label>

          <div class="col-sm-9">
            <input type="text" class="form-control" name="jabatan">
          </div>
        </div>
       	<div class="uangtunjangan">
       		<div class="form-group">
          <label for="gapok" class="col-sm-3 control-label">Gaji Pokok</label>
          <div class="col-sm-1">
            Rp.
          </div>
          <div class="col-sm-8">
            <input type="text" class="form-control number-format" name="gajipokok">
          </div>
        </div>
        
        <div class="form-group">
          <label for="lembur" class="col-sm-3 control-label">Tunjangan Transport</label>
          <div class="col-sm-1">
            Rp.
          </div>
          <div class="col-sm-8">
            <input type="text" class="form-control number-format" name="tunjangantransport">
          </div>
        </div>
        <div class="form-group">
          <label for="lembur" class="col-sm-3 control-label">Tunjangan Komunikasi</label>
          <div class="col-sm-1">
            Rp.
          </div>
          <div class="col-sm-8">
            <input type="text" class="form-control number-format" name="tunjangankomunikasi">
          </div>
        </div>
        <div class="form-group">
          <label for="lembur" class="col-sm-3 control-label">Tunjangan Parkir</label>
          <div class="col-sm-1">
            Rp.
          </div>
          <div class="col-sm-8">
            <input type="text" class="form-control number-format" name="tunjanganparkir">
          </div>
        </div>
       	</div><!-- /.pendapatan -->
         
        <div class="form-group">
          <label class="col-sm-3 control-label">Status</label>

          <div class="col-sm-4">
            <select name='status' class="form-control">
            	<option value="aktif">Aktif</option>
            	<option value="tidakaktif">Tidak Aktif</option>
            </select>
          </div>
        </div>
         <div class="form-group">
          <label for="lembur" class="col-xs-3 control-label">Saldo Cuti</label>
          <div class="col-xs-4">
            <input type="text" class="form-control number-format" name="saldocuti" placeholder="8 jam = 1 hari">
          </div>
          <div class="col-xs-1">
          	Jam
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
          <label for="npwp" class="col-sm-3 control-label">Email</label>

          <div class="col-sm-9">
            <input type="text" class="form-control" name="npwp" readonly="true">
          </div>
        </div>
        <div class="form-group">
          <label for="namauser" class="col-sm-3 control-label">Nama user</label>

          <div class="col-sm-9">
            <input type="text" class="form-control" name="namauser">
          </div>
        </div>

      

        <div class="form-group">
          <label class="col-sm-3 control-label">Role</label>

          <div class="col-sm-4">
            <select name='role' class="form-control">
            	<option value="user">User</option>
            	<option value="supervisor">Supervisor</option>
            	<option value="administrator">Administrator</option>
            </select>
          </div>
        </div>

       	<div class="form-group">
          <label for="" class="col-sm-3 control-label">Jabatan</label>

          <div class="col-sm-9">
            <input type="text" class="form-control" name="jabatan">
          </div>
        </div>
       	<div class="uangtunjangan">
         <div class="form-group">
          <label for="gapok" class="col-sm-3 control-label">Gaji Pokok</label>
          <div class="col-sm-1">
            Rp.
          </div>
          <div class="col-sm-8">
            <input type="text" class="form-control number-format" name="gajipokok">
          </div>
        </div>
        <div class="form-group">
          <label for="gapok" class="col-sm-3 control-label">Uang Lembur 1</label>

          <div class="col-sm-3">
            <input type="text" class="form-control number-format" name="uanglembur1" disabled="true">
          </div>
          <label for="gapok" class="col-sm-3 control-label">Uang Lembur 2</label>
 
          <div class="col-sm-3">
            <input type="text" class="form-control number-format" name="uanglembur2" disabled="true">
          </div>
        </div>

        <div class="form-group">
          <label for="lembur" class="col-sm-3 control-label">Tunjangan Transport</label>
          <div class="col-sm-1">
            Rp.
          </div>
          <div class="col-sm-8">
            <input type="text" class="form-control number-format" name="tunjangantransport">
          </div>
        </div>
        <div class="form-group">
          <label for="lembur" class="col-sm-3 control-label">Tunjangan Komunikasi</label>
          <div class="col-sm-1">
            Rp.
          </div>
          <div class="col-sm-8">
            <input type="text" class="form-control number-format" name="tunjangankomunikasi">
          </div>
        </div>
        <div class="form-group">
          <label for="lembur" class="col-sm-3 control-label">Tunjangan Parkir</label>
          <div class="col-sm-1">
            Rp.
          </div>
          <div class="col-sm-8">
            <input type="text" class="form-control number-format" name="tunjanganparkir">
          </div>
        </div>
       		
       	</div><!-- /.uangtunjangan -->
        <div class="form-group">
          <label class="col-sm-3 control-label">Status</label>

          <div class="col-sm-4">
            <select name='status' class="form-control">
            	<option value="aktif">Aktif</option>
            	<option value="tidakaktif">Tidak Aktif</option>
            </select>
          </div>
        </div>
        <div class="form-group">
          <label for="lembur" class="col-xs-3 control-label">Saldo Cuti</label>
          <div class="col-xs-4">
            <input type="text" class="form-control number-format" name="saldocuti" placeholder="8 jam = 1 hari">
          </div>
          <div class="col-xs-1">
          	Jam
          </div>
        </div>
			</div>
			<div class="modal-footer">
      	<button type="submit" class="btn btn-outline-info">Save</button>
      	<button type="button" class="btn btn-outline-danger" name='resetpass'>Reset Password</button>
        <button type="button" class="btn btn-default" data-dismiss="modal" >Close</button>
		  </div>
		  </form>
	</div>
	</div>
</div>

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

<div class="modal fade modal-delete" role="dialog">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
			  <button type="button" class="close" data-dismiss="modal">&times;</button>
			  <h4 class="modal-title">Delete Data</h4>
			</div>
			<div class="modal-body infobody">
			  <b>Anda yakin?</b> <br>
			  <small>Data yang terhapus tidak dapat di kembalikan</small>
			</div>
			<div class="modal-footer">
			  <button type="button" name='submit' class="btn btn-outline-danger">Delete</button>
			  <button type="button" class="btn btn-default cancel" data-dismiss="modal" >Cancel</button>
			        
			</div>
		</div>
 	</div>
 </div>
 
<div class="modal fade modal-confirm" role="dialog">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
			  <button type="button" class="close" data-dismiss="modal">&times;</button>
			  <h4 class="modal-title">Informasi</h4>
			</div>
			<div class="modal-body infobody">
			   <b>Anda yakin?</b> <br>
			</div>
			<div class="modal-footer">
			  <button type="button" name='submit' class="btn btn-outline-danger">Save</button>
			  <button type="button" class="btn btn-default cancel" data-dismiss="modal" >Cancel</button>
			        
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

// LOAD DATATABLE
var table=$(".table-user").DataTable({
  	"ajax":{
		"url":"<?php echo base_url('user/getuser') ?>", 
		"type":"POST",
		stateSave: true
	}
 })
var table2=$(".table-admin").DataTable({
  	"ajax":{
		"url":"<?php echo base_url('user/getadmin') ?>", 
		"type":"POST",
		stateSave: true
	}
 })
// REFRESH 
$('.btn-refresh').on('click',function(){
	table.ajax.reload(null,false);
	table2.ajax.reload(null,false);
})

// ADD ITEM
$('.btn-add').on('click',function(){
  $('.uangtunjangan input,input[name=saldocuti]').prop('readonly',false).val(' ');
	$('.form-add').trigger('reset')
	$('.modal-form-add').modal('show')
	$('.modal-form-add input[name=npwp]').change(function(){
		$('.modal-form-add input[name=password').val($(this).val())
	})
})

$('.form-add').validate({
	rules:{
		namauser:{
			required:true
		},
		password:{
			required:true
		},
		gajipokok:{
			required:true
		},
		jabatan:{
			required:true
		},
		saldocuti:{
			required:true
		},
		tunjangantransport:{
			required:true
		},
		tunjanganparkir:{
			required:true
		},
		tunjangankomunikasi:{
			required:true
		},
		npwp:{
      required:true,
      email:true,
      remote:{
        url: "<?php echo base_url('User/checknpwp'); ?>",
        type: "post",
        data: {
          koderegister: function() {
            return $( ".form-add input[name=npwp]" ).val();
          }
        }
      }
    }
	},
	messages:{
    npwp:{
      remote:'NPWP has been registered'
    }
  }, 
	submitHandler:function(form){
		$.ajax({
		  url:"<?php echo base_url('user/add') ?>", 
		  type:'post',
		  data:$('.form-add').serialize(),
		  success: function(data){
			  $('.modal-form-add').modal('hide');
				table.ajax.reload(null,false);
				table2.ajax.reload(null,false);
			 	showAlert(data)
			 	
		  }
		});
	}
})

 
// EDIT ITEM
$('.table-user,.table-admin').on('click','.btn-edit',function(){
  $('.uangtunjangan input,input[name=saldocuti]').prop('readonly',false).val(' ');
	var npwp=$(this).val();
	$.ajax({
		url:"<?php echo base_url('user/getedit') ?>", 
		data:{npwp:npwp},
		dataType:'json',
		success:function(data){
			var npwp=$('.modal-form-edit input[name=npwp]').val(data.npwp);
			$('.modal-form-edit input[name=namauser]').val(data.nama_user);
			$('.modal-form-edit select[name=role]').val(data.role);
			$('.modal-form-edit input[name=jabatan]').val(data.jabatan);
			$('.modal-form-edit input[name=gajipokok]').val(data.gaji_pokok);
			$('.modal-form-edit input[name=tunjangantransport]').val(data.tunjangan_transport);
			$('.modal-form-edit input[name=tunjanganparkir]').val(data.tunjangan_parkir);
			$('.modal-form-edit input[name=tunjangankomunikasi]').val(data.tunjangan_komunikasi);
			$('.modal-form-edit select[name=status]').val(data.status);
			$('.modal-form-edit input[name=saldocuti]').val(data.saldo_cuti);
      $('.modal-form-edit input[name=uanglembur1]').val(data.uang_lembur1);
      $('.modal-form-edit input[name=uanglembur2]').val(data.uang_lembur2);
			if ($('.modal-form-edit select[name=role]').val()=='administrator') {
				$('.uangtunjangan input,input[name=saldocuti]').prop('readonly',true).val(0);
			}
		  $('.modal-form-edit').modal('show');
					
		}
	})

	$('.modal-form-edit button[name=resetpass]').on('click',function(){
		$('.modal-form-edit').modal('hide');
		var resetpass=1;
		$('.modal-form-edit').on('hidden.bs.modal', function (e) {
			if (resetpass==1) {
 				$('.modal-confirm').modal('show')
 				resetpass=0;
 			}
		})
 		$('.modal-confirm button[name=submit]').on('click',function(){
 			$.ajax({
			  url:"<?php echo base_url('user/resetpass') ?>",
			  data:{npwp:npwp},
			  success: function(data){
				  $('.modal-confirm').modal('hide');
					table.ajax.reload(null,false);
					table2.ajax.reload(null,false);
				 	showAlert(data) 	
			  }
			});
 		})
 	})
})

$('.form-edit').validate({
	rules:{
		namauser:{
			required:true
		},
		gajipokok:{
			required:true
		},
		jabatan:{
			required:true
		},
		saldocuti:{
			required:true
		},
		tunjangantransport:{
			required:true
		},
		tunjanganparkir:{
			required:true
		},
		tunjangankomunikasi:{
			required:true
		}
	},
	submitHandler:function(form){
		$.ajax({
		  url:"<?php echo base_url('user/edit') ?>", 
		  type:'post',
		  data:$('.form-edit').serialize(),
		  success: function(data){
			 	$('.modal-form-edit').modal('hide');
			 	table.ajax.reload(null,false);
			 	table2.ajax.reload(null,false);
			 	showAlert(data)
		  }
		});
	}
})


//	DELETE ITEM
$('.table-user,.table-admin').on('click','.btn-delete',function(){
	var npwp=$(this).val();
	$('.modal-delete').modal('show');
	$('.modal-delete button[name=submit]').click(function(){
		$.ajax({
			url:"<?php echo base_url('user/delete') ?>", 
			data:{npwp:npwp},
			success:function(data){
			 	$('.modal-delete').modal('hide');
				table.ajax.reload(null,false);
				table2.ajax.reload(null,false);
			 	showAlert(data)
			}
		})
	})
	
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
					table.ajax.reload(null,false);
					table2.ajax.reload(null,false);
				 	showAlert(data)
				 	
			  }
			});
		}
	})
})	
$('select[name=role]').change(function(){
	$('.uangtunjangan input,input[name=saldocuti]').prop('readonly',false).val(' ');
	if ($(this).val()=='administrator') {
		$('.uangtunjangan input,input[name=saldocuti]').prop('readonly',true).val(0);
	}
})	
</script>

