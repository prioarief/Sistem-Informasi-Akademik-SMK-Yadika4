<div class="container">



	<h3 class="text-center">Selamat Datang <?= $this->session->userdata('nama') ?></h3>
	<span class="d-block mb-2">Silakan Pilih Nama Anak untuk Melihat Jadwal Pelajaran</span>
	<div class="col-12">
		<table class="table table-responsive-md">
			<thead>
				<tr>
					<th scope="col">#</th>
					<th scope="col">Nama Anak</th>
					<th scope="col">Kelas</th>
					<th scope="col">Action</th>
				</tr>
			</thead>
			<tbody>

				<?php $no = 1; ?>
				<?php foreach ($anaksaya as $anaksaya) : ?>
					<tr>
						<th scope="row"><?= $no ?></th>
						<td><?= $anaksaya['nama'] ?></td>
						<td><?= $anaksaya['kelas'] ?></td>
						<td>
							<a href="<?= base_url('Home/JadwalPelajaran/' . $anaksaya['idKelas']. '/'. $anaksaya['id']) ?>" class="badge badge-info">Lihat Jadwal</a>
						</td>
					</tr>
					<?php $no++; ?>
				<?php endforeach; ?>

			</tbody>
		</table>
	</div>

	<!-- Modal Pilih Mapel -->
	<!-- <div class="modal fade PilihMapel" id="modalPilihMapel" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalCenterTitle">Pilih Mata Pelajaran!</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body ">
					<div class="row mapell" id="PilihMapel">

					</div>
					<small class="text-danger">Pilih Mata Pelajaran untuk Melihat Nilai!</small>

					<input type="hidden" id="ortu" value="ortu">
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div> -->

</div>
