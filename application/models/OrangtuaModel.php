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
	
	public function getDataBynik($nik) 
	{
		$this->db->select('orang_tua.*, siswa.nama as namaSiswa');
		$this->db->from('orang_tua');
		$this->db->join('siswa', 'orang_tua.nik = siswa.nik_orangtua');
		$this->db->where('nik', $nik);
		$query = $this->db->get()->row_array();
		return $query;
	}

	public function AddData($data)
	{
		$this->db->insert('orang_tua', $data);
	}

	public function DeleteData($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('orang_tua');
	}

	public function EditData($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('orang_tua', $data);
	}
}
                        
/* End of file JurusanModel.php */
