<div class="main-content" id="content-wrapper">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12 clear-padding-xs">
				<h5 class="page-title"><i class="fa fa-wordpress"></i>Blogging</h5>


				<div class="section-divider">
				</div>


				<div class="row">
					<div class="col-md-12">
						<div class="dash-item">
							<div class="item-title">
								Blog Post <a class="btn btn-success pull-right btn-xs" href="<?php echo base_url('admin/post') ?>"><i class="fa fa-plus"></i> Add Post</a>
							</div>


							<div class="inner-item">
								<table cellspacing="0" class="display responsive nowrap" id="attendenceDetailedTable" width="100%">
									<thead>
										<tr>
											<th scope="col">Title</th>

											<th scope="col">Category</th>

											<th scope="col">Action</th>

											<th scope="col">Last Updated</th>

											<th scope="col">Summary</th>
										</tr>
									</thead>


									<tbody>
										<?php foreach ($postData as $post): ?>

										<tr>
											<td data-label="Judul"><?php echo $post->title; if($post->sticky) echo "<span class='label label-success pull-right'>Sticky</span>" ?>
											</td>

											<td data-label="Kategori"><?php echo $post->name ?>
											</td>

											<td>
												<a class="btn btn-success btn-xs" href="<?php echo base_url('admin/post/'.$post->id) ?>" style="color:white"><i class="fa fa-pencil"></i></a> <a class="btn btn-danger btn-xs" href="<?php echo base_url('admin/delPost/'.$post->id) ?>" style="color:white"><i class="fa fa-trash"></i></a>
											</td>

											<td data-label="Last Update" data-order="<?php echo $post->updated ?>">
												<?php
						                          $date = strtotime($post->updated);
						                          echo date("d F y", $date);
						                        ?>
											</td>

											<td data-label="Summary"><?php echo limit_to_numwords($post->content, 20) ?>
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