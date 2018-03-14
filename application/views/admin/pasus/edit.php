<div class="main-content" id="content-wrapper">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12 clear-padding-xs">
				<h5 class="page-title"><i class="fa fa-book"></i>Input Data Pasus</h5>


				<div class="section-divider">
				</div>


				<div class="row">
					<?php echo form_open(); ?>

					<div class="col-md-12">
						<div class="dash-item">
							<div class="item-title">
								<?php echo $dataSantri->nama; ?>
							</div>


							<div class="inner-item">
								<input name="santri_id" type="hidden" value="<?php echo $santri_id ?>">

								<div class="form-group">
									<label>Sholat <span class="label label-success slider-label" id="sholat">50</span></label>

									<div id="slidecontainer">
										<input class="slider" id="sholat" max="100" min="1" name="sholat" type="range" value="50">
									</div>
								</div>


								<div class="form-group">
									<label>Pengajian <span class="label label-success slider-label" id="pengajian">50</span></label>

									<div id="slidecontainer">
										<input class="slider" id="pengajian" max="100" min="1" name="pengajian" type="range" value="50">
									</div>
								</div>


								<div class="form-group">
									<label>1/3 Malam <span class="label label-success slider-label" id="tengah_malam">50</span></label>

									<div id="slidecontainer">
										<input class="slider" id="tengah_malam" max="100" min="1" name="tengah_malam" type="range" value="50">
									</div>
								</div>


								<div class="form-group">
									<label>Amal Sholih <span class="label label-success slider-label" id="amal_sholih">50</span></label>

									<div id="slidecontainer">
										<input class="slider" id="amal_sholih" max="100" min="1" name="amal_sholih" type="range" value="50">
									</div>
								</div>


								<div class="form-group">
									<label>Apel <span class="label label-success slider-label" id="apel">50</span></label>

									<div id="slidecontainer">
										<input class="slider" id="apel" max="100" min="1" name="apel" type="range" value="50">
									</div>
								</div>


								<div class="form-group">
									<label>Penampilan <span class="label label-success slider-label" id="penampilan">50</span></label>

									<div id="slidecontainer">
										<input class="slider" id="penampilan" max="100" min="1" name="penampilan" type="range" value="50">
									</div>
								</div>


								<div class="form-group">
									<label>Kuliah <span class="label label-success slider-label" id="kuliah">50</span></label>

									<div id="slidecontainer">
										<input class="slider" id="kuliah" max="100" min="1" name="kuliah" type="range" value="50">
									</div>
								</div>


								<div class="form-group">
									<label>Sosial Media<span class="label label-success slider-label" id="sosmed">50</span></label>

									<div id="slidecontainer">
										<input class="slider" id="sosmed" max="100" min="1" name="sosmed" type="range" value="50">
									</div>
								</div>


								<div class="form-group">
									<label>Olahraga <span class="label label-success slider-label" id="olahraga">50</span></label>

									<div id="slidecontainer">
										<input class="slider" id="olahraga" max="100" min="1" name="olahraga" type="range" value="50">
									</div>
								</div>


								<div class="form-group">
									<label>Materi KBM <span class="label label-success slider-label" id="kbm">50</span></label>

									<div id="slidecontainer">
										<input class="slider" id="kbm" max="100" min="1" name="kbm" type="range" value="50">
									</div>
								</div>


								<div class="form-group">
									<label>Musyawarah <span class="label label-success slider-label" id="musyawarah">50</span></label>

									<div id="slidecontainer">
										<input class="slider" id="musyawarah" max="100" min="1" name="musyawarah" type="range" value="50">
									</div>
								</div>


								<div class="form-group">
									<label>Ketakdziman Pengurus <span class="label label-success slider-label" id="pengurus">50</span></label>

									<div id="slidecontainer">
										<input class="slider" id="pengurus" max="100" min="1" name="pengurus" type="range" value="50">
									</div>
								</div>


								<div class="form-group">
									<label>Ketakdziman Guru<span class="label label-success slider-label" id="guru">50</span></label>

									<div id="slidecontainer">
										<input class="slider" id="guru" max="100" min="1" name="guru" type="range" value="50">
									</div>
								</div>


								<div class="form-group">
									<label>Ketakdziman Teman <span class="label label-success slider-label" id="teman">50</span></label>

									<div id="slidecontainer">
										<input class="slider" id="teman" max="100" min="1" name="teman" type="range" value="50">
									</div>
								</div>


								<div class="form-group">
									<label>Ketakdziman Orang Lain <span class="label label-success slider-label" id="orang_lain">50</span></label>

									<div id="slidecontainer">
										<input class="slider" id="orang_lain" max="100" min="1" name="orang_lain" type="range" value="50">
									</div>
								</div>


								<div class="form-group">
									<label>Ketakdziman Masjid <span class="label label-success slider-label" id="masjid">50</span></label>

									<div id="slidecontainer">
										<input class="slider" id="masjid" max="100" min="1" name="masjid" type="range" value="50">
									</div>
								</div>

								<textarea class="form-control" name="ket" placeholder="Tulis keterangan tambahan santri" style="height: 100px; margin-bottom: 24px"></textarea> <button class="btn btn-primary primary" type="submit"><i class="fa fa-floppy-o"></i> Save</button>
							</div>
						</div>
					</div>
					<?php echo form_close() ?>
				</div>
			</div>
		</div>
	</div>