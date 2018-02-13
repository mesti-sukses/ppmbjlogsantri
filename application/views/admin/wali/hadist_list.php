<div class="main-content" id="content-wrapper">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12 clear-padding-xs">
        <h5 class="page-title"><i class="fa fa-book"></i>List Hadist</h5>
      <div class="section-divider"></div>

	<div class="row">
		<div class="col-md-12">
        <div class="dash-item">
          <div class="item-title">
            List Hadist
            <a data-toggle="modal" data-target="#modal-add" class="btn btn-primary pull-right btn-xs"><i class="fa fa-plus"></i> Add Hadist</a>
          </div>


          <div class="inner-item">

          	<table id="attendenceDetailedTable" class="display responsive nowrap" cellspacing="0" width="100%">
				      <thead>
				        <tr>
				          <th scope="col">Nama</th>
				          <th scope="col">Halaman</th>
				        </tr>
				      </thead>
				      <tbody>
				        <?php foreach ($dataHadist as $hadist): ?>
				          <tr>
				            <td data-label="Nama">
				              <?php echo $hadist->nama ?>
				            </td>
				            <td data-label="Halaman" data-order="<?php echo $hadist->offset ?>">
				              <?php
				                echo $hadist->offset." Hal"
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

<div id="modal-add" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <?php echo form_open() ?>
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal">&times;</button>
	        <h4 class="modal-title">Tambah Hadist</h4>
	      </div>
	      <div class="modal-body">
	        <input type="text" name="nama" placeholder="Masukkan Nama" style="margin-bottom:24px" class="form-control">
	        <input type="text" name="offset" placeholder="Masukkan Halaman" class="form-control">
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	        <button type="submit" class="btn btn-success"><i class="fa fa-floppy-o"></i> Save</button>
	      </div>
	    </div>
	   <?php echo form_close() ?>

  </div>
</div>