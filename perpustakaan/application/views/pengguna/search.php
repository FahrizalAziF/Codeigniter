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
        <section id="kitab" class="container home-section wow bounceInUp ">
            <div class="kotak">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12 ">
                        <div style="background: #00d2d3;width: 100%; height: 150px;">
                            <div class="col-md-9 col-sm-6 col-lg-9 col-xs-12">

                                <p style="padding-top: 70px;padding-left: 100px; color: white ; font-size: 30px; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;">
                                    <b>Hasil Pencarian</b></p>
                            </div>
                            <div class="col-md-3 col-sm-6 col-lg-3 col-xs-12">
                                <div class="input-group pull-right">
                                    <form action="<?php echo base_url('pengguna/cari'); ?>" method="post" enctype="multipart/form-data">
                                        <div class="col-md-9 col-xs-9">
                                            <input type="text" style="margin-top: 70px;" name="keyword" class="form-control" placeholder="Search for...">
                                        </div>
                                        <div class="col-md-3 col-xs-3" style="margin-top: 70px;">
                                            <span class="input-group-btn">
                                                <button class="btn btn-warning" type="submit"><i class="fa fa-search" style="font-size: 12px;"></i></button>
                                            </span>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="" style="margin:20px;">

                <?php echo $this->session->flashdata('delete'); ?>
                <div class="">
                    <div class="row" style="margin-bottom: 50px;">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div>

                                <div>
                                    <?php
                                    foreach ($buku as $a) :  ?>
                                        <div class="col-sm-2 col-md-2 col-lg-2 col-xs-6">
                                            <div class="card"><a class="button" href="<?php echo base_url('pengguna/detail/' . $a->id_buku) ?>">
                                                    <div class="buku">
                                                        <img class="card-img-top " src="<?php echo base_url('./upload/cover/' . $a->cover) ?>" alt="Card image cap"></div>
                                                    <div class="crd card-body">
                                                        <p class="card-title"><b style="color: #00bac7;"><?php echo $a->nama_buku ?>
                                                </a></b>
                                                <br>
                                                <p class="card-title" style="font-size: 12px;"><?php echo $a->penulis ?></p>
                                                <a href="" data-toggle="modal" data-target="#myModal<?php echo $a->id_buku ?>"><i class="fa fa-trash" style="font-size: 16px; "> </i></a>
                                                <div class="pull-right">
                                                    <i class="fa fa-eye" style="font-size: 12px;"> <?php echo $a->pembaca ?></i>
                                                    &nbsp;
                                                    <i class="fa fa-bars" style="font-size: 12px;"> <?php echo $a->halaman ?></i>
                                                </div>
                                            </div>
                                        </div>

                                </div>
                            <?php endforeach; ?>
                            </div>

                        </div>

                    </div>
                </div>
            </div>


    </div>
    </div>
    </div>


    </section>
    <!-- /Section: team -->



    <?php
    include('footer.php');
    ?>

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