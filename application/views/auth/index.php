<!DOCTYPE html>
<html lang="en">

<head>
	<title>SPK TOPSIS Pemilihan Karyawan Terbaik</title>
	<!-- Meta-Tags -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="utf-8">
	<meta name="keywords" content="Business Login Form a Responsive Web Template, Bootstrap Web Templates, Flat Web Templates, Android Compatible Web Template, Smartphone Compatible Web Template, Free Webdesigns for Nokia, Samsung, LG, Sony Ericsson, Motorola Web Design">
	<script>
		addEventListener("load", function() {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<!-- //Meta-Tags -->

	<!-- css files -->
	<link href="<?= base_url('assets/') ?>css/font-awesome.min.css" rel="stylesheet" type="text/css" media="all">
	<link href="<?= base_url('assets/') ?>css/style.css" rel="stylesheet" type="text/css" media="all" />
	<link href="<?= base_url('assets/') ?>css/sb-admin-2.min.css" rel="stylesheet" type="text/css" media="all" />
	<!-- //css files -->

	<!-- google fonts -->
	<link href="//fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
	<!-- //google fonts -->

</head>

<body>

	<div class="signupform">
		<div class="container">
			<!-- main content -->
			<div class="agile_info">
				<div class="w3l_form">
					<div class="left_grid_info">
						<h1>SPK TOPSIS</h1>
						<p>Selamat Datang di Sistem Pendukung Keputusan Pemilihan Karyawan Terbaik menggunakan Metode TOPSIS.</p>
						<img src="<?= base_url('assets/') ?>images/image.jpg" alt="" />
					</div>
				</div>
				<div class="w3_info">
					<h2>Silahkan Login terlebih Dahulu</h2>
					<p>Masukkan : </p>
					<form action="<?= base_url('login/index') ?>" method="post">
						<label>Alamat Email</label>
						<div class="input-group">
							<span class="fa fa-envelope" aria-hidden="true"></span>
							<input type="email" placeholder="Email" required name="email">
						</div>
						<label>Kata Sandi</label>
						<div class="input-group">
							<span class="fa fa-lock" aria-hidden="true"></span>
							<input type="Password" placeholder="Password" name="password">
						</div>
						<button class="btn btn-danger btn-block" type="submit">Login</button>
					</form>
				</div>
			</div>
			<!-- //main content -->
		</div>
		<!-- Logout Modal-->
		<div class="modal fade" id="alertModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Alert.</h5>
						<button class="close" type="button" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">×</span>
						</button>
					</div>
					<div class="modal-body"><?php echo isset($pesan) && $pesan != "" ? $pesan : "No Message."; ?></div>
					<div class="modal-footer">
						<button class="btn btn-secondary" type="button" data-dismiss="modal">OK</button>
					</div>
				</div>
			</div>
		</div>
		<!-- footer -->
		<div class="footer">
			<p>&copy; 2019 Business login form. All Rights Reserved | Design by <a href="https://w3layouts.com/" target="blank">W3layouts</a></p>
		</div>
		<!-- footer -->
		<script src="<?= base_url('assets/') ?>vendor/jquery/jquery.min.js"></script>
		<script src="<?= base_url('assets/') ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
		<script type="text/javascript">
			$(function() {
				<?php echo isset($modal) && $modal != "" ? $modal : ""; ?>
			});
		</script>
	</div>

</body>

</html>