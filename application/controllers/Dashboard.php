<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Model', 'model', FALSE, 'app_menu');
	}

	public function index()
	{
		$this->callView();
	}

}

/* End of file Dashboard.php */
/* Location: ./application/controllers/Dashboard.php */