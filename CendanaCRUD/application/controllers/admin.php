<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends Auth_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_kota');
		$this->load->model('M_pegawai');
		$this->load->model('M_posisi');
		$this->load->model('M_kelamin');
		$this->load->model('M_admin');
	}

	public function index()
	{
		$index = 0;
		$data_kota=[];
		$data['count_kota'] = $this->M_kota->co_kt();
		$data['count_pegawai'] = $this->M_pegawai->co_pgw();
		$data['count_posisi'] = $this->M_posisi->co_pss();
		$data['count_kelamin'] = $this->M_kelamin->co_kl();
		
		$blitar = $this->M_admin->getkotapgw(2);
			$data_blitar['value'] = $blitar[0]['jum'];
			$data_blitar['label'] = $blitar[0]['nama_kota'];
		$malang = $this->M_admin->getkotapgw(5);
			$data_malang['value'] = $malang[0]['jum'];
			$data_malang['label'] = $malang[0]['nama_kota'];
		$nganjuk = $this->M_admin->getkotapgw(3);
			$data_nganjuk['value'] = $nganjuk[0]['jum'];
			$data_nganjuk['label'] = $nganjuk[0]['nama_kota'];
		$tulungagung = $this->M_admin->getkotapgw(4);
			$data_tulungagung['value'] = $tulungagung[0]['jum'];
			$data_tulungagung['label'] = $tulungagung[0]['nama_kota'];

array_push($data_kota /*Kota*/,$data_blitar,$data_tulungagung,$data_malang,$data_nganjuk);

		$data['kota'] = json_encode($data_kota);
		$data['blitar'] = json_encode($data_blitar);
		$data['malang'] = json_encode($data_malang);
		$data['nganjuk'] = json_encode($data_nganjuk);
		$data['tulungagung'] = json_encode($data_tulungagung);

		$this->template->view('index',$data);
	}

}

/* End of file admin.php */
/* Location: ./application/controllers/admin.php */