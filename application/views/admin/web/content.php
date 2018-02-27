<div class="main-content" id="content-wrapper">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12 clear-padding-xs">
							<h5 class="page-title"><i class="fa fa-list"></i>Special Content</h5>
							<div class="section-divider"></div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-12 clear-padding-xs">
							<div class="col-sm-4">
								<div class="dash-item first-dash-item">
									<h6 class="item-title"><i class="fa fa-user"></i>Ketua Pondok</h6>
									<div class="inner-item">
										<div class="dash-form">
											<?php echo form_open('',array('id' => 'editor')) ?>
												<button type="submit" class="btn btn-success btn-xs pull-right btn-editor">Save</button>
												<label class="clear-top-margin"><i class="fa fa-i-cursor"></i>Nama</label>
												<input type="text" placeholder="Nama Ketua Pondok" name="nama" value="<?php echo $ketuaData->nama ?>" />
												<label class="clear-top-margin"><i class="fa fa-link"></i>Link</label>
												<input type="text" placeholder="Link" name="extra" value="<?php echo $ketuaData->extra ?>" />
												<label class="clear-top-margin"><i class="fa fa-user"></i>Tentang</label>
												<div id="div-editor">
													<?php echo $ketuaData->content ?>
												</div>
												<textarea name="content" style="display: none;" id="text-editor"></textarea>
												<input type="hidden" name="location" value="ketua">
											</form>
										</div>
										<div class="clearfix"></div>
									</div>
									<div class="clearfix"></div>
								</div>
							</div>
							<div class="col-sm-4">
								<div class="dash-item first-dash-item">
									<h6 class="item-title"><i class="fa fa-graduation-cap"></i>Dewan Guru</h6>
									<div class="inner-item">
										<div class="item-header">
											<div class="col-xs-3">
												<h6>Nama</h6>
											</div>
											<div class="col-xs-6">
												<h6>Deskripsi</h6>
											</div>
											<div class="col-xs-3">
												<h6>Action</h6>
											</div>
											<div class="clearfix"></div>
										</div>
										<?php foreach ($dewanGuruData as $guru): ?>
											<div class="tbl-row">
												<div class="col-xs-3">
													<h6><?php echo $guru->nama; ?></h6>
												</div>
												<div class="col-xs-6">
													<h6><?php echo $guru->content ?></h6>
												</div>
												<div class="col-xs-3">
													<a class="btn btn-danger btn-xs" href="<?php echo base_url('admin/delContent/'.$guru->id) ?>" title="Delete"><i class="fa fa-trash"></i></a>
												</div>
											<div class="clearfix"></div>
											</div>
										<?php endforeach ?>
										<div class="clearfix"></div>
									</div>
									<div class="clearfix"></div>
								</div>
							</div>
							<div class="col-sm-4">
								<div class="dash-item first-dash-item">
									<h6 class="item-title"><i class="fa fa-graduation-cap"></i>Dewan Guru</h6>
									<div class="inner-item">
										<div class="item-header">
											<div class="col-xs-3">
												<h6>Nama</h6>
											</div>
											<div class="col-xs-6">
												<h6>Deskripsi</h6>
											</div>
											<div class="col-xs-3">
												<h6>Action</h6>
											</div>
											<div class="clearfix"></div>
										</div>
										<?php foreach ($testimoniData as $testimoni): ?>
											<div class="tbl-row">
												<div class="col-xs-3">
													<h6><?php echo $testimoni->nama; ?></h6>
												</div>
												<div class="col-xs-6">
													<h6><?php echo $testimoni->content ?></h6>
												</div>
												<div class="col-xs-3">
													<a class="btn btn-danger btn-xs" href="<?php echo base_url('admin/delContent/'.$guru->id) ?>" title="Delete"><i class="fa fa-trash"></i></a>
												</div>
											<div class="clearfix"></div>
											</div>
										<?php endforeach ?>
										<div class="clearfix"></div>
									</div>
									<div class="clearfix"></div>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-12 clear-padding-xs">
							<div class="col-sm-4">
							</div>
							<div class="col-sm-4">
								<div class="dash-item first-dash-item">
									<h6 class="item-title"><i class="fa fa-plus"></i>Tambahkan Dewan Guru</h6>
									<div class="inner-item">
										<div class="dash-form">
											<?php echo form_open() ?>
												<button type="submit" class="btn btn-success btn-xs pull-right">Save</button>
												<label class="clear-top-margin"><i class="fa fa-i-cursor"></i>Nama</label>
												<input type="text" placeholder="Nama Dewan Guru" name="nama" />
												<label class="clear-top-margin"><i class="fa fa-university"></i>Sub</label>
												<input type="text" placeholder="Sub" name="extra" />
												<label class="clear-top-margin"><i class="fa fa-search"></i>Deskripsi</label>
												<textarea style="height: 240px;" placeholder="Enter Description" name="content"></textarea>
												<input type="hidden" name="location" value="dgcontent">
											</form>
										</div>
										<div class="clearfix"></div>
									</div>
									<div class="clearfix"></div>
								</div>
							</div>
							<div class="col-sm-4">
								<div class="dash-item first-dash-item">
									<h6 class="item-title"><i class="fa fa-plus"></i>Tambahkan Testimoni</h6>
									<div class="inner-item">
										<div class="dash-form">
											<?php echo form_open() ?>
												<button type="submit" class="btn btn-success btn-xs pull-right">Save</button>
												<label class="clear-top-margin"><i class="fa fa-i-cursor"></i>Nama</label>
												<input type="text" placeholder="Nama" name="nama" />
												<label class="clear-top-margin"><i class="fa fa-star"></i>Rating</label>
												<input type="text" placeholder="Rating" name="extra" />
												<label class="clear-top-margin"><i class="fa fa-comment"></i>Testimoni</label>
												<textarea style="height: 240px;" placeholder="Enter Description" name="content"></textarea>
												<input type="hidden" name="location" value="testimoni">
											</form>
										</div>
										<div class="clearfix"></div>
									</div>
									<div class="clearfix"></div>
								</div>
							</div>
						</div>
					</div>
				</div>