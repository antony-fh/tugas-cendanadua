<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelas extends Auth_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_kelas');
	}
	public function index()
	{
		$data['judul'] = "Menu kelas";
		$data['data_kelas'] = $this->M_kelas->getkelas();
		$this->load_template('kelas/kelas',$data);
	}
	public function add_kelas()
	{
		$data['judul'] = "Tambah kelas";
		$data['kelas'] = $this->M_kelas->getkelas();
		$this->load_template('kelas/form_tambah_kelas',$data);
	}
	public function act_tambah(){
		$this->form_validation->set_rules('nama_kelas', 'nama_kelas', 'required');

			if ($this->form_validation->run() == FALSE) {
				$this->session->set_flashdata('alert_msg',err_msg( validation_errors() ));
				redirect('kelas/add_kelas');
			} else {
				$param = $this->input->post();
				$proses= $this->M_kelas->act_tambah($param);
				if ($proses>=0) {
					$this->session->set_flashdata('alert_msg',succ_msg("kelas Berhasil diinputkan"));
					redirect('kelas');
				}
				else {
					$this->session->set_flashdata('alert_msg',err_msg("kelas Gagal diinputkan"));
					redirect('kelas/add_kelas');
				}
			}
	}

	public function edit($id){
		$data['judul'] = 'Edit kelas';
		$data['kelas'] = $this->M_kelas->getkelas();
		$data['data_kelas'] = $this->M_kelas->getDetailkelas($id);
		$this->load_template('kelas/form_edit_kelas',$data);
	}

	public function act_edit(){
		$this->form_validation->set_rules('nama_kelas', 'nama', 'required');
		$this->form_validation->set_rules('id_kelas', 'id_kelas', 'required');

			if ($this->form_validation->run() == FALSE) {
				$this->session->set_flashdata('alert_msg',err_msg( validation_errors() ));
				redirect('kelas/edit');
			} else {

				$param = $this->input->post();
				$proses= $this->M_kelas->act_edit($param);
				if ($proses>=0) {
					$this->session->set_flashdata('alert_msg',succ_msg("kelas Berhasil diedit"));
					redirect('kelas');
				}
				else {
					$this->session->set_flashdata('alert_msg',err_msg("kelas Gagal diedit"));
					redirect($_SERVER['HTTP_REFERER']);
				}
			}
	}

	public function hapus($id=''){
		$proses= $this->M_kelas->act_hapus($id);
		if ($proses>=0) {
			$this->session->set_flashdata('alert_msg',succ_msg("kelas Berhasil dihapus"));
			redirect('kelas');
		}
		else {
			$this->session->set_flashdata('alert_msg',err_msg("kelas Gagal dihapus"));
			redirect($_SERVER['HTTP_REFERER']);
		}
	}

}

/* End of file Kelas.php */
/* Location: ./application/controllers/Kelas.php */