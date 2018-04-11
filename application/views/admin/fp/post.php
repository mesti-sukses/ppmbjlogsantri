<div class="main-content" id="content-wrapper">
	<div class="container-fluid">
		<?php echo form_open('', array('id' => 'editor')) ?>

		<div class="row">
			<div class="col-lg-12 clear-padding-xs">
				<h5 class="page-title"><i class="fa fa-clipboard"></i><?php echo $dataUsulan->usulan ?></h5>


				<div class="section-divider">
				</div>
			</div>
		</div>


		<div class="row">
			<div class="col-lg-12 clear-padding-xs">
				<div class="col-md-8">
					<div class="dash-item first-dash-item">
						<h6 class="item-title">
							<label class="container"> Terlaksana <input class="status-check " id="wali" name="terlaksana" type="checkbox" value="1" <?php if($dataUsulan->terlaksana == 1) echo 'checked' ?>> <span class="checkmark"></span></label>
						</h6>


						<div class="inner-item">
							<div class="dash-form"><label class="clear-top-margin"><i class="fa fa-pencil"></i>Pembahasan Usulan</label>

								<div id="div-editor">
									<?php echo $dataUsulan->pembahasan ?>
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
						<h6 class="item-title">Pengusul <button class="btn btn-success pull-right btn-editor btn-xs" type="submit"><i class="fa fa-check"></i>Save</button></h6>

						<?php foreach ($dataFP as $FP): ?>

							<label class="container"><?php echo $FP->nama ?> <input class="status-check" id="wali" name="pengusul" type="radio" value="<?php echo $FP->id ?>" <?php if($FP->id == $dataUsulan->pengusul) echo 'checked' ?>> <span class="checkmark"></span></label>

						<?php endforeach ?>
					</div>
				</div>
			</div>
		</div>
		<?php echo form_close() ?>
	</div>