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
            <div class="event-item">
              <div class="col-sm-7">
                <div class="event-date">
                  <p><span>11</span> JAN</p>
                </div>
                <h3>Anjangsana dengan PPM NH Bandung</h3>
                <h6><i class="fa fa-map-marker"></i>Asrama Putra Baitul Jannah</h6>
                <p>Kamis, 11 Januari 2018, PPM Nurul Hakim Bandung Timur tiba di kota Malang dalam rangkaian kegiatan Tour Barokah 2018 yang mereka adakan. Setiba di kota Malang, PPM Nurul Hakim langsung menuju PPM Baitul Jannah untuk melakukan anjangsana.</p>
              </div>
              <div class="col-sm-5 event-item-img">
                <div class="event-img">
                  <img alt="event" src="<?php echo base_url('/') ?>assets/img/news/news-sm1.jpg">
                  <div class="event-detail-link">
                    <a href="index.html#">VIEW DETAILS</a>
                  </div>
                </div>
              </div>
              <div class="clearfix"></div>
            </div>
            <div class="event-item">
              <div class="col-sm-7">
                <div class="event-date">
                  <p><span>01</span> JAN</p>
                </div>
                <h3>Pengajian Akhir Tahun</h3>
                <h6><i class="fa fa-map-marker"></i>Asrama Putra Baitul Jannah</h6>
                <p>Pengadaan program pengajian akhir tahun merupakan agenda tahunan dari PPM Ma'had Baitul Jannah. Untuk tahun 2018 ini bertajuk Lentera. Apa sih makna dari lentera?</p>
              </div>
              <div class="col-sm-5 event-item-img">
                <div class="event-img">
                  <img alt="event" src="<?php echo base_url('/') ?>assets/img/news/news-sm2.jpg">
                  <div class="event-detail-link">
                    <a href="index.html#">VIEW DETAILS</a>
                  </div>
                </div>
              </div>
              <div class="clearfix"></div>
            </div>
          </div>
          <div class="col-md-4 right-event-items">
            <div class="event-item"><img alt="event" src="<?php echo base_url('/') ?>assets/img/news/news-lg3.jpg"></div>
            <div class="featured-event">
              <div class="event-date">
                <p><span>24</span> DEC</p>
              </div>
              <h3>Festival Santri Soleh</h3>
              <h6><i class="fa fa-map-marker"></i>Taman Wisata Lembah Dieng</h6>
              <p>Merupakan program tahunan dari PPM Malang raya untuk mewadahi para santri untuk berkompetisi di bidang keagamaan. Mari lihat serunya kompetisi mereka...</p><a href="index.html#"><i class="fa fa-paper-plane"></i> KNOW MORE</a>
            </div>
          </div>
        </div>
        </div>
      </div>
    </div>
  </div>
  <?php $this->load->view('front/component/testimoni', $this->data) ?>