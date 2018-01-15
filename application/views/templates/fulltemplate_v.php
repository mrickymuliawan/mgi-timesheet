<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Timesheet System</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="shortcut icon" href="<?= base_url('assets/adminlte/dist/img/favicon.png') ?>">
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
  <link rel="stylesheet" href="<?php echo base_url('assets/adminlte/plugins/datepicker-bootstrap/css/bootstrap-datepicker.min.css')?>";" />
  <!-- SCRIPT -->
  <script src="<?php echo base_url('assets/adminlte/plugins/jQuery/jquery-2.2.3.min.js'); ?>"></script>
  <!-- <script src="<?php echo base_url('assets/adminlte/plugins/jQuery/jquery.mobile-1.4.5.min.js'); ?>"></script> -->

  <!-- Bootstrap 3.3.6 -->
  <script src="<?php echo base_url('assets/adminlte/bootstrap/js/bootstrap.min.js'); ?>"></script>

  <!-- AdminLTE App -->
  <script src="<?php echo base_url('assets/adminlte/dist/js/app.min.js'); ?>"></script>

  <!-- CUSTOM -->
  <script src="<?php echo base_url('assets/adminlte/custom/js/custom-script.js'); ?>"></script>
  <script src="<?php echo base_url('assets/adminlte/custom/js/jquery-ui.min.js'); ?>"></script>
  <script src="<?php echo base_url('assets/adminlte/custom/js/jquery-number.min.js'); ?>"></script>
  <script src="<?php echo base_url('assets/adminlte/custom/js/jquery-validate.min.js'); ?>"></script>
  <script src="<?php echo base_url('assets/adminlte/plugins/datatables/jquery.dataTables.min.js'); ?>"></script>
  <script src="<?php echo base_url('assets/adminlte/plugins/datatables/dataTables.bootstrap.js'); ?>"></script>
  <script src="<?php echo base_url('assets/adminlte/plugins/slimScroll/jquery.slimscroll.min.js'); ?>"></script>
  <script src="<?php echo base_url('assets/adminlte/plugins/datepicker-bootstrap/js/bootstrap-datepicker.min.js'); ?>"></script>
  
</head>

<body class="hold-transition skin-blue-light sidebar-mini fixed">
<div class="loader">
  <i class="fa fa-circle-o-notch fa-spin fa-4x"></i>
</div>
<div class="wrapper">

  <!-- Main Header -->
  <header class="main-header">

    <!-- Logo -->
    <a href="<?php echo base_url('home') ?>" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>M</b>GI</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Gideon Adi & </b>Partner</span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">

          
          <!-- User Account Menu -->
          <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- The user image in the navbar-->
              <img src="<?php echo base_url(''); ?>assets/adminlte/dist/img/avatar-flat.png" class="user-image" alt="User Image">
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <span class="hidden-xs"><?php echo $this->session->userdata('namauser') ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header">
                <img src="<?php echo base_url(''); ?>assets/adminlte/dist/img/avatar-flat.png" class="img-circle" alt="User Image">

                <p>
                  <?php echo $this->session->userdata('namauser') ?>
                </p>
              </li>
  
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-right">
                  <a class="btn btn-logout" href="<?php echo base_url('login/logout') ?>">Sign Out</a>
                </div>
              </li>
            </ul>
          </li>

        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url(''); ?>assets/adminlte/dist/img/avatar-flat.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $this->session->userdata('namauser') ?></p>
          <!-- Status -->
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>


      <!-- /.search form -->

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu">

        <br><br>
        <!-- Optionally, you can add icons to the links -->
        <?php 
        $role=$this->session->userdata('role');
        if ($role=='administrator') { ?>
          
          <li class="active">
            <a class='sidebar-link' href="<?php echo base_url('home') ?>">
            <input type='hidden' value='<?php echo base_url('job') ?>'>
            <i class="fa fa-briefcase text-light-blue"></i> <span>Job</span></a>
          </li>
          <li>
            <a class='sidebar-link' href="<?php echo base_url('home') ?>">
            <input type='hidden' value='<?php echo base_url('perusahaan') ?>'>
            <i class="fa fa-building-o text-light-blue"></i> <span>Perusahaan</span></a>
          </li>
          <li>
            <a class='sidebar-link' href="<?php echo base_url('home') ?>">
            <input type='hidden' value='<?php echo base_url('user') ?>'>
            <i class="fa fa-address-card-o text-light-blue" aria-hidden=true></i> <span>User</span></a>
          </li>
          <li>
            <a class='sidebar-link' href="<?php echo base_url('home') ?>">
            <input type='hidden' value='<?php echo base_url('controlcuti') ?>'> 
            <i class="fa fa-minus-circle text-light-blue" aria-hidden=true></i> <span>Control Cuti</span>
            </a>
          </li>
          <li>
            <a class='sidebar-link' href="<?php echo base_url('home') ?>">
            <input type='hidden' value='<?php echo base_url('apptimesheet') ?>'> 
            <i class="fa fa-check text-light-blue" aria-hidden=true></i> <span>Approve Timesheet</span>
            </a>
          </li>
          <li>
            <a class='sidebar-link' href="<?php echo base_url('home') ?>">
            <input type='hidden' value='<?php echo base_url('penggajian') ?>'>
            <i class="fa fa-usd text-light-blue" aria-hidden=true></i> <span>Penggajian</span></a>
          </li>
          <li>
            <a class='sidebar-link' href="<?php echo base_url('home') ?>">
            <input type='hidden' value='<?php echo base_url('billing') ?>'>
            <i class="fa fa-money text-light-blue" aria-hidden=true></i> <span>Billing</span></a>
          </li>
          <li>
            <a class='sidebar-link' href="<?php echo base_url('home') ?>">
            <input type='hidden' value='<?php echo base_url('evaluasi') ?>'>
            <i class="fa fa-bar-chart text-light-blue" aria-hidden=true></i> <span>Evaluasi</span></a>
          </li>
          <li>
            <a class='sidebar-link' href="<?php echo base_url('home') ?>">
            <input type='hidden' value='<?php echo base_url('profile') ?>'>
            <i class="fa fa-lock text-light-blue" aria-hidden=true></i> <span>Password Setting</span></a>
          </li>
        <?php 
          } 
          elseif($role=='supervisor'){
        ?>

        <li class=active>
            <a class='sidebar-link' href="<?php echo base_url('home') ?>">
            <input type='hidden' value='<?php echo base_url('timesheet') ?>'> 
            <i class="fa fa-calendar text-light-blue" aria-hidden=true></i> <span>Timesheet</span>
            </a>
        </li>
        <li>
            <a class='sidebar-link' href="<?php echo base_url('home') ?>">
            <input type='hidden' value='<?php echo base_url('timesheethistory') ?>'> 
            <i class="fa fa-clock-o text-light-blue" aria-hidden=true></i> <span>Timesheet History</span>
            </a>
        </li>
        <li>
            <a class='sidebar-link' href="<?php echo base_url('home') ?>">
            <input type='hidden' value='<?php echo base_url('apptimesheet') ?>'> 
            <i class="fa fa-check text-light-blue" aria-hidden=true></i> <span>Approve Timesheet</span>
            </a>
        </li>
        <li>
            <a class='sidebar-link' href="<?php echo base_url('home') ?>">
            <input type='hidden' value='<?php echo base_url('profile') ?>'>
            <i class="fa fa-lock text-light-blue" aria-hidden=true></i> <span>Password Setting</span></a>
        </li>
        <?php 
          } 
          else{
        ?>

        <li class=active>
            <a class='sidebar-link' href="<?php echo base_url('home') ?>">
            <input type='hidden' value='<?php echo base_url('timesheet') ?>'> 
            <i class="fa fa-calendar" aria-hidden=true></i> <span>Timesheet</span>
            </a>
        </li>
        <li>
            <a class='sidebar-link' href="<?php echo base_url('home') ?>">
            <input type='hidden' value='<?php echo base_url('timesheethistory') ?>'> 
            <i class="fa fa-clock-o" aria-hidden=true></i> <span>Timesheet History</span>
            </a>
        </li>
        <li>
            <a class='sidebar-link' href="<?php echo base_url('home') ?>">
            <input type='hidden' value='<?php echo base_url('profile') ?>'>
            <i class="fa fa-lock" aria-hidden=true></i> <span>Password Setting</span></a>
        </li>
        <?php } ?>
        
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
 
    </section>
   
    <!-- Main content -->
    <section class="content">
      
      
    </section>
    
    <!-- /.content -->
  </div>

  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

</body>
</html>
