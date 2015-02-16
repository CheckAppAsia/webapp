<?php
class Patients extends CA_Controller{
	public $layout= 'col3';
	
	public function __construct() {
		parent::__construct();
		$this->requireLogin();
	}
		
	public function index(){
		$patientsRest = $this->getProvider('patients', array(
			'institution_id' => $this->institution['id'],
			'provider_id' => $this->self['id'],
		));
		
		$this->carabiner->css('dashboard/physician/patients.css');
		$this->carabiner->js('dashboard/physician/patients.js');
		$this->render('dashboard/physician/patients', array(
			'patients' => $patientsRest->data,
			'topnav' => 'top_physician_patients'
		));
    }
    
    public function add() {
    	if($this->input->post()) {
    		
    		/**
    		 * @todo change source of password for added patients
    		 */
    		
	    	$data = array(
	    			'user_type' => 1,
	    			'username' => $this->input->post('username'),
	    			'password' => $this->input->post('username'),
	    			'email' => $this->input->post('email'),
	    			'first_name' => $this->input->post('first_name'),
	    			'last_name' => $this->input->post('last_name'),
	    			'gender' => $this->input->post('gender'),
	    			'birthdate' => $this->input->post('birthdate')
	    	);
	    
	    	$checkEmail = $this->getUser('findemail', array(
	    			'email' => $data['email'],
	    	));
	    
	    	$checkUsername = $this->getUser('findusername', array(
	    			'username' => $data['username'],
	    	));
	    	
	    	if($checkEmail['available'] && $checkUsername['available']){
	    		$result = $this->postUser('signup', $data);
	    		log_message('debug', '[dashboard/physician/patient/add] result = '.print_r($result, true));
	    		
	    		if($result['status']) {
	    			log_message('debug', '[dashboard/physician/patient/add] saving patient');
	    			
	    			$patData = array('physician_id' => $this->input->post('physician_id'), 'patient_id' => $result['status']);
	    			log_message('debug', '[dashboard/physician/patient/add] saving patient data = '.print_r($patData, true));
	    			$result = $this->postPhysician('savePatient', $patData);
	    			log_message('debug', '[dashboard/physician/patient/add] result = '.print_r($result, true));
	    			$this->notify(1, 'Patient added on the list.');
	    		} else {
	    			$this->notify(0, 'Error on adding patients.');
	    		}
	    	} else {
	    		$this->notify(0, 'Patient already existing.');
	    	}
	    	
	    	redirect('/dashboard/physician/patients');
    	}
    }
    
    public function messageall() {
    	if($this->input->post()) {
    		$patients = json_decode($this->input->post('patients'));
    		
    		foreach($patients as $pat) {
    			$data['type'] = 1;
    			$data['type_id'] = 1;
    			$data['sender'] = $this->input->post('physician_id');
    			$data['receiver'] = $pat;
    			$data['subject'] = $this->input->post('subject');
    			$data['message'] = $this->input->post('send_message');
    			
    			$result = $this->getMessage('sendMessage', $data);
    		}
    		
    		$this->notify(1, 'Successfully sent messages to patients.');
    		
    		redirect('/dashboard/physician/patients');
    	}
    }
}
