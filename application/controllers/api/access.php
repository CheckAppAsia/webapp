<?php
class Access extends API_Controller {
	
	public function __construct() {
		parent::__construct();
	}
	
	public function login() {
		$vars = array();
		$vars['userlogin'] = $this->inputData['username'];
		$vars['password'] = $this->inputData['password'];
		
		$result = $this->postUser('login', $vars);
		
 		if(!$result['status']==TRUE) 
			$this->addResponse(array('status' => 'false', 'message' => 'Invalid login credentials.'));
		else {
			$returnArr['data'] = (array) $result['data'];
			$returnArr['status'] = 'true';
// 			$returnArr = array(
// 					'status' => 'true',
// 					'username' => $result['data']['username'],
// 					'user_type' => $result['data']['type'],
// 					'user_id' => $result['data']['id'],
// 					'first_name' => $result['data']['first_name'],
// 					'middle_name' => $result['data']['middle_name'],
// 					'last_name' => $result['data']['last_name']
// 			);
			
			$this->addResponse($returnArr);
		}
		
		$this->jsonOutput();
	}
	
	public function logout() {
		$this->addResponse(array('status' => 'True', 'message' => 'Logout Success'));
		
		$this->jsonOutput();
	}
}
