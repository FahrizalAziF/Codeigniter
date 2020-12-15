<body class="">
    <div class="preloader">
        <div class="loading">
            <img src="<?= base_url('assets/img/loading.gif') ?>" width="80">
            <p>Harap Tunggu</p>
        </div>
    </div>
    <nav class="navbar navbar-expand-lg navbar-light " style="background-color: #417B97;">
        <div class="container">
            <span class="navbar-text" style="text-align: right;">

            </span>
            <?php
            $id_pembeli = $this->session->userdata('id_user');
            $username = $this->session->userdata('username');
            if ($id_pembeli == 1) {
            ?>
                <div class="dropdown">
                    <span class="navbar-text mr-3" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <a href="" style="color: whitesmoke;">
                            <i class=" fa fa-user"></i>
                            Admin Disper</a>
                    </span>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="<?= base_url() ?>Admin/profile"><i class="fa fa-user"></i> Profile Anda</a>
                        <a class="dropdown-item" href="<?= base_url() ?>Login/logout"><i class=" fas fa-sign-out-alt"></i>Logout</a>
                    </div>
                </div>
            <?php } else if ($id_pembeli == 2) { ?>
                <div class="dropdown">
                    <span class="navbar-text mr-3" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <a href="" style="color: whitesmoke;">
                            <i class=" fa fa-user"></i>
                            Admin Pasar</a>
                    </span>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="<?= base_url() ?>Login/logout"><i class=" fas fa-sign-out-alt"></i>Logout</a>
                    </div>
                </div>
            <?php } else if ($id_pembeli == 3) { ?>
                <div class="dropdown">
                    <span class="navbar-text mr-3" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <a href="" style="color: whitesmoke;">
                            <i class=" fa fa-user"></i>
                            Admin Toko</a>
                    </span>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="<?= base_url() ?>Toko/profile"><i class="fa fa-user"></i> Profile Anda</a>
                        <a class="dropdown-item" href="<?= base_url() ?>Login/logout"><i class=" fas fa-sign-out-alt"></i>Logout</a>
                    </div>
                </div>
            <?php } else if ($id_pembeli == 4) { ?>
                <div class="dropdown">
                    <span class="navbar-text mr-3" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <a href="">
                            <i class=" fa fa-user"></i>
                            <?= $username ?></a>
                    </span>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="<?= base_url() ?>Pembeli/profile"><i class="fa fa-user"></i> Profile Anda</a>
                        <a class="dropdown-item" href="<?= base_url() ?>Keranjang/transaksi"><i class="fas fa-credit-card"></i> Transaksi Anda</a>
                        <a class="dropdown-item" href="<?= base_url() ?>Login/logout"><i class=" fas fa-sign-out-alt"></i>Logout</a>
                    </div>
                </div>
            <?php } else { ?>
                <div class="row">
                    <div class="dropdown">
                        <span class="navbar-text" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <a href="" style="color: whitesmoke;">
                                <i class="fas fa-registered"></i>
                                Daftar</a>
                        </span>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="<?= base_url() ?>Daftar"><i class=" fas fa-user"></i> Pembeli</a>
                            <a class="dropdown-item" href="<?= base_url() ?>Daftar/daftarAdminToko"><i class="fas fa-user-cog"></i> Admin Toko</a>
                        </div>
                    </div>
                    <span class="navbar-text ml-3 mr-3">
                        <a href="<?= base_url() ?>Login" style="color: whitesmoke;">
                            <i class="fa fa-user"></i>
                            Login</a>
                    </span>
                </div>

            <?php } ?>
        </div>

    </nav>
    <nav class="navbar navbar-expand-lg navbar-light " style="background-color: #f1f2f6">
        <div class="container">
            <b><a class="navbar-brand" href="<?= base_url('Home') ?>"><img src="<?= base_url('assets/img/logo.png') ?>" style="width:50px;"> E-Pasar Pamekasan</a></b>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <?php
                    $id_pembeli = $this->session->userdata('id_user');
                    if ($id_pembeli == 4) {
                    ?>
                        <li class="nav-item active">
                            <a class="nav-link" href="<?= base_url() ?>Home/">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <!-- <li class="nav-item">
                            <a class="nav-link" href="#">Produk </a>
                        </li> -->
                    <?php } ?>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Tabel
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="<?= base_url('Pasar/harga_perpasar') ?>">Harga per Pasar</a>
                            <?php
                            if ($id_pembeli == "2") {
                            ?>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="<?= base_url('Pasar/harga_pasar') ?>"><i class="fa fa-plus" aria-hidden="true"></i> Tambah Data</a>
                            <?php } ?>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Grafik
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="<?= base_url('Pasar/grafik_harga') ?>">Harga per Pasar</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Stok
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="<?= base_url('Stok/') ?>">Stok</a>
                            <?php
                            if ($id_pembeli == "2") {
                            ?>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="<?= base_url('Stok/stok_pasar') ?>"><i class="fa fa-plus" aria-hidden="true"></i> Tambah Data</a>
                            <?php } ?>
                        </div>
                    </li>
                    <?php
                    $id_pembeli = $this->session->userdata('id_user');
                    if ($id_pembeli == 1) {
                    ?>
                        <li class="nav-item ">
                            <a class="nav-link " href="<?= base_url() ?>Admin/kelola_pasar" role="button" aria-haspopup="true" aria-expanded="false">
                                Kelola Pasar
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link " href="<?= base_url() ?>Admin/kategori" role="button" aria-haspopup="true" aria-expanded="false">
                                Produk
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link " href="<?= base_url() ?>Admin/kurir" role="button" aria-haspopup="true" aria-expanded="false">
                                Kurir </a>
                        </li>
                    <?php } else if ($id_pembeli == 2) { ?>
                        <li class="nav-item ">
                            <a class="nav-link " href="<?= base_url() ?>Toko/" role="button" aria-haspopup="true" aria-expanded="false">
                                Pasar Anda
                            </a>
                        </li>
                    <?php } ?>

                </ul>
                <form class="mr-1" method="post" action="<?= base_url('Pasar/display_harga') ?>">
                    <?php
                    $qry = $this->db->get('tbl_pasar')->row();
                    ?>
                    <input name="id_pasar" value="<?= $qry->id_pasar ?>" hidden>
                    <input name="tgl_input" hidden value="<?= date('Y-d-m') ?>">
                    <button class="btn btn-info " type="submit">
                        Display
                    </button>
                </form>
                <form class="form-inline my-2 my-lg-0" method="post" action="<?= base_url('Pencarian/') ?>">
                    <input class="form-control mr-sm-2" type="search" name="produk" placeholder="Cari produk" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
                <?php
                if ($id_pembeli == 1) {
                ?>
                    <span class="navbar-text ml-3">

                        <a href="<?= base_url() ?>Admin/transaksi"><i class="fa fa-money" aria-hidden="true"></i><span>

                                <?php
                                $this->db->select('COUNT(id_transaksi) as jml');
                                $this->db->where('status', '1');
                                $trans = $this->db->get('tbl_transaksi')->row();
                                echo $trans->jml;
                                ?>
                            </span></a>
                    </span>
                <?php } else { ?>
                    <span class="navbar-text ml-3">

                        <a href="<?= base_url() ?>Keranjang/"><i class="fa fa-shopping-bag"></i> <span>

                                <?php
                                $id_akun = $this->session->userdata('id_akun');
                                $this->db->select('COUNT(id_keranjang) as jumlah');
                                $this->db->where('id_akun', $id_akun);
                                $this->db->where('status', 'Belum');
                                $keranjang = $this->db->get('tbl_keranjang')->row();
                                if ($id_akun) {
                                    echo  $keranjang->jumlah;
                                } else {
                                    echo "0";
                                }
                                ?>
                            </span></a>
                    </span>
                <?php } ?>

            </div>
        </div>
    </nav>