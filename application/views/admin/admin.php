<main class="main-content container">
  <div class="page-header" style="display: block; width: 100%">
    <h1>Superuser Menu</h1>
  </div>
  <?php echo form_open_multipart('', array('class' => 'form-horizontal form-label-left')) ?>

  <div class="col-md-6">
    <div class="panel panel-default">

      <div class="panel-heading clean">
        Angkatan
      </div>

      <div class="panel-body">
        <div class="input-group" style="margin-bottom: 24px">

          <div class="input-group-addon">
            <select name="id">
              <option value="1">2015</option>
              <option value="2">2016</option>
              <option value="3">2017</option>
            </select>
          </div>

          <input type="text" name="target" class="form-control">

          <div class="input-group-btn">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </div>

        <table>
            <thead>
              <tr>
                <th scope="col">Angkatan</th>
                <th scope="col">Target</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($angkatanList as $angkatan): ?>
                <tr>
                  <td data-label="Angkatan">
                    <?php echo $angkatan->angkatan ?>
                  </td>
                  <td data-label="Target"><?php echo $angkatan->target." Halaman" ?></td>
                </tr>
              <?php endforeach ?>
            </tbody>
          </table>
      </div>
    </div>
  </div>
  <?php echo form_close() ?>
  <div class="col-md-6">
    <div class="panel panel-default">

      <div class="panel-heading clean">
        Wali
      </div>

      <div class="panel-body">
        <table>
          <thead>
            <tr>
              <th scope="col">Username</th>
              <th scope="col">Level</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($adminList as $admin): ?>
              <tr>
                <td data-label="Nama">
                  <?php echo $admin->name ?>
                </td>
                <td data-label="Action"><?php echo ($admin->level == 0) ? "Admin" : "User" ?></td>
              </tr>
            <?php endforeach ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</main>