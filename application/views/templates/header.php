<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="<?= base_url('assets/bootstrap/css/bootstrap.min.css') ?>">
	<link rel="stylesheet" href="<?= base_url('assets/fontawesome/css/all.css') ?>">
	<link rel="shortcut icon" href="<?= base_url('assets/img/logo.png') ?>" type="image/x-icon">

	<title>Sistem Informasi Sekolah</title>
</head>

<body>

	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<a class="navbar-brand" href="<?= base_url() ?>">
			<img src="<?= base_url('assets/img/logo.png') ?>" width="30" height="30" class="d-inline-block align-top" alt="">
			SMK Yadika 4
		</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav mr-auto right">
				<li class="nav-item right">
					<a class="nav-link" href="#"><i class="fa fa-book"> Absensi</i></a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#"><i class="fa fa-clipboard-list"> Nilai</i></a>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<i class="fa fa-calendar-alt"> Jadwal</i>
					</a>
					<div class="dropdown-menu mt-2" aria-labelledby="navbarDropdown">
						<a class="dropdown-item" href="#"><i class="fa fa-book-open"> Jadwal Pelajaran</i></a>
						<a class="dropdown-item" href="#"><i class="fa fa-book-reader"> Jadwal Ujian</i></a>
					</div>
				</li>
			</ul>

			<a class="nav-link text-light" href="#"><i class="fa fa-user-circle"> Logout</i></a>
		</div>
	</nav>
	<div class="jumbotron jumbotron-fluid shadow-lg">
		<div class="container">
			<h1 class="display-4">SMK Yadika 4</h1>
			<p class="text-muted">JL. RADEN SALEH NO.11 RT.02/001, KELURAHAN KARANG TENGAH, KECAMATAN KARANG TENGAH, KOTA TANGERANG, BANTEN, 15157.</p>
			<h4 class="">Program Keahlian</h4>
			<ol type="1">
				<li>OTOMATISASI DAN TATAKELOLA PERKANTORAN (OTKP)</li>
				<li>AKUNTANSI DAN KEUANGAN LEMBAGA (AKL)</li>
				<li>TEKNIK KOMPUTER DAN JARINGAN (TKJ)</li>
			</ol>
			<button href="" class="btn btn-info ml-3"><i class="fa fa-sign-in-alt" data-toggle="modal" data-target="#exampleModal"> Login</i></button>
		</div>
	</div>
