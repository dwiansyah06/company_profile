<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php echo $judul; ?></title>
	<link href="https://fonts.googleapis.com/css?family=Roboto:300" rel="stylesheet">
	<link type="text/css" rel="stylesheet" href="<?= base_url().'asset/css/bootstrap.min.css' ?>" />
	<link type="text/css" rel="stylesheet" href="<?= base_url().'asset/css/owl.carousel.css' ?>" />
	<link type="text/css" rel="stylesheet" href="<?= base_url().'asset/css/owl.theme.default.css' ?>" />
	<link type="text/css" rel="stylesheet" href="<?= base_url().'asset/css/magnific-popup.css' ?>" />
	<link rel="stylesheet" href="<?= base_url().'asset/css/font-awesome.min.css' ?>">
	<link type="text/css" rel="stylesheet" href="<?= base_url().'asset/css/style.css' ?>" />
</head>

<body>
	<!-- Header -->
	<header id="home" style="padding-bottom: 20px;">
		<!-- Nav -->
		<nav id="nav" class="navbar nav-transparent">
			<div class="container">

				<div class="navbar-header">
					<!-- Logo -->
					<div class="navbar-brand">
						<a href="">
							<img class="logo" src="<?= base_url().'asset/img/mylogo3.png' ?>" alt="logo">
							<img class="logo-alt" src="<?= base_url().'asset/img/logo-alt.png' ?>" alt="logo">
						</a>
					</div>
					<!-- /Logo -->

					<!-- Collapse nav button -->
					<div id="change" class="nav-collapse">
						<span></span>
					</div>
					<!-- /Collapse nav button -->
				</div>

				<!--  Main navigation  -->
				<ul class="main-nav nav navbar-nav navbar-right">
					<li><a href="#home">Beranda</a></li>
					<li><a href="#about">Profile</a></li>
					<li><a href="#portfolio">Pelatihan</a></li>
					<li><a href="#service">Kursus</a></li>
					<li><a href="#pricing">Galeri</a></li>
					<li><a href="#testimonial">testimoni</a></li>
					<li><a href="#blog">Berita</a></li>
					<li><a href="#mitra">Mitra</a></li>
				</ul>
			</div>
		</nav>

		<div id="utama" class="slider owl-carousel owl-theme">
			<div class="slider1">
				<img class="img-responsive" src="<?= base_url().'asset/img/slider/4.jpg' ?>">
				<div class="ada"></div>
				<div class="txt">
					<div class="col-xs-12 col-sm-12 col-md-12">
						<div class="container">
							<h2>LOREM IPSUM</h2>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia fuga voluptatem consequuntur facilis.<br>Telp: 0000000, Cp : 000000000, 000000000</p>
						</div>
					</div>
				</div>
			</div>
			<div class="slider1">
				<img class="img-responsive" src="<?= base_url().'asset/img/slider/2.jpg' ?>">
				<div class="ada"></div>
				<div class="txt">
					<div class="col-xs-12 col-sm-12 col-md-12">
						<div class="container">
							<h2>LOREM IPSUM DOLOR SIT</h2>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia fuga voluptatem</p>
						</div>
					</div>
				</div>
			</div>
			<div class="slider1">
				<img class="img-responsive" src="<?= base_url().'asset/img/slider/3.jpg' ?>">
				<div class="ada"></div>
				<div class="txt">
					<div class="col-xs-12 col-sm-12 col-md-12">
						<div class="container">
							<h2>LOREM IPSUM DOLOR SIT AMET, CONSECTETUR</h2>
							<p>Officia fuga voluptatem consequuntur facilis.</p>
						</div>
					</div>
				</div>
			</div>
		</div>

	</header>
	<!-- /Header -->

	<!-- About -->
	<div id="about" class="section md-padding" style="padding-top: 100px;">
		<div class="container">
			<div class="row">
				<div class="section-header text-center">
					<h2 class="title">Profile</h2>
				</div>
				<div class="profile">
					<div class="col-xs-12 col-sm-12 col-md-6">
						<img src="<?= base_url().'asset/img/mylogo3.png' ?>">
					</div>
					<div class="col-xs-12 col-sm-12 col-md-6">
						<h4>Visi</h4>
						<div class="feature">
							<i class="fa fa-check"></i>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium eius.</p>
						</div>

						<br>
						<h4>Misi</h4>
						<div class="feature">
							<i class="fa fa-check"></i>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
						</div>
						<div class="feature">
							<i class="fa fa-check"></i>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
						</div>
						<div class="feature">
							<i class="fa fa-check"></i>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
						</div>
						<div class="feature">
							<i class="fa fa-check"></i>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- /About -->


	<!-- Portfolio -->
	<div id="portfolio" class="section md-padding bg-grey">
		<div class="container">
			<div class="row">
				<div class="section-header text-center">
					<h2 class="title">Pelatihan Kerja</h2>
				</div>
				<?php foreach($pelatihan as $value): ?>
				<div class="col-xs-6 col-sm-4 col-md-4">
					<div class="pelatihan">
						<center><img src="<?= base_url().'asset/admin/images/pelatihan/'.$value->icon ?>"></center>
						<h3><?= $value->judul_pelatihan ?></h3>
						<p>Harga In-House Rp <?= number_format($value->harga_in_house, 0, ",", ".") ?>, Harga Off-House Rp <?= number_format($value->harga_off_house, 0, ",", ".") ?> dan Minimal peserta <?= $value->min_peserta ?></p>
					</div>
				</div>
				<?php endforeach; ?>
				<div class="col-xs-12 col-sm-12 col-md-12">
					<center><a href="<?php echo base_url().'user/pelatihan/' ?>" class="btn btn-block main-btn"><span class="fa fa-pencil"></span> Daftar</a></center>
				</div>
				
			</div>
		</div>
	</div>

	<!-- Service -->
	<div id="service" class="section md-padding">
		<div class="container">
			<div class="row">
				<div class="section-header text-center">
					<h2 class="title">Kursus Pelatihan</h2>
				</div>
				<?php foreach($kursus as $row): ?>
				<div class="col-md-4 col-sm-12 col-xs-12">
					<div class="service">
						<img src="<?= base_url().'asset/admin/images/kursus/'.$row->icon ?>" alt="">
						<h3><?= $row->judul_kursus ?></h3>
						<p>Biaya Pendaftaran Rp <?= number_format($row->biaya_pendaftaran, 0, ",", ".") ?> Biaya Kursus Rp <?= number_format($row->biaya_kursus, 0, ",", ".") ?> dan <?= $row->pelaksanaan ?> Pertemuan </p>
					</div>
				</div>
				<?php endforeach; ?>
				<div class="col-xs-12 col-sm-12 col-md-12">
					<center><a href="<?php echo base_url().'user/kursus' ?>" class="btn btn-block main-btn"><span class="fa fa-pencil"></span> Daftar</a></center>
				</div>
			</div>
		</div>
	</div>

	<!-- Pricing -->
	<div id="pricing" class="section md-padding bg-grey">
		<div class="container">
			<div class="row">
				<div class="section-header text-center">
					<h2 class="title">Galeri</h2>
				</div>
				<?php foreach($galeri as $isi): ?>
				<div class="col-md-4 col-xs-6 work">
					<img class="img-responsive" src="<?= base_url().'asset/admin/images/galeri/'.$isi->foto ?>" alt="">
					
					<div class="work-content">
						<div class="work-link">
							<a class="lightbox" href="<?= base_url().'asset/admin/images/galeri/'.$isi->foto ?>"><i class="fa fa-search"></i></a>
						</div>
					</div>
				</div>
				<?php endforeach; ?>
				<div class="col-xs-12 col-sm-12 col-md-12">
					<center><a href="<?php echo base_url().'user/galeri' ?>" class="btn btn-block main-btn">Tampilkan Lebih Banyak <span class="fa fa-chevron-right"></span></a></center>
				</div>
			</div>
		</div>
	</div>
	<!-- /Pricing -->


	<!-- Testimonial -->
	<div id="testimonial" class="section md-padding">
		<div class="bg-img" style="background-image: url(<?= base_url().'asset/img/background1.jpg' ?>);">
			<div class="overlay"></div>
		</div>
		<div class="container">
			<div class="row">
				<div class="col-md-10 col-md-offset-1">
					<div id="testimonial-slider" class="owl-carousel owl-theme">
						<div class="testimonial">
							<div class="testimonial-meta">
								<img src="<?= base_url().'asset/img/perso2.jpg' ?>" alt="">
								<h3 class="white-text">John Doe</h3>
								<span>Web Designer</span>
							</div>
							<p class="white-text">Molestie at elementum eu facilisis sed odio. Scelerisque in dictum non consectetur a erat. Aliquam id diam maecenas ultricies mi eget mauris.</p>
						</div>

						<div class="testimonial">
							<div class="testimonial-meta">
								<img src="<?= base_url().'asset/img/perso2.jpg' ?>" alt="">
								<h3 class="white-text">John Doe</h3>
								<span>Web Designer</span>
							</div>
							<p class="white-text">Molestie at elementum eu facilisis sed odio. Scelerisque in dictum non consectetur a erat. Aliquam id diam maecenas ultricies mi eget mauris.</p>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- /Testimonial -->

	<!-- Blog -->
	<div id="blog" class="section md-padding bg-grey">
		<div class="container">
			<div class="row">
				<div class="section-header text-center">
					<h2 class="title">Berita</h2>
				</div>
				<?php foreach($berita as $baris => $fill): ?>
				<div class="col-xs-12 col-sm-6 col-md-6">
					<div class="blog">
						<div class="blog-img">
							<img class="img-responsive" src="<?= base_url().'asset/admin/images/berita/'.$fill->gambar ?>">
						</div>
						<div class="blog-content">
							<ul class="blog-meta">
								<?php foreach($a[$baris] as $fill2): ?>
								<li><i class="fa fa-user"></i><?= $fill2->username ?></li>
								<?php endforeach; ?>
								<li><i class="fa fa-clock-o"></i><?= date('d M', strtotime($fill->tgl_upload)) ?></li>
							</ul>
							<h3 style="margin-bottom: 10px;"><?= $fill->judul_berita ?></h3>
							<?php
								$kalimat = $fill->konten_berita;
								$result=substr($kalimat, 0, 190);
								echo "$result ...";
							?>
							<a href="<?= base_url().'user/detailBerita/'.$fill->id_berita ?>">Read more</a>
						</div>
					</div>
				</div>
				<?php endforeach; ?>
				<div class="col-xs-12 col-sm-12 col-md-12">
					<center><a href="<?php echo base_url().'user/berita' ?>" class="btn btn-block main-btn">Tampilkan Lebih Banyak <span class="fa fa-chevron-right"></span></a></center>
				</div>
			</div>
		</div>
	</div>
	<!-- /Blog -->

	<!-- Contact -->
	<div id="mitra" class="section md-padding">
		<div class="container">
			<div class="row">
				<div class="section-header text-center">
					<h2 class="title">Mitra Kami</h2>
				</div>
				<div class="col-md-12">
					<center><div>
						<?php for ($i = 1; $i <=6 ; $i++) { ?>
							<img src="<?= base_url().'asset/img/mitra/7.png' ?>" width="100">	
						<?php } ?>
					</div></center>
				</div>
			</div>
		</div>
	</div>
	<!-- /Contact -->

	<!-- Contact Us-->
	<div id="mitra" class="section md-padding bg-grey">
		<div class="container">
			<div class="row">
				<div class="section-header text-center">
					<h2 class="title">Kontak Kami</h2>
				</div>
				<div class="col-xs-6 col-sm-4 col-md-4">
					<div class="contact">
						<i class="fa fa-phone"></i>
						<h3>Telepon</h3>
						<p>0000 0000 0000</p>
					</div>
				</div>

				<div class="col-xs-6 col-sm-4 col-md-4">
					<div class="contact">
						<img src="<?= base_url().'asset/img/line.png' ?>">
						<h3>Line</h3>
						<p>0000 0000 0000</p>
					</div>
				</div>

				<div class="col-xs-6 col-sm-4 col-md-4">
					<div class="contact">
						<img src="<?= base_url().'asset/img/whatsapp.png' ?>" alt="">
						<h3>Whatsapp</h3>
						<p>0000 0000 0000</p>
					</div>
				</div>

				<div class="col-xs-6 col-sm-4 col-md-4">
					<div class="contact">
						<i class="fa fa-facebook-square"></i>
						<h3>Facebook</h3>
						<p>Lorem Ipsum Dolor</p>
					</div>
				</div>

				<div class="col-xs-6 col-sm-4 col-md-4">
					<div class="contact">
						<i class="fa fa-envelope"></i>
						<h3>Email</h3>
						<p>lorem@lorem.com</p>
					</div>
				</div>

				<div class="col-xs-6 col-sm-4 col-md-4">
					<div class="contact">
						<i class="fa fa-map-marker"></i>
						<h3>Alamat</h3>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
					</div>
				</div>
				</div>
			</div>
		</div>
	</div>
	<!-- /Contact -->

	<!-- Footer -->
	<footer id="footer" class="bg-white">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="footer-copyright">
						<p>Copyright © 2018 <a href="">DemoMyApp</a>. All rights reserved.</p>
					</div>
				</div>
			</div>
		</div>
	</footer>
	<!-- /Footer -->

	<!-- Back to top -->
	<div id="back-to-top"></div>
	<!-- /Back to top -->

	<!-- Preloader -->
	<div id="preloader">
		<div class="preloader">
			<span></span>
			<span></span>
			<span></span>
			<span></span>
		</div>
	</div>
	<!-- /Preloader -->

	<!-- jQuery Plugins -->
	<script type="text/javascript" src="<?= base_url().'asset/js/jquery.min.js' ?>"></script>
	<script type="text/javascript" src="<?= base_url().'asset/js/bootstrap.min.js' ?>"></script>
	<script type="text/javascript" src="<?= base_url().'asset/js/owl.carousel.min.js' ?>"></script>
	<script type="text/javascript" src="<?= base_url().'asset/js/jquery.magnific-popup.js' ?>"></script>
	<script type="text/javascript" src="<?= base_url().'asset/js/main.js' ?>"></script>
</body>

</html>