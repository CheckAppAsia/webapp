<?php 
class Patient extends CA_Controller{
	public  $layout = 'admin';
	
	public function __construct() {
		parent::__construct();
	}
	
    public function viewProfile($userId){
    	$this->config->load('checkapp_config');
    	
    	$patient = $this->getPatients('patientProfile', array('id' => $userId));

    	$this->carabiner->css('admin/dashboard.css'); // for the layout css (temporary only)
    	$this->carabiner->css('admin/profile.css');
    	$this->carabiner->js('admin/profile.js');
    	$this->render('admin/patient_profile', array (
    			'patient' => json_decode($patient['profile']),
    			'status' => $this->config->item('user_status'),
    			'active' => 'patient'
    	));
    }
}
