<!DOCTYPE html>
<html lang="en">

<head>
	<title>Login Perpustakaan</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="<?php echo base_url('login/images/icons/book.png') ?>" />
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('login/vendor/bootstrap/css/bootstrap.min.css') ?>">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('login/fonts/Linearicons-Free-v1.0.0/icon-font.min.css') ?>">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('login/vendor/animate/animate.css') ?>">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('login/vendor/css-hamburgers/hamburgers.min.css') ?>">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('login/vendor/animsition/css/animsition.min.css') ?>">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('login/vendor/select2/select2.min.css') ?>">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('login/vendor/daterangepicker/daterangepicker.css') ?>">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('login/css/util.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('login/css/main.css') ?>">
	<!--===============================================================================================-->
</head>

<body>

	<div class="limiter">
		<div class="container-login100" style="background-image: url('login/images/bg-01.jpg');">
			<div class="wrap-login100 p-t-30 p-b-50">
				<span class="login100-form-title p-b-41">
					<img src="login/images/book.png" alt="" width="70" height="70" /> <br>PERPUSTAKA'AN <br> AL-KHAIRAT
				</span>
				<div class="container" style="text-align: center; ">
					<a href="../admin/production/" style="margin: 10px; border-radius:20px; color:azure; " class="btn btn-info"><i class="fa fa-user"></i> Admin Perpustakaan</a>
					<a href="../pengguna/" style="border-radius:20px;color:azure;" class="btn btn-info"><i class="fa fa-users"></i> Masyarakat Umum</a>
				</div>
			</div>
		</div>
	</div>


	<div id="dropDownSelect1"></div>

	<!--===============================================================================================-->
	<script src="<?php echo base_url('vendor/jquery/jquery-3.2.1.min.js') ?>"></script>
	<!--===============================================================================================-->
	<script src="<?php echo base_url('vendor/animsition/js/animsition.min.js') ?>"></script>
	<!--===============================================================================================-->
	<script src="<?php echo base_url('vendor/bootstrap/js/popper.js') ?>"></script>
	<script src="<?php echo base_url('vendor/bootstrap/js/bootstrap.min.js') ?>"></script>
	<!--===============================================================================================-->
	<script src="<?php echo base_url('vendor/select2/select2.min.js') ?>"></script>
	<!--===============================================================================================-->
	<script src="<?php echo base_url('vendor/daterangepicker/moment.min.js') ?>"></script>
	<script src="<?php echo base_url('vendor/daterangepicker/daterangepicker.js') ?>"></script>
	<!--===============================================================================================-->
	<script src="<?php echo base_url('vendor/countdowntime/countdowntime.js') ?>"></script>
	<!--===============================================================================================-->
	<script src="<?php echo base_url('js/main.js') ?>"></script>

</body>

</html>