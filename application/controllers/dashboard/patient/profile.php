<?php
class Profile extends CA_Controller{
	public $layout = 'col3';
	
	public function __construct() {
		parent::__construct();
		$this->requireLogin();
	}
	
	/* EDIT PATIENT PROFILE
	Render form page for updating patient's profile
	-------------------------------------------------------*/
	public function index(){
		// Get patient's profile
		$patient_profile = $this->getMember('profile', array('id'=>$this->self['id']));
		$health_profile = $this->getMember('health', array('id'=>$this->self['id']));
		// debug($patient_profile); exit;
		// $patient_profile = json_decode($patient_profile['profile']);
		
		// Render view
		$this->carabiner->css('dashboard/patient/profile/overview.css');
		$this->carabiner->js('dashboard/patient/profile/overview.js');
		$this->render('dashboard/patient/profile/overview', array(
			'patient_profile' => $patient_profile->data,
			'health_profile' => $health_profile->data,
			'topnav' => 'top_patient_profile',
		));
    }
	
	public function edit(){
		// Get patient's profile
		$patient_profile = $this->getMember('profile', array('id'=>$this->self['id']));
		$health_profile = $this->getMember('health', array('id'=>$this->self['id']));
		// $patient_profile = json_decode($patient_profile['profile']);

		// Render view
		$this->carabiner->css('dashboard/patient/profile.css');
		$this->carabiner->js('dashboard/patient/profile.js');
		$this->render('dashboard/patient/profile/edit', array(
			'patient_profile' => $patient_profile->data,
			'health_profile' => $health_profile->data,
			'topnav' => 'top_patient_profile',
		));
    }
	
	/* UPDATE MEDICAL
	Save medical profile data onto database
	-------------------------------------------------------*/
	public function updateMedical(){
		$result = $this->postMember('health', array_merge($this->input->post(), array(
			'user_id' => $this->self['id'],
		)));
		
		if($result->status){
			$this->notify(1, 'Profile successfully updated');
		}else{
			$this->notify(0, $result->message);
		}
		redirect(base_url('dashboard/patient/profile'));
	}
	
}
