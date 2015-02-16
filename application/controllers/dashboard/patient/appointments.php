<?php
class Appointments extends CA_Controller{
	public $layout = 'col3';
	
	public function incoming(){
	
		$upcoming_appointments = $this->getInstitution('appointments', array(
			'member_id' => $this->self['id'],
			'list_type' => 'upcoming',
			'status' => 1,
			'user' => 'member',
		));
		
		$this->carabiner->css('dashboard/patient/appointment/history.css');
		$this->carabiner->js('dashboard/patient/appointment/history.js');
		$this->render('dashboard/patient/appointment/incoming', array(
			'topnav' => 'top_patient_appointment',
			'appointments' => $upcoming_appointments->data,
		));
	}
	
	public function pending(){
	
		$pending_appointments = $this->getInstitution('appointments', array(
			'member_id' => $this->self['id'],
			'list_type' => 'pending',
			'status' => 0,
			'user' => 'member',
		));
		
		$this->carabiner->css('dashboard/patient/appointment/pending.css');
		$this->carabiner->js('dashboard/patient/appointment/pending.js');
		$this->render('dashboard/patient/appointment/pending', array(
			'bookings' => $pending_appointments->data,
			'topnav' => 'top_patient_appointment',
		));
	}
	
	public function history(){
	
		$history_appointments = $this->getInstitution('appointments', array(
			'member_id' => $this->self['id'],
			'list_type' => 'previous',
			'status' => 3,
			'user' => 'member',
		));
		
		$this->carabiner->css('dashboard/patient/appointment/history.css');
		$this->carabiner->js('dashboard/patient/appointment/history.js');
		$this->render('dashboard/patient/appointment/history', array(
			'appointments' => $history_appointments->data,
			'topnav' => 'top_patient_appointment',
		));
	}
	
	public function view($id){
		#tid
		$tid = $this->getMessage('retrieveTid', array(
            'type' => 2,
			'type_id' => $id
        ));
		// Uses physician REST but is allowed since we're fetching appointments
		$appointmentData = $this->getPhysician('appointment', array(
			'id' => $id,
		));
		$appointment = json_decode($appointmentData['info']);
		$prescriptions = json_decode($appointmentData['prescriptions']);
		$records = json_decode($appointmentData['records']);
		
		$this->carabiner->css('dashboard/messages/inbox.css');
		$this->carabiner->css('dashboard/patient/appointment/view.css');
		$this->carabiner->js('dashboard/patient/appointment/view.js');
		$this->render('dashboard/patient/appointment/view', array(
			'appointment' => $appointment,
			'prescriptions' => $prescriptions,
			'records' => $records,
			'tid' => $tid['message']->id
		));
	}
	
}