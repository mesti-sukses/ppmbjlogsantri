<div class="main-content" id="content-wrapper">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12 clear-padding-xs">
				<h5 class="page-title"><i class="fa fa-book"></i>Ketercapaian Quran Santri</h5>


				<div class="section-divider">
				</div>


				<div class="row">
					<div class="col-md-12">
						<div class="dash-item">
							<div class="item-title">
								List Santri
							</div>


							<div class="inner-item">
								<table cellspacing="0" class="display responsive nowrap" id="attendenceDetailedTable" width="100%">
									<thead>
										<tr>
											<th scope="col">#</th>

											<th scope="col">Nama</th>

											<th scope="col">Terisi</th>

											<th scope="col">Kosong</th>

											<th scope="col">Angkatan</th>

											<th scope="col">Wali</th>

											<th scope="col">Last Updated</th>
										</tr>
									</thead>


									<tbody>
										<?php foreach ($santriData as $santri): ?>

										<tr>
											<td data-label="#"><input name="" type="checkbox">
											</td>

											<td data-label="Nama">
												<a href="<?php echo base_url('santri/quran/'.$santri->id) ?>"><?php echo $santri->santri ?></a>
											</td>

											<td data-label="Terisi" data-order="<?php echo $santri->kosong ?>"><?php echo $santri->kosong." Hal" ?>
											</td>

											<td data-label="Kosong" data-order="<?php echo $santri->target - $santri->kosong ?>"><?php echo $santri->target - $santri->kosong." Hal" ?>
											</td>

											<td data-label="Angkatan"><?php echo $santri->angkatan ?>
											</td>

											<td data-label="Wali" data-order="<?php echo $santri->wali ?>">
												<?php if (($this->session->userdata('level') & 32) == 32): ?>

												<form action="<?php echo base_url('wali/change/'.$santri->id) ?>" method="post">
													<select name="wali">
														<option>
															No Wali
														</option><?php foreach ($waliData as $wali): ?>

														<option value="<?php echo $wali->id ?>" <?php if($wali->id == $santri->id_wali) echo 'selected' ?>>
															<?php echo $wali->nama ?>
														</option><?php endforeach ?>
													</select> <button class="btn-success btn-xs btn" type="submit"><i class="fa fa-check"></i></button>
												</form>
												<?php else : ?><?php echo $santri->wali ?><?php endif ?>
											</td>

											<td data-label="Last Update" data-order="<?php echo $santri->updated ?>">
												<?php
                          $date = strtotime($santri->updated);
                          echo date("d F y", $date);
                        ?>
											</td>
										</tr>
										<?php endforeach ?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>