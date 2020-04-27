<?php

defined('BASEPATH') or exit('No direct script access allowed');

class GuruModel extends CI_Model
{

	public function get()
	{
		return $this->db->get('guru')->result_array();
	}

	public function getDataByid($id)
	{
		return $this->db->get_where('guru', ['id' => $id])->row_array();
	}

	public function EditData($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('guru', $data);
	}

	public function AddData($data)
	{
		$this->db->insert('guru', $data);
	}

	public function DeleteData($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('guru');
	}
}
                        
/* End of file guru.php */
