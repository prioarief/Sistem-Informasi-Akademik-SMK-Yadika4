<div class="container">
	<?php if ($this->session->userdata('akses') == 'Siswa') : ?>
		<h2 class="text-center mt-5 mb-5">Absensi <?= $this->session->userdata('nama') ?> </h2>
	<?php elseif ($this->session->userdata('akses') == 'Guru') : ?>
		<h2 class="text-center mt-5 mb-5">Absensi Pelajaran <?= $this->session->userdata('nama') ?> </h2>
		<h4 class="d-block">Silakan Pilih Mata Pelajaran dan Kelas untuk Mengisi Absensi</h4>
		
		

		<div class="col-12">
			<table class="table table-responsive-md">
				<thead>
					<tr>
						<th scope="col">#</th>
						<th scope="col">Mapel</th>
						<th scope="col">Action</th>
					</tr>
				</thead>
				<tbody>
					
						<?php $no = 1; ?>
						<?php foreach ($mapel as $mapel) : ?>
							<tr>
								<th scope="row"><?= $no ?></th>
								<td><?= $mapel['mapel'] ?></td>
								<td>
									<a href="#" data-id="<?= $mapel['id'] ?>" class="badge badge-primary" data-toggle="modal" data-target="#modalDetailKelas">Absen</a>
									<a href="#" data-id="<?= $mapel['id'] ?>" class="badge badge-info" data-toggle="modal" data-target="#modalDetailAbsen">Lihat Absen</a>
								</td>
							</tr>
							<?php $no++; ?>
						<?php endforeach; ?>
						
				</tbody>
			</table>
			</form>
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
		
		<!-- Modal Detail Absen -->
		<div class="modal fade DetailAbsen" id="modalDetailAbsen" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalCenterTitle">Pilih Kelas!</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body ">
						
							<div class="form-group AbsenEdit" id="">
								<div class="row detailAbsen">

								</div>
							</div>
							<small class="text-danger">Pilih Kelas untuk Melihat Absensi!</small>

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
