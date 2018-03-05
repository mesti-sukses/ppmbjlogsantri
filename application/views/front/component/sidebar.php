				<div class="col-md-4 right-event-items">
					<div class="event-item">
						<img src="<?php if($stickyData != NULL) echo base_url('images/Post/'.$stickyData->image) ?>" alt="event" />
					</div>
					<div class="featured-event">
						<div class="event-date">
              <?php
                if($stickyData != NULL) $date = strtotime($stickyData->updated);
              ?>
              <p><span><?php if($stickyData != NULL) echo date('d', $date) ?></span> <?php if($stickyData != NULL) echo date('F', $date) ?></p>
            </div>
						<h3><?php if($stickyData != NULL) echo $stickyData->title ?></h3>
						<h6><i class="fa fa-tag"></i><?php if($stickyData != NULL) echo $stickyData->name ?></h6>
						<p><?php if($stickyData != NULL) echo limit_to_numwords($stickyData->content, 25).'...' ?></p>
						<a href="<?php if($stickyData != NULL) echo base_url('blog/post/'.$stickyData->id) ?>"><i class="fa fa-paper-plane"></i> KNOW MORE</a>
					</div>
					<div class="event-item categories-list">
						<div class="sidebar-box">
							<h5><i class="fa fa-list"></i>CATEGORIES</h5>
							<div class="inner-content-box">
								<ul class="list-group">
									<?php foreach ($catData as $cat): ?>
										<li class="list-group-item"><a href="<?php echo base_url('blog/category/'.$cat->cat_id) ?>"><?php echo $cat->name ?></a><span class="badge">12</span></li>
									<?php endforeach ?>
								</ul>
							</div>
						</div>
					</div>
				</div>