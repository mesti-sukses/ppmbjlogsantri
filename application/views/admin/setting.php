<div class="main-content" id="content-wrapper">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12 clear-padding-xs">
        <h5 class="page-title"><i class="fa fa-book"></i>Pofile</h5>
      <div class="section-divider"></div>
  <!--/.row-->
      <div class="row">
        <div class="col-md-12">
          <div class="dash-item">
            <div class="item-title">
              Edit Profile
            </div>

            <div class="inner-item">
              <?php echo form_open() ?>
                <div class="form-group">
                  <label>NIS</label>
                  <input class="form-control" placeholder="Masukkan NIS" value="<?php echo $userData->nis ?>" name="nis">
                </div>

                <div class="form-group">
                  <label>Nama</label>
                  <input class="form-control" placeholder="Masukkan Nama" value="<?php echo $userData->nama ?>" name="nama">
                </div>

                <div class="form-group">
                  <label>Asal</label>
                  <input class="form-control" placeholder="Masukkan Asal" value="<?php echo $userData->alamat ?>" name="alamat">
                </div>

                <div class="form-group">
                  <label>Angkatan</label>
                  <input class="form-control" placeholder="Masukkan Angkatan" value="<?php echo $userData->angkatan ?>" name="angkatan">
                </div>

                <div class="form-group">
                  <label>Password</label>
                  <input type="password" placeholder="Masukkan password baru" class="form-control" name="pass">
                </div>

                <button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o"></i> Save</button>
              <?php echo form_close() ?>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>