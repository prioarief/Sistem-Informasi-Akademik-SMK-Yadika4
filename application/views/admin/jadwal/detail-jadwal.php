<h2 class="text-center mb-3">Jadwal Pelajaran Hari <?= $hari ?></h2>
<div class="flashdata" data-alert="<?= $this->session->flashdata('alert') ?>"></div>
<div class="flashdata2" data-alert2="<?= $this->session->flashdata('alert2') ?>"></div>
<div class="container">

	<a href="#" class="badge badge-info mb-2" data-toggle="modal" data-target="#exampleModalTambahJadwal">Input Jadwal</a>
	<table class="table table-responsive-md">
		<thead>
			<tr>
				<th scope="col">#</th>
				<th scope="col">Jam Mulai</th>
				<th scope="col">Jam Selesai</th>
				<th scope="col">Mapel</th>
				<th scope="col">Guru</th>
				<th scope="col">Ruang</th>
				<th scope="col">Action</th>
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
					<td>
						<a href="#" data-id="<?= $jadwal['id'] ?>" data-toggle="modal" data-target="#exampleModalEditJadwal" class="badge badge-primary">Ubah</a>
						<a href="<?= base_url('Jadwal/HapusDetailJadwal/' . $jadwal['id'] . '/' . $jadwal['hari'] . '/' . $id) ?>" onclick="return confirm('yakin?')" class="badge badge-danger hapusDetailJadwal">Hapus</a>

					</td>

				</tr>
				<?php $no++; ?>
			<?php endforeach; ?>
		</tbody>
	</table>
	<a href="<?= base_url('Jadwal/ExportPdf/' . $jadwal['jadwal_id']. '/'. $hari) ?>" target="blank" class="btn btn-primary ml-3 btn-sm"><i class="fa fa-file-download"> Export PDF </i></a>

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
						<div class="form-group" id="">
							<label for="">Hari <span class="text-danger">*</span></label>
							<input type="text" readonly name="hari" class="form-control" value="<?= $hari ?>">
						</div>
						<div class="form-group" id="jurusanKelasAdd">
							<label for="">Kelas <span class="text-danger">*</span></label>
							<select class="form-control jurusan" id="exampleFormControlSelect1 jurusanKelas" required name="mapel">
								<option disabled selected>-- Mapel --</option>
								<?php foreach ($mapel as $mpl) : ?>
									<option value="<?= $mpl['id'] ?>"><?= $mpl['mapel'] ?></option>
								<?php endforeach; ?>
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


	<!-- Modal Edit -->
	<div class="modal fade EditJadwal" id="exampleModalEditJadwal" tabindex="-1" role="dialog" aria-labelledby="exampleModalEditJadwal" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="staticBackdropLabel">Edit Jadwal</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form method="post" action="<?= base_url() ?>Jadwal/EditDetail">
						<input type="hidden" id="id-edit" name="id" value="<?= $id ?>">
						<div class="form-group">
							<label for="">Jam Mulai <span class="text-danger">*</span></label>
							<input type="time" class="form-control" id="mulai-edit" name="mulai">
						</div>
						<div class="form-group">
							<label for="">Jam Selesai <span class="text-danger">*</span></label>
							<input type="time" class="form-control" id="selesai-edit" name="selesai">
						</div>
						<div class="form-group">
							<label for="">Ruang <span class="text-danger">*</span></label>
							<input type="text" class="form-control" id="ruang-edit" name="ruang">
						</div>
						<div class="form-group" id="">
							<label for="">Hari <span class="text-danger">*</span></label>
							<input type="text" readonly id="hari-edit" name="hari" class="form-control" value="<?= $hari ?>">
						</div>
						<div class="form-group detailJadwal" id="detailJadwal">
							<label for="">Kelas <span class="text-danger">*</span></label>
							<select class="form-control jurusan" id="exampleFormControlSelect1 jurusanKelas" required id="-edit" name="mapel">
								<option disabled selected>-- Mapel --</option>
								<?php foreach ($mapel as $mpl) : ?>
									<option value="<?= $mpl['id'] ?>"><?= $mpl['mapel'] ?></option>
								<?php endforeach; ?>
							</select>
						</div>
						<span class="text-danger">* Wajib diisi!</span>
						<div class="form-group">
							<button class="btn btn-primary float-right">Edit</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- End Modal -->
</div>
