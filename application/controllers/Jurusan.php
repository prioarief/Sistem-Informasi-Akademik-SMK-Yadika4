<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Jurusan extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('JurusanModel', 'Jurusan');
	}

	public function index()
	{
		$data = [
			'title' => 'Data Jurusan',
			'jurusan' => $this->Jurusan->getJurusan(),
			'javascript' => 'jurusan.js'
		];
		$this->load->view('admin/header', $data);
		$this->load->view('admin/jurusan/v_jurusan', $data);
		$this->load->view('admin/footer', $data);
	}

	public function Detail($id = null)
	{
		if (is_null($id)) {
			redirect('Jurusan');
		}

		$req = $this->Jurusan->getJurusanByid($id);
		if ($req) {
			echo json_encode($this->Jurusan->getJurusanByid($id));
			# code...
		} else {
			redirect('Jurusan');
		}
	}


	public function Create()
	{
		$this->form_validation->set_rules('jurusan', 'Jurusan', 'required');

		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('alert2', 'Gagal Di Tambahkan');
			redirect('Jurusan');
		} else {
			$data = [
				'jurusan' => $this->input->post('jurusan', true)
			];

			$this->Jurusan->AddJurusan($data);
			$this->session->set_flashdata('alert', 'Berhasil Di Tambahkan');
			redirect('Jurusan');
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
}
        
    /* End of file  Jurusan.php */
