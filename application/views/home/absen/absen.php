<div class="container">
	<?php if ($this->session->userdata('akses') == 'Siswa') : ?>
		<h2 class="text-center mt-5 mb-5">Absensi <?= $this->session->userdata('nama') ?> </h2>
	<?php elseif ($this->session->userdata('akses') == 'Guru') : ?>
		<h2 class="text-center mt-5 mb-5">Absensi Pelajaran <?= $this->session->userdata('nama') ?> </h2>
		<h6 class="d-block">Silakan Pilih Mata Pelajaran dan Kelas untuk Mengisi Absensi</h6>
		<div class="col-12">
			<ul class="list-group">
				<?php foreach ($mapel as $mapel) : ?>
					<li class="list-group-item">
						<button data-id="<?= $mapel['id'] ?>" class="btn btn-link text-decoration-none" data-toggle="modal" data-target="#modalDetailKelas"><?= $mapel['mapel'] ?></button>
					</li>
				<?php endforeach; ?>
			</ul>
		</div>

		<!-- Modal Detail Kelas -->
		<div class="modal fade DetailKelas" id="modalDetailKelas" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalCenterTitle">Pilih Kelas!</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body ">
						<form method="post" action="<?= base_url() ?>Mapel/DeleteKelas">
							<div class="form-group kelasEdit" id="">
								<p>Kelas Yang Diajar <span class="text-danger">*</span></p>
								<div class="row detailKelas">

								</div>
							</div>
							<small class="text-danger">Pilih untuk melakukan absensi!</small>

						</form>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div>
	<?php endif; ?>

</div>
