<?php
require(APPPATH.'libraries/REST_Controller.php');
class Physician extends REST_Controller {
	
	public function __construct() {
		parent::__construct();
		$this->load->model('physician_model','PM');
	}
	
	/*------------------------------------------------------------------------
	----------------------------- AVAILABILITY -------------------------------
	------------------------------------------------------------------------*/
	
	/*---------------------------------
	[GET] availability
	Description:
		
	Parameters:
		
	Response Object:
		
	---------------------------------*/
	public function availability_get(){
		try {
			$availability = $this->PM->getPK('availability', $this->input->get('physician_id'));
			
			$this->response(array(
				'status' => 'TRUE',
				'availability' => $availability,
			));
		}catch(Exception $e){
			$this->response(array(
				'status' => 'FALSE',
				'message' => $e->getMessage(),
			));
		}
	}
	
	/*---------------------------------
	[POST] availability
	Description:
		
	Parameters:
		
	Response Object:
		
	---------------------------------*/
	public function availability_post(){
		$this->db->trans_begin();
		try {
			if($this->input->post('mode')=='create'){
				// Add record for physician availability
				$this->PM->add('availability', array(
					'physician_id' => $this->input->post('physician_id'),
				));
			}else if($this->input->post('mode')=='update'){
				// Update record for physician
				$this->PM->update('availability', array(
					'physician_id' => $this->input->post('physician_id'),
				), array(
					'hour_start' => $this->input->post('hour_start'),
					'hour_end' => $this->input->post('hour_end'),
					'avail_mon' => $this->input->post('avail_mon'),
					'avail_tue' => $this->input->post('avail_tue'),
					'avail_wed' => $this->input->post('avail_wed'),
					'avail_thu' => $this->input->post('avail_thu'),
					'avail_fri' => $this->input->post('avail_fri'),
					'avail_sat' => $this->input->post('avail_sat'),
					'avail_sun' => $this->input->post('avail_sun'),
				));
			}else{
				throw new Exception('Unknown mode. Must say if [create] or [update].');
			}
			
			$availability = $this->PM->getPK('availability', $this->input->post('physician_id'));
			
			$this->db->trans_commit();
			$this->response(array(
				'status' => 'TRUE',
				'availability' => $availability,
			));
		}catch(Exception $e){
			$this->db->trans_rollback();
			$this->response(array(
				'status' => 'FALSE',
				'message' => $e->getMessage(),
			));
		}
	}
	
	/*------------------------------------------------------------------------
	--------------------------------- PATIENTS -------------------------------
	------------------------------------------------------------------------*/
	
	/*---------------------------------
	[GET] patients
	Description:
		Get list of specific physician's patients via appointments
	Parameters:
		
	Response Object:
		
	---------------------------------*/
	public function patients_get(){
		try {
			$patients = $this->PM->getPatientList($this->input->get('physician_id'), $this->input->get('online'));
			
			$this->response(array(
				'status' => 'TRUE',
				'patients' => json_encode($patients),
			));
		}catch(Exception $e){
			$this->response(array(
				'status' => 'FALSE',
				'message' => $e->getMessage(),
			));
		}
	}
	
	/*---------------------------------
	[POST] patient
	Description:
		Add a patient to a 
	Parameters:
		
	Response Object:
		
	---------------------------------*/
	public function patient_post(){
		
	}
	
	
	/*------------------------------------------------------------------------
	---------------------------- MEDICAL SCHOOLS ------------------------------
	------------------------------------------------------------------------*/
	
	/*---------------------------------
	[GET] schools
	Description:
		Get list of specific physician's medical schools
	Parameters:
		
	Response Object:
		
	---------------------------------*/
	public function schools_get(){
		try {
			$schools = $this->PM->getAllSchools($this->input->get('user_id'));
			
			$this->response(array(
				'status' => 'TRUE',
				'schools' => json_encode($schools),
			));
		}catch(Exception $e){
			$this->response(array(
				'status' => 'FALSE',
				'message' => $e->getMessage(),
			));
		}
	}
	
	/*---------------------------------
	[POST] school
	Description:
		Add a physician's medical school
	Parameters:
		
	Response Object:
		
	---------------------------------*/
	public function school_post(){
		try {
			$this->PM->add('school', array(
				'user_id' => $this->input->post('user_id'),
				'course' => $this->input->post('course'),
				'school_name' => $this->input->post('school_name'),
				'year_start' => $this->input->post('year_start'),
				'year_end' => $this->input->post('year_end'),
				'city' => $this->input->post('city'),
				'state' => $this->input->post('state'),
				'country_id' => $this->input->post('country_id'),
				//'honors_received' => $this->input->post('honors_received'),
				//'comments' => '',
			));
			
			$this->response(array(
				'status' => 'TRUE'
			));
			
		}catch(Exception $e){
			$this->response(array(
				'status' => 'FALSE',
				'message' => $e->getMessage(),
			));
		}
	}
	
	
	
/*---------------------------------
	[POST] specialization
	Description:
		Add a physician's medical specialization
	Parameters:
		
	Response Object:
		
	---------------------------------*/
	public function specialization_post(){
		try {
			
			if(($this->input->post('specialization_id') == "")) {
			
				$insertSpecialization = $this->PM->add('specializations', array(
						'specialization' => $this->input->post('specialization'),
						'active' => 1,
				));
				
				$this->PM->add('specialization', array(
						'physician_id' => $this->input->post('physician_id'),
						'specialization_id' => $insertSpecialization,
				));
				
			} else {
				
				$this->PM->add('specialization', array(
						'physician_id' => $this->input->post('physician_id'),
						'specialization_id' => $this->input->post('specialization_id'),
				));
				
			}
			
			$this->response(array(
				'status' => 'TRUE'
			));
			
		}catch(Exception $e){
			$this->response(array(
				'status' => 'FALSE',
				'message' => $e->getMessage(),
			));
		}
	}
	
	
	/*---------------------------------
	 [POST] affiliation
	Description:
	Add a physician's medical affiliation
	Parameters:
	
	Response Object:
	
	---------------------------------*/
	public function affiliation_post(){
		try {
				
			if(($this->input->post('affiliation_id') == "")) {
					
				$insertAffiliation = $this->PM->add('affiliations', array(
						'affiliation' => $this->input->post('affiliation'),
						'active' => 1,
				));
	
				$this->PM->add('affiliation', array(
						'physician_id' => $this->input->post('physician_id'),
						'affiliation_id' => $insertAffiliation,
				));
	
			} else {
	
				$this->PM->add('affiliation', array(
						'physician_id' => $this->input->post('physician_id'),
						'affiliation_id' => $this->input->post('affiliation_id'),
				));
	
			}
				
			$this->response(array(
					'status' => 'TRUE'
			));
				
		}catch(Exception $e){
			$this->response(array(
					'status' => 'FALSE',
					'message' => $e->getMessage(),
			));
		}
	}
	
	
	
	
/*---------------------------------
	 [POST] affiliation
	Description:
	Add a physician's medical affiliation
	Parameters:
	
	Response Object:
	
	---------------------------------*/
	public function honor_post(){
		try {
				
			$this->PM->add('honors', array(
						'honor' => $this->input->post('honor'),
						'physician_id' => $this->input->post('physician_id'),
						'school_id' => $this->input->post('school_id'),
				));
				
			$this->response(array(
					'status' => 'TRUE'
			));
				
		}catch(Exception $e){
			$this->response(array(
					'status' => 'FALSE',
					'message' => $e->getMessage(),
			));
		}
	}
	
	
	/*------------------------------------------------------------------------
	------------------------------ APPOINTMENTS ------------------------------
	------------------------------------------------------------------------*/
	
	/*---------------------------------
	[GET] upcomingAppointment
	Description:
		Get the next upcoming appointment
	Parameters:
		
	Response Object:
		
	---------------------------------*/
	public function upcomingAppointment_get(){
		try {
			$this->load->model('appointment_model','AM');
			
			$appointment = $this->AM->getUpcomingAppointment($this->input->get('physician_id'), 0);
			
			$this->response(array(
				'status' => 'TRUE',
				'info' => json_encode($appointment),
			));
		}catch(Exception $e){
			$this->response(array(
				'status' => 'FALSE',
				'message' => $e->getMessage(),
			));
		}
	}
	
	/*---------------------------------
	[GET] appointments
	Description:
		Get list of appointments (Flexible)
	Parameters:
		
	Response Object:
		
	---------------------------------*/
	public function appointments_get(){
		try {
			$this->load->model('appointment_model','AM');
			
			if($this->input->get('start')){
				// Get by Date Range
				$appointments = $this->AM->getAppointments(
					$this->input->get('physician_id'), 0,
					array(
						'type' => 'date',
						'start' => $this->input->get('start'),
						'end' => $this->input->get('end'),
					),
					$this->input->get('status')
				);
				
			}else if($this->input->get('page')){
				// Get with Pagination
				if($this->input->get('physician_id'))
					$appointments = $this->AM->getAppointments(
						$this->input->get('physician_id'), 0,
						array(
							'type' => 'page',
							'page' => $this->input->get('page'),
							'items' => 10,
						),
						$this->input->get('status')
					);
				else
					$appointments = $this->AM->getAppointments(
						0, $this->input->get('patient_id'),
						array(
							'type' => 'page',
							'page' => $this->input->get('page'),
							'items' => 10,
						),
						$this->input->get('status')
					);
				
			}else{
				$appointments = $this->AM->getAppointments(
					$this->input->get('physician_id'), 0,
					array(
						'type' => 'all',
					),
					$this->input->get('status')
				);
			}
			
			$this->response(array(
				'status' => 'TRUE',
				'data' => $appointments,
			));
		}catch(Exception $e){
			$this->response(array(
				'status' => 'FALSE',
				'message' => $e->getMessage(),
			));
		}
	}
	
	/*---------------------------------
	[GET] appointment
	Description:
		Get details including diagnosis from a specific appointment
	Parameters:
		
	Response Object:
		
	---------------------------------*/
	public function appointment_get(){
		try {
			$this->load->model('appointment_model','AM');
			
			$appointment = $this->AM->getAppointment($this->input->get('id'));
			
			$prescriptions = $this->AM->getAll('prescription', array(
				'appointment_id' => $this->input->get('id'),
			));
			
			$records = $this->AM->getAll('record', array(
				'appointment_id' => $this->input->get('id'),
			));
			
			$this->response(array(
				'status' => 'TRUE',
				'info' => json_encode($appointment),
				'prescriptions' => json_encode($prescriptions),
				'records' => json_encode($records),
			));
		}catch(Exception $e){
			$this->response(array(
				'status' => 'FALSE',
				'message' => $e->getMessage(),
			));
		}
	}
	
	/*---------------------------------
	[POST] appointment
	Description:
		Update details of a specific appointment
	Parameters:
		
	Response Object:
		
	---------------------------------*/
	public function appointment_post(){
		$this->db->trans_begin();
		try {
			$this->load->model('appointment_model','AM');
			
			// Filter input
			$update_data = $this->AM->filterInput(array(
				'input' => $this->input->post(NULL, TRUE),
				'allow' => 'schedule,end_time,patient_notes,diagnosis,status',
				'atLeastOne' => true,
			));
			
			// Update appointment
			$appointment = $this->AM->update('appointment', array(
				'id' => $this->input->post('id'),
			), $update_data);
			
			// If status was approved, add as physician
			if($this->input->post('status')==1){
				$appointmentData = $this->AM->getAppointment($this->input->post('id'));
				
				$alreadyPatient = $this->PM->get('patients', array(
					'physician_id' => $appointmentData->physician_id,
					'patient_id' => $appointmentData->patient_id,
				));
				
				if(count($alreadyPatient)===0){
					$this->PM->add('patients', array(
						'physician_id' => $appointmentData->physician_id,
						'patient_id' => $appointmentData->patient_id,
					));
				}
			}
			
			$this->db->trans_commit();
			$this->response(array(
				'status' => 'TRUE',
			));
		}catch(Exception $e){
			$this->db->trans_rollback();
			$this->response(array(
				'status' => 'FALSE',
				'message' => $e->getMessage(),
			));
		}
	}
	
	/*---------------------------------
	[POST] diagnosis
	Description:
		Set diagnosis contents of an appointment
	Parameters:
		
	Response Object:
		
	---------------------------------*/
	public function diagnosis_post(){
		$this->db->trans_begin();
		try {
			$this->load->model('appointment_model','AM');
			
			// Save diagnosis on appointment record
			$appointment = $this->AM->update('appointment', array(
				'id' => $this->input->post('appointment'),
			), array(
				'diagnosis' => $this->input->post('diagnosis'),
			));
			
			// Save prescriptions
			$prescriptions = $this->input->post('prescriptions');
			foreach($prescriptions as $prescription){
				$this->AM->add('prescription', array(
					'appointment_id' => $this->input->post('appointment'),
					'medicine' => $prescription['medicine'],
					'notes' => $prescription['notes'],
				));
			}
			
			// Save records
			$records = $this->input->post('records');
			foreach($records as $record){
				$this->AM->add('record', array(
					'appointment_id' => $this->input->post('appointment'),
					'record_name' => $record['name'],
					'notes' => $record['notes'],
				));
			}
			
			$this->db->trans_commit();
			$this->response(array(
				'status' => 'TRUE',
			));
		}catch(Exception $e){
			$this->db->trans_rollback();
			$this->response(array(
				'status' => 'FALSE',
				'message' => $e->getMessage(),
			));
		}
	}
	
	/*---------------------------------
	[POST] mutualAppointments
	Description:
		Get appointments between specific patient and spacific physician
		(Physician REST version returns relevant data to the physician)
	Parameters:
		
	Response Object:
		
	---------------------------------*/
	public function mutualAppointments_get(){
		
	}
	
	
	/*------------------------------------------------------------------------
	----------------------------- QUESTIONNAIRES -----------------------------
	------------------------------------------------------------------------*/
	
	/*---------------------------------
	[GET] questionnaire
	Description:
		Get read-only questionnaire details
	Parameters:
		
	Response Object:
		
	---------------------------------*/
	public function questionnaire_get(){
		try {
			$this->load->model('Questionnaire_Model','QM');
			
			$questionnaire = array();
			if($this->input->get('physician_id')){
				// get questionnaire by physician
				$questionnaire = $this->QM->get('questionnaire', array(
					'physician_id' => $this->input->get('physician_id'),
				));
			}else if($this->input->get('questionnaire_id')){
				// get questionnaire by ID
				$questionnaire = $this->QM->get('questionnaire', array(
					'id' => $this->input->get('questionnaire_id'),
				));
			}
			
			$questions = array();
			if($this->input->get('includeItems')){
				// get list of question IDs in this questionnaire
				$itemsArray = array();
				$items = $this->QM->getAll('item', array(
					'questionnaire_id' => $questionnaire->id,
				));
				foreach($items as $item){ $itemsArray[] = $item->question_id; }
				
				if(count($itemsArray)){
					// get questions from item IDs
					$questions = $this->QM->getQuestions($itemsArray);
				}
			}
			
			$this->response(array(
				'status' => 'TRUE',
				'info' => json_encode($questionnaire),
				'items' => json_encode($questions),
			));
		}catch(Exception $e){
			$this->response(array(
				'status' => 'FALSE',
				'message' => $e->getMessage(),
			));
		}
	}
	
	/*---------------------------------
	[GET] questionnaireAnswers
	Description:
		Get read-only questionnaire details
	Parameters:
		
	Response Object:
		
	---------------------------------*/
	public function questionnaireAnswers_get(){
		try {
			$this->load->model('Questionnaire_Model','QM');
			
			// get questionnaire items
			$itemsArray = array();
			$items = $this->QM->getAll('item', array(
				'questionnaire_id' => $this->input->get('questionnaire_id'),
			));
			foreach($items as $item){ $itemsArray[] = $item->question_id; }
			
			$answers = array();
			if(count($itemsArray)){
				// get patient's answer to the questionnaire
				$answers = $this->QM->getAnswers($this->input->get('patient_id'), $itemsArray);
			}
			
			$this->response(array(
				'status' => 'TRUE',
				'answers' => json_encode($answers),
			));
		}catch(Exception $e){
			$this->response(array(
				'status' => 'FALSE',
				'message' => $e->getMessage(),
			));
		}
	}
	
	/*---------------------------------
	[POST] questionnaire
	Description:
		Create new or Update questionnaire
		(if questionnaire_id is passed, update. else, create)
	Parameters:
		
	Response Object:
		
	---------------------------------*/
	public function questionnaire_post(){
		$this->db->trans_begin();
		try {
			$this->load->model('Questionnaire_Model','QM');
			
			if($this->input->post('questionnaire_id')){
				// questionnaire_id exists, update items
				
				// delete all current items from questionnaire
				$this->QM->delete('item', array(
					'questionnaire_id' => $this->input->post('questionnaire_id'),
				));
				
				// add all saved items from the top
				foreach($this->input->post('questions') as $question){
					// add question to the questions table
					$question_id = $this->QM->add('question', array(
						'type' => $question['type'],
						'isDefault' => 0,
						'question' => $question['question'],
					));
					
					// add question_id to the questionnaire items
					$this->QM->add('item', array(
						'questionnaire_id' => $this->input->post('questionnaire_id'),
						'question_id' => $question_id,
					));
				}
				
				// commit transaction and return success
				$this->db->trans_commit();
				$this->response(array(
					'status' => 'TRUE',
				));
			}else{
				// no questionnaire_id, create new questionnaire for physician
				$questionnaire_id = $this->QM->add('questionnaire', array(
					'physician_id' => $this->input->post('physician_id'),
					'name' => 'Default Questionnaire for Physician #'.$this->input->post('physician_id'),
					'type' => 0,
				));
				
				$questionnaire = $this->QM->get('questionnaire', array(
					'id' => $questionnaire_id,
				));
				
				// commit transaction and return new questionnaire
				$this->db->trans_commit();
				$this->response(array(
					'status' => 'TRUE',
					'info' => $questionnaire,
				));
			}
		}catch(Exception $e){
			$this->db->trans_rollback();
			$this->response(array(
				'status' => 'FALSE',
				'message' => $e->getMessage(),
			));
		}
	}
	
	/*------------------------------------------------------------------------
	--------------------------------- CLINICS --------------------------------
	------------------------------------------------------------------------*/
	
	/*---------------------------------
	[GET] clinics
	Description:
		Get list of specific physician's clinics
	Parameters:
		
	Response Object:
		
	---------------------------------*/
	public function clinics_get(){
		
	}
	
	/*---------------------------------
	[GET] clinic
	Description:
		Get details of specific clinic
	Parameters:
		
	Response Object:
		
	---------------------------------*/
	public function clinic_get(){
		
	}
	
	/*---------------------------------
	[POST] clinic
	Description:
		Create or Update a specific clinic
		(if clinic_id is passed, update. else, create)
	Parameters:
		
	Response Object:
		
	---------------------------------*/
	public function clinic_post(){
		
	}
	
	
	/*------------------------------------------------------------------------
	------------------------------- SECRETARIES ------------------------------
	------------------------------------------------------------------------*/
	
	/*---------------------------------
	[GET] secretaries
	Description:
		Get list of specific physician's secretaries
	Parameters:
		
	Response Object:
		
	---------------------------------*/
	public function secretaries_get(){
		
	}
	
	/*---------------------------------
	[GET] secretary
	Description:
		Get details of specific secretary
	Parameters:
		
	Response Object:
		
	---------------------------------*/
	public function secretary_get(){
		
	}
	
	/*---------------------------------
	[POST] secretary
	Description:
		Create or Update a specific secretary
		(if secretary_id is passed, update. else, create)
	Parameters:
		
	Response Object:
		
	---------------------------------*/
	public function secretary_post(){
		
	}
	
	/*---------------------------------
	[POST] secretaryAssign
	Description:
		Assign a specific secretary to a specific clinic
	Parameters:
		
	Response Object:
		
	---------------------------------*/
	public function secretaryAssign_post(){
		
	}
	
	
	/*------------------------------------------------------------------------
	----------------------------- LEGACY FUNCTIONS ---------------------------
	------------------------------------------------------------------------*/
	
	/**
	 * @todo remove all tab variables. must go with models
	 * 
	 */
	 
	public function retrievePhysicians_get() {
		$this->load->model('physician_model');
		
		$physicians = $this->physician_model->getAll();
				
		$result['count'] = count($physicians);
		$result['data'] = $physicians;
				
		$this->response($result);
	}
	
	public function retrievePhysician_post() {
		$response = array();
		if(!$this->post('userId')) {
			$response = array('status' => 'FALSE', 'message' => 'No Physician Provided.');
		} else {
			$this->load->model('physician_model');
			
			$userId = $this->post('userId');
			$result = $this->physician_model->getById($userId);
			$response = array('status' => 'TRUE', 'profile' => $result);
		}
		
		$this->response($response);
	}
	
	public function saveProfile_post() {
		$resp = array('status' => false);
		
		if(!$this->post('user_id')) {
			$resp['message'] = 'No User Provided';
		} else {
			
			$data['user_id'] = $this->post('user_id');
			$data['about'] = $this->post('about');
			$data['specialization_1'] = $this->post('specialization_1');
			$data['license_no'] = $this->post('license_no');
			$data['medical_school'] = $this->post('medical_school');
			$data['medical_school_year'] = $this->post('medical_school_year');
			
			$this->load->model('physician_model');
			$id = $this->physician_model->save($data);
			
			if(!isset($id))
				$resp['message'] = 'Error in updating physician profile';
			else {
				$resp['message'] = 'Physician Profile Updated.';
				$resp['status'] = 'true';
			}
		}
		
		$this->response($resp);
	}
	
	public function savePatient_post() {
		$resp = array('status' => false);
		
		if(!$this->post('physician_id')) {
			$resp['message'] = 'No User Provided';
			$resp['status'] = 'false';
		} else {
			
			$data['physician_id'] = $this->post('physician_id');
			$data['patient_id'] = $this->post('patient_id');
						
			$this->load->model('physician_model');
			$id = $this->physician_model->addPatient($data);
			
			if(!isset($id))
				$resp['message'] = 'Error in adding patient to physician';
			else {
				$resp['message'] = 'Patient Added.';
				$resp['status'] = 'true';
			}
		}
		
		$this->response($resp);
	}
	
	
	
	public function updatePhysician_post() {
		$resp = array('status' => false);
		
		if(!$this->post('user_id')) {
			$resp['message'] = 'No User Provided';
		} else {
			
			$id = $this->PM->update('profile', array(
				'user_id' => $this->post('user_id'),
			), array(
				'about' => $this->post('about'),
				//'specializations' => $this->post('specializations'),
				'license_no' => $this->post('license_no'),
				//'awards' => $this->post('awards'),
			));
				
			if(!isset($id))
				$resp['message'] = 'Error in updating physician profile';
			else {
				$resp['message'] = 'Physician Profile Updated.';
				$resp['status'] = 'true';
			}
		}
		
		$this->response($resp);
	}
	
	public function viewPhysician_get() {
		$resp = array('status' => 'false');
		if(!$this->get('user_id')) {
			$resp = array('message' => 'No User Provided.');
		} else {
			$this->load->model('physician_model');
			
			$userId = $this->get('user_id');
			
			$physician = $this->physician_model->getById($userId);
			
			$resp['data'] = $physician;
			$resp['status'] = 'true';
		}
		
		$this->response($resp);
	}
	
	public function retrievePatients_get() {
		$resp = array('status' => 'false');
		if(!$this->get('user_id')) {
			$resp = array('message' => 'No User Provided.');
		} else {
			$this->load->model('physician_model');
				
			$userId = $this->get('user_id');
				
			$patients = $this->physician_model->getPatients($userId);
			$resp['patients'] = $patients;
			$resp['status'] = 'true';
		}
		
		$this->response($resp);
	}
	
	public function retrieveApointments_get() {
		
	}
	
	public function retrieveColleagues_get() {
		$resp = array('status' => 'false');
		if(!$this->get('user_id')) {
			$resp = array('message' => 'No User Provided.');
		} else {
			$this->load->model('physician_model');
				
			$userId = $this->get('user_id');
				
			$colleagues = $this->physician_model->getColleagues($userId);
				
			$resp['colleagues'] = $colleagues;
			$resp['status'] = 'true';
		}
		
		$this->response($resp);
	}
	
	public function test_post() {
		$this->response(array('message' => 'Physician Rest Active'));
	}
	
	/**
	 * ISSUBSCRIBE FRIEND
	 * This function checks whether the user (patient) is subscribe to the user (physician)
	 */
	public function isSubscribe_get(){
		$isSubscribe = $this->PM->get('subscribe', array(
			'user_id' => $this->get('user_id'),
			'physician_id' => $this->get('physician_id'),
		));
		
		$this->response(array(
			'status' => 'TRUE',
			'success' => ($isSubscribe)?1:0,
			'data' => json_encode($isSubscribe),
		));
	}
	
	/**
	 * SUBSCRIBE PHYSICIAN
	 * This function lets the user (patient) to subscribe to the user (physician)
	 */
	public function subscribe_post(){
		$subscribe = $this->PM->add('subscribe', array(
			'user_id' => $this->post('user_id'),
			'physician_id' => $this->post('physician_id'),
		));
		
		$this->response(array(
			'status' => 'TRUE',
			'success' => ($subscribe)?1:0,
			'data' => json_encode($subscribe),
		));
	}
	
	/**
	 * UNSUBSCRIBE PHYSICIAN
	 * This function deletes the user (patient) subscription to the user (physician)
	 */
	public function unsubscribe_post(){
		$unsubscribe = $this->PM->delete('subscribe', array(
			'user_id' => $this->post('user_id'),
			'physician_id' => $this->post('physician_id'),
		));
		
		$this->response(array(
			'status' => 'TRUE',
			'success' => ($unsubscribe)?1:0,
			'data' => json_encode($unsubscribe),
		));
	}

	/**
	 * IS COLLEAGUE
	 * This function checks if the current user (physician) is friend with target user (physician)
	 */
	public function isColleague_get(){
		$friend_1 = $this->PM->get('colleagues', array(
			'user_id_1' => $this->get('user_id_1'),
			'user_id_2' => $this->get('user_id_2'),
		));
		
		$friend_2 = $this->PM->get('colleagues', array(
			'user_id_1' => $this->get('user_id_2'),
			'user_id_2' => $this->get('user_id_1'),
		));
		
		$friend = ($friend_1)?$friend_1:$friend_2;
		
		$this->response(array(
			'status' => 'TRUE',
			'success' => ($friend)?1:0,
			'data' => json_encode($friend),
		));
	}
	
	/**
	 * ADD COLLEAGUE
	 * This function lets the user (physician) to add his/her friend physician
	 */
	public function addColleague_post(){
		if($this->post('isNew')){
			$add = $this->PM->add('colleagues', array(
				'user_id_1' => $this->post('user_id_1'),
				'user_id_2' => $this->post('user_id_2'),
				'status_1' => 1,
				'status_2' => 0,
				'type' => 2,
				'created' => date('Y-m-d H:i:s'),
			));
		}else{
			$condition = array(
				'user_id_1' => $this->post('user_id_1'),
				'user_id_2' => $this->post('user_id_2'),
			);
			
			if($this->post('user_id_1') == $this->post('current_user')){
				$params = array(
					'status_1' => 1,
					'status_2' => 0,
				);
			}else{
				$params = array(
					'status_1' => 0,
					'status_2' => 1,
				);
			}
		
			$add = $this->PM->update('colleagues',$condition,$params);
		}
		
		
		
		$this->response(array(
			'status' => 'TRUE',
			'success' => ($add)?1:0,
			'data' => json_encode($add),
		));
	}
	
	/**
	 * REMOVE COLLEAGUE
	 * This function deletes user (physician) friend
	 */
	public function deleteColleague_post(){
		$condition = array(
			'user_id_1' => $this->post('user_id_1'),
			'user_id_2' => $this->post('user_id_2'),
		);
		
		$params = array(
			'status_1' => 0,
			'status_2' => 0,
		);
	
		$delete = $this->PM->update('colleagues',$condition,$params);
			
		$this->response(array(
			'status' => 'TRUE',
			'success' => ($delete)?1:0,
			'data' => json_encode($delete),
		));
	}
	
	/**
	 * REJECT COLLEAGUE
	 * This function rejects user (physician) friend request
	 */
	public function rejectColleague_post(){
		$condition = array(
			'user_id_1' => $this->post('user_id_1'),
			'user_id_2' => $this->post('user_id_2'),
		);
		
		$params = array(
			'status_1' => 0,
			'status_2' => 0,
		);
	
		$reject = $this->PM->update('colleagues',$condition,$params);
			
		$this->response(array(
			'status' => 'TRUE',
			'success' => ($reject)?1:0,
			'data' => json_encode($reject),
		));
	}
	
	/**
	 * ACCEPT COLLEAGUE
	 * This function accepts a user (physician) friend request
	 */
	public function acceptColleague_post(){
		$condition = array(
			'user_id_1' => $this->post('user_id_1'),
			'user_id_2' => $this->post('user_id_2'),
		);
		
		$params = array(
			'status_1' => 1,
			'status_2' => 1,
		);
	
		$accept = $this->PM->update('colleagues',$condition,$params);

		$this->response(array(
			'status' => 'TRUE',
			'success' => ($accept)?1:0,
			'data' => json_encode($accept),
		));
	}
	
	/**
	 * GET COLLEAGUE
	 * This function accepts a user (physician) friend request
	 */
	public function getColleague_get(){
		$friend_1 = $this->PM->getAll('colleagues', array(
				'user_id_1' => $this->get('user_id'),
				'status_1' => 1,
				'status_2' => 1,
			)
		);
		
		$friend_2 = $this->PM->getAll('colleagues',array(
				'user_id_2' => $this->get('user_id'),
				'status_1' => 1,
				'status_2' => 1,
			)
		);
		
		$colleagues = array();

		foreach($friend_1 as $f){
			$user = $this->PM->getPK('profile',$f->user_id_2);
			array_push($colleagues,$user);
		}
		
		foreach($friend_2 as $f){
			$user = $this->PM->getPK('profile',$f->user_id_1);
			array_push($colleagues,$user);
		}
	
		$this->response(array(
			'status' => 'TRUE',
			'success' => 1,
			'data' => json_encode($colleagues),
		));
	}
	
	
	/* NEW */
	
	public function subscribersList_get(){
		$this->response(array(
			'status' => 'TRUE',
			'success' => 1,
			'data' => json_encode(CA_Relation::getSubscribersList($this->get('user_id'))),
		));
	}
	
	public function removeSubscriber_post(){
		$this->response(array(
			'status' => 'TRUE',
			'success' => 1,
			'result' => CA_Relation::removeSubscriber($this->post('current_user'),$this->post('target_user')),
		));
	}
	
	
	public function specializations_get(){
		try {
			$specializations = $this->PM->getAllSpecializations($this->input->get('user_id'));
				
			$this->response(array(
					'status' => 'TRUE',
					'specializations' => json_encode($specializations),
			));
		}catch(Exception $e){
			$this->response(array(
					'status' => 'FALSE',
					'message' => $e->getMessage(),
			));
		}
	}
	
	
	public function affiliations_get(){
		try {
			$affiliations = $this->PM->getAllAffiliations($this->input->get('user_id'));
				
			$this->response(array(
					'status' => 'TRUE',
					'affiliations' => json_encode($affiliations),
					
			));
			
		}catch(Exception $e){
			$this->response(array(
					'status' => 'FALSE',
					'message' => $e->getMessage(),
			));
		}
	}
	
	
	public function honors_get(){
		try {
			$honors = $this->PM->getPhysicianHonors($this->input->get('user_id'));
				
			$this->response(array(
					'status' => 'TRUE',
					'honors' => json_encode($honors),
					
			));
			
		}catch(Exception $e){
			$this->response(array(
					'status' => 'FALSE',
					'message' => $e->getMessage(),
			));
		}
	}
}