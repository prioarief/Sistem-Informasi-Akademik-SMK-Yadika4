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
		$this->load->model('GuruModel', 'Guru');
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
						'idSiswa' => $req['id'],
						'nama' => $req['nama'],
						'nis' => $req['nis'],
						'kelas' => $req['kelas'],
						'kelasSaya' => $req['kelas_id'],
						'orangtua' => $req['orangtua'],
						'password' => $req['password'],
						'jk' => $req['jk'],
						'agama' => $req['agama'],
						'gol_darah' => $req['gol_darah'],
						'tempat_lahir' => $req['tempat_lahir'],
						'tanggal_lahir' => $req['tanggal_lahir'],
						'alamat' => $req['alamat'],
						'telpon' => $req['telpon'],
						'pendidikan' => $req['pendidikan'],
						'kewarganegaraan' => $req['kewarganegaraan'],
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

					$namaSiswa = $this->Siswa->GetSiswaByNikOrtu($req['nik']);

					$dataOrangtua = [
						'nama' => $req['nama'],
						'nik' => $req['nik'],
						'nama-siswa' => $namaSiswa,
						'orangtua' => $req['orangtua'],
						'password' => $req['password'],
						'jk' => $req['jk'],
						'agama' => $req['agama'],
						'gol_darah' => $req['gol_darah'],
						'tempat_lahir' => $req['tempat_lahir'],
						'tanggal_lahir' => $req['tanggal_lahir'],
						'alamat' => $req['alamat'],
						'telpon' => $req['telpon'],
						'pendidikan' => $req['pendidikan'],
						'kewarganegaraan' => $req['kewarganegaraan'],
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

	public function Guru()
	{
		$this->form_validation->set_rules('email', 'email', 'required|valid_email', [
			'required' => 'Email harus diisi!',
			'valid_email' => 'Email tidak valid!'
		]);
		$this->form_validation->set_rules('password', 'password', 'required', [
			'required' => 'Password harus diisi!'
		]);

		if ($this->form_validation->run() == false) {
			$this->index();
		} else {
			$email = $this->input->post('email');
			$password = $this->input->post('password');

			$req = $this->Guru->getDataByemail($email);
			if ($req) {
				if ($req['password'] == $password) {

					$dataGuru = [
						'id' => $req['id'],
						'nama' => $req['nama'],
						'email' => $req['email'],
						'password' => $req['password'],
						'jk' => $req['jk'],
						'agama' => $req['agama'],
						'gol_darah' => $req['gol_darah'],
						'tempat_lahir' => $req['tempat_lahir'],
						'tanggal_lahir' => $req['tanggal_lahir'],
						'alamat' => $req['alamat'],
						'telpon' => $req['telpon'],
						'pendidikan' => $req['pendidikan'],
						'kewarganegaraan' => $req['kewarganegaraan'],
						'akses' => 'Guru'
					];

					$this->session->set_userdata($dataGuru);

					$this->session->set_flashdata('login-sukses', 'Silakan manfaatkan fitur dengan bijak!!');
					redirect('Home');
				} else {
					$this->session->set_flashdata('login-gagal', 'Password salah, silakan hubungi petugas TU jika ingin reset password!');
					redirect('Auth/Guru');
				}
			} else {
				$this->session->set_flashdata('login-gagal', 'Email belum terdaftar sebagai Siswa, silakan hubungi petugas TU');
				redirect('Auth/Guru');
			}
		}
	}

	public function logout()
	{
		// $user_data = $this->session->all_userdata();

		// foreach ($user_data as $key => $value) {
		// 	if ($key != 'session_id' && $key != 'ip_address' && $key != 'user_agent' && $key != 'last_activity') {
		// 		$this->session->unset_userdata($key);
		// 	}
		// }

		$this->session->sess_destroy();


		redirect('Auth');
	}
}
        
    /* End of file  Auth.php */
