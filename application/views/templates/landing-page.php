<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta content="width=device-width, initial-scale=1.0" name="viewport">

	<title><?= $title; ?></title>
	<meta content="" name="description">
	<meta content="" name="keywords">

	<!-- Favicons -->
	<link href="<?= base_url('assets/'); ?>/img/favicon.png" rel="icon">
	<link href="<?= base_url('assets/'); ?>img/apple-touch-icon.png" rel="apple-touch-icon">

	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

	<!-- Vendor CSS Files -->
	<link href="<?= base_url('assets/'); ?>vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?= base_url('assets/'); ?>vendor/icofont/icofont.min.css" rel="stylesheet">
	<link href="<?= base_url('assets/'); ?>vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
	<link href="<?= base_url('assets/'); ?>vendor/animate.css/animate.min.css" rel="stylesheet">
	<link href="<?= base_url('assets/'); ?>vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
	<link href="<?= base_url('assets/'); ?>vendor/venobox/venobox.css" rel="stylesheet">

	<!-- Template Main CSS File -->
	<link href="<?= base_url('assets/'); ?>css/style.css" rel="stylesheet">

	<!-- =======================================================
  * Template Name: Shuffle - v2.3.1
  * Template URL: https://bootstrapmade.com/bootstrap-3-one-page-template-free-shuffle/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

	<!-- ======= Hero Section ======= -->
	<section id="hero">
		<div class="hero-container">
			<div id="heroCarousel" class="carousel slide carousel-fade" data-ride="carousel">

				<ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

				<div class="carousel-inner" role="listbox">

					<!-- Slide 1 -->
					<div class="carousel-item active">
						<div class="carousel-background"><img src="<?= base_url('assets/'); ?>img/slide/slide-1.jpg" alt=""></div>
						<div class="carousel-container">
							<div class="carousel-content">
								<h2 class="animate__animated animate__fadeInDown">DATABASE <span>ALUMNI</span></h2>
								<p class="animate__animated animate__fadeInUp">Sistem Informasi Pendataan Alumni Berbasis
									Web <br />Himpunan Mahasiswa Teknik Metalurgi UPN "Veteran" Yogyakarta</p>
								<a href="<?php echo site_url('Auth/index'); ?>" class="btn-get-started animate__animated animate__fadeInUp scrollto">Login</a>
								<a href="<?php echo site_url('Auth/registration'); ?>" class="btn-get-started animate__animated animate__fadeInUp scrollto">Isi Formulir</a>
							</div>
						</div>
					</div>

					<!-- Slide 2 -->
					<div class="carousel-item">
						<div class="carousel-background"><img src="<?= base_url('assets/'); ?>img/slide/slide-2.jpg" alt=""></div>
						<div class="carousel-container">
							<div class="carousel-content">
								<h2 class="animate__animated animate__fadeInDown">DATABASE <span>ALUMNI</span></h2>
								<p class="animate__animated animate__fadeInUp">Sistem Informasi Pendataan Alumni Berbasis
									Web <br />Himpunan Mahasiswa Teknik Metalurgi UPN "Veteran" Yogyakarta</p>
								<a href="<?php echo site_url('Auth/index'); ?>" class="btn-get-started animate__animated animate__fadeInUp scrollto">Login</a>
								<a href="<?php echo site_url('Auth/registration'); ?>" class="btn-get-started animate__animated animate__fadeInUp scrollto">Isi Formulir</a>
							</div>
						</div>
					</div>

					<!-- Slide 3 -->
					<div class="carousel-item">
						<div class="carousel-background"><img src="<?= base_url('assets/'); ?>img/slide/slide-3.jpg" alt=""></div>
						<div class="carousel-container">
							<div class="carousel-content">
								<h2 class="animate__animated animate__fadeInDown">DATABASE <span>ALUMNI</span></h2>
								<p class="animate__animated animate__fadeInUp">Sistem Informasi Pendataan Alumni Berbasis
									Web <br />Himpunan Mahasiswa Teknik Metalurgi UPN "Veteran" Yogyakarta</p>
								<a href="<?php echo site_url('Auth/index'); ?>" class="btn-get-started animate__animated animate__fadeInUp scrollto">Login</a>
								<a href="<?php echo site_url('Auth/registration'); ?>" class="btn-get-started animate__animated animate__fadeInUp scrollto">Isi Formulir</a>
							</div>
						</div>

					</div>
				</div>

				<a class="carousel-control-prev" href="#heroCarousel" role="button" data-slide="prev">
					<span class="carousel-control-prev-icon icofont-thin-double-left" aria-hidden="true"></span>
					<span class="sr-only">Previous</span>
				</a>

				<a class="carousel-control-next" href="#heroCarousel" role="button" data-slide="next">
					<span class="carousel-control-next-icon icofont-thin-double-right" aria-hidden="true"></span>
					<span class="sr-only">Next</span>
				</a>

			</div>
		</div>
	</section><!-- End Hero -->

	<a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

	<!-- Vendor JS Files -->
	<script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
	<script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="<?= base_url('assets/'); ?>vendor/jquery.easing/jquery.easing.min.js"></script>
	<script src="<?= base_url('assets/'); ?>vendor/php-email-form/validate.js"></script>
	<script src="<?= base_url('assets/'); ?>vendor/jquery-sticky/jquery.sticky.js"></script>
	<script src="<?= base_url('assets/'); ?>vendor/waypoints/jquery.waypoints.min.js"></script>
	<script src="<?= base_url('assets/'); ?>vendor/counterup/counterup.min.js"></script>
	<script src="<?= base_url('assets/'); ?>vendor/isotope-layout/isotope.pkgd.min.js"></script>
	<script src="<?= base_url('assets/'); ?>vendor/owl.carousel/owl.carousel.min.js"></script>
	<script src="<?= base_url('assets/'); ?>vendor/venobox/venobox.min.js"></script>

	<!-- Template Main JS File -->
	<script src="<?= base_url('assets/'); ?>/js/main.js"></script>

</body>

</html>