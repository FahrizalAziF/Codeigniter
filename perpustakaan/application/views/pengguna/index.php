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
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,600,700,800|Roboto:400,500,700,900">
	<style type="text/css">
		.pembungkus {
			position: relative;


		}

		.pembungkus p {

			text-align: center;
			color: black;
			position: absolute;
		}
	</style>
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
			width: 100% !important;
			height: 250px;


		}


		.card {
			margin-bottom: 10px;
		}
	</style>
	<!-- boxed bg -->

	<!-- template skin -->
	<link id="t-colors" href="<?php echo base_url('pengguna/color/default.css') ?>" rel="stylesheet">

</head>

<body id="page-top" data-spy="scroll" data-target=".navbar-custom">

	<div id="wrapper">

		<?php
		include('header.php');
		?>

	</div>


	<!-- Section: intro -->
	<section id=" intro" class=" intro wow fadeInDown">
		<div class="intro-content">
			<div class="container">
				<div class="row">

					<div class="container col-md-8 col-md-offset-2">
						<div id="myCarousel" class="carousel slide" data-ride="carousel">
							<!-- Indicators -->
							<ol class="carousel-indicators">
								<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
								<li data-target="#myCarousel" data-slide-to="1"></li>
								<li data-target="#myCarousel" data-slide-to="2"></li>
							</ol>

							<!-- deklarasi carousel -->
							<div class=" carousel-inner" role="listbox">
								<div class="container item active" style="padding:5px;">
									<div class="row">
										<h3 style="text-align:center; color:aliceblue;"><b>Baca Buku Online</b></h3>
										<p style="text-align:center;color:aliceblue;">Perpustaka'an Al-Khairat</p><br><br><br>
									</div>

								</div>
								<div class="item" style="padding:5px;">
									<div class="row">
										<h3 style="text-align:center; color:aliceblue;"><b>Koleksi Buku Favoritmu</b></h3>
										<p style="text-align:center;color:aliceblue;">Perpustaka'an Al-Khairat</p><br><br><br>
									</div>
								</div>
								<div class="item" style="padding:5px;">
									<div class="row">
										<h3 style="text-align:center; color:aliceblue;"><b>Praktis dan Tanpa Biaya</b></h3>
										<p style="text-align:center; color:aliceblue;">Perpustaka'an Al-Khairat</p><br><br><br>
									</div>
								</div>
							</div>

							<!-- membuat panah next dan previous -->
							<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
								<span class="fa fa-chevron-circle-left" aria-hidden="true"></span>
								<span class="sr-only">Previous</span>
							</a>
							<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
								<span class="fa fa-chevron-circle-right" aria-hidden="true"></span>
								<span class="sr-only">Next</span>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- /Section: services -->
	<section style="background: white;">
		<div class="container">
			<div class="row">
				<div class="col-sm-12 col-md-12 col-lg-12">
					<div class="wow bounceInUp" data-wow-delay="0.2s">
						<div id="owl-works" class="owl-carousel">
							<?php foreach ($kategori as $k) : ?>
								<div style="position: relative;" class="tipe"><a href="<?php echo base_url('pengguna/kategori/' . $k->id_kategori) ?>">
										<p style="color: white;	position: absolute;padding:10px;"><b><?= $k->kategori ?></b></p><img src="<?php echo base_url('pengguna/img/kategori/bg_book.png') ?>" class="img-responsive" alt="img">
									</a></div>
							<?php endforeach ?>

						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- Section: team -->
	<section id="kitab" class="home-section bg-gray ">
		<div class="container">
			<div class="row">
				<div class="">
					<div class=" wow fadeInDown" data-wow-delay="0.1s">
						<div class="section-heading ">

							<div class="col-md-12">
								<p class="col-md-10 col-lg-10 col-xs-8" style="color: black; font-size: 25px;"><b>Buku Terbaru</b>

								</p>
								<a href="<?php echo base_url('pengguna/terbaru') ?>" class="btn btn-info pull-right col-md-2 col-lg-2 col-xs-4" style="border-radius: 16px; text-transform: capitalize;">Lihat
									Semua</a>
							</div>
						</div>

					</div>
					<div class="divider-short"></div>
				</div>
			</div>
		</div>

		<div class="wow lightSpeedIn">
			<div class="container">
				<div class="row" style="margin-bottom: 50px;">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<?php foreach ($baru as $a) {  ?>
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
				<?php } ?>

				</div>
			</div>
		</div>
		</div>
		</div>
		</div>
		</div>

	</section>
	<!-- /Section: team -->



	<!-- Section: works -->
	<section id="" class="home-section wow bounceInUp">
		<div class="container">
			<div class="row">
				<div class="col-sm-12 col-md-12 col-lg-12 col-xs-12">
					<div class="pembungkus">
						<div class="card">
							<img class="card-img-top " width="100% !important" height="300" src="<?php echo base_url('pengguna/img/photo/bg2.png') ?>">
							<p class="" style="padding-right: 30px;padding-left: 30px; padding-top: 50px;font-size: 20px;"><b>Semakin aku banyak membaca,
									semakin aku banyak
									berpikir; semakin aku banyak belajar, semakin aku sadar bahwa aku tak mengetahui
									apa pun.</b><br>Voltaire (Perancis 1694-1778)</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		</div>
	</section>
	<!-- /Section: works -->
	<!-- Section: team -->
	<section id="fasilitas" class="home-section bg-gray ">
		<div class="container">
			<div class="row">
				<div class="">
					<div class=" wow fadeInDown" data-wow-delay="0.1s">
						<div class="section-heading ">

							<div class="col-md-12">
								<p class="col-md-10 col-lg-10 col-xs-8" style="color: black; font-size: 25px;"><b>Buku Tervaforit</b>

								</p>
								<a href="<?php echo base_url('pengguna/terfavorit') ?>" class="btn btn-info pull-right col-md-2 col-lg-2 col-xs-4" style="border-radius: 16px; text-transform: capitalize;">Lihat
									Semua</a>
							</div>
						</div>

					</div>
					<div class="divider-short"></div>
				</div>
			</div>
		</div>
		<div class="wow lightSpeedIn">
			<div class="container">
				<div class="row" style="margin-bottom: 50px;">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<?php foreach ($favorit as $b) {  ?>
							<div class="col-sm-2 col-md-2 col-lg-2 col-xs-6">
								<div class="card"><a class="button" href="<?php echo base_url('pengguna/detail/' . $a->id_buku) ?>">
										<div class="buku">
											<img class="card-img-top " src="<?php echo base_url('./upload/cover/' . $b->cover) ?>" alt="Card image cap"></div>
										<div class="crd card-body">
											<p class="card-title"><b style="color: #00bac7;"><?php echo $b->nama_buku ?>
									</a></b>
									<br>
									<p class="card-title" style="font-size: 12px;"><?php echo $b->penulis ?></p>
									<div class="pull-right">
										<i class="fa fa-eye" style="font-size: 12px;"> <?php echo $b->pembaca ?></i>
										&nbsp;
										<i class="fa fa-bars" style="font-size: 12px;"> <?php echo $b->halaman ?></i>
									</div>
								</div>
							</div>
					</div>
				<?php } ?>
				</div>
			</div>
		</div>
		</div>
		</div>
		</div>
		</div>

	</section>
	<!-- /Section: team -->
	<section id="testimonial" class="home-section paddingbot-60 parallax" data-stellar-background-ratio="0.5">

		<div class="carousel-reviews broun-block">
			<div class="container">
				<div class="row">
					<div id="carousel-reviews" class="carousel slide" data-ride="carousel">

						<div class="carousel-inner">
							<div class="item active">
								<div class="col-md-12 col-sm-12 col-xs-12">
									<div class="person-text rel text-light">
										<img src="<?= base_url() ?>admin/build/images/book.png" style="width: 100px; height:100px;" class="person">
										<h1 style="color:#fff;"><b>Perpustakaan IAI Al-Khairat</b></h1>
										<a title=""> Kab. Pamekasan</a>
										<span>Jl. Raya Palengaan (Paludding)</span>
									</div>
								</div>
							</div>
						</div>


					</div>
				</div>
			</div>
		</div>
		</div>
	</section>


	<section id="partner" class="home-section paddingbot-60">
		<div class="container marginbot-50">
			<div class="row">
				<div class="col-lg-8 col-lg-offset-2">
					<div class="wow lightSpeedIn" data-wow-delay="0.1s">
						<div class="section-heading text-center">
							<h2 class="h-bold">Saran Buku</h2>
							<p>Take charge of your health today with our specially designed health packages</p>
						</div>
					</div>
					<div class="divider-short"></div>
				</div>
			</div>
		</div>

		<div class="container  wow bounceInUp">
			<div class="row">
				<div class="col-md-6 col-xs-12 ">
					<?php foreach ($srn as $s) : ?>
						<div class="col-md-2 col-xs-12">
							<img src="<?php echo base_url('pengguna/img/man.png') ?>" style="width: 80px" alt="img"></div>
						<div class="col-md-10 col-xs-12">
							<p><b><?= $s->nama_pengguna ?> (<?= $s->tanggal ?>) / <?= $s->judul_buku ?> (<?= $s->kategori ?>)</b></p>
							<p style="font-size: 14px"><?= $s->deskripsi ?> </p>

							<hr>
						</div>
					<?php endforeach ?>
					<a href="<?php echo base_url('pengguna/saran_buku') ?>" class="btn btn-info pull-left" style="border-radius: 16px; text-transform: capitalize;">Lihat
						Semua</a>
				</div>
				<div class="col-md-6 col-xs-12">
					<div class="widget">

						<p>Beri saran buat kami, agar buku lebih terupdate</p>

					</div>
					<div class="card">
						<div class="wow fadeInDown " data-wow-delay="0.1s">

							<div class="row" style="margin: 10px">
								<form class="" action="<?php echo base_url('pengguna/add_saran'); ?>" method="post" enctype="multipart/form-data">
									<div class="form-group">
										<input type="text" readonly="" name="nama_pengguna" class="form-control" value=" <?php echo $this->session->userdata('nama_depan') ?>">
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-md-4 col-xs-6">
												<select class="form-control" name="id_kategori">
													<?php foreach ($kategori as $k) : ?>
														<option value="<?= $k->id_kategori ?>"><?= $k->kategori ?></option>
													<?php endforeach; ?>
												</select>
											</div>
											<div class="col-md-8 col-xs-6">
												<input type="text" name="judul_buku" class="form-control" placeholder="Judul Buku">
											</div>
										</div>
									</div>
									<div class="form-group">
										<textarea type="text" name="deskripsi" class="form-control" placeholder="Deskripsi Buku"></textarea>
									</div>

									<input class="btn btn-warning pull-right" type="submit" style="border-radius: 16px; text-transform: capitalize;" name="btn" value="Save" />
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<?php
	include('footer.php');
	?>

	</div>
	<a href="#" class="scrollup"><i class="fa fa-angle-up active"></i></a>

	<!-- Core JavaScript Files -->
	<script src="<?php echo base_url('pengguna/js/jquery.min.js') ?>"></script>
	<script src="<?php echo base_url('pengguna/js/bootstrap.min.js') ?>"></script>
	<script src="<?php echo base_url('pengguna/js/jquery.easing.min.js') ?>"></script>
	<script src=" <?php echo base_url('pengguna/js/wow.min.js') ?>"> </script>
	<script src="<?php echo base_url('pengguna/js/jquery.scrollTo.js') ?>"></script>
	<script src="<?php echo base_url('pengguna/js/jquery.appear.js') ?>"></script>
	<script src="<?php echo base_url('pengguna/js/stellar.js') ?>"></script>
	<script src="<?php echo base_url('pengguna/plugins/cubeportfolio/js/jquery.cubeportfolio.min.js') ?>"></script>
	<script src="<?php echo base_url('pengguna/js/owl.carousel.min.js') ?>"></script>
	<script src="<?php echo base_url('pengguna/js/nivo-lightbox.min.js') ?>"></script>
	<script src="<?php echo base_url('pengguna/js/custom.js') ?>"></script>


</body>

</html>