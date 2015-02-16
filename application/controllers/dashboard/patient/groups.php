<?php
class Groups extends CA_Controller{
	public $layout = 'col3';
	
	public function index(){
		$this->carabiner->css('dashboard/patient/group/all.css');
		$this->carabiner->js('dashboard/patient/group/all.js');
		$this->render('dashboard/patient/group/all', array(
			'topnav' => 'top_patient_group',
		));
	}
}