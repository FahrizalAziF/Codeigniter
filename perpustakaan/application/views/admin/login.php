<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Perpus IAI Al-Khairat </title>
  <link rel="icon" type="image/png" href="<?php echo base_url('admin/build/images/book.png') ?>" />

  <!-- Bootstrap -->
  <link href="<?php echo base_url('admin/vendors/bootstrap/dist/css/bootstrap.min.css') ?>" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="<?php echo base_url('admin/vendors/font-awesome/css/font-awesome.min.css') ?>" rel="stylesheet">
  <!-- NProgress -->
  <link href="<?php echo base_url('admin/vendors/nprogress/nprogress.css') ?>" rel="stylesheet">
  <!-- Animate.css -->
  <link href="<?php echo base_url('admin/vendors/animate.css/animate.min.css') ?>" rel="stylesheet">

  <!-- Custom Theme Style -->
  <link href="<?php echo base_url('admin/build/css/custom.css') ?>" rel="stylesheet">

</head>


<body class="login">

  <div>
    <a class="hiddenanchor" id="signup"></a>
    <a class="hiddenanchor" id="signin"></a>

    <div class="login_wrapper">
      <div class="animate form login_form col-xs-6">
        <section class="login_content">
          <form action="<?php echo base_url('pengguna/aksi_login'); ?>" method="post">
            <h1>Login</h1></br>
            <?php echo $this->session->flashdata('msg'); ?>
            <?php echo $this->session->flashdata('daftar'); ?>
            <?php echo $this->session->flashdata('message'); ?>
            <div>
              <input type="text" style="border-radius: 10px;" class="form-control" placeholder="NIM / NIK" name="nim" required="" />
            </div>
            <div>
              <input type="password" style="border-radius: 10px;" class="form-control" placeholder="Password" name="password" required="" />
            </div>
            <div>
              <button class="btn btn-default" type="input">Log in</button>
            </div>

            <div class="clearfix"></div>

            <div class="separator">
              <p class="change_link">Belum punya akun?
                <a href="#signup" class="to_register"> Buat Akun </a>
              </p>

              <div class="clearfix"></div>
              <br />

              <div>
                <h4><img style="width: 40px; height:40px;" src="admin/build/images/book.png"> Perpustakaan IAI Al-Khairat</h4>
              </div>
            </div>
          </form>
        </section>
      </div>

      <div id="register" class="animate form registration_form col-xs-6">
        <section class="login_content">
          <form action="<?php echo base_url('pengguna/daftar'); ?>" method="post">
            <h1>Buat Akun</h1>
            <!--<div class="" style="margin-bottom: 10px;">
              <input type="radio" checked name="level" id="rad1" value="1" class="rad" /> Mahasiswa
              <input type="radio" name="level" id="rad2" value="2" class="rad" /> Masyarakat</div>-->
            <!-- form yang mau ditampilkan-->
            <div>
              <div class="row">
                <!--<div class="col-md-6 col-xs-6">
                  <input style="border-radius: 10px;" id="form1" class="form-control " placeholder="NIM" name="NIS" type="text" />
                </div>
                <div class="col-md-6 col-xs-6">
                  <select id="form3" style="border-radius: 10px; " class="form-control  " name="id_fakultas">
                    <option value=""> Pilih Prodi</option>
                    </?php foreach ($prodi as $p) : ?>
                      <option value="</?= $p->id_fakultas ?>"></?= $p->fakultas ?></option>
                    </?php endforeach; ?>
                  </select>
                </div>
              </div>-->
                <div>
                  <input style="border-radius: 10px;" value="0" class="form-control " placeholder="NIM" name="NIS" type="hidden" />
                  <input style="border-radius: 10px;" value="2" class="form-control " placeholder="NIM" name="level" type="hidden" />
                  <input style="border-radius: 10px;" value="" class="form-control " placeholder="NIM" name="id_fakultas" type="hidden" />
                  <input style="border-radius: 10px; " onkeypress="return hanyaAngka(event)" class="form-control" name="NIK" placeholder="NIK" type="text" />
                </div>
                <div class="row">
                  <div class="col-md-6 col-xs-6">
                    <input style="border-radius: 10px;" type="text" class="form-control " name="nama_depan" placeholder="Nama depan" required="" /></div>
                  <div class="col-md-6 col-xs-6">
                    <input style="border-radius: 10px;" type="text" class="form-control " name="nama_belakang" placeholder="Nama belakang" required="" /></div>
                </div>
                <div>
                  <div class="row">
                    <div class="col-md-6 col-xs-6">
                      <input style="border-radius: 10px;" type="text" class="form-control" name="tempat" placeholder="Tempat Lahir" required="" />
                    </div>
                    <div class="col-md-6 col-xs-6">
                      <input style="border-radius: 10px;" type="date" class="form-control" name="tanggal" placeholder="Tempat" required="" />
                    </div>
                  </div>
                </div>
                <div>
                  <input style="border-radius: 10px;" type="text" class="form-control" name="alamat" placeholder="Alamat" required="" />
                </div>
                <div>
                  <select style="border-radius: 10px;" class="form-control " name="jk" required="">
                    <option value="-">--Jenis Kelamin--</option>
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                  </select>
                </div><br>
                <div>
                  <input style="border-radius: 10px;" type="text" class="form-control" name="no_hp" onkeypress="return hanyaAngka(event)" placeholder="No HP" required="" />
                </div>
                <div>
                  <input style="border-radius: 10px;" type="password" class="form-control" name="password" placeholder="Password" required="" />
                </div>
                <div>
                  <button class="btn btn-default" type="input">Daftar</button>
                </div>

                <div class="clearfix"></div>

                <div class="separator">
                  <p class="change_link">Sudah punya akun ?
                    <a href="#signin" class="to_register"> Log in </a>
                  </p>

                  <div class="clearfix"></div>
                  <br />

                  <div>
                    <h3><img style="width: 40px; height:40px;" src="admin/build/images/book.png"> Perpustakaan IAI Al-Khairat</h3>
                  </div>
                </div>
          </form>
        </section>
      </div>
    </div>
  </div>

</body>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>
<!--<script type="text/javascript">
  $(function() {
    $(":radio.rad").click(function() {
      $("#form1, #form2, #form3").hide()
      if ($(this).val() == "1") {
        $("#form1").show();
        $("#form3").show();
      } else {
        $("#form2").show();
      }
    });
  });
</script>-->
<script>
  function hanyaAngka(evt) {
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))

      return false;
    return true;
  }
</script>

</html>