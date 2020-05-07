<?php

defined('BASEPATH') or exit('No direct script access allowed');

class AbsenModel extends CI_Model
{

	public function get()
	{
		return $this->db->get('guru')->result_array();
	}

	public function getAbsen($id)
	{
		$this->db->select('detail_absen.*, siswa.nama, siswa.nis, siswa.id as idSiswa');
		$this->db->from('detail_absen');
		$this->db->join('siswa', 'siswa.id = detail_absen.siswa_id');
		$this->db->where('detail_absen.absen_id', $id);
		$query = $this->db->get()->result_array();
		return $query;
	}
	
	public function getAbsenByKelasMapel($kelas, $mapel)
	{
		$this->db->select('absen.*, kelas.kelas, mapel.mapel');
		$this->db->from('absen');
		$this->db->join('kelas', 'kelas.id = absen.kelas_id');
		$this->db->join('mapel', 'mapel.id = absen.mapel_id');
		$this->db->where('absen.kelas_id', $kelas);
		$this->db->where('absen.mapel_id', $mapel);
		$this->db->order_by('absen.tanggal', 'ASC');
		$query = $this->db->get()->result_array();
		return $query;
	}
	
	public function getDataByemail($email)
	{
		return $this->db->get_where('guru', ['email' => $email])->row_array();
	}

	public function EditData($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('guru', $data);
	}

	public function AddData($data)
	{
		$this->db->insert('absen', $data);
	}

	public function DeleteData($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('guru');
	}
}
                        
/* End of file guru.php */
