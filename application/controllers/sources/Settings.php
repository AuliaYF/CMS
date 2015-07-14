<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings extends MY_Controller {

	public function index()
	{
		$data['menu_mode'] = 1;
		$data['main_view'] = 'backend/settings';
		$this->callView($data);
	}

}

/* End of file Settings.php */
/* Location: ./application/controllers/sources/Settings.php */