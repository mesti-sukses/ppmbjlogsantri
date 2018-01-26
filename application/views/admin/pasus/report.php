<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header">Report Santri</h1>
    </div>
  </div>

	<div class="row">
		<?php foreach ($dataPasus as $santri): ?>
			<div class="col-md-3">
	        <div class="panel panel-<?php echo $santri->status ?>">
	          <div class="panel-heading">
	            <?php echo $santri->santri ?>
	            <span class="pull-right clickable panel-toggle"><em class="fa fa-toggle-up"></em></span>
	          </div>


	          <div class="panel-body collapse">
	          	<ul>
	              <li class="left clearfix" style="list-style: none;">
	              	<?php if ($santri->detail != NULL): ?>
		              	<?php foreach ($santri->detail as $key => $value): ?>
		              	
			                <div class="chat-body clearfix">
			                  <div class="header"><strong class="primary-font"><?php echo $key ?></strong></div>
			                  <p><?php echo $value ?></p>
			                </div>

		              	<?php endforeach ?>
	              	<?php endif ?>

	              	<div class="chat-body clearfix">
			              <div class="header"><strong class="primary-font">Keterangan</strong></div>
			              <p><?php echo $santri->ket ?></p>
			            </div>

			            <div class="chat-body clearfix">
			              <div class="header"><strong class="primary-font">Updated</strong></div>
			              <p><?php
			              	$date = strtotime($santri->updated);
				              echo date("d F y", $date);
			              ?></p>
			            </div>
	              </li>
	            </ul>
	          </div>
	        </div>
	      </div>		
		<?php endforeach ?>
   </div>
</div>