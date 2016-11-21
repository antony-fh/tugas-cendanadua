<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_Controller extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->user_login = $this->session->userdata('user_session');

		if (count($this->user_login)==0) {
			$this->session->set_flashdata('alert_msg',err_msg('Silahkan Login terlebih Dahulu'));
			redirect('login');
		}
	}
	public function load_template($view,$data)
	{
		$data['content'] = $this->load->view($view,$data);
		$data['menu_items'] = [
			'welcome'=>'Dashboard',
			'siswa'=>'Siswa',
			'guru'=>'Guru',
			'kelas'=>'Kelas',
			'mapel'=>'Mapel',
			'nilai'=>'Nilai'
		];
		$this->load->view('template/base_template',$data);
	}
	public function index()
	{
		
	}

}

/* End of file Auth_Controller.php */
/* Location: ./application/core/Auth_Controller.php */