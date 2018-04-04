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
				<div class="col-sm-6">
					<div class="dash-item first-dash-item">
						<h6 class="item-title"><i class="fa fa-list"></i>Main Menu</h6>


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
							<?php foreach ($mainMenu as $menu): ?>

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
									<a class="btn btn-success btn-xs btn-edit-menu" data-icon="<?php echo $menu->icon ?>" data-id="<?php echo $menu->id ?>" data-link="<?php echo $menu->link ?>" data-linktype="<?php echo $menu->type ?>" data-loc="<?php echo $menu->location ?>" data-target="#editDetailModal" data-text="<?php echo $menu->text ?>" data-toggle="modal" href="admin-add-class.html#" title="Edit"><i class="fa fa-edit"></i></a> <a class="btn btn-danger btn-xs" href="<?php echo base_url('admin/delMenu/'.$menu->id) ?>" title="Delete"><i class="fa fa-trash"></i></a>
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


				<div class="col-sm-6">
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
							<?php foreach ($socialMenu as $menu): ?>

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
									<a class="btn btn-success btn-xs btn-edit-menu" data-icon="<?php echo $menu->icon ?>" data-id="<?php echo $menu->id ?>" data-link="<?php echo $menu->link ?>" data-linktype="<?php echo $menu->type ?>" data-loc="<?php echo $menu->location ?>" data-target="#editDetailModal" data-text="<?php echo $menu->text ?>" data-toggle="modal" href="admin-add-class.html#" title="Edit"><i class="fa fa-edit"></i></a> <a class="btn btn-danger btn-xs" href="<?php echo base_url('admin/delMenu/'.$menu->id) ?>" title="Delete"><i class="fa fa-trash"></i></a>
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
			</div>
		</div>


		<div class="row">
			<div class="col-lg-12 clear-padding-xs">
				<div class="col-sm-6">
					<div class="dash-item first-dash-item">
						<h6 class="item-title"><i class="fa fa-plus"></i>Add Menu</h6>


						<div class="inner-item">
							<div class="dash-form">
								<?php echo form_open() ?>
									<label class="clear-top-margin"><i class="fa fa-photo"></i>Icon</label> <input name="icon" placeholder="Menu FA Icon" type="text"> <label><i class="fa fa-i-cursor"></i>Text</label> <input name="text" placeholder="Menu Text" type="text"> <label><i class="fa fa-user-secret"></i>Type</label> <label class="container">Internal <input name="type" type="radio" value="internal"> <span class="checkmark"></span></label> <label class="container">External <input name="type" type="radio" value="external"> <span class="checkmark"></span></label> <label><i class="fa fa-link"></i>Location</label> <input name="link" placeholder="Menu Link" type="text"> <input name="location" type="hidden" value="main">

									<div>
										<button class="btn btn-success" style="margin-top: 24px" type="submit"><i class="fa fa-paper-plane"></i> Create</button>
									</div>
								<?php echo form_close() ?>
							</div>
						</div>
					</div>
				</div>


				<div class="col-sm-6">
					<div class="dash-item first-dash-item">
						<h6 class="item-title"><i class="fa fa-plus"></i>Add Menu</h6>


						<div class="inner-item">
							<div class="dash-form">
								<?php echo form_open() ?>
									<label class="clear-top-margin"><i class="fa fa-photo"></i>Icon</label> <input name="icon" placeholder="Menu FA Icon" type="text"> <label><i class="fa fa-i-cursor"></i>Text</label> <input name="text" placeholder="Menu Text" type="text"> <label><i class="fa fa-link"></i>Location</label> <input name="link" placeholder="Menu Link" type="text"> <input name="location" type="hidden" value="social"> <input name="type" type="hidden" value="external">

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


	<div class="modal fade" id="editDetailModal" role="dialog">
		<div class="modal-dialog">
			<!-- Modal content-->


			<div class="modal-content">
				<?php echo form_open() ?>

				<div class="modal-header">
					<button class="close" data-dismiss="modal" type="button">&times;</button>

					<h4 class="modal-title"><i class="fa fa-edit"></i>Edit Menu</h4>
				</div>


				<div class="modal-body dash-form">
					<div class="col-sm-4">
						<label class="clear-top-margin"><i class="fa fa-photos"></i>Icon</label> <input id="icon" name="icon" type="text">
					</div>


					<div class="col-sm-4">
						<label class="clear-top-margin"><i class="fa fa-i-cursor"></i>Text</label> <input id="text" name="text" type="text">
					</div>


					<div class="clearfix">
					</div>


					<div class="col-sm-12">
						<label><i class="fa fa-link"></i>Location</label> <input id="link" name="link" type="text">
					</div>
					<input id="location" name="location" type="hidden"> <input id="id" name="id" type="hidden"> <input id="type" name="type" type="hidden">

					<div class="clearfix">
					</div>
				</div>


				<div class="modal-footer">
					<div class="table-action-box">
						<button class="btn btn-success btn-xs" type="submit"><i class="fa fa-check"></i>Save</button>
					</div>
				</div>
				<?php echo form_close() ?>
			</div>
		</div>
	</div>