<!DOCTYPE html>
<html>

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/bootstrap.min.css') ?>">

  <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/font-awesome.min.css') ?>">

  <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/styles.css') ?>">

  <?php foreach ($page_info['css'] as $css): ?>
  	<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/'.$css) ?>">
  <?php endforeach ?>

  <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
    @javascript html5shiv respond.min
  <![endif]-->

  <title><?php echo $page_info['title'] ?></title>

</head>

<body>