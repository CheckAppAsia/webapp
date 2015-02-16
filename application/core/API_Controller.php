<?php
class API_Controller extends CI_Controller {
	
	protected $inputData;
	protected $response = array();
	private $SessionTimeoutInterval = 10;
	
	public function __construct() {
		parent::__construct();
		$this->getInput();
		
// 		if(!isset($this->inputData['sessionId']))
// 			$this->createSession();
	}
	
	protected function getInput() {
		if(isset($_POST) && count($_POST) > 0) {
			$this->inputData = $_POST;
		} else {
			$this->inputData = $_GET;
		}
	}
	
	protected function addResponse($msg) {
		$this->response = array_merge($this->response, $msg);
	}
	
	public function jsonOutput(){
		if($this->uri->segment(1) == 'api') {
			header('Cache-Control: no-cache, must-revalidate');
			header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
			header('Content-type: application/json');
			echo json_encode($this->response);
			exit;
		}

		return;
	}
	
	protected function createSession($userId, $userType) {
		if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
			$ip = $_SERVER['HTTP_CLIENT_IP'];
		} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
			$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
		} else {
			$ip = $_SERVER['REMOTE_ADDR'];
		}
		
		$sessionId = md5(uniqid(time(), TRUE));
		$userdata = array(
			'session_id' 	=> $sessionId,
			'ip_address' 	=> $ip,
			'user_agent' 	=> $userId,
			'datetime_created'	=> date('Y-m-d H:i:s'),
			'expiration' 	=> date('Y-m-d H:i:s',strtotime("+{$this->SessionTimeoutInterval} minutes"))
		);
		
		$this->load->model('user_activity_model');
		$insertId = $this->user_activity_model->add('userActivity', $userdata);
		
		if(!$insertId)
			return false;
		
		return $sessionId;
	}
	
	protected function checkSession() {
		$this->load->model('user_activity_model');
		
		$data['session_id'] = $this->inputData['session_id'];
		$sessData = $this->user_activity_model->get('userActivity', $data);
		
		if(!is_array($data))
			return FALSE;
		
		$curr = time();
		$exp = strtotime($sessData['expiration']);
		
		if($curr > $exp) 
			return FALSE;
		
		$updateData['expiration'] = date('Y-m-d H:i:s',strtotime("+{$this->SessionTimeoutInterval} minutes"));
		
		$this->user_activity_model->update('userActivity', $data, $updateData);
		
		return TRUE;
	}
	
	protected function destroySession() {
		$this->load->model('user_activity_model');
		$data['session_id'] = $this->inputData['session_id'];
		
		$this->user_activity_model->delete('userActivity', $data);
	}
	
	
	/*------------------------------------------------------------------------
	 ----------------------------- REST HELPERS -------------------------------
	------------------------------------------------------------------------*/
	
	/* CALL FUNNEL
	 Organizes REST call requests and sends to baseRest
	-------------------------------------------------------*/
	protected function __call($funcName, $args) {
		// Determine REST Method and Call name
		if(strpos($funcName,'post')===0){
			$apiType = substr($funcName, 4);
			$reqMeth = 'post';
		}else if(strpos($funcName,'get')===0){
			$apiType = substr($funcName, 3);
			$reqMeth = 'get';
		}
	
		// If REST Method and Call name are recognized
		if(isset($apiType) && isset($reqMeth)){
			// Check for REST URI Constant
			$apiConstant = 'REST_'.strtoupper($apiType).'_URL';
			if(!defined($apiConstant)){
				echo 'Unknown REST Constant: '.$apiConstant; die();
			}
				
			// Send to executor and return response
			return $this->baseRest('rest'.$apiType, constant($apiConstant), $reqMeth, $args[0], $args[1]);
		}else{
			// Function name not recognized
			echo 'Unknown function $this->'.$funcName.'();'; die();
		}
	}
	
	/* BASE REST
	 Initializes and executes requested REST call
	-------------------------------------------------------*/
	private function baseRest($varName, $apiUrl, $meth, $func, $data){
		if(!isset($this->$varName)){
			$this->load->library('Rest', array('server' => $apiUrl), $varName);
		}
		return $this->$varName->$meth($func, $data);
	}
}