<h1 class="text-center">Data Jurusan</h1>
<button href="" class="btn btn-link ml-3"><i class="fa fa-user-plus" data-toggle="modal" data-target="#exampleModalTambahJurusan"> Tambah Jurusan</i></button>
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
						<th>Jurusan</th>
						<th>Action</th>
					</tr>
				</thead>
				<tfoot>
					<tr>
						<th>Jurusan</th>
						<th>Action</th>
					</tr>
				</tfoot>
				<tbody>
					<?php foreach ($jurusan as $j) : ?>
                    <tr>
                      <td><?= $j['jurusan']; ?></td>
                      <td>
						  <a href="<?= base_url() ?>" class="btn btn-danger btn-sm hapus" title="Hapus"><i class="fa fa-trash"></i></a>
						  <a href="<?= base_url() ?>" class="btn btn-success btn-sm" title="Edit"><i class="fa fa-edit"></i></a>
					  </td>
                    </tr>
                  <?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>

<!-- Modal Add -->
<div class="modal fade" id="exampleModalTambahJurusan" tabindex="-1" role="dialog" aria-labelledby="exampleModalTambahJurusan" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="staticBackdropLabel">Tambah Jurusan</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form method="post" action="<?= base_url() ?>Jurusan/Create">
					<div class="form-group">
						<label for="">Jurusan <span class="text-danger">*</span></label>
						<input type="text" class="form-control" name="jurusan" placeholder="Masukan nama jurusan">
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
