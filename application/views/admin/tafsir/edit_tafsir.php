<div class="main-content" id="content-wrapper">
	<div class="container-fluid">
		<?php
			echo form_open_multipart('', array('id' => 'editor'));
			$edit = isset($currentTafsirQuran);
		?>

		<div class="row">
			<div class="col-lg-12 clear-padding-xs">
				<h5 class="page-title"><i class="fa fa-clipboard"></i>Tafsir</h5>


				<div class="section-divider">
				</div>
			</div>
		</div>


		<div class="row">
			<div class="col-lg-12 clear-padding-xs">
				<div class="col-md-8">
					<div class="dash-item first-dash-item">
						<h6 class="item-title"><i class="fa fa-pencil"></i>Edit Tafsir</h6>


						<div class="inner-item">
							<div class="dash-form">
								<label class="clear-top-margin"><i class="fa fa-i-cursor"></i>Surat</label> 
								<select class="form-control" style="margin-bottom: 24px; height: auto" name="surat">
									<option>Pilih Surat...</option>
									<?php foreach ($listSurat as $surat): ?>
										<option value="<?php echo $surat->id ?>" <?php if($edit) if($currentTafsirQuran->id == $surat->id) echo "selected" ?>><?php echo $surat->nama ?></option>
									<?php endforeach ?>
								</select>
								<label class="clear-top-margin"><i class="fa fa-i-cursor"></i>Ayat</label> 
									<input name="ayat" placeholder="Ayat" style="margin-bottom: 24px" type="text" value="<?php if($edit) echo $currentTafsirQuran->ayat ?>"> 
								<label class="clear-top-margin"><i class="fa fa-pencil"></i>Tulis Content Disini</label>

								<div id="div-editor">
									<?php if($edit) echo $currentTafsirQuran->content ?>
								</div>

								<textarea id="text-editor" name="content" style="display: none;"></textarea>
							</div>


							<div class="clearfix">
							</div>
						</div>


						<div class="clearfix">
						</div>
					</div>
				</div>


				<div class="col-md-4">
					<div class="dash-item first-dash-item">
						<h6 class="item-title">Publish <button class="btn btn-success pull-right btn-editor btn-xs" type="submit"><i class="fa fa-globe"></i>Publish</button></h6>


						<div class="inner-item">
							<input type="text" name="halaman" placeholder="Masukkan Halaman" class="form-control" value="<?php if($edit) echo $currentTafsirQuran->halaman ?>">

							<div class="clearfix">
							</div>
						</div>


						<div class="clearfix">
						</div>


						<h6 class="item-title">Tag</h6>


						<div class="inner-item">
							<input class="form-control" name="tag" placeholder="Masukkan tag" value="<?php if($edit) echo $currentTafsirQuran->tag ?>">
						</div>

					</div>
				</div>
			</div>
		</div>
		<?php echo form_close() ?>
	</div>