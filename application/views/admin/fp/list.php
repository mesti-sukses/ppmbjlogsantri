<div class="main-content" id="content-wrapper">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12 clear-padding-xs">
				<h5 class="page-title"><i class="fa fa-clipboard"></i>Usulan Musyawarah</h5>


				<div class="section-divider">
				</div>


				<div class="row">
					<div class="col-md-12">
						<div class="dash-item">
							<div class="item-title">
								Usulan Musyawarah 
								<?php if ((intval($this->session->userdata('level')) & 512) == 512 ): ?>

									<a class="btn btn-success btn-xs pull-right" data-target="#modal-add" data-toggle="modal" style="color: white"><i class="fa fa-plus"></i> Tambah Usulan</a>
									
								<?php endif ?>
							</div>


							<div class="inner-item">
								<table cellspacing="0" class="display responsive nowrap" id="attendenceDetailedTable" width="100%">
									<thead>
										<tr>

											<th scope="col">Usulan</th>

											<th scope="col">Pengusul</th>

											<th scope="col">Terbahas</th>

											<th scope="col">Terlaksana</th>

											<th scope="col">Action</th>

											<th scope="col">Tanggal</th>
										</tr>
									</thead>


									<tbody>
										<?php foreach ($musyawarahData as $usulan): ?>

										<tr>

											<td data-label="Usulan"><?php echo $usulan->usulan ?>
											</td>

											<td data-label="Pengusul"><?php echo $usulan->nama ?>
											</td>

											<td data-label="Pengusul"><?php echo ($usulan->pembahasan != NULL) ? 'Terbahas' : 'Belum Terbahas' ?>
											</td>

											<td data-label="Pengusul"><?php echo ($usulan->terlaksana != 0) ? 'Terlaksana' : 'Belum Terlaksana' ?>
											</td>

											<td>
												<a class="btn btn-success btn-xs" href="<?php echo base_url('pengajar/view/'.$usulan->usulan_id) ?>" style="color:white"><i class="fa fa-eye"></i></a> 

												<?php if ((intval($this->session->userdata('level')) & 512) == 512 ): ?>

													<a class="btn btn-success btn-xs" href="<?php echo base_url('pengajar/edit/'.$usulan->usulan_id) ?>" style="color:white"><i class="fa fa-pencil"></i></a> 
													<a class="btn btn-danger btn-xs" href="#" style="color:white"><i class="fa fa-trash"></i></a>

												<?php endif ?>
											</td>

											<td data-label="Last Update" data-order="<?php echo $usulan->updated ?>">
												<?php
                          $date = strtotime($usulan->created);
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

	<div class="modal fade" id="modal-add" role="dialog">
		<div class="modal-dialog">
			<!-- Modal content-->


			<?php echo form_open() ?>
				<div class="modal-content">
					<div class="modal-header">
						<button class="close" data-dismiss="modal" type="button">&times;</button>

						<h4 class="modal-title">Usulan</h4>
					</div>


					<div class="modal-body">
						<div>
							<label>Usulan</label> <input class="form-control" name="usulan" placeholder="Usulan" required="" style="margin-bottom: 18px;" type="text">
						</div>

						<div>
							<select name="pengusul">
								<option>
									Pengusul
								</option><?php foreach ($dataFP as $FP): ?>

									<option value="<?php echo $FP->id ?>">
										<?php echo $FP->nama ?>
									</option>

								<?php endforeach ?>
							</select>
						</div>
					</div>


					<div class="modal-footer">
						<button class="btn btn-default" data-dismiss="modal" type="button">Close</button> <button class="btn btn-success" type="submit"><i class="fa fa-floppy-o"></i> Save</button>
					</div>
				</div>
			<?php echo form_close() ?>
		</div>
	</div>