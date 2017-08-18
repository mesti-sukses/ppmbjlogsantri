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
</main>