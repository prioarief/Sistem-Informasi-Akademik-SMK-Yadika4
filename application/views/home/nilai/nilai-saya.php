<div class="container">
	<h4 class="text-center mb-4">Nilai <?= $siswa['nama'] ?> <br> Mata Pelajaran <?= $mapel['mapel'] ?></h4>
	<table class="table table-responsive-md">
		<thead>
			<tr>
				<th scope="col">#</th>
				<th scope="col">Keterangan</th>
				<th scope="col">Action</th>
			</tr>
		</thead>
		<tbody>
			<?php $no = 1; ?>
			<?php foreach ($nilai as $nilai) : ?>
				<tr>
					<th scope="row"><?= $no ?></th>
					<td><?= $nilai['keterangan'] ?></td>
					<td>
						<a data-id="<?= $nilai['id'] ?>" href="#" class="badge badge-primary" data-toggle="modal" data-target="#modalNilaiSiswa">Lihat Nilai</a>
					</td>

				</tr>
				<?php $no++; ?>
			<?php endforeach; ?>
		</tbody>
	</table>

	<!-- Modal nilai -->
	<div class="modal fade NilaiSiswa" id="modalNilaiSiswa" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		<div class="modal-dialog modal-dialog-scrollable" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title detail" id="exampleModalCenterTitle">Nilai</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body nilai-body">
					
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>


</div>
