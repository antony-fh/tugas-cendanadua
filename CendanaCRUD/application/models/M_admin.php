<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_admin extends CI_Model {

	public function getkotapgw($kota="")
	{
		$this->db->select('count(pegawai.nama) as jum,kota.nama_kota');
		$this->db->from('pegawai');
		$this->db->join('kota', 'pegawai.kota = kota.id_kota', 'left');
		$this->db->where('kota.id_kota', $kota);
		$data = $this->db->get();
		return $data->result_array();
	}

}

/* End of file M_admin.php */
/* Location: ./application/models/M_admin.php */