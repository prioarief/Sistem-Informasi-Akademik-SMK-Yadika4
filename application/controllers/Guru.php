<?php

defined('BASEPATH') or exit('No direct script access allowed');
require('./application/third_party/vendor/autoload.php');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Guru extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('GuruModel', 'Guru');
		login_tu();
	}

	public function index()
	{
		$data = [
			'title' => 'Data Guru',
			'guru' => $this->Guru->get(),
			'javascript' => 'Guru.js'

		];
		$this->load->view('admin/header', $data);
		$this->load->view('admin/Guru/v_Guru', $data);
		$this->load->view('admin/footer', $data);
	}

	public function Detail($id = null)
	{
		if (is_null($id)) {
			redirect('Guru');
		}

		$req = $this->Guru->getDataByid($id);
		if ($req) {
			echo json_encode($this->Guru->getDataByid($id));
		} else {
			redirect('Guru');
		}
	}

	public function Create()
	{
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
			redirect('Guru');
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

			$this->Guru->AddData($data);
			$this->session->set_flashdata('alert', 'Berhasil Di Tambahkan');
			redirect('Guru');
		}
	}

	public function Delete($id = null)
	{
		if (is_null($id)) {
			$this->session->set_flashdata('alert2', 'Gagal Di Hapus');
			redirect('Guru');
		}

		$req = $this->Guru->getDataByid($id);
		if ($req) {

			$this->Guru->DeleteData($id);
			$this->session->set_flashdata('alert', 'Berhasil Di Hapus');
			redirect('Guru');
		} else {
			$this->session->set_flashdata('alert2', 'Gagal Di Hapus');
			redirect('Guru');
		}
	}

	public function Edit()
	{
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
			redirect('Guru');
		} else {
			$id = $this->input->post('id');
			$req = $this->Guru->getDataByid($id);
			
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

				$this->Guru->EditData($id, $data);
				$this->session->set_flashdata('alert', 'Berhasil Di Edit');
				redirect('Guru');
				
			} else {
				$this->session->set_flashdata('alert2', 'Gagal Di Edit');
				redirect('Guru');
			}
		}
	}

	public function Export()
	{
		// $id = $this->input->post('jurusan', true);

		$data = [
			'title' => 'Data Siswa',
			'data' => $this->Guru->get(),

		];

		ob_start();
		
		$this->load->view('admin/guru/cetak-guru', $data);
		$html = ob_get_contents();        
		ob_end_clean();                   
		require './assets/pdf/vendor/autoload.php';
		$pdf = new \Spipu\Html2Pdf\Html2Pdf('P', 'A4', 'en');   
		$pdf->WriteHTML($html);    
		$pdf->Output('Data Kelas.pdf', 'I');

	}

	public function ExportExcel()
	{
		$guru = $this->Guru->get();

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
				->setCellValue('H' . $kolom, $jrs['tempat_lahir'] . ',' . date('j F Y', strtotime($jrs['tanggal_lahir'])))
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
		header('Content-Disposition: attachment;filename="Data Guru.xlsx"');
		header('Cache-Control: max-age=0');

		$writer->save('php://output');
	}
}
        
    /* End of file  Guru.php */
