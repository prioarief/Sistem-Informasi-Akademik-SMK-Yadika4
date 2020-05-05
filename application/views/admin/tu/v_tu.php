<h1 class="text-center">Data TU</h1>
<button href="" class="btn btn-link ml-3"><i class="fa fa-user-plus" data-toggle="modal" data-target="#ModalTambahTU"> Tambah TU</i></button>
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
					<?php foreach ($TU as $g) : ?>
						<tr>
							<td><?= $g['nama']; ?></td>
							<td><?= $g['email']; ?></td>
							<td><?= $g['password']; ?></td>
							<td>
								<button data-id="<?= $g['id'] ?>" class="btn btn-danger btn-sm hapus" data-toggle="modal" data-target="#modalHapusTU"><i class="fa fa-trash"></i></button>
								<button data-id="<?= $g['id'] ?>" class="btn btn-success btn-sm EditTU" title="Edit" id="EditTU" data-toggle="modal" data-target="#ModalEditTU"><i class="fa fa-edit"></i></button>
								<button data-id="<?= $g['id'] ?>" class="btn btn-success btn-sm DetailTU" title="Detail" id="DetailTU" data-toggle="modal" data-target="#modalDetailTU"><i class="fa fa-pencil-alt"></i></button>
		
							</td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>



<!-- Modal Add-->
<div class="modal fade" id="ModalTambahTU" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-scrollable" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalScrollableTitle">Tambah Data</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form method="post" action="<?= base_url() ?>TU/Create">
					<div class="form-group">
						<label for="">Nama <span class="text-danger">*</span></label>
						<input type="text" class="form-control" name="nama" placeholder="Masukan nama petugas TU">
					</div>
					<div class="form-group">
						<label for="">Email <span class="text-danger">*</span></label>
						<input type="email" class="form-control" name="email" placeholder="Masukan Email">
						<small class="text-danger">* Email Tidak Boleh Sama!</small>
					</div>
					<div class="form-group">
						<label for="">Password <span class="text-danger">*</span></label>
						<input type="text" class="form-control" name="password" placeholder="Masukan Password">
					</div>
					<div class="form-group jk-ortu">
						<label for="">Status <span class="text-danger">*</span></label>
						<select class="form-control" name="status">
							<option disabled selected>-- Status --</option>>
							<option value="Menikah">Menikah</option>>
							<option value="Belum Menikah">Belum Menikah</option>>
						</select>
					</div>
					<div class="form-group jk-ortu">
						<label for="">Jenis Kelamin <span class="text-danger">*</span></label>
						<select class="form-control" name="jk">
							<option disabled selected>-- Jenis Kelamin --</option>
							<option value="Laki-laki">Laki-laki</option>
							<option value="Perempuan">Perempuan</option>
						</select>
					</div>
					<div class="form-group agama-ortu">
						<label for="">Agama <span class="text-danger">*</span></label>
						<select class="form-control" name="agama">
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
						<select class="form-control" name="gol-darah">
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
						<textarea name="alamat" cols="30" rows="2" class="form-control"></textarea>
					</div>
					<div class="form-group">
						<label for="">Telpon <span class="text-danger">*</span></label>
						<input type="text" class="form-control" name="telpon" placeholder="Masukan Telpon">
					</div>
					<div class="form-group">
						<label for="">kewarganegaraan <span class="text-danger">*</span></label>
						<input type="text" class="form-control" name="kewarganegaraan" placeholder="Contoh : Warga Negara Indonesia">
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
<div class="modal fade EditTU" id="ModalEditTU" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-scrollable" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalScrollableTitle">Edit Data</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form method="post" action="<?= base_url() ?>TU/Edit">
					<input type="hidden" name="id" id="id-TU">
					<div class="form-group">
						<label for="">Nama <span class="text-danger">*</span></label>
						<input type="text" class="form-control" name="nama" placeholder="Masukan nama TU" id="nama-TU">
					</div>
					<div class="form-group">
						<label for="">Email <span class="text-danger">*</span></label>
						<input type="text" class="form-control" name="email" placeholder="Masukan Email" id="email-TU">
						<small class="text-danger">* Email Tidak Boleh Sama!</small>
					</div>
					<div class="form-group">
						<label for="">Password <span class="text-danger">*</span></label>
						<input type="text" class="form-control" name="password" placeholder="Masukan Password" id="password-TU">
					</div>
					<div class="form-group jk-TU">
						<label for="">Jenis Kelamin <span class="text-danger">*</span></label>
						<select class="form-control" id="jk-TU" name="jk">
							<option disabled selected>-- Jenis Kelamin --</option>
							<option value="Laki-laki">Laki-laki</option>
							<option value="Perempuan">Perempuan</option>
						</select>
					</div>
					<div class="form-group status-TU">
						<label for="">Status <span class="text-danger">*</span></label>
						<select class="form-control" name="status">
							<option disabled selected>-- Status --</option>>
							<option value="Menikah">Menikah</option>>
							<option value="Belum Menikah">Belum Menikah</option>>
						</select>
					</div>
					
					<div class="form-group agama-TU">
						<label for="">Agama <span class="text-danger">*</span></label>
						<select class="form-control" id="agama-TU" name="agama">
							<option disabled selected>-- Agama --</option>
							<option value="Islam">Islam</option>
							<option value="Kristen">Kristen</option>
							<option value="Katolik">Katolik</option>
							<option value="Buddha">Buddha</option>
							<option value="Hindu">Hindu</option>
							<option value="Kong Hu Cu">Kong Hu Cu</option>
						</select>
					</div>
					<div class="form-group goldarah-TU">
						<label for="">Gol Darah <span class="text-danger">*</span></label>
						<select class="form-control" id="gol-darah-TU" name="gol-darah">
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
						<input type="text" class="form-control" id="pendidikan-TU" name="pendidikan" placeholder="CONTOH : S1 PENDIDIKAN SENI RUPA">
					</div>
					<div class="form-group">
						<label for="">Tempat Lahir <span class="text-danger">*</span></label>
						<input type="text" class="form-control" id="tempat-lahir-TU" name="tempat-lahir" placeholder="Masukan Tempat Lahir">
					</div>
					<div class="form-group">
						<label for="">Tanggal Lahir <span class="text-danger">*</span></label>
						<input type="date" class="form-control" id="tanggal-lahir-TU" name="tanggal-lahir">
						<!-- <input type="date" class="form-control" name="tanggal-lahir" value="2013-01-08"> -->
					</div>
					<div class="form-group">
						<label for="">Alamat <span class="text-danger">*</span></label>
						<textarea name="alamat" id="alamat-TU" cols="30" rows="2" class="form-control"></textarea>
					</div>
					<div class="form-group">
						<label for="">Telpon <span class="text-danger">*</span></label>
						<input type="text" class="form-control" id="telpon-TU" name="telpon" placeholder="Masukan Telpon">
					</div>
					<div class="form-group">
						<label for="">kewarganegaraan <span class="text-danger">*</span></label>
						<input type="text" class="form-control" id="kewarganegaraan-TU" name="kewarganegaraan" placeholder="Contoh : Warga Negara Indonesia">
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
<div class="modal fade DeleteTU" id="modalHapusTU" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
				<a href="" data-id="<?= $g['id'] ?>" class="btn btn-danger hapusTU" id="hapusTU" title="Hapus">Delete!</a>
			</div>
		</div>
	</div>
</div>

<!-- Modal Detail -->
<div class="modal fade DetailTU" id="modalDetailTU" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
