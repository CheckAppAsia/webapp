<?php
class Icd_Model extends CA_Model {
	protected $ph = 'icd10_ph';
	protected $who = 'icd10_who';
	
	private $dbDriver;
		
	public function __construct() {
		parent::__construct();
		
		$this->dbDriver = $this->load->database('icd', true);
	}
	
	public function getIcd($type, $params = array()){
		$cmd = $this->dbDriver->select('*')
			->from($this->$type);
		
		if(isset($params) && count($params) > 0)
			$this->dbDriver->where($params);
			
		$query = $cmd->get();
		return $query->result();
	}
}