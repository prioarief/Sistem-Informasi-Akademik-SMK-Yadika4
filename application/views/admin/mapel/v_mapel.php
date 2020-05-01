<h1 class="text-center">Data Mapel</h1>
<button href="" class="btn btn-link ml-3"><i class="fa fa-user-plus" data-toggle="modal" data-target="#exampleModalTambahMapel"> Tambah Mapel</i></button>
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
						<th>Mapel</th>
						<th>Guru</th>
						<th>Kelas</th>
						<th>Action</th>
					</tr>
				</thead>
				<tfoot>
					<tr>
						<th>Mapel</th>
						<th>Guru</th>
						<th>Kelas</th>
						<th>Action</th>
					</tr>
				</tfoot>
				<tbody>
					<?php foreach ($mapel as $j) : ?>
						<tr>
							<td><?= $j['mapel']; ?></td>
							<td><?= $j['nama_guru']; ?></td>
							<td>
								<button data-id="<?= $j['id'] ?>" class="badge badge-primary detailKelas" title="Detail" data-toggle="modal" data-target="#modalDetailKelas">Lihat Kelas Yang Di ajar</button>
							</td>
							<td>
								<button data-id="<?= $j['id'] ?>" class="btn btn-danger btn-sm hapusMapel" title="Hapus" data-toggle="modal" data-target="#modalHapusMapel"><i class="fa fa-trash"></i></button>
								<button data-id="<?= $j['id'] ?>" class="btn btn-success btn-sm EditMapel" title="Edit" id="EditMapel" data-toggle="modal" data-target="#exampleModalEditMapel"><i class="fa fa-edit"></i></button>
							</td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>

<!-- Modal Add -->
<div class="modal fade" id="exampleModalTambahMapel" tabindex="-1" role="dialog" aria-labelledby="exampleModalTambahMapel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="staticBackdropLabel">Tambah Mapel</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form method="post" action="<?= base_url() ?>Mapel/Create">
					<div class="form-group">
						<label for="">Mapel <span class="text-danger">*</span></label>
						<input type="text" id="mapel" class="form-control" name="mapel" placeholder="Masukan Mapel">
					</div>
					<div class="form-group" id="">
						<label for="">Guru<span class="text-danger">*</span></label>
						<select class="form-control guru" id="exampleFormControlSelect1" name="guru">
							<option disabled selected>-- Guru Yang Mengajar --</option>
							<?php foreach ($guru as $guru) : ?>
								<option value="<?= $guru['id'] ?>"><?= $guru['nama'] ?></option>
							<?php endforeach; ?>
						</select>
					</div>
					<div class="form-group" id="">
						<p>Kelas Yang Diajar <span class="text-danger">*</span></p>
						<div class="row">
							<?php foreach ($kelas as $kelas) : ?>
								<div class="col-sm-3">
									<div class="form-check">
										<input class="form-check-input" type="checkbox" name="kelas[]" value="<?= $kelas['idkelas'] ?>" id="kelas<?= $kelas['idkelas'] ?>">
										<label class="form-check-label" for="kelas<?= $kelas['idkelas'] ?>">
											<?= $kelas['kelas'] ?>
										</label>
									</div>
								</div>
							<?php endforeach; ?>
						</div>
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
<div class="modal fade EditMapel" id="exampleModalEditMapel" tabindex="-1" role="dialog" aria-labelledby="exampleModalEditMapel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="staticBackdropLabel">Edit Mapel</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form method="post" action="<?= base_url() ?>Mapel/Edit">
					<input type="hidden" name="id" id="idMapel">
					<div class="form-group">
						<label for="">Mapel <span class="text-danger">*</span></label>
						<input type="text" class="form-control" name="Mapel" placeholder="Masukan nama Mapel" id="inputMapel">
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

<!-- Modal Delete -->
<div class="modal fade DeleteMapel" id="modalHapusMapel" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
				<a href="" data-id="<?= $j['id'] ?>" class="btn btn-danger hapusMapel" id="hapusKelas" title="Hapus">Delete!</a>
			</div>
		</div>
	</div>
</div>

<!-- Modal Detail Kelas -->
<div class="modal fade DetailKelas" id="modalDetailKelas" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalCenterTitle">Detail</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body detailKelas">
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>
