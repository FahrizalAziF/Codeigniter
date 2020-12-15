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
            height: 209px;

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
                                <div class="detail" style="text-align: center">
                                    <img class="" src="<?php echo base_url('pengguna/img/man.png') ?>" alt="Card image cap"></div><br>
                            </div>
                        </div>
                        <div class="col-md-9 col-sm-8 col-xs-12 ">
                            <div style="text-align:center;">
                                <h1 style="color:black" style="font-size:18px;"><b><?php echo $akun->nama_depan ?> <?php echo $akun->nama_belakang ?></b></h1>
                            </div>
                            <?php echo $this->session->flashdata('ubah'); ?>
                            <br>
                            <div class="row">
                                <div class="col-ls-3 col-md-3 col-xs-6">
                                    <p>Tempat/Tanggal Lahir</p>
                                </div>
                                <div class="col-md-3 col-ls-3 col-xs-6">
                                    <p><?php echo $akun->tempat_lahir ?>,<?php echo $akun->tanggal_lahir ?></p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-ls-3 col-md-3 col-xs-6">
                                    <p>No Hp</p>
                                </div>
                                <div class="col-md-3 col-ls-3 col-xs-6">
                                    <p><?php echo $akun->no_hp ?></p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-ls-3 col-md-3 col-xs-6">
                                    <p>Jenis Kelamin</p>
                                </div>
                                <div class="col-md-4 col-ls-4 col-xs-6">
                                    <p><?php echo $akun->jk ?></p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-ls-3 col-md-3 col-xs-6">
                                    <p>Alamat</p>
                                </div>
                                <div class="col-md-4 col-ls-4 col-xs-6">
                                    <p><?php echo $akun->alamat ?></p>
                                </div>
                                <div class="col-md-2 col-ls-2 col-xs-12 pull-right">
                                    <button class="btn btn-info" style="border-radius: 16px; text-transform: capitalize;" data-toggle="modal" data-target="#myModal<?php echo $akun->id_user ?>"><i class="fa fa-edit" style="font-size: 16px; "> </i> Ubah</button>
                                </div>
                            </div><br>
                            <div class="row">
                                <div class="col-ls-3 col-md-3 col-xs-12">
                                    <button class="btn btn-info" style="border-radius: 16px; text-transform: capitalize;" data-toggle="modal" data-target="#myPass<?php echo $akun->id_user ?>"><i class="fa fa-key" style="font-size: 16px; "> </i> Ubah Password</button>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
    </div>
    </section>
    <!-- Modal -->
    <?php

    foreach ($akn as $b) :   ?>
        <div id="myModal<?php echo $akn->id_user ?>" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <!-- konten modal-->
                <div class="modal-content">
                    <!-- heading modal -->
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h5 class="modal-title">Hapus buku dari koleksi?</h5>
                    </div>
                    <!-- body modal -->
                    <div class="modal-body">
                        <div style="padding: 50px">
                            <form action="<?php echo base_url('pengguna/ubahAkun'); ?>" method="post" enctype="multipart/form-data">
                                <div class="form-group row">
                                    <input name="id_user" type="hidden" value="<?php echo $akn->id_user ?>" />
                                    <input name="NIS" type="hidden" value="<?php echo $akn->NIS ?>" />
                                    <input name="NIK" type="hidden" value="<?php echo $akn->NIK ?>" />
                                    <input name="password" type="hidden" value="<?php echo $akn->password ?>" />
                                    <input name="level" type="hidden" value="<?php echo $akn->level ?>" />
                                    <div class="col-md-6 col-xs-12">
                                        <label>Nama Depan</label>
                                        <input class="form-control" style="border-radius: 10px;" type="text" name="nama_depan" value="<?php echo $akn->nama_depan ?>">
                                    </div>
                                    <div class="col-md-6 col-xs-12">
                                        <label>Nama Belakanag</label>
                                        <input style="border-radius: 10px;" class="form-control" type="text" name="nama_belakang" value="<?php echo $akn->nama_belakang ?>">
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label>No Hp</label>
                                    <input style="border-radius: 10px;" class="form-control" type="number" name="no_hp" value="<?php echo $akn->no_hp ?>">
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6 col-xs-12">
                                        <label>Tempat</label>
                                        <input class="form-control" style="border-radius: 10px;" type="text" name="tempat_lahir" value="<?php echo $akn->tempat_lahir ?>">
                                    </div>
                                    <div class="col-md-6 col-xs-12">
                                        <label>Tanggal Lahir</label>
                                        <input style="border-radius: 10px;" class="form-control" type="date" name="tanggal_lahir" value="<?php echo $akn->tanggal_lahir ?>">
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label>Alamat</label>
                                    <textarea class="form-control" style="border-radius: 10px;" type="text" name="alamat"><?php echo $akn->tempat_lahir ?></textarea>
                                </div>
                                <div class="form-group ">
                                    <label>Jenis Kelamin</label>
                                    <select name="jk" class="form-control" name="jk">
                                        <option value="-">--Pilih--</option>
                                        <option value="Laki-laki">Laki-laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                </div>

                                <div class="pull-right">
                                    <button class="btn btn-info" style="text-transform: capitalize;" type="input">Simpan</button>
                                    <a data-dismiss="modal" class="btn btn-danger" style="text-transform: capitalize;"> Tidak</a>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- footer modal -->
                    <div class="modal-footer">

                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>

    <!-- Passs-->
    <?php

    foreach ($pass as $b) :   ?>
        <div id="myPass<?php echo $akn->id_user ?>" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <!-- konten modal-->
                <div class="modal-content">
                    <!-- heading modal -->
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h5 class="modal-title">Hapus buku dari koleksi?</h5>
                    </div>
                    <!-- body modal -->
                    <div class="modal-body">
                        <div style="padding: 50px">
                            <form action="<?php echo base_url('pengguna/ubahPassword'); ?>" method="post" enctype="multipart/form-data">
                                <div class="form-group row">
                                    <input name="id_user" type="hidden" value="<?php echo $akn->id_user ?>" />
                                    <div class="col-md-12 col-xs-12">
                                        <label>Password Baru</label>
                                        <input class="form-control" style="border-radius: 10px;" type="text" name="password" placeholder="Password Baru">
                                    </div>
                                </div>
                                <div class="pull-right">
                                    <button class="btn btn-info" style="text-transform: capitalize;" type="input">Simpan</button>
                                    <a data-dismiss="modal" class="btn btn-danger" style="text-transform: capitalize;"> Tidak</a>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- footer modal -->
                    <div class="modal-footer">

                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>


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