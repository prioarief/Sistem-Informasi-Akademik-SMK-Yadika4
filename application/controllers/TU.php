<?php

defined('BASEPATH') or exit('No direct script access allowed');

class TU extends CI_Controller
{

	public function index()
	{
		$data = [
			'title' => 'Petugas TU '
		];

		$this->load->view('admin/header', $data);
		$this->load->view('admin/index');
		$this->load->view('admin/footer');
	}

	// public function Siswa()
	// {
	// 	$data = [
	// 		'title' => 'Data Siswa',
	// 	];
	// 	$this->load->view('admin/header', $data);
	// 	$this->load->view('admin/siswa/v_siswa');
	// 	$this->load->view('admin/footer');
	// }
}
        
    /* End of file  TUController.php */
