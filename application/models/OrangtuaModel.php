<?php

defined('BASEPATH') or exit('No direct script access allowed');

class OrangtuaModel extends CI_Model
{

	public function getData()
	{
		return $this->db->get('orang_tua')->result_array();
	}

	public function getDataByid($id) 
	{
		return $this->db->get_where('orang_tua', ['id' => $id])->row_array();
	}

	public function AddData($data)
	{
		$this->db->insert('orang_tua', $data);
	}

	public function DeleteJurusan($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('jurusan');
	}

	public function EditData($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('orang_tua', $data);
	}
}
                        
/* End of file JurusanModel.php */
