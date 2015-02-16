<?php
class Doctors extends CA_Controller{
	public $layout = 'pharmacy';
	
	public function __construct() {
		parent::__construct();
		// $this->requireLogin();
	}
		
	public function index(){

		

		$this->carabiner->css('dashboard/pharmacy/overview.css');
		$this->carabiner->js('dashboard/pharmacy/overview.js');
		$this->render('dashboard/pharmacy/doctors', array(
			'topnav' => 'top_pharmacy_doctors',
		));
    }
		
}