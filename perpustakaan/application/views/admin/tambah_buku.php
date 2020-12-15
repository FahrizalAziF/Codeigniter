<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/png" href="<?php echo base_url('admin/build/images/book.png') ?>" />

  <title>Peprustakaan IAI Al-Khairat</title>

  <!-- Bootstrap -->
  <link href="<?php echo base_url('admin/vendors/bootstrap/dist/css/bootstrap.min.css') ?>" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="<?php echo base_url('admin/vendors/font-awesome/css/font-awesome.min.css') ?>" rel="stylesheet">
  <!-- NProgress -->
  <link href="<?php echo base_url('admin/vendors/nprogress/nprogress.css') ?>" rel="stylesheet">
  <!-- iCheck -->
  <link href="<?php echo base_url('admin/vendors/iCheck/skins/flat/green.css') ?>" rel="stylesheet">
  <!-- bootstrap-wysiwyg -->
  <link href="<?php echo base_url('admin/vendors/google-code-prettify/bin/prettify.min.css') ?>" rel="stylesheet">
  <!-- Select2 -->
  <link href="<?php echo base_url('admin/vendors/select2/dist/css/select2.min.css') ?>" rel="stylesheet">
  <!-- Switchery -->
  <link href="<?php echo base_url('admin/vendors/switchery/dist/switchery.min.css') ?>" rel="stylesheet">
  <!-- starrr -->
  <link href="<?php echo base_url('admin/vendors/starrr/dist/starrr.css') ?>" rel="stylesheet">
  <!-- bootstrap-daterangepicker -->
  <link href="<?php echo base_url('admin/vendors/bootstrap-daterangepicker/daterangepicker.css') ?>" rel="stylesheet">

  <!-- Custom Theme Style -->
  <link href="<?php echo base_url('admin/build/css/custom.min.css') ?>" rel="stylesheet">
</head>

<body class="nav-md">
  <div class="container body">
    <div class="main_container">
      <div class="col-md-3 left_col">
        <div class="left_col scroll-view">
          <div class="navbar nav_title" style="border: 0;">
            <a href="index.html" class="site_title">Perpus IAI Al-Khairat</span></a>
          </div>

          <div class="clearfix"></div>

          <?php
          include('header.php')
          ?>
        </div>
      </div>

      <!-- top navigation -->
      <div class="top_nav">
        <div class="nav_menu">
          <nav>
            <div class="nav toggle">
              <a id="menu_toggle"><i class="fa fa-bars"></i></a>
            </div>

            <ul class="nav navbar-nav navbar-right">
              <li class="">
                <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                  <img src="images/img.jpg" alt="">Admin
                  <span class=" fa fa-angle-down"></span>
                </a>
                <ul class="dropdown-menu dropdown-usermenu pull-right">
                  <li>
                    <a href="<?php echo base_url('admin/logout') ?>"> <i class="fa fa-sign-out pull-right"></i> Log Out</a>
                  </li>
                </ul>
              </li>
            </ul>
          </nav>
        </div>
      </div>
      <!-- /top navigation -->

      <!-- page content -->
      <div class="right_col" role="main">
        <div class="">
          <div class="page-title">
            <div class="title_left">
              <h3>Tambah Buku Baru</h3>
            </div>

            <div class="title_right">
              <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                <div class="input-group">
                  <input type="text" class="form-control" placeholder="Search for...">
                  <span class="input-group-btn">
                    <button class="btn btn-default" type="button">Go!</button>
                  </span>
                </div>
              </div>
            </div>
          </div>
          <div class="clearfix"></div>
          <div class="row">
            <div class="col-md-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Isi Dengan Benar <small>(*) Tidak boleh kosong</small></h2>

                  <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                      <ul class="dropdown-menu" role="menu">
                        <li><a href="#">Settings 1</a>
                        </li>
                        <li><a href="#">Settings 2</a>
                        </li>
                      </ul>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                  </ul>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <br />
                  <form class="form-horizontal form-label-left input_mask" action="<?php echo base_url('admin/add_buku'); ?>" method="post" enctype="multipart/form-data">
                    <?php echo $this->session->flashdata('msg'); ?>
                    <?php echo $this->session->flashdata('tambah'); ?>
                    <div class="form-group">
                      <label class="col-md-3 col-sm-3 col-xs-12">Judul Buku *</label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                        <input type="text" style="border-radius: 10px;" class="form-control " required="required" name="nama_buku" placeholder="Judul Buku">
                      </div>

                    </div>
                    <div class="form-group">
                      <label class="col-md-3 col-sm-3 col-xs-12">Penulis Buku</label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                        <input type="text" style="border-radius: 10px;" class="form-control" required="required" name="penulis" placeholder="Penulis Buku">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class=" col-md-3 col-sm-3 col-xs-12">Kategori Buku</label>
                      <div class="col-md-5 col-sm-6 col-xs-10">
                        <select class="form-control" style="border-radius: 10px;" name="id_kategori">
                          <option>--Pilih--</option>
                          <?php
                          foreach ($kategori as $k) : ?>
                            <option value="<?= $k->id_kategori ?>"><?= $k->kategori ?></option>
                          <?php
                          endforeach; ?>
                        </select>
                      </div>
                      <div class="col-md-2">
                        <a href="" data-toggle="modal" data-target="#myModal" class="btn btn-primary">Tambah Kategori</a>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-md-3 col-sm-3 col-xs-12">Buku Diterbitkan <span class="required">*</span>
                      </label>
                      <div class="col-md-3 col-sm-3 col-xs-12">
                        <input type="text" style="border-radius: 10px;" class="form-control has-feedback-left" id="single_cal3" placeholder="First Name" name="terbit" aria-describedby="inputSuccess2Status3">
                        <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                        <span id="inputSuccess2Status3" class="sr-only">(success)</span>
                      </div>
                      <label class="col-md-2 col-sm-2 col-xs-12">Jumlah Halaman Buku <span class="required">*</span>
                      </label>
                      <div class="col-md-4 col-sm-4 col-xs-12">
                        <input type="number" style="border-radius: 10px;" class="form-control" name="halaman" required="required" placeholder="0">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-md-3 col-sm-3 col-xs-12">File Buku <span class="required">*(max.1024 Mb)</span>
                      </label>
                      <div class="col-md-3 col-sm-3 col-xs-12">
                        <input class="form-control col-md-7 col-xs-12" style="border-radius: 10px;" name="book" type="file">
                      </div>
                      <label class="col-md-2 col-sm-2 col-xs-12">Cover Buku (Lebar : 530px, Tinggi :280px) <span class="required">*</span><br>

                      </label>
                      <div class="col-md-4 col-sm-4 col-xs-12">
                        <input class="form-control col-md-7 col-xs-12" style="border-radius: 10px;" name="cover" type="file">
                      </div>
                    </div>
                    <div class="ln_solid"></div>
                    <div class="form-group">
                      <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                        <button type="button" style="border-radius: 10px;" class="btn btn-primary">Cancel</button>
                        <button class="btn btn-primary" style="border-radius: 10px;" type="reset">Reset</button>
                        <input class="btn btn-success" style="border-radius: 10px;" type="submit" name="btn" value="Save" />
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- /page content -->
      <div id="myModal" class="modal fade" role="dialog">

        <div class="modal-dialog">
          <!-- konten modal-->
          <div class="modal-content">
            <!-- heading modal -->
            <div class="modal-header">
              <h5 class="modal-title">Tambah Kategori ?</h5>
            </div>
            <form action="<?php echo base_url('Admin/kategori'); ?>" method="post" enctype="multipart/form-data">
              <!-- body modal -->
              <div class="modal-body" style="text-align: center;">
                <div style="padding: 50px">



                  <div style="text-align: center;">

                    <div class="form-group">
                      <label class="col-md-3 col-sm-3 col-xs-12">Kategori</label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                        <input type="text" style="border-radius: 10px;" class="form-control" required="required" name="kategori" placeholder="Nama Kategori">
                      </div>
                    </div>
                  </div><br>
                  <!--<input type="hidden" name="nama_depan" value="<//?php echo $this->session->userdata('nama_depan') ?>">-->


                </div>
              </div>
              <!-- footer modal -->
              <div class="modal-footer">
                <button class="btn btn-success" style="text-transform: capitalize; border-radius: 20px;" type="input">Iya</button>
                <a data-dismiss="modal" class="btn btn-info" style="text-transform: capitalize; border-radius: 20px; color:#fff;"> Batal</a>
              </div>
            </form>
          </div>
        </div>
      </div>


      <!-- footer content -->
      <footer>
        <div class="pull-right">
          Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
        </div>
        <div class="clearfix"></div>
      </footer>
      <!-- /footer content -->
    </div>
  </div>

  <!-- jQuery -->
  <script src="<?php echo base_url('admin/vendors/jquery/dist/jquery.min.js') ?>"></script>
  <!-- Bootstrap -->
  <script src="<?php echo base_url('admin/vendors/bootstrap/dist/js/bootstrap.min.js') ?>"></script>
  <!-- FastClick -->
  <script src="<?php echo base_url('admin/vendors/fastclick/lib/fastclick.js') ?>"></script>
  <!-- NProgress -->
  <script src="<?php echo base_url('admin/vendors/nprogress/nprogress.js') ?>"></script>
  <!-- bootstrap-progressbar -->
  <script src="<?php echo base_url('admin/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js') ?>"></script>
  <!-- iCheck -->
  <script src="<?php echo base_url('admin/vendors/iCheck/icheck.min.js') ?>"></script>
  <!-- bootstrap-daterangepicker -->
  <script src="<?php echo base_url('admin/vendors/moment/min/moment.min.js') ?>"></script>
  <script src="<?php echo base_url('admin/vendors/bootstrap-daterangepicker/daterangepicker.js') ?>"></script>
  <!-- bootstrap-wysiwyg -->
  <script src="<?php echo base_url('admin/vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js') ?>"></script>
  <script src="<?php echo base_url('admin/vendors/jquery.hotkeys/jquery.hotkeys.js') ?>"></script>
  <script src="<?php echo base_url('admin/vendors/google-code-prettify/src/prettify.js') ?>"></script>
  <!-- jQuery Tags Input -->
  <script src="<?php echo base_url('admin/vendors/jquery.tagsinput/src/jquery.tagsinput.js') ?>"></script>
  <!-- Switchery -->
  <script src="<?php echo base_url('admin/vendors/switchery/dist/switchery.min.js') ?>"></script>
  <!-- Select2 -->
  <script src="<?php echo base_url('admin/vendors/select2/dist/js/select2.full.min.js') ?>"></script>
  <!-- Parsley -->
  <script src="<?php echo base_url('admin/vendors/parsleyjs/dist/parsley.min.js') ?>"></script>
  <!-- Autosize -->
  <script src="<?php echo base_url('admin/vendors/autosize/dist/autosize.min.js') ?>"></script>
  <!-- jQuery autocomplete -->
  <script src="<?php echo base_url('admin/vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js') ?>"></script>
  <!-- starrr -->
  <script src="<?php echo base_url('admin/vendors/starrr/dist/starrr.js') ?>"></script>
  <!-- Custom Theme Scripts -->
  <script src="<?php echo base_url('admin/build/js/custom.min.js') ?>"></script>

</body>

</html>