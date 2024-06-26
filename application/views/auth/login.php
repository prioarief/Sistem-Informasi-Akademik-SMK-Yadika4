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

<body background="<?= base_url('assets/img/bg.png') ?>">
	<div class="container my-5">

		<div class="flashdata-gagal" data-alert2="<?= $this->session->flashdata('login-gagal') ?>"></div>
		<h4 class="text-center font-weight-bold">Selamat Datang, Silakan login!</h4>

		<div class="row mt-3">
			<div data-aos="zoom-in-up" class="col-sm-5">
				<div class="card border-0">
					<div class="card-body">
						<h1 class="">SMK Yadika 4</h1>
						<small class="text-muted">JL. RADEN SALEH NO.11 RT.02/001, KELURAHAN KARANG TENGAH, KECAMATAN KARANG TENGAH, KOTA TANGERANG, BANTEN, 15157.</small>
						<h4 class="mt-2">Program Keahlian</h4>
						<ol type="1">
							<?php foreach ($jurusan as $data) : ?>
								<li><?= $data['jurusan'] ?></li>
							<?php endforeach; ?>
						</ol>

					</div>
				</div>
			</div>
			<div class="col-sm-7">
				<div class="card py-2 border-0">
					<div data-aos="fade-left">
						<img src="<?= base_url('assets/img/logo.png') ?>" alt="" class="img-fluid m-auto mt-4 mb-5 text-center d-block" style="height : 150px" width="150px">
					</div>
					<div data-aos="fade-right" class="row text-center mt-5 mb-5">
						<div class="col-12">
							<div class="list-group d-inline mt-5" id="list-tab" role="tablist">
								<a class="list-group-item list-group-item-action active d-inline" id="list-Siswa-list" data-toggle="list" href="#list-Siswa" role="tab" aria-controls="Siswa">
									<!-- <i class="fas fa-fw fa-users"></i> -->
									<span>Siswa</span>
								</a>
								<a class="list-group-item list-group-item-action d-inline" id="list-Orangtua-list" data-toggle="list" href="#list-Orangtua" role="tab" aria-controls="Orangtua">
									<!-- <i class="fas fa-fw fa-user-friends"></i> -->
									<span>Orangtua</span>
								</a>
								<a class="list-group-item list-group-item-action d-inline" id="list-Guru-list" data-toggle="list" href="#list-Guru" role="tab" aria-controls="Guru">
									<!-- <i class="fas fa-fw fa-chalkboard-teacher"></i> -->
									<span>Guru</span>
								</a>
							</div>
						</div>
					</div>


					<div class="tab-content" id="nav-tabContent">
						<div class="tab-pane fade show active" id="list-Siswa" role="tabpanel" aria-labelledby="list-Siswa-list">
							<div class="card-body loginSiswa">
								<form method="post" action="<?= base_url() ?>Auth/Siswa">
									<div data-aos="fade-up">
										<div class="form-group row">
											<label for="nis" class="col-sm-3 col-form-label">NIS <span class="text-danger">*</span></label>
											<div class="col-sm-9">
												<input type="text" name="nis" class="form-control" id="nis" placeholder="NIS Siswa" value="<?= set_value('nis') ?>">
												<small class="text-danger"><?= form_error('nis') ?></small>
											</div>
										</div>
										<div class="form-group row">
											<label for="password" class="col-sm-3 col-form-label">Password <span class="text-danger">*</span></label>
											<div class="col-sm-9">
												<input type="password" name="password" class="form-control" id="password" placeholder="Password">
												<small class="text-danger"><?= form_error('password') ?></small>
											</div>
										</div>
										<small class="text-danger">* Harus Diisi!</small>
										<div class="form-group row">
											<label for="inputPassword" class="col-sm-3 col-form-label"> </label>
											<div class="col-offset-3 col-sm-9">
												<button class="btn btn-primary"> <i class="fas fa-fw fa-sign-in-alt"></i>
													<span>Login</span></a></button>
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
						<div class="tab-pane fade" id="list-Guru" role="tabpanel" aria-labelledby="list-Guru-list">
							<div class="card-body loginGuru">
								<form method="post" action="<?= base_url() ?>Auth/Guru">
									<div data-aos="fade-up">
										<div class="form-group row">
											<label for="email" class="col-sm-3 col-form-label">Email <span class="text-danger">*</span></label>
											<div class="col-sm-9">
												<input type="text" name="email" class="form-control" id="email" placeholder="Email" value="<?= set_value('email') ?>">
												<small class="text-danger"><?= form_error('email') ?></small>
											</div>
										</div>
										<div class="form-group row">
											<label for="password" class="col-sm-3 col-form-label">Password <span class="text-danger">*</span></label>
											<div class="col-sm-9">
												<input type="password" name="password" class="form-control" id="password" placeholder="Password">
												<small class="text-danger"><?= form_error('password') ?></small>
											</div>
										</div>
										<small class="text-danger">* Harus Diisi!</small>
										<div class="form-group row">
											<label for="inputPassword" class="col-sm-3 col-form-label"> </label>
											<div class="col-offset-3 col-sm-9">
												<button class="btn btn-primary"> <i class="fas fa-fw fa-sign-in-alt"></i>
													<span>Login</span></a></button>
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
						<div class="tab-pane fade" id="list-Orangtua" role="tabpanel" aria-labelledby="list-Orangtua-list">
							<div class="card-body loginOrtu">
								<form method="post" action="<?= base_url() ?>Auth/Orangtua">
									<div data-aos="fade-up">
										<div class="form-group row">
											<label for="nik" class="col-sm-3 col-form-label">NIK Orangtua<span class="text-danger">*</span></label>
											<div class="col-sm-9">
												<input type="text" name="nik" class="form-control" id="nik" placeholder="NIK Orangtua">
												<small class="text-danger"><?= form_error('nik') ?></small>
											</div>
										</div>
										<div class="form-group row">
											<label for="password" class="col-sm-3 col-form-label">Password <span class="text-danger">*</span></label>
											<div class="col-sm-9">
												<input type="password" name="password" class="form-control" id="password" placeholder="Password">
												<small class="text-danger"><?= form_error('password') ?></small>
											</div>
										</div>
										<small class="text-danger">* Harus Diisi!</small>
										<div class="form-group row">
											<label for="inputPassword" class="col-sm-3 col-form-label"> </label>
											<div class="col-offset-3 col-sm-9">
												<button class="btn btn-primary"> <i class="fas fa-fw fa-sign-in-alt"></i>
													<span>Login</span></a></button>
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>



				</div>
			</div>
		</div>
	</div>


	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="<?= base_url() ?>assets/bootstrap/js/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="<?= base_url() ?>assets/bootstrap/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	<script src="<?= base_url() ?>assets/js/user.js"></script>
	<script src="<?= base_url() ?>assets/aos/aos.js"></script>
	<script>
		AOS.init();
	</script>
	<!-- Sweet Alert -->
	<script src="<?= base_url() ?>assets/sweetalert/js/sweetalert2.all.min.js"></script>
</body>

</html>
