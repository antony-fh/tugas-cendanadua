<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai extends Auth_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_pegawai');
		$this->load->model('M_kota');
		$this->load->model('M_kelamin');
		$this->load->model('M_posisi');
	}
	public function index()
	{
		$data['judul'] = "Data Pegawai";
		$data['tkota'] = $this->M_kota->getkt();
		$data['tposisi'] = $this->M_posisi->getpss();
		$data['tpegawai'] = $this->M_pegawai->getpgw();
		$data['modal_tb_pegawai'] = mod('modal/md-tambah-pegawai','tb-pegawai',$data);
		$data['modal_up_pegawai'] = mod('modal/md-edit-pegawai', 'modal-update', $data);
		$this->template->view('pegawai',$data);
	}

	public function act_tambah(){
		$this->form_validation->set_rules('nama', 'Nama Pegawai', 'required');
		$this->form_validation->set_rules('telepon', 'Nomor Telepon', 'required');
		$this->form_validation->set_rules('kota', 'Kota', 'required');
		$this->form_validation->set_rules('Kelamin', 'Tolong dicek Lagi', 'required');
		$this->form_validation->set_rules('id_posisi', 'Posisi Anda', 'required');

			if ($this->form_validation->run() == FALSE) {
				$this->session->set_flashdata('alert_msg',err_msg( validation_errors() ));
				redirect('pegawai');
			} else {
				$param = $this->input->post();
				$proses= $this->M_pegawai->act_tambah($param);
				if ($proses>=0) {
					$this->session->set_flashdata('alert_msg',succ_msg("Pegawai Berhasil diinputkan"));
					redirect('pegawai');
				}
				else {
					$this->session->set_flashdata('alert_msg',err_msg("Gagal diinputkan"));
					redirect('pegawai');
				}
			}
	}

	public function edit($id){
		$data['judul'] = 'Edit nilai';
		$data['tkota'] = $this->M_kota->getkt();
		$data['tposisi'] = $this->M_posisi->getpss();
		$data['tpegawai'] = $this->M_pegawai->getpgw();
		$data['data_pegawai'] = $this->M_pegawai->getDetailpgw($id);
		$this->load->view("modal/md-edit-pegawai",$data);
	}

	public function act_edit(){
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('telepon', 'No Telepon', 'required');
		$this->form_validation->set_rules('id_kota', 'Kota', 'required');
		$this->form_validation->set_rules('Kelamin', 'Jenis Kelamin', 'required');
		$this->form_validation->set_rules('id_posisi', 'ID POSISI', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('alert_msg',err_msg( validation_errors() ));
			redirect($_SERVER['HTTP_REFERER']);
		} else {

			$param = $this->input->post();
			$proses= $this->M_pegawai->act_edit($param);
			if ($proses>=0) {
				$this->session->set_flashdata('alert_msg',succ_msg("Berhasil diedit"));
				redirect($_SERVER['HTTP_REFERER']);
			}
			else {
				$this->session->set_flashdata('alert_msg',err_msg("Gagal diedit"));
				redirect($_SERVER['HTTP_REFERER']);
			}
		}
	}

	public function hapus($id=''){
		$proses= $this->M_pegawai->act_hapus($id);
		if ($proses>=0) {
			$this->session->set_flashdata('alert_msg',succ_msg("Berhasil dihapus"));
			redirect($_SERVER['HTTP_REFERER']);
		}
		else {
			$this->session->set_flashdata('alert_msg',err_msg("Gagal dihapus"));
			redirect($_SERVER['HTTP_REFERER']);
		}
	}

	public function data()
	{
		$data = $this->M_pegawai->getpgw();
		$array = [];
		$gabungArray = [];
		foreach($data as $value){
			$gabungArray = array_merge(array_values($value), $value);
			$value[2] = 
			'<a class="btn btn-info up-pegawai" data-id="'.$value["id_pegawai"].'">Edit</a>
							<a class="btn btn-danger del-pegawai" data-id="'.$value['id_pegawai'].'" 
								>Hapus</a>'
			;
			$gabungArray = array_merge($gabungArray, $value);
			array_push($array, $gabungArray);
		}
		$json["data"] = $array;
		echo json_encode($json);
	}
	public function ekspor(){
		include_once './assets/PHPExcel/Classes/PHPExcel.php';
		$result = $this->M_pegawai->getpgw();

		$objPHPExcel = new PHPExcel(); 
		$objPHPExcel->setActiveSheetIndex(0); 
		$rowCount = 1; 
		
			$objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount, 'ID'); 
			$objPHPExcel->getActiveSheet()->SetCellValue('B'.$rowCount, 'Nama Pegawai'); 
			$objPHPExcel->getActiveSheet()->SetCellValue('C'.$rowCount, 'Telepon'); 

			$rowCount++; 


		foreach ($result as $value) {

			$objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount, $value['id_pegawai']); 
			$objPHPExcel->getActiveSheet()->SetCellValue('B'.$rowCount, $value['nama']); 
			$objPHPExcel->getActiveSheet()->SetCellValue('C'.$rowCount, $value['telepon']); 
			$rowCount++; 

		}

		$objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel); 
		$objWriter->save('./assets/excel/pegawai.xlsx'); 	
		$this->load->helper('download');
		force_download('./assets/excel/pegawai.xlsx',null);
	}
}

/* End of file Pegawai.php */
/* Location: ./application/controllers/Pegawai.php */