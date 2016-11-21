<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Guru extends CI_Model {

	public function getguru(){
		// $this->db->select('guru.*, kelas.nama_kelas');
		// $this->db->from('guru');
		// $this->db->join('kelas', 'kelas.id_kelas = guru.id_kelas', 'left');
		$data = $this->db->get('guru');
		return $data->result();
	}

	public function act_tambah($param){
		$this->db->insert('guru', $param);

		return $this->db->affected_rows();
	}

	public function getDetailguru($id){
		$this->db->where('id_guru', $id);
		$data = $this->db->get('guru');
		return $data->row();

	}

	public function act_edit($param){

		$object = [
			'nama_guru' => $param['nama_guru'],
			'id_guru' => $param['id'],
		];
		$this->db->where('id_guru', $param['id']);
		$this->db->update('guru', $object);

		return $this->db->affected_rows();
	}

	public function act_hapus($id){
		$this->db->where('id_guru', $id);
		$this->db->delete('guru');

		return $this->db->affected_rows();
	}

}

/* End of file M_Guru.php */
/* Location: ./application/models/M_Guru.php */