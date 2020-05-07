<div class="container">
	<div class="col-12">
		<h4 class="text-center mb-3">Data Absensi <?= $mapel['mapel'] ?> <br> Kelas <?= $kelas['kelas'] ?></h4>
		<table class="table table-responsive-md">
			<thead>
				<tr>
					<th scope="col">#</th>
					<th scope="col">Tanggal</th>
					<th scope="col">Mapel</th>
					<th scope="col">Kelas</th>
					<th scope="col">Action</th>
				</tr>
			</thead>
			<tbody>
				<?php $no = 1; ?>
				<?php foreach ($absen as $absen) : ?>
					<tr>
						<th scope="row"><?= $no ?></th>
						<td><?= $absen['tanggal'] ?></td>
						<td><?= $absen['mapel'] ?></td>
						<td><?= $absen['kelas'] ?></td>
						<td>
							<a href="<?= base_url('Home/DetailAbsen/'. $absen['id']) ?>" class="badge badge-primary">Lihat</a>
						</td>

					</tr>
					<?php $no++; ?>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>

</div>
