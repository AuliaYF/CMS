<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {
	private $data = array();

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Model', 'model', FALSE, 'app_menu');
	}
	
	protected function callView($data = NULL){
		$data = $data === NULL ? $this->data : $data;
		$this->load->view('main', $data);
	}

}

/* End of file MY_Controller.php */
/* Location: ./application/core/MY_Controller.php */