<?php

class Dashboard extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('GuruModel', 'Guru');
		$this->load->model('JurusanModel', 'Jurusan');
		$this->load->model('KelasModel', 'Kelas');
		$this->load->model('SiswaModel', 'Siswa');
		$this->load->model('TUModel', 'TU');
		$this->load->model('OrangtuaModel', 'Orangtua');
		$this->load->model('MapelModel', 'Mapel');
	}

	public function index()
	{
		$data = [
			'title' => 'Dashboard',
			'Guru' => count($this->Guru->get()),
			'Siswa' => count($this->Siswa->get()),
			'Kelas' => count($this->Kelas->get()),
			'Jurusan' => count($this->Jurusan->getJurusan()),
			'TU' => count($this->TU->get()),
			'Orangtua' => count($this->Orangtua->getData()),
			'Mapel' => count($this->Mapel->getMapel()),
		];

		$this->load->view('admin/header', $data);
		$this->load->view('admin/index');
		$this->load->view('admin/footer');
	}
}
