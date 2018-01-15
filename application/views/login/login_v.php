
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
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">

  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('assets/adminlte/dist/css/AdminLTE.css'); ?>">
  
  <link rel="stylesheet" href="<?php echo base_url('assets/adminlte/custom/css/custom-style.css'); ?>">
  <style>
    body{
      background: #7FB3D5 !important; /* For browsers that do not support gradients */    
      background: -webkit-linear-gradient(left, #7FB3D5 , #55BEC0); /* For Safari 5.1 to 6.0 */
      background: -o-linear-gradient(right, #7FB3D5, #55BEC0) !important; /* For Opera 11.1 to 12.0 */
      background: -moz-linear-gradient(right, #7FB3D5, #55BEC0); /* For Firefox 3.6 to 15 */
      background: linear-gradient(to right, #7FB3D5 , #55BEC0) !important;
    }
    .login-logo, .login-logo a{
      color: white
    }
  </style>
  <!-- SCRIPT -->
  <script src="<?php echo base_url('assets/adminlte/plugins/jQuery/jquery-2.2.3.min.js'); ?>"></script>

  <!-- Bootstrap 3.3.6 -->
  <script src="<?php echo base_url('assets/adminlte/bootstrap/js/bootstrap.min.js'); ?>"></script>

  <!-- AdminLTE App -->
  <script src="<?php echo base_url('assets/adminlte/dist/js/app.min.js'); ?>"></script>

  <script src="<?php echo base_url('assets/adminlte/custom/js/jquery-validate.min.js'); ?>"></script>
  
  
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="<?php echo base_url('login') ?>"><b>MGI Gideon </b>Adi & Rekan</a>
    <p style="font-size:18px">Registered Public Accountants And Business Advisors</p>
    <p style="font-size:20px">Integrated Timesheet System</p>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Account Login</p>

    <form action="<?php echo base_url('login') ?>" method="post">
      <div class="form-group">
        <input type="text" class="form-control" name="npwp" value="<?php echo set_value('npwp'); ?>" placeholder="Email">
      </div>
      <div class="form-group">
        <input type="password" class="form-control" name="password" placeholder="Password">
      </div>
      <div class="row">

        <div class="col-xs-12">
          <input type="submit" name='submit' class="btn btn-primary btn-block btn-flat" value="Sign In">
        </div>

      </div>
    </form>
<br>
  
        <?php echo validation_errors(); ?>


  </div>
  <!-- /.login-box-body -->
</div>

</body>

</html>
