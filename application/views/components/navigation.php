<div id="site-menu">
  <div id="site-menu-wrapper">
    <a class="navbar-brand roboto-bold" href="#"><i class="fa fa-navicon"></i> <?php echo $this->session->userdata('name') ?></a> <a class="pull-right close" href="#"><i class="fa fa-close"></i></a>

    <ul class="off-menu">
      <li>
        <a href="<?php echo base_url('user') ?>"><i class="fa fa-dashboard"></i>Dashboard</a>
      </li>
      <?php if ($this->session->userdata('level') == 0): ?>

        <li>
          <a href="<?php echo base_url('user/admin') ?>"><i class="fa fa-hashtag"></i>Superuser</a>
        </li>

        <li>
          <a href="#" data-toggle="collapse" data-target="#wali"><i class="fa fa-group"></i>Wali</a>

          <ul class="collapse" id="wali">
            <?php foreach ($userData as $user): ?>
              <li><a href="<?php echo base_url('user/index/'.$user->id) ?>"><i class="fa fa-user"></i><?php echo $user->name ?></a></li>
            <?php endforeach ?>
          </ul>
        </li>
        
      <?php endif ?>

      <li>
        <a href="<?php echo base_url('user/setting') ?>"><i class="fa fa-gear"></i>Setting</a>
      </li>

      <li>
        <a href=" <?php echo base_url('user/logout')  ?>"><i class="fa fa-power-off"></i>Sign Out</a>
      </li>
    </ul>
  </div>
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