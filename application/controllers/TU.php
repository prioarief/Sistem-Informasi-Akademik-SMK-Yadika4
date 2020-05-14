<?php

defined('BASEPATH') or exit('No direct script access allowed');

require('./application/third_party/vendor/autoload.php');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class TU extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('JurusanModel', 'Jurusan');
		$this->load->model('TUModel', 'TU');
		$this->load->library('form_validation');
	}

	public function welcome()
	{
		login_tu();
		$data = [
			'title' => 'Petugas TU ',

		];

		$this->load->view('admin/header', $data);
		$this->load->view('admin/index');
		$this->load->view('admin/footer');
	}

	public function Auth()
	{
		$this->form_validation->set_rules('email', 'email', 'required|valid_email', [
			'required' => 'Email harus diisi!',
			'valid_email' => 'Email tidak valid!'
		]);
		$this->form_validation->set_rules('password', 'password', 'required', [
			'required' => 'Password harus diisi!'
		]);

		if ($this->form_validation->run() == false) {
			$data = [
				'title' => 'Login Petugas TU ',
				'jurusan' => $this->Jurusan->getJurusan(),

			];

			$this->load->view('admin/login', $data);
		} else {
			$email = $this->input->post('email');
			$password = $this->input->post('password');

			$req = $this->TU->getDataByemail($email);
			if ($req) {
				if ($req['password'] == $password) {

					$dataTU = [
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
						'akses' => 'TU'
					];

					$this->session->set_userdata($dataTU);

					$this->session->set_flashdata('login-sukses', 'Silakan manfaatkan fitur dengan bijak!!');
					redirect('TU');
				} else {
					$this->session->set_flashdata('login-gagal', 'Password salah, silakan hubungi petugas TU jika ingin reset password!');
					redirect('TU/Auth');
				}
			} else {
				$this->session->set_flashdata('login-gagal', 'NIK belum terdaftar sebagai Siswa, silakan hubungi petugas TU');
				redirect('TU/Auth');
			}
		}
	}

	public function index()
	{
		login_tu();
		$data = [
			'title' => 'Data Petugas TU ',
			'TU' => $this->TU->get(),
			'javascript' => 'tu.js'

		];

		$this->load->view('admin/header', $data);
		$this->load->view('admin/tu/v_tu', $data);
		$this->load->view('admin/footer', $data);
	}

	public function Detail($id = null)
	{
		login_tu();
		if (is_null($id)) {
			redirect('TU');
		}

		$req = $this->TU->getDataByid($id);
		if ($req) {
			echo json_encode($this->TU->getDataByid($id));
		} else {
			redirect('TU');
		}
	}

	public function Create()
	{
		login_tu();
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
			redirect('TU');
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

			$this->TU->AddData($data);
			$this->session->set_flashdata('alert', 'Berhasil Di Tambahkan');
			redirect('TU');
		}
	}

	public function Delete($id = null)
	{
		login_tu();
		if (is_null($id)) {
			$this->session->set_flashdata('alert2', 'Gagal Di Hapus');
			redirect('TU');
		}

		$req = $this->TU->getDataByid($id);
		if ($req) {

			$this->TU->DeleteData($id);
			$this->session->set_flashdata('alert', 'Berhasil Di Hapus');
			redirect('TU');
		} else {
			$this->session->set_flashdata('alert2', 'Gagal Di Hapus');
			redirect('TU');
		}
	}

	public function Edit()
	{
		login_tu();
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
			redirect('TU');
		} else {
			$id = $this->input->post('id');
			$req = $this->TU->getDataByid($id);

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

				$this->TU->EditData($id, $data);
				$this->session->set_flashdata('alert', 'Berhasil Di Edit');
				redirect('TU');
			} else {
				$this->session->set_flashdata('alert2', 'Gagal Di Edit');
				redirect('TU');
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

		redirect('TU/Auth');
	}

	public function Export()
	{
		// $id = $this->input->post('jurusan', true);

		$data = [
			'title' => 'Data Siswa',
			'data' => $this->TU->get(),

		];

		ob_start();
		
		$this->load->view('admin/tu/cetak-tu', $data);
		$html = ob_get_contents();        
		ob_end_clean();                   
		require './assets/pdf/vendor/autoload.php';
		$pdf = new \Spipu\Html2Pdf\Html2Pdf('P', 'A4', 'en');   
		$pdf->WriteHTML($html);    
		$pdf->Output('Data Kelas.pdf', 'I');

	}

	public function ExportExcel()
	{
		$guru = $this->TU->get();

		$spreadsheet = new Spreadsheet;

		$spreadsheet->setActiveSheetIndex(0)
			->setCellValue('A1', 'No')
			->setCellValue('B1', 'Nama Guru')
			->setCellValue('C1', 'Jenis Kelamin')
			->setCellValue('D1', 'Email')
			->setCellValue('E1', 'Password')
			->setCellValue('F1', 'Agama')
			->setCellValue('G1', 'Gol Darah')
			->setCellValue('H1', 'Tempat, tanggal lahir')
			->setCellValue('I1', 'Alamat')
			->setCellValue('J1', 'Telpon')
			->setCellValue('K1', 'Pendidikan')
			->setCellValue('L1', 'Status')
			->setCellValue('M1', 'Kewarganegaraan');

		$kolom = 2;
		$nomor = 1;
		foreach ($guru as $jrs) {

			$spreadsheet->setActiveSheetIndex(0)
				->setCellValue('A' . $kolom, $nomor)
				->setCellValue('B' . $kolom, $jrs['nama'])
				->setCellValue('C' . $kolom, $jrs['jk'])
				->setCellValue('D' . $kolom, $jrs['email'])
				->setCellValue('E' . $kolom, $jrs['password'])
				->setCellValue('F' . $kolom, $jrs['agama'])
				->setCellValue('G' . $kolom, $jrs['gol_darah'])
				->setCellValue('H' . $kolom, $jrs['tempat_lahir'] . ',' . $jrs['tanggal_lahir'])
				->setCellValue('I' . $kolom, $jrs['alamat'])
				->setCellValue('J' . $kolom, $jrs['telpon'])
				->setCellValue('K' . $kolom, $jrs['pendidikan'])
				->setCellValue('L' . $kolom, $jrs['status'])
				->setCellValue('M' . $kolom, $jrs['kewarganegaraan']);

			$kolom++;
			$nomor++;
		}

		$writer = new Xlsx($spreadsheet);

		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="Data TU.xlsx"');
		header('Cache-Control: max-age=0');

		$writer->save('php://output');
	}
}
