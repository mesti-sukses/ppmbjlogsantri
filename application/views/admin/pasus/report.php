<div class="main-content" id="content-wrapper">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12 clear-padding-xs">
        <h5 class="page-title"><i class="fa fa-book"></i>Report Santri</h5>
	      <div class="section-divider"></div>

				<div class="row">
					<div id="pathshalaAccordion" class="pathshala-accordion">
					<?php foreach ($dataPasus as $santri): ?>
						<h4 class="accordion-header"><i class="fa fa-user-o"></i><?php echo $santri->santri ?></h4>
						<div class="accordion-inner">
							<div class="container">
								<div class="row">
									<?php if ($santri->detail != NULL): ?>
										<?php foreach ($santri->detail as $key => $value): ?>
				              <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6 clear-padding">
				                <span><strong><?php echo $key ?></strong></span>
				                <p><?php echo $value ?></p>
				              </div>
				            <?php endforeach; ?>
				          <?php endif; ?>
				         </div>
				         <div class="row">
				         	<div class="col-md-10 col-xs-12 clear-padding">
					         	<span><strong>Keterangan</strong></span>
					         	<p><?php echo $santri->ket ?></p>
					        </div>
					        <div class="col-md-2 col-xs-12 clear-padding">
					         	<span><strong>Last Update</strong></span>
					         	<p>
					         		<?php
					              	$date = strtotime($santri->updated);
						              echo date("d F y", $date);
					              ?>
					         	</p>
					        </div>
				         </div>
	            </div>
	          </div>
					<?php endforeach ?>
	        </div>
	      </div>
			</div>
		</div>
	</div>