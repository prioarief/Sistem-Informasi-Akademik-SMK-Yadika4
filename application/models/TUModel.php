<?php

defined('BASEPATH') or exit('No direct script access allowed');

class TUModel extends CI_Model
{

	public function get()
	{
		return $this->db->get('tu')->result_array();
	}

	public function getDataByid($id)
	{
		return $this->db->get_where('tu', ['id' => $id])->row_array();
	}
	
	public function getDataByemail($email)
	{
		return $this->db->get_where('tu', ['email' => $email])->row_array();
	}

	public function EditData($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('tu', $data);
	}

	public function AddData($data)
	{
		$this->db->insert('tu', $data);
	}

	public function DeleteData($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('tu');
	}
}
                        
/* End of file tu.php */
