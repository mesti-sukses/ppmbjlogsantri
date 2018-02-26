<!DOCTYPE html>
<html>

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Style -->

  <link href="<?php echo base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet" media="screen">
  <link href="<?php echo base_url() ?>assets/css/style.css" rel="stylesheet" media="screen">

  <!-- Fonts -->
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
  <link href="<?php echo base_url() ?>assets/fonts/font-awesome/css/font-awesome.min.css" rel="stylesheet" media="screen">

  <!-- Custom style -->
  <?php foreach ($page_info['css'] as $css): ?>
  	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/'.$css) ?>">
  <?php endforeach ?>  

  <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
    @javascript html5shiv respond.min
  <![endif]-->

  <title><?php echo $page_info['title'] ?></title>

</head>

<body>
  <div class="row dashboard-top-nav">
      <nav class="top-search col-sm-10" id="pathshalaNavbar" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <div class="logo">
            <h5>
              <button class="navbar-toggle pull-right" data-target="#pathshalaNavbarCollapse" data-toggle="collapse" type="button"><i class="fa fa-bars"></i></button> <i class="fa fa-graduation-cap"></i>Baitul Jannah
            </h5>
          </div>
        </div><!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse pull-right" id="pathshalaNavbarCollapse">
          <ul class="nav navbar-nav">
            <li>
              <a href="<?php echo base_url('user') ?>"><i class="fa fa-dashboard"></i>Dashboard</a>
            </li>
            <?php foreach ($mainMenu as $menu): 
                    if($menu->type == 'internal')
                      $link = base_url($menu->link);
                    else
                      $link = $menu->link;
            ?>
              <li>
                <a href="<?php echo $link ?>"><i class="fa fa-<?php echo $menu->icon ?>"></i><?php echo $menu->text ?></a>
              </li>
            <?php endforeach ?>
          </ul>
        </div><!-- /.navbar-collapse -->
      </nav>
      <?php if ($this->session->userdata('name') != NULL): ?>
        <div class="col-sm-2 notification-area">
          <ul class="top-nav-list">
            <li class="user dropdown">
              <a href="student-dashboard.html#" class="dropdown-toggle" data-toggle="dropdown">
                <span><img src="<?php echo base_url() ?>images/man.svg" alt="user"><?php echo $this->session->userdata('name') ?><span class="caret"></span></span>
              </a>
              <ul class="dropdown-menu notification-list">
                <li>
                  <a href="<?php echo base_url('user/setting') ?>"><i class="fa fa-users"></i> USER PROFILE</a>
                </li>
                <li>
                  <div class="all-notifications">
                    <a href="<?php echo base_url('user/logout') ?>">LOGOUT</a>
                  </div>
                </li>
              </ul>
            </li>
          </ul>
        </div>
      <?php endif ?>
    </div>
          
    <div class="parent-wrapper" id="outer-wrapper">