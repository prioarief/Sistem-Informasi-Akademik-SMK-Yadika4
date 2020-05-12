<?php

class NilaiModel extends CI_Model {
	public function addData($data)
	{
		$this->db->insert('nilai', $data);
	}

	public function get($id)
	{
		return $this->db->get_where('nilai', ['id' => $id])->row_array();
	}

	public function getNilai($siswa, $mapel)
	{
		return $this->db->get_where('nilai', ['siswa_id' => $siswa, 'mapel_id' => $mapel])->row_array();
	}
	
	public function getNilaiSiswa($id)
	{
		return $this->db->get_where('nilai', ['id' => $id])->row_array();
	}
	
	public function getNilaiBySiswa($siswa, $mapel)
	{
		return $this->db->get_where('nilai', ['siswa_id' => $siswa, 'mapel_id' => $mapel])->result_array();
	}

	public function DetailNilai($nilai)
	{
		return $this->db->get_where('detail_nilai', ['nilai_id' => $nilai])->row_array();
	}

	public function DeleteNilai($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('nilai');
	}
	
	public function EditNilai($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('nilai', $data);
	}
}
