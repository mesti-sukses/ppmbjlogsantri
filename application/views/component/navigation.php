<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
  <div class="container-fluid">
    <div class="navbar-header">
      <button class="navbar-toggle collapsed" data-target="#sidebar-collapse" data-toggle="collapse" type="button"><span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span></button> <a class="navbar-brand" href="#"><span>Loggy</span> PPM BJ</a>
    </div>
  </div>
  <!-- /.container-fluid -->
</nav>


<div class="col-sm-3 col-lg-2 sidebar" id="sidebar-collapse">
  <div class="profile-sidebar">
    <div class="profile-userpic"><img alt="" class="img-responsive" src="<?php echo base_url('images/man.svg') ?>">
    </div>


    <div class="profile-usertitle">
      <div class="profile-usertitle-name">
        <?php echo $this->session->userdata('name') ?>
      </div>


      <div class="profile-usertitle-status">
        <span class="indicator label-success"></span>Online
      </div>
    </div>


    <div class="clear">
    </div>
  </div>


  <div class="divider">
  </div>


  <ul class="nav menu">
    <li>
      <a href="<?php echo base_url('user') ?>"><em class="fa fa-dashboard">&nbsp;</em> Dashboard</a>
    </li>

    <!-- Untuk pasus -->

    <?php if ((intval($this->session->userdata('level')) & 8) == 8 ): ?>

      <li>
        <a href="<?php echo base_url('pasus') ?>"><em class="fa fa-users">&nbsp;</em> Pasus</a>
      </li>

    <?php endif ?>

    <!-- Untuk santri reguler -->
    <?php if ((intval($this->session->userdata('level')) & 2) == 2 ): ?>

      <li>
        <a href="<?php echo base_url('santri/quran') ?>"><em class="fa fa-book">&nbsp;</em> Qur'an</a>
      </li>


      <li class="parent">
        <a data-toggle="collapse" href="#sub-item-3"><em class="fa fa-book">&nbsp;</em> Hadist <span class="icon pull-right" data-toggle="collapse"><em class="fa fa-plus"></em></span></a>

        <ul class="children collapse" id="sub-item-3">
          <?php foreach ($data_hadist_menu as $hadist): ?>
            <li>
              <a class="" href="<?php echo base_url('santri/hadist/'.$hadist->id) ?>"><span class="fa fa-book"></span> <?php echo $hadist->nama ?></a>
            </li>
          <?php endforeach ?>

          <li>
            <a class="" href="<?php echo base_url('santri/addHadist') ?>"><span class="fa fa-plus"></span> Tambah Hadist</a>
          </li>
        </ul>
      </li>

    <?php endif ?>

    <!-- Untuk Wali bacaan -->
    <?php if ((intval($this->session->userdata('level')) & 1) == 1 ): ?>

      <li>
        <a href="<?php echo base_url('wali') ?>"><em class="fa fa-users">&nbsp;</em> List Santri</a>
      </li>
      
    <?php endif ?>

    <!-- Untuk pengisi jurnal -->
    <?php if ((intval($this->session->userdata('level')) & 4) == 4 ): ?>

      <li>
        <a href="<?php echo base_url('jurnal') ?>"><em class="fa fa-clipboard">&nbsp;</em> Jurnal Target</a>
      </li>
      
    <?php endif ?>

    <!-- Untuk koordinator wali -->
    <?php if ((intval($this->session->userdata('level')) & 32) == 32 ): ?>

      <li>
        <a href="<?php echo base_url('wali/list') ?>"><em class="fa fa-users">&nbsp;</em> List Wali</a>
      </li>

      <li>
        <a href="<?php echo base_url('wali/comparator') ?>"><em class="fa fa-clipboard">&nbsp;</em> Compare</a>
      </li>

      <li class="parent">
        <a href="#sub-item-1" data-toggle="collapse"><em class="fa fa-users">&nbsp;</em> Wali <span class="icon pull-right"><em class="fa fa-plus"></em></span></a>

        <ul class="children collapse" id="sub-item-1">
          <?php foreach ($dataWali as $user): ?>
            <li>
              <a class="" href="<?php echo base_url('wali/index/'.$user->id) ?>"><span class="fa fa-user">&nbsp;</span> <?php echo $user->nama ?></a>
            </li>
          <?php endforeach ?>
        </ul>
      </li>
      
    <?php endif ?>

    <!-- Untuk ketua siswa -->
    <?php if ((intval($this->session->userdata('level')) & 16) == 16 ): ?>

      <li class="parent">
        <a href="<?php echo base_url('pengurus/list') ?>"><em class="fa fa-users">&nbsp;</em> List Pasus</a>
      </li>

      <li class="parent">
        <a href="<?php echo base_url('pengurus/report') ?>"><em class="fa fa-users">&nbsp;</em> Report Pasus</a>
      </li>

      <li class="parent">
        <a href="#sub-item-2" data-toggle="collapse"><em class="fa fa-users">&nbsp;</em> Pasus <span class="icon pull-right"><em class="fa fa-plus"></em></span></a>

        <ul class="children collapse" id="sub-item-2">
          <?php foreach ($dataPasusAll as $user): ?>
            <li>
              <a class="" href="<?php echo base_url('pasus/report/'.$user->id) ?>"><span class="fa fa-user">&nbsp;</span> <?php echo $user->nama ?></a>
            </li>
          <?php endforeach ?>
        </ul>
      </li>
      
    <?php endif ?>

    <!-- Untuk ustadzah -->
    <?php if ((intval($this->session->userdata('level')) & 128) == 128 ): ?>

      <li class="parent">
        <a href="<?php echo base_url('pengurus/list') ?>"><em class="fa fa-users">&nbsp;</em> List Pasus</a>
      </li>
      
    <?php endif ?>

    <?php if ((intval($this->session->userdata('level')) & 256) == 256 ): ?>
      
      <li class="parent">
        <a data-toggle="collapse" href="#sub-item-3"><em class="fa fa-book">&nbsp;</em> Hadist <span class="icon pull-right" data-toggle="collapse"><em class="fa fa-plus"></em></span></a>

        <ul class="children collapse" id="sub-item-3">
          <?php foreach ($data_hadist_menu_all as $hadist): ?>
            <li>
              <a class="" href="<?php echo base_url('WaliHadist/index/'.$hadist->id) ?>"><span class="fa fa-book"></span> <?php echo $hadist->nama ?></a>
            </li>
          <?php endforeach ?>

          <li>
            <a class="" href="<?php echo base_url('WaliHadist/addHadist') ?>"><span class="fa fa-plus"></span> Tambah Hadist</a>
          </li>
        </ul>
      </li>

    <?php endif ?>


    <li>
      <a href="<?php echo base_url('user/setting') ?>"><em class="fa fa-user">&nbsp;</em> Profile</a>
    </li>

    <li>
      <a href="<?php echo base_url('user/logout') ?>"><em class="fa fa-power-off">&nbsp;</em> Logout</a>
    </li>
  </ul>
</div>
<!--/.sidebar-->