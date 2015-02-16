<?php
class Appointments extends CA_Controller{
	public $layout= 'col3';
	
	public function __construct() {
		parent::__construct();
		$this->requireLogin();
	}
	
	/*--------------------------------------------- LIST ---------------------------------------------*/
	
	/* VIEW_LIST
	View appointments for specific day
	-------------------------------------*/
	public function index($page=''){
		
		$previous_appointments = $this->getInstitution('appointments', array(
			'provider_id' => $this->self['id'],
			'list_type' => 'previous',
			'status' => 3,
			'institution_id' => 1,
			'user' => 'provider',
		));
		
		$today_appointments = $this->getInstitution('appointments', array(
			'provider_id' => $this->self['id'],
			'list_type' => 'today',
			'status' => array(1,2),
			'institution_id' => 1,
			'user' => 'provider',
		));
		
		$upcoming_appointments = $this->getInstitution('appointments', array(
			'provider_id' => $this->self['id'],
			'list_type' => 'upcoming',
			'status' => 1,
			'institution_id' => 1,
			'user' => 'provider',
		));
		
		$staffs = $this->getInstitution('staffs', array(
			'institution_id' => 1,
		));
		
		//echo'<pre>';print_r($today_appointments);die();
		
		error_reporting(E_ALL);
		ini_set('display_errors', 1);
		//echo'<pre>';print_r($today_appointments);die();
		
		//SAMPLE CODE FOR NEWINSTITUTION REST
		
		//$appointments = $this->getNewinstitution('appointments', array(
		//	'physician_id' => 1,
		//	'list_type' => 'upcoming',
		//	'status' => 1,
		//	'clinic_id' => 1,
		//));
		//
		//echo'<pre>';print_r($appointments);die();
		
		//$staffs = $this->getNewinstitution('staffs', array(
		//	'institution_id' => 1,
		//));
		//
		//echo'<pre>';print_r($staffs);die();
		
		//$updateAppointment = $this->postNewinstitution('updateAppointment', array(
		//	'id' => 1,
		//	'clinic_id' => 1,
		//	'status' => 1,
		//	'type' => 1,
		//));
		//
		//echo'<pre>';print_r($updateAppointment);die();
		
		//$addStaff = $this->postNewinstitution('addStaff', array(
		//	'institution_id' => 3,
		//	'provider_id' => 2,
		//	'role' => 'Assistant',
		//	'remarks' => 'Marking',
		//	'by_staff_id' => 1,
		//	'access_id' => 7,
		//	'day' => 3,
		//	'shift_start' => 5,
		//	'shift_end' => 4,
		//));
		//
		//echo'<pre>';print_r($addStaff);die();
		
		//$updateStaff = $this->postNewinstitution('updateStaff', array(
		//	'institution_id' => 5,
		//	'provider_id' => 3,
		//	'role' => 'NOT Assistant',
		//	'remarks' => 'NOT Marking',
		//	'by_staff_id' => 2,
		//	'access_id' => 2,
		//	'day' => 2,
		//	'day' => 2,
		//	'shift_start' => 2,
		//	'shift_end' => 2,
		//));
		//
		//echo'<pre>';print_r($updateStaff);die();
		
		//$institutions = $this->getNewinstitution('institutions', array(
		//	'provider_id' => 1,
		//));
		//
		//echo'<pre>';print_r($institutions);die();
		
		$this->carabiner->css('dashboard/physician/appointment/list.css');
		$this->carabiner->js('dashboard/physician/appointment/list.js');
		$this->carabiner->css('dashboard/physician/appointment.css');
		$this->carabiner->js('dashboard/physician/appointment.js');
		$this->render('dashboard/physician/appointment/list', array(
			'topnav' => 'top_appointment',
			'appointment_nav_active' => 'list',
			'appointments' => array(),
			'today_appointments' => $today_appointments->data,
			'previous_appointments' => $previous_appointments->data,
			'upcoming_appointments' => $upcoming_appointments->data,
			'staffs' => $staffs->data,
			'current_user_id' => $this->self['id'],
		));
	}
	
	public function view($id = NULL, $member_id = NULL)
	{
		$vars = $this->input->post(); 
		$post['provider_id'] = $this->self['id']; 
		$post['appointment_id'] = isset($vars['appointment_id']) ? $vars['appointment_id'] : $id;
		$post['member_id'] = isset($vars['member_id']) ? $vars['member_id'] : $member_id;	  
		
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
				$this->appointment_model->table_name.".id" => $post['appointment_id'],		
				$this->appointment_model->table_name.".member_id" => $post['member_id'],							
			);
 

		$appointment_info = $this->appointment_model->read(
				$condition,
				'institution,account,profile',
				$fields
			);

		$appointment = (array) $appointment_info;
		// debug($appointment); exit;

		$this->carabiner->css('dashboard/physician/appointment/list.css');
		$this->carabiner->js('dashboard/physician/appointment/list.js');
		$this->carabiner->css('dashboard/physician/appointment.css');
		$this->carabiner->js('dashboard/physician/appointment.js');
		$this->render('dashboard/physician/appointment/view', array(
			'topnav' => 'top_patient_consultation',
			'appointment_nav_active' => 'Overview',
			'appointments' => array(),
			'current_user_id' => $this->self['id'],
			'appointment_id' => $post['appointment_id'],
			'member_id' => $post['member_id'],
			'time' => date("F d, Y H:i:s", strtotime($time)),
			'patient_name' => $appointment[0]->profile_first_name.' '.$appointment[0]->profile_last_name
		));

	}
	
	/*--------------------------------------------- DIAGNOSE ---------------------------------------------*/
	
	/* DIAGNOSE
	Open specific appointment ID
	-------------------------------------*/
	public function diagnose($id){
		// #tid
		// $tid = $this->getMessage('retrieveTid', array(
        //     'type' => 2,
		// 	'type_id' => $id
        // ));
		// 
		// $appointmentData = $this->getPhysician('appointment', array(
		// 	'id' => $id,
		// ));
		// 
		// //$appointmentData = $this->getInstitution('appointment', array(
		// //	'id' => $this->self['id'],
		// //	'provider_id' => $id,
		// //));
		// 
		// $appointment = json_decode($appointmentData['info']);
		// $prescriptions = json_decode($appointmentData['prescriptions']);
		// $records = json_decode($appointmentData['records']);
		// 
		// $myQuestionnaire = $this->getPhysician('questionnaire', array(
		// 	'physician_id' => $this->self['id'],
		// ));
		// $myQuestionnaire = json_decode($myQuestionnaire['info']);
		// 
		// if(isset($myQuestionnaire->id)){
		// 	$questionnaireAnswers = $this->getPhysician('questionnaireAnswers', array(
		// 		'questionnaire_id' => $myQuestionnaire->id,
		// 		'patient_id' => $appointment->patient_id,
		// 	));
		// 	$questionnaireAnswers = json_decode($questionnaireAnswers['answers']);
		// }else{
		// 	$questionnaireAnswers = array();
		// }

		$appointment = $this->getInstitution('appointment', array(
			'appointment_id' => $id,
			'provider_id' => $this->self['id'],
		));


		$prescriptions = $this->getInstitution('prescription', array(
			'appdf' => $id,
			'provider_id' => $this->self['id']
		));		
		// debug($prescriptions); exit;
  
		$this->carabiner->css('dashboard/messages/inbox.css');
		$this->carabiner->css('dashboard/physician/appointment.css');
		$this->carabiner->js('dashboard/physician/appointment.js');
		$this->carabiner->css('dashboard/physician/diagnosis.css');
		$this->carabiner->js('dashboard/physician/diagnosis.js');
		// $this->render('dashboard/physician/appointment/diagnose', array(
		// 	'topnav' => 'top_appointment',
		// 	'appointment_nav_active' => '',
		// 	'appointment' => $appointment->data[0],
		// 	'prescriptions' => $prescriptions,
		// 	//'records' => $records,
		// 	//'questionnaireAnswers' => $questionnaireAnswers,
		// 	//'tid' => $tid['message']->id,
		// ));
    }
	
	/* SCHEDULE ACTIONS
	Route schedule change actions
	-------------------------------------*/
	public function saveSchedule(){
		switch($this->input->post('action')){
			case "Reschedule": $this->reschedule(); break;
			case "Update completion time": $this->endtime(); break;
			case "Hold appointment": $this->putonhold(); break;
			case "Create follow-up": $this->followup(); break;
			default: break;
		}
		redirect(base_url('dashboard/physician/appointments/'.$this->input->post('id')));
	}
	
	/* RESCHEDULE
	Action: Update schedule time
	-------------------------------------*/
	private function reschedule(){
		// [REST] Update appointment schedule
		$newSchedule = strtotime($this->input->post('schedule').' '.$this->input->post('resched_hour').':'.$this->input->post('resched_minutes').$this->input->post('resched_ampm'));
		$update = $this->postPhysician('appointment', array(
			'id' => $this->input->post('id'),
			'schedule' => date('Y-m-d H:i:s', $newSchedule),
		));
		
		// Alert results to front-end
		if($update['status']=='TRUE'){
			$this->notify(1, 'Appointment was rescheduled.');
		}else{
			$this->notify(0, $update['message']);
		}
	}
	
	/* SET END_TIME
	Action: Update end_time
	-------------------------------------*/
	private function endtime(){
		// [REST] Update appointment end_time
		$update = $this->postPhysician('appointment', array(
			'id' => $this->input->post('id'),
			'end_time' => $this->input->post('end_time'),
		));
		
		// Alert results to front-end
		if($update['status']=='TRUE'){
			$this->notify(1, 'Appointment end time was set.');
		}else{
			$this->notify(0, $update['message']);
		}
	}
	
	/* PUT ON HOLD
	Action: Put the appointment on-hold
	-------------------------------------*/
	private function putonhold(){
		// [REST] Update appointment end_time
		$update = $this->postPhysician('appointment', array(
			'id' => $this->input->post('id'),
			'status' => 3,
		));
		
		// Alert results to front-end
		if($update['status']=='TRUE'){
			$this->notify(1, 'Appointment was put on hold');
		}else{
			$this->notify(0, $update['message']);
		}
	}
	
	/* CREATE FOLLOW-UP
	Action: Determine patient_id and redirect to create form
	-----------------------------------------------------------*/
	private function followup(){
		$appointment = $this->getPhysician('appointment', array(
			'id' => $this->input->post('id'),
			'format' => 'json',
		));
		$appointment = json_decode($appointment->info);
		redirect(base_url('dashboard/physician/appointments/create').'?patient_id='.$appointment->patient_id);
		exit;
	}
	
	/* SAVE DIAGNOSIS
	Action: Save diagnosis contents
	-------------------------------------*/
	public function saveDiagnosis(){
		// Compile prescriptions
		$pres_c = $this->input->post('pres_c');
		$pres_n = $this->input->post('pres_n');
		$prescriptions = array();
		foreach($pres_c as $index=>$pres_c_Val){
			if($pres_c_Val!=''){
				$prescriptions[] = array(
					'medicine' => $pres_c_Val,
					'notes' => $pres_n[$index],
				);
			}
		}
		
		// Compile records
		$rec_c = $this->input->post('rec_c');
		$rec_n = $this->input->post('rec_n');
		$records = array();
		foreach($rec_c as $index=>$rec_c_Val){
			if($rec_c_Val!=''){
				$records[] = array(
					'name' => $rec_c_Val,
					'notes' => $rec_n[$index],
				);
			}
		}
		
		// [REST] Save diagnosis contents
		$saveDiagnosis = $this->postPhysician('diagnosis', array(
			'appointment' => $this->input->post('id'),
			'diagnosis' => $this->input->post('diagnosis'),
			'prescriptions' => $prescriptions,
			'records' => $records,
		));
		
		// Alert results to front-end
		if($saveDiagnosis['status']=='TRUE'){
			$this->notify(1, 'Successfully saved.');
		}else{
			$this->notify(0, print_r($saveDiagnosis));
		}
		redirect(base_url('dashboard/physician/appointments/'.$this->input->post('id')));
    }
	
	
	/*--------------------------------------------- DAY ---------------------------------------------*/
	
	/* VIEW_DAY
	View appointments for specific day
	-------------------------------------*/
	public function view_day($date=''){
		// Determine date that will be shown
		$selected_date = ($date!=='')?$date:date("Y-m-d");
		
		$appointments = $this->getInstitution('appointments', array(
			'provider_id' => $this->self['id'],
			'list_type' => 'date',
			'status' => array(1,2,3),
			'institution_id' => 1,
			'date_start' => $selected_date.' 00:00:00',
			'date_end' => $selected_date.' 23:59:59',
			'user' => 'provider',
		));
		
		//echo'<pre>';print_r($appointments->data);die();
		
		// Organize into an array of hours
		$full_day = false;
		$hours = array();
		foreach($appointments->data as $appointment){
			if(!isset($hours[date('H:i', strtotime($appointment->schedule))])){
				$hours[date('H:i', strtotime($appointment->schedule))] = array();
			}
			if(date('H', strtotime($appointment->schedule)) < 8 || date('H', strtotime($appointment->schedule)) >18){
				$full_day = true;
			}
			$hours[date('H:i', strtotime($appointment->schedule))][] = $appointment;
		}
		
		// Render day view
		$this->carabiner->css('dashboard/physician/appointment.css');
		$this->carabiner->js('dashboard/physician/appointment.js');
		$this->render('dashboard/physician/appointment/day', array(
			'topnav' => 'top_appointment',
			'appointment_nav_active' => 'day',
			'selected_date' => $selected_date,
			'appointments' => $hours,
			'full_day' => $full_day,
		));
    }
	
	
	/*--------------------------------------------- CALENDAR ---------------------------------------------*/
	
	/* VIEW_MONTH
	Calendar view of specific month
	-------------------------------------*/
	public function view_month(){
		$this->carabiner->js('_util/ajax.js');
		$this->carabiner->js('_util/alert_r.js');
		
		// Render calendar
		$this->carabiner->css('dashboard/physician/appointment.css');
		$this->carabiner->js('dashboard/physician/appointment.js');
		$this->render('dashboard/physician/appointment/month', array(
			'topnav' => 'top_appointment',
			'appointment_nav_active' => 'month',
		));
	}
	
	public function load_month($month=''){
		// Determine month that will be shown
		$selected_month = ($month!=='')?$month:date("Y-m");
		
		// Fetch appointments on that month
		$lastDayOfMonth = date("t", strtotime($selected_month.'-01'));
		
		$appointments = $this->getInstitution('appointments', array(
			'provider_id' => $this->self['id'],
			'list_type' => 'month',
			'month_start' => $selected_month.'-01 00:00:00',
			'month_end' => $selected_month.'-'.$lastDayOfMonth.' 23:59:59',
			'status' => array(1,2,3),
			'institution_id' => 1,
			'user' => 'provider',
		));
		
		$days = array();
		foreach($appointments->data as $appointment){
			$cdate = date("d", strtotime($appointment->schedule));
			if(!isset($days[$cdate])){ $days[$cdate] = array(); }
			$days[$cdate][] = array($appointment->status, $appointment->profile_profile_pic);
		}
		
		// Return results
		$this->ajaxResponse($days);
	}
	
	
	/*--------------------------------------------- PENDING ---------------------------------------------*/
	
	/* PENDING
	List of appointments under approval
	-------------------------------------*/
	public function pending(){
	
		$pending_appointments = $this->getInstitution('appointments', array(
			'provider_id' => $this->self['id'],
			'list_type' => 'pending',
			'status' => 0,
			'institution_id' => 1,
			'user' => 'provider',
		));
		
		$this->carabiner->css('dashboard/physician/appointment.css');
		$this->carabiner->js('dashboard/physician/appointment.js');
		$this->render('dashboard/physician/appointment/pending', array(
			'topnav' => 'top_appointment',
			'appointment_nav_active' => 'pending',
			'bookings' => $pending_appointments->data,
		));
	}
	
	/* SET APPROVAL
	Action: Accept or Decline bookings
	-------------------------------------*/
	public function setApprovalStatus(){
		//$appointment = $this->getPhysician('appointment', array(
		//	'id' => $this->input->post('appointment_id')
		//));
		//$info = json_decode($appointment['info']);
		//if($this->input->post('status')==1 || $this->input->post('status')==2){
		//	
		//	$updateCall = $this->postPhysician('appointment', array(
		//		'id' => $this->input->post('appointment_id'),
		//		'status' => $this->input->post('status'),
		//	));
		//	
		//	if($updateCall['status']=='TRUE'){
		//		if($this->input->post('status')==1){
		//			#notification
		//			$this->load->library('notification');
		//			$this->notification->booking_request_accepted($info->patient_id, $this->self['id']);	
		//			$this->notify(1, 'Successfully approved the booking. It will now show on your calendar and hourly view.');
		//		}else{
		//			$this->notify(3, 'Booking rejected.');
		//		}
		//	}else{
		//		$this->notify(0, $updateCall['message']);
		//	}
		//}else{
		//	$this->notify(2, 'Action unknown. No records updated.');
		//}
		
		$appointment = $this->getInstitution('appointment', array(
			'appointment_id' => $this->input->post('appointment_id'),
			'provider_id' => $this->self['id'],
		));
		if(isset($appointment->data) && !empty($appointment->data)){
			#Appointment found
			$updateAppointment = $this->postInstitution('updateAppointment', array(
				'id' => $this->input->post('appointment_id'),
				'status' => $this->input->post('status'),
			));
			redirect(base_url('dashboard/physician/appointments/pending'));
		}else{
			#Invalid appointment / Appointment not found
			redirect(base_url('dashboard/physician/appointments/pending'));
		}
		//echo '<pre>';print_r($appointment);die();
		//redirect(base_url('dashboard/physician/appointments/pending'));
	}
	
	
	/*--------------------------------------------- AVAILABILITY ---------------------------------------------*/
	
	/* SETTINGS
	Render page for physician work hours settings
	--------------------------------------------------*/
	public function availability(){
		$availability = $this->getPhysician('availability', array(
			'physician_id' => $this->self['id'],
			'format' => 'json',
		));
		
		// Check if availability was returned
		if(!isset($availability->availability->physician_id)){
			// No availaibilty record returned, not in DB yet, add one now
			$availability = $this->postPhysician('availability', array(
				'mode' => 'create',
				'physician_id' => $this->self['id'],
				'format' => 'json',
			));
		}
		
		// Import assets and Render the page
		$this->carabiner->css('dashboard/physician/appointment.css');
		//$this->carabiner->js('_util/selectable/jquery-1.js');
		$this->carabiner->js('_util/selectable/jquery_004.js');
		$this->carabiner->js('_util/selectable/jquery.js');
		$this->carabiner->js('dashboard/physician/availability.js');
		$this->render('dashboard/physician/appointment/availability', array(
			'topnav' => 'top_appointment',
			'appointment_nav_active' => 'availability',
			'availability' => $availability->availability,
		));
	}
	
	/* [ACTION] SAVE SETTINGS
	Save-and-Redirect page for updating settings
	--------------------------------------------------*/
	public function saveAvailability(){
		$updateAvailability = $this->postPhysician('availability', array(
			'mode' => 'update',
			'physician_id' => $this->self['id'],
			'hour_start' => $this->input->post('hour_start'),
			'hour_end' => $this->input->post('hour_end'),
			'avail_mon' => $this->input->post('day_mon'),
			'avail_tue' => $this->input->post('day_tue'),
			'avail_wed' => $this->input->post('day_wed'),
			'avail_thu' => $this->input->post('day_thu'),
			'avail_fri' => $this->input->post('day_fri'),
			'avail_sat' => $this->input->post('day_sat'),
			'avail_sun' => $this->input->post('day_sun'),
			'format' => 'json',
		));
		
		if($updateAvailability['status']=='TRUE'){
			$this->notify(1, 'Successfully saved your availability settings');
		}else{
			$this->notify(0, $updateAvailability['message']);
		}
		redirect(base_url('dashboard/physician/appointments/availability'));
	}
	
	
	/*--------------------------------------------- CREATE ---------------------------------------------*/
	
	/* [PAGE] CREATE APPOINTMENT
	Physician creates appointment for patient
	--------------------------------------------------*/
	public function create(){
		if($this->input->get('patient_id')){
			$patient_data = $this->getUser('GetFullUserInfo', array(
				'id' => $this->input->get('patient_id'),
				'format' => 'json',
			));
			$patient = json_decode($patient_data->uprofile);
			$patient = $patient[0];
		}else{
			$patient = false;
		}
		
		// Import assets and Render the page
		$this->carabiner->css('dashboard/physician/appointment.css');
		$this->carabiner->js('dashboard/physician/appointment.js');
		$this->render('dashboard/physician/appointment/create', array(
			'topnav' => 'top_appointment',
			'appointment_nav_active' => 'create',
			'patient' => $patient,
		));
	}
	
	/* [ACTION] CREATE SUBMIT
	Save the new appointment
	--------------------------------------------------*/
	public function createSubmit(){
		$followupsched = strtotime($this->input->post('followup_time').' '.$this->input->post('follow_hour').':'.$this->input->post('follow_minutes').$this->input->post('follow_ampm'));
		
		// [REST] Create follow-up appointment
		$makeAppointment = $this->postPatients('makeappointment', array(
			'physician_id' => $this->self['id'],
			'patient_id' => $this->input->post('patient_id'),
			'schedule' =>  date('Y-m-d H:i:s', $followupsched),
			'patient_note' => $this->input->post('notes'),
			'status' => 1,
			'format' => 'json',
		));
		
		// Alert results to front-end
		if($makeAppointment['status'] == 'TRUE'){
			$this->notify(1, 'Appointment was created');
		}else{
			$this->notify(0, $makeAppointment->message);
		}
		
		// Redirect specifics
		if($this->input->post('redirect')){
			redirect(base_url($this->input->post('redirect')));
		}else{
			redirect(base_url('dashboard/physician/appointments'));
		}
	}
	
	/* [ACTION] TRANSFER APPOINTMENT
	Transfer appointment
	--------------------------------------------------*/
	public function transferAppointment(){
		$updateAppointment = $this->postInstitution('updateAppointment', array(
			'id' => $this->input->post('appointment_id'),
			'provider_id' => $this->input->post('provider_id'),
			'status' => 1,
		));
		redirect(base_url('dashboard/physician/appointments'));
	}
	
	/* [ACTION] UPDATE APPOINTMENT STATUS
	Transfer appointment
	--------------------------------------------------*/
	public function appointmentchangestatus(){
		$updateAppointment = $this->postInstitution('updateAppointment', array(
			'id' => $this->input->post('appointment_id'),
			'status' => $this->input->post('status'),
		));
		//print_r($updateAppointment);
		redirect(base_url('dashboard/physician/appointments'));
	}
	
	
	/* Static PAGE
	Subjective diagnostic
	--------------------------------------------------*/
	public function subjective(){
		$this->carabiner->css('dashboard/physician/appointment.css');
		$this->carabiner->css('dashboard/physician/subjective.css');
		$this->carabiner->js('dashboard/physician/subjective.js');
		$this->render('dashboard/physician/appointment/subjective', array(
			'topnav' => 'top_appointment',
			'appointment_nav_active' => '',
		));
	}
	
	/* Static PAGE
	Objective diagnostic
	--------------------------------------------------*/
	public function objective(){
		$this->carabiner->css('dashboard/physician/appointment.css');
		$this->carabiner->css('dashboard/physician/objective.css');
		$this->carabiner->js('dashboard/physician/objective.js');
		$this->render('dashboard/physician/appointment/objective', array(
			'topnav' => 'top_appointment',
			'appointment_nav_active' => '',
		));
	}
	
	/* Static PAGE
	Assessment diagnostic
	--------------------------------------------------*/
	public function assessment(){
		$this->carabiner->css('dashboard/physician/appointment.css');
		$this->carabiner->css('dashboard/physician/assessment.css');
		$this->carabiner->js('dashboard/physician/assessment.js');
		$this->render('dashboard/physician/appointment/assessment', array(
			'topnav' => 'top_appointment',
			'appointment_nav_active' => '',
		));
	}
	
	/* Static PAGE
	Plan diagnostic
	--------------------------------------------------*/
	public function plan(){
		$this->carabiner->css('dashboard/physician/appointment.css');
		$this->carabiner->css('dashboard/physician/plan.css');
		$this->carabiner->js('dashboard/physician/plan.js');
		$this->render('dashboard/physician/appointment/plan', array(
			'topnav' => 'top_appointment',
			'appointment_nav_active' => '',
		));
	}
}