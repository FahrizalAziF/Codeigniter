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
    <div class="  col-md-12">
        <div>
            <img src=" <?= base_url() ?>assets/img/logo.png" style="height:100px;width:100px;">

        </div>
        <div>

            <h3>Selamat datang di</h3>

            <p>
                <h2>E-Pasar Pamekasan</h2> Sistem Informasi yang menjual produk-produk pasar Pamekasan
            </p>

        </div>

        <?php echo $this->session->flashdata('message'); ?>
        <form method="post" action="<?= base_url() ?>Login/cekLogin">

            <div class="container text-center col-md-6  " style="padding: 25px;">
                <div class="mb-2">
                    <label class="container " style="text-align: left;">Username</label>
                    <input type="text" minlength="1" maxlength="35" class="form-control" placeholder="Username" name="username" required autofocus>
                </div>
                <div class="mt-3">
                    <label class="container " style="text-align: left;">Password</label>
                    <input type="password" minlength="1" maxlength="35" id="inputPassword" name="password" class="form-control" placeholder="Password" required>
                </div>
                <div class=" container text-center mt-4 col-md-6">
                    <button class="btn btn-primary btn-block" type="submit">Sign in</button>
                </div>
                <div>
                    <p class=" mt-1 text-muted">Or</p>
                </div>
                <div class="container text-center col-md-6">
                    <a href="<?= base_url() ?>Daftar" class="btn btn-primary btn-block" type="submit">Register</a>
                </div>
            </div>
        </form>


    </div>
</body>

</html>