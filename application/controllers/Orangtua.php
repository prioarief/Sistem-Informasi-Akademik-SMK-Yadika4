<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Orangtua extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('OrangtuaModel', 'Orangtua');
	}

	public function index() 
	{
		$data = [
			'title' => 'Data Orangtua',
			'orangtua' => $this->Orangtua->getData(),
			'javascript' => 'orangtua.js'
		];
		$this->load->view('admin/header', $data);
		$this->load->view('admin/orangtua/v_orangtua', $data);
		$this->load->view('admin/footer', $data);
	}

	public function Detail($id = null)
	{
		if (is_null($id)) {
			redirect('Orangtua');
		}

		$req = $this->Orangtua->getDataByid($id);
		if ($req) {
			echo json_encode($this->Orangtua->getDataByid($id));
			# code...
		} else {
			redirect('Orangtua');
		}
	}
	
	public function DetailOrangtua($nik = null)
	{
		if (is_null($nik)) {
			redirect('Orangtua');
		}

		$req = $this->Orangtua->getDataBynik($nik);
		if ($req) {
			echo json_encode($this->Orangtua->getDataBynik($nik));
			# code...
		} else {
			redirect('Orangtua');
		}
	}

	public function Create()
	{
		$this->form_validation->set_rules('nama', 'nama', 'required');
		$this->form_validation->set_rules('nik', 'nik', 'required');
		$this->form_validation->set_rules('agama', 'agama', 'required');
		$this->form_validation->set_rules('jk', 'jenis kelamin', 'required');
		$this->form_validation->set_rules('gol-darah', 'gol-darah', 'required');
		$this->form_validation->set_rules('pekerjaan', 'pekerjaan', 'required');
		$this->form_validation->set_rules('pendidikan', 'pendidikan', 'required');
		$this->form_validation->set_rules('tempat-lahir', 'tempat-lahir', 'required');
		$this->form_validation->set_rules('tanggal-lahir', 'tanggal-lahir', 'required');
		$this->form_validation->set_rules('alamat', 'alamat', 'required');
		$this->form_validation->set_rules('telpon', 'telpon', 'required');
		$this->form_validation->set_rules('kewarganegaraan', 'kewarganegaraan', 'required');

		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('alert2', 'Gagal Di Tambahkan');
			redirect('Orangtua');
		} else {
			$data = [
				'nama' => strtoupper($this->input->post('nama', true)),
				'nik' => $this->input->post('nik', true),
				'password' => strtolower($this->input->post('password', true)),
				'jk' => $this->input->post('jk', true),
				'agama' => $this->input->post('agama', true),
				'pekerjaan' => strtoupper($this->input->post('pekerjaan', true)),
				'gol_darah' => $this->input->post('gol-darah', true),
				'tempat_lahir' => strtoupper($this->input->post('tempat-lahir', true)),
				'tanggal_lahir' => $this->input->post('tanggal-lahir', true),
				'alamat' => $this->input->post('alamat', true),
				'telpon' => $this->input->post('telpon', true),
				'pendidikan' => $this->input->post('pendidikan', true),
				'kewarganegaraan' => $this->input->post('kewarganegaraan', true),
			];

			$this->Orangtua->AddData($data);
			$this->session->set_flashdata('alert', 'Berhasil Di Tambahkan');
			redirect('Orangtua');
		}
	}

	public function Delete($id = null)
	{
		if (is_null($id)) {
			$this->session->set_flashdata('alert2', 'Gagal Di Hapus');
			redirect('Kelas');
		}

		$req = $this->Orangtua->getDataByid($id);
		if ($req) {

			$this->Orangtua->DeleteData($id);
			$this->session->set_flashdata('alert', 'Berhasil Di Hapus');
			redirect('Orangtua');
		} else {
			$this->session->set_flashdata('alert2', 'Gagal Di Hapus');
			redirect('Orangtua');
		}
	}

	public function Edit()
	{
		$this->form_validation->set_rules('nama', 'nama', 'required');
		$this->form_validation->set_rules('nik', 'nik', 'required');
		$this->form_validation->set_rules('agama', 'agama', 'required');
		$this->form_validation->set_rules('jk', 'jenis kelamin', 'required');
		$this->form_validation->set_rules('gol-darah', 'gol-darah', 'required');
		$this->form_validation->set_rules('pekerjaan', 'pekerjaan', 'required');
		$this->form_validation->set_rules('pendidikan', 'pendidikan', 'required');
		$this->form_validation->set_rules('tempat-lahir', 'tempat-lahir', 'required');
		$this->form_validation->set_rules('tanggal-lahir', 'tanggal-lahir', 'required');
		$this->form_validation->set_rules('alamat', 'alamat', 'required');
		$this->form_validation->set_rules('telpon', 'telpon', 'required');

		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('alert2', 'Gagal Di Edit');
			redirect('Orangtua');
		} else {
			$id = $this->input->post('id');
			$req = $this->Orangtua->getDataByid($id);
			if ($req) {
				$data = [
					'nama' => strtoupper($this->input->post('nama', true)),
					'nik' => $this->input->post('nik', true),
					'password' => strtolower($this->input->post('password', true)),
					'jk' => $this->input->post('jk', true),
					'agama' => $this->input->post('agama', true),
					'pekerjaan' => strtoupper($this->input->post('pekerjaan', true)),
					'gol_darah' => $this->input->post('gol-darah', true),
					'tempat_lahir' => strtoupper($this->input->post('tempat-lahir', true)),
					'tanggal_lahir' => $this->input->post('tanggal-lahir', true),
					'alamat' => $this->input->post('alamat', true),
					'telpon' => $this->input->post('telpon', true),
					'pendidikan' => $this->input->post('pendidikan', true),
				];

				$this->Orangtua->EditData($id, $data);
				$this->session->set_flashdata('alert', 'Berhasil Di Edit');
				redirect('Orangtua');
				// var_dump($this->input->post());
			} else {
				$this->session->set_flashdata('alert2', 'Gagal Di Edit');
				redirect('Orangtua');
			}
		}
}
}
        
    /* End of file  Jurusan.php */
