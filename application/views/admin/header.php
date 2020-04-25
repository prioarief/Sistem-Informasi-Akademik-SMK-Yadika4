<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Petugas TU | <?= $title ?></title>

	<!-- Custom fonts for this template-->
	<link rel="shortcut icon" href="<?= base_url(); ?>assets/img/logo.png">
	<link href="<?= base_url() ?>assets/template/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
	<link href="<?= base_url() ?>assets/template/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
	<!-- Custom styles for this template-->
	<link href="<?= base_url() ?>assets/template/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">
	<!-- Page Wrapper -->
	<div id="wrapper">

		<!-- Sidebar -->
		<ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">

			<!-- Sidebar - Brand -->
			<a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url() ?>Admin">
				<div class="sidebar-brand-icon rotate">
					<img src="<?= base_url() ?>assets/img/logo.png" alt="logo" class="img-fluid mr-1" style="width: 50px">
				</div>
				<div class="sidebar-brand-text mr-1">Petugas TU</div>
			</a>

			<!-- Divider -->
			<hr class="sidebar-divider my-0">

			<!-- Nav Item - Dashboard -->
			<li class="nav-item active">
				<a class="nav-link" href="<?= base_url() ?>TU">
					<i class="fas fa-fw fa-tachometer-alt"></i>
					<span>Dashboard</span></a>
			</li>

			<!-- Divider -->
			<hr class="sidebar-divider">




			<li class="nav-item">
				<a class="nav-link" href="<?= base_url() ?>Admin/Transaksi">
					<i class="fas fa-fw fa-users"></i>
					<span>Siswa</span></a>
			</li>


			<li class="nav-item">
				<a class="nav-link" href="<?= base_url() ?>Jurusan">
					<i class="fa fa-fw fa-industry"></i>
					<span>Jurusan</span></a>
			</li>

			<li class="nav-item">
				<a class="nav-link" href="<?= base_url() ?>Kelas">
					<i class="fas fa-fw fa-id-card-alt"></i>
					<span>Kelas</span></a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="<?= base_url() ?>Orangtua">
					<i class="fas fa-fw fa-user-friends"></i>
					<span>Orang Tua</span></a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="<?= base_url() ?>Category">
					<i class="fas fa-fw fa-chalkboard-teacher"></i>
					<span>Guru</span></a>
			</li>

			<!-- Divider -->
			<hr class="sidebar-divider d-none d-md-block">

			<!-- Sidebar Toggler (Sidebar) -->
			<div class="text-center d-none d-md-inline">
				<button class="rounded-circle border-0" id="sidebarToggle"></button>
			</div>

		</ul>
		<!-- End of Sidebar -->

		<div id="content-wrapper" class="d-flex flex-column">

			<!-- Main Content -->
			<div id="content">

				<!-- Topbar -->
				<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

					<!-- Sidebar Toggle (Topbar) -->
					<button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
						<i class="fa fa-bars"></i>
					</button>

					<!-- Topbar Navbar -->
					<ul class="navbar-nav ml-auto">







						<!-- Nav Item - User Information -->
						<li class="nav-item dropdown no-arrow">
							<a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<span class="mr-2 d-none d-lg-inline text-gray-600 small"></span>
								<i class="fas fa-fw fa-user-circle"></i>
							</a>
							<!-- Dropdown - User Information -->
							<div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="<?= base_url() ?>Login/logout" data-toggle="modal" data-target="#logoutModal">
									<i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
									Logout
								</a>
							</div>
						</li>

					</ul>

				</nav>
				<!-- End of Topbar -->
