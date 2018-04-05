<div class="main-content" id="content-wrapper">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12 clear-padding-xs">
				<h5 class="page-title"><i class="fa fa-gears"></i>Site Config</h5>


				<div class="section-divider">
				</div>


				<div class="row">
					<div class="col-md-12">
						<div class="dash-item">
							<div class="item-title">
								Site Config
							</div>


							<div class="inner-item">
								<table cellspacing="0" class="display responsive nowrap" id="attendenceDetailedTable" width="100%">
									<thead>
										<tr>
											<th scope="col">Key</th>

											<th scope="col">Value</th>

											<th scope="col">Action</th>
										</tr>
									</thead>


									<tbody>
										<?php foreach ($configData as $config): ?>

										<tr>
											<td data-label="Judul">
												<?php echo $config->key_config ?>
											</td>

											<td data-label="Kategori">
												<?php echo $config->value ?>
											</td>

											<td>
												<a class="btn btn-success btn-xs btn-edit-config" data-id="<?php echo $config->id ?>" data-key="<?php echo $config->key_config ?>" data-val="<?php echo $config->value ?>" data-target="#editDetailModal" data-toggle="modal" href="admin-add-class.html#" style="color:white" title="Edit"><i class="fa fa-edit"></i></a>
											</td>
										</tr>
										<?php endforeach ?>
									</tbody>
								</table>
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

					<h4 class="modal-title"><i class="fa fa-edit"></i>Config</h4>
				</div>


				<div class="modal-body dash-form">
					<input class="form-control" id="value" name="value" placeholder="Value" type="text">
					<input id="id" name="id" type="hidden">
					<input id="key" name="key_config" type="hidden">
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