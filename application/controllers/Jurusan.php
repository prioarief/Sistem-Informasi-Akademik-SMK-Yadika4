<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Jurusan extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('JurusanModel', 'jurusan');
	}

	public function index()
	{
		$data = [
			'title' => 'Data Jurusan',
			'jurusan' => $this->jurusan->getJurusan()
		];
		$this->load->view('admin/header', $data);
		$this->load->view('admin/jurusan/v_jurusan', $data);
		$this->load->view('admin/footer');
	}

	public function create()
	{
		
	}
}
        
    /* End of file  Jurusan.php */
