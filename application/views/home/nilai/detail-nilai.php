<div class="container">
	<h4 class="text-center mb-4">Nilai <?= $siswa['nama'] ?> <br> Mata Pelajaran <?= $mapel['mapel'] ?></h4>


	<?php if ($this->session->userdata('akses') == 'Guru') : ?>
		<a href="#" class="badge badge-info mb-3 AddNilai" title="Detail" id="AddNilai" data-toggle="modal" data-target="#modalAddNilai">
			<i class="fa fa-input"></i>
			Input Nilai
		</a>
	<?php endif; ?>

	<table class="table table-responsive-md">
		<thead>
			<tr>
				<th scope="col">#</th>
				<th scope="col">Keterangan</th>
				<th scope="col">Action</th>
			</tr>
		</thead>
		<tbody>
			<?php $no = 1; ?>
			<?php foreach ($nilai as $nilai) : ?>
				<tr>
					<th scope="row"><?= $no ?></th>
					<td><?= $nilai['keterangan'] ?></td>
					<td>


						<?php if ($this->session->userdata('akses') == 'Guru') : ?>
							<a data-id="<?= $nilai['id'] ?>" href="#" class="badge badge-primary" data-toggle="modal" data-target="#modalNilai">Lihat Nilai</a>
							<a data-text="<?= $nilai['keterangan'] . ' ' . $siswa['nama'] ?>" href="<?= base_url('Home/DeleteNilai/' . $nilai['id'] . '/' . $siswa['id'] . '/' . $mapel['id']) ?>" class="badge badge-danger deleteNilai">Hapus Nilai</a>
						<?php else : ?>
							<a data-id="<?= $nilai['id'] ?>" href="#" class="badge badge-primary" data-toggle="modal" data-target="#modalNilaiSiswa">Lihat Nilai</a>
						<?php endif; ?>

					</td>

				</tr>
				<?php $no++; ?>
			<?php endforeach; ?>
		</tbody>
	</table>

	<?php if ($this->session->userdata('akses') == 'Guru') : ?>
		<!-- Modal Add -->
		<div class="modal fade AddNilai" id="modalAddNilai" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
			<div class="modal-dialog modal-dialog-scrollable" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title detail" id="exampleModalCenterTitle">Input Nilai</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<form action="<?= base_url() ?>Home/InputNilai" method="post">
							<input type="hidden" name="siswa" value="<?= $siswa['id'] ?>">
							<input type="hidden" name="mapel" value="<?= $mapel['id'] ?>" id="mapel" data-produktif="<?= $mapel['produktif'] ?>">
							<div class="form-group">
								<label for="">Nilai Pengetahuan <span class="text-danger">*</span></label>
								<input type="number" min="1" max="100" class="form-control pengetahuan" id="pengetahuan" autofocus required name="pengetahuan" placeholder="Nilai Pengetahuan">
							</div>
							<div class="form-group">
								<label for="">Nilai Keterampilan <span class="text-danger">*</span></label>
								<input type="number" min="1" max="100" class="form-control keterampilan" id="keterampilan" required name="keterampilan" placeholder="Nilai Keterampilan">
							</div>
							<div class="form-group">
								<label for="">Nilai Akhir</label>
								<input type="text" min="1" max="100" class="form-control akhir" id="akhir" required name="akhir" readonly placeholder="Nilai Akhir">
							</div>
							<div class="form-group">
								<label for="">Keterangan</label>
								<input type="text" min="1" max="100" class="form-control keterangan" id="keterangan" required name="keterangan" placeholder="Contoh Nilai Semester 1">
							</div>
							<div id="predikat" class="mb-2">

							</div>
							<div class="form-group">
								<button type="submit" class="btn btn-primary btn-sm">Input Nilai</button>
							</div>
						</form>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div>


		<!-- Modal nilai -->
		<div class="modal fade Nilai" id="modalNilai" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
			<div class="modal-dialog modal-dialog-scrollable" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title detail" id="exampleModalCenterTitle">Nilai</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body nilai-body">
						<form action="<?= base_url() ?>Home/EditNilai" method="post">
							<input type="hidden" name="id" id="id-edit">
							<input type="hidden" name="siswa" id="siswa-edit">
							<input type="hidden" name="mapel" id="mapel-edit">
							<div class="form-group">
								<label for="">Nilai Pengetahuan <span class="text-danger">*</span></label>
								<input type="number" min="1" max="100" class="form-control pengetahuan" id="pengetahuan-edit" autofocus required name="pengetahuan" placeholder="Nilai Pengetahuan" value="">
							</div>
							<div class="form-group">
								<label for="">Nilai Keterampilan <span class="text-danger">*</span></label>
								<input type="number" min="1" max="100" class="form-control keterampilan" id="keterampilan-edit" required name="keterampilan" placeholder="Nilai Keterampilan" value="">
							</div>
							<div class="form-group">
								<label for="">Keterangan</label>
								<input type="text" max="100" class="form-control keterangan" id="keterangan-edit" required name="keterangan" placeholder="Contoh Nilai Semester 1">
							</div>
							<!-- <div class="form-group">
							<label for="">Nilai Akhir</label>
							<input type="text" min="1" class="form-control akhir" id="akhir-edit" required name="akhir" readonly placeholder="Nilai Akhir" value="">
						</div> -->
							<div class="predikat" class="mb-2">
								<p id="predikat-edit">Predikat : </p>
							</div>
							<div class="form-group">
								<button type="submit" class="btn btn-primary btn-sm">Edit Nilai</button>
							</div>
						</form>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div>
	<?php endif; ?>


	<!-- Modal nilai -->
	<div class="modal fade NilaiSiswa" id="modalNilaiSiswa" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		<div class="modal-dialog modal-dialog-scrollable" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title detail" id="exampleModalCenterTitle">Nilai Siswa</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body nilai-body-siswa">

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>


</div>
