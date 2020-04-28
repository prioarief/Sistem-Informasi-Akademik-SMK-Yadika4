<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('SiswaModel', 'Siswa');
		$this->load->model('JurusanModel', 'Jurusan');
		$this->load->model('OrangtuaModel', 'Orangtua');
	}

	public function index()
	{
		login_false();
		$data = [
			'title' => 'Halaman Login',
			'jurusan' => $this->Jurusan->getJurusan(),
		];

		$this->load->view('auth/login', $data);
	}

	function Siswa()
	{
		$this->form_validation->set_rules('nis', 'NIS', 'required', [
			'required' => 'NIS harus diisi!'
		]);
		$this->form_validation->set_rules('password', 'password', 'required', [
			'required' => 'Password harus diisi!'
		]);

		if ($this->form_validation->run() == false) {
			$this->index();
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
						'akses' => 'Siswa'
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

	function Orangtua()
	{
		$this->form_validation->set_rules('nik', 'NIK', 'required', [
			'required' => 'nik harus diisi!'
		]);
		$this->form_validation->set_rules('password', 'password', 'required', [
			'required' => 'Password harus diisi!'
		]);

		if ($this->form_validation->run() == false) {
			$this->index();
		} else {
			$nik = $this->input->post('nik');
			$password = $this->input->post('password');

			$req = $this->Orangtua->getDataBynik($nik);
			if ($req) {
				if ($req['password'] == $password) {

					$dataOrangtua = [
						'nama' => $req['nama'],
						'nik' => $req['nik'],
						'orangtua' => $req['orangtua'],
						'akses' => 'Orangtua'
					];

					$this->session->set_userdata($dataOrangtua);

					$this->session->set_flashdata('login-sukses', 'Silakan manfaatkan fitur dengan bijak!!');
					redirect('Home');
				} else {
					$this->session->set_flashdata('login-gagal', 'Password salah, silakan hubungi petugas TU jika ingin reset password!');
					redirect('Auth');
				}
			} else {
				$this->session->set_flashdata('login-gagal', 'NIK belum terdaftar sebagai Siswa, silakan hubungi petugas TU');
				redirect('Auth');
			}
		}
	}

	public function logout()
	{
		$user_data = $this->session->all_userdata();

		foreach ($user_data as $key => $value) {
			if ($key != 'session_id' && $key != 'ip_address' && $key != 'user_agent' && $key != 'last_activity') {
				$this->session->unset_userdata($key);
			}
		}

		redirect('Auth');
	}
}
        
    /* End of file  Auth.php */
