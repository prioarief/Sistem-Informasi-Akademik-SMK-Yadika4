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
		$this->db->where_not_in('guru.nama', '-');
		$query = $this->db->get()->result_array();
		return $query;
	}

	public function mapel()
	{
		return $this->db->get('mapel')->result_array();
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
	
	public function getDetailMapelByKelas($id)
	{
		$this->db->select('detail_mapel.*, kelas.kelas, mapel.mapel,mapel.id as idMapel, guru.nama ');
		$this->db->from('detail_mapel');
		$this->db->join('mapel', 'mapel.id = detail_mapel.mapel_id');
		$this->db->join('kelas', 'kelas.id = detail_mapel.kelas_id');
		$this->db->join('guru', 'guru.id = mapel.guru_id');
		$this->db->where('detail_mapel.kelas_id', $id);
		$this->db->order_by('mapel', 'ASC');
		$query = $this->db->get()->result_array();
		return $query;
	}

	public function getMapelByid($id)
	{
		return $this->db->get_where('mapel', ['id' => $id])->row_array();
	}
	
	public function getMapelByGuru($guru_id)
	{
		return $this->db->get_where('mapel', ['guru_id' => $guru_id])->result_array();
	}
	
	public function AddMapel($data)
	{
		$this->db->insert('mapel', $data);
	}
	
	public function AddDetailMapel($data)
	{
		$this->db->insert('detail_mapel', $data);
	}

	public function EditMapel($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('mapel', $data);
	}

	public function getDetailKelasMapel($idmapel, $idkelas)
	{
		return $this->db->get_where('detail_mapel', ['mapel_id' => $idmapel, 'kelas_id' => $idkelas])->row_array();
	}

	public function DeleteMapel($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('mapel');
	}
	
	public function DeleteDetailMapel($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('detail_mapel');
	}

}
                        
/* End of file JurusanModel.php */
