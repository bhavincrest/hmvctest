<?php

	class Mdl_Db_Opration extends CI_Model { 
	
		public function __Construct() {
			parent::__Construct();
			$this->load->database();
		}
		
		public function set_table($table) {
			$this->table_name = $table;
		}
		
		public function get_list($orderby) {
		
			$args = func_get_args();
			
			$this->db->order_by($orderby);
			
			if(count($args) > 2) { 
				$limit = $args[2];
				$offset = $args[1];
				$query = $this->db->get($this->table_name,$limit,$offset);
			}
			else
			{
				$query = $this->db->get($this->table_name);
			}
			return $query->result_array();
		}
		
		public function add($data) {
			return $this->db->insert($this->table_name,$data);
		}
		
		public function update($from_with,$data) {
			$this->db->where($from_with);
			return $this->db->update($this->table_name,$data);
		}
		
		public function get_record($record_findby) {
			$this->db->where($record_findby);
			$query = $this->db->get($this->table_name);
			return $query->result_array();
		}
		
		public function get_total(){
			return $this->db->count_all($this->table_name);
		}
	
		public function delete($field,$data) {
			$this->db->where_in($field,$data);
			return $this->db->delete($this->table_name);
		}
	}

?>