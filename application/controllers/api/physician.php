<?php
class Physician extends API_Controller {

	public function __construct() {
		parent::__construct();
	}
	
	public function colleagues() {
		$vars = array();
		$vars['user_id'] = $this->inputData['physicianId'];
	
		$result = $this->getPhysician('getColleague', $vars);
		
		if($result['status'] == 'FALSE') {
			$this->addResponse(array('status' => 'false', 'message' => 'Error on Retrieving Colleagues.'));
		} else {
			$this->addResponse(array('status' => 'True', 'message' => 'Colleagues Retrieved', 'profileData' => (array)json_decode($result['data'])));
		}
	
		$this->jsonOutput();
	}
	
	public function appointments() {
		$vars = array();
		$vars['physician_id'] = $this->inputData['physicianId'];
		$vars['status'] = 0;
		
		$result = $this->getPhysician('appointments', $vars);
		
		if($result['status'] == 'FALSE') {
			$this->addResponse(array('status' => 'false', 'message' => 'Error on Retrieving Appointments.'));
		} else {
			$this->addResponse(array('status' => 'True', 'message' => 'Appointments Retrieved', 'appointments' => (array)json_decode($result['data'])));
		}
	}
	
	public function patients() {
		$vars = array();
		$vars['physician_id'] = $this->inputData['physicianId'];
		$vars['status'] = 0;
		
		$result = $this->getPhysician('patients', $vars);
		
		if($result['status'] == 'FALSE') {
			$this->addResponse(array('status' => 'false', 'message' => 'Error on Retrieving Patients.'));
		} else {
			$this->addResponse(array('status' => 'True', 'message' => 'Patients Retrieved', 'patients' => (array)json_decode($result['data'])));
		}
	}
	
	
	public function profile() {
		$vars = array();
		$vars['username'] = $this->inputData['username'];
	
		$result = $this->getUser('GetFullUserInfo', $vars);
		if($result['status'] == 'FALSE') {
			$this->addResponse(array('status' => 'false', 'message' => 'Error on Retrieving Profile.'));
		} else {
			$this->addResponse(array('status' => 'True', 'message' => 'Profile Retrieved', 'profileData' => (array)json_decode($result['uprofile'])));
		}
	
		$this->jsonOutput();
	}
}