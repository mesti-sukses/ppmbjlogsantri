  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <!-- <script src="<?php echo base_url('js/jquery.min.js') ?>"></script> -->
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->

  <script src="http://code.jquery.com/jquery-migrate-1.4.1.js"></script>
  
  <!-- Bootstrap JS -->
  <script src="<?php echo base_url('js/bootstrap.min.js') ?>">
  </script>

  <?php 
    $js_list = $page_info['js'];
    foreach ($js_list as $value): 
  ?>
  	<script src="<?php echo base_url('js/'.$value) ?>">
  </script>
  <?php endforeach ?>

  <!-- Navigation Loader -->
  <script src="<?php echo base_url('js/nav-loader.js') ?>" type="text/javascript">
  </script>
</body>
</html>