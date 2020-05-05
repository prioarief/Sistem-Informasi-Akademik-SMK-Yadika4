<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('JurusanModel', 'Jurusan');
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
}
