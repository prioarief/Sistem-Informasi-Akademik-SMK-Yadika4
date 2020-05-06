<h1 class="text-center">Data Kelas</h1>
<button class="btn btn-link ml-3"><i class="fa fa-user-plus" data-toggle="modal" data-target="#exampleModalTambahKelas"> Tambah Kelas</i></button>
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
						<th>Jurusan</th>
						<th>Action</th>
					</tr>
				</thead>
				<tfoot>
					<tr>
						<th>Kelas</th>
						<th>Jurusan</th>
						<th>Action</th>
					</tr>
				</tfoot>
				<tbody>
					<?php foreach ($kelas as $s) : ?>
						<tr>
							<td><?= $s['kelas']; ?></td>
							<td><?= $s['jurusan']; ?></td>
							<td>
								<button data-id="<?= $s['idkelas'] ?>" class="btn btn-danger btn-sm hapusKelass" id="hapusKelas" title="Hapus" data-toggle="modal" data-target="#modalHapusKelas"><i class="fa fa-trash"></i></button>
								<button data-id="<?= $s['idkelas'] ?>" data-kelas="<?= $s['kelas']; ?>" class="btn btn-success btn-sm EditKelas" title="Edit" id="EditKelas" data-toggle="modal" data-target="#exampleModalEditKelas"><i class="fa fa-edit"></i></button>
								<button data-id="<?= $s['idkelas'] ?>" class="btn btn-info btn-sm DetailKelas" title="Detail" id="DetailKelas" data-toggle="modal" data-target="#modalDetailKelas"><i class="fa fa-pencil-alt"></i></button>
							</td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>

<!-- Modal Add -->
<div class="modal fade TambahKelas" id="exampleModalTambahKelas" tabindex="-1" role="dialog" aria-labelledby="exampleModalTambahKelas" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="staticBackdropLabel">Tambah Kelas</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form method="post" action="<?= base_url() ?>Kelas/Create">
					<div class="form-group">
						<label for="">Kelas <span class="text-danger">*</span></label>
						<input type="text" class="form-control kelas" id="Kelas" required name="kelas" placeholder="Masukan nama kelas">
					</div>
					<div class="form-group" id="jurusanKelasAdd">
						<label for="">Jurusan <span class="text-danger">*</span></label>
						<select class="form-control jurusan" id="exampleFormControlSelect1 jurusanKelas" required name="jurusan">
							<option disabled selected>-- Jurusan --</option>
							<?php foreach ($jurusan as $j) : ?>
								<option value="<?= $j['id'] ?>"><?= $j['jurusan'] ?></option>
							<?php endforeach; ?>
						</select>
					</div>
					<span class="text-danger">* wajib diisi!</span>
					<div class="form-group">
						<button class="btn btn-primary float-right" id="BtnTambahKelas">Tambah</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- End Modal -->

<!-- Modal Edit -->
<div class="modal fade EditKelas" id="exampleModalEditKelas" tabindex="-1" role="dialog" aria-labelledby="exampleModalEditKelas" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="staticBackdropLabel">Edit Kelas</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form method="post" action="<?= base_url() ?>Kelas/Edit">
					<input type="hidden" required name="id" id="id">
					<div class="form-group">
						<label for="">Kelas <span class="text-danger">*</span></label>
						<input type="text" class="form-control inputKelas" required name="kelas" id="inputKelas" placeholder="Masukan nama kelas">
					</div>
					<div class="form-group jurusanEdit">
						<label for="">Jurusan <span class="text-danger">*</span></label>
						<select class="form-control" id="exampleFormControlSelect1 jurusanKelas" required name="jurusan">
							<!-- <option selected>-- Jurusan --</option> -->
							<?php foreach ($jurusan as $j) : ?>
								<option value="<?= $j['id'] ?>"><?= $j['jurusan'] ?></option>

							<?php endforeach; ?>
						</select>
					</div>
					<span class="text-danger">* wajib diisi!</span>
					<div class="form-group">
						<button class="btn btn-primary float-right btnEdit" id="btnEdit">Edit</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- End Modal -->

<!-- Modal Delete -->
<div class="modal fade DeleteKelas" id="modalHapusKelas" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
				<a href="" data-id="<?= $s['idkelas'] ?>" class="btn btn-danger hapusKelass" id="hapusKelas" title="Hapus">Delete!</a>
			</div>
		</div>
	</div>
</div>

<!-- Modal Detail -->
<div class="modal fade DetailKelas" id="modalDetailKelas" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-scrollable" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title detail" id="exampleModalCenterTitle"></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body detail">
				
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>
