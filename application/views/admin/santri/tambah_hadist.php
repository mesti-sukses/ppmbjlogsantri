<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header">Tambah hadist</h1>
    </div>
  </div>

	<div class="row">
		<div class="col-md-12">
        <div class="panel panel-info">
          <div class="panel-heading">
            List Hadist
          </div>


          <div class="panel-body">

          	<table id="list-hadist">
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
				            		$class = "btn btn-success";
				            		$text = "Add";
				            		$icon = "fa-plus";
				            		if(!is_null($hadist->santri_id)){
				            			$class .= " disabled";
				            			$icon = "fa-check";
				            			$text = "Added";
				            		}
				            	?>
				            	<a href="<?php echo base_url('santri/addhadist/'.$hadist->id) ?>" class="<?php echo $class ?>">
				            		<i class="fa <?php echo $icon ?>"></i>
				            		<?php echo $text ?>
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