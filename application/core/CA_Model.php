<?php
class CA_Model extends CI_Model {
	
	public function add($entity, $data){
		$this->checkTable($entity);
		
		$q = $this->db->insert($this->{'tbl_'.$entity}, $data);
		
		$this->checkResult(TRUE);
		return $this->db->insert_id();
	}
	
	public function get($entity, $params=array(), $joins = array()){
		$this->checkTable($entity);
		
		$this->db->select('*')
			->from($this->{'tbl_'.$entity})
			->where($params);
		
		if(count($joins)) {
			foreach($joins as $join) {	
				$this->db->join($this->{'tbl_'.$join['table']}, $join['cond'], $join['dir']);
			}
		}
		
		$query = $this->db->get();
		log_message('debug', '[ca_model get] entity = '.$entity);
		log_message('debug', '[ca_model get] query = '.$this->db->last_query());
		log_message('debug', '[ca_model get] result = '.print_r($query->row(), true));
		return $query->row();
	}
	
	public function getPK($entity, $pk, $joins = array()){
		$this->checkTable($entity);
		
		$this->db->select('*')
			->from($this->{'tbl_'.$entity})
			->where($this->{'tbl_'.$entity}.'.'.$this->{'pk_'.$entity}, $pk);
		
		if(count($joins)) {
			foreach($joins as $join) {	
				$this->db->join($join['table'], $join['cond'], $join['dir']);
			}
		}
		
		$query = $this->db->get();
		return $query->row();
	}
	
	public function getAll($entity, $params=array(), $joins = array()){
		
		$this->checkTable($entity);
		
		$this->db->select('*')
			->from($this->{'tbl_'.$entity})
			->where($params);
			
		if(count($joins)) {
			foreach($joins as $join) {	
				$this->db->join($join['table'], $join['cond'], $join['dir']);
			}
		}
		
		$query = $this->db->get();

		return $query->result();
	}
	
	public function update($entity, $condition, $data){
		$this->checkTable($entity);
		
		if(is_array($condition)){
			$this->db->where($condition);
		}else{
			$this->db->where($this->{'pk_'.$entity}, $condition);
		}
		$res = $this->db->update($this->{'tbl_'.$entity}, $data);
		log_message('debug', '[ca_model] entity = '.$entity);
		log_message('debug', '[ca_model] query = '.$this->db->last_query());
		$this->checkResult();
		return true;
	}
	
	public function delete($entity, $condition){
		$this->checkTable($entity);

		if(is_array($condition)){
			$this->db->where($condition);
		}else{
			$this->db->where($this->{'pk_'.$entity}, $condition);
		}
		$res = $this->db->delete($this->{'tbl_'.$entity});
		
		$this->checkResult();
		return true;
	}
	
	/* OTHER FUNCTIONS
	-------------------------------*/
	public function filterInput($params){
		$postData = $params['input'];
		$allowed = explode(',', $params['allow']);
		
		$updateArray = array();
		foreach($postData as $fieldK => $fieldV){
			if(in_array($fieldK, $allowed)){
				$updateArray[ $fieldK ] = $fieldV;
			}
		}
		
		if($params['atLeastOne'] && count($updateArray)==0){
			throw new Exception('No valid input is present');
		}
		
		return $updateArray;
	}
	
	
	/* UTILITY FUNCTIONS
	-------------------------------*/
	private function checkTable($entity){
		if(!isset($this->{'tbl_'.$entity})){
			throw new Exception($entity.' is not found from '.__class__);
		}
	}
	
	private function checkResult($requiresAffected=FALSE, $affectedErrorMsg=''){
		if($this->db->_error_message()){
			throw new Exception($this->db->_error_message());
		}
		if($requiresAffected){
			$this->requiresAffected($affectedErrorMsg);
		}
	}
	
	private function requiresAffected($affectedErrorMsg){
		if($this->db->affected_rows()==0){
			throw new Exception($affectedErrorMsg);
		}
	}
	
}