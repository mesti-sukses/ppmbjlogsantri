<!DOCTYPE html>

<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="IE=edge" http-equiv="X-UA-Compatible">
  <meta content="width=device-width, initial-scale=1" name="viewport"><!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

  <title><?php echo $page_info['title'] ?></title>

  <!-- Bootstrap -->
  <link href="<?php  echo base_url('css/bootstrap.min.css'); ?>" rel="stylesheet"
  >

  <!-- Font Awesome -->
  <link href="<?php echo base_url('css/font-awesome.min.css'); ?>" rel="stylesheet" type="text/css">

  <!-- Base Color -->
  <link href="<?php echo base_url('css/color-1.css'); ?>" rel="stylesheet">

  <!-- Navbar Style -->
  <link href="<?php echo base_url('css/style.css'); ?>" rel="stylesheet" type="text/css">

  <!--Typograph-->
  <link href="<?php echo base_url('css/typography.css'); ?>" rel="stylesheet" type="text/css">

  <!-- Pre-loader  -->
  <link href="<?php echo base_url('css/preloader.css'); ?>" rel="stylesheet" type="text/css">

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

  <!-- Get the CSS list from controller -->
  <?php
    $list_css = $page_info['css'];
    foreach ($list_css as $css) : 
  ?>
    <link href="<?php echo base_url('css/'.$css); ?>" rel="stylesheet" type="text/css">    
  <?php endforeach; ?>

  <style type="text/css">
    #wali li{
      padding-left: 18px;
    }

    #site-menu-wrapper{
      overflow: scroll;
      width: 320px;
      height: 105%;
    }

    #site-menu{
      overflow: hidden;
      width: 300px;
      height: 100%;
    }
  </style>
</head>

<body>
  <div id="loader-wrapper">
    <div id="loader">
      <h1 class="roboto-slab">Loggy</h1>


      <p class="roboto-bold">By Logic Boys</p>
    </div>


    <div class="loader-section section-left">
    </div>


    <div class="loader-section section-right">
    </div>
  </div>
  <?php
    if(!isset($page_info['no-navigation']))
      $this->load->view('components/navigation'); 
  ?>