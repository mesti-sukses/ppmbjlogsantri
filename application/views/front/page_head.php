<!DOCTYPE html>
<html>
<head>
  <meta content="IE=edge" http-equiv="X-UA-Compatible">
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="author">
  <title><?php echo $title ?> | Official Site</title><!-- Styles -->
  <link href="<?php echo base_url('/') ?>assets/css/bootstrap.min.css" media="screen" rel="stylesheet">
  <link href="<?php echo base_url('/') ?>assets/css/owl.carousel.min.css" media="screen" rel="stylesheet">
  <link href="<?php echo base_url('/') ?>assets/css/owl.theme.default.min.css" media="screen" rel="stylesheet">
  <link href="<?php echo base_url('/') ?>assets/css/style.css" media="screen" rel="stylesheet"><!-- Fonts -->
  <!-- <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'> -->
  <link href="<?php echo base_url('/') ?>assets/fonts/font-awesome/css/font-awesome.min.css" media="screen" rel="stylesheet">
</head>
<body>
  <div class="row nav-row trans-menu">
    <div class="container nav-container">
      <div class="top-navbar">
        <div class="pull-right">
          <div class="top-nav-social pull-left">
            <a href="index.html#"><i class="fa fa-facebook"></i></a> <a href="index.html#"><i class="fa fa-youtube"></i></a> <a href="index.html#"><i class="fa fa-instagram"></i></a>
          </div>
          <div class="top-nav-login-btn pull-right">
            <a data-target="#loginModal" data-toggle="modal" href="index.html#"><i class="fa fa-sign-in"></i>LOGIN</a>
          </div>
        </div>
        <div class="clearfix"></div>
      </div>
      <div class="clearfix"></div>
      <nav class="navbar navbar-default" id="pathshalaNavbar" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button class="navbar-toggle" data-target="#pathshalaNavbarCollapse" data-toggle="collapse" type="button"><span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span></button> <a class="navbar-brand" href="index.html">Ma'had Baitul Jannah</a>
        </div><!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="pathshalaNavbarCollapse">
          <ul class="nav navbar-nav">
            <li>
              <a href="<?php echo base_url() ?>"><i class="fa fa-home"></i>HOME</a>
            </li>
            <li>
              <a href="http://blog.ppmbaituljannah.com"><i class="fa fa-file"></i>BLOG</a>
            </li>
            <li>
              <a href="<?php echo base_url('page/gallery') ?>"><i class="fa fa-picture-o"></i>GALLERY</a>
            </li>
            <li>
            	<a href="<?php echo base_url('page/about') ?>"><i class="fa fa-info-circle"></i>ABOUT</a>
            </li>
            <li>
              <a href="<?php echo base_url('page/contact') ?>"><i class="fa fa-phone-square"></i>CONTACT US</a>
            </li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </nav>
    </div>
  </div>