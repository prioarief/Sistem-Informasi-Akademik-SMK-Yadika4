<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('SiswaModel', 'Siswa');
		
	}

	public function index()
	{
		$this->load->view('auth/login');
	}

	public function Siswa()
	{
		$this->form_validation->set_rules('nis', 'NIS', 'required', [
			'required' => 'NIS harus diisi!'
		]);
		$this->form_validation->set_rules('password', 'password', 'required', [
			'required' => 'Password harus diisi!'
		]);

		if ($this->form_validation->run() == false) {
			$this->load->view('auth/login');
		} else {
			$nis = $this->input->post('nis');
			$password = $this->input->post('password');

			$req = $this->Siswa->getDataByNis($nis);
			if ($req) {
				if ($req['password'] == $password) {

					$dataSiswa = [
						'nama' => $req['nama'],
						'nis' => $req['nis'],
						'kelas' => $req['kelas'],
						'orangtua' => $req['orangtua'],
					];

					$this->session->set_userdata($dataSiswa);

					$this->session->set_flashdata('login-sukses', 'Silakan manfaatkan fitur dengan bijak!');
					redirect('Home');
				} else {
					$this->session->set_flashdata('login-gagal', 'Password salah, silakan hubungi petugas TU jika ingin reset password!');
					redirect('Auth');
				}
			} else {
				$this->session->set_flashdata('login-gagal', 'NIS belum terdaftar sebagai Siswa, silakan hubungi petugas TU');
				redirect('Auth');
			}
		}
	}

	public function logout ()
	{
		$this->session->unset_userdata('nis');
		$this->session->unset_userdata('nama');
		$this->session->unset_userdata('kelas');
		$this->session->unset_userdata('orangtua');

		redirect('Auth');
	}
}
        
    /* End of file  Auth.php */
