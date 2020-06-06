<div class="container">
	<?php if ($this->session->userdata('akses') == 'Orangtua') : ?>
		<h3 class="text-center mb-4">Jadwal Pelajaran Kelas <?= $kelas['kelas'] ?> <br>Hari <?= $hari ?></h3>
		<p>Nama Siswa : <?= $siswa['nama'] ?></p>
		<p>Jurusan : <?= $jurusanSaya['jurusan'] ?></p>
		<p>Kelas : <?= $kelas['kelas'] ?></p>
		<p>Jenis Kelamin : <?= $siswa['jk'] ?></p>
	<?php else : ?>
		<h3 class="text-center mb-4">Jadwal Pelajaran Kelas <?= $this->session->userdata('kelas') ?> <br>Hari <?= $hari ?></h3>
		<p>Nama Siswa : <?= $this->session->userdata('nama') ?></p>
		<p>Jurusan : <?= $jurusanSaya['jurusan'] ?></p>
		<p>Kelas : <?= $this->session->userdata('kelas') ?></p>
		<p>Jenis Kelamin : <?= $this->session->userdata('jk') ?></p>
	<?php endif; ?>
	<table class="table table-responsive-md text-center">
		<thead>
			<tr>
				<th scope="col">#</th>
				<th scope="col">Jam Mulai</th>
				<th scope="col">Jam Selesai</th>
				<th scope="col">Mapel</th>
				<th scope="col">Guru</th>
				<th scope="col">Ruang</th>
			</tr>
		</thead>
		<tbody>

			<?php $no = 1; ?>
			<?php foreach ($jadwal as $jadwal) : ?>
				<tr>
					<th scope="row"><?= $no ?></th>
					<td><?= $jadwal['jam_mulai'] ?></td>
					<td><?= $jadwal['jam_selesai'] ?></td>
					<td><?= $jadwal['mapel'] ?></td>
					<td><?= $jadwal['nama'] ?></td>
					<td><?= $jadwal['ruang'] ?></td>
				</tr>
				<?php $no++; ?>
			<?php endforeach; ?>

		</tbody>
	</table>
	<a href="<?= base_url('Home/ExportJadwalPdf/' . $jadwal['jadwal_id'] . '/' . $hari) ?>" target="blank" class="btn btn-primary ml-3 btn-sm"><i class="fa fa-file-download"> Export PDF </i></a>
	<a href="<?= base_url('Home/ExportJadwalExcel/' . $jadwal['jadwal_id'] . '/' . $hari) ?>" target="blank" class="btn btn-success ml-3 btn-sm"><i class="fa fa-file-download"> Export Excel </i></a>
</div>
