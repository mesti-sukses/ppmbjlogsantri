<div class="sidebar-nav-wrapper" id="sidebar-wrapper">
  <ul class="sidebar-nav">
    <!-- Untuk admin website -->

    <?php if ((intval($this->session->userdata('level')) & 64) == 64 ): ?>

      <li class="parent">
        <a data-toggle="collapse" href="#sub-item-4"><em class="fa fa-globe">&nbsp;</em> Component <span class="icon pull-right" data-toggle="collapse"><em class="fa fa-plus"></em></span></a>

        <ul class="children collapse" id="sub-item-4">
          <li>
            <a class="" href="<?php echo base_url('admin/config') ?>"><i class="fa fa-gears"></i> Configuration</a>
          </li>
          <li>
            <a class="" href="<?php echo base_url('admin/content/ketua') ?>"><i class="fa fa-user"></i> Ketua Pondok</a>
          </li>
          <li>
            <a class="" href="<?php echo base_url('admin/content/dgcontent') ?>"><i class="fa fa-user"></i> Dewan Guru</a>
          </li>
          <li>
            <a class="" href="<?php echo base_url('admin/content/testimoni') ?>"><i class="fa fa-comment"></i> Testimoni</a>
          </li>
          <li>
            <a class="" href="<?php echo base_url('admin/menu/main') ?>"><i class="fa fa-list"></i> Main menu</a>
          </li>
          <li>
            <a class="" href="<?php echo base_url('admin/menu/social') ?>"><i class="fa fa-facebook"></i> Social menu</a>
          </li>
        </ul>
      </li>

      <li class="parent">
        <a data-toggle="collapse" href="#sub-item-5"><em class="fa fa-wordpress">&nbsp;</em> Blog <span class="icon pull-right" data-toggle="collapse"><em class="fa fa-plus"></em></span></a>

        <ul class="children collapse" id="sub-item-5">
          <li>
            <a class="" href="<?php echo base_url('admin/blog') ?>"><i class="fa fa-file"></i> Blog</a>
          </li>
          <li>
            <a class="" href="<?php echo base_url('admin/category') ?>"><i class="fa fa-tag"></i> Category</a>
          </li>
        </ul>
      </li>

      <li class="parent">
        <a data-toggle="collapse" href="#sub-item-7"><em class="fa fa-photo">&nbsp;</em> Media <span class="icon pull-right" data-toggle="collapse"><em class="fa fa-plus"></em></span></a>

        <ul class="children collapse" id="sub-item-7">
          <li>
            <a class="" href="<?php echo base_url('media/add') ?>"><i class="fa fa-plus"></i> Add New</a>
          </li>
          <li>
            <a class="" href="<?php echo base_url('index.php/media') ?>"><i class="fa fa-photo"></i> Library</a>
          </li>
        </ul>
      </li>

    <?php endif ?>

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

      <li class="parent">
        <a data-toggle="collapse" href="#sub-item-6"><em class="fa fa-clipboard">&nbsp;</em> Jurnal Qur'an <span class="icon pull-right" data-toggle="collapse"><em class="fa fa-plus"></em></span></a>

        <ul class="children collapse" id="sub-item-6">
          <?php foreach ($targetAngkatan as $tahun): ?>
            <li>
              <a class="" href="<?php echo base_url('jurnal/index/'.$tahun->angkatan) ?>"><span class="fa fa-book">&nbsp;</span> <?php echo $tahun->angkatan ?></a>
            </li>
          <?php endforeach ?>
        </ul>
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
        <a href="<?php echo base_url('user/list') ?>"><em class="fa fa-users">&nbsp;</em> Seluruh Santri</a>
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

    <!-- Untuk Wali Hadist -->

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

    <!-- Untuk sekretaris FP -->

    <?php if ((intval($this->session->userdata('level')) & 2) != 2 ): ?>

      <li class="parent">
        <a href="<?php echo base_url('pengajar') ?>"><em class="fa fa-users">&nbsp;</em> Musyawarah</a>
      </li>

      <li class="parent">
        <a href="<?php echo base_url('quran') ?>"><em class="fa fa-book">&nbsp;</em> Tafsir Quran</a>
      </li>
      
    <?php endif ?>
  </ul>
</div>