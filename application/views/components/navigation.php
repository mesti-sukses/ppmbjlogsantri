<div id="site-menu">
  <a class="navbar-brand roboto-bold" href="#"><i class="fa fa-navicon"></i> <?php echo $this->session->userdata('name') ?></a> <a class="pull-right close" href="#"><i class="fa fa-close"></i></a>

  <ul class="off-menu">
    <li>
      <a href="<?php echo base_url('user') ?>"><i class="fa fa-user"></i> Dashboard</a>
    </li>
    <?php if ($this->session->userdata('level') == 0): ?>

    <li>
      <a href="<?php echo base_url('user/angkatan') ?>"><i class="fa fa-university"></i> Angkatan</a>
    </li>
      
    <?php endif ?>

    <li>
      <a href="<?php echo base_url('user/setting') ?>"><i class="fa fa-gear"></i>Setting</a>
    </li>

    <li>
      <a href=" <?php echo base_url('user/logout')  ?>"><i class="fa fa-power-off"></i> Sign Out</a>
    </li>
  </ul>
</div>


<header>
  <nav class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
      <a class="navbar-brand roboto-bold toggle-site-menu" href="#" id="menu-corner"><i class="fa fa-navicon"></i> <?php echo $this->session->userdata('name') ?></a>



      <ul class="nav navbar-nav pull-right">
        <li>
          <a role="button" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i> Tambah Santri</a>
        </li>
      </ul>
    </div>
  </nav>
</header>