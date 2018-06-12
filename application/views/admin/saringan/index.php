<div class="main-content" id="content-wrapper">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12 clear-padding-xs">
				<h5 class="page-title"><i class="fa fa-user"></i> Anggota Pasus</h5>


				<div class="section-divider">
				</div>


				<div class="row">
					<div class="col-lg-12 clear-padding-xs">
						<div class="col-sm-6">
							<div class="dash-item">
								<div class="item-title"><i class="fa fa-user"></i>Santri Pasca Saringan</div>

								<div class="inner-item">
									<table id="list-santri">
										<thead>
											<tr>
												<th scope="col">Nama</th>

												<th scope="col">Predikat</th>
											</tr>
										</thead>


										<tbody>
											<?php foreach ($dataFP as $santri): ?>

											<tr>
												<td data-label="Nama"><?php echo $santri->nama ?>
												</td>

												<td data-label="Alamat">
													<?php if ($santri->predikat == 1) echo "Lulus"; else echo "Tidak Lulus"; ?>
												</td>
											</tr>
											<?php endforeach ?>
										</tbody>
									</table>
								</div>
							</div>
						</div>

						<div class="col-sm-6">
							<?php echo form_open() ?>
								<div class="dash-item">
									<div class="item-title">
										<i class="fa fa-user"></i>Santri Saringan

										<button type="submit" class="pull-right btn-xs btn btn-primary submit"><i class="fa fa-gear"></i> Predict</button>
									</div>


									<div class="inner-item">
										<div class="item-header">
											<div class="col-xs-2">
												#
											</div>
											<div class="col-xs-6">
												<h6>Nama</h6>
											</div>


											<div class="col-xs-4">
												<h6>Prediksi Predikat</h6>
											</div>


											<div class="clearfix">
											</div>
										</div>
										<?php foreach ($dataSaringan as $saringan): ?>

										<div class="tbl-row">
											<div class="col-xs-2">
												<label class="container"><input name="check[]" type="checkbox" value="<?php echo $saringan->santri_id ?>"> <span class="checkmark"></span></label>
											</div>
											<div class="col-xs-6">
												<h6><?php echo $saringan->nama; ?>
												</h6>
											</div>


											<div class="col-xs-4">
												<?php if (isset($saringan->predikat)): 
													$k = $saringan->predikat;
												?>
													<span class="label label-<?php if($k) echo "success"; else echo "danger" ?>"><?php if($k) echo "Lulus"; else echo "Tidak Lulus" ?></span>

												<?php endif ?>
											</div>

											<div class="clearfix">
											</div>
										</div>
										<?php endforeach ?>

										<div class="clearfix">
										</div>
									</div>


									<div class="clearfix">
									</div>
								</div>
							<?php echo form_close() ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Modal -->