<?php

defined('BASEPATH') or exit('No direct script access allowed');

class SiswaModel extends CI_Model
{

	public function get()
	{
		$this->db->select('siswa.*, kelas.kelas, orang_tua.nama as orangtua');
		$this->db->from('siswa');
		$this->db->join('kelas', 'kelas.id = siswa.kelas_id');
		$this->db->join('orang_tua', 'orang_tua.nik = siswa.nik_orangtua');
		$query = $this->db->get()->result_array();
		return $query;
	}

	public function getDataByid($id)
	{
		return $this->db->get_where('siswa', ['id' => $id])->row_array();
	}
	
	public function getDataByNis($nis)
	{
		$this->db->select('siswa.*, kelas.kelas, orang_tua.nama as orangtua');
		$this->db->from('siswa');
		$this->db->join('kelas', 'kelas.id = siswa.kelas_id');
		$this->db->join('orang_tua', 'orang_tua.nik = siswa.nik_orangtua');
		$this->db->where('nis', $nis);
		$query = $this->db->get()->row_array();
		return $query;
	}

	public function GetSiswaByNikOrtu($nik)
	{
		$this->db->select('siswa.nama');
		$this->db->from('siswa');
		$this->db->where('nik_orangtua', $nik);
		$query = $this->db->get()->result_array();
		return $query;
	}

	public function EditData($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('siswa', $data);
	}

	public function AddData($data)
	{
		$this->db->insert('siswa', $data);
	}

	public function DeleteData($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('siswa');
	}
}
                        
/* End of file Siswa.php */
