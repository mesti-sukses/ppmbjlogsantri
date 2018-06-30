<div class="main-content" id="content-wrapper">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12 clear-padding-xs">
				<h5 class="page-title"><i class="fa fa-photo"></i>Media Library</h5>


				<div class="section-divider">
				</div>


				<div class="row">
					<div class="col-md-12">
						<div class="col-sm-8">
							<div class="dash-item">
								<div class="item-title">
									Photo Gallery
									<a class="btn-primary btn pull-right btn-sm" href="<?php echo base_url('media/add') ?>"><i class="fa-plus fa"></i>Tambah Gallery</a>
								</div>

								<div class="inner-item media-inner">
									<?php foreach ($mediaData as $media): ?>
										<figure class="col-sm-4 media-item">
											<img src="<?php echo base_url('media_content/'.$media->file_name) ?>" class="img-responsive" alt="<?php echo $media->alt ?>" data-id="<?php echo base_url('media/delete/'.$media->id_media) ?>">
										</figure>
									<?php endforeach ?>
								</div>
							</div>
						</div>

						<div class="col-sm-4">
							<div class="dash-item">
								<div class="item-title">
									Photo Information
								</div>

								<div class="inner-item image-info">
									<img src="" class="img-responsive img-featured">
									<div class="description">
										<strong>Alt Description</strong>
										<p>Lolololo</p>
									</div>
									<a class="btn btn-danger delete-btn" href=""><i class="fa fa-trash"></i>Delete</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>