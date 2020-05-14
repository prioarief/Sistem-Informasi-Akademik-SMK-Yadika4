<?php

defined('BASEPATH') or exit('No direct script access allowed');
require('./application/third_party/vendor/autoload.php');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;


class Jadwal extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('JadwalModel', 'Jadwal');
		$this->load->model('MapelModel', 'Mapel');
		$this->load->model('KelasModel', 'Kelas');
		login_tu();
	}

	public function index()
	{

		$data = [
			'title' => 'Data Jadwal Pelajaran',
			'jadwal' => $this->Jadwal->getJadwal(),
			'kelas' => $this->Kelas->get(),
			'javascript' => 'jadwal.js'
		];
		$this->load->view('admin/header', $data);
		$this->load->view('admin/jadwal/v_jadwal', $data);
		$this->load->view('admin/footer', $data);
	}

	public function Detail($id = null, $kelas = null)
	{
		if (is_null($id) || is_null($kelas)) {
			redirect('Jadwal');
		}

		$req = $this->Jadwal->getHari($id);
		$hari = ["Senin", "Selasa", "Rabu", "Kamis", "Jumat"];
		$data = [
			'title' => 'Jadwal Pelajaran',
			'jadwal' => $req,
			'id' => $id,
			'mapel' => $this->Mapel->mapel(),
			'hari' => $hari,
			'kelas' => $this->Kelas->getKelasByid($kelas),
		];
		$this->load->view('admin/header', $data);
		$this->load->view('admin/jadwal/list-jadwal', $data);
		$this->load->view('admin/footer', $data);
	}

	public function DetailJadwal($id = null, $hari = null)
	{
		if (is_null($hari) || is_null($id)) {
			redirect('Jadwal');
		}

		$req = $this->Jadwal->getDetailJadwalByHari($id, $hari);

		$data = [
			'title' => 'Detail Jadwal Pelajaran',
			'jadwal' => $req,
			'mapel' => $this->Mapel->mapel(),
			'hari' => $hari,
			'id' => $id,
			'javascript' => 'jadwal.js'
		];
		$this->load->view('admin/header', $data);
		$this->load->view('admin/jadwal/detail-jadwal', $data);
		$this->load->view('admin/footer', $data);
	}

	public function AddDetail()
	{
		$id = $this->input->post('id');
		$mulai = $this->input->post('mulai');
		$selesai = $this->input->post('selesai');
		$ruang = $this->input->post('ruang');
		$hari = $this->input->post('hari');
		$mapel = $this->input->post('mapel');

		$data = [
			'jadwal_id' => $id,
			'mapel_id' => $mapel,
			'jam_mulai' => $mulai,
			'jam_selesai' => $selesai,
			'ruang' => $ruang,
			'hari' => $hari,
		];

		$this->Jadwal->AddDetailJadwal($data);
		$this->session->set_flashdata('alert', 'Berhasil Di Tambahkan');
		redirect('Jadwal/DetailJadwal/' . $id . '/' . $hari);
	}

	public function EditDetail()
	{
		$id = $this->input->post('id');
		$mulai = $this->input->post('mulai');
		$selesai = $this->input->post('selesai');
		$ruang = $this->input->post('ruang');
		$hari = $this->input->post('hari');
		$mapel = $this->input->post('mapel');

		$data = [
			'mapel_id' => $mapel,
			'jam_mulai' => $mulai,
			'jam_selesai' => $selesai,
			'ruang' => $ruang,
			'hari' => $hari,
		];

		$this->Jadwal->EditDetailJadwal($id, $data);
		$this->session->set_flashdata('alert', 'Berhasil Di Edit');
		redirect('Jadwal/DetailJadwal/' . $id . '/' . $hari);
	}


	public function Create()
	{
		$kelas = $this->input->post('kelas');

		$data = [
			'kelas_id' => $kelas,
		];

		$this->Jadwal->AddJadwal($data);
		$this->session->set_flashdata('alert', 'Berhasil Di Tambahkan');
		redirect('Jadwal');
	}

	public function Edit()
	{
		$this->form_validation->set_rules('mapel', 'mapel', 'required');
		$this->form_validation->set_rules('guru', 'guru', 'required');
		// $this->form_validation->set_rules('kelas[]', 'kelas', 'required');

		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('alert2', 'Gagal Di Tambahkan');
			redirect('Mapel');
		} else {
			$this->db->trans_start();
			$id = $this->input->post('id', true);
			$kelas = $this->input->post('kelas[]');
			$data = [
				'mapel' => $this->input->post('mapel', true),
				'guru_Id' => $this->input->post('guru', true),
			];
			$this->Mapel->EditMapel($id, $data);


			$detail = array();
			foreach ($kelas as $k) {

				$req = $this->Mapel->getDetailKelasMapel($id, $k);
				$detail = [
					'mapel_id' => $id,
					'kelas_id' => $k,
				];

				if (!$req) {
					$this->db->insert('detail_mapel', $detail);
				}
			}
			$this->db->trans_complete();

			$this->session->set_flashdata('alert', 'Berhasil Di Edit');
			redirect('Mapel');
		}
	}

	public function Delete($id = null)
	{
		if (is_null($id)) {
			$this->session->set_flashdata('alert2', 'Gagal Di Hapus');
			redirect('Jadwal');
		}

		$req = $this->Jadwal->getJadwalByid($id);
		if ($req) {

			$this->Jadwal->DeleteJadwal($id);
			$this->session->set_flashdata('alert', 'Berhasil Di Hapus');
			redirect('Jadwal');
		} else {
			$this->session->set_flashdata('alert2', 'Gagal Di Hapus');
			redirect('Jadwal');
		}
	}

	public function HapusDetailJadwal($id = null, $hari = null, $jadwal = null)
	{
		if (is_null($id)) {
			redirect('Jadwal');
		}

		$this->Jadwal->DeleteDetailJadwal($id);
		$this->session->set_flashdata('alert', 'Berhasil Di Hapus');
		redirect('Jadwal/DetailJadwal/' . $jadwal . '/' . $hari);
	}

	public function DetailKelas($id = null)
	{
		if (is_null($id)) {
			redirect('Mapel');
		}

		$req = $this->Mapel->getDetailMapel($id);
		if ($req) {
			echo json_encode($req);
		} else {
			redirect('Mapel');
		}
	}

	public function DeleteKelas()
	{
		$this->form_validation->set_rules('kelas[]', 'kelas', 'required');

		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('alert2', 'Gagal Di Hapus');
			redirect('Mapel');
		} else {
			$kelas = $this->input->post('kelas[]', true);
			foreach ($kelas as $k) {
				$this->Mapel->DeleteDetailMapel($k);
			}
		}

		$this->session->set_flashdata('alert', 'Berhasil Di Hapus');
		redirect('Mapel');
	}

	public function Details($id)
	{
		echo json_encode($this->Jadwal->detailJadwal($id));
	}

	public function ExportPdf($id, $hari)
	{
		$data = [
			'title' => 'Jadwal Pelajaran',
			'jadwal' => $this->Jadwal->getJadwalByKelas($id, $hari),
			'hari' => $hari
		];

		ob_start();
		$this->load->view('admin/jadwal/cetak-jadwal', $data);
		$html = ob_get_contents();
		ob_end_clean();
		require './assets/pdf/vendor/autoload.php';
		$pdf = new \Spipu\Html2Pdf\Html2Pdf('P', 'A4', 'en');
		$pdf->WriteHTML($html);
		$pdf->Output('Jadwal.pdf', 'I');
	}

	public function ExportExcel($id, $hari)
	{
		$jadwal = $this->Jadwal->getJadwalByKelas($id, $hari);

		$spreadsheet = new Spreadsheet;

		$spreadsheet->setActiveSheetIndex(0)
			->setCellValue('A1', 'No')
			->setCellValue('B1', 'Hari')
			->setCellValue('C1', 'Mata Pelajaran')
			->setCellValue('D1', 'Jam Mulai')
			->setCellValue('E1', 'Jam Selesai')
			->setCellValue('F1', 'Ruang')
			->setCellValue('G1', 'Nama Guru');

		$kolom = 2;
		$nomor = 1;
		foreach ($jadwal as $jdwl) {

			$spreadsheet->setActiveSheetIndex(0)
				->setCellValue('A' . $kolom, $nomor)
				->setCellValue('B' . $kolom, $jdwl['hari'])
				->setCellValue('C' . $kolom, $jdwl['mapel'])
				->setCellValue('D' . $kolom, $jdwl['jam_mulai'])
				->setCellValue('E' . $kolom, $jdwl['jam_selesai'])
				->setCellValue('F' . $kolom, $jdwl['ruang'])
				->setCellValue('G' . $kolom, $jdwl['nama']);

			$kolom++;
			$nomor++;
		}

		$writer = new Xlsx($spreadsheet);

		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="Jadwal Pelajaran.xlsx"');
		header('Cache-Control: max-age=0');

		$writer->save('php://output');
	}
}
        
    /* End of file  Jurusan.php */
