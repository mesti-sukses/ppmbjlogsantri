<div class="main-content" id="content-wrapper">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12 clear-padding-xs">
				<h5 class="page-title"><i class="fa fa-photo"></i>Upload Media</h5>


				<div class="section-divider">
				</div>


				<div class="row">
					<div class="col-md-12">
						<div class="col-sm-4">
							<div class="dash-item">
								<div class="item-title">
									Image Info
								</div>

								<div class="inner-item media-inner">
									<?php echo form_open_multipart(); ?>
										<label class="clear-top-margin"><i style="margin: 12px" class="fa fa-file"></i>Image Location</label>
										<input type="file" name="file-name" id="imgInp" class="form-control" style="margin-bottom: 18px">

										<label class="clear-top-margin"><i style="margin: 12px;" class="fa fa-i-cursor"></i>Alternative Text</label>
										<input type="text" name="alt" class="form-control" style="margin-bottom: 18px">

										<button type="submit" class="btn btn-success"><i class="fa fa-paper-plane"></i>Save</button>
									<?php echo form_close(); ?>
								</div>
							</div>
						</div>

						<div class="col-sm-8">
							<div class="dash-item">
								<div class="item-title">
									Preview
								</div>

								<div class="inner-item image-info">
									<img id="blah" src="" class="img-responsive img-featured">
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>