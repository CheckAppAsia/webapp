<?php
class Member extends API_Controller {
	
	public function __construct() {
		parent::__construct();
	}
	
	public function editProfile() {
		$vars = array();
		$vars['id'] = $this->inputData['userId'];
		$vars['title'] = $this->inputData['title'];
		$vars['first_name'] = $this->inputData['firstName'];
		$vars['middle_name'] = $this->inputData['middleName'];
		$vars['last_name'] = $this->inputData['lastName'];
		$vars['birthdate'] = $this->inputData['birthdate'];
		$vars['gender'] = $this->inputData['gender'];
		$vars['language'] = $this->inputData['language'];
		$vars['ethnicity'] = $this->inputData['ethnicity'];
		$vars['race'] = $this->inputData['race'];
		$vars['religion'] = $this->inputData['religion'];
		$vars['marital'] = $this->inputData['marital'];
		$vars['address'] = $this->inputData['address'];
		$vars['city'] = $this->inputData['city'];
		$vars['state'] = $this->inputData['state'];
		$vars['country'] = $this->inputData['country'];
		$vars['location'] = $this->inputData['location'];
		$vars['profile_pic'] = $this->inputData['profile_pic'];
		$vars['coord_lat'] = $this->inputData['coord_lat'];
		$vars['coord_lng'] = $this->inputData['coord_lng'];
		
		$result = $this->postMember('profile', $vars);
		
		if($result['success'] != 1)
			$this->addResponse(array('status' => 'false', 'message' => 'Error on Updating Profile.'));
		else
			$this->addResponse(array('status' => 'true', 'message' => 'Successful on Updating Profile.'));
		
		$this->jsonOutput();
	}
	
	public function appointments() {
		$vars = array();
		$vars['patient_id'] = $this->inputData['userId'];
		
		$result = $this->getMember('appointments', $vars);
		
		$this->addResponse(array('status' => 'true', 'message' => 'Appointments Retrieved.', 'appointments' => (array) json_decode($result['appointments'])));
		
		$this->jsonOutput();
	}
	
	public function setAppointment() {
		$vars = array();
		$vars['clinic_id'] = $this->inputData['clinic_id'];
		$vars['patient_id'] = $this->inputData['patient_id'];
		$vars['physician_id'] = $this->inputData['physician_id'];
		$vars['type'] = $this->inputData['type'];
		$vars['schedule'] = $this->inputData['schedule'];
		$vars['status'] = ($this->inputData['status'] ? $this->inputData['status'] : 0);
		
		$results = $this->postMember('appointment', $vars);
		
		if($results['status'] == 'FALSE') 
			$this->addResponse(array('status' => 'False', 'message' => 'Error on setting appointment.'));
		else
			$this->addResponse(array('status' => 'True', 'message' => 'Appointment scheduled.'));
		
		$this->jsonOutput();
	}
	
	public function friends() {
		$vars = array();
		$vars['user_id'] = $this->inputData['user_id'];
		$vars['user_type'] = $this->inputData['user_type'];
		$vars['type'] = $this->inputData['type'];
		
		$result = $this->getSocial('friend', $vars);
			
		$this->addResponse(array('status' => 'True', 'message' => 'Friends List Retrieved', 'friendsData' => $result['data']));
		
		$this->jsonOutput();
	}
	
	public function profile() {
		$vars = array();
		$vars['username'] = $this->inputData['username'];
	
		$result = $this->getUser('fullUserInfo', $vars);
		
		if($result['status'] == 'FALSE') {
			$this->addResponse(array('status' => 'false', 'message' => 'Error on Retrieving Profile.'));
		} else {
			$this->addResponse(array('status' => 'True', 'message' => 'Profile Retrieved', 'profileData' => (array)$result['data']));
		}
	
		$this->jsonOutput();
	}
}