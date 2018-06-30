<div class="row parent-test-row section-row">
    <div class="container">
      <div class="section-row-header-center">
        <h1>TESTIMONI</h1>
      </div>
      <div class="owl-carousel" id="parentTestimonial">
        <?php foreach ($testimoniData as $testimoni): ?>
          <div class="parent-test-item">
            <div class="col-sm-3">
              <div class="parent-img"><img alt="parent" src="<?php echo base_url('/') ?>media_content/<?php echo $testimoni->image ?>"></div>
            </div>
            <div class="col-sm-9">
              <p class="rating">
                <?php for ($i=0; $i < $testimoni->extra; $i++) : ?>
                  <i class="fa fa-star"></i>
                <?php endfor; ?>
              </p>
              <p><i><?php echo $testimoni->content ?></i></p>
              <p class="parent-details"><i><?php echo $testimoni->nama ?></i></p>
            </div>
          </div>
        <?php endforeach ?>

      </div>
    </div>
  </div>