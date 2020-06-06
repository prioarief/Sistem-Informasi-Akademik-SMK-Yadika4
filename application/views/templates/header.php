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
	<link rel="stylesheet" href="<?= base_url() ?>assets/aos/aos.css" />

	<title>Sistem Informasi Sekolah | <?= $title ?></title>
</head>

<body>
	<div class="flashdata" data-alert="<?= $this->session->flashdata('alert') ?>"></div>
	<div class="flashdata2" data-alert2="<?= $this->session->flashdata('alert2') ?>"></div>

	<input type="hidden" name="url" value="<?= base_url() ?>" id="url">

	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<a class="navbar-brand" href="<?= base_url() ?>Home">
			<img src="<?= base_url('assets/img/logo.png') ?>" width="30" height="30" class="d-inline-block align-top" alt="">
			SMK Yadika 4
		</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav mr-auto right">
				<li class="nav-item right">
					<a class="nav-link" href="<?= base_url() ?>Home/Absensi"><i class="fa fa-book"> Absensi</i></a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="<?= base_url() ?>Home/Nilai"><i class="fa fa-clipboard-list"> Nilai</i></a>
				</li>
				<?php if ($this->session->userdata('akses') == 'Siswa') : ?>
					<li class="nav-item">
						<a class="nav-link" href="<?= base_url('Home/JadwalPelajaran/' . $this->session->userdata('kelasSaya')) ?>"><i class="fa fa-calendar-alt"> Jadwal Pelajaran</i></a>
					</li>
				<?php elseif ($this->session->userdata('akses') == 'Orangtua') : ?>
					<li class="nav-item">
						<a class="nav-link" href="<?= base_url('Home/JadwalPelajaranSiswa') ?>"><i class="fa fa-calendar-alt"> Jadwal Pelajaran</i></a>
					</li>

				<?php endif; ?>
			</ul>
			<span class="d-inline text-light"><?= $this->session->userdata('nama') ?> </span>
			<a class="nav-link text-light" href="<?= base_url() ?>Auth/logout">Logout</a>
		</div>
	</nav>
	<div class="jumbotron jumbotron-fluid shadow-sm">
		<div class="container">
			<h1 class="">SMK Yadika 4</h1>
			<p class="text-muted">JL. RADEN SALEH NO.11 RT.02/001, KELURAHAN KARANG TENGAH, KECAMATAN KARANG TENGAH, KOTA TANGERANG, BANTEN, 15157.</p>
			<h4 class="">Program Keahlian</h4>
			<ol type="1">
				<?php foreach ($jurusan as $data) : ?>
					<li><?= $data['jurusan'] ?></li>
				<?php endforeach; ?>
			</ol>
		</div>
	</div>
