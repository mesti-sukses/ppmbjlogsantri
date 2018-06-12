<div class="main-content" id="content-wrapper">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12 clear-padding-xs">
				<h5 class="page-title"><i class="fa fa-tag"></i>Category</h5>


				<div class="section-divider">
				</div>


				<div class="row">
					<div class="col-md-12">
						<div class="col-sm-8">
							<div class="dash-item">
								<div class="item-title">
									List Category
								</div>


								<div class="inner-item">
									<table cellspacing="0" class="display responsive nowrap" id="attendenceDetailedTable" width="100%">
										<thead>
											<tr>
												<th scope="col">Nama</th>

												<th scope="col">Action</th>
											</tr>
										</thead>


										<tbody>
											<?php foreach ($catData as $cat): ?>

											<tr>
												<td data-label="Nama"><?php echo $cat->name ?>
												</td>

												<td>
													<a class="btn btn-success btn-xs btn-edit-menu" href="<?php echo base_url('admin/category/'.$cat->cat_id) ?>" style="color:white" title="Edit"><i class="fa fa-edit"></i></a> <a class="btn btn-danger btn-xs" href="" style="color:white" title="Delete"><i class="fa fa-trash"></i></a>
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
								$k = isset($editCatData);
							?>
								<div class="dash-item">
									<div class="item-title">
										<i class="fa fa-tag"></i> <?php if($k) echo "Edit "; else echo "Tambah " ?> Kategori

										<button class="btn btn-success btn-xs pull-right btn-editor" type="submit"><?php if($k) echo "Save"; else echo "Add" ?></button>
									</div>

									<div class="inner-item">
										<input class="form-control" id="name" name="name" placeholder="Category Name" type="text" value="<?php if($k) echo $editCatData->name ?>">
									</div>
								</div>
							<?php echo form_close() ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>