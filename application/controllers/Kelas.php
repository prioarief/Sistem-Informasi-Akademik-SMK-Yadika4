<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Kelas extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('KelasModel', 'Kelas');
		$this->load->model('JurusanModel', 'Jurusan');
	}

	public function index()
	{
		$data = [
			'title' => 'Data kelas',
			'kelas' => $this->Kelas->get(),
			'jurusan' => $this->Jurusan->getJurusan(),
		];
		$this->load->view('admin/header', $data);
		$this->load->view('admin/kelas/v_kelas', $data);
		$this->load->view('admin/footer');
	}

	public function detail($id = null)
	{
		if (is_null($id)) {
			redirect('Kelas');
		}

		$req = $this->Kelas->getKelasByid($id);
		if ($req) {
			echo json_encode($this->Kelas->getKelasByid($id));
			# code...
		} else {
			redirect('Kelas');
		}
	}

	public function Create()
	{


		$this->form_validation->set_rules('kelas', 'Kelas', 'required');
		$this->form_validation->set_rules('jurusan', 'Jurusan', 'required');

		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('alert2', 'Gagal Di Tambahkan');
			redirect('Kelas');
		} else {
			$data = [
				'kelas' => $this->input->post('kelas', true),
				'jurusan_id' => $this->input->post('jurusan', true)
			];

			$this->Kelas->TambahKelas($data);
			$this->session->set_flashdata('alert', 'Berhasil Di Tambahkan');
			redirect('Kelas');
		}
	}

	public function Edit($id = null)
	{
		if (is_null($id)) {
			$this->session->set_flashdata('alert2', 'Gagal Di Edit');
			redirect('Kelas');
		}
		$req = $this->Kelas->getKelasByid($id);
		if ($req) {
			$data = [
				'kelas' => $this->input->post('name', true),
				'jurusan_id' => $this->input->post('jurusan', true)
			];

			$this->Kelas->EditKelas($id, $data);
			$this->session->set_flashdata('alert', 'Berhasil Di Edit');
			redirect('Kelas');
		}
	}

	public function Delete($id = null)
	{
		if(is_null($id))
		{
			$this->session->set_flashdata('alert2', 'Gagal Di Hapus');
			redirect('Kelas');
		}

		$req = $this->Kelas->getKelasByid($id);
		if ($req) {

			$this->Kelas->HapusKelas($id);
			$this->session->set_flashdata('alert', 'Berhasil Di Hapus');
			redirect('Kelas');
		}
		else{
			$this->session->set_flashdata('alert2', 'Gagal Di Hapus');
			redirect('Kelas');
		}
	}
}
        
    /* End of file  Jurusan.php */
