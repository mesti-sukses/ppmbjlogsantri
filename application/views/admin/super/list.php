<div class="main-content" id="content-wrapper">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12 clear-padding-xs">
				<h5 class="page-title"><i class="fa fa-book"></i>Data Seluruh Santri</h5>


				<div class="section-divider">
				</div>


				<div class="row">
					<div class="col-md-12">
						<div class="col-sm-8">
							<div class="dash-item">
								<div class="item-title">
									List Santri <a class="btn btn-success btn-xs pull-right" data-target="#modal-add" data-toggle="modal" style="color: white"><i class="fa fa-plus"></i> Tambah Santri</a>
								</div>


								<div class="inner-item">
									<table cellspacing="0" class="display responsive nowrap" id="attendenceDetailedTable" width="100%">
										<thead>
											<tr>
												<th scope="col">#</th>

												<th scope="col">NIS</th>

												<th scope="col">Nama</th>

												<th scope="col">Wali</th>

												<th scope="col">Pasus</th>

												<th scope="col">Action</th>

												<th scope="col">Alamat</th>

												<th scope="col">Angkatan</th>
											</tr>
										</thead>


										<tbody>
											<?php foreach ($santriData as $santri): ?>

											<tr>
												<td data-label="#"><input name="" type="checkbox">
												</td>

												<td data-label="NIS"><?php echo $santri->nis ?>
												</td>

												<td data-label="Nama"><?php echo $santri->nama ?>
												</td>

												<td data-label="Wali">
													<?php echo $santri->nama_wali ?>
												</td>

												<td data-label="Pasus" data-order="<?php echo $santri->nama_pasus ?>">
													<form action="<?php echo base_url('pasus/change/'.$santri->id) ?>" method="post">
														<select name="pasus">
															<option>
																Pasus
															</option><?php foreach ($dataPasusAll as $pasus): ?>

																<option value="<?php echo $pasus->id ?>" <?php if($pasus->id == $santri->pasus) echo 'selected' ?>>
																	<?php echo $pasus->nama ?>
																</option>

															<?php endforeach ?>
														</select> <button class="btn-success btn-xs btn" type="submit"><i class="fa fa-check"></i></button>
													</form>
												</td>

												<td>
													<a class="btn btn-success btn-xs btn-status" href="<?php echo base_url('user/list/'.$santri->id) ?>" style="color: white"><i class="fa fa-check"></i> Privilege</a> <a class="btn btn-danger btn-xs" href="<?php echo base_url('user/delete/'.$santri->id) ?>" style="color: white"><i class="fa fa-trash"></i>Delete</a>
												</td>

												<td data-label="Alamat"><?php echo $santri->alamat?>
												</td>

												<td data-label="Angkatan"><?php echo $santri->angkatan ?>
												</td>
											</tr>
											<?php endforeach ?>
										</tbody>
									</table>
								</div>
							</div>
						</div>

						<div class="col-sm-3">
							<div class="dash-item">
								<div class="item-title"><i class="fa fa-plus"></i>Tambah Santri</div>


								<div class="inner-item">
									<div class="dash-form">
										<?php 
											echo form_open();
										?>
											<div>
												<label>Nama Santri</label> <input class="form-control" name="nama" placeholder="Nama" required="" style="margin-bottom: 18px;" type="text">
											</div>
											<label class="container">Reguler <input class="status-check" name="reguler" type="checkbox"> <span class="checkmark"></span></label>

											<div>
												<label>Angkatan</label> <input class="form-control" name="angkatan" placeholder="Angkatan" required="" type="text">
											</div>
											<div>
												<button class="btn btn-success" style="margin-top: 24px" type="submit"><i class="fa fa-plus"></i> Tambah Santri</button>
											</div>
										<?php echo form_close() ?>
									</div>
								</div>
							</div>

							<div class="dash-item">
								<div class="item-title"><i class="fa fa-user"></i>Privilege Anggota</div>


								<div class="inner-item">
									<div class="dash-form">
										<?php 
											echo form_open();
											$k = isset($santriDataEdit);
											if($k)
												$level = intval($santriDataEdit->level);
											else
												$level = 0;
										?>
											<label class="container">Wali <input class="status-check" name="level[]" type="checkbox" value="1" <?php if(($level&1) == 1) echo "checked" ?>> <span class="checkmark"></span></label> 
											<label class="container">Santri Reguler <input class="status-check" name="level[]" type="checkbox" value="2" <?php if(($level&2) == 2) echo "checked" ?>> <span class="checkmark"></span></label> 
											<label class="container">Tim Jurnal <input class="status-check" name="level[]" type="checkbox" value="4" <?php if(($level&4) == 4) echo "checked" ?>> <span class="checkmark"></span></label> 
											<label class="container">Pasus <input class="status-check" name="level[]" type="checkbox" value="8" <?php if(($level&8) == 8) echo "checked" ?>> <span class="checkmark"></span></label> 
											<label class="container">Ketua Siswa <input class="status-check" name="level[]" type="checkbox" value="16" <?php if(($level&16) == 16) echo "checked" ?>> <span class="checkmark"></span></label> 
											<label class="container">Koordinator Ketercapaian <input class="status-check" name="level[]" type="checkbox" value="32" <?php if(($level&32) == 32) echo "checked" ?>> <span class="checkmark"></span></label> 
											<label class="container">Admin Web <input class="status-check" name="level[]" type="checkbox" value="64" <?php if(($level&64) == 64) echo "checked" ?>> <span class="checkmark"></span></label> 
											<label class="container">Ustadzah <input class="status-check" name="level[]" type="checkbox" value="128" <?php if(($level&128) == 128) echo "checked" ?>> <span class="checkmark"></span></label> 
											<label class="container">Wali Hadist <input class="status-check" name="level[]" type="checkbox" value="256" <?php if(($level&256) == 256) echo "checked" ?>> <span class="checkmark"></span></label> 
											<label class="container">Sekretaris FP <input class="status-check" name="level[]" type="checkbox" value="512" <?php if(($level&512) == 512) echo "checked" ?>> <span class="checkmark"></span></label>
											<label class="container">Saringan <input class="status-check" name="level[]" type="checkbox" value="1024" <?php if(($level&1024) == 1024) echo "checked" ?>> <span class="checkmark"></span></label>

											<div>
												<button class="btn btn-success" style="margin-top: 24px" type="submit"><i class="fa fa-floppy-o"></i> Save</button>
											</div>
										<?php echo form_close() ?>
									</div>
								</div>
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


			<form action="<?php echo base_url('user/add') ?>" method="post">
				<div class="modal-content">
					<div class="modal-header">
						<button class="close" data-dismiss="modal" type="button">&times;</button>

						<h4 class="modal-title">Tambah Santri Baru</h4>
					</div>


					<div class="modal-body">
						<div>
							<label>Nama Santri</label> <input class="form-control" name="nama" placeholder="Nama" required="" style="margin-bottom: 18px;" type="text">
						</div>
						<label class="container">Reguler <input class="status-check" name="reguler" type="checkbox"> <span class="checkmark"></span></label>

						<div>
							<label>Angkatan</label> <input class="form-control" name="angkatan" placeholder="Angkatan" required="" type="text">
						</div>
					</div>


					<div class="modal-footer">
						<button class="btn btn-default" data-dismiss="modal" type="button">Close</button> <button class="btn btn-success" type="submit"><i class="fa fa-floppy-o"></i> Save</button>
					</div>
				</div>
			</form>
		</div>
	</div>