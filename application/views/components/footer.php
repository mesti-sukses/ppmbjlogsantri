  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="<?php echo base_url('js/jquery.min.js') ?>"></script><!-- Include all compiled plugins (below), or include individual files as needed -->
  
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