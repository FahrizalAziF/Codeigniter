<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Perpustakaan IAI Al-Khairat</title>

    <!-- css -->
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
        /* Set the size of the div element that contains the map */
        #map {
            height: 300px;
            /* The height is 400 pixels */
            width: 100%;
            /* The width is the width of the web page */
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
    <!-- boxed bg -->

    <!-- template skin -->
    <link id="t-colors" href="color/default.css" rel="stylesheet">

</head>

<body id="page-top" data-spy="scroll" data-target=".navbar-custom">


    <div id="wrapper">

        <?php
        include('header.php');
        ?>

        <!-- /Section: services -->
        <section style="background: white;">
            <div class="container wow bounceInUp">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-xs-12" style="margin-bottom:60px;">

                        <div style="background: white;width: 100%; height: 150px;">
                            <div class="col-md-3 col-sm-4 col-xs-3 " style="margin-top:140px; ">
                                <div class="detail">
                                    <img class="card-img-top" src="<?php echo base_url('./upload/cover/' . $dtl->cover) ?>" alt="Card image cap"></div><br>
                            </div>
                        </div>
                        <div class="col-md-9 col-sm-8 col-xs-12 ">
                            <h1 style="color:black" style="font-size:18px;"><?php echo $dtl->nama_buku ?></h1>
                            <?php echo $this->session->flashdata('sudah'); ?>
                            <div class="row">
                                <div class="col-ls-3 col-md-3 col-xs-6">
                                    <p>Kategori Cerita</p>
                                </div>
                                <div class="col-md-3 col-ls-3 col-xs-6">
                                    <p>Sejarah</p>
                                </div>

                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-ls-3 col-md-3 col-xs-6">
                                    <p>Penulis</p>
                                </div>
                                <div class="col-md-3 col-ls-3 col-xs-6">
                                    <p><?php echo $dtl->penulis ?></p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-ls-3 col-md-3 col-xs-6">
                                    <p>Diterbitkan</p>
                                </div>
                                <div class="col-md-4 col-ls-4 col-xs-6">
                                    <p><?php echo $dtl->terbit ?></p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-ls-2 col-md-2 col-xs-6">

                                    <p><i class="fa fa-eye"></i> <?php echo $dtl->pembaca ?> dibaca</p>
                                </div>
                                <div class="col-md-2 col-ls-2 col-xs-6">
                                    <p><i class="fa fa-bars"></i> <?php echo $dtl->halaman ?> halaman</p>
                                </div>
                                <div class="col-md-2 col-ls-2 col-xs-2 pull-right">
                                    <form action="<?php echo base_url('pengguna/tambahKoleksi'); ?>" method="post" enctype="multipart/form-data">
                                        <input type="hidden" name="id_buku" value="<?php echo $dtl->id_buku ?>">
                                        <input type="hidden" name="id_user" value="<?php echo $this->session->userdata('id_user') ?>">
                                        <button class="btn btn-warning pull-right" style="text-transform: capitalize;" type="input">+<i class="fa fa-shopping-cart"></i>Koleksi</button>

                                    </form>

                                </div>
                            </div>
                            <hr>
                            <form action="<?= base_url() ?>pengguna/baca" method="POST">
                                <input type="hidden" name="pembaca" value="<?php echo $dtl->pembaca ?>">
                                <input type="hidden" name="id_buku" value="<?php echo $dtl->id_buku ?>">
                                <button type="input" class="btn btn-info " style="text-transform: capitalize;"> Mulai Baca Sekarang!</button>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
    </div>
    </section>
    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-xs">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="row">
                        <div class="col-md-6 col-xs-6">
                            <h4 class="modal-title" id="myModalLabel"><?= $dtl->nama_buku ?></h4>
                        </div>
                        <div class="col-md-6 col-xs-6">
                            <form action="<?php echo base_url('pengguna/pembaca'); ?>" method="post" enctype="multipart/form-data">
                                <input type="hidden" value="<?= $dtl->id_buku ?>" name="id_buku" />
                                <input type="hidden" value="<?= $dtl->pembaca ?>" name="pembaca" />
                                <input type="hidden" value="<?= $dtl->halaman ?>" name="halaman" />
                                <input type="hidden" value="<?= $dtl->nama_buku ?>" name="nama_buku" />
                                <input type="hidden" value="<?= $dtl->cover ?>" name="cover" />
                                <input type="hidden" value="<?= $dtl->terbit ?>" name="terbit" />
                                <input type="hidden" value="<?= $dtl->penulis ?>" name="penulis" />
                                <input type="hidden" value="<?= $dtl->id_kategori ?>" name="id_kategori" />
                                <input type="hidden" value="<?= $dtl->buku ?>" name="buku" />
                                <button type="input" style="text-transform: capitalize;" class="btn btn-danger pull-right">Kembali</button>
                            </form>
                        </div>

                    </div>
                </div>
                <div class="modal-body">
                </div>
                <div class="modal-footer">

                </div>
            </div>
        </div>
    </div>


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
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC2kqVASiPcNKDyOzplhdKjqPXQqnxXw2E&callback=initMap">
    </script>
    <script>
        function initMap() {
            var uluru = {
                lat: -7.0996619,
                lng: 113.4728553
            };
            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 9,
                center: uluru
            });

            var contentString = '<div id="content">' +
                '<div id="siteNotice">' +
                '</div>' +
                '<h3 id="firstHeading" class="firstHeading">IAI Al-Khairat</h3>' +
                '</div>' +
                '</div>';

            var infowindow = new google.maps.InfoWindow({
                content: contentString
            });

            var marker = new google.maps.Marker({
                position: uluru,
                map: map,
                title: 'IAI Al-Khairat (Ayers Rock)'
            });
            marker.addListener('click', function() {
                infowindow.open(map, marker);
            });
        }
    </script>
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
    <script type="text/javascript" src="http://malsup.github.com/jquery.media.js"></script>
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
    <script>
        $(function() {
            $(document).on('click', '.edit-record', function(e) {
                e.preventDefault();
                $("#myModal").modal('show');
                $.post('<?php echo base_url('pengguna/pdf') ?>', {
                        id: $(this).attr('data-id')
                    },
                    function(html) {
                        $(".modal-body").html(html);
                    }
                );
            });
        });
    </script>

</body>

</html>