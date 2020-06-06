<div class="container">
	<?php if ($this->session->userdata('akses') == 'Orangtua') : ?>
		<h3 class="text-center mb-4">Jadwal Pelajaran <?= $siswa['nama'] ?> <br> Kelas <?= $kelas['kelas'] ?></h3>
		<table class="table table-responsive-md">
			<thead>
				<tr>
					<th scope="col">#</th>
					<th scope="col">Hari</th>
					<th scope="col">Action</th>
				</tr>
			</thead>
			<tbody>

				<?php $no = 1; ?>
				<?php foreach ($jadwal as $jadwal) : ?>
					<tr>
						<th scope="row"><?= $no ?></th>
						<td><?= $jadwal['hari'] ?></td>
						<td>
							<a href="<?= base_url('Home/DetailJadwalPelajaran/' . $jadwal['idJadwal'] . '/' . $jadwal['hari'] . '/' . $kelas['id']. '/'. $siswa['id']) ?>" class="badge badge-info">Lihat Jadwal</a>
						</td>
					</tr>
					<?php $no++; ?>
				<?php endforeach; ?>

			</tbody>
		</table>
	<?php else : ?>
		<h3 class="text-center mb-4">Jadwal Pelajaran Kelas <?= $kelas['kelas'] ?></h3>
		<table class="table table-responsive-md">
			<thead>
				<tr>
					<th scope="col">#</th>
					<th scope="col">Hari</th>
					<th scope="col">Action</th>
				</tr>
			</thead>
			<tbody>

				<?php $no = 1; ?>
				<?php foreach ($jadwal as $jadwal) : ?>
					<tr>
						<th scope="row"><?= $no ?></th>
						<td><?= $jadwal['hari'] ?></td>
						<td>
							<a href="<?= base_url('Home/DetailJadwalPelajaran/' . $jadwal['idJadwal'] . '/' . $jadwal['hari']) ?>" class="badge badge-info">Lihat Jadwal</a>
						</td>
					</tr>
					<?php $no++; ?>
				<?php endforeach; ?>

			</tbody>
		</table>
	<?php endif; ?>

</div>
