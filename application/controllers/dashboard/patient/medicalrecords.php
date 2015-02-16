<?php
class medicalrecords extends CA_Controller{
	public $layout = 'col3';
	
	public function index(){
		$this->carabiner->css('dashboard/patient/medicalrecords.css');
		$this->carabiner->js('dashboard/patient/medicalrecords.js');
		$this->render('dashboard/patient/medicalrecords', array(
			'topnav' => 'top_patient_medicalrecords',
		));
	}
	
	
	
}