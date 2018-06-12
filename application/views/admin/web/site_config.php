<div class="main-content" id="content-wrapper">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12 clear-padding-xs">
				<h5 class="page-title"><i class="fa fa-gears"></i>Site Config</h5>


				<div class="section-divider">
				</div>


				<div class="row">
					<div class="col-md-12">

						<div class="col-sm-8">
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
													<a class="btn btn-success btn-xs btn-edit-config" href="<?php echo base_url('admin/config/'.$config->id) ?>" style="color:white" title="Edit"><i class="fa fa-edit"></i></a>
												</td>
											</tr>
											<?php endforeach ?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
						<div class="col-sm-4">
							<?php
								echo form_open();
								$k = isset($editConfigData);
							?>
								<div class="dash-item">
									<div class="item-title">
										<i class="fa fa-key"></i> <?php if($k) echo $editConfigData->key_config; else echo "Configuration Key" ?>

										<button class="btn btn-success btn-xs pull-right btn-editor" type="submit">Save</button>
									</div>

									<div class="inner-item">

										<textarea name="value" class="form-control"><?php if($k) echo $editConfigData->value ?></textarea>

										<input type="hidden" name="key_config" value="<?php if($k) echo $editConfigData->key_config ?>">

									</div>
								</div>
							<?php echo form_close() ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>