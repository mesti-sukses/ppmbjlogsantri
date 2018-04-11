		<div class="row page-title page-title-about">
			<div class="container">
				<h2><i class="fa fa-graduation-cap"></i>ABOUT US</h2>
			</div>
		</div>
		
		<!-- Principal Intro Section -->
		<?php $this->load->view('front/component/ketua', $this->data) ?>
		
		<!-- What we offer section -->
        <div class="row section-row dark-row">
            <div class="container">
				<div class="section-row-header-center">
					<h6><i class="fa fa-star-o"></i>PROFESIONAL RELIGIUS<i class="fa fa-star-o"></i></h6>
					<h1>APA YANG KAMI TAWARKAN?</h1>
					<p>Dalam PPm kami menawarkan beberapa kegiatan untuk menunjang cita-cita kami</p>
				</div>
				<div class="about-row">
					<div class="col-sm-6 col-md-4">
						<div class="we-offer-item">
							<div class="we-offer-side">
								<i class="fa fa-book"></i>
							</div>
							<h5>PONPES</h5>
							<p>Merupakan lembaga pendidikan dengan basis agama islam. Dengan jargon andalan '2 tahun ulama, 4 tahun sarjana' berusaha mencetak generasi profesional religius dengan 5 sukses santri</p>
						</div>
					</div>
					<div class="col-sm-6 col-md-4">
						<div class="we-offer-item">
							<div class="we-offer-side">
								<i class="fa fa-graduation-cap"></i>
							</div>
							<h5>PERKULIAHAN</h5>
							<p>Tidak hanya menawarkan program pendidikan agama, tetapi juga memfasilitasi para santri dalam menempuh pendidikan pada jenjang Strata dan Diploma</p>
						</div>
					</div>
					<div class="col-sm-6 col-md-4">
						<div class="we-offer-item">
							<div class="we-offer-side">
								<i class="fa fa-user"></i>
							</div>
							<h5>UKS</h5>
							<p>Unit Kegiatan Santri berfungsi sebagai wadah para santri untuk mengembangkan keahlian, minat, dan bakat mereka, sehingga setiap santri tidak hanya mahir dalam bidang keagamaan saja</p>
						</div>
					</div>
					<div class="clearfix"></div>
				</div>
            </div>
        </div>
		
		<!-- Numbers section -->
		<div class="row number-row">
			<div class="container">
				<div class="col-sm-6 col-md-3 number-item">
					<i class="fa fa-book"></i>
					<span>4</span>
					<p>KELAS PONPES</p>
				</div>
				<div class="col-sm-6 col-md-3 number-item">
					<i class="fa fa-graduation-cap"></i>
					<span>5</span>
					<p>DEWAN GURU</p>
				</div>
				<div class="col-sm-6 col-md-3 number-item">
					<i class="fa fa-child"></i>
					<span>250</span>
					<p>SANTRI</p>
				</div>
				<div class="col-sm-6 col-md-3 number-item">
					<i class="fa fa-clock-o"></i>
					<span>3+</span>
					<p>UKS</p>
				</div>
			</div>
		</div>
		
		<?php $this->load->view('front/component/guru', $this->data) ?>