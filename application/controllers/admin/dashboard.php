<?php 
class Dashboard extends CA_Controller{
	public  $layout = 'admin';
	
	public function __construct() {
		parent::__construct();
		
		$this->config->load('checkapp_config');
		
		if(!$this->session->userdata('admin_logged'))
			redirect('/admin');
	}
		
	public function index(){
		$this->carabiner->css('admin/dashboard.css'); // for the layout css (temporary only)
		$this->render('admin/dashboard', array (
				'active' => 'home'
		));
    }

	public function physicians() {
    	$physicians = $this->getPhysician('retrievePhysicians');
    	$this->carabiner->css('admin/dashboard.css'); // for the layout css (temporary only)
    	$this->carabiner->css('admin/patient.css');
    	$this->carabiner->js('admin/patient.js');
    	$this->render('admin/physicians', array (
    			'physicians' => $physicians['data'],
    			'status' => $this->config->item('user_status'),
    			'active' => 'physician'
    	));
    }
    
	public function patients() {
    	$patients = $this->getPatients('retrievePatients');
    	    	
    	$this->carabiner->css('admin/dashboard.css'); // for the layout css (temporary only)
    	$this->carabiner->css('admin/patient.css');
    	$this->carabiner->js('admin/patient.js');
    	$this->render('admin/patient', array (
    		'patients' => $patients['data'],
    		'status' => $this->config->item('user_status'),
    		'active' => 'patient'
    	));
	}
    
	public function profile(){
		$this->carabiner->css('admin/dashboard.css'); // for the layout css (temporary only)
    	$this->carabiner->css('admin/profile.css');
    	$this->carabiner->js('admin/profile.js');
    	$this->render('admin/profile', array (

    	));
	}
	
	public function patient(){
		$this->carabiner->css('admin/dashboard.css'); // for the layout css (temporary only)
    	$this->carabiner->css('admin/patient.css');
    	$this->carabiner->js('admin/patient.js');
    	$this->render('admin/patient', array (

    	));
	}
}
