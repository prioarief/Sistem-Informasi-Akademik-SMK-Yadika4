<div class="container mt-5">
	<h3 class="text-center mb-3">Data Siswa Kelas <?= $kelas['kelas'] ?> <br> <b><?= $mapel['mapel'] ?></b></h3>
	<?php if ($siswa) : ?>
		<div class="col-12">
			<table class="table table-responsive-md">
				<thead>
					<tr>
						<th scope="col">#</th>
						<th scope="col">Nama</th>
						<th scope="col">NIS</th>
						<th scope="col">Status</th>
					</tr>
				</thead>
				<tbody>
					<form action="<?= base_url() ?>Home/AbsenAction" method="post">
					<input type="hidden" name="kelas" value="<?= $kelas['id'] ?>">
					<input type="hidden" name="mapel" id="mapel" value="<?= $mapel['id'] ?>">
					<?php $no = 1; ?>
					<?php foreach ($siswa as $siswa) : ?>
						<tr>
							<th scope="row"><?= $no ?></th>
							<td><?= $siswa['nama'] ?></td>
							<td><?= $siswa['nis'] ?></td>
							<td>
									<div class="form-group" id="">
										<div class="row">
											<div class="custom-control custom-radio custom-control-inline">
												<input type="radio" id="hadir<?= $siswa['nis'] ?>" required name="absen<?= $siswa['id'] ?>" class="custom-control-input absen-hadir" value="hadir">
												<label class="custom-control-label" for="hadir<?= $siswa['nis'] ?>">Hadir</label>
											</div>
											<div class="custom-control custom-radio custom-control-inline">
												<input type="radio" id="sakit<?= $siswa['nis'] ?>" required name="absen<?= $siswa['id'] ?>" class="custom-control-input absen sakit" value="sakit">
												<label class="custom-control-label" for="sakit<?= $siswa['nis'] ?>">Sakit</label>
											</div>
											<div class="custom-control custom-radio custom-control-inline">
												<input type="radio" id="ijin<?= $siswa['nis'] ?>" required name="absen<?= $siswa['id'] ?>" class="custom-control-input absen ijin" value="ijin">
												<label class="custom-control-label" for="ijin<?= $siswa['nis'] ?>">Ijin</label>
											</div>
											<div class="custom-control custom-radio custom-control-inline">
												<input type="radio" id="alpa<?= $siswa['nis'] ?>" required name="absen<?= $siswa['id'] ?>" class="custom-control-input absen alpa" value="alpa">
												<label class="custom-control-label" for="alpa<?= $siswa['nis'] ?>">Alpa</label>
											</div>
										</div>
									</div>
							</td>
						</tr>
						<?php $no++; ?>
					<?php endforeach; ?>
					<tr>
						<td></td>
						<td></td>
						<td></td>
						<td>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" id="hadirsemua" name="hadir" class="custom-control-input hadirsemua">
								<label class="custom-control-label" for="hadirsemua">Hadir Semua</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" id="tidakhadirsemua" name="hadir" class="custom-control-input tidakhadirsemua">
								<label class="custom-control-label" for="tidakhadirsemua">Cancel</label>
							</div>

						</td>
					</tr>
				</tbody>
			</table>
			<button type="submit" class="btn btn-primary text-right absen">Submit</button>
			</form>
		</div>

	<?php else : ?>
		<div class="alert alert-danger alert-dismissible fade show" role="alert">
			<strong>Data Siswa Tidak Ada!</strong>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
	<?php endif; ?>
</div>
