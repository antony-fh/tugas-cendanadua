<?php
	class Template{
		protected $ci;
		public function __construct()
		{
			$this->ci = &get_instance();	
		}
		function view( $template = null, $data = null){
			if ($template!=null) {
				$data['body'] = $this->ci->load->view($template,$data,TRUE);
				$data['css'] = $this->ci->load->view('_bagian/_css.html',$data,TRUE);
				$data['js'] = $this->ci->load->view('_bagian/_js.html',$data,TRUE);
				$data['header'] = $this->ci->load->view('_bagian/_header.html',$data,TRUE);
				$data['topnav'] = $this->ci->load->view('_bagian/_topnav.html',$data,TRUE);
				$data['nav'] = $this->ci->load->view('_bagian/_nav.html',$data,TRUE);
				$data['footer'] = $this->ci->load->view('_bagian/_footer.html',$data,TRUE);
				echo $data['template'] = $this->ci->load->view('template',$data,TRUE);
			}
		}
	}
?>