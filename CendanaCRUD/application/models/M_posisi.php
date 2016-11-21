<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_posisi extends CI_Model {

	public function getpss(){
		
		$data = $this->db->get('posisi');
		return $data->result_array();
	}

	public function co_pss(){
		$data = $this->db->count_all_results('posisi');
		return $data;
	}

	public function act_tambah($param){
		$this->db->insert('posisi', $param);

		return $this->db->affected_rows();
	}

	public function getDetailpss($id){
		$this->db->select('posisi.*');
		$this->db->from('posisi');
		$this->db->where('posisi.id', $id);
		$data = $this->db->get();
		return $data->row();

	}

	public function act_edit($param){

		$object = [
			'nama' => $param['nama'],
		];
		$this->db->where('posisi.id', $param['id']);
		$this->db->update('posisi', $object);

		return $this->db->affected_rows();
	}

	public function act_hapus($id){
		$this->db->where('posisi.id', $id);
		$this->db->delete('posisi');

		return $this->db->affected_rows();
	}


}

/* End of file M_posisi.php */
/* Location: ./application/models/M_posisi.php */