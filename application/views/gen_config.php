<main>
  <div class="pen-title">
    <h1>Generate Your Config</h1>
    <span>Design by Logic Boys</span>
  </div>
  <!-- Form Module-->


  <div class="module form-module">
    <div class="toggle">
      <i class="fa fa-user"></i>
    </div>


    <div class="form">
      <h2>Generate Config</h2>
      <?php echo form_open() ?>
        <input name="key_config[]" type="hidden" value="title"> 
        <input name="value[]" placeholder="Site Title" type="text"> 
        <input name="key_config[]" type="hidden" value="tagline"> 
        <input name="value[]" placeholder="Site Tagline" type="text"> 
        <input name="key_config[]" type="hidden" value="slogan"> 
        <input name="value[]" placeholder="Site Slogan" type="text"> 
        <input name="key_config[]" type="hidden" value="Alamat"> 
        <input name="value[]" placeholder="Alamat Instansi" type="text"> 
        <input name="key_config[]" type="hidden" value="telp"> 
        <input name="value[]" placeholder="Telepon Instansi" type="text"> 
        <input name="key_config[]" type="hidden" value="email"> 
        <input name="value[]" placeholder="Email Instansi" type="text"> 
        <input name="key_config[]" type="hidden" value="jam"> 
        <input name="value[]" placeholder="Jam Layanan Instansi" type="text"> 
        <input name="key_config[]" type="hidden" value="client_id"> 
        <input name="value[]" type="hidden" value="-">
        <input name="key_config[]" type="hidden" value="accessToken"> 
        <input name="value[]" type="hidden" value="-"> 
        <button type="submit">Generate</button> 
      <<?php echo form_close() ?>
    </div>
  </div>
</main>