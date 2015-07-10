<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->model("Model", "model", FALSE, "dta_post");
	}

	public function index()
	{
		echo "<script type=\"text/javascript\" src=\"".base_url('assets/js/general.js')."\"></script>";
		echo "<a href=\"#\" onclick=\"toggleLike('".site_url('dashboard/toggleLike')."', 1, 1);\" id=\"like-0\">Like</a>";
	}

	public function toggleLike($id = 0, $id_post, $user_id, $bool = 0){
		if($bool == 0){
			$res = $this->model->insert(array("id_post" => $id_post, "id_user" => $user_id, "datetime" => date("Y-m-d H:i:s")), "dta_post_like");
			if($res){
				echo $this->db->insert_id()."\nUnlike";
			}else{
				echo "$id\nLike";
			}
		}else{
			$res = $this->model->delete(array("id" => $id), "dta_post_like");
			if($res){
				echo "0\nLike";
			}else{
				echo "$id\nUnlike";
			}
		}
	}
}

/* End of file Dashboard.php */
/* Location: ./application/controllers/Dashboard.php */