<?php

defined('BASEPATH') or exit('No direct script access allowed');

class JurusanModel extends CI_Model
{

	public function getJurusan()
	{
		$this->db->select('*');
		$this->db->from('jurusan');
		$this->db->order_by('jurusan', 'ASC');
		$query = $this->db->get()->result_array();
		return $query;
	}

	public function getJurusanByid($id)
	{
		return $this->db->get_where('jurusan', ['id' => $id])->row_array();
	}
	
	public function getJurusanByKkelas($id)
	{
		$this->db->select('jurusan.*');
		$this->db->from('jurusan');
		$this->db->join('kelas', 'kelas.jurusan_id = jurusan.id');
		$this->db->where(['kelas.id' => $id]);
		$query = $this->db->get()->row_array();
		return $query;
	}

	public function AddJurusan($data)
	{
		$this->db->insert('jurusan', $data);
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
