<div class="main-content" id="content-wrapper">
	<div class="container-fluid">
		<?php echo form_open_multipart('', array('id' => 'editor')) ?>

		<div class="row">
			<div class="col-lg-12 clear-padding-xs">
				<h5 class="page-title"><i class="fa fa-clipboard"></i>Posts</h5>


				<div class="section-divider">
				</div>
			</div>
		</div>


		<div class="row">
			<div class="col-lg-12 clear-padding-xs">
				<div class="col-md-8">
					<div class="dash-item first-dash-item">
						<h6 class="item-title"><i class="fa fa-pencil"></i>Post Content</h6>


						<div class="inner-item">
							<div class="dash-form">
								<?php if(isset($fileError)) echo '<div class="alert alert-danger">'.$fileError.'</div>' ?><label class="clear-top-margin"><i class="fa fa-i-cursor"></i>Judul</label> <input name="title" placeholder="Judul" style="margin-bottom: 24px" type="text" value="<?php if($edit) echo $dataPost->title ?>"> <label class="clear-top-margin"><i class="fa fa-pencil"></i>Tulis Content Disini</label>

								<div id="div-editor">
									<?php if($edit) echo $dataPost->content ?>
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
							<input name="id" type="hidden" value="<?php if($edit) echo $dataPost->id ?>"> <input name="image" type="hidden" value="<?php if($edit) echo $dataPost->image ?>"> <label class="container">Sticky <input name="sticky" type="checkbox" value="1"> <span class="checkmark"></span></label>

							<div class="clearfix">
							</div>
						</div>


						<div class="clearfix">
						</div>


						<h6 class="item-title">Categories</h6>


						<div class="inner-item">
							<?php foreach ($categoryData as $cat): ?><label class="container"><?php echo $cat->name ?> <input name="categories" type="radio" value="<?php echo $cat->cat_id ?>"> <span class="checkmark"></span></label> <?php endforeach ?>
						</div>


						<h6 class="item-title">Images</h6>


						<div class="inner-item">
							<img class="img-responsive" id="blah" src="<?php if($edit) echo base_url('images/Post/'.$dataPost->image) ?>" style="margin-bottom: 24px"> <input id="imgInp" name="userFile" type="file">
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php echo form_close() ?>
	</div>