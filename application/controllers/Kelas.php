<?php

defined('BASEPATH') or exit('No direct script access allowed');
require('./application/third_party/vendor/autoload.php');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Kelas extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('KelasModel', 'Kelas');
		$this->load->model('JurusanModel', 'Jurusan');
		login_tu();
	}

	public function index()
	{
		$data = [
			'title' => 'Data kelas',
			'kelas' => $this->Kelas->get(),
			'jurusan' => $this->Jurusan->getJurusan(),
			'javascript' => 'kelas.js'
		];
		$this->load->view('admin/header', $data);
		$this->load->view('admin/kelas/v_kelas', $data);
		$this->load->view('admin/footer', $data);
	}

	public function get()
	{
		echo json_encode($this->Kelas->get());
	}

	public function Detail($id = null)
	{
		if (is_null($id)) {
			redirect('Kelas');
		}

		$req = $this->Kelas->getKelasByid($id);
		if ($req) {
			echo json_encode($this->Kelas->getKelasByid($id));
			# code...
		} else {
			redirect('Kelas');
		}
	}
	
	public function DetailKelas($id = null)
	{
		if (is_null($id)) {
			redirect('Kelas');
		}

		$req = $this->Kelas->getKelas($id);
		if ($req) {
			echo json_encode($this->Kelas->getKelas($id));
			# code...
		} else {
			redirect('Kelas');
		}
	}

	public function Create()
	{


		$this->form_validation->set_rules('kelas', 'Kelas', 'required');
		$this->form_validation->set_rules('jurusan', 'Jurusan', 'required');

		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('alert2', 'Gagal Di Tambahkan');
			redirect('Kelas');
		} else {
			$data = [
				'kelas' => $this->input->post('kelas', true),
				'jurusan_id' => $this->input->post('jurusan', true)
			];

			$this->Kelas->AddKelas($data);
			$this->session->set_flashdata('alert', 'Berhasil Di Tambahkan');
			redirect('Kelas');
		}
	}

	public function Edit()
	{
		// if (is_null($id)) {
		// 	$this->session->set_flashdata('alert2', 'Gagal Di Edit');
		// 	redirect('Kelas');
		// }
		$this->form_validation->set_rules('id', 'idKelas', 'required');
		$this->form_validation->set_rules('kelas', 'Kelas', 'required');
		$this->form_validation->set_rules('jurusan', 'Jurusan', 'required');

		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('alert2', 'Gagal Di Edit');
			redirect('Kelas');
		} else {
			$id = $this->input->post('id');
			$req = $this->Kelas->getKelasByid($id);
			if ($req) {
				$data = [
					'kelas' => $this->input->post('kelas', true),
					'jurusan_id' => $this->input->post('jurusan', true)
				];

				$this->Kelas->EditKelas($id, $data);
				$this->session->set_flashdata('alert', 'Berhasil Di Edit');
				redirect('Kelas');
				// var_dump($this->input->post());
			} else {
				$this->session->set_flashdata('alert2', 'Gagal Di Edit');
				redirect('Kelas');
			}
		}
	}

	public function Delete($id = null)
	{
		if (is_null($id)) {
			$this->session->set_flashdata('alert2', 'Gagal Di Hapus');
			redirect('Kelas');
		}

		$req = $this->Kelas->getKelasByid($id);
		if ($req) {

			$this->Kelas->DeleteKelas($id);
			$this->session->set_flashdata('alert', 'Berhasil Di Hapus');
			redirect('Kelas');
		} else {
			$this->session->set_flashdata('alert2', 'Gagal Di Hapus');
			redirect('Kelas');
		}
	}

	public function Export($id = null)
	{
		if(is_null($id)){
			$req = $this->Kelas->get();
		}else{
			$req = $this->Kelas->getKelasPerJurusan($id);
		}

		$data = [
			'title' => 'Data Siswa',
			'kelas' => $req,

		];

		ob_start();
		
		$this->load->view('admin/kelas/cetak-kelas', $data);
		$html = ob_get_contents();        
		ob_end_clean();                   
		require './assets/pdf/vendor/autoload.php';
		$pdf = new \Spipu\Html2Pdf\Html2Pdf('P', 'A4', 'en');   
		$pdf->WriteHTML($html);    
		$pdf->Output('Data Kelas.pdf', 'I');

	}

	public function ExportExcel($id = null)
	{
		if(is_null($id)){
			$req = $this->Kelas->get();
		}else{
			$req = $this->Kelas->getKelasPerJurusan($id);
		}

		$spreadsheet = new Spreadsheet;

		$spreadsheet->setActiveSheetIndex(0)
		->setCellValue('A1', 'No')
		->setCellValue('B1', 'Kelas')
		->setCellValue('C1', 'Jurusan');

		$kolom = 2;
		$nomor = 1;
		foreach ($req as $jrs) {

			$spreadsheet->setActiveSheetIndex(0)
			->setCellValue('A' . $kolom, $nomor)
			->setCellValue('B' . $kolom, $jrs['kelas'])
			->setCellValue('C' . $kolom, $jrs['jurusan']);

			$kolom++;
			$nomor++;
		}

		$writer = new Xlsx($spreadsheet);

		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="Data Kelas.xlsx"');
		header('Cache-Control: max-age=0');

		$writer->save('php://output');
	}
}
        
    /* End of file  Jurusan.php */
