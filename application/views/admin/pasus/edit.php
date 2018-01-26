<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header">Edit Data Santri</h1>
    </div>
  </div>

	<div class="row">
		<?php echo form_open(); ?>
		<div class="col-md-12">
        <div class="panel panel-info">
          <div class="panel-heading">
            <?php echo $dataSantri->nama; ?>
          </div>

          <div class="panel-body">
          	<input type="hidden" name="santri_id" value="<?php echo $santri_id ?>">

          	<div class="form-group">
							<label>Sholat <span class="label label-success slider-label" id="sholat">50</span></label>
							<div id="slidecontainer">
							  <input type="range" min="1" max="100" value="50" class="slider" id="sholat" name="sholat">
							</div>
						</div>

						<div class="form-group">
							<label>Pengajian <span class="label label-success slider-label" id="pengajian">50</span></label>
							<div id="slidecontainer">
							  <input type="range" min="1" max="100" value="50" class="slider" id="pengajian" name="pengajian">
							</div>
						</div>

						<div class="form-group">
							<label>1/3 Malam <span class="label label-success slider-label" id="tengah_malam">50</span></label>
							<div id="slidecontainer">
							  <input type="range" min="1" max="100" value="50" class="slider" id="tengah_malam" name="tengah_malam">
							</div>
						</div>

						<div class="form-group">
							<label>Amal Sholih <span class="label label-success slider-label" id="amal_sholih">50</span></label>
							<div id="slidecontainer">
							  <input type="range" min="1" max="100" value="50" class="slider" id="amal_sholih" name="amal_sholih">
							</div>
						</div>

						<div class="form-group">
							<label>Apel <span class="label label-success slider-label" id="apel">50</span></label>
							<div id="slidecontainer">
							  <input type="range" min="1" max="100" value="50" class="slider" id="apel" name="apel">
							</div>
						</div>

						<div class="form-group">
							<label>Penampilan <span class="label label-success slider-label" id="penampilan">50</span></label>
							<div id="slidecontainer">
							  <input type="range" min="1" max="100" value="50" class="slider" id="penampilan" name="penampilan">
							</div>
						</div>

						<div class="form-group">
							<label>Kuliah <span class="label label-success slider-label" id="kuliah">50</span></label>
							<div id="slidecontainer">
							  <input type="range" min="1" max="100" value="50" class="slider" id="kuliah" name="kuliah">
							</div>
						</div>

						<div class="form-group">
							<label>Sosial Media<span class="label label-success slider-label" id="sosmed">50</span></label>
							<div id="slidecontainer">
							  <input type="range" min="1" max="100" value="50" class="slider" id="sosmed" name="sosmed">
							</div>
						</div>

						<div class="form-group">
							<label>Olahraga <span class="label label-success slider-label" id="olahraga">50</span></label>
							<div id="slidecontainer">
							  <input type="range" min="1" max="100" value="50" class="slider" id="olahraga" name="olahraga">
							</div>
						</div>

						<div class="form-group">
							<label>Materi KBM <span class="label label-success slider-label" id="kbm">50</span></label>
							<div id="slidecontainer">
							  <input type="range" min="1" max="100" value="50" class="slider" id="kbm" name="kbm">
							</div>
						</div>

						<div class="form-group">
							<label>Musyawarah <span class="label label-success slider-label" id="musyawarah">50</span></label>
							<div id="slidecontainer">
							  <input type="range" min="1" max="100" value="50" class="slider" id="musyawarah" name="musyawarah">
							</div>
						</div>

						<div class="form-group">
							<label>Ketakdziman Pengurus <span class="label label-success slider-label" id="pengurus">50</span></label>
							<div id="slidecontainer">
							  <input type="range" min="1" max="100" value="50" class="slider" id="pengurus" name="pengurus">
							</div>
						</div>

						<div class="form-group">
							<label>Ketakdziman Guru<span class="label label-success slider-label" id="guru">50</span></label>
							<div id="slidecontainer">
							  <input type="range" min="1" max="100" value="50" class="slider" id="guru" name="guru">
							</div>
						</div>

						<div class="form-group">
							<label>Ketakdziman Teman <span class="label label-success slider-label" id="teman">50</span></label>
							<div id="slidecontainer">
							  <input type="range" min="1" max="100" value="50" class="slider" id="teman" name="teman">
							</div>
						</div>

						<div class="form-group">
							<label>Ketakdziman Orang Lain <span class="label label-success slider-label" id="orang_lain">50</span></label>
							<div id="slidecontainer">
							  <input type="range" min="1" max="100" value="50" class="slider" id="orang_lain" name="orang_lain">
							</div>
						</div>

						<div class="form-group">
							<label>Ketakdziman Masjid <span class="label label-success slider-label" id="masjid">50</span></label>
							<div id="slidecontainer">
							  <input type="range" min="1" max="100" value="50" class="slider" id="masjid" name="masjid">
							</div>
						</div>

						<textarea name="ket" class="form-control" placeholder="Tulis keterangan tambahan santri" style="height: 100px; margin-bottom: 24px"></textarea>

            <button class="btn btn-primary primary" type="submit"><i class="fa fa-floppy-o"></i> Save</button>

          </div>
        </div>
      </div>
      <?php echo form_close() ?>
     </div>
</div>