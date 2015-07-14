<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model extends MY_Model {

	public function __construct($table)
	{
		parent::__construct();
		$this->table = $table;
	}

	public function getPosts(){
		$joins = array(
			array(
				"table" => "dta_user",
				"args" => "dta_user.id = dta_post.id_user"
				)
			);

		return $this->get_join($joins, "user, content, datetime", NULL, "dta_post");
	}
}

/* End of file MyModel.php */
/* Location: ./application/models/MyModel.php */