<main class="main-content container">
  <div class="row">
    <?php echo form_open_multipart('', array('class' => 'form-horizontal form-label-left')) ?>
      <div class="page-header">
        <h1>Target Angkatan</h1>
      </div>

      <div class="input-group">

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
    <?php echo form_close() ?>
  </div>

  <div class="row">
    <div class="col-md-6">
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

    <div class="col-md-6">
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
              <td data-label="Kosong"><?php echo ($admin->level == 0) ? "Admin" : "User" ?></td>
            </tr>
          <?php endforeach ?>
        </tbody>
      </table>
    </div>
  </div>
</main>