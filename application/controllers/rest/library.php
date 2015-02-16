<?php
require(APPPATH.'libraries/REST_Controller.php');
class Library extends REST_Controller {
	
	/* [GET] ten
	Get list of ICD-10 entries
	----------------------------------------------------------*/
	public function ten_get(){
		try {
			$this->load->model('icd_model','IM');
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
	
	/* [GET] countries
	Get list of all countries
	----------------------------------------------------------*/
	public function countries_get(){
		try {
			$this->load->model('library/country_model');
			$allCountries = $this->country_model->read();
			
			$this->response(array(
				'status' => TRUE,
				'data' => $allCountries,
			));
		}catch(Exception $e){
			$this->response(array(
				'status' => FALSE,
				'message' => $e->getMessage(),
			));
		}
	}
}