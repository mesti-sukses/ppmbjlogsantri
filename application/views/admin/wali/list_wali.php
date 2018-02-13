<div class="main-content" id="content-wrapper">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12 clear-padding-xs">
        <h5 class="page-title"><i class="fa fa-book"></i>Wali Qur'an</h5>
      <div class="section-divider"></div>

			<div class="row">
				<div class="col-md-12">
		        <div class="dash-item">
		          <div class="item-title">
		            List Wali
		          </div>


		          <div class="inner-item">

		          	<table id="attendenceDetailedTable" class="display responsive nowrap" cellspacing="0" width="100%">
						      <thead>
						        <tr>
						          <th scope="col">Nama</th>
						          <th scope="col">Last Updated</th>
						        </tr>
						      </thead>
						      <tbody>
						        <?php foreach ($dataWali as $wali): ?>
						          <tr>
						            <td data-label="Nama">
						              <a href="<?php echo base_url('wali/index/'.$wali->id) ?>"><?php echo $wali->nama ?></a>
						            </td>
						            <td data-label="Last Update" data-order="<?php echo $wali->updated ?>">
						              <?php
						                $date = strtotime($wali->updated);
						                echo date("d F y", $date);
						              ?>
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