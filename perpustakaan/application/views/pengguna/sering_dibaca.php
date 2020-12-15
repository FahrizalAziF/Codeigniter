<!-- css -->
<link href="<?php echo base_url('pengguna/css/bootstrap.min.css') ?>" rel="stylesheet" type="text/css">
<link href="<?php echo base_url('pengguna/font-awesome/css/font-awesome.min.css') ?>" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url('pengguna/plugins/cubeportfolio/css/cubeportfolio.min.css') ?>">
<link href="<?php echo base_url('pengguna/css/nivo-lightbox.css" rel="stylesheet') ?>" />
<link href="<?php echo base_url('pengguna/css/nivo-lightbox-theme/default/default.css') ?>" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url('pengguna/css/owl.carousel.css') ?>" rel="stylesheet" media="screen" />
<link href="<?php echo base_url('pengguna/css/owl.theme.css') ?>" rel="stylesheet" media="screen" />
<link href="<?php echo base_url('pengguna/css/animate.css') ?>" rel="stylesheet" />
<link href="<?php echo base_url('pengguna/css/style.css') ?>" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
        width: 168px;
        height: 273px;


    }

    .card {
        margin-bottom: 10px;
    }
</style>
<div>
    <div class="wow lightSpeedIn">
        <div class="row" style="margin-bottom: 50px;">
            <div class="col-lg-12">
                <div class="halaman">
                    <?php foreach ($baca as $a) : ?>
                        <div class="col-sm-2 col-md-2 col-lg-2 col-xs-6">
                            <div class="card"><a class="button" href="<?php echo base_url('pengguna/detail/' . $a->id_buku) ?>">
                                    <div class="buku">
                                        <img class="card-img-top " src="<?php echo base_url('./upload/cover/' . $a->cover) ?>" alt="Card image cap"></div>
                                    <div class="crd card-body">
                                        <p class="card-title"><b style="color: #00bac7;"><?php echo $a->nama_buku ?>
                                </a></b>
                                <br>
                                <p class="card-title" style="font-size: 12px;"><?php echo $a->penulis ?></p>
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