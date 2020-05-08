<div class="container">
	<h3 class="text-center mt-5 mb-5">Absensi Pelajaran <?= $mapel['mapel'] ?> </h3>
	<form action="" method="post">
		<div class="form-group jurusanEdit">
			<label for="order">Bulan</label>
			<select class="form-control" id="order" required name="bulan">
				<option selected disabled>-- Order By --</option>
				<?php $no = 1; ?>
				<?php foreach ($bulan as $bulan) : ?>
					<option value="<?= $no ?>"><?= $bulan ?></option>
					<?php $no++ ?>
				<?php endforeach; ?>
			</select>
		</div>
	</form>
	<div class="col-12">
		<table class="table table-responsive-md">
			<thead>
				<tr>
					<?php foreach ($absen as $a) : ?>
						<th scope="col"><?= $a['tanggal'] ?></th>
					<?php endforeach; ?>
				</tr>
			</thead>
			<tbody>


				<tr>
					<?php foreach ($absen as $absen) : ?>
						<!-- <td><?= $absen['tanggal'] ?></td> -->
						<td>
							<?php if ($absen['keterangan'] == 'hadir') : ?>
								<div class="bg-success" style="width: 30px; height:30px" title="Hadir">

								</div>
							<?php elseif ($absen['keterangan'] == 'ijin') : ?>
								<div class="bg-primary" style="width: 30px; height:30px" title="Ijin">

								</div>
							<?php elseif ($absen['keterangan'] == 'sakit') : ?>
								<div class="bg-warning" style="width: 30px; height:30px" title="Sakit">

								</div>
							<?php elseif ($absen['keterangan'] == 'alpa') : ?>
								<div class="bg-danger" style="width: 30px; height:30px" title="Alpa">

								</div>
							<?php endif; ?>
						</td>
					<?php endforeach; ?>
				</tr>


			</tbody>
		</table>
		<table class="table table-responsive-md">
			<thead>
				<tr>
					<td style="width: 5px">
						<div class="bg-success d-inline-block" style="width: 10px; height:10px"></div>
					</td>
					<td>
						Hadir
					</td>
				</tr>
				<tr>
					<td style="width: 5px">
						<div class="bg-primary d-inline-block" style="width: 10px; height:10px"></div>
					</td>
					<td>
						Ijin
					</td>
				</tr>
				<tr>
					<td style="width: 5px">
						<div class="bg-warning d-inline-block" style="width: 10px; height:10px"></div>
					</td>
					<td>
						Sakit
					</td>
				</tr>
				<tr>
					<td style="width: 5px">
						<div class="bg-danger d-inline-block" style="width: 10px; height:10px"></div>
					</td>
					<td>
						Alpa
					</td>
				</tr>
			</thead>

		</table>


	</div>

</div>
