<div class="container mt-3 mb-4">
	<div class="flashdata-sukses" data-alert="<?= $this->session->flashdata('login-sukses') ?>"></div>
	<?php if ($this->session->userdata('akses') == 'Orangtua') : ?>
		<h4 class="text-center">Selamat Datang Orangtua</h4>
		<ul>
			<li>Nama : <?= $this->session->userdata('nama') ?></li>
		</ul>
	<?php elseif ($this->session->userdata('akses') == 'Siswa') : ?>
		<h4 data-aos="fade-up" class="text-center">Selamat Datang <?= $this->session->userdata('nama') ?></h4>
		<div class="row" data-aos="fade-down">
			<div class="col-sm-6 my-3">
				<ul class="list-group">
					<li class="list-group-item">Nama : <?= $this->session->userdata('nama') ?></li>
					<li class="list-group-item">NIS : <?= $this->session->userdata('nis') ?></li>
					<li class="list-group-item">Nama Orangtua : <?= $this->session->userdata('orangtua') ?></li>
					<li class="list-group-item">Kelas : <?= $this->session->userdata('kelas') ?> </li>
					<li class="list-group-item">Jenis Kelamin : <?= $this->session->userdata('jk') ?> </li>
					<li class="list-group-item">password : <?= $this->session->userdata('password') ?></li>
				</ul>
			</div>
			<div class="col-sm-6 my-3">
				<ul class="list-group">
					<li class="list-group-item">Agama : <?= $this->session->userdata('agama') ?></li>
					<li class="list-group-item">Alamat : <?= $this->session->userdata('alamat') ?></li>
					<li class="list-group-item">Telpon : <?= $this->session->userdata('telpon') ?></li>
					<li class="list-group-item">Gol Darah : <?= $this->session->userdata('gol_darah') ?></li>
					<li class="list-group-item">Tempat tanggal lahir : <?= $this->session->userdata('tempat_lahir') . ',' . $this->session->userdata('tanggal_lahir') ?> </li>
					<li class="list-group-item">Pendidikan Terakhir : <?= $this->session->userdata('pendidikan') ?> </li>
					<li class="list-group-item">Kewarganegaraan : <?= $this->session->userdata('kewarganegaraan') ?> </li>
				</ul>
			</div>
		</div>
	<?php endif; ?>

	<span class="m-auto text-danger">Jika ada ketidaksesuaian data, silakan hubungi petugas TU</span>
</div>
