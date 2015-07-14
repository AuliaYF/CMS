<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {
	private $data = array();

	protected function callView(){
		$this->load->view('main', $this->data);
	}

}

/* End of file MY_Controller.php */
/* Location: ./application/core/MY_Controller.php */