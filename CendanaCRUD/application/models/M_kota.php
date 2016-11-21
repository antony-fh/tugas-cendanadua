<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_kota extends CI_Model {

	public function getkt(){
		
		$data = $this->db->get('kota');
		return $data->result_array();
	}

	public function co_kt(){
		$data = $this->db->count_all_results('kota');
		return $data;
	}

	public function act_tambah($param){
		$this->db->insert('kota', $param);

		return $this->db->affected_rows();
	}

	public function getDetailkt($id){
		$this->db->select('kota.*');
		$this->db->from('kota');

		$this->db->where('kota.id_kota', $id);
		$data = $this->db->get();
		return $data->row();

	}

	public function act_edit($param){

		$object = [
			'nama_kota' => $param['nama_kota'],
		];
		$this->db->where('kota.id_kota', $param['id']);
		$this->db->update('kota', $object);

		return $this->db->affected_rows();
	}

	public function act_hapus($id){
		$this->db->where('kota.id_kota', $id);
		$this->db->delete('kota');

		return $this->db->affected_rows();
	}
}

/* End of file M_kota.php */
/* Location: ./application/models/M_kota.php */