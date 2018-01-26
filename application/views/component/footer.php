  </div>
</div>
<script src='<?php echo base_url('js/jquery-1.11.1.min.js') ?>'></script>
<script src='<?php echo base_url('js/bootstrap.min.js') ?>'></script>
<script src='<?php echo base_url('js/custom.js') ?>'></script>

<?php foreach ($page_info['js'] as $js): ?>
	<script src='<?php echo base_url('js/'.$js) ?>'></script>
<?php endforeach ?>

</body>

</html>