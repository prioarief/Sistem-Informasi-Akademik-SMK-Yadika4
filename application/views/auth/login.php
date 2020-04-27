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
	<link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

	<title>Sistem Informasi Sekolah</title>
</head>

<body background="<?= base_url('assets/img/bg.png') ?>">
	<div class="container my-5">
		
		<div class="flashdata-gagal" data-alert2="<?= $this->session->flashdata('login-gagal') ?>"></div>
		<h4 class="text-center font-weight-bold">Selamat Datang, Silakan login!</h4>

		<div class="row mt-3">
			<div data-aos="zoom-in-up" class="col-sm-6">
				<div class="card border-0">
					<div class="card-body">
						<h1 class="">SMK Yadika 4</h1>
						<small class="text-muted">JL. RADEN SALEH NO.11 RT.02/001, KELURAHAN KARANG TENGAH, KECAMATAN KARANG TENGAH, KOTA TANGERANG, BANTEN, 15157.</small>
						<h4 class="mt-2">Program Keahlian</h4>
						<ol type="1">
							<li>OTOMATISASI DAN TATAKELOLA PERKANTORAN (OTKP)</li>
							<li>AKUNTANSI DAN KEUANGAN LEMBAGA (AKL)</li>
							<li>TEKNIK KOMPUTER DAN JARINGAN (TKJ)</li>
						</ol>

					</div>
				</div>
			</div>
			<div class="col-sm-6 ">
				<div class="card py-2 border-0">
					<div data-aos="fade-left">
						<img src="<?= base_url('assets/img/logo.png') ?>" alt="" class="img-fluid m-auto mt-4 text-center d-block" style="height : 150px" width="150px">
					</div>
					<div data-aos="fade-right" class="row my-5 text-center">
						<div class="col-6">
							<a href="#" class="text-decoration-none text-center mt-3" id="loginSiswa">
								<i class="fas fa-fw fa-users"></i>
								<span>Login Siswa</span>
							</a>
						</div>
						<div class="col-6">
							<a href="#" class="text-decoration-none text-center mt-3" id="loginOrtu">
								<i class="fas fa-fw fa-user-friends"></i>
								<span>Login Orangtua</span>
							</a>
						</div>
					</div>


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
					<div class="card-body loginOrtu">
						<form method="post" action="<?= base_url() ?>Auth/Orangtua">
							<div data-aos="fade-up">
								<div class="form-group row">
									<label for="nik" class="col-sm-3 col-form-label">NIK Orangtua<span class="text-danger">*</span></label>
									<div class="col-sm-9">
										<input type="text" name="nik" class="form-control" id="nik" placeholder="NIK Orangtua">
									</div>
								</div>
								<div class="form-group row">
									<label for="password" class="col-sm-3 col-form-label">Password <span class="text-danger">*</span></label>
									<div class="col-sm-9">
										<input type="password" name="password" class="form-control" id="password" placeholder="Password">
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


	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="<?= base_url() ?>assets/bootstrap/js/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="<?= base_url() ?>assets/bootstrap/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	<script src="<?= base_url() ?>assets/user.js"></script>
	<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
	<script>
		AOS.init();
	</script>
	<!-- Sweet Alert -->
	<script src="<?= base_url() ?>assets/sweetalert/js/sweetalert2.all.min.js"></script>
</body>

</html>
