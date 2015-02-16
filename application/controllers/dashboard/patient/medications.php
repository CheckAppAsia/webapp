<?php
class Medications extends CA_Controller{
	public $layout = 'col3';
	
	public function index(){
		$medications = $this->getPatients('medication', array(
			'patient_id' => $this->self['id'],
			'format' => 'json',
		));
		$this->carabiner->css('dashboard/patient/medications.css');
		$this->carabiner->js('dashboard/patient/medications.js');
		$this->render('dashboard/patient/medications', array(
			'medications' => $medications->medications,
		));
	}
	
}