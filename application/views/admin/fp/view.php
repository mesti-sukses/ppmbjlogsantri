<div class="main-content" id="content-wrapper">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12 clear-padding-xs">
				<h5 class="page-title"><i class="fa fa-book"></i><?php echo $dataUsulan->usulan ?></h5>


				<div class="section-divider">
				</div>


				<div class="row">
					<div class="col-md-3">
						<div class="dash-item">
							<div class="item-title">
								Status Usulan
							</div>


							<div class="inner-item">
								
								<strong>Pengusul</strong>
								<p><?php echo $dataUsulan->nama ?></p>

								<strong>Status</strong>
								<p>
									<?php 
										if($dataUsulan->pembahasan != NULL)
											{
												if($dataUsulan->terlaksana == 1)
												{
													echo 'Terlaksana';
												} else echo 'Belum Terlaksana';
											}
										else 
											echo 'Belum Terbahas';
									?>
								</p>

								<strong>Tanggal Usulan</strong>
								<p>
									<?php
                    $date = strtotime($dataUsulan->created);
                    echo date("d F y", $date);
                  ?>
								</p>

							</div>
						</div>
					</div>


					<div class="col-md-9">
						<div class="dash-item">
							<div class="item-title">
								Pembahasan
							</div>


							<div class="inner-item">
								<?php echo $dataUsulan->pembahasan ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>