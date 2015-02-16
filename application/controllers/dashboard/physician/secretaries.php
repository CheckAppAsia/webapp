<?php
class Secretaries extends CA_Controller{
	public $layout = 'col3';
	
	public function __construct() {
		parent::__construct();
		$this->requireLogin();
	}
		
	public function index(){
		$this->render('dummy', array(
			'content'=>'Manage secretaries here',
		));
    }
	
}