<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_login extends CI_Model {

	public function act_login($param){
		$this->db->where('user', $param['username']);
		$this->db->where('pass', $param['password']);
		$data = $this->db->get('login');

		return $data->row();
	}

}

/* End of file M_login.php */
/* Location: ./application/models/M_login.php */