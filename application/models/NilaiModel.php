<?php

class NilaiModel extends CI_Model {
	public function addData($data)
	{
		$this->db->insert('nilai', $data);
	}

	public function getNilai($siswa, $mapel)
	{
		return $this->db->get_where('nilai', ['siswa_id' => $siswa, 'mapel_id' => $mapel])->row_array();
	}

	public function DetailNilai($nilai)
	{
		return $this->db->get_where('detail_nilai', ['nilai_id' => $nilai])->row_array();
	}
}
