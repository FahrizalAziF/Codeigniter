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
              <h3>Edit Buku</h3>
            </div>

            <div class="title_right">
              <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                <div class="input-group">
                  <input type="text" style="border-radius: 10px;" class="form-control" placeholder="Search for...">
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
                  <form class="form-horizontal form-label-left input_mask" action="<?php echo base_url('admin/edit'); ?>" method="post" enctype="multipart/form-data">
                    <?php echo $this->session->flashdata('msg'); ?>
                    <div>
                      <input type="hidden" name="id" value="<?php echo $a->id_buku ?>">
                    </div>
                    <div class=" form-group">
                      <label class="col-md-3 col-sm-3 col-xs-12">Judul Buku *</label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                        <input type="text" style="border-radius: 10px;" class="form-control " required="required" name="nama_buku" placeholder="Judul Buku" value="<?php echo $a->nama_buku ?>">
                      </div>

                    </div>
                    <div class="form-group">
                      <label class="col-md-3 col-sm-3 col-xs-12">Penulis Buku</label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                        <input type="text" style="border-radius: 10px;" class="form-control" required="required" name="penulis" placeholder="Penulis Buku" value="<?php echo $a->penulis ?>">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class=" col-md-3 col-sm-3 col-xs-12">Kategori Buku</label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                        <select class="form-control" style="border-radius: 10px;" name="id_kategori" value="<?php echo $a->nama_buku ?>">
                          <option>--Pilih--</option>
                          <option value="1">Al-Qur'an</option>
                          <option value="2">Aqidah</option>
                          <option value="3">Hadist</option>
                          <option value="4">Ushul Fiqih</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-md-3 col-sm-3 col-xs-12">Buku Diterbitkan <span class="required">*</span>
                      </label>
                      <div class="col-md-3 col-sm-3 col-xs-12">
                        <input type="text" style="border-radius: 10px;" class="form-control has-feedback-left" id="single_cal3" placeholder="First Name" name="terbit" aria-describedby="inputSuccess2Status3">
                        <span class=" fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                        <span id="inputSuccess2Status3" class="sr-only">(success)</span>
                      </div>
                      <label class="col-md-2 col-sm-2 col-xs-12">Jumlah Halaman Buku <span class="required">*</span>
                      </label>
                      <div class="col-md-4 col-sm-4 col-xs-12">
                        <input type="number" style="border-radius: 10px;" class="form-control" name="halaman" required="required" placeholder="0" value="<?php echo $a->halaman ?>">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-md-3 col-sm-3 col-xs-12">File Buku <span class="required">*(max.20mb)</span>
                      </label>
                      <div class="col-md-3 col-sm-3 col-xs-12">
                        <input class="form-control col-md-7 col-xs-12" style="border-radius: 10px;" name="book" type="file">
                      </div>
                      <label class="col-md-2 col-sm-2 col-xs-12">Cover Buku <span class="required">*</span>
                      </label>
                      <div class="col-md-4 col-sm-4 col-xs-12">

                        <input class="form-control col-md-7 col-xs-12" style="border-radius: 10px;" name="cover" type="file" value="<?php echo $a->cover ?>">
                      </div>
                    </div>
                    <div class="ln_solid"></div>
                    <div class="form-group">
                      <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                        <button type="button" class="btn btn-primary" style="border-radius: 10px;">Cancel</button>
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