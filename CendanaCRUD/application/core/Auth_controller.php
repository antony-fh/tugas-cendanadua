<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_controller extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->user_login = $this->session->userdata('user_session');

		if (count($this->user_login)==0) {
			$this->session->set_flashdata('alert_msg',err_msg('Silahkan Login terlebih Dahulu'));
			redirect('login');
		}
	}
	
	public function index()
	{
		
	}

}

/* End of file Auth_controller.php */
/* Location: ./application/core/Auth_controller.php */