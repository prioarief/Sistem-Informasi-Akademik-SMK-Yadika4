<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Guru extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('GuruModel', 'Guru');
	}

	public function index()
	{
		$data = [
			'title' => 'Data Guru',
			'guru' => $this->Guru->get(),

		];
		$this->load->view('admin/header', $data);
		$this->load->view('admin/Guru/v_Guru', $data);
		$this->load->view('admin/footer');
	}

	public function Detail($id = null)
	{
		if (is_null($id)) {
			redirect('Orangtua');
		}

		$req = $this->Guru->getDataByid($id);
		if ($req) {
			echo json_encode($this->Guru->getDataByid($id));
		} else {
			redirect('Orangtua');
		}
	}

	public function Create()
	{
		$this->form_validation->set_rules('nama', 'nama', 'required');
		$this->form_validation->set_rules('email', 'email', 'required');
		$this->form_validation->set_rules('password', 'password', 'required');
		$this->form_validation->set_rules('status', 'status', 'required');
		$this->form_validation->set_rules('jk', 'jenis kelamin', 'required');
		$this->form_validation->set_rules('agama', 'agama', 'required');
		$this->form_validation->set_rules('gol-darah', 'gol-darah', 'required');
		$this->form_validation->set_rules('pendidikan', 'pendidikan', 'required');
		$this->form_validation->set_rules('tempat-lahir', 'tempat-lahir', 'required');
		$this->form_validation->set_rules('tanggal-lahir', 'tanggal-lahir', 'required');
		$this->form_validation->set_rules('alamat', 'alamat', 'required');
		$this->form_validation->set_rules('telpon', 'telpon', 'required');
		$this->form_validation->set_rules('kewarganegaraan', 'kewarganegaraan', 'required');

		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('alert2', 'Gagal Di Tambahkan');
			redirect('Guru');
		} else {
			$data = [
				'nama' => $this->input->post('nama', true),
				'jk' => $this->input->post('jk', true),
				'email' => $this->input->post('email'),
				'password' => strtolower($this->input->post('password', true)),
				'agama' => $this->input->post('agama', true),
				'gol_darah' => $this->input->post('gol-darah', true),
				'tempat_lahir' => strtoupper($this->input->post('tempat-lahir', true)),
				'tanggal_lahir' => $this->input->post('tanggal-lahir', true),
				'alamat' => $this->input->post('alamat', true),
				'telpon' => $this->input->post('telpon', true),
				'pendidikan' => $this->input->post('pendidikan', true),
				'status' => $this->input->post('status', true),
				'kewarganegaraan' => strtoupper($this->input->post('kewarganegaraan', true)),
			];

			$this->Guru->AddData($data);
			$this->session->set_flashdata('alert', 'Berhasil Di Tambahkan');
			redirect('Guru');
		}
	}

	public function Delete($id = null)
	{
		if (is_null($id)) {
			$this->session->set_flashdata('alert2', 'Gagal Di Hapus');
			redirect('Guru');
		}

		$req = $this->Guru->getDataByid($id);
		if ($req) {

			$this->Guru->DeleteData($id);
			$this->session->set_flashdata('alert', 'Berhasil Di Hapus');
			redirect('Guru');
		} else {
			$this->session->set_flashdata('alert2', 'Gagal Di Hapus');
			redirect('Guru');
		}
	}

	public function Edit()
	{
		$this->form_validation->set_rules('nama', 'nama', 'required');
		$this->form_validation->set_rules('email', 'email', 'required');
		$this->form_validation->set_rules('password', 'password', 'required');
		$this->form_validation->set_rules('jk', 'jenis kelamin', 'required');
		$this->form_validation->set_rules('status', 'status', 'required');
		$this->form_validation->set_rules('agama', 'agama', 'required');
		$this->form_validation->set_rules('gol-darah', 'gol-darah', 'required');
		$this->form_validation->set_rules('pendidikan', 'pendidikan', 'required');
		$this->form_validation->set_rules('tempat-lahir', 'tempat-lahir', 'required');
		$this->form_validation->set_rules('tanggal-lahir', 'tanggal-lahir', 'required');
		$this->form_validation->set_rules('alamat', 'alamat', 'required');
		$this->form_validation->set_rules('telpon', 'telpon', 'required');
		$this->form_validation->set_rules('kewarganegaraan', 'kewarganegaraan', 'required');

		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('alert2', 'Gagal Di Edit');
			redirect('Guru');
		} else {
			$id = $this->input->post('id');
			$req = $this->Guru->getDataByid($id);
			
			if ($req) {
				$data = [
					'nama' => $this->input->post('nama', true),
					'jk' => $this->input->post('jk', true),
					'email' => $this->input->post('email'),
					'password' => strtolower($this->input->post('password', true)),
					'agama' => $this->input->post('agama', true),
					'gol_darah' => $this->input->post('gol-darah', true),
					'tempat_lahir' => strtoupper($this->input->post('tempat-lahir', true)),
					'tanggal_lahir' => $this->input->post('tanggal-lahir', true),
					'alamat' => $this->input->post('alamat', true),
					'telpon' => $this->input->post('telpon', true),
					'pendidikan' => $this->input->post('pendidikan', true),
					'status' => $this->input->post('status', true),
					'kewarganegaraan' => strtoupper($this->input->post('kewarganegaraan', true)),
				];

				$this->Guru->EditData($id, $data);
				$this->session->set_flashdata('alert', 'Berhasil Di Edit');
				redirect('Guru');
				
			} else {
				$this->session->set_flashdata('alert2', 'Gagal Di Edit');
				redirect('Guru');
			}
		}
	}
}
        
    /* End of file  Jurusan.php */
