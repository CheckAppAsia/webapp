<?php
class Doctors extends CA_Controller{
	public $layout = 'col3';
	
	public function index(){
		$physicians = $this->getMember('providers', array(
			'patient_id' => $this->self['id'],
		));
		$physicians->data = array();
		
		$this->carabiner->css('dashboard/patient/doctors.css');
		$this->carabiner->js('dashboard/patient/doctors.js');
		$this->render('dashboard/patient/doctors', array(
			'physicians' => $physicians->data,
			'topnav' => 'top_patient_doctors'
		));
	}
	
}
