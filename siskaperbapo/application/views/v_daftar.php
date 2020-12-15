<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="<?= base_url('assets/img/logo.png') ?>">

    <title>E-Pasar Pamekasan</title>

    <!-- Bootstrap core CSS -->
    <link href="<?= base_url() ?>assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/dist/css/style.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">
</head>

<body class=" container text-center">
    <div class=" row col-md-12">
        <div class="col-md-6 ">
            <div>
                <img src=" <?= base_url() ?>assets/img/logo.png" style="height:100px;width:100px;">

            </div>
            <div>
                <h3>Selamat datang di</h3>

                <p>
                    <h2>E-Pasar Pamekasan</h2> Sistem Informasi yang menjual produk-produk pasar Pamekasann
                </p>

            </div>


        </div>
        <div class="col-md-6">
            <form method="post" action="<?= base_url() ?>Daftar/addPembeli">
                <?php echo $this->session->flashdata('message'); ?>
                <div class="card">
                    <div class="card-header">
                        Buat Akun
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <input class="form-control" minlength="1" maxlength="35" name="nama_lengkap" placeholder="Nama Lengkap" required>
                            </div>
                            <div class="form-group col-md-6">
                                <input class="form-control" name="no_hp" type="number" minlength="1" maxlength="15" placeholder="No HP" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <input style="height: 75px;" class="form-control" name="alamat" placeholder="Alamat" required>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <input class="form-control" name="username" minlength="1" maxlength="35" placeholder="Username" required>
                            </div>
                            <div class="form-group col-md-6">
                                <input class="form-control" name="password" minlength="1" maxlength="35" type="password" placeholder="Password" required>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-success" type="submit" style="float: right;">Daftar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>

</html>