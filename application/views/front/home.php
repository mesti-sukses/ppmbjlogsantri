  <div class="row">
    <div class="carousel slide" data-ride="carousel" id="homeSlider">
      <div class="carousel-inner" role="listbox">
        <div class="item active">
          <img alt="slide1" src="<?php echo base_url('/') ?>assets/img/slider/slide4.jpg">
          <div class="carousel-caption">
            <h4><i class="fa fa-star-o"></i>PROFESSIONAL RELIGIUS<i class="fa fa-star-o"></i></h4>
            <h2>MA'HAD BAITUL JANNAH OFFICIAL SITE</h2>
            <p>Dua tahun <strong>Ulama'</strong>, Empat tahun <strong>Sarjana</strong></p>
            <a href="<?php echo base_url('page/about') ?>"><i class="fa fa-paper-plane"></i>KNOW MORE</a>
          </div>
        </div>
      </div><!-- Slide Controls -->
    </div>
  </div>
  <?php $this->load->view('front/component/ketua', $this->data) ?>
  <?php $this->load->view('front/component/guru', $this->data) ?>
  <!-- Events Section -->
  <div class="row section-row evets-row">
    <div class="container">
      <div class="section-row-header-center">
        <h6><i class="fa fa-star-o"></i>PROFESIONAL RELIGIUS<i class="fa fa-star-o"></i></h6>
        <h1>EVENTS</h1>
        <p>Beberapa event terakhir dari ma'had baitul jannah</p>
      </div>
      <div class="clearfix"></div>
      <div class="tab-content">
        <div class="tab-pane active" id="1">
          <div class="col-md-8 left-event-items">
            <?php foreach ($postData as $post): ?>
              <div class="event-item">
                <div class="col-sm-7">
                  <div class="event-date">
                    <?php
                      $date = strtotime($post->updated);
                    ?>
                    <p><span><?php echo date('d', $date) ?></span> <?php echo date('F', $date) ?></p>
                  </div>
                  <h3><?php echo $post->title ?></h3>
                  <h6><i class="fa fa-tag"></i><?php echo $post->name ?></h6>
                  <p><?php echo limit_to_numwords(strip_tags($post->content), 15).'...' ?></p>
                </div>
                <div class="col-sm-5 event-item-img">
                  <div class="event-img">
                    <img src="<?php echo base_url('images/Post/'.$post->image) ?>" alt="event" />
                    <div class="event-detail-link">
                      <a href="<?php echo base_url('blog/post/'.$post->id) ?>">VIEW DETAILS</a>
                    </div>
                  </div>
                </div>
                <div class="clearfix"></div>
              </div>
            <?php endforeach ?>
          </div>
          <div class="col-md-4 right-event-items">
            <div class="event-item"><img src="<?php echo base_url('images/Post/'.$stickyData->image) ?>" alt="event" />
            </div>
            <div class="featured-event">
              <div class="event-date">
                <?php
                  $date = strtotime($stickyData->updated);
                ?>
                <p><span><?php echo date('d', $date) ?></span> <?php echo date('F', $date) ?></p>
              </div>
              <h3><?php echo $stickyData->title ?></h3>
              <h6><i class="fa fa-tag"></i><?php echo $stickyData->name ?></h6>
              <p><?php echo limit_to_numwords($stickyData->content, 25).'...' ?></p>
              <a href="<?php echo base_url('blog/post/'.$stickyData->id) ?>"><i class="fa fa-paper-plane"></i> KNOW MORE</a>
            </div>
          </div>
        </div>
        </div>
      </div>
    </div>
  </div>
  <?php $this->load->view('front/component/testimoni', $this->data) ?>