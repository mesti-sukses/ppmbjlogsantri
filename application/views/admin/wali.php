  <main class="main-content container">
    <div class="page-header">
      <h1><?php echo $this->session->userdata('name') ?></a> <small class="roboto-light">List Wali</small></h1>
      <?php if ($this->session->userdata('level') != 0): ?>
        <?php exit(); ?>
      <?php endif ?>
    </div>
    <table id="list-wali">
      <thead>
        <tr>
          <th scope="col">Nama</th>
          <th scope="col">Last Login</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($dataWali as $wali): ?>
          <tr>
            <td data-label="Nama">
              <?php echo $wali->name ?>
            </td>
            <td data-label="Last Update">
              <?php
                $date = strtotime($wali->last);
                echo date("d F y", $date);
              ?>
            </td>
            <td data-label="Action">
              <a href="<?php echo base_url('santri/delete/'.$wali->id) ?>" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</a>
            </td>
          </tr>
        <?php endforeach ?>
      </tbody>
    </table>
  </main>
  <div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <?php echo form_open() ?>
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Tambah wali</h4>
          </div>
          <div class="modal-body">
            <input type="text" name="name" class="form-control" placeholder="Nama wali">
            <input type="text" name="angkatan" class="form-control" placeholder="Angkatan">
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Add</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        <?php echo form_close() ?>
      </div>
    </div>
  </div>