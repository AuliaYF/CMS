<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if(!function_exists("display_children")){
	function display_children($parent, $level, $mode = 2) {
		$CI =& get_instance();
		$current = $CI->uri->segment(1);
		$result = $CI->db->query("SELECT a.id, a.name, a.target, Deriv1.Count, a.id_module as mode FROM `app_menu` a  LEFT OUTER JOIN (SELECT id_parent, COUNT(*) AS Count FROM `app_menu` GROUP BY id_parent) Deriv1 ON a.id = Deriv1.id_parent WHERE a.id_parent=".$parent." and a.id_module=".$mode)->result_array();
		$dropdown = $level > 0 ? "class=\"dropdown-menu\"" : "class=\"nav navbar-nav\"";
		echo "<ul $dropdown>";
		foreach($result as $row){
			$active = $current === $row['target'] ? "class=\"active\"" : NULL;
			if ($row['Count'] > 0) {
				echo "<li class=\"dropdown\"><a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\" role=\"button\" aria-haspopup=\"true\" aria-expanded=\"false\">".$row['name']." <span class=\"caret\"></span></a>";
				display_children($row['id'], $level + 1, $row['mode']);
				echo "</li>";
			} elseif ($row['Count']==0) {
				echo "<li $active><a href='" . site_url($row['target']) . "'>" . $row['name'] . "</a></li>";
			} else;
		}
		echo "</ul>";
	}
}

if(!function_exists("table_menu")){
	function table_menu($parent, $level) {
		$CI =& get_instance();
		$result = $CI->db->query("SELECT a.id, a.name, a.target, Deriv1.Count, a.order FROM `app_menu` a  LEFT OUTER JOIN (SELECT id_parent, COUNT(*) AS Count FROM `app_menu` GROUP BY id_parent) Deriv1 ON a.id = Deriv1.id_parent WHERE a.id_parent=".$parent)->result_array();
		$padding = $level > 0 ? "style=\"padding-left: 30px\"" : "";
		$color = $level > 0 ? "<p class=\"text-success\">" : "<p class=\"text-primary\">";

		$count = $level;
		foreach($result as $row){
			$count++;
			echo "<tr>";
			if ($row['Count'] > 0) {
				echo "<td>$count</td>";
				echo "<td>".$row['name']."</td>";
				echo "<td>".$color.$row['order']."</p></td>";
				echo "<td>asd</td>";
				table_menu($row['id'], $level + 1);
			} elseif ($row['Count']==0) {
				echo "<td>".($count+1)."</td>";
				echo "<td $padding>".$row['name']."</td>";
				echo "<td>".$color.$row['order']."</p></td>";
				echo "<td>asd</td>";
			} else;
			echo "</tr>";
		}
	}
}

if(!function_exists("getBreadcrumbs")){
	function getBreadcrumbs($current = NULL){
		$CI =& get_instance();
		$activeFunction = $CI->router->fetch_method();
		$menu = $CI->db->where('target', $CI->uri->segment(1))->get('app_menu')->result();

		echo "<ol class=\"breadcrumb\">";
		if(!$menu){
			echo "<li class=\"active\">Home</li>";
		}else{
			foreach($menu as $row){
				if($row->id_parent > 0){
					$parent = $CI->db->where('id', $row->id_parent)->get('app_menu')->row();
					if(!empty($parent)){
						echo "<li><a href=\"".site_url($parent->target)."\">".$parent->name."</a></li>";	
					}
				}else{
					echo "<li><a href=\"".site_url()."\">Home</a></li>";
				}
				echo "<li><a href=\"".site_url($row->target)."\">".$row->name."</a></li>";
				if(isset($current)){
					echo "<li><a href=\"".site_url($row->target."/".$activeFunction)."\">".ucwords($activeFunction)."</a></li>";
					echo "<li class=\"active\">".ucwords($current)	."</li>";
				}else{
					echo "<li class=\"active\">".ucwords($activeFunction)	."</li>";
				}
			}
		}
		echo "</ol>";
	}
}
/* End of file global_helper.php */
/* Location: ./application/helpers/global_helper.php */