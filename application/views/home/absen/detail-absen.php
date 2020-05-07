<div class="container mt-5">
	<!-- <h3 class="text-center mb-3">Data absen Kelas <?= $kelas['kelas'] ?> <br> <b><?= $mapel['mapel'] ?></b></h3> -->

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
				<form action="<?= base_url() ?>Home/EditAbsen" method="post">
					<!-- <input type="hidden" name="kelas" value="<?= $kelas['id'] ?>">
					<input type="hidden" name="mapel" id="mapel" value="<?= $mapel['id'] ?>"> -->
					<?php $no = 1; ?>
					<?php foreach ($absen as $absen) : ?>
						<tr>
							<th scope="row"><?= $no ?></th>
							<td><?= $absen['nama'] ?></td>
							<td><?= $absen['nis'] ?></td>
							<td>
								<div class="form-group" id="">
									<div class="row">
										<?php if ($absen['keterangan'] == 'hadir') : ?>
											<div class="custom-control custom-radio custom-control-inline">
												<input type="radio" id="hadir<?= $absen['nis'] ?>" checked required name="absen<?= $absen['id'] ?>" class="custom-control-input absen-hadir" value="hadir">
												<label class="custom-control-label" for="hadir<?= $absen['nis'] ?>">Hadir</label>
											</div>
											<div class="custom-control custom-radio custom-control-inline">
												<input type="radio" id="sakit<?= $absen['nis'] ?>" required name="absen<?= $absen['id'] ?>" class="custom-control-input absen sakit" value="sakit">
												<label class="custom-control-label" for="sakit<?= $absen['nis'] ?>">Sakit</label>
											</div>
											<div class="custom-control custom-radio custom-control-inline">
												<input type="radio" id="ijin<?= $absen['nis'] ?>" required name="absen<?= $absen['id'] ?>" class="custom-control-input absen ijin" value="ijin">
												<label class="custom-control-label" for="ijin<?= $absen['nis'] ?>">Ijin</label>
											</div>
											<div class="custom-control custom-radio custom-control-inline">
												<input type="radio" id="alpa<?= $absen['nis'] ?>" required name="absen<?= $absen['id'] ?>" class="custom-control-input absen alpa" value="alpa">
												<label class="custom-control-label" for="alpa<?= $absen['nis'] ?>">Alpa</label>
											</div>
										<?php elseif ($absen['keterangan'] == 'sakit') : ?>
											<div class="custom-control custom-radio custom-control-inline">
												<input type="radio" id="hadir<?= $absen['nis'] ?>" required name="absen<?= $absen['id'] ?>" class="custom-control-input absen-hadir" value="hadir">
												<label class="custom-control-label" for="hadir<?= $absen['nis'] ?>">Hadir</label>
											</div>
											<div class="custom-control custom-radio custom-control-inline">
												<input type="radio" id="sakit<?= $absen['nis'] ?>" checked required name="absen<?= $absen['id'] ?>" class="custom-control-input absen sakit" value="sakit">
												<label class="custom-control-label" for="sakit<?= $absen['nis'] ?>">Sakit</label>
											</div>
											<div class="custom-control custom-radio custom-control-inline">
												<input type="radio" id="ijin<?= $absen['nis'] ?>" required name="absen<?= $absen['id'] ?>" class="custom-control-input absen ijin" value="ijin">
												<label class="custom-control-label" for="ijin<?= $absen['nis'] ?>">Ijin</label>
											</div>
											<div class="custom-control custom-radio custom-control-inline">
												<input type="radio" id="alpa<?= $absen['nis'] ?>" required name="absen<?= $absen['id'] ?>" class="custom-control-input absen alpa" value="alpa">
												<label class="custom-control-label" for="alpa<?= $absen['nis'] ?>">Alpa</label>
											</div>
										<?php elseif ($absen['keterangan'] == 'ijin') : ?>
											<div class="custom-control custom-radio custom-control-inline">
												<input type="radio" id="hadir<?= $absen['nis'] ?>" required name="absen<?= $absen['id'] ?>" class="custom-control-input absen-hadir" value="hadir">
												<label class="custom-control-label" for="hadir<?= $absen['nis'] ?>">Hadir</label>
											</div>
											<div class="custom-control custom-radio custom-control-inline">
												<input type="radio" id="sakit<?= $absen['nis'] ?>" required name="absen<?= $absen['id'] ?>" class="custom-control-input absen sakit" value="sakit">
												<label class="custom-control-label" for="sakit<?= $absen['nis'] ?>">Sakit</label>
											</div>
											<div class="custom-control custom-radio custom-control-inline">
												<input type="radio" id="ijin<?= $absen['nis'] ?>" checked required name="absen<?= $absen['id'] ?>" class="custom-control-input absen ijin" value="ijin">
												<label class="custom-control-label" for="ijin<?= $absen['nis'] ?>">Ijin</label>
											</div>
											<div class="custom-control custom-radio custom-control-inline">
												<input type="radio" id="alpa<?= $absen['nis'] ?>" required name="absen<?= $absen['id'] ?>" class="custom-control-input absen alpa" value="alpa">
												<label class="custom-control-label" for="alpa<?= $absen['nis'] ?>">Alpa</label>
											</div>
										<?php elseif ($absen['keterangan'] == 'alpa') : ?>
											<div class="custom-control custom-radio custom-control-inline">
												<input type="radio" id="hadir<?= $absen['nis'] ?>" required name="absen<?= $absen['id'] ?>" class="custom-control-input absen-hadir" value="hadir">
												<label class="custom-control-label" for="hadir<?= $absen['nis'] ?>">Hadir</label>
											</div>
											<div class="custom-control custom-radio custom-control-inline">
												<input type="radio" id="sakit<?= $absen['nis'] ?>" required name="absen<?= $absen['id'] ?>" class="custom-control-input absen sakit" value="sakit">
												<label class="custom-control-label" for="sakit<?= $absen['nis'] ?>">Sakit</label>
											</div>
											<div class="custom-control custom-radio custom-control-inline">
												<input type="radio" id="ijin<?= $absen['nis'] ?>" required name="absen<?= $absen['id'] ?>" class="custom-control-input absen ijin" value="ijin">
												<label class="custom-control-label" for="ijin<?= $absen['nis'] ?>">Ijin</label>
											</div>
											<div class="custom-control custom-radio custom-control-inline">
												<input type="radio" id="alpa<?= $absen['nis'] ?>" checked required name="absen<?= $absen['id'] ?>" class="custom-control-input absen alpa" value="alpa">
												<label class="custom-control-label" for="alpa<?= $absen['nis'] ?>">Alpa</label>
											</div>
										<?php endif; ?>

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
		<button type="submit" class="btn btn-primary text-right absen">Edit</button>
		</form>
	</div>


</div>
