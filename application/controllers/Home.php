<?php

defined('BASEPATH') or exit('No direct script access allowed');
require('./application/third_party/vendor/autoload.php');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Home extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set("Asia/Bangkok");
		$this->load->model('JurusanModel', 'Jurusan');
		$this->load->model('KelasModel', 'Kelas');
		$this->load->model('SiswaModel', 'Siswa');
		$this->load->model('MapelModel', 'Mapel');
		$this->load->model('AbsenModel', 'Absen');
		$this->load->model('NilaiModel', 'Nilai');
		$this->load->model('JadwalModel', 'Jadwal');
		login_true();
	}

	public function AbsenSaya($id = null, $matapelajaran = null)
	{
		if (is_null($id || is_null($matapelajaran))) {
			redirect('Home/DataAbsensi');
		} else {
			$bulan = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'];
			$req = $this->Absen->getAbsenBySiswa($id, $matapelajaran);
			$mapel = $this->Mapel->getMapelByid($matapelajaran);
			$data = [
				'title' => 'Absen Saya',
				'jurusan' => $this->Jurusan->getJurusan(),
				'absen' => $req,
				'mapel' => $mapel,
				'bulan' => $bulan,
				'siswa' => $id,
				'matapelajaran' => $matapelajaran

			];

			$this->load->view('templates/header', $data);
			$this->load->view('home/absen/absen-saya', $data);
			$this->load->view('templates/footer');
		}
	}

	public function getAbsenPerBulan($siswa, $mapel, $bulan)
	{
		echo json_encode($this->Absen->getAbsenPerBulan($siswa, $mapel, $bulan));
	}

	public function index()
	{
		$data = [
			'title' => 'Home',
			'jurusan' => $this->Jurusan->getJurusan(),
		];

		$this->load->view('templates/header', $data);
		$this->load->view('home/index', $data);
		$this->load->view('templates/footer');
	}

	public function Absensi()
	{
		$req = $this->Mapel->getMapelByGuru($this->session->userdata('id'));
		$kelas = $this->Mapel->getDetailMapelByKelas($this->session->userdata('kelasSaya'));
		$data = [
			'title' => 'Data Absen',
			'jurusan' => $this->Jurusan->getJurusan(),
			'mapel' => $req,
			'kelas' => $kelas,
			'saya' => $this->session->userdata('id'),
			'anaksaya' => $this->session->userdata('nama-siswa')
		];

		$this->load->view('templates/header', $data);
		$this->load->view('home/absen/absen', $data);
		$this->load->view('templates/footer');
	}

	public function Absen($id = null, $mapel = null)
	{
		$this->akses();
		if (is_null($id) || is_null($mapel)) {
			// $this->session->set_flashdata('alert', '');
			redirect('Home/DataAbsensi');
		} else {
			if ($this->Kelas->getKelasByid($id)) {
				$data = [
					'title' => 'Absensi',
					'jurusan' => $this->Jurusan->getJurusan(),
					'kelas' => $this->Kelas->getKelasByid($id),
					'siswa' => $this->Siswa->GetSiswaByKelas($id),
					'mapel' => $this->Mapel->getMapelByid($mapel)
				];

				$this->load->view('templates/header', $data);
				$this->load->view('home/absen/absen-siswa', $data);
				$this->load->view('templates/footer');
			} else {
				// $this->session->set_flashdata('alert', '');
				redirect('Home/DataAbsensi');
			}
		}
	}

	public function DataAbsensi($id = null, $mapel = null)
	{
		$this->akses();
		if (is_null($id) || is_null($mapel)) {
			redirect('Home/DataAbsensi');
		} else {
			if ($this->Kelas->getKelasByid($id)) {
				$data = [
					'title' => 'Absensi',
					'jurusan' => $this->Jurusan->getJurusan(),
					'kelas' => $this->Kelas->getKelasByid($id),
					'siswa' => $this->Siswa->GetSiswaByKelas($id),
					'mapel' => $this->Mapel->getMapelByid($mapel),
					'absen' => $this->Absen->getAbsenByKelasMapel($id, $mapel),
				];

				$this->load->view('templates/header', $data);
				$this->load->view('home/absen/absen-kelas', $data);
				$this->load->view('templates/footer');
			} else {
				redirect('Home/DataAbsensi');
			}
		}
	}

	public function DetailKelas($id = null)
	{
		$this->akses();
		if (is_null($id)) {
			redirect('Home');
		}

		$req = $this->Mapel->getDetailMapel($id);
		if ($req) {
			echo json_encode($req);
		} else {
			redirect('Home');
		}
	}

	public function PilihMapel($id = null)
	{
		if (is_null($id)) {
			redirect('Home');
		}

		$req = $this->Mapel->getDetailMapelByKelas($id);
		if ($req) {
			echo json_encode($req);
		} else {
			redirect('Home');
		}
	}

	public function AbsenAction()
	{
		$this->akses();
		$this->db->trans_start();
		$kelas = $this->input->post('kelas');
		$mapel = $this->input->post('mapel');
		$tanggal = date('Y-m-d', time());
		$absen = [
			'mapel_id' => $mapel,
			'kelas_id' => $kelas,
			'tanggal' => $tanggal,
		];

		if ($this->Absen->get($kelas, $mapel, $tanggal)) {
			$this->session->set_flashdata('alert2', 'Absen Gagal Di Input. Hari ini sudah di absen');
			redirect('Home/Absensi');
		}

		$this->Absen->AddData($absen);

		$absen_id = $this->db->insert_id();

		$data = $this->input->post();
		foreach ($data as $key => $value) {
			if ($key != 'kelas' && $key != 'mapel' && $key != 'hadir') {
				$entry = strlen($key);
				$result = substr($key, 5, $entry);

				if ($key && $value) {
					$detailAbsen = [
						'absen_id' => $absen_id,
						'siswa_id' => $result,
						'keterangan' => $value,
					];


					$this->db->insert('detail_absen', $detailAbsen);
				} else {
					die;
				}
			}
		}
		$this->db->trans_complete();
		$this->session->set_flashdata('alert', 'Absen Berhasil Di Input');
		redirect('Home/Absensi');
	}

	public function DetailAbsen($id = null)
	{
		$this->akses();
		if (is_null($id)) {
			$this->session->set_flashdata('alert', '');
			redirect('Home/DataAbsensi');
		} else {
			$req = $this->Absen->getAbsen($id);
			$data = [
				'jurusan' => $this->Jurusan->getJurusan(),
				'title' => 'Detail Absen',
				'absen' => $req
			];

			$this->load->view('templates/header', $data);
			$this->load->view('home/absen/detail-absen', $data);
			$this->load->view('templates/footer');
		}
	}

	public function DeleteAbsen($id = null)
	{
		$this->akses();
		if (is_null($id)) {
			$this->session->set_flashdata('alert2', 'Absen Gagal Di Hapus');
			redirect('Home/DataAbsensi');
		} else {
			$this->Absen->DeleteData($id);
			$this->session->set_flashdata('alert', 'Absen Berhasil Di Hapus');
			redirect('Home/DataAbsensi');
		}
	}

	public function EditAbsen()
	{
		$this->akses();
		$data = $this->input->post();
		foreach ($data as $key => $value) {
			if ($key != 'kelas' && $key != 'mapel' && $key != 'hadir') {
				$entry = strlen($key);
				$result = substr($key, 5, $entry);

				if ($key && $value) {
					$detailAbsen = [
						'keterangan' => $value,
					];

					$this->db->where('id', $result);
					$this->db->update('detail_absen', $detailAbsen);
				} else {
					die;
				}
			}
		}
		$this->session->set_flashdata('alert', 'Absen Berhasil Di Edit');
		redirect('Home/DataAbsensi');
	}

	public function Nilai()
	{
		$req = $this->Mapel->getMapelByGuru($this->session->userdata('id'));
		$kelas = $this->Mapel->getDetailMapelByKelas($this->session->userdata('kelasSaya'));
		$data = [
			'title' => 'Data Nilai',
			'jurusan' => $this->Jurusan->getJurusan(),
			'mapel' => $req,
			'kelas' => $kelas,
			'saya' => $this->session->userdata('id'),
			'anaksaya' => $this->session->userdata('nama-siswa')
		];

		$this->load->view('templates/header', $data);
		$this->load->view('home/nilai/data-nilai', $data);
		$this->load->view('templates/footer');
	}

	public function DataNilai($id = null, $mapel = null)
	{
		$this->akses();
		if (is_null($id) || is_null($mapel)) {
			redirect('Home/Nilai');
		} else {
			if ($this->Kelas->getKelasByid($id)) {
				$data = [
					'title' => 'Absensi',
					'jurusan' => $this->Jurusan->getJurusan(),
					'kelas' => $this->Kelas->getKelasByid($id),
					'siswa' => $this->Siswa->GetSiswaByKelas($id),
					'mapel' => $this->Mapel->getMapelByid($mapel),
					'absen' => $this->Absen->getAbsenByKelasMapel($id, $mapel),
				];

				$this->load->view('templates/header', $data);
				$this->load->view('home/nilai/nilai-siswa', $data);
				$this->load->view('templates/footer');
			} else {
				// $this->session->set_flashdata('alert', '');
				redirect('Home/DataAbsensi');
			}
		}
	}

	public function DetailNilai($id = null, $mapel = null)
	{
		// $this->akses();
		if (is_null($id) || is_null($mapel)) {
			redirect('Home/Nilai');
		} else {
			$req = $this->Nilai->getNilaiBySiswa($id, $mapel);
			// $nilai = $this->Nilai->DetailNilai($req['id']);
			$data = [
				'jurusan' => $this->Jurusan->getJurusan(),
				'title' => 'Detail Nilai',
				'siswa' => $this->Siswa->getDataByid($id),
				'mapel' => $this->Mapel->getMapelByid($mapel),
				'nilai' => $req,
				// 'data_nilai' => $nilai
			];

			$this->load->view('templates/header', $data);
			$this->load->view('home/nilai/detail-nilai', $data);
			$this->load->view('templates/footer');
		}
	}

	public function InputNilai()
	{
		$this->akses();
		$this->load->library('form_validation');
		$validation = $this->form_validation;

		$validation->set_rules('pengetahuan', 'pengetahuan', 'required|numeric');
		$validation->set_rules('keterampilan', 'keterampilan', 'required|numeric');
		$validation->set_rules('keterangan', 'keterangan', 'required');

		if ($validation->run() == FALSE) {
			die;
		} else {
			$pengetahuan = $this->input->post('pengetahuan');
			$keterampilan = $this->input->post('keterampilan');
			$keterangan = $this->input->post('keterangan');
			$akhir = (($pengetahuan * 30) + ($keterampilan * 70)) / 100;
			$nilai_akhir = round($akhir);

			$siswa = $this->input->post('siswa');
			$mapel = $this->input->post('mapel');
			// $cek = $this->Nilai->getNilai($siswa, $mapel);

			$req = $this->Mapel->getMapelByid($mapel);
			$status = $req['produktif'];

			if ($status == 1) {
				if ($nilai_akhir >= 95) {
					$predikat = 'A+';
				} else if ($nilai_akhir >= 90 && $nilai_akhir <= 94) {
					$predikat = 'A';
				} else if ($nilai_akhir >= 85 && $nilai_akhir <= 89) {
					$predikat = 'A-';
				} else if ($nilai_akhir >= 80 && $nilai_akhir <= 84) {
					$predikat = 'B+';
				} else if ($nilai_akhir >= 75 && $nilai_akhir <= 79) {
					$predikat = 'B';
				} else if ($nilai_akhir >= 70 && $nilai_akhir <= 74) {
					$predikat = 'B-';
				} else if ($nilai_akhir >= 65 && $nilai_akhir <= 69) {
					$predikat = 'C';
				} else if ($nilai_akhir < 65) {
					$predikat = 'D';
				}
			} else {
				if ($nilai_akhir >= 95) {
					$predikat = 'A+';
				} else if ($nilai_akhir >= 90 && $nilai_akhir <= 94) {
					$predikat = 'A';
				} else if ($nilai_akhir >= 85 && $nilai_akhir <= 89) {
					$predikat = 'A-';
				} else if ($nilai_akhir >= 80 && $nilai_akhir <= 84) {
					$predikat = 'B+';
				} else if ($nilai_akhir >= 75 && $nilai_akhir <= 79) {
					$predikat = 'B';
				} else if ($nilai_akhir >= 70 && $nilai_akhir <= 74) {
					$predikat = 'B-';
				} else if ($nilai_akhir >= 60 && $nilai_akhir <= 69) {
					$predikat = 'C';
				} else if ($nilai_akhir < 60) {
					$predikat = 'D';
				}
			}

			$this->db->trans_start();
			$data = [
				'mapel_id' => $mapel,
				'siswa_id' => $siswa,
				'keterangan' => $keterangan
			];

			$this->Nilai->addData($data);

			$nilai_id = $this->db->insert_id();
			$detail = [
				'nilai_pengetahuan' => $pengetahuan,
				'nilai_keterampilan' => $keterampilan,
				'nilai_akhir' => $nilai_akhir,
				'predikat' => $predikat,
				'nilai_id' => $nilai_id
			];

			$this->db->insert('detail_nilai', $detail);
			$this->db->trans_complete();

			$this->session->set_flashdata('alert', 'Nilai Berhasil Di Input!');
			redirect('Home/DetailNilai/' . $siswa . '/' . $mapel);
		}
	}

	public function NilaiSaya($id = null)
	{
		if (is_null($id)) {
			redirect('Home/Nilai');
		} else {
			$nilai = $this->Nilai->getNilaiSiswa($id);
			echo json_encode($nilai);
		}
	}

	public function DetailNilaiSaya($id = null)
	{
		if (is_null($id)) {
			redirect('Home/Nilai');
		} else {
			$nilai = $this->Nilai->DetailNilai($id);
			echo json_encode($nilai);
		}
	}

	public function DeleteNilai($id = null, $siswa = null, $mapel = null)
	{
		$this->akses();
		if (is_null($id) || is_null($siswa) || is_null($mapel)) {
			redirect('Home/Nilai');
		} else {
			$req = $this->Nilai->get($id);
			if ($req) {
				$this->Nilai->DeleteNilai($id);
				$this->session->set_flashdata('alert', $req['keterangan'] . ' Berhasil Di Hapus!');
				redirect('Home/DetailNilai/' . $siswa . '/' . $mapel);
			}
		}
	}

	public function EditNilai()
	{
		$this->akses();
		$this->load->library('form_validation');
		$validation = $this->form_validation;

		$validation->set_rules('pengetahuan', 'pengetahuan', 'required|numeric');
		$validation->set_rules('keterampilan', 'keterampilan', 'required|numeric');
		$validation->set_rules('keterangan', 'keterangan', 'required');

		if ($validation->run() == FALSE) {
			die;
		} else {
			$id = $this->input->post('id');
			$pengetahuan = $this->input->post('pengetahuan');
			$keterampilan = $this->input->post('keterampilan');
			$keterangan = $this->input->post('keterangan');
			$akhir = (($pengetahuan * 30) + ($keterampilan * 70)) / 100;
			$nilai_akhir = round($akhir);

			$siswa = $this->input->post('siswa');
			$mapel = $this->input->post('mapel');
			// $cek = $this->Nilai->getNilai($siswa, $mapel);

			$req = $this->Mapel->getMapelByid($mapel);
			$status = $req['produktif'];

			if ($status == 1) {
				if ($nilai_akhir >= 95) {
					$predikat = 'A+';
				} else if ($nilai_akhir >= 90 && $nilai_akhir <= 94) {
					$predikat = 'A';
				} else if ($nilai_akhir >= 85 && $nilai_akhir <= 89) {
					$predikat = 'A-';
				} else if ($nilai_akhir >= 80 && $nilai_akhir <= 84) {
					$predikat = 'B+';
				} else if ($nilai_akhir >= 75 && $nilai_akhir <= 79) {
					$predikat = 'B';
				} else if ($nilai_akhir >= 70 && $nilai_akhir <= 74) {
					$predikat = 'B-';
				} else if ($nilai_akhir >= 65 && $nilai_akhir <= 69) {
					$predikat = 'C';
				} else if ($nilai_akhir < 65) {
					$predikat = 'D';
				}
			} else {
				if ($nilai_akhir >= 95) {
					$predikat = 'A+';
				} else if ($nilai_akhir >= 90 && $nilai_akhir <= 94) {
					$predikat = 'A';
				} else if ($nilai_akhir >= 85 && $nilai_akhir <= 89) {
					$predikat = 'A-';
				} else if ($nilai_akhir >= 80 && $nilai_akhir <= 84) {
					$predikat = 'B+';
				} else if ($nilai_akhir >= 75 && $nilai_akhir <= 79) {
					$predikat = 'B';
				} else if ($nilai_akhir >= 70 && $nilai_akhir <= 74) {
					$predikat = 'B-';
				} else if ($nilai_akhir >= 60 && $nilai_akhir <= 69) {
					$predikat = 'C';
				} else if ($nilai_akhir < 60) {
					$predikat = 'D';
				}
			}

			$this->db->trans_start();
			$data = [
				'mapel_id' => $mapel,
				'siswa_id' => $siswa,
				'keterangan' => $keterangan
			];

			$this->Nilai->EditNilai($id, $data);

			// $nilai_id = $this->db->insert_id();
			$detail = [
				'nilai_pengetahuan' => $pengetahuan,
				'nilai_keterampilan' => $keterampilan,
				'nilai_akhir' => $nilai_akhir,
				'predikat' => $predikat,
				'nilai_id' => $id
			];

			$this->db->where('nilai_id', $id);
			$this->db->update('detail_nilai', $detail);
			$this->db->trans_complete();

			$this->session->set_flashdata('alert', 'Nilai Berhasil Di Edit!');
			redirect('Home/DetailNilai/' . $siswa . '/' . $mapel);
		}
	}

	public function JadwalPelajaran($kelas)
	{
		if (is_null($kelas)) {
			redirect('Home');
		}

		$req = $this->Jadwal->getHari($kelas);
		$data = [
			'title' => 'Jadwal Pelajaran',
			'jadwal' => $req,
			'jurusan' => $this->Jurusan->getJurusan(),
			// 'id' => $id,
			'kelas' => $this->Kelas->getKelasByid($this->session->userdata('kelasSaya')),
		];
		$this->load->view('templates/header', $data);
		$this->load->view('home/jadwal/list-jadwal', $data);
		$this->load->view('templates/footer', $data);
	}

	public function DetailJadwalPelajaran($id = null, $hari = null)
	{
		if (is_null($hari) || is_null($id)) {
			redirect('Jadwal');
		}

		$req = $this->Jadwal->getDetailJadwalByHari($id, $hari);

		$data = [
			'title' => 'Detail Jadwal Pelajaran',
			'jurusan' => $this->Jurusan->getJurusan(),
			'jurusanSaya' => $this->Jurusan->getJurusanByKkelas($this->session->userdata('kelasSaya')),
			'jadwal' => $req,
			'hari' => $hari,
			'id' => $id,
		];
		$this->load->view('templates/header', $data);
		$this->load->view('home/jadwal/detail-jadwal', $data);
		$this->load->view('templates/footer', $data);
	}

	public function ExportJadwalPdf($id, $hari)
	{
		$data = [
			'title' => 'Jadwal Pelajaran',
			'jadwal' => $this->Jadwal->getJadwalByKelas($id, $hari),
			'hari' => $hari
		];

		ob_start();
		$this->load->view('home/jadwal/cetak-jadwal', $data);
		$html = ob_get_contents();
		ob_end_clean();
		require './assets/pdf/vendor/autoload.php';
		$pdf = new \Spipu\Html2Pdf\Html2Pdf('P', 'A4', 'en');
		$pdf->WriteHTML($html);
		$pdf->Output('Jadwal.pdf', 'I');
	}

	public function ExportJadwalExcel($id, $hari)
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
		header('Content-Disposition: attachment;filename="Data Mapel.xlsx"');
		header('Cache-Control: max-age=0');

		$writer->save('php://output');
	}

	private function akses()
	{
		if ($this->session->userdata('akses') != 'Guru') {
			redirect('Home');
		}
	}
}
