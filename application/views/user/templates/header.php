<!DOCTYPE html>
<html>
  <head>
    <title>Web Gudang | User</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url()?>/assets/fontawesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?= base_url()?>/assets/simple-sidebar/css/simple-sidebar.css">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/web_admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url()?>/assets/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="<?= base_url()?>/assets/simple-sidebar/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url()?>assets/web_admin/bower_components/jquery/dist/jquery.min.js"></script>
    <script src="<?php echo base_url()?>assets/web_admin/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url()?>assets/web_admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <link rel="stylesheet" href="<?php echo base_url()?>assets/web_admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
    <link rel="stylesheet" href="<?php echo base_url()?>style/mdi/css/materialdesignicons.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Mitr&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" href="<?php echo base_url()?>style/user.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap" rel="stylesheet">

  </head>
  <body>
    <!-- navbar -->
    <nav class="navbar navbar-inverse navbar-fixed-top" id="navbar">
      <div class="container" id="container">
        <div class="navbar-header">
          <a class="navbar-brand" href="<?= base_url('user')?>" id="home">Home</a>
        </div>
          <ul class="nav navbar-nav mr-auto">
            <!-- <li><a class="nav-link" href="#">Home</a></li> -->
            <li class="dropdown"><a class="dropdown" id="dropdown" data-toggle="dropdown" href="#"><i class="fa fa-database" aria-hidden="true"></i> Fitur <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="<?=base_url('user/tabel_barangmasuk');?>">TABEL STOCK BARANG</a></li>
                <li><a href="<?=base_url('user/tabel_barangkeluar');?>">TABEL PERMINTAAN ADMIN</a></li>

                  <!-- <li><a href="#">Tabel Gudang 3</a></li> -->
              </ul>
            </li>
            <!-- <li><a class="nav-link" href="#"><i class="fa fa-book" aria-hidden="true"></i> Page 2</a></li>
            <li><a class="nav-link" href="#"><i class="fa fa-address-book" aria-hidden="true"></i> Page 3</a></li> -->
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a class="nav-link">Last Login : <?=$this->session->userdata('last_login')?></a></li>            
            <li><a class="nav-link" href="<?= base_url('user/setting') ?>" id="setting"><i class="fa fa-user" aria-hidden="true"></i> Setting</a></li>
            <li><a class="nav-link" href="<?= base_url('user/signout')?>" id="sign_out"><i class="fa fa-sign-out" aria-hidden="true"></i> Sign Out</a></li>
          </ul>
      </div>
    </nav>
