<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mapel extends Auth_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_mapel');
		$this->load->model('M_guru');
	}
	public function index()
	{
		$data['judul'] = "Menu mapel";
		$data['data_mapel'] = $this->M_mapel->getmapel();
		$this->load_template('mapel/mapel',$data);
	}
	public function add_mapel()
	{
		$data['judul'] = "Tambah mapel";
		$data['guru'] = $this->M_guru->getguru();
		$this->load_template('mapel/form_tambah_mapel',$data);
	}
	public function act_tambah(){
		$this->form_validation->set_rules('nama_mapel', 'nama', 'required');
		$this->form_validation->set_rules('id_guru', 'id_guru', 'required');

			if ($this->form_validation->run() == FALSE) {
				$this->session->set_flashdata('alert_msg',err_msg( validation_errors() ));
				redirect('mapel/add_mapel');
			} else {
				$param = $this->input->post();
				$proses= $this->M_mapel->act_tambah($param);
				if ($proses>=0) {
					$this->session->set_flashdata('alert_msg',succ_msg("mapel Berhasil diinputkan"));
					redirect('mapel');
				}
				else {
					$this->session->set_flashdata('alert_msg',err_msg("mapel Gagal diinputkan"));
					redirect('mapel/add_mapel');
				}
			}
	}

	public function edit($id){
		$data['judul'] = 'Edit mapel';
		$data['guru'] = $this->M_guru->getguru();
		$data['data_mapel'] = $this->M_mapel->getDetailmapel($id);
		$this->load_template('mapel/form_edit_mapel',$data);
	}

	public function act_edit(){
		$this->form_validation->set_rules('nama_mapel', 'nama', 'required');
		$this->form_validation->set_rules('id_guru', 'id_guru', 'required');

			if ($this->form_validation->run() == FALSE) {
				$this->session->set_flashdata('alert_msg',err_msg( validation_errors() ));
				redirect('mapel/edit');
			} else {

				$param = $this->input->post();
				$proses= $this->M_mapel->act_edit($param);
				if ($proses>=0) {
					$this->session->set_flashdata('alert_msg',succ_msg("mapel Berhasil diedit"));
					redirect('mapel');
				}
				else {
					$this->session->set_flashdata('alert_msg',err_msg("mapel Gagal diedit"));
					redirect($_SERVER['HTTP_REFERER']);
				}
			}
	}

	public function hapus($id=''){
		$proses= $this->M_mapel->act_hapus($id);
		if ($proses>=0) {
			$this->session->set_flashdata('alert_msg',succ_msg("mapel Berhasil dihapus"));
			redirect('mapel');
		}
		else {
			$this->session->set_flashdata('alert_msg',err_msg("mapel Gagal dihapus"));
			redirect($_SERVER['HTTP_REFERER']);
		}
	}

}

/* End of file Mapel.php */
/* Location: ./application/controllers/Mapel.php */