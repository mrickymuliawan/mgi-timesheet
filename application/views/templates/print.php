<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Timesheet System</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
 
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?php echo base_url('assets/adminlte/bootstrap/css/bootstrap.min.css'); ?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url('assets/adminlte/plugins/font-awesome/css/font-awesome.min.css'); ?>">


  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('assets/adminlte/dist/css/AdminLTE.css'); ?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/adminlte/dist/css/skins/skin-blue-light.min.css'); ?>">

  <!-- CUSTOM -->
  <link rel="stylesheet" href="<?php echo base_url('assets/adminlte/plugins/datatables/dataTables.bootstrap.css'); ?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/adminlte/custom/css/custom-style.css'); ?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/adminlte/custom/css/custom-btn.css'); ?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/adminlte/custom/css/jquery-ui.min.css'); ?>">
  <!-- SCRIPT -->
  <script src="<?php echo base_url('assets/adminlte/plugins/jQuery/jquery-2.2.3.min.js'); ?>"></script>

  <!-- AdminLTE App -->
  <script src="<?php echo base_url('assets/adminlte/dist/js/app.min.js'); ?>"></script>

  <!-- CUSTOM -->
  <script src="<?php echo base_url('assets/adminlte/custom/js/custom-script.js'); ?>"></script>
  <script src="<?php echo base_url('assets/adminlte/custom/js/jquery-ui.min.js'); ?>"></script>
  <script src="<?php echo base_url('assets/adminlte/custom/js/jquery-number.min.js'); ?>"></script>
  <style>
  body{
    padding: 5% 2%;
  }
  @media print{
    .table-timesheet{
      border-collapse: separate;
      border-spacing: 0.5px 0.5px;
    }
    .table-timesheet .td-libur{
      border-color: red;
    }
    .table-timesheet .client{
      border-color: blue;
    }
    .table-timesheet .td-libur-custom{
      border-color: orange;
    }
  }
  </style>
  
</head>

<body class="hold-transition skin-blue-light sidebar-mini fixed">

<?php if ($print == 'timesheet'): ?>
  <div class="timesheet">
    <img src="<?php echo base_url(''); ?>assets/adminlte/dist/img/logo.png" width="20%" height="5%"> 
    <span>REGISTERED PUBLIC ACCOUNTANTS AND BUSINESS ADVISORS</span>
    <div class="row">
      <div class="col-sm-6">
        <table class="table">
          <tr>
            <td>NAMA AUDITOR </td>
            <td>:</td>
            <td class="text-uppercase"><?= $namaauditor ?></td>
          </tr>
          <tr>
            <td>PERIODE</td>
            <td>:</td>
            <td><?= $periode ?></td>
          </tr>
        </table>
      </div><!-- /.col-sm-6 -->
    </div>
    <table class="table-timesheet text-center" border=1 width="100%">
      <thead><?php echo "$thead"; ?></thead> 
      <tbody><?php echo "$tbody"; ?></tbody>
      <tfoot><?php echo "$tfoot"; ?></tfoot> 
    </table>  

    <div class="row">
      <div class="col-sm-2 pull-right text-center">
      <br /><br /><br /><br /><br />
        Approved by
      <br /><br /><br /><br /><br />
      (............................)
      </div>
  </div>
  </div>
  <?php endif ?>


  <?php if ($print == 'report'): ?>
  <div class="report">
    <img src="<?php echo base_url(''); ?>assets/adminlte/dist/img/logo.png" width="20%" height="5%"> 
    <span>REGISTERED PUBLIC ACCOUNTANTS AND BUSINESS ADVISORS</span>
    <div class="row">
      <div class="col-sm-6">
        <table class="table">
          <tr>
            <td>NAMA AUDITOR </td>
            <td>:</td>
            <td class="text-uppercase"><?= $namaauditor ?></td>
          </tr>
          <tr>
            <td>PERIODE</td>
            <td>:</td>
            <td><?= $periode ?></td>
          </tr>
        </table>
      </div>
    </div>
      
    <table class="text-center" border=1 width="100%">
      <thead>
        <tr>
          <th>No.</th>
          <th>Tanggal</th>
          <th>Nama Perusahaan</th>
          <th>Transport Lembur</th>
          <th>Uang Makan</th>
          <th>OPE</th>
          <th>PIC</th>
          <th>Status</th>
        </tr>
      </thead>
      <tbody>
        <?php echo $table; ?>
      </tbody>
    </table>

    <div class="row">
      <div class="col-sm-2 pull-right text-center">
      <br /><br /><br /><br /><br />
        Approved by
      <br /><br /><br /><br /><br />
      (............................)
      </div>
    </div>
  </div>

    
  <?php endif ?>
<?php if ($print == 'billingdetail'): ?>
  <div class="report">
    <img src="<?php echo base_url(''); ?>assets/adminlte/dist/img/logo.png" width="20%" height="5%"> 
    <span>REGISTERED PUBLIC ACCOUNTANTS AND BUSINESS ADVISORS</span>
     <div class="row">
      <div class="col-sm-6">
        <table class="table">
          <tr>
            <td>NAMA PERUSAHAAN </td>
            <td>:</td>
            <td class="text-uppercase"><?= $nama_perusahaan ?></td>
          </tr>
          <tr>
            <td>PERIODE</td>
            <td>:</td>
            <td><?= $periode ?></td>
          </tr>
        </table>
      </div><!-- /.col-sm-6
    </div> -->
      
    <table class="text-center" border=1 width="100%">
      <thead>
        <tr>
          <th>No.</th>
          <th>Nama Auditor</th>
          <th>Total Ope</th>
          <th>Total Transport Lembur</th>
          <th>Total Uang Makan</th>
        </tr>
      </thead>
      <tbody>
        <?php echo $table; ?>
      </tbody>
    </table>

    <div class="row">
      <div class="col-sm-2 pull-right text-center">
      <br /><br /><br /><br /><br />
        Approved by
      <br /><br /><br /><br /><br />
      (............................)
      </div>
    </div>
  </div>

    
  <?php endif ?>
  <?php if ($print == 'billingreport'): ?>
  <div class="report">
    <img src="<?php echo base_url(''); ?>assets/adminlte/dist/img/logo.png" width="20%" height="5%"> 
    <span>REGISTERED PUBLIC ACCOUNTANTS AND BUSINESS ADVISORS</span>
     <div class="row">
      <div class="col-sm-6">
        <table class="table">
          <tr>
            <td>NAMA PERUSAHAAN </td>
            <td>:</td>
            <td class="text-uppercase"><?= $nama_perusahaan ?></td>
          </tr>
          <tr>
            <td>PERIODE</td>
            <td>:</td>
            <td><?= $periode ?></td>
          </tr>
        </table>
      </div><!-- /.col-sm-6
    </div> -->
      
    <table class="text-center" border=1 width="100%">
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
        <?php echo $table; ?>
      </tbody>
    </table>

    <div class="row">
      <div class="col-sm-2 pull-right text-center">
      <br /><br /><br /><br /><br />
        Approved by
      <br /><br /><br /><br /><br />
      (............................)
      </div>
    </div>
  </div>

    
  <?php endif ?>

  <?php if ($print == 'evaluasi'): ?>
  <div class="report">
    <img src="<?php echo base_url(''); ?>assets/adminlte/dist/img/logo.png" width="20%" height="5%"> 
    <span>REGISTERED PUBLIC ACCOUNTANTS AND BUSINESS ADVISORS</span>
     <div class="row">
      <div class="col-sm-6">
        <table class="table">
          <tr>
            <td>NAMA PERUSAHAAN </td>
            <td>:</td>
            <td class="text-uppercase"><?= $nama_perusahaan ?></td>
          </tr>
          <tr>
            <td>PERIODE</td>
            <td>:</td>
            <td><?= $periode ?></td>
          </tr>
        </table>
      </div><!-- /.col-sm-6
    </div> -->
      
    <table class="text-center" border=1 width="100%">
      <thead>
        <tr>
          <th>No.</th>
          <th>Nama Auditor</th>
          <th>Total Jam Kerja</th>
          <th>Total Lembur</th>
          <th>Total OPE</th>
          <th>Gaji</th>
        </tr>
      </thead>
      <tbody>
        <?php echo $table; ?>
      </tbody>
    </table>

    <div class="row">
      <div class="col-sm-2 pull-right text-center">
      <br /><br /><br /><br /><br />
        Approved by
      <br /><br /><br /><br /><br />
      (............................)
      </div>
    </div>
  </div>

    
  <?php endif ?>
</body>
</html>

<script>
  // window.print();
  // window.close() 
</script>
