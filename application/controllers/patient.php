<?php
class Patient extends CA_Controller {
	public $layout = 'col3';
	
	/*------------------------------------------------------------------------
	------------------------- PATIENT PROFILE PAGES --------------------------
	------------------------------------------------------------------------*/
	
	/* FAMILY HISTORY
	User-specified family medical history
	-------------------------------------------------------*/
	public function family_history($username){
		
	}
	
	/* MEDICAL EXAMS
	All of Patient's diagnosis and records
	-------------------------------------------------------*/
	public function medical_exams($username){
		
	}
	
	/* MEDICAL BACKGROUND
	Patient's Medical Constants
	-------------------------------------------------------*/
	public function medical_background($username){
		
	}
	
	/* SOS CONTACT
	Patient's Emergency Contacts Page
	-------------------------------------------------------*/
	public function sos_contact($username){
		
	}
	
	/* FRIENDS
	Patient's Friends List
	-------------------------------------------------------*/
	public function friends($username){
		
	}
	
	/* SUBSCRIPTIONS
	List of Physicians subscribed to
	-------------------------------------*/
	public function subscriptions($username){
		
	}
	
	
	/*------------------------------------------------------------------------
	------------------------- GLOBAL PATIENT ACTIONS -------------------------
	------------------------------------------------------------------------*/
	
	/* BOOK APPOINTMENT
	Direct create, no blocking since physician will approve
	-------------------------------------------------------*/
	public function book(){
		try {
			// Fetch physician's availability settings
			$availability = $this->getPhysician('availability', array(
				'physician_id' => $this->input->post('physician_id'),
				'format' => 'json',
			));
			
			// Check if availability was returned
			if(!isset($availability->availability->physician_id)){
				// If there's no physician availability yet, defaults to 8am-5pm
				$possible_start = 8;
				$possible_end = 17;
			}else{
				// If it is set by the physician, assign to local variable
				$possible_start = $availability->availability->hour_start;
				$possible_end = $availability->availability->hour_end;
			}
			
			// Check for lowest possible schedule time
			if(date('H', strtotime($this->input->post('schedule'))) < $possible_start){
				$show_time = date('gA', strtotime($possible_start.':00'));
				throw new Exception('The physician becomes available starting '.$show_time);
			}
			
			// Check for highest possible schedule time
			if(date('H', strtotime($this->input->post('schedule'))) > $possible_end){
				$show_time = date('gA', strtotime($possible_end.':00'));
				throw new Exception('The physician is not available from '.$show_time.' onwards');
			}
			
			// Check if physician is available on day of week
			$day = strtolower(date('D', strtotime($this->input->post('schedule'))));
			if($availability->availability->{'avail_'.$day} == 0){
				throw new Exception('The physician is not available during '.date('l', strtotime($this->input->post('schedule'))).'s');
			}
			
			// Attempt to book an appointment
			$makeAppointment = $this->postPatients('makeappointment', array(
				'physician_id' => $this->input->post('physician_id'),
				'patient_id' => $this->self['id'],
				'schedule' =>  $this->input->post('schedule'),
				'patient_note' => $this->input->post('notes'),
			));
			
			if($makeAppointment['status']=='TRUE'){
				// Success, notify
				$this->load->library('notification');
				$res = $this->notification->booking_request_made(
					$this->input->post('physician_id'),
					$this->session->userdata('user_data')['id']
				);
			}
			
			$this->ajaxResponse(array(
				'status' => 'TRUE',
			));
		}catch(Exception $e){
			$this->ajaxResponse(array(
				'status' => 'FALSE',
				'message' => $e->getMessage(),
			));
		}
	}
	
}