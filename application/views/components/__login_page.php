<main>
  <!-- <h1 class="roboto-slab">Wali Bacaan PPM BJ</h1>
  <?php echo form_open(); ?>
    <input type="text" class="form-control" name="user" placeholder="Username">
    <input type="password" class="form-control" name="password" placeholder="Password">
    <button class="btn btn-primary pull-right" type="submit">Login</button>
  <?php echo form_close() ?> -->
  <hgroup>
    <h1>Wali Bacaan PPM BJ</h1>
    <h3>By Logic Boys</h3>
  </hgroup>
  <?php echo form_open() ?>
    <div class="group">
      <input type="text" name="user"><span class="highlight"></span><span class="bar"></span>
      <label>Username</label>
    </div>
    <div class="group">
      <input type="password" name="password"><span class="highlight"></span><span class="bar"></span>
      <label>Password</label>
    </div>
    <button type="submit" class="button buttonBlue">Login
    <div class="ripples buttonRipples"><span class="ripplesCircle"></span></div>
    </button>
  <?php echo form_close() ?>
</main>