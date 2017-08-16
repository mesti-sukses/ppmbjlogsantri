<main class="main-content container">
  <div class="row">
    <?php echo form_open_multipart('', array('class' => 'form-horizontal form-label-left')) ?>
      <div class="page-header">
        <h1>User Setting</h1>
      </div>

      <input type="text" name="user" value="<?php echo $this->session->userdata('name') ?>" class="form-control">
      <input type="text" name="password" class="form-control" placeholder="Password">
      <button class="btn btn-primary">Save</button>
    <?php echo form_close() ?>
  </div>
</main>