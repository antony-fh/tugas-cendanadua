<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kota extends Auth_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_kota');
	}
	public function index()
	{
		$data['judul'] = "Data Kota";
		$data['kota'] = $this->M_kota->getkt();
		$data['modal_tb_kota'] = mod('modal/md-tambah-kota','tb-kota',$data);
		$data['modal_up_kota'] = mod('modal/md-edit-kota', 'modal-update-kota', $data);
		$this->template->view('kota',$data);
	}
	public function act_tambah(){
		$this->form_validation->set_rules('nama_kota', 'Nama Kota', 'required');

			if ($this->form_validation->run() == FALSE) {
				$this->session->set_flashdata('alert_msg',err_msg( validation_errors() ));
				redirect('kota');
			} else {
				$param = $this->input->post();
				$proses= $this->M_kota->act_tambah($param);
				if ($proses>=0) {
					$this->session->set_flashdata('alert_msg',succ_msg("Berhasil diinputkan"));
					redirect('kota');
				}
				else {
					$this->session->set_flashdata('alert_msg',err_msg("Gagal diinputkan"));
					redirect('kota');
				}
			}
	}

	public function edit($id){
		$data['judul'] = 'Edit Kota';
		$data['tkota'] = $this->M_kota->getkt();
		$data['data_kota'] = $this->M_kota->getDetailkt($id);
		$this->load->view("modal/md-edit-kota",$data);
	}

	public function act_edit(){
		$this->form_validation->set_rules('nama_kota', 'Nama Kota', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('alert_msg',err_msg( validation_errors() ));
			redirect($_SERVER['HTTP_REFERER']);
		} else {

			$param = $this->input->post();
			$proses= $this->M_kota->act_edit($param);
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
		$proses= $this->M_kota->act_hapus($id);
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
		$data = $this->M_kota->getkt();
		$array = [];
		$gabungArray = [];
		foreach($data as $value){
			$gabungArray = array_merge(array_values($value), $value);
			$value[2] = 
			'<a class="btn btn-info up-kota" data-id="'.$value["id_kota"].'">Edit</a>
							<a class="btn btn-danger del-kota" data-id="'.$value['id_kota'].'" 
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
		$result = $this->M_kota->getkt();

		$objPHPExcel = new PHPExcel(); 
		$objPHPExcel->setActiveSheetIndex(0); 
		$rowCount = 1; 
		
			$objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount, 'ID'); 
			$objPHPExcel->getActiveSheet()->SetCellValue('B'.$rowCount, 'Nama Kota'); 
			$rowCount++; 


		foreach ($result as $value) {

			$objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount, $value['id_kota']); 
			$objPHPExcel->getActiveSheet()->SetCellValue('B'.$rowCount, $value['nama_kota']); 
			$rowCount++; 

		}

		$objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel); 
		$objWriter->save('./assets/excel/kota.xlsx'); 	
		$this->load->helper('download');
		force_download('./assets/excel/kota.xlsx',null);
	}
}

/* End of file Kota.php */
/* Location: ./application/controllers/Kota.php */