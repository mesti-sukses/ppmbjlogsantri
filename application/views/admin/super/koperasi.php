<div class="main-content" id="content-wrapper">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12 clear-padding-xs">
				<h5 class="page-title"><i class="fa fa-dollar"></i>Daftar Jaga Koperasi</h5>


				<div class="section-divider">
				</div>


				<div class="row">
					<div class="col-md-12">
						<div class="dash-item">
							<div class="item-title">
								Jadwal Jaga
							</div>

							<div class="inner-item">
								<?php if (isset($error)): ?>
									<div class="alert alert-danger"><?php echo $error ?></div>
								<?php endif ?>
								<table cellspacing="0" class="display responsive nowrap" id="attendenceDetailedTable" width="100%">
									<thead>
										<tr>
											<th scope="col">#</th>
											<?php foreach ($listHari as $hari): ?>
												<th scope="col"><?php echo $hari ?></th>
											<?php endforeach ?>
										</tr>
									</thead>

									<tbody>
										<?php 
											$currentDay = 0;
											$currentSession = 1;
											$currentNumber = 1;
											echo "<tr>";
											echo "<td>Sesi ".$currentSession."</td><td>";
											foreach ($koperasiData as $jadwal) {
												while($jadwal->hari != $listHari[$currentDay] || intval($jadwal->sesi) != $currentSession){
													echo "<a href='".base_url('user/koperasi/').$currentDay.'/'.$currentSession.'/'.$currentNumber."' class='btn btn-success btn-xs' style='margin-right:10px; color:white'><i class='fa fa-plus'></i></a></td><td>";
													$currentNumber = 1;
													$currentDay += 1;
													if($currentDay > 5){
														$currentDay = 0;
														$currentSession += 1;
														echo "</tr><tr><td>Sesi ".$currentSession."</td><td>";
													}
												}
												echo "<a class='btn btn-success btn-xs' style='margin-right:10px; color:white'>".$jadwal->nama."</a>";
												$currentNumber += 1;
											}
										?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>