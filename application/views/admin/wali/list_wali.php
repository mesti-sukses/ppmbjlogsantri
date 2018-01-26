<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header">List Wali</h1>
    </div>
  </div>

	<div class="row">
		<div class="col-md-12">
        <div class="panel panel-info">
          <div class="panel-heading">
            List Wali
          </div>


          <div class="panel-body">

          	<table id="list-santri">
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