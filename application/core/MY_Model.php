<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Model extends CI_Model {

	protected $table = "";
	private $DEF_SELECT = "*";

	public function __construct()
	{
		parent::__construct();
	}	

	public function get($table = NULL){
		$table = $table === NULL ? $this->table : $table;

		return $this->db->get($this->table)->result();
	}

	public function get_where($whereArgs, $table = NULL){
		$table = $table === NULL ? $this->table : $table;

		return $this->db->where($whereArgs)->get($this->table)->result();
	}

	public function get_join($joinArgs, $selectArgs = NULL, $whereArgs = NULL, $table = NULL){
		$selectArgs = $selectArgs === NULL ? $this->DEF_SELECT : $selectArgs;
		$table = $table === NULL ? $this->table : $table;

		if(is_array($selectArgs)){
			foreach ($selectArgs as $row) {
				$this->db->select($row);
			}
		}else{
			$this->db->select($selectArgs);
		}

		foreach($joinArgs as $row){
			$this->db->join($row['table'], $row['args']);
		}
		
		if($whereArgs !== NULL){
			$this->db->where($whereArgs);
		}

		return $this->db->get($this->table)->result();
	}

	public function insert($dataArgs, $table = NULL){
		$table = $table === NULL ? $this->table : $table;

		$res = $this->db->insert($table, $dataArgs);
		if($res){
			return TRUE;
		}
		return FALSE;
	}

	public function delete($whereArgs, $table = NULL){
		$table = $table === NULL ? $this->table : $table;

		$res = $this->db->delete($table, $whereArgs);
		if($res){
			return TRUE;
		}
		return FALSE;
	}
}

/* End of file MY_Model.php */
/* Location: ./application/core/MY_Model.php */