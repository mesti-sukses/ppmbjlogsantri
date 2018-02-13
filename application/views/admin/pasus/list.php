<div class="main-content" id="content-wrapper">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12 clear-padding-xs">
        <h5 class="page-title"><i class="fa fa-user"></i> Anggota Pasus</h5>
      <div class="section-divider"></div>

			<div class="row">
				<div class="col-md-12">
		        <div class="dash-item">
		          <div class="item-title">
		            List Santri
					      <a data-toggle="modal" data-target="#modal-add" class="btn btn-success pull-right btn-xs"><i class="fa fa-plus"></i> Anggota</a>
		          </div>


		          <div class="inner-item">

		          	<table id="list-santri">
						      <thead>
						        <tr>
						          <th scope="col">NIS</th>
						          <th scope="col">Nama</th>
						          <th scope="col">Alamat</th>
						          <th scope="col">Angkatan</th>
						          <th scope="col">Action</th>
						        </tr>
						      </thead>
						      <tbody>
						        <?php foreach ($dataPasus as $santri): ?>
						          <tr>
						            <td data-label="NIS">
						            	<?php echo $santri->nis ?>
						            </td>
						            <td data-label="Nama" ?><?php echo $santri->santri ?></td>
						            <td data-label="Alamat"><?php echo $santri->alamat ?></td>
						            <td data-label="Angkatan"><?php echo $santri->angkatan ?></td>
						            <td>

						            	<?php
						            		$date = strtotime($santri->updated);
						            		$now = date('W');
						                $curr = date("W", $date);

						                $disabled = ($now == $curr) ? "disabled" : "";
						            	?>

						            	<a href="<?php echo base_url('pasus/edit/'.$santri->id) ?>" class="btn btn-default btn-sm <?php echo $disabled ?>">
						            		<i class="fa fa-pencil"></i> Edit
						            	</a>

						            	<a href="" class="btn btn-danger btn-sm">
						            		<i class="fa fa-trash"> Delete</i>
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



<!-- Modal -->
<div id="modal-add" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <?php echo form_open('pasus/add') ?>
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal">&times;</button>
	        <h4 class="modal-title">Tambah Anggota Pasus</h4>
	      </div>
	      <div class="modal-body">
	        <input type="text" name="nama" placeholder="Masukkan Nama" class="form-control">
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	        <button type="submit" class="btn btn-success"><i class="fa fa-floppy-o"></i> Save</button>
	      </div>
	    </div>
	   <?php echo form_close() ?>

  </div>
</div>