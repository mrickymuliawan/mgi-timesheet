<section class="content-header">
  <h4>
  <span>
     <i class="fa fa-calendar" aria-hidden=true></i> <span>Timesheet</span>
   </span>
  </h4>
</section>
   
<!-- Main content -->
<section class="content">

<div class="box">

	<div class="box-header with-border">
		<div class="row">
			<form class="form-date">
			<label class="control-label col-sm-1 dblclick">Bulan: </label>
			<div class="col-md-2">
				<select class="form-control" name="bulan2" disabled="">
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
				<input type="hidden" name="bulan" />
			</div>

			<label class="control-label col-sm-1">Tahun: </label>
			<div class="col-md-2">
				<input type="number" name="tahun" class="form-control" readonly="">
			</div>
			<div class="col-md-2">
				<button type="submit" class="form-control btn btn-outline-info btn-go">Go</button>
			</div>
			</form>
			<div class="col-md-4"> 
				<div class="pull-right">
					<a class="btn btn-outline-primary btn-print" target="_blank"><i class="fa fa-print"></i> <br> Print</a>
					<button class="btn btn-outline-info btn-add"><i class="fa fa-plus"></i><br>Add Timesheet</button> 
					<button class="btn btn-outline-success btn-refresh"><i class="fa fa-refresh"></i><br>Refresh</button>
				</div>
			</div>
		</div>
		<br>
		<div class="row">
			<label class="control-label col-sm-1">Saldo Cuti: </label>
			<div class="col-md-2">
				<input type="text" name="saldocuti" class="form-control" readonly="">
			</div>
			<label class="control-label col-sm-1">Cuti: </label>
			<div class="col-md-2">
				<input type="text" name="cuti" class="form-control" readonly="">
			</div>
			<label class="control-label col-sm-1">Sakit: </label>
			<div class="col-md-2">
				<input type="text" name="sakit" class="form-control" readonly="">
			</div>
			<label class="control-label col-sm-1">Izin: </label>
			<div class="col-md-2">
				<input type="text" name="izin" class="form-control" readonly="">
			</div>
			
		</div>
	</div>

	<div class="box-body">

		<div class="row">

			<div class="col-md-12">

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
				  <div id="per2" class="tab-pane fade table-responsive">
				    
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

		</div>

	</div>

</div>
</section>

<div class="modal fade modal-addperusahaan" role="dialog">
<div class="modal-dialog ">
	<div class="modal-content">
	    <div class="modal-header">
	    	<button type="button" class="close" data-dismiss="modal">&times;</button>
	        <h4 class="modal-title">Add Data</h4>
	    </div>

	  	<form class="form-horizontal form-addperusahaan">
	    <div class="modal-body">

        <div class="form-group">
          <label for="searchperusahaan" class="col-sm-3 control-label">Search</label>

          <div class="col-sm-9">
             <input type="text" class="form-control" name="searchperusahaan">
          </div>
      	</div>
				
				<div class="form-group">
          <label for="jobnumber" class="col-sm-3 control-label">Job Number</label>

          <div class="col-sm-9">
             <input type="text" class="form-control" name="jobnumber" readonly="">
          </div>
      	</div>

        <div class="form-group">
          <label for="namaperusahaan" class="col-sm-3 control-label">Nama Perusahaan</label>

          <div class="col-sm-9">
             <input type="text" class="form-control" name="namaperusahaan" readonly="">
          </div>
      	</div>

				<div class="form-group">
          <label for="tanggalmulai" class="col-sm-3 control-label">Tanggal Mulai</label>

          <div class="col-sm-9">
             <input type="text" class="form-control" name="tanggalmulai" readonly="">
          </div>
      	</div>

      	<div class="form-group">
          <div class="col-sm-9">
          	<input type="hidden" class="form-control" name="periode" value="1">
            <input type="hidden" class="form-control" name="idperusahaan">
            <input type="hidden" class="form-control" name="idjob">
          </div>
      	</div>
      </div>
			<div class="modal-footer">
      	<button type="submit" name='submit' class="btn btn-outline-info">Add</button>
      	<!-- <button type="reset" name='reset' class="btn btn-outline-danger">Reset</button> -->
        <button type="button" class="btn btn-default" data-dismiss="modal" >Close</button>
		  </div>
		  </form>
	</div>
	</div>
</div>

<div class="modal fade modal-editperusahaan" role="dialog">
<div class="modal-dialog ">
	<div class="modal-content">
	    <div class="modal-header">
	    	<button type="button" class="close" data-dismiss="modal">&times;</button>
	        <h4 class="modal-title">Edit Data</h4>
	    </div>

	  	<form class="form-horizontal form-editperusahaan">
	    <div class="modal-body">

        <!-- <div class="form-group">
          <label for="searchperusahaan" class="col-sm-3 control-label">Search</label>

          <div class="col-sm-9">
             <input type="text" class="form-control" name="searchperusahaan">
          </div>
      	</div> -->

				<div class="form-group">
          <label for="jobnumber" class="col-sm-3 control-label">Job Number</label>

          <div class="col-sm-9">
             <input type="text" class="form-control" name="jobnumber" readonly="">
          </div>
      	</div>

        <div class="form-group">
          <label for="namaperusahaan" class="col-sm-3 control-label">Nama Perusahaan</label>

          <div class="col-sm-9">
             <input type="text" class="form-control" name="namaperusahaan" readonly="">
          </div>
      	</div>

      	<div class="form-group">
          <label for="tanggalmulai" class="col-sm-3 control-label">Tanggal Mulai</label>

          <div class="col-sm-9">
            <input type="text" class="form-control" name="tanggalmulai" readonly="">
          </div>
      	</div>

      	<div class="form-group">
          <div class="col-sm-9">
            <input type="hidden" class="form-control" name="idtimesheet">
            <input type="hidden" class="form-control" name="idperusahaan">
            <input type="hidden" class="form-control" name="idjob">
          </div>
      	</div>
      </div>
			<div class="modal-footer">
      	<!-- <button type="submit" name='submit' class="btn btn-outline-info">Save</button> -->
      	<button type="button" name='delete' class="btn btn-outline-danger">Delete</button>
        <button type="button" class="btn btn-default" data-dismiss="modal" >Close</button>
		  </div>
		  </form>
	</div>
	</div>
</div>

 <div class="modal fade modal-editjam" role="dialog">
 		<div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal">&times;</button>
		        <h4 class="modal-title">Edit</h4>
		      </div>
		      <form class="form-horizontal form-editjaker">
		      <div class="modal-body">
		      	<div class="form-group">
	        		<label class="control-label col-sm-4">Nama Perusahaan</label>
	        		<div class="col-sm-8">
	        			<input type="text" name="namaperusahaan" class="form-control" readonly="">
	        		</div>
	        	</div>
	        	
	        	<div class="form-group">
	        		<label class="control-label col-sm-4">Periode</label>
	        		<div class="col-sm-3">
	        			<input type="text" name="periode" class="form-control" value="1" readonly="">
	        		</div>
	        		<label class="control-label col-sm-2">Tanggal</label>
	        		<div class="col-sm-3">
	        			<input type="number" name="tanggal" class="form-control" readonly="">
	        			<input type="hidden" name="idtimesheet" class="form-control">
	        			<input type="hidden" name="jenishari" class="form-control">
	        		</div>
	        	</div>
	        	<div class="form-group">
	        		<label class="control-label col-sm-4">Jam Kerja</label>
	        		<div class="col-sm-8">
	        			<input type="number" min=1 name="jamkerja" class="form-control">
	        		</div>
	        	</div>
	        	<div class="form-group">
	        		<label class="control-label col-sm-4">Kota</label>
	        		<div class="col-sm-8">
	        			<select name="idperusahaandetail" class="form-control">
	        				
	        			</select>
	        		</div>
	        	</div>
	        	<div class="form-group">
	        		
	        	</div>
	        	<div class="form-group">
	        		<label class="control-label col-sm-4">Tipe Kerja</label>	        		
	        		<div class="col-sm-8">
	        			<select class="form-control" name="tipekerja">
		          		<option value="client">Client</option>
		          		<option value="office">Office</option>
		          	</select>
	        		</div>
	        		
	        	</div>
	        	<div class="form-group">
	        		<label class="control-label col-sm-4">Transport Lembur</label>	
	        		<div class="control-label col-sm-1">Rp. </div>        		
	        		<div class="col-sm-7">
	        			<input type="text" name="transportlembur" class="form-control number-format">
	        		</div>
	        	</div>
	        	<div class="form-group">
	        		<label class="control-label col-sm-4">Uang Makan</label>	
	        		<div class="control-label col-sm-1">Rp. </div>        		
	        		<div class="col-sm-7">
	        			<input type="text" name="uangmakan" class="form-control number-format">
	        		</div>
	        	</div>
		      </div>
		      <div class="modal-footer">
		      	<button type="submit" name='submit' class="btn btn-outline-info">Save</button>
      			<button type="button" name='delete' class="btn btn-outline-danger">Delete</button>
		        <button type="button" class="btn btn-default cancel" data-dismiss="modal" >Close</button>
		        
		      </div>
		      </form>
		    </div>
 		</div>
 	</div>

<div class="modal fade modal-editpic" role="dialog">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Edit</h4>
			</div>
			<form class="form-horizontal form-editpic">
			<div class="modal-body">
				<div class="form-group">				
					<label class="control-label col-sm-4">Search </label>
					<div class="col-sm-8">
						<input type="text" name='searchpic' class="form-control"> 
					</div>
				</div>
				<div class="form-group">				
					<label class="control-label col-sm-4">Nama PIC: </label>
					<div class="col-sm-8">
						<input type="text" name='namapic' class="form-control" readonly=""> 
						<input type="hidden" name='npwppic' class="form-control"> 
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<input type="hidden" name="idtimesheet">
				<button type="submit" name='submit' class="btn btn-outline-info">Save</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
			</form>
		</div>
 	</div>
</div>

<div class="modal fade modal-editlibur" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Edit</h4>
			</div>
			<form class="form-horizontal form-editlibur">
			<div class="modal-body">
				<div class="form-group">				
					<label class="control-label col-sm-4">Nama Hari libur </label>
					<div class="col-sm-8">
						<select name='namahari' class="form-control">
            	<option value="cuti">Cuti</option>
            	<option value="izin">Izin</option>
            	<option value="sakit">Sakit</option>
            	<option value="liburnasional">Libur Nasional</option>
            </select>
					</div>
				</div>
				<div class="form-group">				
					<label class="control-label col-sm-4">Keterangan</label>
					<div class="col-sm-8">
						<input type="text" name='keterangan' class="form-control">
					</div>
				</div>
				<div class="form-group">				
					<label class="control-label col-sm-4">Tanggal </label>
					<div class="col-sm-8">
						<input type="text" name='tanggal' class="form-control" readonly="true">
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="submit" name='submit' class="btn btn-outline-info">Save</button>
				<button type="button" name='delete' class="btn btn-outline-danger">Delete</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
			</form>
		</div>
 	</div>
</div>

<div class="modal modal-delete" role="dialog">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
			  <button type="button" class="close" data-dismiss="modal">&times;</button>
			  <h4 class="modal-title">Delete data</h4>
			</div>
			<div class="modal-body">
			   <b>Anda yakin?</b> <br>
			  <small>Data yang terhapus tidak dapat di kembalikan</small>
			</div>
			<div class="modal-footer">
			  <button type="button" name='delete' class="btn btn-outline-danger">Delete</button>
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

function autofocus(form,input){
	$(form).find(input).focus()
}
function autocomplete(modal){
	$( modal+" input[name=searchperusahaan]" ).autocomplete({
	minLength:1,
	autoFocus:true,
	source: function( request, response ) {
    $.ajax( {
      url: "Timesheet/autocomperusahaan",
      dataType: "json",
      data:$(modal+' input[name=searchperusahaan],.form-date').serialize(),
      success: function(data) {
        response(data);
      }
    })
  },
	select: function(event,data){
  	$.ajax({
			url:"<?php echo base_url('Timesheet/chooseperusahaan') ?>", 
			data:{id:data.item.value},
			dataType:'json',
			success:function(data){;
				$(modal+' input[name=searchperusahaan]').val("");
				$(modal+' input[name=jobnumber]').val(data.job_number);
				$(modal+' input[name=idperusahaan]').val(data.id_perusahaan);
				$(modal+' input[name=idjob]').val(data.id_job);
				$(modal+' input[name=namaperusahaan]').val(data.nama_perusahaan)
				$(modal+' input[name=tanggalmulai]').val(data.tanggal_mulai);
			}
		})
	}

  });
}
var load=1;
function loadtimesheet(per){
	$.ajax({
	url:'<?php echo base_url('Timesheet/getall') ?>'+per,
	data:$('.form-date').serialize(),
	dataType:'json',
	success:function(data){
			
			$('.periode'+per+' thead').html(data.thead);
			$('.periode'+per+' tbody').html(data.tbody);
			$('.periode'+per+' tfoot').html(data.tfoot);
			if (per == 1) {
				$('input[name=saldocuti]').val(data['detailtimesheet']['saldo_cuti']);
				$('input[name=sakit]').val(data['detailtimesheet']['sakit']);
				$('input[name=cuti]').val(data['detailtimesheet']['cuti']);
				$('input[name=izin]').val(data['detailtimesheet']['izin']);
			}

			$('.table-timesheet tbody tr .td-status').each(function(){
				if ($(this).find('span').html()=='approved') {
					$(this).siblings().click(false)
					// alert('aa')
				}
			})
			// alert(load)
			// load=load+1;
		}
	})

}

function loadreporttab(per){
	$.ajax({
	url:'<?php echo base_url('Timesheet/getreporttab/') ?>'+per,
	data:$('.form-date').serialize(),
	dataType:'json',
	success:function(data){
		$('.report'+per+' tbody').html(data.tbody);
		// $('.periode'+per+' tfoot').html(data.tfoot);
		// alert(load)
		// load=load+1;
		}
	})
}

// button print
function print(){
	var date=$('.form-date').serialize();
	$('.btn-print').attr('href','<?php echo base_url('timesheet/printpage/timesheet1/?') ?>'+date)
	$('a[data-toggle="tab"]').on('shown.bs.tab', function () {
	  var tab=$(this).attr('href');
	  if(tab=='#per1'){
	  	$('.btn-print').attr('href','<?php echo base_url('timesheet/printpage/timesheet1/?') ?>'+date);
	  }
	  else if(tab=='#per2'){
	  	$('.btn-print').attr('href','<?php echo base_url('timesheet/printpage/timesheet2/?') ?>'+date);
	  }
	  else if(tab=='#report1'){
	  	$('.btn-print').attr('href','<?php echo base_url('timesheet/printpage/report/?periode=1&') ?>'+date)
	  }
	  else if(tab=='#report2'){
	  	$('.btn-print').attr('href','<?php echo base_url('timesheet/printpage/report/?periode=2&') ?>'+date)
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

$('.form-date select').val(bulan);
$('.form-date input[name=bulan]').val(bulan);
$('.form-date input[name=tahun]').val(tahun);
// PERIODE 
$('a[data-toggle="tab"]').on('shown.bs.tab', function () {
  var periode=$(this).attr('href');
  if(periode=='#per1'){
  	$('.form-addperusahaan input[name=periode]').val(1);
  	$('.form-editjaker input[name=periode]').val(1);
  }
  else{
  	$('.form-addperusahaan input[name=periode]').val(2);
  	$('.form-editjaker input[name=periode]').val(2);
  }
})
// LOAD FIRST TIME
loadtimesheet(1)
loadtimesheet(2)
loadreporttab(1)
loadreporttab(2)

// EDIT BULAN DAN TAHUN
$('.form-date').validate({
	submitHandler:function(form){
	loadtimesheet(1);
	loadtimesheet(2);
	loadreporttab(1);
	loadreporttab(2);
	print()
	}
})

// REFRESH 
$('.btn-refresh').on('click',function(){
	loadtimesheet(1);
	loadtimesheet(2);
	loadreporttab(1)
	loadreporttab(2)
})

print()

// EDIT JAM KERJA
$('.table-timesheet tbody').on('click','.td-jamkerja',function(){
	var periode=$('.form-editjaker input[name=periode]').val();
	$('.form-editjaker').trigger('reset')
	$('.form-editjaker input[name=periode]').val(periode);

	//mengambil nilai tanggal, idtimesheet, namaperusahaan dan oper
	var tanggal=$(this).find('input[name=tanggal]').val();
	var jenishari=$(this).find('input[name=jenishari]').val();
	var idtimesheet=$(this).siblings('.td-idtimesheet').find('input[name=idtimesheet]').val();
	var namaperusahaan=$(this).siblings('.td-idtimesheet').find('input[name=namaperusahaan]').val();
	$('.modal-editjam input[name=idtimesheet]').val(idtimesheet);
	$('.modal-editjam input[name=namaperusahaan]').val(namaperusahaan);
	$('.modal-editjam input[name=tanggal]').val(tanggal);
	$('.modal-editjam input[name=jenishari]').val(jenishari);


	// ambil detail timesheet 
	$.ajax({
		url:"<?php echo base_url('Timesheet/geteditjaker') ?>", 
		data:{idtimesheet:idtimesheet,tanggal:tanggal,jenishari:jenishari},
		dataType:'json',
		success:function(data){
			$('.modal-editjam select[name=idperusahaandetail]').html(data.kota);
			// alert(data['detail']['jam_kerja'])
	  	if (data['detail']!=null) {
	  		
	  		$('.modal-editjam input[name=jamkerja]').val(data['detail']['jam_kerja']);
	  		$('.modal-editjam select[name=tipekerja]').val(data['detail']['tipe_kerja']);
				$('.modal-editjam input[name=uangmakan]').val(data['detail']['uang_makan']);
				$('.modal-editjam input[name=transportlembur]').val(data['detail']['transport_lembur']);
	  	}	
	  	// show modal
			$('.modal-editjam').modal('show');
		}
	})


	// click submit
	$('.form-editjaker').validate({
		submitHandler:function(form){
			$.ajax({
				url:'Timesheet/editjamkerja',
				data:$('.form-editjaker,.form-date').serialize(),
				success:function(data){
				 	$('.modal-editjam').modal('hide');
					loadtimesheet(1);
					loadtimesheet(2);
					loadreporttab(1)
					loadreporttab(2)
				 	showAlert(data)
				}
			}) 
		}
	})
	// click delete
  $('.modal-editjam button[name=delete]').on('click',function(){
  	$('.modal-editjam').modal('hide');
 		$('.modal-delete').modal('show')
 		$('.modal-delete button[name=delete]').on('click',function(){
 			$.ajax({
			  url:"<?php echo base_url('Timesheet/deletejamkerja') ?>",
			  data:$('.form-editjaker,.form-date').serialize(),
			  success: function(data){
				  $('.modal-delete').modal('hide');
					loadtimesheet(1);
					loadtimesheet(2);
					loadreporttab(1)
					loadreporttab(2)
				 	showAlert(data)
		  	}
			});
 		})
  }) 

})

// ADD PERUSAHAAN
$('.btn-add').on('click',function(){
	$('.form-addperusahaan').trigger('reset')
	$('.modal-addperusahaan').modal('show');
	// AUTO COMPLETE ADD PERUSAHAAN
	autocomplete('.modal-addperusahaan')
	// click submit
	$('.form-addperusahaan').validate({
		rules:{
			namaperusahaan:{
				required:true
			}
	  }, 
		submitHandler:function(form){
			$.ajax({
			  url:"<?php echo base_url('Timesheet/addperusahaan') ?>", 
			  type:'post',
			  data:$('.form-addperusahaan,.form-date').serialize(),
			  success: function(data){
				 	$('.modal-addperusahaan').modal('hide');
					loadtimesheet(1);
					loadtimesheet(2);
					loadreporttab(1)
					loadreporttab(2)
				 	showAlert(data)
			  }
			});
		}
	})
})


 
 // EDIT PERUSAHAAN
$('.table-timesheet tbody').on('click','.td-idtimesheet',function(){
	var idtimesheet=$(this).find('input[name=idtimesheet]').val();
	$.ajax({
		url:"<?php echo base_url('Timesheet/geteditperusahaan') ?>", 
		data:{id:idtimesheet},
		dataType:'json',
		success:function(data){
			$('.modal-editperusahaan input[name=idtimesheet]').val(data.id_timesheet)
			$('.modal-editperusahaan input[name=jobnumber]').val(data.job_number);
			$('.modal-editperusahaan input[name=idperusahaan]').val(data.id_perusahaan)
			$('.modal-editperusahaan input[name=namaperusahaan]').val(data.nama_perusahaan)
			$('.modal-editperusahaan input[name=tanggalmulai]').val(data.tanggal_mulai);
			// $('.modal-editperusahaan textarea[name=alamat]').val(data.alamat);
			// $('.modal-editperusahaan input[name=kota]').val(data.kota);	
			// $('.modal-editperusahaan input[name=idjob]').val(data.id_job);		
		  $('.modal-editperusahaan').modal('show');
					
		}
	})

	// autocomplete search perusahaan 
 	autocomplete('.modal-editperusahaan');

 	// click submit
 	$('.form-editperusahaan').validate({
 		rules:{
			namaperusahaan:{
				required:true
			}
	  }, 
		submitHandler:function(form){
			$.ajax({
			  url:"<?php echo base_url('Timesheet/editperusahaants') ?>", 
			  type:'post',
			  data:$(form).serialize(),
			  success: function(data){
				  $('.modal-editperusahaan').modal('hide');
					loadtimesheet(1);
					loadtimesheet(2);
					loadreporttab(1)
					loadreporttab(2)
				 	showAlert(data)
			  }
			});
		}
	})

 	// click delete
 	$('.modal-editperusahaan button[name=delete]').on('click',function(){
		$('.modal-editperusahaan').modal('hide');
 		$('.modal-delete').modal('show')
 		$('.modal-delete button[name=delete]').on('click',function(){
 			$.ajax({
		  url:"<?php echo base_url('Timesheet/deleteperusahaants') ?>",
		  data:{idtimesheet:idtimesheet},
		  success: function(data){
			  $('.modal-delete').modal('hide');
				loadtimesheet(1);
				loadtimesheet(2);
				loadreporttab(1)
				loadreporttab(2)
			 	showAlert(data) 	
		  }
			});
 		})
 	})
 		

})

// EDIT PIC
$('.table-timesheet tbody').on('click','.td-pic',function(){
	$('.form-editpic').trigger('reset')
	var idtimesheet=$(this).siblings('.td-idtimesheet').find('input[name=idtimesheet]').val();
	var namapic=$(this).find('input[name=namapic]').val();
	var npwppic=$(this).find('input[name=npwppic]').val();
	$('.modal-editpic').find('input[name=namapic]').val(namapic);
	$('.modal-editpic').find('input[name=npwppic]').val(npwppic);
	$('.modal-editpic').find('input[name=idtimesheet]').val(idtimesheet);
	$('.modal-editpic').modal('show')

	$(".modal-editpic input[name=searchpic]" ).autocomplete({
	minLength:1,
	autoFocus:true,
	source: function( request, response ) {
    $.ajax( {
      url: "Timesheet/autocompic",
      dataType: "json",
      data:$('.modal-editpic input[name=searchpic]').serialize(),
      success: function(data) {
        response(data);
      }
    })
  },
	select: function(event,data){
  	$.ajax({
			url:"<?php echo base_url('Timesheet/choosepic') ?>", 
			data:{id:data.item.value},
			dataType:'json',
			success:function(data){;
				$('.modal-editpic input[name=searchpic]').val("");
				$('.modal-editpic input[name=npwppic]').val(data.npwp);
				$('.modal-editpic input[name=namapic]').val(data.nama_user);
			}
		})
	}

  });
	// click submit
	$('.form-editpic').validate({
		rules:{
			namapic:{
				required:true
			}
	  }, 
		submitHandler:function(form){
		$.ajax({
			url:"<?php echo base_url('Timesheet/editpic'); ?>",
			data:$(form).serialize(),
			success:function(data){
				$('.modal-editpic').modal('hide');
				loadtimesheet(1);
				loadtimesheet(2);
				loadreporttab(1)
				loadreporttab(2);
			 	showAlert(data)
			}
		})
		}
	})
})

// EDIT LIBUR
$('.table-timesheet thead').on('click','.td-hari,.td-libur-custom',function(){
	$('.form-editlibur').trigger('reset')
	var tanggal=$(this).find('p').html()
	$('.form-editlibur').find('input[name=tanggal]').val(tanggal)
	$('.modal-editlibur').modal('show')

	// ambil data 
	$.ajax({
		url:"<?php echo base_url('Timesheet/geteditlibur') ?>", 
		data:$('.form-editlibur,.form-date').serialize(),
		dataType:'json',
		success:function(data){
	  	if (data!=null) {
	  		$('.modal-editlibur select[name=namahari]').val(data.nama_hari);
	  		$('.modal-editlibur input[name=keterangan]').val(data.keterangan);
	  		$('.modal-editlibur button[name=delete]').attr('disabled',false)
	  	}	
	  	else{
	  		$('.modal-editlibur button[name=delete]').attr('disabled',true)
	  	}
		}
	})
	// click submit
	$('.form-editlibur').validate({
		submitHandler:function(form){
		$.ajax({
			url:"<?php echo base_url('Timesheet/editlibur'); ?>",
			data:$('.form-editlibur,.form-date').serialize(),
			success:function(data){
				$('.modal-editlibur').modal('hide');
				loadtimesheet(1);
				loadtimesheet(2);
				loadreporttab(1)
				loadreporttab(2);
			 	showAlert(data)
			}
		})
		}
	})
	// click delete
 	$('.modal-editlibur button[name=delete]').on('click',function(){
		$('.modal-editlibur').modal('hide');
 		$('.modal-delete').modal('show')
 		$('.modal-delete button[name=delete]').on('click',function(){
 			$.ajax({
		  url:"<?php echo base_url('Timesheet/deletelibur') ?>",
		  data:$('.form-editlibur,.form-date').serialize(),
		  success: function(data){
			  $('.modal-delete').modal('hide');
				loadtimesheet(1);
				loadtimesheet(2);
				loadreporttab(1)
				loadreporttab(2);
			 	showAlert(data) 	
		  }
			});
 		})
 	})
})	


	$('.btn-go').hide()
	// $('.dblclick').dblclick(function(){
	// 	$(".form-date select[name=bulan2]").removeAttr('disabled')
	// 	$(".form-date input[name=tahun]").removeAttr('readonly')
	// 	$('.btn-go').show()
	// })
	// $(".form-date select[name=bulan2]").change(function(){
	// 	$(".form-date input[name=bulan]").val(this.value)
	// })

</script>

