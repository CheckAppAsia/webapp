<?php
class Index extends API_Controller {
	
	public function __construct() {
		parent::__construct();
	}
	
	public function index() {
		$this->addResponse(array('status' => 'FALSE', 'message' => 'Restricted Access.'));
		
		$this->jsonOutput();
	}
}