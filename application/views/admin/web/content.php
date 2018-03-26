<div class="main-content" id="content-wrapper">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12 clear-padding-xs">
				<h5 class="page-title"><i class="fa fa-list"></i>Special Content</h5>


				<div class="section-divider">
				</div>
			</div>
		</div>


		<div class="row">
			<div class="col-lg-12 clear-padding-xs">
				<div class="col-sm-4">
					<div class="dash-item first-dash-item">
						<h6 class="item-title"><i class="fa fa-user"></i>Ketua Pondok</h6>


						<div class="inner-item">
							<div class="dash-form">
								<?php echo form_open('',array('id' => 'editor')) ?><button class="btn btn-success btn-xs pull-right btn-editor" type="submit">Save</button> <label class="clear-top-margin"><i class="fa fa-i-cursor"></i>Nama</label> <input name="nama" placeholder="Nama Ketua Pondok" type="text" value="<?php echo $ketuaData->nama ?>"> <label class="clear-top-margin"><i class="fa fa-link"></i>Link</label> <input name="extra" placeholder="Link" type="text" value="<?php echo $ketuaData->extra ?>"> <label class="clear-top-margin"><i class="fa fa-user"></i>Tentang</label>

								<div id="div-editor">
									<?php echo $ketuaData->content ?>
								</div>

								<textarea id="text-editor" name="content" style="display: none;"></textarea> <input name="location" type="hidden" value="ketua"> 
							</div>


							<div class="clearfix">
							</div>
						</div>


						<div class="clearfix">
						</div>
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


								<div class="clearfix">
								</div>
							</div>
							<?php foreach ($dewanGuruData as $guru): ?>

							<div class="tbl-row">
								<div class="col-xs-3">
									<h6><?php echo $guru->nama; ?>
									</h6>
								</div>


								<div class="col-xs-6">
									<h6><?php echo $guru->content ?>
									</h6>
								</div>


								<div class="col-xs-3">
									<a class="btn btn-danger btn-xs" href="<?php echo base_url('admin/delContent/'.$guru->id) ?>" title="Delete"><i class="fa fa-trash"></i></a>
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


								<div class="clearfix">
								</div>
							</div>
							<?php foreach ($testimoniData as $testimoni): ?>

							<div class="tbl-row">
								<div class="col-xs-3">
									<h6><?php echo $testimoni->nama; ?>
									</h6>
								</div>


								<div class="col-xs-6">
									<h6><?php echo $testimoni->content ?>
									</h6>
								</div>


								<div class="col-xs-3">
									<a class="btn btn-danger btn-xs" href="<?php echo base_url('admin/delContent/'.$guru->id) ?>" title="Delete"><i class="fa fa-trash"></i></a>
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
								<?php echo form_open() ?><button class="btn btn-success btn-xs pull-right" type="submit">Save</button> <label class="clear-top-margin"><i class="fa fa-i-cursor"></i>Nama</label> <input name="nama" placeholder="Nama Dewan Guru" type="text"> <label class="clear-top-margin"><i class="fa fa-university"></i>Sub</label> <input name="extra" placeholder="Sub" type="text"> <label class="clear-top-margin"><i class="fa fa-search"></i>Deskripsi</label> 

								<textarea name="content" placeholder="Enter Description" style="height: 240px;"></textarea> <input name="location" type="hidden" value="dgcontent"> 
							</div>


							<div class="clearfix">
							</div>
						</div>


						<div class="clearfix">
						</div>
					</div>
				</div>


				<div class="col-sm-4">
					<div class="dash-item first-dash-item">
						<h6 class="item-title"><i class="fa fa-plus"></i>Tambahkan Testimoni</h6>


						<div class="inner-item">
							<div class="dash-form">
								<?php echo form_open() ?><button class="btn btn-success btn-xs pull-right" type="submit">Save</button> <label class="clear-top-margin"><i class="fa fa-i-cursor"></i>Nama</label> <input name="nama" placeholder="Nama" type="text"> <label class="clear-top-margin"><i class="fa fa-star"></i>Rating</label> <input name="extra" placeholder="Rating" type="text"> <label class="clear-top-margin"><i class="fa fa-comment"></i>Testimoni</label> 

								<textarea name="content" placeholder="Enter Description" style="height: 240px;"></textarea> <input name="location" type="hidden" value="testimoni"> 
							</div>


							<div class="clearfix">
							</div>
						</div>


						<div class="clearfix">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>