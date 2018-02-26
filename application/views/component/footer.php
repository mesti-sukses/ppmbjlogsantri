				<div class="menu-togggle-btn">
					<a href="student-dashboard.html#menu-toggle" id="menu-toggle"><i class="fa fa-bars"></i></a>
				</div>
				<div class="dash-footer col-lg-12">
					<p class="text-center">Copyright PPM Baitul Jannah<br> Design by Logic Boys</p>
				</div>
			</div>
		</div>
	
		<!-- Scripts -->
    <script src="<?php echo base_url() ?>assets/js/jQuery_v3_2_0.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url() ?>js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/js.js"></script>

    <?php foreach ($page_info['js'] as $js): ?>
			<script src='<?php echo base_url('js/'.$js) ?>'></script>
		<?php endforeach ?>
		
    </body>
</html>