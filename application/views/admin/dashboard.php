<div class="main-content" id="content-wrapper">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12 clear-padding-xs">
        <h5 class="page-title"><i class="fa fa-dashboard"></i>Dashboard</h5>


        <div class="section-divider">
        </div>


        <div class="dashboard-stats">
          <div class="col-sm-3">
            <div class="my-msg dash-item">
              <h6 class="item-title"><i class="fa fa-address-book-o"></i>MY PROFILE</h6>


              <div class="inner-item">
                <div class="profile-intro">
                  <div class="col-xs-4 col-sm-12 col-md-4 clear-padding"><img alt="user" src="<?php echo base_url() ?>images/man.svg">
                  </div>


                  <div class="col-xs-8 col-sm-12 col-md-8">
                    <?php $class = 'Pasca'; ?>

                    <h5><?php echo $userData->nama ?>
                    </h5>


                    <h6>Santri <?php if($userData->angkatan == 2016) $class = 'Cepatan'; else if($userData->angkatan == 2017) $class = 'Lambatan'; else $class = 'Pasca'; echo $class; ?></h6>


                    <h6>Reg#: <?php echo $userData->nis ?></h6>
                  </div>


                  <div class="clearfix">
                  </div>
                </div>


                <div class="profile-details">
                  <div class="detail-row">
                    <div class="col-md-6 col-sm-12 col-xs-6 clear-padding">
                      <span>NAME</span>

                      <p><?php echo $userData->nama ?>
                      </p>
                    </div>


                    <div class="col-md-6 col-sm-12 col-xs-6 clear-padding">
                      <span>Wali</span>

                      <p><?php echo $userData->nama_wali ?>
                      </p>
                    </div>


                    <div class="clearfix">
                    </div>
                  </div>


                  <div class="clearfix">
                  </div>


                  <div class="detail-row">
                    <div class="col-md-6 col-sm-12 col-xs-6 clear-padding">
                      <span>Angkatan</span>

                      <p><?php echo $userData->angkatan ?>
                      </p>
                    </div>


                    <div class="col-md-6 col-sm-12 col-xs-6 clear-padding">
                      <span>Kelas</span>

                      <p><?php echo $class ?>
                      </p>
                    </div>


                    <div class="clearfix">
                    </div>
                  </div>


                  <div class="clearfix">
                  </div>


                  <div class="detail-row">
                    <div class="col-md-6 col-sm-12 col-xs-6 clear-padding">
                      <span>Alamat</span>

                      <p><?php echo $userData->alamat ?>
                      </p>
                    </div>


                    <div class="col-md-6 col-sm-12 col-xs-6 clear-padding">
                      <span>Pasus</span>

                      <p><?php echo $userData->nama_pasus ?>
                      </p>
                    </div>


                    <div class="clearfix">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>


          <div class="col-sm-6">
            <div class="row">
              <?php if (($this->session->userdata('level') & 2) == 2): ?>
                <?php
                  $number = "0";
                  $text = 'Quran Kosong';
                  $note = 'Masih aman';
                  $class = 'success';
                  $number = $materiQuran->target - $materiQuran->kosong;
                  if($number > 50) 
                  {
                    $class = 'danger';
                    $note = 'Amal sholih segera menambal';
                  }
                  else if($number > 30) 
                  {
                    $class = 'ex';
                    $note = 'Cepetan ditambal sebelum numpuk';
                    }
                ?>

              <div class="col-sm-6">
                <div class="stat-item">
                  <div class="stats">
                    <div class="col-xs-8 count">
                      <h1><?php echo $number ?>
                      </h1>


                      <p><?php echo $text ?>
                      </p>
                    </div>


                    <div class="col-xs-4 icon">
                      <i class="fa fa-book <?php echo $class ?>-icon"></i>
                    </div>


                    <div class="clearfix">
                    </div>
                  </div>


                  <div class="status">
                    <p class="text-<?php echo $class ?>"><i class="fa fa-pencil-square-o"></i><?php echo $note ?>
                    </p>
                  </div>


                  <div class="clearfix">
                  </div>
                </div>
              </div>
              <?php endif ?>
              <?php if (($this->session->userdata('level') & 2) == 2): ?>
                <?php
                  $number = "0";
                  $text = 'Hadist Kosong';
                  $note = 'Masih aman';
                  $class = 'success';

                  $number = 0;
                  foreach ($materiHadist as $value) 
                  {
                    $number += $value->offset - $value->kosong;
                  }
                  if($number > 50) 
                  {
                    $class = 'danger';
                    $note = 'Amal sholih segera menambal';
                  }
                  else if($number > 30) 
                  {
                    $class = 'ex';
                    $note = 'Cepetan ditambal sebelum numpuk';
                  }
                ?>

              <div class="col-sm-6">
                <div class="stat-item">
                  <div class="stats">
                    <div class="col-xs-8 count">
                      <h1><?php echo $number ?>
                      </h1>


                      <p><?php echo $text ?>
                      </p>
                    </div>


                    <div class="col-xs-4 icon">
                      <i class="fa fa-book <?php echo $class ?>-icon"></i>
                    </div>


                    <div class="clearfix">
                    </div>
                  </div>


                  <div class="status">
                    <p class="text-<?php echo $class ?>"><i class="fa fa-pencil-square-o"></i><?php echo $note ?>
                    </p>
                  </div>


                  <div class="clearfix">
                  </div>
                </div>
              </div>
              <?php endif ?>
            </div>


            <div class="row">
              <?php if (($this->session->userdata('level') & 8) == 8): ?>
                <?php
                  $number = 0;
                  $text = 'Santri belum Dilaporkan';
                  $note = 'Segera lapor';
                  $class = 'success';
                  $count = 0;

                  foreach ($anggotaPasus as $santri) 
                  {
                    $deadline = date("W") + date("Y")*52;
                    if(!is_null($santri->updated))
                      $updated = date("W", strtotime($santri->updated)) + date("Y", strtotime($santri->updated))*52;
                    else $updated = 0;
                    if($deadline > $updated) $number += 1;
                    $count += 1;
                    if($count >= $jumlahPasus) break;
                  }

                  if($number > 0) $class="danger";
                ?>

              <div class="col-sm-12">
                <div class="stat-item">
                  <div class="stats">
                    <div class="col-xs-8 count">
                      <h1><?php echo $number ?>
                      </h1>


                      <p><?php echo $text ?>
                      </p>
                    </div>


                    <div class="col-xs-4 icon">
                      <i class="fa fa-user <?php echo $class ?>-icon"></i>
                    </div>


                    <div class="clearfix">
                    </div>
                  </div>


                  <div class="status">
                    <p class="text-<?php echo $class ?>"><i class="fa fa-pencil-square-o"></i><?php echo $note ?>
                    </p>
                  </div>


                  <div class="clearfix">
                  </div>
                </div>
              </div>
              <?php endif ?>
            </div>


            <div class="row">
              <?php if (($this->session->userdata('level') & 1) == 1): ?>
                <?php
                  $number = 0;
                  $text = 'Santri belum Update';
                  $note = '';
                  $class = 'ex';

                  foreach ($anggotaWali as $santri) 
                  {
                    $deadline = date("W") + date("Y")*52;
                    if(!is_null($santri->updated))
                      $updated = date("W", strtotime($santri->updated)) + date("Y", strtotime($santri->updated))*52;
                    else $updated = 0;
                    if($deadline > $updated) 
                    {
                      $number += 1;
                      $note .= $santri->santri.', ';
                    }
                  }

                  if($number > 0) $class="danger";
                ?>

              <div class="col-sm-12">
                <div class="stat-item">
                  <div class="stats">
                    <div class="col-xs-8 count">
                      <h1><?php echo $number ?>
                      </h1>


                      <p><?php echo $text ?>
                      </p>
                    </div>


                    <div class="col-xs-4 icon">
                      <i class="fa fa-user <?php echo $class ?>-icon"></i>
                    </div>


                    <div class="clearfix">
                    </div>
                  </div>


                  <div class="status">
                    <p class="text-<?php echo $class ?>"><i class="fa fa-pencil-square-o"></i><?php echo $note ?>
                    </p>
                  </div>


                  <div class="clearfix">
                  </div>
                </div>
              </div>
              <?php endif ?>
            </div>
          </div>


          <div class="col-sm-3">
            <div>
              <div class="my-msg dash-item">
                <h6 class="item-title"><i class="fa fa-envelope-o"></i>MY MESSAGES</h6>


                <div class="inner-item">
                  <div class="msg-item">
                    <div class="col-xs-2 clear-padding"><img alt="user" src="<?php echo base_url() ?>images/man.svg">
                    </div>


                    <div class="col-xs-10">
                      <p class="title">Submit your assigment.</p>


                      <p class="sent-by">JOHN DOE, MATH TEACHER</p>


                      <p class="msg-desc">Lorem Ipsum is simply dummy text of the printing.</p>


                      <p class="timestamp"><i class="fa fa-clock-o"></i> <i>45 mins ago.</i></p>
                    </div>


                    <div class="clearfix">
                    </div>
                  </div>


                  <div class="msg-item">
                    <div class="col-xs-2 clear-padding"><img alt="user" src="<?php echo base_url() ?>images/man.svg">
                    </div>


                    <div class="col-xs-10">
                      <p class="title">Your fee is due.</p>


                      <p class="sent-by">LENNORE, ACCOUNTANT</p>


                      <p class="msg-desc">Lorem Ipsum is simply dummy text of the printing.</p>


                      <p class="timestamp"><i class="fa fa-clock-o"></i> <i>45 mins ago.</i></p>
                    </div>


                    <div class="clearfix">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>


          <div class="clearfix visible-sm">
          </div>
        </div>
      </div>
    </div>


    <div class="row">
      <div class="col-lg-12 clear-padding-xs">
      </div>
    </div>
  </div>