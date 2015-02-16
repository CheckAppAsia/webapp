<?php
class Signup extends API_Controller {
	
	public function __construct() {
		parent::__construct();
	}
	
	public function index() {
		$vars = array();
		
		$result = $this->validate($this->inputData);
		
		if(!$result['status']) {
			$this->addResponse(array('status' => 'false', 'message' => $result['message']));
		} else {
			$vars['type'] = $this->inputData['user_type'];
			$vars['username'] = $this->inputData['username'];
			$vars['password'] = $this->inputData['password'];
			$vars['email'] = $this->inputData['email'];
			$vars['first_name'] = $this->inputData['first_name'];
			$vars['last_name'] = $this->inputData['last_name'];
			
			$result = $this->postUser('signup', $vars);
			
			log_message('debug', '[api signup] index result = '.print_r($result, true));
		
			if(!$result['status']) 
				$this->addResponse(array('status' => 'false', 'message' => 'Failed Registration.'));
			else
				$this->addResponse(array('status' => 'true', 'message' => 'Successful Registration.'));
		}
		
		$this->jsonOutput();
	}
	
	private function validate($params) {
		$returnFlag = true;
		$errorMessage = '';
		
		if(!isset($params['user_type'])) {
			$returnFlag = false;
			$errorMessage = 'Invalid Parameters';
		}
		if(!isset($params['username'])) {
			$returnFlag = false;
			$errorMessage = 'Invalid Parameters';
		}
		if(!isset($params['password'])) {
			$returnFlag = false;
			$errorMessage = 'Invalid Parameters';
		}
		if(!isset($params['email'])) {
			$returnFlag = false;
			$errorMessage = 'Invalid Parameters';
		}
		if(!isset($params['first_name'])) {
			$returnFlag = false;
			$errorMessage = 'Invalid Parameters';
		}
		if(!isset($params['last_name'])) {
			$returnFlag = false;
			$errorMessage = 'Invalid Parameters';
		}
		
		$result = $this->getUser('userAccountDetails', array (
				'email' => $params['email']
				));
			
		if(count($result['data'])) {
			$returnFlag = false;
			$errorMessage = 'Email already exists.';
		}
		
		$return = array('status' => $returnFlag, 'message' => $errorMessage);
		
		return $return;
	}
}