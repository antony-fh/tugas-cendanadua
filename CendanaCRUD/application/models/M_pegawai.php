<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pegawai extends CI_Model {

	public function getpgw(){
		$this->db->select('pegawai.id_pegawai,pegawai.nama,pegawai.telepon, posisi.nama as nama_posisi, kota.nama_kota, j_kelamin.nama as nama_kelamin,pegawai.status');
		$this->db->from('pegawai');
		$this->db->join('kota', 'kota.id_kota = pegawai.kota', 'left');
		$this->db->join('posisi', 'posisi.id = pegawai.id_posisi', 'left');
		$this->db->join('j_kelamin', 'j_kelamin.id_kelamin = pegawai.kelamin', 'left');
		$data = $this->db->get();
		return $data->result_array();
	}

	public function co_pgw(){
		$data = $this->db->count_all_results('pegawai');
		return $data;
	}


	public function act_tambah($param){
		$this->db->insert('pegawai', $param);

		return $this->db->affected_rows();
	}

	public function getDetailpgw($id){
		$this->db->select('pegawai.*, kota.nama_kota, posisi.nama as nama_posisi, j_kelamin.nama as nama_kelamin');
		$this->db->from('pegawai');
		$this->db->join('kota', 'kota.id_kota = pegawai.kota', 'left');
		$this->db->join('posisi', 'posisi.id = pegawai.id_posisi', 'left');
		$this->db->join('j_kelamin', 'j_kelamin.id_kelamin = pegawai.kelamin', 'left');
		$this->db->where('pegawai.id_pegawai', $id);
		$data = $this->db->get();
		return $data->row();

	}

	public function act_edit($param){

		$object = [
			'nama' => $param['nama'],
			'telepon' => $param['telepon'],
			'kota' => $param['id_kota'],
			'kelamin' => $param['Kelamin'],
			'id_posisi' => $param['id_posisi'],
		];
		$this->db->where('pegawai.id_pegawai', $param['id']);
		$this->db->update('pegawai', $object);

		return $this->db->affected_rows();
	}

	public function act_hapus($id){
		$this->db->where('pegawai.id_pegawai', $id);
		$this->db->delete('pegawai');

		return $this->db->affected_rows();
	}

}

/* End of file M_pegawai.php */
/* Location: ./application/models/M_pegawai.php */