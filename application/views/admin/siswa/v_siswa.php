<h1 class="text-center">Data Siswa</h1>
<button href="" class="btn btn-link ml-3"><i class="fa fa-user-plus" data-toggle="modal" data-target="#ModalTambahSiswa"> Tambah Siswa</i></button>
<div class="flashdata" data-alert="<?= $this->session->flashdata('alert') ?>"></div>
<div class="flashdata2" data-alert2="<?= $this->session->flashdata('alert2') ?>"></div>
<div class="card shadow mb-4">
	<div class="card-header py-3">
		<form action="<?= base_url() ?>Siswa/Export" method="post">
			<div class="form-group">
				<label for="">Export Data Siswa Perkelas</label>
				<select class="form-control" required name="kelas">
					<option disabled selected>-- Kelas --</option>
					<?php foreach ($kelas as $k) : ?>
						<option value="<?= $k['idkelas'] ?>"><?= $k['kelas'] ?></option>
						<?php endforeach; ?>
						<option value="">Semua Kelas</option>
				</select>
			</div>
			<button class="btn btn-info ml-3 btn-sm"><i class="fa fa-file-download"> Export PDF </i></button>
		</form>

	</div>
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered-stripped" id="dataTable" width="100%" cellspacing="0">
				<thead>
					<tr>
						<th>Nama</th>
						<th>NIS</th>
						<th>Kelas</th>
						<th>Password</th>
						<th>Orang tua</th>
						<th>Action</th>
					</tr>
				</thead>
				<tfoot>
					<tr>
						<th>Nama</th>
						<th>NIS</th>
						<th>Kelas</th>
						<th>Password</th>
						<th>Orang tua</th>
						<th>Action</th>
					</tr>
				</tfoot>
				<tbody>
					<?php foreach ($siswa as $s) : ?>
						<tr>
							<td><?= $s['nama']; ?></td>
							<td><?= $s['nis']; ?></td>
							<td><?= $s['kelas']; ?></td>
							<td><?= $s['password']; ?></td>
							<td><?= $s['orangtua']; ?></td>
							<td>
								<button data-id="<?= $s['id'] ?>" class="btn btn-danger btn-sm hapus" data-toggle="modal" data-target="#modalHapusSiswa"><i class="fa fa-trash"></i></button>
								<button data-id="<?= $s['id'] ?>" class="btn btn-success btn-sm EditSiswa" title="Edit" id="EditSiswa" data-toggle="modal" data-target="#ModalEditSiswa"><i class="fa fa-edit"></i></button>
								<button data-id="<?= $s['nis'] ?>" class="btn btn-info btn-sm DetailSiswa" title="Detail" id="DetailSiswa" data-toggle="modal" data-target="#modalDetailSiswa"><i class="fa fa-pencil-alt"></i></button>
							</td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>



<!-- Modal Add-->
<div class="modal fade" id="ModalTambahSiswa" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-scrollable" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalScrollableTitle">Tambah Data</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form method="post" action="<?= base_url() ?>Siswa/Create">
					<div class="form-group">
						<label for="">Nama <span class="text-danger">*</span></label>
						<input type="text" class="form-control" required name="nama" placeholder="Masukan nama Siswa">
					</div>
					<div class="form-group">
						<label for="">NIS <span class="text-danger">*</span></label>
						<input type="text" class="form-control" required name="nis" placeholder="Masukan NIS">
						<small class="text-danger">* NIS Tidak Boleh Sama!</small>
					</div>
					<div class="form-group">
						<label for="">Password <span class="text-danger">*</span></label>
						<input type="text" class="form-control" required name="password" placeholder="Masukan Password">
					</div>
					<div class="form-group">
						<label for="">NIK Orang tua <span class="text-danger">*</span></label>
						<input type="text" class="form-control" required name="nik-ortu" placeholder="Masukan NIK Orang tua">
						<small class="text-danger">* NIK akan di cocokan dengan NIK Orang tua!</small>
					</div>
					<div class="form-group jk-ortu">
						<label for="">Kelas <span class="text-danger">*</span></label>
						<select class="form-control" required name="kelas">
							<option disabled selected>-- Kelas --</option>
							<?php foreach ($kelas as $k) : ?>
								<option value="<?= $k['idkelas'] ?>"><?= $k['kelas'] ?></option>
							<?php endforeach; ?>
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
<div class="modal fade EditSiswa" id="ModalEditSiswa" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-scrollable" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalScrollableTitle">Edit Data</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form method="post" action="<?= base_url() ?>Siswa/Edit">
					<input type="hidden" required name="id" id="id-siswa">
					<div class="form-group">
						<label for="">Nama <span class="text-danger">*</span></label>
						<input type="text" class="form-control" required name="nama" placeholder="Masukan nama Siswa" id="nama-siswa">
					</div>
					<div class="form-group">
						<label for="">NIS <span class="text-danger">*</span></label>
						<input type="text" class="form-control" required name="nis" placeholder="Masukan nis" id="nis-siswa">
						<small class="text-danger">* NIS Tidak Boleh Sama!</small>
					</div>
					<div class="form-group">
						<label for="">Password <span class="text-danger">*</span></label>
						<input type="text" class="form-control" required name="password" placeholder="Masukan Password" id="password-siswa">
					</div>
					<div class="form-group jk-siswa">
						<label for="">Jenis Kelamin <span class="text-danger">*</span></label>
						<select class="form-control" id="jk-siswa" required name="jk">
							<option disabled selected>-- Jenis Kelamin --</option>
							<option value="Laki-laki">Laki-laki</option>
							<option value="Perempuan">Perempuan</option>
						</select>
					</div>
					<div class="form-group kelas-siswa">
						<label for="">Kelas <span class="text-danger">*</span></label>
						<select class="form-control" required name="kelas">
							<option disabled selected>-- Kelas --</option>
							<?php foreach ($kelas as $k) : ?>
								<option value="<?= $k['idkelas'] ?>"><?= $k['kelas'] ?></option>
							<?php endforeach; ?>
						</select>
					</div>
					<div class="form-group agama-siswa">
						<label for="">Agama <span class="text-danger">*</span></label>
						<select class="form-control" id="agama-siswa" required name="agama">
							<option disabled selected>-- Agama --</option>
							<option value="Islam">Islam</option>
							<option value="Kristen">Kristen</option>
							<option value="Katolik">Katolik</option>
							<option value="Buddha">Buddha</option>
							<option value="Hindu">Hindu</option>
							<option value="Kong Hu Cu">Kong Hu Cu</option>
						</select>
					</div>
					<div class="form-group goldarah-siswa">
						<label for="">Gol Darah <span class="text-danger">*</span></label>
						<select class="form-control" id="gol-darah-siswa" required name="gol-darah">
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
						<label for="">NIK Orang tua <span class="text-danger">*</span></label>
						<input type="text" class="form-control" required name="nik" id="nik-ortu" placeholder="Masukan NIK Orang tua">
					</div>
					<div class="form-group">
						<label for="">Pendidikan Terakhir <span class="text-danger">*</span></label>
						<input type="text" class="form-control" id="pendidikan-siswa" required name="pendidikan" placeholder="CONTOH : S1 PENDIDIKAN SENI RUPA">
					</div>
					<div class="form-group">
						<label for="">Tempat Lahir <span class="text-danger">*</span></label>
						<input type="text" class="form-control" id="tempat-lahir-siswa" required name="tempat-lahir" placeholder="Masukan Tempat Lahir">
					</div>
					<div class="form-group">
						<label for="">Tanggal Lahir <span class="text-danger">*</span></label>
						<input type="date" class="form-control" id="tanggal-lahir-siswa" required name="tanggal-lahir">
						<!-- <input type="date" class="form-control" required name="tanggal-lahir" value="2013-01-08"> -->
					</div>
					<div class="form-group">
						<label for="">Alamat <span class="text-danger">*</span></label>
						<textarea required name="alamat" id="alamat-siswa" cols="30" rows="2" class="form-control"></textarea>
					</div>
					<div class="form-group">
						<label for="">Telpon <span class="text-danger">*</span></label>
						<input type="text" class="form-control" id="telpon-siswa" required name="telpon" placeholder="Masukan Telpon">
					</div>
					<div class="form-group">
						<label for="">kewarganegaraan <span class="text-danger">*</span></label>
						<input type="text" class="form-control" id="kewarganegaraan-siswa" required name="kewarganegaraan" placeholder="Contoh : Warga Negara Indonesia">
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
<div class="modal fade DeleteSiswa" id="modalHapusSiswa" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
				<a href="" data-id="<?= $s['id'] ?>" class="btn btn-danger hapusSiswa" id="hapusSiswa" title="Hapus">Delete!</a>
			</div>
		</div>
	</div>
</div>


<!-- Modal Detail -->
<div class="modal fade DetailSiswa" id="modalDetailSiswa" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
