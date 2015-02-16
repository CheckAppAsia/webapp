<?php
class Prescription extends CA_Controller{
	public $layout= 'col3';
	
	public function __construct() {
		parent::__construct();
		$this->requireLogin();
	}
	
	public function create($id, $member_id)
	{
		$post = $this->input->post(); 
		$post['provider_id'] = $this->self['id']; 
		$post['appointment_id'] = $id;
		$post['member_id'] = $member_id; 
		//insert toappointment the time to start the time
		$this->load->model('document/appointment_model');

		$time = $this->appointment_model->start_consultation($post);

			$fields = '
				appointment.*,
				
				institution.name AS institution_name,
				institution.address AS institution_address,
				institution.profile_pic AS institution_profile_pic,
				
				account.email AS account_email,
				account.username AS account_username,
				
				profile.title AS profile_title,
				profile.first_name AS profile_first_name,
				profile.middle_name AS profile_middle_name,
				profile.last_name AS profile_last_name,
				profile.birthdate AS profile_birthdate,
				profile.gender AS profile_gender,
				profile.address AS profile_address,
				profile.profile_pic AS profile_profile_pic
				';
			
			$condition = array(
				$this->appointment_model->table_name.".schedule >=" => date('Y-m-d 00:00:00', strtotime('yesterday')),
				$this->appointment_model->table_name.".schedule <=" => date('Y-m-d 00:00:00', strtotime('+ 2 days')),
				$this->appointment_model->table_name.".provider_id" => $this->self['id'],
				$this->appointment_model->table_name.".id" => $id,		
				$this->appointment_model->table_name.".member_id" => $member_id,							
			);
 

		$appointment_info = $this->appointment_model->read(
				$condition,
				'institution,account,profile',
				$fields
			);

		$appointment = (array) $appointment_info;
		// debug($appointment); exit; 
		// $this->carabiner->css('dashboard/physician/appointment/list.css');
		// $this->carabiner->js('dashboard/physician/appointment/list.js');
		// $this->carabiner->css('dashboard/physician/appointment.css');
		// $this->carabiner->js('dashboard/physician/appointment.js');
		$this->carabiner->css('dashboard/select2/select2.css');
		$this->carabiner->js('dashboard/select2/select2.js');	
		$this->carabiner->js('dashboard/physician/prescription.js'); 
		$this->render('dashboard/physician/prescription/create', array(
			'topnav' => 'top_patient_consultation',
			'appointment_nav_active' => 'Prescription',
			'appointments' => array(),
			'current_user_id' => $this->self['id'],
			'appointment_id' => $id,		
			'member_id' => $member_id,					
			'time' => date("F d, Y H:i:s", strtotime($time)),
			'patient_name' => $appointment[0]->profile_first_name.' '.$appointment[0]->profile_last_name
		));

	}

	public function search()
	{
		$q = $this->input->get('q');

		$this->load->model('prescription_model');
		$result['items'] = $this->prescription_model->search_drug($q);
		echo json_encode($result);
	}
}