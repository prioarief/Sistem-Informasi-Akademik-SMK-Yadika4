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

<body data-aos="fade-out" background="<?= base_url('assets/img/bg.png') ?>" style="background-repeat: no-repeat; width:100%; min-width:100%" class="img-fluid">
	<div data-aos="fade-in" class="container">

		<!-- Outer Row -->
		<div class="row justify-content-center">

			<div class="col-lg-12">

				<div class="card o-hidden border-0 shadow-lg my-5">
					<div class="card-body p-0">
						<!-- Nested Row within Card Body -->
						<div class="row">

							<div class="col-sm-6">
								<div class="p-5">

									<div class="">
										<div class="text-center">
											<img data-aos="zoom-out" src="<?= base_url('assets/img/logo.png') ?>" alt="" class="img-fluid w-30">
										</div>
										<h1 class="text-center">SMK Yadika 4</h1>
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
							<div class="col-sm-6">
								<div class="p-5">
									<div class="text-center">
										<img data-aos="zoom-out" src="<?= base_url('assets/img/bg.svg') ?>" alt="" class="img-fluid w-30">


										<h1 class="h4 text-gray-900 my-4">Login Petugas TU!</h1>
									</div>

									<form class="user" method="post">
										<div class="form-group">
											<input type="email" class="form-control form-control-user" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter Email Address...">

										</div>
										<div class="form-group">
											<input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password">

										</div>
										<button type="submit" name="submit" class="btn btn-primary btn-md text-center">Login</button>


									</form>

								</div>
								<!-- <div class="text-center">
										<img data-aos="zoom-out" src="<?= base_url('assets/img/bg.svg') ?>" alt="" class="img-fluid w-30 mx-3">
									</div> -->
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
