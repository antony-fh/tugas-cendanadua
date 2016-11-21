<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Posisi extends Auth_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_posisi');
	}
	public function index()
	{
		$data['judul'] = "Data posisi";
		$data['posisi'] = $this->M_posisi->getpss();
		$data['modal_tb_posisi'] = mod('modal/md-tambah-posisi','tb-posisi',$data);
		$data['modal_up_posisi'] = mod('modal/md-edit-posisi', 'modal-update-posisi', $data);
		$this->template->view('posisi',$data);
	}
	public function act_tambah(){
		$this->form_validation->set_rules('nama', 'Nama posisi', 'required');

			if ($this->form_validation->run() == FALSE) {
				$this->session->set_flashdata('alert_msg',err_msg( validation_errors() ));
				redirect('posisi');
			} else {
				$param = $this->input->post();
				$proses= $this->M_posisi->act_tambah($param);
				if ($proses>=0) {
					$this->session->set_flashdata('alert_msg',succ_msg("Berhasil diinputkan"));
					redirect('posisi');
				}
				else {
					$this->session->set_flashdata('alert_msg',err_msg("Gagal diinputkan"));
					redirect('posisi');
				}
			}
	}

	public function edit($id){
		$data['judul'] = 'Edit posisi';
		$data['tposisi'] = $this->M_posisi->getpss();
		$data['data_posisi'] = $this->M_posisi->getDetailpss($id);
		$this->load->view("modal/md-edit-posisi",$data);
	}

	public function act_edit(){
		$this->form_validation->set_rules('nama', 'Nama posisi', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('alert_msg',err_msg( validation_errors() ));
			redirect($_SERVER['HTTP_REFERER']);
		} else {

			$param = $this->input->post();
			$proses= $this->M_posisi->act_edit($param);
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
		$proses= $this->M_posisi->act_hapus($id);
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
		$data = $this->M_posisi->getpss();
		$array = [];
		$gabungArray = [];
		foreach($data as $value){
			$gabungArray = array_merge(array_values($value), $value);
			$value[2] = 
			'<a class="btn btn-info up-posisi" data-id="'.$value["id"].'">Edit</a>
							<a class="btn btn-danger del-posisi" data-id="'.$value['id'].'" 
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
		$result = $this->M_posisi->getpss();

		$objPHPExcel = new PHPExcel(); 
		$objPHPExcel->setActiveSheetIndex(0); 
		$rowCount = 1; 
		
			$objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount, 'ID'); 
			$objPHPExcel->getActiveSheet()->SetCellValue('B'.$rowCount, 'Nama Posisi'); 
			$rowCount++; 


		foreach ($result as $value) {

			$objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount, $value['id']); 
			$objPHPExcel->getActiveSheet()->SetCellValue('B'.$rowCount, $value['nama']); 
			$rowCount++; 

		}

		$objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel); 
		$objWriter->save('./assets/excel/posisi.xlsx'); 	
		$this->load->helper('download');
		force_download('./assets/excel/posisi.xlsx',null);
	}
}

/* End of file posisi.php */
/* Location: ./application/controllers/posisi.php */