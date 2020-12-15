<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
    <div class="container navigation">

        <div class="navbar-header page-scroll">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand" href="index.html">
                <img src="<?php echo base_url('admin/build/images/logo_perpus.png') ?>" alt="" width="250" height="40" />
            </a>
        </div>


        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
            <ul class="nav navbar-nav">

                <li class="active"><a href="<?php echo base_url('pengguna/beranda') ?>">Beranda</a></li>

                <!--<li><a href="#service">Service</a></li>-->
                <li><a href="#kitab">Terbaru</a></li>
                <li><a href="#fasilitas">Terfavorit</a></li>
                <?php $ab =  $this->session->userdata('id_user') ?>
                <!--<li><a href="#pricing">Pricing</a></li>-->
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="badge custom-badge red pull-right"></span><i class="fa fa-user"></i> <?php echo  $this->session->userdata('nama_depan') ?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="<?php echo base_url('pengguna/koleksi/' . $ab) ?>"><i class="fa fa-shopping-cart"></i> Koleksi Buku</a></li>
                        <li><a href="<?= base_url('pengguna/akun') ?>"><i class="fa fa-cog"></i> Akun</a></li>
                        <li><a href="<?php echo base_url('pengguna/logout') ?>"><i class="fa fa-sign-out"></i> Keluar</a></li>


                    </ul>
                </li>

            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>