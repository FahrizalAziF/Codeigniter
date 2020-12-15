<!doctype html>
<html lang="en">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="">
<link rel="icon" href="<?= base_url('assets/img/logo.png') ?>">

<title>E-Pasar Pamekasan</title>

<!-- Bootstrap core CSS -->
<link href="<?= base_url() ?>assets/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="<?= base_url() ?>assets/css/style.css" rel="stylesheet">
<script src='https://kit.fontawesome.com/a076d05399.js'></script>
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<!-- Stylesheets -->
<link rel="stylesheet" href="<?= base_url() ?>assets/css/owl.carousel.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<link rel="stylesheet" href="<?php echo base_url('assets/admin/vendors/iconfonts/mdi/css/materialdesignicons.min.css'); ?>">
<link rel="stylesheet" href="<?php echo base_url('assets/css/vendor.bundle.base.css'); ?>">
<link rel="stylesheet" href="<?php echo base_url('assets/css/vendor.bundle.addons.css'); ?>">
<style type="text/css">
    .preloader {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: 9999;
        background-color: #fff;
    }

    .preloader .loading {
        position: absolute;
        left: 50%;
        top: 50%;
        transform: translate(-50%, -50%);
        font: 14px arial;
    }
</style>

<style>
    .owl-prev {
        left: -30px;
    }

    .owl-next {
        right: -30px;
    }

    .owl-prev,
    .owl-next {
        position: absolute;
        top: 30%;
    }

    .owl-prev span,
    .owl-next span {
        font-size: 60px;
        color: #787878;
    }

    .owl-theme .owl-nav [class*="owl-"]:hover {
        background-color: transparent;
    }
</style>
<style>
    .produk {
        background: url('<?= base_url() ?>assets/img/coba.png') no-repeat scroll;
        background-size: 100% 100%;
        min-height: 700px
    }

    .bg-top {
        background: url('<?= base_url() ?>assets/img/bg_top.png') no-repeat scroll;
        background-size: 100% 100%;
    }

    .bg-app {
        background: url('<?= base_url() ?>assets/img/app.png') no-repeat scroll;
        background-size: 100% 100%;
    }
</style>
<script>
    $(document).ready(function() {
        $(".preloader").fadeOut();
    })
</script>


<!-- Custom styles for this template -->
<link href="signin.css" rel="stylesheet">
</head>