<?php
class CB_Model extends CI_Model {
	
	public function create($data){
		$this->db->insert($this->database.'.'.$this->table_name, $data);
		return $this->db->insert_id();
	}
	
	public function read($condition=array(), $joins='', $fields='*'){
		$cmd = $this->db->select($fields)
			->from($this->database.'.'.$this->table_name);
		if(is_array($condition) || is_string($condition)){
			$cmd->where($condition);
		}else if(is_int($condition)){
			$cmd->where($this->database.'.'.$this->table_name.'.'.$this->id_field, $condition);
		}
		if($joins!=''){
			$joins = explode(',', $joins);
			$relations = $this->relations();
			foreach($joins as $table){
				$cmd->join($relations[$table][0].'.'.$table, $relations[$table][1]);
			}
		}
		return $cmd->get()->result();
	}
	
	public function update($condition=array(), $data){
		if(is_array($condition)){
			$this->db->where($condition);
		}else if(is_int($condition)){
			$this->db->where($this->id_field, $condition);
		}
		$this->db->update($this->database.'.'.$this->table_name, $data);
		return $this->db->affected_rows();
	}
	
	public function delete($condition){
		if(is_array($condition)){
			$this->db->where($condition);
		}else if(is_int($condition)){
			$this->db->where($this->id_field, $condition);
		}
		$this->db->delete($this->database.'.'.$this->table_name);
		return $this->db->affected_rows();
	}
	
	public function filter($input, $allowed){
		$fields = array();
		foreach($input as $field=>$value){
			if(in_array($field, $allowed)){
				$fields[$field] = $value;
			}
		}
		return $fields;
	}
	
}