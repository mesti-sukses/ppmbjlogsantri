<div class="main-content" id="content-wrapper">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12 clear-padding-xs">
				<h5 class="page-title"><i class="fa fa-book"></i><?php echo "Tafsir Surat ".$this->data['tafsirAyat']->nama." Ayat ".$this->data['tafsirAyat']->ayat ?></h5>


				<div class="section-divider">
				</div>


				<div class="row">
					<div class="col-md-9">
						<div class="dash-item">
							<div class="item-title">
								
							</div>


							<div class="inner-item">
								<?php echo $tafsirAyat->content ?>
							</div>
						</div>
					</div>


					<div class="col-md-3">
						<div class="dash-item">
							<div class="item-title">
								Komentar
							</div>


							<div class="inner-item">
								
								<?php foreach ($tafsirAyat->comment as $comment): ?>
			                        <strong><?php echo $comment->nama ?></strong>
			                        <p><?php echo $comment->komentar ?></p>
			                    <?php endforeach ?>
							</div>

							<div class="inner-item">
								<?php echo form_open(); ?>
									<input type="hidden" name="nama" value="<?php echo $this->session->userdata('name'); ?>">
									<textarea name="komentar" rows="10" class="form-control" placeholder="Komentar Anda" required></textarea>
				                    <input type="hidden" name="id_tafsir" value="<?php echo $tafsirAyat->id_tafsir ?>">
				                    <button type="submit" class="btn btn-primary" style="margin-top: 24px">Post Comment</button>
								<?php echo form_close(); ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>