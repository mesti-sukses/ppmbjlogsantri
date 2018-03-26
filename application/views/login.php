<main>
  <div class="pen-title">
    <h1>Sistem Informasi Baitul Jannah</h1>
    <span>Design by Logic Boys</span>
  </div>
  <!-- Form Module-->


  <div class="module form-module">
    <div class="toggle">
      <i class="fa fa-user"></i>
    </div>


    <div class="form">
      <?php if($this->session->flashdata('error') != NULL): ?>

      <div class="alert alert-danger">
        <i class="fa fa-exclamation-triangle"></i> Password salah
      </div>
      <?php endif; ?>

      <h2>Login</h2>
      <?php echo form_open() ?><input name="user" placeholder="Username" type="text"> <input name="pass" placeholder="Password" type="password"> <button type="submit">Login</button> 
    </div>
  </div>
</main>