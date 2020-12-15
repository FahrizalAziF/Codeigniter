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
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
  <link href="https://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">
  <!-- NProgress -->
  <link href="<?php echo base_url('admin/vendors/nprogress/nprogress.css') ?>" rel="stylesheet">
  <!-- iCheck -->
  <link href="<?php echo base_url('admin/vendors/iCheck/skins/flat/green.css') ?>" rel="stylesheet">

  <link rel="stylesheet" href="<?php echo base_url() . 'admin/vendors/morris/morris.css' ?>">
  <!-- bootstrap-progressbar -->
  <link href="<?php echo base_url('admin/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css') ?>" rel="stylesheet">
  <!-- JQVMap -->
  <link href="<?php echo base_url('admin/vendors/jqvmap/dist/jqvmap.min.css') ?>" rel="stylesheet" />
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
          //$data["k"] = $this->db->get('kategori')->result();
          $this->load->view('admin/header');
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
        <!-- top tiles -->
        <div class="row tile_count">
          <div class="col-md-6 col-sm-8 col-xs-12 tile_stats_count">
            <img src="<?php echo base_url('admin/build/images/logo_perpus.png') ?>" style="width:100%; height:80px;">
          </div>
          <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
            <span class="count_top"><i class="fa fa-user"></i> Total Mahasiswa</span>

            <div class="count"><?php
                                $this->db->select('COUNT(users.id_user) as total');
                                $this->db->where('users.level', '1');
                                $this->db->group_by('level');
                                $jum_sis = $this->db->get('users')->row_array();
                                ?>
              <?php
              if ($jum_sis['total'] == null) {
                echo "0";
              } else {
                echo $jum_sis['total'];
              }
              ?>
            </div>

          </div>
          <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
            <span class="count_top"><i class="fa fa-users"></i> Total Masyarakat</span>
            <div class="count"><?php
                                $this->db->select('COUNT(users.id_user) as total');
                                $this->db->where('users.level', '2');
                                $this->db->group_by('level');
                                $jum_sis = $this->db->get('users')->row_array();
                                ?>
              <?php
              if ($jum_sis['total'] == null) {
                echo "0";
              } else {
                echo $jum_sis['total'];
              }
              ?></div>

          </div>
          <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
            <span class="count_top"><i class="fa fa-book"></i> Jumlah Buku</span>
            <?php foreach ($jum_buku as $a) : ?>
              <div class="count"><?php echo $a->total_buku ?></div><?php endforeach ?>
          </div>


        </div>
        <!-- /top tiles -->

        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="dashboard_graph">
              <div class="row x_title">
                <div class="card">
                  <h3 class="card-header" style="background:#16a085; color:#fff; padding:10px;"><small style="color:#fff;">Grafik Perpustakaan IAI Al-Khairat </small>
                  </h3><br>
                  <div class="col-md-12 col-sm-8 col-xs-12">
                    <div id="graph"></div>
                  </div>
                  <div class="col-md-6 col-sm-8 col-xs-12">
                    <div id="graph2"></div>
                  </div>
                  <div class="col-md-6 col-sm-4 col-xs-12">
                    <div id="container5"> </div>
                  </div>
                  <div class="col-md-12 col-sm-8 col-xs-12">
                    <div id="graph2"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <br />


        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            Bikea-Technocraft
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>



    <!-- jQuery -->
    <script src="<?php echo base_url('admin/vendors/jquery/dist/jquery.min.js') ?>"></script>

    <script src="<?= base_url('admin/vendors/custom/highcharts.js" type="text/javascript') ?>"></script>
    <script src="<?= base_url('admin/vendors/custom/exporting.js" type="text/javascript') ?>"></script>
    <script type="text/javascript">
      var chart1; // globally available
      $(document).ready(function() {
        chart1 = new Highcharts.Chart({
          chart: {
            renderTo: 'graph',
            type: 'column'
          },
          title: {
            text: 'Pengunjung Perpustakaan Per-Fakultas'
          },
          xAxis: {
            categories: ['Fakultas']
          },
          yAxis: {
            title: {
              text: 'Jumlah Pengunjung'
            }
          },
          series: [
            <?php foreach ($chart as $a) { ?> {
                name: '<?php echo $a->fakultas; ?>',
                data: [<?php echo $a->jumlah; ?>]
              },
            <?php } ?>
          ]
        });
      });
    </script>

    <script type="text/javascript">
      var chart1; // globally available
      $(document).ready(function() {
        chart1 = new Highcharts.Chart({
          chart: {
            renderTo: 'graph2',
            type: 'column'
          },
          title: {
            text: 'Pengunjung Perpustakaan'
          },
          xAxis: {
            categories: ['Kategori']
          },
          yAxis: {
            title: {
              text: 'Jumlah Pengunjung'
            }
          },
          series: [
            <?php foreach ($umum as $a) { ?> {
                name: '<?php echo $a->pengunjung; ?>',
                data: [<?php echo $a->jumlah; ?>]
              },
            <?php } ?>
          ]
        });
      });
    </script>
    <script type="text/javascript">
      $(function() {
        $('#container5').highcharts({
          chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false
          },
          title: {
            text: 'Kategori Buku yang Sering Dibaca'
          },
          tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
          },
          plotOptions: {
            pie: {
              allowPointSelect: true,
              cursor: 'pointer',
              dataLabels: {
                enabled: true,
                format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                style: {
                  color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                }
              }
            }
          },
          series: [{
            type: 'pie',
            name: 'Persentase Buku Favorit',
            data: [
              <?php
              // data yang diambil dari database
              if (count($buku) > 0) {
                foreach ($buku as $data) {
                  echo "['" . $data->kategori . "'," . $data->total . "],\n";
                }
              }
              ?>
            ]
          }]
        });
      });
    </script>
    <!-- Bootstrap -->
    <script src="<?php echo base_url('admin/vendors/bootstrap/dist/js/bootstrap.min.js') ?>"></script>
    <!-- FastClick -->
    <script src="<?php echo base_url('admin/vendors/fastclick/lib/fastclick.js') ?>"></script>
    <!-- NProgress -->
    <script src="<?php echo base_url('admin/vendors/nprogress/nprogress.js') ?>"></script>
    <!-- Chart.js -->
    <script src="<?php echo base_url('admin/vendors/Chart.js/dist/Chart.min.js') ?>"></script>
    <!-- gauge.js -->
    <script src="<?php echo base_url('admin/vendors/gauge.js/dist/gauge.min.js') ?>"></script>
    <!-- bootstrap-progressbar -->
    <script src="<?php echo base_url('admin/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js') ?>"></script>
    <!-- iCheck -->
    <script src="<?php echo base_url('admin/vendors/iCheck/icheck.min.js') ?>"></script>
    <!-- Skycons -->
    <script src="<?php echo base_url('admin/vendors/skycons/skycons.js') ?>"></script>
    <!-- Flot -->
    <script src="<?php echo base_url('admin/vendors/Flot/jquery.flot.js') ?>"></script>

    <script src="<?php echo base_url('admin/vendors/Flot/jquery.flot.pie.js') ?>"></script>
    <script src="<?php echo base_url('admin/vendors/Flot/jquery.flot.time.js') ?>"></script>
    <script src="<?php echo base_url('admin/vendors/Flot/jquery.flot.stack.js') ?>"></script>
    <script src="<?php echo base_url('admin/vendors/Flot/jquery.flot.resize.js') ?>"></script>
    <!-- Flot plugins -->
    <script src="<?php echo base_url('admin/vendors/flot.orderbars/js/jquery.flot.orderBars.js') ?>"></script>
    <script src="<?php echo base_url('admin/vendors/flot-spline/js/jquery.flot.spline.min.js') ?>"></script>
    <script src="<?php echo base_url('admin/vendors/flot.curvedlines/curvedLines.js') ?>"></script>
    <!-- DateJS -->
    <script src="<?php echo base_url('admin/vendors/DateJS/build/date.js') ?>"></script>
    <!-- JQVMap -->
    <script src="<?php echo base_url('admin/vendors/jqvmap/dist/jquery.vmap.js') ?>"></script>
    <script src="<?php echo base_url('admin/vendors/jqvmap/dist/maps/jquery.vmap.world.js') ?>"></script>
    <script src="<?php echo base_url('admin/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js') ?>"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="<?php echo base_url('admin/vendors/moment/min/moment.min.js') ?>"></script>
    <script src="<?php echo base_url('admin/vendors/bootstrap-daterangepicker/daterangepicker.js') ?>"></script>

    <!-- Custom Theme Scripts -->
    <script src="<?php echo base_url('admin/build/js/custom.min.js') ?>"></script>

</body>

</html>