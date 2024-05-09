<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>Musyawarah ikatan Pelajar Muhammadiyah</title>
	<meta name="robots" content="noindex, follow" />
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Favicon -->
	<link rel="shortcut icon" type="image/x-icon" href="<?= base_url() ?>assets/images/ipm.png">

	<!-- CSS
	============================================ -->
	<link rel="stylesheet" href="<?= base_url() ?>assets/css/vendor/bootstrap.min.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/css/vendor/slick.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/css/vendor/slick-theme.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/css/plugins/sal.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/css/plugins/feather.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/css/plugins/fontawesome.min.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/css/plugins/euclid-circulara.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/css/plugins/swiper.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/css/plugins/magnify.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/css/plugins/odometer.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/css/plugins/animation.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/css/plugins/bootstrap-select.min.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/css/plugins/jquery-ui.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/css/plugins/magnigy-popup.min.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/css/plugins/plyr.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/css/style.css">
</head>

<body class="rbt-header-sticky">
	<div class="rbt-newsletter-area newsletter-style-2 bg-color-primary rbt-section-gap ">
		<div class="container">
			<div class="row row--15 align-items-center">
				<div class="col-lg-12">
					<div class="inner text-center">
						<div class="section-title text-center">
							<a href="<?= site_url('panitia') ?>">
								<span class="subtitle bg-white-opacity">E-Voting Online</span>
							</a>
							<h2 class="title color-white"><strong><?= $config->NM_CONFIG ?></strong></h2>
							<p class="text-warning"><?= $config->KETERANGAN ?></p>

						</div>
						<form action="<?= site_url('muhammadiyah/check') ?>" method="post" class="newsletter-form-1 mt--40">
							<input type="text" name="kode" placeholder="Masukkan Kode Unik" minlength="5" required>
							<button type="submit" class="rbt-btn btn-md btn-gradient hover-icon-reverse">
								<span class="icon-reverse-wrapper">
									<span class="btn-text">Mulai E-Voting</span>
									<span class="btn-icon"><i class="feather-arrow-right"></i></span>
									<span class="btn-icon"><i class="feather-arrow-right"></i></span>
								</span>
							</button>
						</form>
						<?php if (!$this->session->flashdata('gagal')) : ?>
							<span class="note-text color-white mt--20">Periksa Kode Unik pada Kartu Suara Anda.</span>
						<?php endif; ?>

						<?php if ($this->session->flashdata('gagal')) : ?>
							<span class="subtitle bg-white text-danger"><?= $this->session->flashdata('gagal') ?></span>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Start Footer Area  -->
	<footer class="rbt-footer footer-style-1 bg-color-primary">
		<div class="container">
			<div class="row p-5">
				<p class="text-white text-center bg-dark">Web Developer Kikuk Code | UI/UX Designer Yinbee Creation | Quality Assurance Tester Sar.co </p>
			</div>
		</div>
	</footer>
	<!-- End Footer Area  -->
	<!-- Start Copyright Area  -->
	<div class="copyright-area copyright-style-1 ptb--20">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-xxl-6 col-xl-6 col-lg-6 col-md-12 col-12">
					<p class="rbt-link-hover text-center text-lg-start">Copyright © 2023 <a href="http://www.kikukcode.com">Kikuk Code</a> All Rights Reserved</p>
				</div>

			</div>
		</div>
	</div>
	<!-- End Copyright Area  -->
	<div class="rbt-progress-parent">
		<svg class="rbt-back-circle svg-inner" width="100%" height="100%" viewBox="-1 -1 102 102">
			<path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
		</svg>
	</div>

	<!-- JS
============================================ -->
	<!-- Modernizer JS -->
	<script src="<?= base_url() ?>assets/js/vendor/modernizr.min.js"></script>
	<!-- jQuery JS -->
	<script src="<?= base_url() ?>assets/js/vendor/jquery.js"></script>
	<!-- Bootstrap JS -->
	<script src="<?= base_url() ?>assets/js/vendor/bootstrap.min.js"></script>
	<!-- sal.js -->
	<script src="<?= base_url() ?>assets/js/vendor/sal.js"></script>
	<script src="<?= base_url() ?>assets/js/vendor/swiper.js"></script>
	<script src="<?= base_url() ?>assets/js/vendor/magnify.min.js"></script>
	<script src="<?= base_url() ?>assets/js/vendor/jquery-appear.js"></script>
	<script src="<?= base_url() ?>assets/js/vendor/odometer.js"></script>
	<script src="<?= base_url() ?>assets/js/vendor/backtotop.js"></script>
	<script src="<?= base_url() ?>assets/js/vendor/isotop.js"></script>
	<script src="<?= base_url() ?>assets/js/vendor/imageloaded.js"></script>

	<script src="<?= base_url() ?>assets/js/vendor/wow.js"></script>
	<script src="<?= base_url() ?>assets/js/vendor/waypoint.min.js"></script>
	<script src="<?= base_url() ?>assets/js/vendor/easypie.js"></script>
	<script src="<?= base_url() ?>assets/js/vendor/text-type.js"></script>
	<script src="<?= base_url() ?>assets/js/vendor/jquery-one-page-nav.js"></script>
	<script src="<?= base_url() ?>assets/js/vendor/bootstrap-select.min.js"></script>
	<script src="<?= base_url() ?>assets/js/vendor/jquery-ui.js"></script>
	<script src="<?= base_url() ?>assets/js/vendor/magnify-popup.min.js"></script>
	<script src="<?= base_url() ?>assets/js/vendor/paralax-scroll.js"></script>
	<script src="<?= base_url() ?>assets/js/vendor/paralax.min.js"></script>
	<script src="<?= base_url() ?>assets/js/vendor/countdown.js"></script>
	<script src="<?= base_url() ?>assets/js/vendor/plyr.js"></script>
	<!-- Main JS -->
	<script src="<?= base_url() ?>assets/js/main.js"></script>
</body>

</html>