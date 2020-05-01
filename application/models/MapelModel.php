<?php

defined('BASEPATH') or exit('No direct script access allowed');

class MapelModel extends CI_Model
{

	public function getMapel()
	{
		$this->db->select('mapel.*, guru.nama as nama_guru');
		$this->db->from('mapel');
		$this->db->join('guru', 'guru.id = mapel.guru_id');
		$this->db->order_by('mapel', 'ASC');
		$query = $this->db->get()->result_array();
		return $query;
	}
	
	public function getDetailMapel($id)
	{
		$this->db->select('detail_mapel.*, kelas.kelas ');
		$this->db->from('detail_mapel');
		$this->db->join('kelas', 'kelas.id = detail_mapel.kelas_id');
		$this->db->where('detail_mapel.mapel_id', $id);
		$this->db->order_by('kelas', 'ASC');
		$query = $this->db->get()->result_array();
		return $query;
	}

	public function getJurusanByid($id)
	{
		return $this->db->get_where('jurusan', ['id' => $id])->row_array();
	}

	public function AddMapel($data)
	{
		$this->db->insert('mapel', $data);
	}
	
	public function AddDetailMapel($data)
	{
		$this->db->insert('detail_mapel', $data);
	}

	public function EditJurusan($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('jurusan', $data);
	}

	public function DeleteJurusan($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('jurusan');
	}
}
                        
/* End of file JurusanModel.php */
