<div class="main-content" id="content-wrapper">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12 clear-padding-xs">
				<h5 class="page-title"><i class="fa fa-book"></i>Report Santri</h5>


				<div class="section-divider">
				</div>


				<div class="row">
					<script>
						window.onload = function () {
							var data = <?php echo json_encode($graph) ?>;
							var point = [];

							var chart = new CanvasJS.Chart("chartContainer", {
								animationEnabled: true,
								title: {
									text: "Grafik Penilaian Santri"
								},
								subtitles: [{
									text: "By Logic Boys",
									fontSize: 12,
									margin: 20
								}],
								axisY: {
									title: "Nilai",
									maximum: 100
								},
								axisX:{
									interval: 1,
									fontSize: 10
								},
								data: [
									{
										type: "bar",
										dataPoints: point
									},
								]
							});
							chart.render();

							$('.chart-update').on('click', function(){
								var id = $(this).attr('id');
								point = data[id];
								// alert("Grafik Penilaian " + id);
								chart.options.title.text = "Grafik Penilaian " + id;
								chart.options.data[0].dataPoints = point;
								chart.render();
							});
						 
						}
					</script>
					<div class="col-sm-9">
						<div id="chartContainer" style="height: 370px; width: 100%;"></div>
					</div>

					<div class="col-sm-3">
						<div class="btn-group-vertical" style="margin-bottom: 30px; text-align: center;">
							<?php foreach ($graph as $key => $value): ?>
								<a class="chart-update btn btn-primary" id="<?php echo $key ?>"><?php echo $key ?></a>
							<?php endforeach ?>
						</div>
					</div>
					<!-- <div class="pathshala-accordion" id="pathshalaAccordion">
						<?php foreach ($dataPasus as $santri): ?>

						<h4 class="accordion-header"><i class="fa fa-user-o"></i><?php echo $santri->santri ?>
						</h4>


						<div class="accordion-inner">
							<div class="container">
								<div class="row">
									<?php if ($santri->detail != NULL): ?><?php foreach ($santri->detail as $key => $value): ?>

									<div class="col-lg-2 col-md-3 col-sm-4 col-xs-6 clear-padding">
										<span><strong><?php echo $key ?></strong></span>

										<p><?php echo $value ?>
										</p>
									</div>
									<?php endforeach; ?><?php endif; ?>
								</div>


								<div class="row">
									<div class="col-md-10 col-xs-12 clear-padding">
										<span><strong>Keterangan</strong></span>

										<p><?php echo $santri->ket ?>
										</p>
									</div>


									<div class="col-md-2 col-xs-12 clear-padding">
										<span><strong>Last Update</strong></span>

										<p><?php
											$date = strtotime($santri->updated);
										  echo date("d F y", $date);
										?>
										</p>
									</div>
								</div>
							</div>
						</div>
						<?php endforeach ?>
					</div> -->
				</div>
			</div>
		</div>
	</div>