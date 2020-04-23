<?php

defined('BASEPATH') or exit('No direct script access allowed');

class JurusanModel extends CI_Model
{

	public function getJurusan()
	{
		return $this->db->get('jurusan')->result_array();
	}
}
                        
/* End of file JurusanModel.php */
