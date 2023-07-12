<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title><?= $title ?></title>

	<!-- Custom fonts for this template -->
	<link href="<?= base_url('assets/') ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

	<!-- Custom styles for this template -->
	<link href="<?= base_url('assets/') ?>css/sb-admin-2.min.css" rel="stylesheet">

	<!-- Custom styles for this page -->
	<link href="<?= base_url('assets/') ?>vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

	<!-- Page Wrapper -->
	<div id="wrapper">

		<!-- Sidebar -->
		<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

			<!-- Sidebar - Brand -->
			<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
				<div>
					<i class="fas fa-user-tie"></i>
				</div>
				<div class="sidebar-brand-text mx-3">Karyawan Terbaik</div>
			</a>

			<?php if ($this->session->userdata('role_id') == 0) { ?>
				<div class="sidebar-heading">
					Kelola Data Karyawan
				</div>
				<!-- Divider -->
				<hr class="sidebar-divider my-0">

				<!-- Nav Item - Dashboard -->
				<li class="nav-item">
					<a class="nav-link" href="<?= base_url('pegawai') ?>">
						<i class="fas fa-fw fa-users"></i>
						<span>Data Karyawan</span></a>
				</li>

				<div class="sidebar-heading">
					Perhitungan
				</div>
				<!-- Divider -->
				<hr class="sidebar-divider my-0">

				<!-- Nav Item - Dashboard -->
				<li class="nav-item">
					<a class="nav-link" href="<?= base_url('perhitungan/bobotkriteria') ?>">
						<i class="fas fa-fw fa-tachometer-alt"></i>
						<span>Bobot Kriteria</span></a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="<?= base_url('perhitungan/normalisasi') ?>">
						<i class="fas fa-fw fa-tachometer-alt"></i>
						<span>Matriks Normalisasi</span></a>
				</li>

				<li class="nav-item">
					<a class="nav-link" href="<?= base_url('perhitungan/terbobot') ?>">
						<i class="fas fa-fw fa-tachometer-alt"></i>
						<span>Matriks Terbobot</span></a>
				</li>

				<li class="nav-item">
					<a class="nav-link" href="<?= base_url('perhitungan/separasi') ?>">
						<i class="fas fa-fw fa-tachometer-alt"></i>
						<span>Separasi Solusi Ideal</span></a>
				</li>

				<li class="nav-item">
					<a class="nav-link" href="<?= base_url('perhitungan/rangking') ?>">
						<i class="fas fa-fw fa-users"></i>
						<span>Peringkat Sementara</span></a>
				</li>
			<?php } ?>

			<?php if ($this->session->userdata('role_id') == 1) { ?>
				<div class="sidebar-heading">
					Karyawan Terbaik
				</div>
				<!-- Divider -->
				<hr class="sidebar-divider">
				<!-- Nav Item - Dashboard -->

				<li class="nav-item">
					<a class="nav-link" href="<?= base_url('karyawanpilihan/terbaik') ?>">
						<i class="fas fa-fw fa-tachometer-alt"></i>
						<span>Karyawan Terbaik</span>
					</a>
				</li>

				<li class="nav-item">
					<a class="nav-link" href="<?= base_url('karyawanpilihan/krpilihan') ?>">
						<i class="fas fa-fw fa-tachometer-alt"></i>
						<span>Karyawan Terbaik Pilihan</span>
					</a>
				</li>
			<?php } ?>


			<!--Nav Item - Pages Collapse Menu-->
			<!-- <li class="nav-item">
				<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
					<i class="fas fa-fw fa-cog"></i>
					<span>Components</span>
				</a>
				<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
					<div class="bg-white py-2 collapse-inner rounded">
						<h6 class="collapse-header">Custom Components:</h6>
						<a class="collapse-item" href="buttons.html">Buttons</a>
						<a class="collapse-item" href="cards.html">Cards</a>
					</div>
				</div>
			</li> -->

			<!-- Sidebar Toggler (Sidebar) -->
			<div class="text-center d-none d-md-inline">
				<button class="rounded-circle border-0" id="sidebarToggle"></button>
			</div>

		</ul>
		<!-- End of Sidebar -->