<?php
class Insurance extends CA_Controller{
	public $layout = 'col3';
	
	public function index(){
		$this->carabiner->css('dashboard/patient/insurance.css');
		$this->carabiner->js('dashboard/patient/insurance.js');
		$this->render('dashboard/patient/insurance', array(
			'topnav' => 'top_patient_insurance',
		));
	}
}