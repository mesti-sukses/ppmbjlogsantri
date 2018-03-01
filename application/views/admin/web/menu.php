<div class="main-content" id="content-wrapper">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12 clear-padding-xs">
							<h5 class="page-title"><i class="fa fa-list"></i>Web Menu</h5>
							<div class="section-divider"></div>
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
											<div class="clearfix"></div>
										</div>
										<?php foreach ($mainMenu as $menu): ?>
											<div class="tbl-row">
												<div class="col-xs-2">
													<h6><i class="fa fa-<?php echo $menu->icon ?>"></i></h6>
												</div>
												<div class="col-xs-2">
													<h6><?php echo $menu->text ?></h6>
												</div>
												<div class="col-xs-6">
													<h6><?php echo $menu->link ?></h6>
												</div>
												<div class="col-xs-2">
													<a class="btn btn-success btn-xs btn-edit-menu" href="admin-add-class.html#" title="Edit" data-toggle="modal" data-target="#editDetailModal"
														data-icon="<?php echo $menu->icon ?>"
														data-text="<?php echo $menu->text ?>"
														data-link="<?php echo $menu->link ?>"
														data-linktype = "<?php echo $menu->type ?>"
														data-id = "<?php echo $menu->id ?>"
														data-loc = "<?php echo $menu->location ?>"
														><i class="fa fa-edit"></i></a>
													<a class="btn btn-danger btn-xs" href="<?php echo base_url('admin/delMenu/'.$menu->id) ?>" title="Delete"><i class="fa fa-trash"></i></a>
												</div>
											<div class="clearfix"></div>
											</div>
										<?php endforeach ?>
										<div class="clearfix"></div>
									</div>
									<div class="clearfix"></div>
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
											<div class="clearfix"></div>
										</div>
										<?php foreach ($socialMenu as $menu): ?>
											<div class="tbl-row">
												<div class="col-xs-2">
													<h6><i class="fa fa-<?php echo $menu->icon ?>"></i></h6>
												</div>
												<div class="col-xs-2">
													<h6><?php echo $menu->text ?></h6>
												</div>
												<div class="col-xs-6">
													<h6><?php echo $menu->link ?></h6>
												</div>
												<div class="col-xs-2">
													<a class="btn btn-success btn-xs btn-edit-menu" href="admin-add-class.html#" title="Edit" data-toggle="modal" data-target="#editDetailModal"
														data-icon="<?php echo $menu->icon ?>"
														data-text="<?php echo $menu->text ?>"
														data-link="<?php echo $menu->link ?>"
														data-linktype = "<?php echo $menu->type ?>"
														data-id = "<?php echo $menu->id ?>"
														data-loc = "<?php echo $menu->location ?>"
														><i class="fa fa-edit"></i></a>
													<a class="btn btn-danger btn-xs" href="<?php echo base_url('admin/delMenu/'.$menu->id) ?>" title="Delete"><i class="fa fa-trash"></i></a>
												</div>
											<div class="clearfix"></div>
											</div>
										<?php endforeach ?>
										<div class="clearfix"></div>
									</div>
									<div class="clearfix"></div>
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
												<label class="clear-top-margin"><i class="fa fa-photo"></i>Icon</label>
												<input type="text" placeholder="Menu FA Icon" name="icon" />
												<label><i class="fa fa-i-cursor"></i>Text</label>
												<input type="text" placeholder="Menu Text" name="text" />
												<label><i class="fa fa-user-secret"></i>Type</label>
												<label class="container">Internal
												  <input type="radio" name="type" value="internal">
												  <span class="checkmark"></span>
												</label>
												<label class="container">External
												  <input type="radio" name="type" value="external">
												  <span class="checkmark"></span>
												</label>
												<label><i class="fa fa-link"></i>Location</label>
												<input type="text" placeholder="Menu Link" name="link" />
												<input type="hidden" name="location" value="main">
												<div>
													<button type="submit" class="btn btn-success" style="margin-top: 24px"><i class="fa fa-paper-plane"></i> Create</button>
												</div>
											</form>
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
												<label class="clear-top-margin"><i class="fa fa-photo"></i>Icon</label>
												<input type="text" placeholder="Menu FA Icon" name="icon" />
												<label><i class="fa fa-i-cursor"></i>Text</label>
												<input type="text" placeholder="Menu Text" name="text" />
												<label><i class="fa fa-link"></i>Location</label>
												<input type="text" placeholder="Menu Link" name="link" />
												<input type="hidden" name="location" value="social">
												<input type="hidden" name="type" value="external">
												<div>
													<button type="submit" class="btn btn-success" style="margin-top: 24px"><i class="fa fa-paper-plane"></i> Create</button>
												</div>
											</form>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div id="editDetailModal" class="modal fade" role="dialog">
					<div class="modal-dialog">
						<!-- Modal content-->
						<div class="modal-content">
							<?php echo form_open() ?>
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal">&times;</button>
									<h4 class="modal-title"><i class="fa fa-edit"></i>Edit Menu</h4>
								</div>
								<div class="modal-body dash-form">
									<div class="col-sm-4">
										<label class="clear-top-margin"><i class="fa fa-photos"></i>Icon</label>
										<input type="text" id="icon" name="icon" />
									</div>
									<div class="col-sm-4">
										<label class="clear-top-margin"><i class="fa fa-i-cursor"></i>Text</label>
										<input type="text" id="text" name="text" />
									</div>
									<div class="clearfix"></div>
									<div class="col-sm-12">
										<label><i class="fa fa-link"></i>Location</label>
										<input type="text" id="link" name="link" />
									</div>
									<input type="hidden" name="location" id="location">
									<input type="hidden" name="id" id="id">
									<input type="hidden" name="type" id="type">
									<div class="clearfix"></div>
								</div>
								<div class="modal-footer">
									<div class="table-action-box">
										<button type="submit" class="btn btn-success btn-xs"><i class="fa fa-check"></i>Save</button>
									</div>
								</div>
							<?php echo form_close() ?>
						</div>
					</div>
				</div>