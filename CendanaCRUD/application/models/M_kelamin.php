<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_kelamin extends CI_Model {

	public function getKL(){
		
		$data = $this->db->get('j_kelamin');
		return $data->result();
	}

	public function co_kl(){
		$data = $this->db->count_all_results('j_kelamin');
		return $data;
	}

}

/* End of file M_kota.php */
/* Location: ./application/models/M_kota.php */