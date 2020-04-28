<div class="container mt-3">
	<div class="flashdata-sukses" data-alert="<?= $this->session->flashdata('login-sukses') ?>"></div>
	<?php if($this->session->userdata('akses') == 'Orangtua'): ?>
		<h4 class="text-center">Selamat Datang Orangtua</h4>
		<?php elseif($this->session->userdata('akses') == 'Siswa'): ?>
			<h4 class="text-center">Selamat Datang</h4>
	<?php endif; ?>
</div>
