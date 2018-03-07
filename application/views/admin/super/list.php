<div class="main-content" id="content-wrapper">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12 clear-padding-xs">
        <h5 class="page-title"><i class="fa fa-book"></i>Data Seluruh Santri</h5>
      <div class="section-divider"></div>

			<div class="row">
				<div class="col-md-12">
		        <div class="dash-item">
		          <div class="item-title">
		            List Santri
		            <a data-toggle="modal" data-target="#modal-add" class="btn btn-success btn-xs pull-right"  style="color: white"><i class="fa fa-plus"></i> Tambah Santri</a>
		          </div>

		          <div class="inner-item">

		          	<table id="attendenceDetailedTable" class="display responsive nowrap" cellspacing="0" width="100%">
						      <thead>
						        <tr>
						        	<th scope="col">#</th>
						          <th scope="col">NIS</th>
						          <th scope="col">Nama</th>
						          <th scope="col">Alamat</th>
						          <th scope="col">Angkatan</th>
						          <th scope="col">Wali</th>
						          <th scope="col">Pasus</th>
						          <th scope="col">Action</th>
						        </tr>
						      </thead>
						      <tbody>
						        <?php foreach ($santriData as $santri): ?>
						          <tr>
						          	<td data-label="#">
						          		<input type="checkbox" name="">
						          	</td>
						            <td data-label="NIS">
						              <?php echo $santri->nis ?>
						            </td>
						            <td data-label="Nama"><?php echo $santri->nama ?></td>
						            <td data-label="Alamat"><?php echo $santri->alamat?></td>
						            <td data-label="Angkatan"><?php echo $santri->angkatan ?></td>
						            <td data-label="Wali" data-order="<?php echo $santri->nama_wali ?>">
						            	<form method="POST" action="<?php echo base_url('wali/change/'.$santri->id) ?>">
							            	<select name="wali">
							            		<option>No Wali</option>
							            		<?php foreach ($waliData as $wali): ?>
							            			<option value="<?php echo $wali->id ?>" <?php if($wali->nama == $santri->nama_wali) echo "selected" ?> >
							            				<?php echo $wali->nama ?>		
							            			</option>
							            		<?php endforeach ?>
							            	</select>
							            	<button type="submit" class="btn-success btn-xs btn"><i class="fa fa-check"></i></button>
						            	</form>
						            </td>
						            <td data-label="Pasus" data-order="<?php echo $santri->nama_pasus ?>">
						              <form method="POST" action="<?php echo base_url('pasus/change/'.$santri->id) ?>">
							            	<select name="pasus">
							            		<option>Pasus</option>
							            		<?php foreach ($dataPasusAll as $pasus): ?>
							            			<option value="<?php echo $pasus->id ?>" <?php if($pasus->nama == $santri->nama_pasus) echo "selected" ?> >
							            				<?php echo $pasus->nama ?>
							            			</option>
							            		<?php endforeach ?>
							            	</select>
							            	<button type="submit" class="btn-success btn-xs btn"><i class="fa fa-check"></i></button>
						            	</form>
						            </td>
						            <td>
						            	<a data-toggle="modal" data-target="#modal-status" class="btn btn-success btn-xs btn-status"  style="color: white" data-level="<?php echo $santri->level ?>" data-santri="<?php echo $santri->id ?>"><i class="fa fa-check"></i> Privilege</a>
						            	<a href="<?php echo base_url('user/delete/'.$santri->id) ?>" class="btn btn-danger btn-xs" style="color: white"><i class="fa fa-trash"></i>Delete</a>
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
<div id="modal-status" class="modal fade" role="dialog">
  <div class="modal-dialog">
  	<form method="POST" action="<?php echo base_url('user/status') ?>">
    <!-- Modal content-->
	    <div class="modal-content">
	    	<input type="hidden" name="id" id="id">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal">&times;</button>
	        <h4 class="modal-title">Priviledge Anggota</h4>
	      </div>
	      <div class="modal-body">
	        <div id="user-level">
	        	<label class="container">Wali
						  <input class="status-check" type="checkbox" name="wali" id="wali">
						  <span class="checkmark"></span>
						</label>
						<label class="container">Santri Reguler
	        		<input class="status-check" type="checkbox" name="reguler" id="reguler">
	        		<span class="checkmark"></span>
						</label>
	        	<label class="container">Tim Jurnal
	        		<input class="status-check" type="checkbox" name="jurnal" id="jurnal">
	        		<span class="checkmark"></span>
						</label>
	        	<label class="container">Pasus
	        		<input class="status-check" type="checkbox" name="pasus" id="pasus">
	        		<span class="checkmark"></span>
						</label>
	        	<label class="container">Ketua Siswa
	        		<input class="status-check" type="checkbox" name="kesiswaan" id="kesiswaan">
							<span class="checkmark"></span>
						</label>
	        	<label class="container">Koordinator Ketercapaian
	        		<input class="status-check" type="checkbox" name="koordinator" id="koordinator">
	        		<span class="checkmark"></span>
						</label>
	        	<label class="container">Admin Web
	        		<input class="status-check" type="checkbox" name="admin" id="admin">
	        		<span class="checkmark"></span>
						</label>
	        	<label class="container">Ustadzah
	        		<input class="status-check" type="checkbox" name="ustadzah" id="ustadzah">
	        		<span class="checkmark"></span>
						</label>
	        	<label class="container">Wali Hadist
	        		<input class="status-check" type="checkbox" name="hadist" id="hadist">
	        		<span class="checkmark"></span>
						</label>
	        	<label class="container">Santri Saringan
	        		<input class="status-check" type="checkbox" name="saringan" id="saringan">
	        		<span class="checkmark"></span>
						</label>
	        </div>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	        <button type="submit" class="btn btn-success"><i class="fa fa-floppy-o"></i> Save</button>
	      </div>
	    </div>
	  </form>
  </div>
</div>

<div id="modal-add" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <form action="<?php echo base_url('user/add') ?>" method="POST">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal">&times;</button>
	        <h4 class="modal-title">Tambah Santri Baru</h4>
	      </div>
	      <div class="modal-body">
          <div>
            <label>Nama Santri</label> <input class="form-control" placeholder="Nama" type="text" name="nama" style="margin-bottom: 18px;" required>
          </div>
          <label class="container">Reguler
					  <input class="status-check" type="checkbox" name="reguler">
					  <span class="checkmark"></span>
					</label>
          <div>
            <label>Angkatan</label> <input class="form-control" placeholder="Angkatan" type="text" name="angkatan" required>
          </div>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	        <button type="submit" class="btn btn-success"><i class="fa fa-floppy-o"></i> Save</button>
	      </div>
	    </div>
	   </form>

  </div>
</div>