<h1 class="text-center">Data Orangtua</h1>
<button href="" class="btn btn-link ml-3"><i class="fa fa-user-plus" data-toggle="modal" data-target="#exampleModalTambahOrangtua"> Tambah Orangtua</i></button>
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
						<th>Nama</th>
						<th>NIK</th>
						<th>Nama Anak</th>
						<th>Action</th>
					</tr>
				</thead>
				<tfoot>
					<tr>
						<th>Nama</th>
						<th>NIK</th>
						<th>Nama Anak</th>
						<th>Action</th>
					</tr>
				</tfoot>
				<tbody>
					<?php foreach ($orangtua as $ot) : ?>
						<tr>
							<td><?= $ot['nama']; ?></td>
							<td><?= $ot['nik']; ?></td>
							<td><?= $ot['nama']; ?></td>
							<td>
								<a href="<?= base_url() ?>" class="btn btn-danger btn-sm hapus" title="Hapus"><i class="fa fa-trash"></i></a>
								<button data-id="<?= $ot['id'] ?>" class="btn btn-success btn-sm EditOrangtua" title="Edit" id="EditOrangtua" data-toggle="modal" data-target="#exampleModalEditOrangtua"><i class="fa fa-edit"></i></button>
								<a href="<?= base_url() ?>" class="btn btn-info btn-sm" title="Detail"><i class="fa fa-pen"></i></a>
							</td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>

<!-- Modal Add -->
<div class="modal fade" id="exampleModalTambahOrangtua" tabindex="-1" role="dialog" aria-labelledby="exampleModalTambahOrangtua" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="staticBackdropLabel">Tambah Orangtua</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form method="post" action="<?= base_url() ?>Orangtua/Create">
					<div class="form-group">
						<label for="">Nama <span class="text-danger">*</span></label>
						<input type="text" class="form-control" name="nama" placeholder="Masukan nama Orangtua">
					</div>
					<div class="form-group">
						<label for="">NIK <span class="text-danger">*</span></label>
						<input type="text" class="form-control" name="nik" placeholder="Masukan NIK">
						<small class="text-danger">* NIK Tidak Boleh Sama!</small>
					</div>
					<div class="form-group">
						<label for="">Password <span class="text-danger">*</span></label>
						<input type="text" class="form-control" name="password" placeholder="Masukan Password">
					</div>
					<div class="form-group jurusanEdit">
						<label for="">Jenis Kelamin <span class="text-danger">*</span></label>
						<select class="form-control" id="" name="jk">
							<option selected>-- Jenis Kelamin --</option>
							<option value="Laki-laki">Laki-laki</option>
							<option value="Perempuan">Perempuan</option>
						</select>
					</div>
					<div class="form-group jurusanEdit">
						<label for="">Agama <span class="text-danger">*</span></label>
						<select class="form-control" id="" name="agama">
							<option selected>-- Agama --</option>
							<option value="Islam">Islam</option>
							<option value="Kristen">Kristen</option>
							<option value="Katolik">Katolik</option>
							<option value="Buddha">Buddha</option>
							<option value="Hindu">Hindu</option>
							<option value="Kong Hu Cu">Kong Hu Cu</option>
						</select>
					</div>
					<div class="form-group jurusanEdit">
						<label for="">Gol Darah <span class="text-danger">*</span></label>
						<select class="form-control" id="" name="gol-darah">
							<option selected>-- Gol Darah --</option>
							<option value="A+">A+</option>
							<option value="A-">A-</option>
							<option value="B+">B+</option>
							<option value="B-">B-</option>
							<option value="AB+">AB+</option>
							<option value="AB-">AB-</option>
							<option value="O+">O+</option>
							<option value="O-">O-</option>
						</select>
					</div>
					<div class="form-group">
						<label for="">Pekerjaan <span class="text-danger">*</span></label>
						<input type="text" class="form-control" name="pekerjaan" placeholder="Masukan Pekerjaan">
					</div>
					<div class="form-group">
						<label for="">Pendidikan Terakhir <span class="text-danger">*</span></label>
						<input type="text" class="form-control" name="pendidikan" placeholder="CONTOH : S1 PENDIDIKAN SENI RUPA">
					</div>
					<div class="form-group">
						<label for="">Tempat Lahir <span class="text-danger">*</span></label>
						<input type="text" class="form-control" name="tempat-lahir" placeholder="Masukan Tempat Lahir">
					</div>
					<div class="form-group">
						<label for="">Tanggal Lahir <span class="text-danger">*</span></label>
						<input type="date" class="form-control" name="tanggal-lahir">
						<!-- <input type="date" class="form-control" name="tanggal-lahir" value="2013-01-08"> -->
					</div>
					<div class="form-group">
						<label for="">Alamat <span class="text-danger">*</span></label>
						<textarea name="alamat" id="" cols="30" rows="2" class="form-control"></textarea>
					</div>
					<div class="form-group">
						<label for="">Telpon <span class="text-danger">*</span></label>
						<input type="text" class="form-control" name="telpon" placeholder="Masukan Telpon">
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
<div class="modal fade EditOrangtua" id="exampleModalEditOrangtua" tabindex="-1" role="dialog" aria-labelledby="exampleModalEditOrangtua" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="staticBackdropLabel">Edit Data Orangtua</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form method="post" action="<?= base_url() ?>Orangtua/Edit">
					<input type="hidden" name="id" id="id-ortu">
					<div class="form-group">
						<label for="">Nama <span class="text-danger">*</span></label>
						<input type="text" class="form-control" name="nama" placeholder="Masukan nama Orangtua" id="nama-ortu">
					</div>
					<div class="form-group">
						<label for="">NIK <span class="text-danger">*</span></label>
						<input type="text" class="form-control" name="nik" placeholder="Masukan NIK" id="nik-ortu">
						<small class="text-danger">* NIK Tidak Boleh Sama!</small>
					</div>
					<div class="form-group">
						<label for="">Password <span class="text-danger">*</span></label>
						<input type="text" class="form-control" name="password" placeholder="Masukan Password" id="password-ortu">
					</div>
					<div class="form-group jk-ortu">
						<label for="">Jenis Kelamin <span class="text-danger">*</span></label>
						<select class="form-control" id="jk-ortu" name="jk">
							<option selected>-- Jenis Kelamin --</option>
							<option value="Laki-laki">Laki-laki</option>
							<option value="Perempuan">Perempuan</option>
						</select>
					</div>
					<div class="form-group agama-ortu">
						<label for="">Agama <span class="text-danger">*</span></label>
						<select class="form-control" id="agama-ortu" name="agama">
							<option selected>-- Agama --</option>
							<option value="Islam">Islam</option>
							<option value="Kristen">Kristen</option>
							<option value="Katolik">Katolik</option>
							<option value="Buddha">Buddha</option>
							<option value="Hindu">Hindu</option>
							<option value="Kong Hu Cu">Kong Hu Cu</option>
						</select>
					</div>
					<div class="form-group goldarah-ortu">
						<label for="">Gol Darah <span class="text-danger">*</span></label>
						<select class="form-control" id="gol-darah-ortu" name="gol-darah">
							<option selected>-- Gol Darah --</option>
							<option value="A+">A+</option>
							<option value="A-">A-</option>
							<option value="B+">B+</option>
							<option value="B-">B-</option>
							<option value="AB+">AB+</option>
							<option value="AB-">AB-</option>
							<option value="O+">O+</option>
							<option value="O-">O-</option>
						</select>
					</div>
					<div class="form-group">
						<label for="">Pekerjaan <span class="text-danger">*</span></label>
						<input type="text" class="form-control" name="pekerjaan" id="pekerjaan-ortu" placeholder="Masukan Pekerjaan">
					</div>
					<div class="form-group">
						<label for="">Pendidikan Terakhir <span class="text-danger">*</span></label>
						<input type="text" class="form-control" id="pendidikan-ortu" name="pendidikan" placeholder="CONTOH : S1 PENDIDIKAN SENI RUPA">
					</div>
					<div class="form-group">
						<label for="">Tempat Lahir <span class="text-danger">*</span></label>
						<input type="text" class="form-control" id="tempat-lahir-ortu" name="tempat-lahir" placeholder="Masukan Tempat Lahir">
					</div>
					<div class="form-group">
						<label for="">Tanggal Lahir <span class="text-danger">*</span></label>
						<input type="date" class="form-control" id="tanggal-lahir-ortu" name="tanggal-lahir">
						<!-- <input type="date" class="form-control" name="tanggal-lahir" value="2013-01-08"> -->
					</div>
					<div class="form-group">
						<label for="">Alamat <span class="text-danger">*</span></label>
						<textarea name="alamat" id="alamat-ortu" cols="30" rows="2" class="form-control"></textarea>
					</div>
					<div class="form-group">
						<label for="">Telpon <span class="text-danger">*</span></label>
						<input type="text" class="form-control" id="telpon-ortu" name="telpon" placeholder="Masukan Telpon">
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
