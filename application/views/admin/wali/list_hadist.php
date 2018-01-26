<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header">List Santri</h1>
    </div>
  </div>

	<div class="row">
		<div class="col-md-12">
        <div class="panel panel-info">
          <div class="panel-heading">
            List Santri
          </div>


          <div class="panel-body">

          	<table id="list-santri">
				      <thead>
				        <tr>
				        	<th scope="col">#</th>
				          <th scope="col">Nama</th>
				          <th scope="col">Angkatan</th>
				          <th scope="col">Terisi</th>
				          <th scope="col">Kosong</th>
				          <th scope="col">Last Updated</th>
				        </tr>
				      </thead>
				      <tbody>
				        <?php foreach ($santriData as $santri): ?>
				          <tr>
				          	<td data-label="#">
				          		<input type="checkbox" name="">
				          	</td>
				            <td data-label="Nama">
				              <?php echo $santri->nama ?>
				            </td>
				            <td data-label="Angkatan">
				              <?php echo $santri->angkatan ?>
				            </td>
				            <td data-label="Terisi" data-order="<?php echo $santri->kosong ?>"><?php echo $santri->kosong." Hal" ?></td>
				            <td data-label="Kosong" data-order="<?php echo $santri->offset - $santri->kosong ?>"><?php echo $santri->offset - $santri->kosong." Hal" ?></td>
				            <td data-label="Last Update" data-order="<?php echo $santri->updated ?>">
				              <?php
				                $date = strtotime($santri->updated);
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