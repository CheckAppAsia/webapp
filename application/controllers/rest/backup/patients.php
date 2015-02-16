<?php
require(APPPATH.'libraries/REST_Controller.php');
class Patients extends REST_Controller {
	
	public function __construct() {
		parent::__construct();
		$this->load->model('patient_model', 'PM');
		$this->load->library('email');
	}
	
	
	/* [GET] health
	Get list of specific patient's health values
	-------------------------------------------------------*/
	public function health_get(){
		try {
			$healths = $this->PM->getHealth($this->input->get('patient_id'));
			$this->response(array(
				'status' => 'TRUE',
				'healths' => $healths,
			));
		}catch(Exception $e){
			$this->response(array(
				'status' => 'FALSE',
				'message' => $e->getMessage(),
			));
		}
	}
	
	/* [POST] health
	Update a specific patient's specific health value
	-------------------------------------------------------*/
	public function health_post(){
		try {
			$this->PM->update('health', array(
				'user_id' => $this->input->post('patient_id'),
				'health_id' => $this->input->post('health_id'),
			), array(
				'value' => $this->input->post('value'),
			));
			
			$this->response(array(
				'status' => 'TRUE',
			));
		}catch(Exception $e){
			$this->response(array(
				'status' => 'FALSE',
				'message' => $e->getMessage(),
			));
		}
	}
	
	/* [GET] medication
	Get list of specific patient's ongoing medications
	-------------------------------------------------------*/
	public function medication_get(){
		try {
			$medications = $this->PM->getMedications($this->input->get('patient_id'));
			$this->response(array(
				'status' => 'TRUE',
				'medications' => $medications,
			));
		}catch(Exception $e){
			$this->response(array(
				'status' => 'FALSE',
				'message' => $e->getMessage(),
			));
		}
	}
	
	/* [GET] appointments
	Get list of appointments (Flexible)
	-------------------------------------------------------*/
	public function appointments_get(){
		try {
			$this->load->model('appointment_model','AM');
			
			$appointments = $this->AM->getAppointments(
				0, $this->input->get('patient_id'),
				array(
					'type' => 'all',
				),
				$this->input->get('status')
			);
			
			$this->response(array(
				'status' => 'TRUE',
				'appointments' => json_encode($appointments),
			));
		}catch(Exception $e){
			$this->response(array(
				'status' => 'FALSE',
				'message' => $e->getMessage(),
			));
		}
	}
	
	/* [GET] physicians
	Get list of specific patient's doctors
	-------------------------------------------------------*/
	public function physicians_get(){
		try {
			$physicians = $this->PM->getPhysicianList($this->input->get('patient_id'), $this->input->get('online'));
			
			$this->response(array(
				'status' => 'TRUE',
				'physicians' => json_encode($physicians),
			));
		}catch(Exception $e){
			$this->response(array(
				'status' => 'FALSE',
				'message' => $e->getMessage(),
			));
		}
	}
	
	
	public function retrievePatients_get() {
		
		$joins[] = array(
				'table' => 'user_profile',
				'cond' => 'user_profile.user_id = user.id',
				'dir' => 'LEFT'
		);
		
		$joins[] = array(
				'table' => 'user_verifications',
				'cond' => 'user_verifications.user_id = user.id',
				'dir' => 'LEFT'
		);
		
		$patients = $this->PM->getAll('user', array(), $joins);
		log_message('debug', '[rest patients] retrievePatients_get query = '.$this->db->last_query());
		
		$this->response( array (
				'status' => 'TRUE',
				'count' => count($patients),
				'data' => $patients
			));
	}
	
	/* Patient Medical Profile*/
	
	public function patientProfile_get(){
		$joins[] = array(
				'table' => 'user_profile',
				'cond' => 'user_profile.user_id = patient_profile.user_id',
				'dir' => 'LEFT'
		);
		
		$joins[] = array(
				'table' => 'user_verifications',
				'cond' => 'user_verifications.user_id = patient_profile.user_id',
				'dir' => 'LEFT'
		);
		
		
		$joins[] = array(
				'table' => 'country',
				'cond' => 'country.country_id = user_profile.country_id',
				'dir' => 'LEFT'
		);
		
		$getProfile = $this->PM->getPK('patientprofile',$this->get('id'), $joins);
		
		$this->response(array(
			'status' => 'TRUE',
			'profile' => json_encode($getProfile),
		));
	}
	
	public function updatePatientProfile_post(){	
		$updateProf = $this->PM->update('patientprofile',array('user_id'=>$this->input->post('user_id')), array(
			'family_history' => $this->input->post('family_history'),
			'known_allergies' => $this->input->post('known_allergies'),
			'other' => $this->input->post('other'),
		));
		
		$this->response(array(
			'status' => 'TRUE',
			'success' => ($updateProf)?1:0,
		));
	}
	
	/* Physician Medical Profile*/
	
	public function physicianProfile_get(){
		$getProfile = $this->PM->getPK('physicianprofile',$this->get('id'));
		
		$this->response(array(
			'status' => 'TRUE',
			'profile' => json_encode($getProfile),
		));
	}
	
	public function updatePhysicianProfile_post(){	
		$updateProf = $this->PM->update('physicianprofile',array('user_id'=>$this->post('user_id')),$this->post());
		
		$this->response(array(
			'status' => 'TRUE',
			'success' => ($updateProf)?1:0,
		));
	}
	
	
	/* Make Appointment */
	public function makeAppointment_post(){
		$this->db->trans_begin();
		try {
			$this->load->model('appointment_model','AM');
			
			$appointment = $this->AM->add('appointment', array(
				'physician_id' => $this->input->post('physician_id'),
				'patient_id' => $this->input->post('patient_id'),
				'schedule' =>  $this->input->post('schedule'),
				'patient_note' => $this->input->post('notes'),
				'status' => ($this->input->post('status'))?$this->input->post('status'):0,
			));
			
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
	
	public function test_post() {
		$this->response(array('message' => 'Patient Rest Active'));
	}
	
	
	
	/* NEW FUNCTIONS */
	
	public function friendList_get(){
		$this->response(array(
			'status' => 'TRUE',
			'success' => 1,
			'data' => json_encode(CA_Relation::getFriendList($this->get('user_id'))),
		));
	}
	
	public function friendRequests_get(){
		$this->response(array(
			'status' => 'TRUE',
			'success' => 1,
			'data' => json_encode(CA_Relation::getFriendRequests($this->get('user_id'))),
		));
	}
	
	public function friendInvites_get(){
		$this->response(array(
			'status' => 'TRUE',
			'success' => 1,
			'data' => json_encode(CA_Relation::getFriendInvites($this->get('user_id'))),
		));
	}
	
	public function friendRemove_post(){
		$this->response(array(
			'status' => 'TRUE',
			'success' => 1,
			'result' => CA_Relation::removeFriend($this->post('current_user'),$this->post('target_user')),
		));
	}
	
	public function friendAdd_post(){
		$this->response(array(
			'status' => 'TRUE',
			'success' => 1,
			'result' => CA_Relation::addFriend($this->post('current_user'),$this->post('target_user'),$this->post('user_relation_type')),
		));
	}
	
	public function friendCancel_post(){
		$this->response(array(
			'status' => 'TRUE',
			'success' => 1,
			'result' => CA_Relation::cancelFriend($this->post('current_user'),$this->post('target_user')),
		));
	}
	
	public function friendReject_post(){
		$this->response(array(
			'status' => 'TRUE',
			'success' => 1,
			'result' => CA_Relation::rejectFriend($this->post('current_user'),$this->post('target_user')),
		));
	}
	
	public function friendAccept_post(){
		$this->response(array(
			'status' => 'TRUE',
			'success' => 1,
			'result' => CA_Relation::acceptFriend($this->post('current_user'),$this->post('target_user')),
		));
	}
	
	//NEW FUNCTIONS
	public function subscribeList_get(){
		$this->response(array(
			'status' => 'TRUE',
			'success' => 1,
			'data' => json_encode(CA_Relation::getSubscribeList($this->get('user_id'))),
		));
	}
	
	public function subscribe_post(){
		$this->response(array(
			'status' => 'TRUE',
			'success' => 1,
			'result' => CA_Relation::subscribe($this->post('current_user'),$this->post('target_user')),
		));
	}
	
	public function unsubscribe_post(){
		$this->response(array(
			'status' => 'TRUE',
			'success' => 1,
			'result' => CA_Relation::unsubscribe($this->post('current_user'),$this->post('target_user')),
		));
	}
	
	public function mutualFriendList_get(){
		$this->response(array(
			'status' => 'TRUE',
			'success' => 1,
			'data' => json_encode(CA_Relation::getMutualFriends($this->get('user_id'),$this->get('target_id'))),
		));
	}
	
}