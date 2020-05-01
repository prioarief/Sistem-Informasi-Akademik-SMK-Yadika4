<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Mapel extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('MapelModel', 'Mapel');
		$this->load->model('GuruModel', 'Guru');
		$this->load->model('KelasModel', 'Kelas');
	}

	public function index()
	{
		$data = [
			'title' => 'Data Mapel',
			'mapel' => $this->Mapel->getMapel(),
			'guru' => $this->Guru->get(),
			'kelas' => $this->Kelas->get(),
			'javascript' => 'mapel.js'
		];
		$this->load->view('admin/header', $data);
		$this->load->view('admin/mapel/v_mapel', $data);
		$this->load->view('admin/footer', $data);
	}

	public function Detail($id = null)
	{
		if (is_null($id)) {
			redirect('Mapel');
		}

		$req = $this->Mapel->getMapelByid($id);
		if ($req) {
			echo json_encode($this->Mapel->getMapelByid($id));
			# code...
		} else {
			redirect('Mapel');
		}
	}


	public function Create()
	{
		$this->form_validation->set_rules('mapel', 'mapel', 'required');
		$this->form_validation->set_rules('guru', 'guru', 'required');
		$this->form_validation->set_rules('kelas[]', 'kelas', 'required');

		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('alert2', 'Gagal Di Tambahkan');
			redirect('Mapel');
		} else {
			$this->db->trans_start();

			$kelas = $this->input->post('kelas[]');
			$data = [
				'mapel' => $this->input->post('mapel', true),
				'guru_Id' => $this->input->post('guru', true),
			];
			$this->Mapel->AddMapel($data);



			$mapel_id = $this->db->insert_id();
			$detail = array();
			foreach ($kelas as $k) {
				$detail[] = [
					'mapel_id' => $mapel_id,
					'kelas_id' => $k
				];
			}
			$this->db->insert_batch('detail_mapel', $detail);
			$this->db->trans_complete();

			$this->session->set_flashdata('alert', 'Berhasil Di Tambahkan');
			redirect('Mapel');
		}
	}

	public function Edit()
	{
		$this->form_validation->set_rules('jurusan', 'Jurusan', 'required');

		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('alert2', 'Gagal Di Edit');
			redirect('Jurusan');
		} else {
			$id = $this->input->post('id');
			$req = $this->Jurusan->getJurusanByid($id);
			if ($req) {
				$data = [
					'Jurusan' => $this->input->post('jurusan', true),
				];

				$this->Jurusan->EditJurusan($id, $data);
				$this->session->set_flashdata('alert', 'Berhasil Di Edit');
				redirect('Jurusan');
			} else {
				$this->session->set_flashdata('alert2', 'Gagal Di Edit');
				redirect('Jurusan');
			}
		}
	}

	public function Delete($id = null)
	{
		if (is_null($id)) {
			$this->session->set_flashdata('alert2', 'Gagal Di Hapus');
			redirect('Kelas');
		}

		$req = $this->Jurusan->getJurusanByid($id);
		if ($req) {

			$this->Jurusan->DeleteJurusan($id);
			$this->session->set_flashdata('alert', 'Berhasil Di Hapus');
			redirect('Jurusan');
		} else {
			$this->session->set_flashdata('alert2', 'Gagal Di Hapus');
			redirect('Jurusan');
		}
	}

	public function DetailKelas($id = null)
	{
		if(is_null($id))
		{
			redirect('Mapel');
		}

		$req = $this->Mapel->getDetailMapel($id);
		if ($req) {
			echo json_encode($req);
		} else {
			redirect('Jurusan');
		}

	}
}
        
    /* End of file  Jurusan.php */
