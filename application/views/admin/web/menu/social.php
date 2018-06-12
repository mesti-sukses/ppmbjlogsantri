<div class="main-content" id="content-wrapper">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12 clear-padding-xs">
				<h5 class="page-title"><i class="fa fa-list"></i>Web Menu</h5>


				<div class="section-divider">
				</div>
			</div>
		</div>


		<div class="row">
			<div class="col-lg-12 clear-padding-xs">

				<div class="col-sm-8">
					<div class="dash-item first-dash-item">
						<h6 class="item-title"><i class="fa fa-users"></i>Social Menu</h6>


						<div class="inner-item">
							<div class="item-header">
								<div class="col-xs-2">
									<h6>Icon</h6>
								</div>


								<div class="col-xs-2">
									<h6>Text</h6>
								</div>


								<div class="col-xs-6">
									<h6>Link</h6>
								</div>


								<div class="col-xs-2">
									<h6>Action</h6>
								</div>


								<div class="clearfix">
								</div>
							</div>
							<?php foreach ($social as $menu): ?>

							<div class="tbl-row">
								<div class="col-xs-2">
									<h6><i class="fa fa-<?php echo $menu->icon ?>"></i>
									</h6>
								</div>


								<div class="col-xs-2">
									<h6><?php echo $menu->text ?>
									</h6>
								</div>


								<div class="col-xs-6">
									<h6><?php echo $menu->link ?>
									</h6>
								</div>


								<div class="col-xs-2">
									<a class="btn btn-success btn-xs btn-edit-menu" href="<?php echo base_url('admin/menu/social/'.$menu->id) ?>" title="Edit"><i class="fa fa-edit"></i></a> <a class="btn btn-danger btn-xs" href="<?php echo base_url('admin/delMenu/social/'.$menu->id) ?>" title="Delete"><i class="fa fa-trash"></i></a>
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
						<h6 class="item-title"><i class="fa fa-plus"></i>Add Menu</h6>


						<div class="inner-item">
							<div class="dash-form">
								<?php 
									echo form_open();
									$k = isset($socialNewData);
								?>
									<label class="clear-top-margin"><i class="fa fa-photo"></i>Icon</label> <input name="icon" placeholder="Menu FA Icon" type="text" value="<?php if($k) echo $socialNewData->icon ?>"> <label><i class="fa fa-i-cursor"></i>Text</label> <input name="text" placeholder="Menu Text" type="text" value="<?php if($k) echo $socialNewData->text ?>"> <label><i class="fa fa-link"></i>Location</label> <input name="link" placeholder="Menu Link" type="text"  value="<?php if($k) echo $socialNewData->link ?>"> <input name="location" type="hidden" value="social"> <input name="type" type="hidden" value="external">

									<div>
										<button class="btn btn-success" style="margin-top: 24px" type="submit"><i class="fa fa-paper-plane"></i> Create</button>
									</div>
								<?php echo form_close() ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>