<h1 class="text-center">Data Guru</h1>
<button href="" class="btn btn-link ml-3"><i class="fa fa-user-plus" data-toggle="modal" data-target="#ModalTambahGuru"> Tambah Guru</i></button>
<div class="flashdata" data-alert="<?= $this->session->flashdata('alert') ?>"></div>
<div class="flashdata2" data-alert2="<?= $this->session->flashdata('alert2') ?>"></div>
<div class="card shadow mb-4">
	<div class="card-header py-3">
		<a href="<?= base_url() ?>Guru/Export" target="blank" class="btn btn-info ml-3 btn-sm d-inline"><i class="fa fa-file-download"> Export Data </i></a>
		<a href="<?= base_url() ?>Guru/ExportExcel" target="blank" class="btn btn-success ml-3 btn-sm d-inline"><i class="fa fa-file-download"> Export Excel </i></a>
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered-stripped" id="dataTable" width="100%" cellspacing="0">
				<thead>
					<tr>
						<th>Nama</th>
						<th>Email</th>
						<th>Password</th>
						<th>Action</th>
					</tr>
				</thead>
				<tfoot>
					<tr>
						<th>Nama</th>
						<th>Email</th>
						<th>Password</th>
						<th>Action</th>
					</tr>
				</tfoot>
				<tbody>
					<?php foreach ($guru as $g) : ?>
						<tr>
							<td><?= $g['nama']; ?></td>
							<td><?= $g['email']; ?></td>
							<td><?= $g['password']; ?></td>
							<td>
								<button data-id="<?= $g['id'] ?>" class="btn btn-danger btn-sm hapus" data-toggle="modal" data-target="#modalHapusGuru"><i class="fa fa-trash"></i></button>
								<button data-id="<?= $g['id'] ?>" class="btn btn-success btn-sm EditGuru" title="Edit" id="EditGuru" data-toggle="modal" data-target="#ModalEditGuru"><i class="fa fa-edit"></i></button>
								<button data-id="<?= $g['id'] ?>" class="btn btn-success btn-sm DetailGuru" title="Detail" id="DetailGuru" data-toggle="modal" data-target="#modalDetailGuru"><i class="fa fa-pencil-alt"></i></button>

							</td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>



<!-- Modal Add-->
<div class="modal fade" id="ModalTambahGuru" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-scrollable" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalScrollableTitle">Tambah Data</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form method="post" action="<?= base_url() ?>Guru/Create">
					<div class="form-group">
						<label for="">Nama <span class="text-danger">*</span></label>
						<input type="text" class="form-control" required name="nama" placeholder="Masukan nama Guru">
					</div>
					<div class="form-group">
						<label for="">Email <span class="text-danger">*</span></label>
						<input type="email" class="form-control" required name="email" placeholder="Masukan Email">
						<small class="text-danger">* Email Tidak Boleh Sama!</small>
					</div>
					<div class="form-group">
						<label for="">Password <span class="text-danger">*</span></label>
						<input type="text" class="form-control" required name="password" placeholder="Masukan Password">
					</div>
					<div class="form-group jk-ortu">
						<label for="">Status <span class="text-danger">*</span></label>
						<select class="form-control" required name="status">
							<option disabled selected>-- Status --</option>>
							<option value="Menikah">Menikah</option>>
							<option value="Belum Menikah">Belum Menikah</option>>
						</select>
					</div>
					<div class="form-group jk-ortu">
						<label for="">Jenis Kelamin <span class="text-danger">*</span></label>
						<select class="form-control" required name="jk">
							<option disabled selected>-- Jenis Kelamin --</option>
							<option value="Laki-laki">Laki-laki</option>
							<option value="Perempuan">Perempuan</option>
						</select>
					</div>
					<div class="form-group agama-ortu">
						<label for="">Agama <span class="text-danger">*</span></label>
						<select class="form-control" required name="agama">
							<option disabled selected>-- Agama --</option>
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
						<select class="form-control" required name="gol-darah">
							<option disabled selected>-- Gol Darah --</option>
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
						<label for="">Pendidikan Terakhir <span class="text-danger">*</span></label>
						<input type="text" class="form-control" required name="pendidikan" placeholder="CONTOH : S1 PENDIDIKAN SENI RUPA">
					</div>
					<div class="form-group">
						<label for="">Tempat Lahir <span class="text-danger">*</span></label>
						<input type="text" class="form-control" required name="tempat-lahir" placeholder="Masukan Tempat Lahir">
					</div>
					<div class="form-group">
						<label for="">Tanggal Lahir <span class="text-danger">*</span></label>
						<input type="date" class="form-control" required name="tanggal-lahir">
						<!-- <input type="date" class="form-control" required name="tanggal-lahir" value="2013-01-08"> -->
					</div>
					<div class="form-group">
						<label for="">Alamat <span class="text-danger">*</span></label>
						<textarea required name="alamat" cols="30" rows="2" class="form-control"></textarea>
					</div>
					<div class="form-group">
						<label for="">Telpon <span class="text-danger">*</span></label>
						<input type="text" class="form-control" required name="telpon" placeholder="Masukan Telpon">
					</div>
					<div class="form-group">
						<label for="">kewarganegaraan <span class="text-danger">*</span></label>
						<input type="text" class="form-control" required name="kewarganegaraan" placeholder="Contoh : Warga Negara Indonesia">
					</div>
					<span class="text-danger">* Wajib diisi!</span>
					<div class="form-group">
						<button class="btn btn-primary float-right">Tambah</button>
					</div>
				</form>
			</div>
			<div class="modal-footer text-left">
				<button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>
<!-- End Modal -->

<!-- Modal Edit -->
<div class="modal fade EditGuru" id="ModalEditGuru" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-scrollable" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalScrollableTitle">Edit Data</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form method="post" action="<?= base_url() ?>Guru/Edit">
					<input type="hidden" required name="id" id="id-guru">
					<div class="form-group">
						<label for="">Nama <span class="text-danger">*</span></label>
						<input type="text" class="form-control" required name="nama" placeholder="Masukan nama Guru" id="nama-guru">
					</div>
					<div class="form-group">
						<label for="">Email <span class="text-danger">*</span></label>
						<input type="text" class="form-control" required name="email" placeholder="Masukan Email" id="email-guru">
						<small class="text-danger">* Email Tidak Boleh Sama!</small>
					</div>
					<div class="form-group">
						<label for="">Password <span class="text-danger">*</span></label>
						<input type="text" class="form-control" required name="password" placeholder="Masukan Password" id="password-guru">
					</div>
					<div class="form-group jk-guru">
						<label for="">Jenis Kelamin <span class="text-danger">*</span></label>
						<select class="form-control" id="jk-guru" required name="jk">
							<option disabled selected>-- Jenis Kelamin --</option>
							<option value="Laki-laki">Laki-laki</option>
							<option value="Perempuan">Perempuan</option>
						</select>
					</div>
					<div class="form-group status-guru">
						<label for="">Status <span class="text-danger">*</span></label>
						<select class="form-control" required name="status">
							<option disabled selected>-- Status --</option>>
							<option value="Menikah">Menikah</option>>
							<option value="Belum Menikah">Belum Menikah</option>>
						</select>
					</div>

					<div class="form-group agama-guru">
						<label for="">Agama <span class="text-danger">*</span></label>
						<select class="form-control" id="agama-Guru" required name="agama">
							<option disabled selected>-- Agama --</option>
							<option value="Islam">Islam</option>
							<option value="Kristen">Kristen</option>
							<option value="Katolik">Katolik</option>
							<option value="Buddha">Buddha</option>
							<option value="Hindu">Hindu</option>
							<option value="Kong Hu Cu">Kong Hu Cu</option>
						</select>
					</div>
					<div class="form-group goldarah-guru">
						<label for="">Gol Darah <span class="text-danger">*</span></label>
						<select class="form-control" id="gol-darah-guru" required name="gol-darah">
							<option disabled selected>-- Gol Darah --</option>
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
						<label for="">Pendidikan Terakhir <span class="text-danger">*</span></label>
						<input type="text" class="form-control" id="pendidikan-guru" required name="pendidikan" placeholder="CONTOH : S1 PENDIDIKAN SENI RUPA">
					</div>
					<div class="form-group">
						<label for="">Tempat Lahir <span class="text-danger">*</span></label>
						<input type="text" class="form-control" id="tempat-lahir-guru" required name="tempat-lahir" placeholder="Masukan Tempat Lahir">
					</div>
					<div class="form-group">
						<label for="">Tanggal Lahir <span class="text-danger">*</span></label>
						<input type="date" class="form-control" id="tanggal-lahir-guru" required name="tanggal-lahir">
						<!-- <input type="date" class="form-control" required name="tanggal-lahir" value="2013-01-08"> -->
					</div>
					<div class="form-group">
						<label for="">Alamat <span class="text-danger">*</span></label>
						<textarea required name="alamat" id="alamat-guru" cols="30" rows="2" class="form-control"></textarea>
					</div>
					<div class="form-group">
						<label for="">Telpon <span class="text-danger">*</span></label>
						<input type="text" class="form-control" id="telpon-guru" required name="telpon" placeholder="Masukan Telpon">
					</div>
					<div class="form-group">
						<label for="">kewarganegaraan <span class="text-danger">*</span></label>
						<input type="text" class="form-control" id="kewarganegaraan-guru" required name="kewarganegaraan" placeholder="Contoh : Warga Negara Indonesia">
					</div>
					<span class="text-danger">* Wajib diisi!</span>
					<div class="form-group">
						<button class="btn btn-primary float-right">Edit</button>
					</div>
				</form>
			</div>
			<div class="modal-footer text-left">
				<button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>
<!-- End Modal -->


<!-- Modal Delete -->
<div class="modal fade DeleteGuru" id="modalHapusGuru" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
				<a href="" data-id="<?= $g['id'] ?>" class="btn btn-danger hapusGuru" id="hapusGuru" title="Hapus">Delete!</a>
			</div>
		</div>
	</div>
</div>

<!-- Modal Detail -->
<div class="modal fade DetailGuru" id="modalDetailGuru" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
