<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {

	public function index()
	{
		$this->callView();
	}

	public function edit(){
		$data['breadActive'] = 'Informasi';
		$this->callView($data);
	}
}

/* End of file Home.php */
/* Location: ./application/controllers/sources/Home.php */