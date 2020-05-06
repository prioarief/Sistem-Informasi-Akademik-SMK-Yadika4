<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('JurusanModel', 'Jurusan');
		$this->load->model('KelasModel', 'Kelas');
		$this->load->model('SiswaModel', 'Siswa');
		$this->load->model('MapelModel', 'Mapel');
		login_true();
	}

	public function index()
	{
		$data = [
			'title' => 'Home',
			'jurusan' => $this->Jurusan->getJurusan(),
		];

		$this->load->view('templates/header', $data);
		$this->load->view('home/index', $data);
		$this->load->view('templates/footer');
	}

	public function DataAbsensi()
	{
		$req = $this->Mapel->getMapelByGuru($this->session->userdata('id'));
		$data = [
			'title' => 'Home',
			'jurusan' => $this->Jurusan->getJurusan(),
			'mapel' => $req,
		];

		$this->load->view('templates/header', $data);
		$this->load->view('home/absen/absen', $data);
		$this->load->view('templates/footer');
	}

	public function Absen($id = null)
	{
		if (is_null($id)) {
			redirect('Home/DataAbsensi');
		} else {
			if ($this->Kelas->getKelasByid($id)) {
				$data = [
					'title' => 'Home',
					'jurusan' => $this->Jurusan->getJurusan(),
					'kelas' => $this->Kelas->getKelasByid($id),
					'siswa' => $this->Siswa->GetSiswaByKelas($id)
				];

				$this->load->view('templates/header', $data);
				$this->load->view('home/absen/absen-siswa', $data);
				$this->load->view('templates/footer');
			}else{
				redirect('Home/DataAbsensi');
			}
		}
	}

	public function DetailKelas($id = null)
	{
		if (is_null($id)) {
			redirect('Home');
		}

		$req = $this->Mapel->getDetailMapel($id);
		if ($req) {
			echo json_encode($req);
		} else {
			redirect('Home');
		}
	}

	public function AbsenAction()
	{
		$data = $this->input->post();
		foreach ($data as $key => $value) {
			// echo $key . '<br>';
			

			$entry = strlen($key);
			$result = substr($key, 5, $entry);
			echo $result . '  - status = '. $value .'<br>';
		
		}
	}
}
