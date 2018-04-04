<!-- Our Teaacher section -->
  <div class="row section-row teacher-row">
    <div class="container">
      <div class="section-row-header-center">
        <h6><i class="fa fa-star-o"></i>DEWAN GURU<i class="fa fa-star-o"></i></h6>
        <h1>DEWAN GURU PONDOK</h1>
      </div>
      <div class="owl-carousel" id="ourTeacher">
        <?php foreach ($dewanGuruData as $guru): ?>
          <div class="teacher-item">
            <h5><i class="fa fa-flask"></i><?php echo $guru->extra ?></h5>
            <div class="teacher-item-inner">
              <p class="teacher-desc"><?php echo $guru->content ?></p>
              <div class="col-xs-4 clear-padding teacher-img"><img alt="teacher" src="<?php echo base_url('/') ?>assets/img/parent/<?php echo $guru->image ?>"></div>
              <div class="col-xs-8 teacher-details">
                <p><strong><?php echo $guru->nama ?></strong></p>
              </div>
              <div class="clearfix"></div>
            </div>
          </div>
        <?php endforeach ?>
      </div>
    </div>
  </div>