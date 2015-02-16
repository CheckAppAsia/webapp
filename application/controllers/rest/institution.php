<?php
require(APPPATH.'libraries/REST_Controller.php');
class Institution extends REST_Controller {

	############################################################
	# Institution Params
	# Appointment Status:
	#	0 => pending
	#	1 => accepted / waiting
	#	2 => in-progress
	#	3 => completed
	#	4 => cancelled
	#	5 => declined
	############################################################


	/* [GET] GET APPOINTMENTS
	Get physician appointments in institution
	@GET Params
	- provider_id (int)
	- institution_id (int)
	- list_type (string) :: today,upcoming,previous
	- status (int or array) :: 1,2,3,4
	----------------------------------------------------------*/
	public function appointments_get(){
		try {
			$this->load->model('institution/appointment_model');
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
			
			$sets_of_condition = array();
			
			#Appointment Schedule Type
			$range = "";
			switch($this->get('list_type')){
				case 'today':
					//$range = 'schedule BETWEEN "'.date('Y-m-d 00:00:00').'" AND "'.date('Y-m-d 23:59:59').'"';
					$range = 'schedule < "'.date('Y-m-d 23:59:59').'"';
					break;
				case 'upcoming':
					$range = 'schedule > "'.date('Y-m-d 23:59:59').'"';
					break;
				case 'previous':
					$range = 'schedule < "'.date('Y-m-d 00:00:00').'"';
					break;
				case 'pending':
					$range = 'schedule > "'.date('Y-m-d 00:00:00').'"';
					break;
				case 'month':
					$range = 'schedule BETWEEN "'.$this->get('month_start').'" AND "'.$this->get('month_end').'"';
					break;
				case 'date':
					$range = 'schedule BETWEEN "'.$this->get('date_start').'" AND "'.$this->get('date_end').'"';
					break;
				default:
					break;
			}
			if($range != ""){ array_push($sets_of_condition,$range); }
			
			#Appointment Status
			if($this->get('status') != ""){
				$status = "";
				if(is_array($this->get('status'))){
					$status = "status=".implode(' OR status=',$this->get('status'));
				}else{
					$status = "status=".$this->get('status');
				}
			}
			if($status != ""){ array_push($sets_of_condition,$status); }
			
			#Appointment Provider, Institution
			if($this->get('provider_id') != ""){
				$pid = "provider_id=".$this->get('provider_id');
				array_push($sets_of_condition,$pid);
			}
			
			if($this->get('member_id') != ""){
				$mid = "member_id=".$this->get('member_id');
				array_push($sets_of_condition,$mid);
			}
			
			if($this->get('institution_id') != ""){
				$cid = "institution_id=".$this->get('institution_id');
				array_push($sets_of_condition,$cid);
			}
			
			$condition = "(".implode(") AND (",$sets_of_condition).")";
			
			if($this->get('user') == "provider"){
				#Providers Appointment
				$appointments = $this->appointment_model->read(
					$condition,
					'institution,account,profile',
					$fields
				);
			}else if($this->get('user') == "member"){
				#JOIN `db_institution`.`institution` ON `appointment`.`institution_id` = `institution`.`id`
				#JOIN `db_member`.`account` ON `appointment`.`member_id` = `account`.`id`
				#JOIN `db_member`.`profile` ON `appointment`.`member_id` = `profile`.`user_id`
				
				#Members Appointment (MIGRATE TO MODEL QUERY)
				$institution_appointment = db_institution.'.appointment';
				$institution_institution = db_institution.'.institution';
				$provider_account = db_provider.'.account';
				$provider_profile = db_provider.'.profile';
				
				$db = &get_instance()->db;
				$db->select($fields)
					->from($institution_appointment)
					->where($condition)
					->join($institution_institution, 'institution_id = institution.id')
					->join($provider_account, 'appointment.provider_id = account.id')
					->join($provider_profile, 'appointment.provider_id = profile.user_id');
					
				$appointments = $db->get()->result_array();
			}else{
				$appointments = array(1,2,3,4);
			}
		
			#Respond with requested user data
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
	
	/* [GET] GET APPOINTMENT VIA ID
	Get physician appointments in institution
	@GET Params
	- provider_id (int)
	- institution_id (int)
	- list_type (string) :: today,upcoming,previous
	- status (int or array) :: 1,2,3,4
	----------------------------------------------------------*/
	public function appointment_get(){
		try {
			$this->load->model('institution/appointment_model');
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
				$this->appointment_model->table_name.".id" => $this->get('appointment_id'),
				$this->appointment_model->table_name.".provider_id" => $this->get('provider_id'),
			);
			
			$appointment = $this->appointment_model->read(
				$condition,
				'institution,account,profile',
				$fields
			);
		
			#Respond with requested user data
			$this->response(array(
				'status' => 'TRUE',
				'data' => $appointment,
			));
		}catch(Exception $e){
			$this->response(array(
				'status' => 'FALSE',
				'message' => $e->getMessage(),
			));
		}
	}
	
	/* [POST] UPDATE APPOINTMENTS
	Update appointments
	@POST Params
	- provider_id (int)
	- institution_id (int)
	- type (int)
	- status (int)
	- schedule (datetime)
	- start_time (datetime)
	- end_time (datetime)
	- remarks (string)
	----------------------------------------------------------*/
	public function updateAppointment_post(){
		$this->db->trans_begin();
		try {
			$this->load->model('institution/appointment_model');
			
			#Validate and Filter fields
			$fields = $this->appointment_model->filter(
				$this->post(NULL, TRUE),
				array('provider_id','institution_id','type','status','schedule','start_time','end_time','remarks')
			);
			
			if(count($fields)===0){
				throw new Exception('No fields to update');
			}
			
			#Attempt to update the appointment
			$this->appointment_model->update(array(
				'id' => $this->post('id'),
			), $fields);
			
			#Commit database queries if no error is encountered
			$this->db->trans_commit();
			$this->response(array(
				'status' => 'TRUE',
			));
		}catch(Exception $e){
			#Error, roll-back queries!
			$this->db->trans_rollback();
			$this->response(array(
				'status' => 'FALSE',
				'message' => $e->getMessage(),
			));
		}
	}
	
	/* [GET] GET STAFFS VIA INSTITUTION
	Get all staffs in institution
	@GET Params
	- institution_id (int)
	----------------------------------------------------------*/
	public function staffs_get(){
		try {
			$this->load->model('institution/staff_model');
			$fields = '
				staff.*,
				
				account.email AS account_email,
				account.username AS account_username,
				
				profile.title AS profile_title,
				profile.first_name AS profile_first_name,
				profile.middle_name AS profile_middle_name,
				profile.last_name AS profile_last_name,
				profile.gender AS profile_gender,
				profile.address AS profile_address,
				profile.profile_pic AS profile_profile_pic
				';
			
			#Institution
			$iid = "institution_id=".$this->get('institution_id');
			
			$condition = "(".$iid.")";
			
			$staffs = $this->staff_model->read(
				$condition,
				'account,profile',
				$fields
			);
		
			#Respond with requested user data
			$this->response(array(
				'status' => 'TRUE',
				'data' => $staffs,
			));
		}catch(Exception $e){
			$this->response(array(
				'status' => 'FALSE',
				'message' => $e->getMessage(),
			));
		}
	}
	
	/* [POST] ADD STAFFS
	Add staff to a institution
	@POST Params
	- to be discussed
	----------------------------------------------------------*/
	public function addStaff_post(){
		$this->db->trans_begin();
		try {
			#Add [staff] record
			$this->load->model('institution/staff_model');
			$staff = $this->staff_model->create(array(
				'institution_id' => $this->post('institution_id'),
				'provider_id' => $this->post('provider_id'),
				'role' => $this->post('role'),
				'remarks' => $this->post('remarks'),
				'by_staff_id' => $this->post('by_staff_id'),
			));
			
			#Add [staff_access] record
			$this->load->model('institution/staff_access_model');
			$staff = $this->staff_access_model->create(array(
				'institution_id' => $this->post('institution_id'),
				'provider_id' => $this->post('provider_id'),
				'access_id' => $this->post('access_id'),
			));
			
			#Add [staff_schedule] record
			$this->load->model('institution/staff_schedule_model');
			$staff = $this->staff_schedule_model->create(array(
				'institution_id' => $this->post('institution_id'),
				'provider_id' => $this->post('provider_id'),
				'day' => $this->post('day'),
				'shift_start' => $this->post('shift_start'),
				'shift_end' => $this->post('shift_end'),
			));
			
			// Commit database queries if no error is encountered
			$this->db->trans_commit();
			$this->response(array(
				'status' => 'TRUE',
			));
		}catch(Exception $e){
			// Error, roll-back queries!
			$this->db->trans_rollback();
			$this->response(array(
				'status' => 'FALSE',
				'message' => $e->getMessage(),
			));
		}
	}
	
	/* [POST] UPDATE STAFFS
	Update staff in an institution
	@POST Params
	- to be discussed
	----------------------------------------------------------*/
	public function updateStaff_post(){
		$this->db->trans_begin();
		try {
			#staff_model START
			$this->load->model('institution/staff_model');
			
			#Validate and Filter fields
			$fields = $this->staff_model->filter(
				$this->post(NULL, TRUE),
				array('institution_id','role','remarks','by_staff_id')
			);
			
			#Attempt to update the Staff
			if(count($fields)>0){
				$this->staff_model->update(array(
					'provider_id' => $this->post('provider_id'),
				), $fields);
			}
			#staff_model END
			
			#staff_access_model START
			$this->load->model('institution/staff_access_model');
			
			#Validate and Filter fields
			$fields = $this->staff_access_model->filter(
				$this->post(NULL, TRUE),
				array('institution_id','access_id')
			);
			
			#Attempt to update the staff_access_model
			if(count($fields)>0){
				$this->staff_access_model->update(array(
					'provider_id' => $this->post('provider_id'),
				), $fields);
			}
			#staff_access_model END
			
			#staff_schedule_model START
			$this->load->model('institution/staff_schedule_model');
			
			#Validate and Filter fields
			$fields = $this->staff_schedule_model->filter(
				$this->post(NULL, TRUE),
				array('institution_id','day','shift_start','shift_end')
			);
			
			#Attempt to update the staff_schedule_model
			if(count($fields)>0){
				$this->staff_schedule_model->update(array(
					'provider_id' => $this->post('provider_id'),
				), $fields);
			}
			#staff_schedule_model END
			
			#Commit database queries if no error is encountered
			$this->db->trans_commit();
			$this->response(array(
				'status' => 'TRUE',
			));
		}catch(Exception $e){
			#Error, roll-back queries!
			$this->db->trans_rollback();
			$this->response(array(
				'status' => 'FALSE',
				'message' => $e->getMessage(),
			));
		}
	}
	
	/* [GET] GET INSTITUTIONS OF PROVIDER
	Get all institutions where the provider is affiliated
	@GET Params
	- provider_id (int)
	----------------------------------------------------------*/
	public function institutions_get(){
		try {
			$this->load->model('institution/institution_model');
			$fields = '
				institution.*,
				';
			
			#Provider
			$pid = "provider_id=".$this->get('provider_id');
			
			$condition = "(".$pid.")";
			
			$institutions = $this->institution_model->read(
				$condition,
				'staff',
				$fields
			);
		
			#Respond with requested user data
			$this->response(array(
				'status' => 'TRUE',
				'data' => $institutions,
			));
		}catch(Exception $e){
			$this->response(array(
				'status' => 'FALSE',
				'message' => $e->getMessage(),
			));
		}
	}
	
	
	
	
}