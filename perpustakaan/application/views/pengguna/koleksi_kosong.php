<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Perpustakaan IAI Al-Khairat</title>
    <link rel="icon" type="image/png" href="<?php echo base_url('admin/build/images/book.png') ?>" />

    <!-- css -->
    <link href="<?php echo base_url('pengguna/css/bootstrap.min.css') ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url('pengguna/font-awesome/css/font-awesome.min.css') ?>" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('pengguna/plugins/cubeportfolio/css/cubeportfolio.min.css') ?>">
    <link href="<?php echo base_url('pengguna/css/nivo-lightbox.css') ?>" rel="stylesheet" />
    <link href="<?php echo base_url('pengguna/css/nivo-lightbox-theme/default/default.css') ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url('pengguna/css/owl.carousel.css') ?>" rel="stylesheet" media="screen" />
    <link href="<?php echo base_url('pengguna/css/owl.theme.css') ?>" rel="stylesheet" media="screen" />
    <link href="<?php echo base_url('pengguna/css/animate.css') ?>" rel="stylesheet" />
    <link href="<?php echo base_url('pengguna/css/style.css') ?>" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style type="text/css">
        .pembungkus {
            position: relative;


        }

        .pembungkus p {
            margin: 30px;
            text-align: center;
            color: black;
            position: absolute;
        }

        .kotak {
            box-shadow: 0px 0px 2px 2px rgba(255, 254, 254, 0.801);

        }
    </style>
    <style>
        #loading {
            width: 50px;
            height: 5px;
            border: solid 5px #ccc;
            border-top-color: #ff6a00;
            border-radius: 100%;

            position: fixed;
            left: 0;
            top: 0;
            right: 0;
            bottom: 0;
            margin: auto;

            animation: putar 2s linear infinite;

        }

        @keyframes putar {
            form {
                transform: rotate(0deg);
            }

            to {
                transform: rotate(3deg);
            }
        }
    </style>
    <style type="text/css">
        .crd {
            position: relative;


        }

        .crd p {
            margin: 0 0 0px;

        }

        .detail img {
            width: 209px;
            height: 323px;
            box-shadow: 0px 1px 5px 0px;
        }
    </style>

    <style type="text/css">
        .crd {
            position: relative;


        }

        .crd p {
            margin: 0 0 0px;

        }

        .buku {
            text-align: center;
        }


        .buku img {
            width: 100% !important;
            height: 273px;

        }

        .card {
            margin-bottom: 10px;
        }
    </style>
    <!-- boxed bg -->

    <!-- template skin -->
    <link id="t-colors" href="color/default.css" rel="stylesheet">

</head>

<body id="page-top" data-spy="scroll" data-target=".navbar-custom">


    <div id="wrapper">

        <?php
        include('header.php');
        ?>

        <!-- Section: team -->
        <div class="main-wrapper" style="padding-top: 150px;padding-bottom: 100px;">
            <!-- ============================================================== -->
            <!-- Preloader - style you can find in spinners.css -->
            <!-- ============================================================== -->
            <div class="preloader">
                <div class="lds-ripple">
                    <div class="lds-pos"></div>
                    <div class="lds-pos"></div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- Preloader - style you can find in spinners.css -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Login box.scss -->
            <!-- ============================================================== -->
            <div class="error-box">
                <div class="error-body text-center">
                    <h1 class="error-title text-danger"><i class="fa fa-book"></i></h1>
                    <h3 class="text-uppercase error-subtitle">Anda Tidak Punya Koleksi</h3>
                    <p class="text-muted m-t-30 m-b-30">Tambahkan Koleksi Buku Yang Ingin Anda Baca</p>
                    <a href="<?= base_url('pengguna/beranda') ?>" class="btn btn-danger btn-rounded waves-effect waves-light m-b-40">Back to home</a>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- Login box.scss -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Page wrapper scss in scafholding.scss -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Page wrapper scss in scafholding.scss -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Right Sidebar -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Right Sidebar -->
            <!-- ============================================================== -->
        </div>
        <!-- /Section: team -->


        <footer>
            <div class="container">
                <div class="row">

                    <div class="col-sm-6 col-md-6">
                        <div class="wow fadeInDown" data-wow-delay="0.1s">
                            <div class="widget">
                                <h5>Perpustakaan IAI Al-Khairat</h5>
                                <p>
                                    Perpustakaan milik Institut Agama Islam Al-Khairat.
                                </p>
                                <ul>
                                    <li>
                                        <span class="fa-stack fa-lg">
                                            <i class="fa fa-circle fa-stack-2x"></i>
                                            <i class="fa fa-map-marker fa-stack-1x fa-inverse"></i>
                                        </span> Jl. Raya Palengaan (Paludding) No. 02 (9,41 km), Kab.Pamekasan 69301
                                    </li>
                                    <li>
                                        <span class="fa-stack fa-lg">
                                            <i class="fa fa-circle fa-stack-2x"></i>
                                            <i class="fa fa-phone fa-stack-1x fa-inverse"></i>
                                        </span> (0324) 3515042
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 ">
                        <div class="wow fadeInDown" data-wow-delay="0.1s">
                            <div class="widget">
                                <h5>Lokasi IAI Al-Khairat</h5>
                                <ul>
                                    <li>
                                        <span class="fa-stack fa-lg">
                                            <i class="fa fa-circle fa-stack-2x"></i>
                                            <i class="fa fa-map-marker fa-stack-1x fa-inverse"></i>
                                        </span> Jl. Raya Palengaan (Paludding) No. 02 (9,41 km), Kab.Pamekasan 69301
                                    </li>
                                </ul>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="sub-footer">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6 col-md-6 col-lg-6">
                            <div class="wow fadeInLeft" data-wow-delay="0.1s">
                                <div class="text-left">
                                    <p>&copy;Copyright 2019 - Bikea Technocraft.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6 col-lg-6">
                            <div class="wow fadeInRight" data-wow-delay="0.1s">
                                <div class="text-right">

                                </div>
                                <!-- 
                        All links in the footer should remain intact. 
                        Licenseing information is available at: http://bootstraptaste.com/license/
                        You can buy this theme without footer links online at: http://bootstraptaste.com/buy/?theme=Medicio
                    -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>

    </div>
    <a href="#" class="scrollup"><i class="fa fa-angle-up active"></i></a>

    <!-- Core JavaScript Files -->
    <script src="<?php echo base_url('pengguna/js/jquery.min.js') ?>"></script>
    <script src="<?php echo base_url('pengguna/js/bootstrap.min.js') ?>"></script>
    <script src="<?php echo base_url('pengguna/js/jquery.easing.min.js') ?>"></script>
    <script src="<?php echo base_url('pengguna/js/wow.min.js') ?>"></script>
    <script src="<?php echo base_url('pengguna/js/jquery.scrollTo.js') ?>"></script>
    <script src="<?php echo base_url('pengguna/js/jquery.appear.js') ?>"></script>
    <script src="<?php echo base_url('pengguna/js/stellar.js') ?>"></script>
    <script src="<?php echo base_url('pengguna/plugins/cubeportfolio/js/jquery.cubeportfolio.min.js') ?>"></script>
    <script src="<?php echo base_url('pengguna/js/owl.carousel.min.js') ?>"></script>
    <script src="<?php echo base_url('pengguna/js/nivo-lightbox.min.js') ?>"></script>
    <script src="<?php echo base_url('pengguna/js/custom.js') ?>"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.klik_menu').click(function() {
                var menu = $(this).attr('id');
                if (menu == "home") {
                    $('.badan').load('baru.html');
                } else if (menu == "tentang") {
                    $('.badan').load('sering_dibaca.html');
                } else if (menu == "tutorial") {
                    $('.badan').load('koleksi.html');
                } else if (menu == "sosmed") {
                    $('.badan').load('sosmed.php');
                }
            });


            // halaman yang di load default pertama kali
            $('.badan').load('baru.html');

        });
    </script>
    <script>
        var loading = document.getElementById('loading');
        window.addEventListener('load', function() {
            loading.style.display = "none";
        });
    </script>

</body>

</html>