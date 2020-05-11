<div class="container">
	<div class="col-12">
		<h4 class="text-center mb-3">Data Nilai <?= $mapel['mapel'] ?> <br> Kelas <?= $kelas['kelas'] ?></h4>
		<div class="flashdata" data-alert="<?= $this->session->flashdata('alert') ?>"></div>
		<div class="flashdata2" data-alert2="<?= $this->session->flashdata('alert2') ?>"></div>
		<!-- <a href="<?= base_url('Home/Absen/' . $kelas['id'] . "/" . $mapel['id']) ?>" class="badge badge-success mb-4">Input Nilai</a> -->
		<table class="table table-responsive-md">
			<thead>
				<tr>
					<th scope="col">#</th>
					<th scope="col">Nama Siswa</th>
					<th scope="col">NIS</th>
					<th scope="col">Kelas</th>
					<th scope="col">Action</th>
				</tr>
			</thead>
			<tbody>
				<?php $no = 1; ?>
				<?php foreach ($siswa as $siswa) : ?>
					<tr>
						<th scope="row"><?= $no ?></th>
						<td><?= $siswa['nama'] ?></td>
						<td><?= $siswa['nis'] ?></td>
						<td><?= $kelas['kelas'] ?></td>
						<td>
							<a href="<?= base_url('Home/DetailNilai/' . $siswa['id']. '/' . $mapel['id']) ?>" class="badge badge-primary">Lihat Nilai</a>
							<!-- <a data-text="Data <?= $siswa['mapel'] . " kelas " . $siswa['kelas'] ?>" href="<?= base_url('Home/DeleteAbsen/' . $siswa['id']) ?>" class="badge badge-danger deleteAbsen">Hapus</a> -->
						</td>

					</tr>
					<?php $no++; ?>
				<?php endforeach; ?>
			</tbody>
		</table>


	</div>

</div>
