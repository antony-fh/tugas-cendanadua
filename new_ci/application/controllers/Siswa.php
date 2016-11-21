<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa extends Auth_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_Siswa');
		$this->load->model('M_Kelas');
	}
	
	public function index()
	{
		$data['judul'] = "Menu Siswa";
		$data['data_siswa'] = $this->M_Siswa->getSiswa();
		$this->load_template('siswa/siswa',$data);
	}
	public function add_siswa()
	{
		$data['judul'] = "Tambah Siswa";
		$data['kelas'] = $this->M_Kelas->getkelas();
		$this->load_template('siswa/form_tambah_siswa',$data);
	}
	public function act_tambah(){
		$this->form_validation->set_rules('nama', 'nama', 'required');
		$this->form_validation->set_rules('alamat', 'alamat', 'required');
		$this->form_validation->set_rules('id_kelas', 'id_kelas', 'required');

			if ($this->form_validation->run() == FALSE) {
				$this->session->set_flashdata('alert_msg',err_msg( validation_errors() ));
				redirect('siswa/add_siswa');
			} else {
				$param = $this->input->post();
				$proses= $this->M_Siswa->act_tambah($param);
				if ($proses>=0) {
					$this->session->set_flashdata('alert_msg',succ_msg("Siswa Berhasil diinputkan"));
					redirect('siswa');
				}
				else {
					$this->session->set_flashdata('alert_msg',err_msg("Siswa Gagal diinputkan"));
					redirect('siswa/add_siswa');
				}
			}
	}

	public function edit($id){
		$data['judul'] = 'Edit Siswa';
		$data['kelas'] = $this->M_Kelas->getkelas();
		$data['data_siswa'] = $this->M_Siswa->getDetailSiswa($id);
		$this->load_template('siswa/form_edit_siswa',$data);
	}

	public function act_edit(){
		$this->form_validation->set_rules('nama', 'nama', 'required');
		$this->form_validation->set_rules('alamat', 'alamat', 'required');
		$this->form_validation->set_rules('id_kelas', 'id_kelas', 'required');

			if ($this->form_validation->run() == FALSE) {
				$this->session->set_flashdata('alert_msg',err_msg( validation_errors() ));
				redirect('siswa/edit');
			} else {

				$param = $this->input->post();
				$proses= $this->M_Siswa->act_edit($param);
				if ($proses>=0) {
					$this->session->set_flashdata('alert_msg',succ_msg("Siswa Berhasil diedit"));
					redirect('siswa');
				}
				else {
					$this->session->set_flashdata('alert_msg',err_msg("Siswa Gagal diedit"));
					redirect($_SERVER['HTTP_REFERER']);
				}
			}
	}

	public function hapus($id=''){
		$proses= $this->M_Siswa->act_hapus($id);
		if ($proses>=0) {
			$this->session->set_flashdata('alert_msg',succ_msg("Siswa Berhasil dihapus"));
			redirect('siswa');
		}
		else {
			$this->session->set_flashdata('alert_msg',err_msg("Siswa Gagal dihapus"));
			redirect($_SERVER['HTTP_REFERER']);
		}
	}

}

/* End of file Siswa.php */
/* Location: ./application/controllers/Siswa.php */