<?php
require(APPPATH.'libraries/REST_Controller.php');
class Icd extends REST_Controller {
	
	public function __construct() {
		parent::__construct();
		$this->load->model('icd_model','IM');
	}
	
	public function ten_get(){
		try {
			$params = array();
			if($this->input->get('id') != null)
				$params['id'] = $this->input->get('id');
		
			if($this->input->get('code') != null)
				$params['code'] = $this->input->get('code');
			
			$result = $this->IM->getIcd($this->input->get('type'), $params);
			
			$this->response(array(
				'status' => 'TRUE',
				'icd_'.$this->input->get('type') => $result,
			));
		}catch(Exception $e){
			$this->response(array(
				'status' => 'FALSE',
				'message' => $e->getMessage(),
			));
		}
	}
}