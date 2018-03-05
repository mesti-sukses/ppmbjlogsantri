<!-- Principal Intro Section -->
  <div class="row principal-intro-row">
    <div class="container">
      <div class="col-sm-5"><img alt="Our Principal" src="<?php echo base_url('/') ?>assets/img/principal1.jpg"></div>
      <div class="col-sm-7 principal-intro">
        <h6><i class="fa fa-star-o"></i><span>KETUA PONDOK</span><i class="fa fa-star-o"></i></h6>
        <h3>Tentang Ketua Pondok</h3>
        <p><?php if($ketuaData != NULL) echo limit_to_numwords($ketuaData->content, 30).'...' ?></p>
        <h6 class="principal-name"><?php if($ketuaData != NULL) echo $ketuaData->nama ?></h6>
        <div>
          <a class="know-more-btn" href="<?php if($ketuaData != NULL)echo base_url($ketuaData->extra) ?>"><i class="fa fa-paper-plane"></i>KNOW MORE</a>
        </div>
      </div>
    </div>
  </div>