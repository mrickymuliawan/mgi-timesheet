<section class="content-header">
  <h4>
  <span>
    <i class="fa fa-lock" aria-hidden=true></i> <span>Password Setting</span></a>
   </span>
  </h4>
</section>
   
<!-- Main content -->
<section class="content">

<div class="box">
	
	
	<div class="box-body">
		<form class="form-edit">

      <div class="form-group row">
        <label for="npwp" class="col-sm-2 control-label">Email</label>

        <div class="col-sm-5">
          <input type="text" class="form-control" name="npwp" readonly="true" 
          value="<?php echo $this->session->userdata('npwp'); ?>">
        </div>
      </div>
      <div class="form-group row">
        <label for="namauser" class="col-sm-2 control-label">Nama</label>

        <div class="col-sm-5">
          <input type="text" class="form-control" name="namauser" 
          value="<?php echo $this->session->userdata('namauser'); ?>" readonly="true">
        </div>
      </div>
      <div class="form-group row">
      	<label for="password" class="col-sm-2 control-label"><h4>Ganti Password</h4></label>
      </div>
      <div class="form-group row">
        <label for="password" class="col-sm-2 control-label">Password Lama</label>

        <div class="col-sm-5">
          <input type="password" class="form-control" name="passwordlama">
        </div>
        <p class="salahpass" style="color: red"></p>
      </div>
       <div class="form-group row">
        <label for="password" class="col-sm-2 control-label">Password Baru</label>

        <div class="col-sm-5">
          <input type="password" class="form-control" name="passwordbaru">
        </div>
        
      </div>
      <div class="col-md-offset-9 col-md-3">
	    	<button type="submit" class="btn btn-outline-info">Save</button>
	    	<button type="button" class="btn btn-outline-danger" name='resetpass'>Reset Password</button>
      </div>
		</form>
	</div>

</div>

</section>
 
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


$('.form-edit').validate({
	rules:{
		passwordlama:{
			required:true
		},
		passwordbaru:{
			required:true
		}
	},
	submitHandler:function(form){
		$.ajax({
		  url:"<?php echo base_url('profile/edit') ?>", 
		  type:'post',
		  data:$('.form-edit').serialize(),
		  success: function(data){
		  	if (data=='0') {
			 		$('.salahpass').html("Password salah")
		  	}
		  	else{
		  		$('.salahpass').html('')
				  $('.form-edit').trigger('reset')
		  		showAlert("Password Berhasil di ubah") 	
		  	}
		  }
		});
	}
})

$('button[name=resetpass]').on('click',function(){
 		$('.modal-confirm').modal('show')
 		$('.modal-confirm button[name=submit]').on('click',function(){
 			$.ajax({
			  url:"<?php echo base_url('profile/resetpass') ?>",
			  data:$('.form-edit').serialize(),
			  success: function(data){
				  $('.modal-confirm').modal('hide');
				  $('.form-edit').trigger('reset')
				 	showAlert(data) 	
			  }
			});
 		})
 	})



	
	
</script>

