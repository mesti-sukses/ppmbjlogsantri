<div class="main-content" id="content-wrapper">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12 clear-padding-xs">
				<h5 class="page-title"><i class="fa fa-comment"></i>Testimoni</h5>


				<div class="section-divider">
				</div>
			</div>
		</div>


		<div class="row">
			<div class="col-lg-12 clear-padding-xs">

				<div class="col-sm-8">
					<div class="dash-item first-dash-item">
						<h6 class="item-title"><i class="fa fa-comment"></i>Testimoni</h6>


						<div class="inner-item">
							<div class="item-header">
								<div class="col-xs-3">
									<h6>Nama</h6>
								</div>


								<div class="col-xs-6">
									<h6>Testimoni</h6>
								</div>


								<div class="col-xs-3">
									<h6>Action</h6>
								</div>


								<div class="clearfix">
								</div>
							</div>
							<?php foreach ($testimoni as $komentar): ?>

							<div class="tbl-row">
								<div class="col-xs-3">
									<h6><?php echo $komentar->nama; ?>
									</h6>
								</div>


								<div class="col-xs-6">
									<h6><?php echo $komentar->content ?>
									</h6>
								</div>


								<div class="col-xs-3">
									<a class="btn btn-success btn-xs" href="<?php echo base_url('admin/content/testimoni/'.$komentar->id) ?>" title="Delete"><i class="fa fa-pencil"></i></a>
									<a class="btn btn-danger btn-xs" href="<?php echo base_url('admin/delContent/'.$komentar->id) ?>" title="Delete"><i class="fa fa-trash"></i></a>
								</div>


								<div class="clearfix">
								</div>
							</div>
							<?php endforeach ?>

							<div class="clearfix">
							</div>
						</div>


						<div class="clearfix">
						</div>
					</div>
				</div>

				<div class="col-sm-4">
					<div class="dash-item first-dash-item">
						<h6 class="item-title"><i class="fa fa-plus"></i>Tambahkan Testimoni</h6>


						<div class="inner-item">
							<?php $k = isset($testimoniNewData); ?>
							<div class="dash-form">
								<?php echo form_open() ?><button class="btn btn-success btn-xs pull-right" type="submit">Save</button> <label class="clear-top-margin"><i class="fa fa-i-cursor"></i>Nama</label> <input name="nama" placeholder="Nama" type="text" value="<?php if($k) echo $testimoniNewData->nama ?>"> <label class="clear-top-margin"><i class="fa fa-star"></i>Rating</label> <input name="extra" placeholder="Rating" type="text" value="<?php if($k) echo $testimoniNewData->extra ?>"> 
								
								<label class="clear-top-margin"><i class="fa fa-photo"></i>Foto</label>
								<select name="image" class="form-control" style="height: auto;" id="comboInput" data-base="<?php echo base_url('media_content/') ?>">
									<option value="male.png">Pilih Gambar</option>
									<?php foreach ($mediaData as $media): ?>
										<option value="<?php echo $media->file_name ?>"><?php echo $media->file_name ?></option>
									<?php endforeach ?>
								</select>
								<?php
									$image = $k ? $testimoniNewData->image : 'male.png';
								?>
								<img src="<?php echo base_url('media_content/'.$image) ?>" alt="" class="img-responsive" style="margin-bottom: 18px; margin-top: 18px;" id="blah">
								<label class="clear-top-margin"><i class="fa fa-comment"></i>Testimoni</label> 

								<textarea name="content" placeholder="Enter Description" style="height: 240px;"><?php if($k) echo $testimoniNewData->content ?></textarea> <input name="location" type="hidden" value="testimoni"> 
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
	</div>