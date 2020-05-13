<!DOCTYPE html>
<html>

<head>
	<style>
		table {
			border-collapse: collapse;
			width: 100%;
		}

		th,
		td {
			padding: 13px;
			text-align: left;
			border-bottom: 1px solid #ddd;
		}
	</style>
</head>

<body>

	<div style="width: 500px; height:90px; margin:auto; ">
		<img src="<?= base_url('assets/img/logo.png') ?>" width="90" height="90" style="display: inline; margin:30px 0px">
		<h5 style="text-align:center; display: inline-block; margin-top : -140px">Yayasan Abdi Karya (YADIKA)</h5>
		<h5 style="text-align:center; display: inline-block; margin-top : -10px">SEKOLAH MENENGAH KEJURUAN</h5>
		<h2 style="text-align: center; margin-top: -10px">SMK YADIKA 4</h2>
		<p style="text-align: center; margin-top: -10px"><b>Terakreditasi A</b></p>
		<span style="text-align:center; font-size: 10px; font-style:italic">TKJ. 28.00.SMK/MAK.0013.15 / AK. 28.00 SMK/MAK. 0008.15 / OTK. Perkantoran. 28.00. SMK/MAK. 00111.15</span>
		<span style="text-align:center; font-size: 11px; font-style:italic">JL. RADEN SALEH NO.11 RT.02/001, KELURAHAN KARANG TENGAH, KECAMATAN KARANG TENGAH, KOTA TANGERANG, BANTEN, 15157.</span>
		<hr style="border:1px black">
	</div>


	<h2 style="text-align: center; margin-top: 30px;">Jadwal Pelajaran Hari <?= $hari ?></h2>

	<table style="margin-top: 10px; margin:auto">
		<tr >
			<!-- <th>NO</th> -->
			<th>Hari</th>
			<th>Mulai</th>
			<th>Selesai</th>
			<th>Mapel</th>
			<th>Ruang</th>
			<th style="text-align: center">Guru</th>
		</tr>
		<?php $no = 1; ?>
		<?php foreach ($jadwal as $s) : ?>
			<tr>
				<!-- <td><?= $no; ?></td> -->
				<td><?= $s['hari']; ?></td>
				<td><?= substr($s['jam_mulai'], 0,5); ?></td>
				<td><?= substr($s['jam_selesai'], 0,5); ?></td>
				<td><?= substr($s['mapel'], 0,40) ?></td>
				<td><?= $s['ruang']; ?></td>
				<td style="text-align: center"><?= $s['nama']; ?></td>
			</tr>
			<?php $no++ ?>
		<?php endforeach; ?>
	</table>

</body>

</html>
