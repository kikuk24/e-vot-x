<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>MUSYCAB XVII IPM KECAMATAN BRONDONG</title>
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
    <!-- Start Card Style -->
    <div class="rbt-course-card-area rbt-section-gap bg-color-white">
        <div class="container">
            <!-- Start Card Area -->

            <div class="row g-5">
                <?php foreach ($calon as $row) { ?>
                    <!-- Start Single Card  -->
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
                        <div class="rbt-card variation-03 rbt-hover">
                            <div class="rbt-card-img">

                                <img src="<?= base_url() ?>file/foto/<?= $row->FOTO ?>" alt="<?= $row->NM_CALON ?>">


                            </div>
                            <div class="rbt-card-body">
                                <h5 class="rbt-card-title"><?= $row->NM_CALON ?>
                                </h5>
                            </div>
                            <div class="card-information">
                                <div class="card-count"><?= $row->NBM ?></div>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Card  -->
                <?php } ?>
            </div>
            <!-- End Card Area -->

        </div>
    </div>
    <!-- End Card Style -->





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