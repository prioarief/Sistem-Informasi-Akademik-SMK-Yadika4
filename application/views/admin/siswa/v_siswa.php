<h1 class="text-center">Data Siswa</h1>
<button href="" class="btn btn-link ml-3"><i class="fa fa-user-plus" data-toggle="modal" data-target="#exampleModalTambahSiswa"> Tambah Siswa</i></button>
<div class="card shadow mb-4">
	<div class="card-header py-3">

	</div>
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered-stripped" id="dataTable" width="100%" cellspacing="0">
				<thead>
					<tr>
						<th>NIS</th>
						<th>Nama</th>
						<th>Kelas</th>
						<th>Jurusan</th>
						<th>Password</th>
						<th>Created_at</th>
					</tr>
				</thead>
				<tfoot>
					<tr>
						<th>NIS</th>
						<th>Nama</th>
						<th>Kelas</th>
						<th>Jurusan</th>
						<th>Password</th>
						<th>Created_at</th>
					</tr>
				</tfoot>
				<tbody>
					<!-- <?php foreach ($users as $u) : ?>
                    <tr>
                      <td><?= $u['username']; ?></td>
                      <td><?= $u['email']; ?></td>
                      <td><?= date('d F Y', $u['created_at']); ?></td>
                    </tr>
                  <?php endforeach; ?> -->
				</tbody>
			</table>
		</div>
	</div>
</div>


<div class="modal fade" id="exampleModalTambahSiswa" tabindex="-1" role="dialog" aria-labelledby="exampleModalTambahSiswa" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="staticBackdropLabel">Tambah Siswa</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form method="post" act>
					<div class="form-group">
						<label for="">NIS</label>
						<input type="text" class="form-control" name="nis" placeholder="Masukan nis">
					</div>
					<div class="form-group">
						<label for="">Nama</label>
						<input type="text" class="form-control" name="nama" placeholder="Masukan email">
					</div>
					<div class="form-group">
						<label for="">Password</label>
						<input type="Password" class="form-control" name="password" placeholder="Masukan password">
					</div>
					<div class="form-group">
						<label for="">Jurusan</label>
						<select class="form-control" id="exampleFormControlSelect1">
							<option selected>-- Jurusan --</option>
							<option>2</option>
							<option>3</option>
							<option>4</option>
							<option>5</option>
						</select>
					</div>
					<div class="form-group">
						<label for="">Kelas</label>
						<select class="form-control" id="exampleFormControlSelect1">
							<option selected>-- Kelas --</option>
							<option>2</option>
							<option>3</option>
							<option>4</option>
							<option>5</option>
						</select>
					</div>
					<div class="form-group">
						<button class="btn btn-primary float-right">Tambah</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- End Modal -->
