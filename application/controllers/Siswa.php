<?php

defined('BASEPATH') or exit('No direct script access allowed');
require('./application/third_party/vendor/autoload.php');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Siswa extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('SiswaModel', 'Siswa');
		$this->load->model('KelasModel', 'Kelas');
		login_tu();
	}

	public function index()
	{
		$data = [
			'title' => 'Data Siswa',
			'siswa' => $this->Siswa->get(),
			'kelas' => $this->Kelas->get(),
			'javascript' => 'siswa.js'

		];
		$this->load->view('admin/header', $data);
		$this->load->view('admin/siswa/v_siswa', $data);
		$this->load->view('admin/footer', $data);
	}

	public function Detail($id = null)
	{
		if (is_null($id)) {
			redirect('Siswa');
		}

		$req = $this->Siswa->getDataByid($id);
		if ($req) {
			echo json_encode($this->Siswa->getDataByid($id));
			# code...
		} else {
			redirect('Siswa');
		}
	}

	public function DetailSiswa($nis = null)
	{
		if (is_null($nis)) {
			redirect('Siswa');
		}

		$req = $this->Siswa->getDataByNis($nis);
		if ($req) {
			echo json_encode($this->Siswa->getDataByNis($nis));
			# code...
		} else {
			redirect('Siswa');
		}
	}

	public function GetSiswaByNikOrtu($nik = null)
	{
		if (is_null($nik)) {
			redirect('Siswa');
		}

		$req = $this->Siswa->GetSiswaByNikOrtu($nik);
		if ($req) {
			echo json_encode($req);
		}
	}

	public function Create()
	{
		$this->form_validation->set_rules('nama', 'nama', 'required');
		$this->form_validation->set_rules('nis', 'nis', 'required');
		$this->form_validation->set_rules('nik-ortu', 'nik-ortu', 'required');
		$this->form_validation->set_rules('agama', 'agama', 'required');
		$this->form_validation->set_rules('jk', 'jenis kelamin', 'required');
		$this->form_validation->set_rules('gol-darah', 'gol-darah', 'required');
		$this->form_validation->set_rules('kelas', 'kelas', 'required');
		$this->form_validation->set_rules('pendidikan', 'pendidikan', 'required');
		$this->form_validation->set_rules('tempat-lahir', 'tempat-lahir', 'required');
		$this->form_validation->set_rules('tanggal-lahir', 'tanggal-lahir', 'required');
		$this->form_validation->set_rules('alamat', 'alamat', 'required');
		$this->form_validation->set_rules('telpon', 'telpon', 'required');
		$this->form_validation->set_rules('kewarganegaraan', 'kewarganegaraan', 'required');

		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('alert2', 'Gagal Di Tambahkan');
			redirect('Siswa');
		} else {
			$data = [
				'nama' => strtoupper($this->input->post('nama', true)),
				'nis' => $this->input->post('nis', true),
				'kelas_id' => $this->input->post('kelas', true),
				'nik_orangtua' => $this->input->post('nik-ortu', true),
				'password' => strtolower($this->input->post('password', true)),
				'jk' => $this->input->post('jk', true),
				'agama' => $this->input->post('agama', true),
				'gol_darah' => $this->input->post('gol-darah', true),
				'tempat_lahir' => strtoupper($this->input->post('tempat-lahir', true)),
				'tanggal_lahir' => $this->input->post('tanggal-lahir', true),
				'alamat' => $this->input->post('alamat', true),
				'telpon' => $this->input->post('telpon', true),
				'pendidikan' => $this->input->post('pendidikan', true),
				'kewarganegaraan' => strtoupper($this->input->post('kewarganegaraan', true)),
			];

			$this->Siswa->AddData($data);
			$this->session->set_flashdata('alert', 'Berhasil Di Tambahkan');
			redirect('Siswa');
			var_dump($data);
		}
	}

	public function Delete($id = null)
	{
		if (is_null($id)) {
			$this->session->set_flashdata('alert2', 'Gagal Di Hapus');
			redirect('Siswa');
		}

		$req = $this->Siswa->getDataByid($id);
		if ($req) {

			$this->Siswa->DeleteData($id);
			$this->session->set_flashdata('alert', 'Berhasil Di Hapus');
			redirect('Siswa');
		} else {
			$this->session->set_flashdata('alert2', 'Gagal Di Hapus');
			redirect('Siswa');
		}
	}

	public function Edit()
	{
		$this->form_validation->set_rules('nama', 'nama', 'required');
		$this->form_validation->set_rules('nis', 'nis', 'required');
		$this->form_validation->set_rules('nik', 'nik-ortu', 'required');
		$this->form_validation->set_rules('agama', 'agama', 'required');
		$this->form_validation->set_rules('jk', 'jenis kelamin', 'required');
		$this->form_validation->set_rules('gol-darah', 'gol-darah', 'required');
		$this->form_validation->set_rules('kelas', 'kelas', 'required');
		$this->form_validation->set_rules('pendidikan', 'pendidikan', 'required');
		$this->form_validation->set_rules('tempat-lahir', 'tempat-lahir', 'required');
		$this->form_validation->set_rules('tanggal-lahir', 'tanggal-lahir', 'required');
		$this->form_validation->set_rules('alamat', 'alamat', 'required');
		$this->form_validation->set_rules('telpon', 'telpon', 'required');
		$this->form_validation->set_rules('kewarganegaraan', 'kewarganegaraan', 'required');

		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('alert2', 'Gagal Di Edit');
			redirect('Siswa');
		} else {
			$id = $this->input->post('id');
			$req = $this->Siswa->getDataByid($id);


			if ($req) {
				$data = [
					'nama' => strtoupper($this->input->post('nama', true)),
					'nis' => $this->input->post('nis', true),
					'kelas_id' => $this->input->post('kelas', true),
					'nik_orangtua' => $this->input->post('nik', true),
					'password' => strtolower($this->input->post('password', true)),
					'jk' => $this->input->post('jk', true),
					'agama' => $this->input->post('agama', true),
					'gol_darah' => $this->input->post('gol-darah', true),
					'tempat_lahir' => strtoupper($this->input->post('tempat-lahir', true)),
					'tanggal_lahir' => $this->input->post('tanggal-lahir', true),
					'alamat' => $this->input->post('alamat', true),
					'telpon' => $this->input->post('telpon', true),
					'pendidikan' => $this->input->post('pendidikan', true),
					'kewarganegaraan' => strtoupper($this->input->post('kewarganegaraan', true)),
				];

				$this->Siswa->EditData($id, $data);
				$this->session->set_flashdata('alert', 'Berhasil Di Edit');
				redirect('Siswa');
			} else {
				$this->session->set_flashdata('alert2', 'Gagal Di Edit');
				redirect('Siswa');
			}
		}
	}

	public function getSiswaPerKelas($id)
	{
		echo json_encode($this->Siswa->GetSiswaByKelas($id));
	}


	public function Export($id = null)
	{
		

		$data = [
			'title' => 'Data Siswa',
			'siswa' => $this->Siswa->getSiswaPerKelas($id),
			'kelas' => $this->Kelas->getKelasByid($id),

		];

		ob_start();
		
		$this->load->view('admin/siswa/cetak_siswa', $data);
		$html = ob_get_contents();        
		ob_end_clean();                   
		require './assets/pdf/vendor/autoload.php';
		$pdf = new \Spipu\Html2Pdf\Html2Pdf('P', 'A4', 'en');   
		$pdf->WriteHTML($html);    
		$pdf->Output('Data Siswa.pdf', 'I');

	}

	public function ExportExcel($id = null)
	{
		if(is_null($id)){

			$siswa = $this->Siswa->get();
		}else{
			$siswa = $this->Siswa->getSiswaPerKelas($id);
		}

		$spreadsheet = new Spreadsheet;

		$spreadsheet->setActiveSheetIndex(0)
		->setCellValue('A1', 'No')
		->setCellValue('B1', 'Nama')
		->setCellValue('C1', 'Jenis Kelamin')
		->setCellValue('D1', 'NIS')
		->setCellValue('E1', 'Kelas')
		->setCellValue('F1', 'Agama')
		->setCellValue('G1', 'Gol Darah')
		->setCellValue('H1', 'Tempat, tanggal lahir')
		->setCellValue('I1', 'Alamat')
		->setCellValue('J1', 'Telpon')
		->setCellValue('K1', 'Pendidikan')
		->setCellValue('L1', 'Nama Orangtua')
		->setCellValue('M1', 'Password')
		->setCellValue('N1', 'Kewarganegaraan');

		$kolom = 2;
		$nomor = 1;
		foreach ($siswa as $jrs) {

			$spreadsheet->setActiveSheetIndex(0)
			->setCellValue('A' . $kolom, $nomor)
			->setCellValue('B' . $kolom, $jrs['nama'])
			->setCellValue('C' . $kolom, $jrs['jk'])
			->setCellValue('D' . $kolom, $jrs['nis'])
			->setCellValue('E' . $kolom, $jrs['kelas'])
			->setCellValue('F' . $kolom, $jrs['agama'])
			->setCellValue('G' . $kolom, $jrs['gol_darah'])
			->setCellValue('H' . $kolom, $jrs['tempat_lahir'] . ','  . date('j F Y', strtotime($jrs['tanggal_lahir'])))
			->setCellValue('I' . $kolom, $jrs['alamat'])
			->setCellValue('J' . $kolom, $jrs['telpon'])
			->setCellValue('K' . $kolom, $jrs['pendidikan'])
			->setCellValue('L' . $kolom, $jrs['orangtua'])
			->setCellValue('M' . $kolom, $jrs['password'])
			->setCellValue('N' . $kolom, $jrs['kewarganegaraan']);

			$kolom++;
			$nomor++;
		}

		$writer = new Xlsx($spreadsheet);

		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="Data Siswa.xlsx"');
		header('Cache-Control: max-age=0');

		$writer->save('php://output');
	}
}
        
    /* End of file  Jurusan.php */
