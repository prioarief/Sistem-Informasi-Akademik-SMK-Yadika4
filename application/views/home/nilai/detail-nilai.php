<div class="container">
	<h4 class="text-center mb-4">Nilai <?= $siswa['nama'] ?> <br> Mata Pelajaran <?= $mapel['mapel'] ?></h4>
	<?php if (!$nilai) : ?>
		<form action="<?= base_url() ?>Home/InputNilai" method="post">
			<input type="hidden" name="siswa" value="<?= $siswa['id'] ?>">
			<input type="hidden" name="mapel" value="<?= $mapel['id'] ?>" id="mapel" data-produktif="<?= $mapel['produktif'] ?>">
			<div class="form-group">
				<label for="">Nilai Pengetahuan <span class="text-danger">*</span></label>
				<input type="number" min="1" max="100" class="form-control pengetahuan" id="pengetahuan" autofocus required name="pengetahuan" placeholder="Nilai Pengetahuan">
			</div>
			<div class="form-group">
				<label for="">Nilai Keterampilan <span class="text-danger">*</span></label>
				<input type="number" min="1" max="100" class="form-control keterampilan" id="keterampilan" required name="keterampilan" placeholder="Nilai Keterampilan">
			</div>
			<div class="form-group">
				<label for="">Nilai Akhir</label>
				<input type="text" min="1" max="100" class="form-control akhir" id="akhir" required name="akhir" readonly placeholder="Nilai Akhir">
			</div>
			<div id="predikat" class="mb-2">

			</div>
			<div class="form-group">
				<button type="submit" class="btn btn-primary btn-sm">Input Nilai</button>
			</div>
		</form>
	<?php else: ?>
		<form action="<?= base_url() ?>Home/EditNilai" method="post">
			<input type="hidden" name="siswa" value="<?= $siswa['id'] ?>">
			<input type="hidden" name="mapel" value="<?= $mapel['id'] ?>" id="mapel" data-produktif="<?= $mapel['produktif'] ?>">
			<div class="form-group">
				<label for="">Nilai Pengetahuan <span class="text-danger">*</span></label>
				<input type="number" min="1" max="100" class="form-control pengetahuan" id="pengetahuan" autofocus required name="pengetahuan" placeholder="Nilai Pengetahuan" value="<?= $data_nilai['nilai_pengetahuan'] ?>">
			</div>
			<div class="form-group">
				<label for="">Nilai Keterampilan <span class="text-danger">*</span></label>
				<input type="number" min="1" max="100" class="form-control keterampilan" id="keterampilan" required name="keterampilan" placeholder="Nilai Keterampilan" value="<?= $data_nilai['nilai_keterampilan'] ?>">
			</div>
			<div class="form-group">
				<label for="">Nilai Akhir</label>
				<input type="text" min="1" class="form-control akhir" id="akhir" required name="akhir" readonly placeholder="Nilai Akhir" value="<?= $data_nilai['nilai_akhir'] ?>">
			</div>
			<div id="predikat" class="mb-2">
				<p>Predikat : <?= $data_nilai['predikat'] ?></p>
			</div>
			<div class="form-group">
				<button type="submit" class="btn btn-primary btn-sm">Edit Nilai</button>
			</div>
		</form>
	<?php endif; ?>
</div>
