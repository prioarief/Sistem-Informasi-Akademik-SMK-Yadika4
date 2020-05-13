<?php

defined('BASEPATH') or exit('No direct script access allowed');

class JadwalModel extends CI_Model
{

	public function getJadwal()
	{
		$this->db->select('jadwal.*, kelas.kelas, kelas.id as idkelas');
		$this->db->from('jadwal');
		$this->db->join('kelas', 'kelas.id = jadwal.kelas_id');
		$this->db->order_by('kelas', 'ASC');
		$query = $this->db->get()->result_array();
		return $query;
	}

	public function getJadwalByid($id)
	{
		return $this->db->get_where('jadwal', ['id' => $id])->row_array();
	}
	
	public function getJadwalByKelas($id, $hari)
	{
		$this->db->select('detail_jadwal.*, mapel.mapel, guru.nama');
		$this->db->from('detail_jadwal');
		$this->db->join('jadwal', 'jadwal.id = detail_jadwal.jadwal_id');
		$this->db->join('mapel', 'mapel.id = detail_jadwal.mapel_id');
		$this->db->join('guru', 'guru.id = mapel.guru_id');
		$this->db->order_by('jam_mulai', 'ASC');
		$this->db->where(['jadwal_id' => $id, 'hari' => $hari]);
		$query = $this->db->get()->result_array();
		return $query;
	}

	public function AddJadwal($data)
	{
		$this->db->insert('jadwal', $data);
	}
	
	public function AddDetailJadwal($data)
	{
		$this->db->insert('detail_jadwal', $data);
	}
	
	public function EditDetailJadwal($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('detail_jadwal', $data);
	}

	public function DeleteJadwal($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('jadwal');
	}
	
	public function DeleteDetailJadwal($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('detail_jadwal');
	}

	public function getHari($id)
	{	$this->db->distinct();
		$this->db->select('hari, jadwal.id as idJadwal');
		$this->db->from('detail_jadwal');
		$this->db->join('jadwal', 'jadwal.id = detail_jadwal.jadwal_id');
		$this->db->group_by('hari');
		$this->db->order_by('hari', 'desc');
		$this->db->where('jadwal_id', $id);
		$this->db->or_where('kelas_id', $id);

		$query = $this->db->get()->result_array();
		return $query;
	}

	public function getDetailJadwalByHari($id, $hari)
	{
		
		$this->db->select('detail_jadwal.*, mapel.mapel, guru.nama');
		$this->db->from('detail_jadwal');
		$this->db->join('mapel', 'mapel.id = detail_jadwal.mapel_id');
		$this->db->join('guru', 'guru.id = mapel.guru_id');
		$this->db->order_by('jam_mulai', 'ASC');
		$this->db->where(['hari' => $hari, 'jadwal_id' => $id]);
		$query = $this->db->get()->result_array();
		return $query;
	}

	public function detailJadwal($id)
	{
		return $this->db->get_where('detail_jadwal', ['id' => $id])->row_array();
	}
}
                        
/* End of file JurusanModel.php */
