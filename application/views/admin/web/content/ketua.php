<div class="main-content" id="content-wrapper">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12 clear-padding-xs">
				<h5 class="page-title"><i class="fa fa-user"></i>Tentang Ketua Pondok</h5>


				<div class="section-divider">
				</div>
			</div>
		</div>


		<div class="row">
			<div class="col-lg-12 clear-padding-xs">
				<div class="dash-item first-dash-item">
					<h6 class="item-title"><i class="fa fa-user"></i>Ketua Pondok</h6>


					<div class="inner-item">
						<?php $k = $ketua != NULL ?>
						<div class="dash-form">
							<?php echo form_open('',array('id' => 'editor')) ?><button class="btn btn-success btn-xs pull-right btn-editor" type="submit">Save</button> <label class="clear-top-margin"><i class="fa fa-i-cursor"></i>Nama</label> <input name="nama" placeholder="Nama Ketua Pondok" type="text" value="<?php if($k) echo $ketua->nama ?>"> <label class="clear-top-margin"><i class="fa fa-link"></i>Link</label> <input name="extra" placeholder="Link" type="text" value="<?php if($k) echo $ketua->extra ?>"> 
							
							<label class="clear-top-margin"><i class="fa fa-photo"></i>Foto</label>
							<select name="image" class="form-control" style="height: auto;" id="comboInput" data-base="<?php echo base_url('media_content/') ?>">
								<option value="male.png">Pilih Gambar</option>
								<?php foreach ($mediaData as $media): ?>
									<option value="<?php echo $media->file_name ?>"><?php echo $media->file_name ?></option>
								<?php endforeach ?>
							</select>
							<?php
								$image = $k ? $ketua->image : 'male.png';
							?>
							<img src="<?php echo base_url('media_content/'.$image) ?>" alt="" class="img-responsive" style="margin-bottom: 18px; margin-top: 18px;" id="blah">
							<label class="clear-top-margin"><i class="fa fa-user"></i>Tentang</label>

							<div id="div-editor">
								<?php if($k) echo $ketua->content ?>
							</div>

							<textarea id="text-editor" name="content" style="display: none;"></textarea> <input name="location" type="hidden" value="ketua"> 
						</div>


						<div class="clearfix">
						</div>
					</div>


					<div class="clearfix">
					</div>
				</div>
			</div>
		</div>
	</div>