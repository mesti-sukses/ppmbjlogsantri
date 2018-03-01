<div class="main-content" id="content-wrapper">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12 clear-padding-xs">
        <h5 class="page-title"><i class="fa fa-tag"></i>Category</h5>
      <div class="section-divider"></div>

			<div class="row">
				<div class="col-md-12">
		        <div class="dash-item">
		          <div class="item-title">
		            List Category
		            <a class="btn btn-success btn-xs btn-edit-menu pull-right" href="admin-add-class.html#" title="Edit" data-toggle="modal" data-target="#editDetailModal">
		            	<i class="fa fa-plus"></i> Add Category
		            </a>
		          </div>


		          <div class="inner-item">

		          	<table id="attendenceDetailedTable" class="display responsive nowrap" cellspacing="0" width="100%">
						      <thead>
						        <tr>
						        	<th scope="col">#</th>
						          <th scope="col">Nama</th>
						          <th scope="col">Action</th>
						        </tr>
						      </thead>
						      <tbody>
						        <?php foreach ($catData as $cat): ?>
						          <tr>
						          	<td data-label="#">
						          		<input type="checkbox" name="">
						          	</td>
						            <td data-label="Nama">
						              <?php echo $cat->name ?>
						            </td>
						            <td>
						              <a class="btn btn-success btn-xs btn-edit-menu" href="admin-add-class.html#" title="Edit" data-toggle="modal" data-target="#editDetailModal" style="color:white" data-name = "<?php echo $cat->name ?>" data-id = "<?php echo $cat->cat_id ?>"
														><i class="fa fa-edit"></i></a>
													<a class="btn btn-danger btn-xs" href="" style="color:white"  title="Delete"><i class="fa fa-trash"></i></a>
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

				<div id="editDetailModal" class="modal fade" role="dialog">
					<div class="modal-dialog">
						<!-- Modal content-->
						<div class="modal-content">
							<?php echo form_open() ?>
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal">&times;</button>
									<h4 class="modal-title"><i class="fa fa-edit"></i>Category</h4>
								</div>
								<div class="modal-body dash-form">
									<input type="text" name="name" placeholder="Category Name" class="form-control" id="name">
									<input type="hidden" name="cat_id" id="id">
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