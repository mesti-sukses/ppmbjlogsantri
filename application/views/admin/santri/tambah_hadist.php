<div class="main-content" id="content-wrapper">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12 clear-padding-xs">
        <h5 class="page-title"><i class="fa fa-book"></i>Tambah Hadist</h5>
      <div class="section-divider"></div>

				<div class="row">
					<div class="col-md-12">
			        <div class="dash-item">
			          <div class="item-title">
			            <i class="fa fa-list"></i>List Hadist
			          </div>

			          <div class="inner-item">

			          	<table id="attendenceDetailedTable" class="display responsive nowrap" cellspacing="0" width="100%">
							      <thead>
							        <tr>
							          <th scope="col">Hadist</th>
							          <th scope="col">Halaman</th>
							          <th scope="col">Action</th>
							        </tr>
							      </thead>
							      <tbody>
							        <?php foreach ($hadistData as $hadist): ?>
							          <tr>
							            <td data-label="Hadist">
							              <?php echo $hadist->nama ?>
							            </td>
							            <td data-label="Halaman"><?php echo $hadist->offset." Hal" ?></td>
							            <td data-label="Action">
							            	<?php
							            		$class = "btn btn-default";
							            		$icon = "fa-plus";
							            		if(!is_null($hadist->santri_id)){
							            			$class .= " disabled";
							            			$icon = "fa-check";
							            		}
							            	?>
							            	<a href="<?php echo base_url('santri/addhadist/'.$hadist->id) ?>" class="<?php echo $class ?>">
							            		<i class="fa <?php echo $icon ?>"></i>
							            	</a>
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