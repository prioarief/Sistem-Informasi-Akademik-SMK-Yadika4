<?php

defined('BASEPATH') or exit('No direct script access allowed');

class KelasModel extends CI_Model
{

	public function get()
	{
		$this->db->select('kelas.id as idkelas, kelas.kelas, jurusan.jurusan, jurusan.id as idjurusan');
		$this->db->from('kelas');
		$this->db->join('jurusan', 'jurusan.id = kelas.jurusan_id');
		$query = $this->db->get()->result_array();
		return $query;
	}

	public function getKelasByid($id)
	{
		return $this->db->get_where('kelas', ['id' => $id])->row_array();
	}
	
	public function getKelas($id)
	{
		$this->db->select('kelas.id as idkelas, kelas.kelas, jurusan.jurusan, jurusan.id as idjurusan');
		$this->db->from('kelas');
		$this->db->join('jurusan', 'jurusan.id = kelas.jurusan_id');
		$this->db->where('kelas.id', $id);
		$query = $this->db->get()->row_array();
		return $query;
	}

	public function EditKelas($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('kelas', $data);
	}

	public function AddKelas($data)
	{
		$this->db->insert('kelas', $data);
	}

	public function DeleteKelas($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('kelas');
	}
}
                        
/* End of file Kelas.php */
