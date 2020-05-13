<div class="container">
	
	<?php if ($this->session->userdata('akses') == 'Siswa') : ?>
		<h3 class="text-center mt-5 mb-5">Nilai <?= $this->session->userdata('nama') ?> </h3>
		<span class="d-block mb-2">Silakan Pilih Mata Pelajaran untuk Melihat Nilai</span>
		<div class="col-12">
			<table class="table table-responsive-md">
				<thead>
					<tr>
						<th scope="col">#</th>
						<th scope="col">Mapel</th>
						<th scope="col">Guru</th>
						<th scope="col">Action</th>
					</tr>
				</thead>
				<tbody>

					<?php $no = 1; ?>
					<?php foreach ($kelas as $kelas) : ?>
						<tr>
							<th scope="row"><?= $no ?></th>
							<td><?= $kelas['mapel'] ?></td>
							<td><?= $kelas['nama'] ?></td>
							<td>
								<a href="<?= base_url('Home/DetailNilai/' . $this->session->userdata('idSiswa') . '/' . $kelas['mapel_id']) ?>" class="badge badge-info">Lihat Nilai</a>
							</td>
						</tr>
						<?php $no++; ?>
					<?php endforeach; ?>

				</tbody>
			</table>
		</div>
	<?php elseif ($this->session->userdata('akses') == 'Guru') : ?>
		<h2 class="text-center mt-5 mb-5">Nilai Pelajaran <?= $this->session->userdata('nama') ?> </h2>
		<h4 class="d-block">Silakan Pilih Mata Pelajaran dan Kelas untuk Mengisi Nilai</h4>



		<div class="col-12">
			<table class="table table-responsive-md">
				<thead>
					<tr>
						<th scope="col">#</th>
						<th scope="col">Mapel</th>
						<th scope="col">Action</th>
					</tr>
				</thead>
				<tbody>

					<?php $no = 1; ?>
					<?php foreach ($mapel as $mapel) : ?>
						<tr>
							<th scope="row"><?= $no ?></th>
							<td><?= $mapel['mapel'] ?></td>
							<td>
								<a href="#" data-id="<?= $mapel['id'] ?>" data-url="Home/DataNilai/" class="badge badge-primary" data-toggle="modal" data-target="#modalDetailKelas">Lihat Nilai</a>
								<!-- <a href="#" data-id="<?= $mapel['id'] ?>" class="badge badge-info" data-toggle="modal" data-target="#modalDetailNilai">Lihat Nilai</a> -->
							</td>
						</tr>
						<?php $no++; ?>
					<?php endforeach; ?>

				</tbody>
			</table>
		</div>

		<!-- Modal Detail Kelas -->
		<div class="modal fade DetailKelas" id="modalDetailKelas" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalCenterTitle">Pilih Kelas!</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body ">

						<div class="form-group kelasEdit" id="">
							<p>Kelas Yang Diajar <span class="text-danger">*</span></p>
							<div class="row detailKelas">

							</div>
						</div>
						<small class="text-danger">Pilih untuk melakukan input Nilai!</small>

						</form>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div>

		<!-- Modal Detail Kelas -->
		<div class="modal fade DetailKelas" id="modalDetailKelas" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalCenterTitle">Pilih Kelas!</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body ">

						<div class="form-group kelasEdit" id="">
							<p>Kelas Yang Diajar <span class="text-danger">*</span></p>
							<div class="row detailKelas">

							</div>
						</div>
						<small class="text-danger">Pilih untuk melakukan Nilai!</small>

						</form>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div>

		<!-- Modal Detail Nilai -->
		<div class="modal fade DetailNilai" id="modalDetailNilai" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalCenterTitle">Pilih Kelas!</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body ">

						<div class="form-group NilaiEdit" id="">
							<div class="row detailNilai">

							</div>
						</div>
						<small class="text-danger">Pilih Kelas untuk Melihat Nilaisi!</small>

						</form>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div>
	<?php elseif ($this->session->userdata('akses') == 'Orangtua') : ?>
		<h3 class="text-center">Selamat Datang <?= $this->session->userdata('nama') ?></h3>
		<span class="d-block mb-2">Silakan Pilih Nama Anak dan Mata Pelajaran untuk Melihat Nilai</span>
		<div class="col-12">
			<table class="table table-responsive-md">
				<thead>
					<tr>
						<th scope="col">#</th>
						<th scope="col">Nama Anak</th>
						<th scope="col">Kelas</th>
						<th scope="col">Action</th>
					</tr>
				</thead>
				<tbody>

					<?php $no = 1; ?>
					<?php foreach ($anaksaya as $anaksaya) : ?>
						<tr>
							<th scope="row"><?= $no ?></th>
							<td><?= $anaksaya['nama'] ?></td>
							<td><?= $anaksaya['kelas'] ?></td>
							<td>
								<a href="#" data-id="<?= $anaksaya['idKelas'] ?>" data-siswa="<?= $anaksaya['id'] ?>" class="badge badge-info" data-toggle="modal" data-target="#modalPilihMapel">Lihat Nilai</a>
							</td>
						</tr>
						<?php $no++; ?>
					<?php endforeach; ?>

				</tbody>
			</table>
		</div>

		<!-- Modal Pilih Mapel -->
		<div class="modal fade PilihMapel" id="modalPilihMapel" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalCenterTitle">Pilih Mata Pelajaran!</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body ">
						<div class="row mapell" id="PilihMapel">

						</div>
						<small class="text-danger">Pilih Mata Pelajaran untuk Melihat Nilai!</small>

						<input type="hidden" id="ortu" value="ortu">
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div>
	<?php endif; ?>

</div>
