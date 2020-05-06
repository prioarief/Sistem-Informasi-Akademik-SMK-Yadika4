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
								<button data-id="<?= $j['id'] ?>" class="btn btn-danger btn-sm hapusJurusan" title="Hapus" data-toggle="modal" data-target="#modalHapusJurusan"><i class="fa fa-trash"></i></button>
								<button data-id="<?= $j['id'] ?>" class="btn btn-success btn-sm EditJurusan" title="Edit" id="EditJurusan" data-toggle="modal" data-target="#exampleModalEditJurusan"><i class="fa fa-edit"></i></button>
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
						<input type="text" class="form-control" required name="jurusan" placeholder="Masukan nama jurusan">
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
<div class="modal fade EditJurusan" id="exampleModalEditJurusan" tabindex="-1" role="dialog" aria-labelledby="exampleModalEditJurusan" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="staticBackdropLabel">Edit Jurusan</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form method="post" action="<?= base_url() ?>Jurusan/Edit">
					<input type="hidden" required name="id" id="idJurusan">
					<div class="form-group">
						<label for="">Jurusan <span class="text-danger">*</span></label>
						<input type="text" class="form-control" required name="jurusan" placeholder="Masukan nama jurusan" id="inputJurusan">
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
<div class="modal fade DeleteJurusan" id="modalHapusJurusan" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
        <a href="" data-id="<?= $j['id'] ?>" class="btn btn-danger hapusJurusan" id="hapusKelas" title="Hapus" >Delete!</a>
      </div>
    </div>
  </div>
</div>
