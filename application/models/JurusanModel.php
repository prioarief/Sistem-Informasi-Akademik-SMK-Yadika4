<?php

defined('BASEPATH') or exit('No direct script access allowed');

class JurusanModel extends CI_Model
{

	public function getJurusan()
	{
		return $this->db->get('jurusan')->result_array();
	}

	public function getJurusanByid($id)
	{
		return $this->db->get_where('jurusan', ['id' => $id])->row_array();
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
