<?php

defined('BASEPATH') or exit('No direct script access allowed');

require('./application/third_party/vendor/autoload.php');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Jurusan extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('JurusanModel', 'Jurusan');
		login_tu();
	}

	public function get()
	{
		echo json_encode($this->Jurusan->getJurusan());
	}

	public function index()
	{
		$data = [
			'title' => 'Data Jurusan',
			'jurusan' => $this->Jurusan->getJurusan(),
			'javascript' => 'jurusan.js'
		];
		$this->load->view('admin/header', $data);
		$this->load->view('admin/jurusan/v_jurusan', $data);
		$this->load->view('admin/footer', $data);
	}

	public function Detail($id = null)
	{
		if (is_null($id)) {
			redirect('Jurusan');
		}

		$req = $this->Jurusan->getJurusanByid($id);
		if ($req) {
			echo json_encode($this->Jurusan->getJurusanByid($id));
			# code...
		} else {
			redirect('Jurusan');
		}
	}


	public function Create()
	{
		$this->form_validation->set_rules('jurusan', 'Jurusan', 'required');

		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('alert2', 'Gagal Di Tambahkan');
			redirect('Jurusan');
		} else {
			$data = [
				'jurusan' => $this->input->post('jurusan', true)
			];

			$this->Jurusan->AddJurusan($data);
			$this->session->set_flashdata('alert', 'Berhasil Di Tambahkan');
			redirect('Jurusan');
		}
	}

	public function Edit()
	{
		$this->form_validation->set_rules('jurusan', 'Jurusan', 'required');

		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('alert2', 'Gagal Di Edit');
			redirect('Jurusan');
		} else {
			$id = $this->input->post('id');
			$req = $this->Jurusan->getJurusanByid($id);
			if ($req) {
				$data = [
					'Jurusan' => $this->input->post('jurusan', true),
				];

				$this->Jurusan->EditJurusan($id, $data);
				$this->session->set_flashdata('alert', 'Berhasil Di Edit');
				redirect('Jurusan');
			} else {
				$this->session->set_flashdata('alert2', 'Gagal Di Edit');
				redirect('Jurusan');
			}
		}
	}

	public function Delete($id = null)
	{
		if (is_null($id)) {
			$this->session->set_flashdata('alert2', 'Gagal Di Hapus');
			redirect('Kelas');
		}

		$req = $this->Jurusan->getJurusanByid($id);
		if ($req) {

			$this->Jurusan->DeleteJurusan($id);
			$this->session->set_flashdata('alert', 'Berhasil Di Hapus');
			redirect('Jurusan');
		} else {
			$this->session->set_flashdata('alert2', 'Gagal Di Hapus');
			redirect('Jurusan');
		}
	}

	public function Export()
	{
		// $id = $this->input->post('jurusan', true);

		$data = [
			'title' => 'Data Siswa',
			'data' => $this->Jurusan->getJurusan(),

		];

		ob_start();

		$this->load->view('admin/jurusan/cetak-jurusan', $data);
		$html = ob_get_contents();
		ob_end_clean();
		require './assets/pdf/vendor/autoload.php';
		$pdf = new \Spipu\Html2Pdf\Html2Pdf('P', 'A4', 'en');
		$pdf->WriteHTML($html);
		$pdf->Output('Data Kelas.pdf', 'I');
	}

	public function ExportExcel()
	{
		$jurusan = $this->Jurusan->getJurusan();

		$spreadsheet = new Spreadsheet;

		$spreadsheet->setActiveSheetIndex(0)
			->setCellValue('A1', 'No')
			->setCellValue('B1', 'Jurusan');

		$kolom = 2;
		$nomor = 1;
		foreach ($jurusan as $jrs) {

			$spreadsheet->setActiveSheetIndex(0)
				->setCellValue('A' . $kolom, $nomor)
				->setCellValue('B' . $kolom, $jrs['jurusan']);

			$kolom++;
			$nomor++;
		}

		$writer = new Xlsx($spreadsheet);

		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="Data Jurusan.xlsx"');
		header('Cache-Control: max-age=0');

		$writer->save('php://output');
	}
}
        
    /* End of file  Jurusan.php */
