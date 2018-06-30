<div class="main-content" id="content-wrapper">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12 clear-padding-xs">
				<h5 class="page-title"><i class="fa fa-clipboard"></i>List Tafsir</h5>


				<div class="section-divider">
				</div>


				<div class="row">
					<div class="col-md-12">
						<div class="dash-item">
							<div class="item-title">
								Tafsir
								<?php if ((intval($this->session->userdata('level')) & 512) == 512 ): ?>

									<a class="btn btn-success btn-xs pull-right" href="<?php echo base_url('quran/edit') ?>" style="color: white"><i class="fa fa-plus"></i> Tambah Tafsir</a>
									
								<?php endif ?>
							</div>


							<div class="inner-item">
								<table cellspacing="0" class="display responsive nowrap" id="attendenceDetailedTable" width="100%">
									<thead>
										<tr>

											<th scope="col">Surat</th>

											<th scope="col">Halaman</th>

											<th scope="col">Ayat</th>

											<th scope="col">Tag</th>

											<th scope="col">Action</th>

										</tr>
									</thead>


									<tbody>
										<?php foreach ($tafsirQuran as $tafsir): ?>

										<tr>

											<td data-label="Usulan"><?php echo $tafsir->nama ?>
											</td>

											<td><?php echo $tafsir->halaman ?></td>

											<td data-label="Pengusul"><?php echo $tafsir->ayat ?>
											</td>

											<td data-label="Pengusul"><?php echo ($tafsir->tag) ?>
											</td>

											<td>
												<a href="<?php echo base_url('quran/ayat/'.$tafsir->id_tafsir) ?>" class="btn btn-primary" style="color: white"><i class="fa fa-eye"></i>View</a>
												<a href="<?php echo base_url('quran/edit/'.$tafsir->id_tafsir) ?>" class="btn btn-primary" style="color: white"><i class="fa fa-pencil"></i>Edit</a>
						    					<a href="<?php echo base_url('quran/delete/'.$tafsir->id_tafsir) ?>" class="btn btn-danger" style="color: white"><i class="fa fa-trash"></i>Delete</a>
											</td>

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