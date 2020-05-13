<h2 class="text-center mb-3">Jadwal Pelajaran Kelas <?= $kelas['kelas'] ?></h2>
<div class="container">
	<a href="#" class="badge badge-info ml-3"><i class="fa fa" data-toggle="modal" data-target="#exampleModalTambahJadwal"> Tambah Jadwal</i></a>

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
						<a href="<?= base_url('Jadwal/DetailJadwal/' . $id . '/' . $jadwal['hari']) ?>" class="badge badge-primary">Lihat Jadwal</a>

					</td>

				</tr>
				<?php $no++; ?>
			<?php endforeach; ?>
		</tbody>
	</table>

	


	<!-- Modal Add -->
	<div class="modal fade" id="exampleModalTambahJadwal" tabindex="-1" role="dialog" aria-labelledby="exampleModalTambahJadwal" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="staticBackdropLabel">Tambah Jadwal</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form method="post" action="<?= base_url() ?>Jadwal/AddDetail">
						<input type="hidden" name="id" value="<?= $id ?>">
						<div class="form-group">
							<label for="">Jam Mulai <span class="text-danger">*</span></label>
							<input type="time" class="form-control" name="mulai">
						</div>
						<div class="form-group">
							<label for="">Jam Selesai <span class="text-danger">*</span></label>
							<input type="time" class="form-control" name="selesai">
						</div>
						<div class="form-group">
							<label for="">Ruang <span class="text-danger">*</span></label>
							<input type="text" class="form-control" name="ruang">
						</div>
						<div class="form-group" id="jurusanKelasAdd">
							<label for="">Mapel <span class="text-danger">*</span></label>
							<select class="form-control jurusan" id="exampleFormControlSelect1 jurusanKelas" required name="mapel">
								<option disabled selected>-- Mapel --</option>
								<?php foreach ($mapel as $mpl) : ?>
									<option value="<?= $mpl['id'] ?>"><?= $mpl['mapel'] ?></option>
								<?php endforeach; ?>
							</select>
						</div>
						<div class="form-group" id="">
							<label for="">Hari <span class="text-danger">*</span></label>
							<select class="form-control jurusan" id="exampleFormControlSelect1 jurusanhari" required name="hari">
								<option disabled selected>-- Hari --</option>
								<?php foreach ($hari as $j) : ?>
									<option value="<?= $j ?>"><?= $j ?></option>
								<?php endforeach; ?>
							</select>
						</div>
						<div class="form-group" id="jurusanKelasAdd">
							<label for="">Kelas <span class="text-danger">*</span></label>
							<select class="form-control jurusan" id="exampleFormControlSelect1 jurusanKelas" required name="kelas">
								<option selected value="<?= $kelas['id'] ?>"><?= $kelas['kelas'] ?></option>
							</select>
						</div>
						<span class="text-danger">* Wajib diisi!</span>
						<div class="form-group">
							<button class="btn btn-primary float-right">Tambah</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- End Modal -->
</div>
