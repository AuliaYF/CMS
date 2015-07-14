<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if(!function_exists("display_children")){
	function display_children($parent, $level) {
		$CI =& get_instance();
		$current = $CI->uri->segment(1);
		$result = $CI->db->query("SELECT a.id, a.name, a.target, Deriv1.Count FROM `app_menu` a  LEFT OUTER JOIN (SELECT id_parent, COUNT(*) AS Count FROM `app_menu` GROUP BY id_parent) Deriv1 ON a.id = Deriv1.id_parent WHERE a.id_parent=".$parent)->result_array();
		$dropdown = $level > 0 ? "class=\"dropdown-menu\"" : "class=\"nav navbar-nav\"";
		echo "<ul $dropdown>";
		foreach($result as $row){
			$active = $current === $row['target'] ? "class=\"active\"" : "";
			$active2 = $current === $row['target'] ? "active" : "";
			if ($row['Count'] > 0) {
				echo "<li class=\"dropdown $active2\"><a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\" role=\"button\" aria-haspopup=\"true\" aria-expanded=\"false\">".$row['name']." <span class=\"caret\"></span></a>";
				display_children($row['id'], $level + 1);
				echo "</li>";
			} elseif ($row['Count']==0) {
				echo "<li $active><a href='" . site_url($row['target']) . "'>" . $row['name'] . "</a></li>";
			} else;
		}
		echo "</ul>";
	}
}

/* End of file global_helper.php */
/* Location: ./application/helpers/global_helper.php */