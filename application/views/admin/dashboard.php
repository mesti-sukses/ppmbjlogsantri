  <main class="main-content container">
    <div class="page-header">
      <h1><?php echo $this->session->userdata('name') ?></a> <small class="roboto-light">List Santri</small></h1>
      <?php if ($this->session->userdata('level') == 0): ?>
        <a href="<?php echo base_url('user/save') ?>" class="btn btn-primary pull-right save" style="margin-top: 20px"><i class="fa fa-save"></i>Save Record</a>
      <?php endif ?>
    </div>
    <table>
      <thead>
        <tr>
          <th scope="col">Nama</th>
          <th scope="col">Terisi</th>
          <th scope="col">Kosong</th>
          <th scope="col">Angkatan</th>
          <?php
            if($this->session->userdata('level') == 0)
              echo '<th scope="col">Wali</th>';
          ?>
          <th scope="col">Presentase (%)</th>
          <th scope="col">Last Updated</th>
          <?php
            if($this->session->userdata('level') == 1)
              echo '<th scope="col">Action</th>';
          ?>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($dataSantri as $santri): ?>
          <tr>
            <?php
              $target = 0;
              foreach($dataAngkatan as $angkatan){
                if($angkatan->angkatan == $santri->angkatan) $target = $angkatan->target;
              }
              $kosong = $santri->kosong;
              $precentage = intval((($kosong)/$target)*100);
            ?>
            <td data-label="Nama">
              <input type="checkbox" name=""><a href="<?php echo base_url('santri/edit/'.$santri->id) ?>"><?php echo $santri->name ?></a>
            </td>
            <td data-label="Terisi"><?php echo $santri->kosong." Hal" ?></td>
            <td class="kosong" data-id="<?php echo $santri->id ?>" data-kosong="<?php echo $target-$santri->kosong ?>" data-label="Kosong"><?php echo $target - $santri->kosong." Hal" ?></td>
            <td data-label="Angkatan"><?php echo $santri->angkatan ?></td>
            <?php
              if($this->session->userdata('level') == 0)
                echo '<td data-label="Wali">'.$santri->nama_wali.'</td>';
            ?>
            <td class="presentasi" data-label="Presentase">
              <?php
                echo $precentage." %"
              ?>
              <span class="inlinebar"><?php
              foreach ($progress[$santri->id] as $value) {
                echo $value->precentage.', ';
              }
              ?></span>
            </td>
            <td data-label="Last Update">
              <?php
                $date = strtotime($santri->modified);
                echo date("d F y", $date);
              ?>
            </td>
            <?php if ($this->session->userdata('level') == 1): ?>
              <td data-label="Action">
                <a href="<?php echo base_url('santri/delete/'.$santri->id) ?>" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</a>
              </td>
            <?php endif ?>
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
            <h4 class="modal-title">Tambah Santri</h4>
          </div>
          <div class="modal-body">
            <input type="text" name="name" class="form-control" placeholder="Nama Santri">
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