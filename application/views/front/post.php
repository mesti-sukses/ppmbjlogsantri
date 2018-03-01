		<div class="row page-title page-title-events">
			<div class="container">
				<h2>PROFESIONAL RELIGIUS</h2>
			</div>
		</div>
		<div class="row section-row evets-row">
			<div class="container">
				<div class="col-md-8 left-event-items">
					<div class="col-xs-12 event-single-wrapper">
						<h3><?php echo $postData->title ?></h3>
						<h5>
							<span><i class="fa fa-calendar"></i><?php
							      $date = strtotime($postData->updated);
							      echo date('d F y', $date);
							    ?></span>
							<span><i class="fa fa-tag"></i><?php echo $postData->name ?></span>
						</h5>
						<img class="featured-img" src="<?php echo base_url('images/Post/'.$postData->image) ?>" alt="event-single">
						<div class="section-divider"></div>
						<?php echo $postData->content ?>
					</div>
					<div class="clearfix"></div>
				</div>
				<?php $this->load->view('front/component/sidebar', $this->data) ?>
				<div class="clearfix"></div>
			</div>
		</div>