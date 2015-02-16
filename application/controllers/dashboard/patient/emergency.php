<?php
class Emergency extends CA_Controller{
	public $layout = 'col3';
	
	public function __construct() {
		parent::__construct();
		$this->requireLogin();
	}
	
	/* PATIENT EMERGENCY CONTACT PROFILE
	Render form page for patient's emergency contact profile
	-------------------------------------------------------*/
	public function index(){
		// Get patient's profile
		$patient_profile = $this->getMember('profile', array('id'=>$this->self['id']));
		$emergency_contacts = $this->getMember('emergency', array('id'=>$this->self['id']));

		// Render view
		$this->carabiner->css('dashboard/patient/emergency.css');
		$this->carabiner->js('dashboard/patient/emergency.js');
		$this->render('dashboard/patient/emergency', array(
			'patient_profile' => $patient_profile->data,
			'emergency_contacts' => $emergency_contacts->data,
			'topnav' => 'top_patient_profile',
		));
    }
	
	/* ADD EMERGENCY CONTACT 
	Save medical profile data onto database
	-------------------------------------------------------*/
	public function addEmergency(){
        if($this->input->post()){
			// Call emergency REST for an attempt
            
			$emergencyRest = $this->postMember('emergency', array(
                'user_id' => $this->input->post('id'),
                'contact_type' => $this->input->post('contact_type'),
                'first_name' => $this->input->post('first_name'),
                'middle_name' => $this->input->post('middle_name'),
                'last_name' => $this->input->post('last_name'),
                'suffix' => $this->input->post('suffix'),
                'gender' => $this->input->post('gender'),
                'address_type' => $this->input->post('address_type'),
                'address' => $this->input->post('address'),
                'city' => $this->input->post('city'),
                'state' => $this->input->post('state'),
                'country' => $this->input->post('country'),
                'phonenum1' => $this->input->post('phone1'),
                'phonenum2' => $this->input->post('phone2'),
                'email' => $this->input->post('email'),
            ));
            
			// Check for save status and msgbox
			if($emergencyRest->status==TRUE){
				$this->notify(1, 'Emergency contacts successfully updated');
			}else{
				$this->notify(0, $emergencyRest->message);
			}
            
            // Redirect back to edit profile page
			redirect(base_url('dashboard/patient/emergency'));
        }
	}
	
}
