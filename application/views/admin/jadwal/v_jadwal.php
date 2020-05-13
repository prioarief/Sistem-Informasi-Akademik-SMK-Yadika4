<h1 class="text-center">Data Jadwal</h1>
<button href="" class="btn btn-link ml-3"><i class="fa fa-user-plus" data-toggle="modal" data-target="#exampleModalTambahJadwal"> Tambah Jadwal</i></button>
<div class="flashdata" data-alert="<?= $this->session->flashdata('alert') ?>"></div>
<div class="flashdata2" data-alert2="<?= $this->session->flashdata('alert2') ?>"></div>
<div class="card shadow mb-4">
	<div class="card-header py-3">

	</div>
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered-stripped" id="dataTable" width="100%" cellspacing="0">
				<thead>
					<tr>
						<th>Kelas</th>
						<th>Action</th>
					</tr>
				</thead>
				<tfoot>
					<tr>
						<th>Kelas</th><th>Hari</th>
						<th>Action</th>
					</tr>
				</tfoot>
				<tbody>
					<?php foreach ($jadwal as $jdwl) : ?>
						<tr>
							<td><?= $jdwl['kelas']; ?></td>
							<td>
								<button data-id="<?= $jdwl['id'] ?>" class="btn btn-danger btn-sm hapusJadwal" id="hapusJadwal" title="Hapus" data-toggle="modal" data-target="#modalHapusJadwal"><i class="fa fa-trash"></i></button>
								<a href="<?= base_url('Jadwal/Detail/'. $jdwl['id'] .'/'.$jdwl['idkelas']) ?>" class="btn btn-success btn-sm" title="Detail"><i class="fa fa-edit"></i></a>
							</td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>

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
				<form method="post" action="<?= base_url() ?>Jadwal/Create">
					<!-- <div class="form-group">
						<label for="">Jam Mulai <span class="text-danger">*</span></label>
						<input type="time" class="form-control" name="mulai">
					</div>
					<div class="form-group">
						<label for="">Jam Selesai <span class="text-danger">*</span></label>
						<input type="time" class="form-control" name="selesai">
					</div> -->
					<!-- <div class="form-group" id="">
						<label for="">Hari <span class="text-danger">*</span></label>
						<select class="form-control jurusan" id="exampleFormControlSelect1 jurusanhari" required name="hari">
							<option disabled selected>-- Hari --</option>
							<?php foreach ($hari as $j) : ?>
								<option value="<?= $j ?>"><?= $j ?></option>
							<?php endforeach; ?>
						</select>
					</div> -->
					<div class="form-group" id="jurusanKelasAdd">
						<label for="">Kelas <span class="text-danger">*</span></label>
						<select class="form-control jurusan" id="exampleFormControlSelect1 jurusanKelas" required name="kelas">
							<option disabled selected>-- Kelas --</option>
							<?php foreach ($kelas as $j) : ?>
								<option value="<?= $j['idkelas'] ?>"><?= $j['kelas'] ?></option>
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

<!-- Modal Delete -->
<div class="modal fade DeleteJadwal" id="modalHapusJadwal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalCenterTitle">Konfirmasi</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<h6>Apakah Anda Yakin Ingin Menghapus?</h6>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<a href="" data-id="<?= $jdwl['id'] ?>" class="btn btn-danger hapusJadwal" id="hapusJadwal" title="Hapus">Delete!</a>
			</div>
		</div>
	</div>
</div>
