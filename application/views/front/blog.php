<!-- Page Title Section -->
		<div class="row page-title page-title-events">
			<div class="container">
				<h2><?php echo $this->data['tagline']->value ?></h2>
			</div>
		</div>
		
		<!-- Events Section -->
		<div class="row section-row evets-row">
			<div class="container">
				<div class="col-md-8 left-event-items">
					<?php foreach ($postData as $post): ?>
						<div class="event-item">
							<div class="col-sm-7">
								<div class="event-date">
									<?php
							      $date = strtotime($post->updated);
							    ?>
									<p><span><?php echo date('d', $date) ?></span> <?php echo date('F', $date) ?></p>
								</div>
								<h3><?php echo $post->title ?></h3>
								<h6><i class="fa fa-tag"></i><?php echo $post->name ?></h6>
								<p><?php echo limit_to_numwords(strip_tags($post->content), 15).'...' ?></p>
							</div>
							<div class="col-sm-5 event-item-img">
								<div class="event-img">
									<img src="<?php echo base_url('images/Post/'.$post->image) ?>" alt="event" />
									<div class="event-detail-link">
										<a href="<?php echo base_url('blog/post/'.$post->id) ?>">VIEW DETAILS</a>
									</div>
								</div>
							</div>
							<div class="clearfix"></div>
						</div>
					<?php endforeach ?>
					<div class="event-control-box">
						<div class="pull-left">
							<a href="events.html#">
								<i class="fa fa-arrow-left"></i>
								PREVIOUS
							</a>
						</div>
						<div class="pull-right">
							<a href="events.html#">
								NEXT
								<i class="fa fa-arrow-right"></i>
							</a>
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
				<?php $this->load->view('front/component/sidebar', $this->data) ?>
				<div class="clearfix"></div>
			</div>
		</div>