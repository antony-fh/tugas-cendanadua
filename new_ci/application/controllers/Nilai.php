<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class nilai extends Auth_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_nilai');
		$this->load->model('M_siswa');
		$this->load->model('M_mapel');
	}
	public function index()
	{
		$data['judul'] = "Menu Nilai";
		$data['data_nilai'] = $this->M_nilai->getnilai();
		$this->load_template('nilai/nilai',$data);
	}
	public function add_nilai()
	{
		$data['judul'] = "Tambah nilai";
		$data['siswa'] = $this->M_siswa->getsiswa();
		$data['mapel'] = $this->M_mapel->getmapel();
		$this->load_template('nilai/form_tambah_nilai',$data);
	}
	public function act_tambah(){
		$this->form_validation->set_rules('id_siswa', 'Nama Siswa', 'required');
		$this->form_validation->set_rules('id_mapel', 'Mata Pelajaran', 'required');
		$this->form_validation->set_rules('total_nilai', 'Total Nilai', 'required');

			if ($this->form_validation->run() == FALSE) {
				$this->session->set_flashdata('alert_msg',err_msg( validation_errors() ));
				redirect('nilai/add_nilai');
			} else {
				$param = $this->input->post();
				$proses= $this->M_nilai->act_tambah($param);
				if ($proses>=0) {
					$this->session->set_flashdata('alert_msg',succ_msg("nilai Berhasil diinputkan"));
					redirect('nilai');
				}
				else {
					$this->session->set_flashdata('alert_msg',err_msg("nilai Gagal diinputkan"));
					redirect('nilai/add_nilai');
				}
			}
	}

	public function edit($id){
		$data['judul'] = 'Edit nilai';
		$data['data_nilai'] = $this->M_nilai->getDetailnilai($id);
		$this->load_template('nilai/form_edit_nilai',$data);
	}

	public function act_edit(){
		$this->form_validation->set_rules('total_nilai', 'Total Nilai', 'required');

			if ($this->form_validation->run() == FALSE) {
				$this->session->set_flashdata('alert_msg',err_msg( validation_errors() ));
				redirect('nilai/edit');
			} else {

				$param = $this->input->post();
				$proses= $this->M_nilai->act_edit($param);
				if ($proses>=0) {
					$this->session->set_flashdata('alert_msg',succ_msg("nilai Berhasil diedit"));
					redirect('nilai');
				}
				else {
					$this->session->set_flashdata('alert_msg',err_msg("nilai Gagal diedit"));
					redirect($_SERVER['HTTP_REFERER']);
				}
			}
	}

	public function hapus($id=''){
		$proses= $this->M_nilai->act_hapus($id);
		if ($proses>=0) {
			$this->session->set_flashdata('alert_msg',succ_msg("nilai Berhasil dihapus"));
			redirect('nilai');
		}
		else {
			$this->session->set_flashdata('alert_msg',err_msg("nilai Gagal dihapus"));
			redirect($_SERVER['HTTP_REFERER']);
		}
	}

}

/* End of file nilai.php */
/* Location: ./application/controllers/nilai.php */