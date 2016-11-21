<?php 
	
	function succ_msg($value){
		$str='<div class="alert alert-success text-center" role="alert">' . $value . '</div>';

		return $str;
	}

	function warn_msg($value){
		$str='<div class="alert alert-warning text-center" role="alert">' . $value . '</div>';

		return $str;
	}

	function info_msg($value){
		$str='<div class="alert alert-info text-center" role="alert">' . $value . '</div>';

		return $str;
	}

	function err_msg($value){
		$str='<div class="alert alert-danger text-center" role="alert">' . $value . '</div>';

		return $str;
	}

	function mod($isi='', $id='', $data='') {
		$_ci = &get_instance();
		if ($isi != '') {
			$_isi = $_ci->load->view($isi, $data, TRUE);
			return '<div class="modal fade" id="' .$id .'" role="dialog">
					  <div class="modal-dialog modal-md" role="document">
					    <div class="modal-content">
					        ' .$_isi .'
					    </div>
					  </div>
					</div>';
          

		}
	}

?>