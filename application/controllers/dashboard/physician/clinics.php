<?php
class Clinics extends CA_Controller{
	public $layout = 'col3';
	
	public function __construct() {
		parent::__construct();
		$this->requireLogin();
	}
		
	public function index(){
		$this->carabiner->css('dashboard/physician/clinic/list.css');
		$this->carabiner->js('dashboard/physician/clinic/list.js');
		$this->render('dashboard/physician/clinics/list',array(
			'topnav' => 'top_physician_clinics',
		));
    }
	
	public function availability(){
		$this->carabiner->css('dashboard/physician/clinic/availability.css');
		$this->carabiner->css('dashboard/physician/clinic/slider.css');
		$this->carabiner->js('dashboard/physician/clinic/slider.js');
		$this->carabiner->js('dashboard/physician/clinic/availability.js');
		$this->render('dashboard/physician/clinics/availability',array(
			'topnav' => 'top_physician_clinics',
		));
    }
	
}