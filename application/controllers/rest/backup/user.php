<?php
require(APPPATH.'libraries/REST_Controller.php');
class User extends REST_Controller {
	
	private $byPass = FALSE;
	
	public function __construct() {
		parent::__construct();
		$this->load->model('user_model', 'UM');
	}
	
	/*---------------------------------
	[POST] signup
	Description:
		
	Parameters:
		
	Response Object:
		
	---------------------------------*/
	public function signup_post(){
		$this->db->trans_begin();
		try {
			// Add [user] record
			$insertAccount = $this->UM->add('account', array(
				'type' => $this->post('user_type'),
				'username' => $this->post('username'),
				'password' => md5($this->post('password')),
				'email' => $this->post('email'),
			));
			
			// Add [user_profile] record
			$insertProfile = $this->UM->add('profile', array(
				'user_id' => $insertAccount,
				'first_name' => $this->post('first_name'),
				'last_name' => $this->post('last_name'),
				'profile_pic' => 'default.jpg',
			));
			
			if($this->post('user_type') == 1){
				// Add [patient_profile] record
				$insertPatientProfile = $this->UM->add('patientprofile', array(
					'user_id' => $insertAccount,
				));
			}else{
				// Add [physician_profile] record
				$insertPhysicianProfile = $this->UM->add('physicianprofile', array(
					'user_id' => $insertAccount,
				));
			}
			
			// Generate verification code
			$verficationCode = md5($this->post('username').'_'.date('Y-m-d H:i:s')."_CA-SALT");
			
			// Add [user_verifications] record
			$insertVerifications = $this->UM->add('verifications', array(
				'user_id' => $insertAccount,
				'type' => $this->post('user_type'),
				'code' => $verficationCode,
				'status' => 0,
				'created' => date('Y-m-d H:i:s'),
				'updated' => date('Y-m-d H:i:s'),
			));
			
			// Build verification Link
			$verification_link = base_url()
				."account/verify/?u=".$insertAccount
				."&t=".$this->post('user_type')
				."&c=".$verficationCode;
				
			// Load Mailer Library
			$this->load->library('CA_Mailer', '', 'Mailer');
			
			// Send Email
			$mailing = $this->Mailer->send(array(
				'email' => $this->post('email'),
				'type' => 'account_verify',
				'data' =>  array(
					'verification_link' => $verification_link,
				),
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
	
	public function activity_post() {
		$this->UM->update('account', $this->input->post('id'), array(
			'activity' => date('Y-m-d H:i:s'),
		));
	}
	
	public function findEmail_get() {
		$getEmail = $this->UM->get('account', array(
			'email' => $this->get('email'),
		));
		
		$this->response(array(
			'status' => 'TRUE',
			'available' => ($getEmail)?0:1,
			'data' => json_encode($getEmail),
		));
	}
	
	public function findUsername_get() {
		$getUsername = $this->UM->get('account', array(
			'username' => $this->get('username'),
		));
		
		$this->response(array(
			'status' => 'TRUE',
			'available' => ($getUsername)?0:1,
		));
	}
	
/* GET Profile via USERNAME or ID */	

	public function GetFullUserInfo_get(){
		
		if($this->get('username')){
			$getUProfile = $this->UM->getUserByUsername($this->get('username'));
		
			if($getUProfile){
				$this->response(array(
				'status' => 'TRUE',
				'uprofile' => json_encode($getUProfile),
				));
			}else{
				$this->response(array(
				'status' => 'FALSE',
				)); 
			}
		
		}elseif($this->get('id')){
			$getUProfile = $this->UM->getUserById($this->get('id'));
				
			if($getUProfile){
				$this->response(array(
				'status' => 'TRUE',
				'uprofile' => json_encode($getUProfile),
				));
			}else{
				$this->response(array(
				'status' => 'FALSE',
				));
			}
			
		}else{
			$this->response(array(
				'status' => 'FALSE',
			));
		}
	}
	
/* PROFILE CRUD */	
	
	public function profile_get(){
		$getProfile = $this->UM->getPK('profile',$this->get('id'));
		
		$this->response(array(
			'status' => 'TRUE',
			'profile' => json_encode($getProfile),
		));
	}
	
	public function profileValidation_post(){
		$required = array(
			"first_name",
			"last_name",
			"birthdate",
			"address1",
		);
		
		$errors = array();
		
		foreach($required as $key){
			if($this->post($key) == ""){
				array_push($errors,$key);
			}
		}
		
		if(count($errors)){
			$this->response(array(
				'status' => 'FALSE',
				'errors' => json_encode($errors),
			));
		}else{
			$this->response(array(
				'status' => 'TRUE',
			));
		}
	
		
	}
	
	public function updateProfile_post(){	
		$updateProf = $this->UM->update('profile',array('user_id'=>$this->post('user_id')),array(
			'title' => $this->post('title'),
			'first_name' => $this->post('first_name'),
			'middle_name' => $this->post('middle_name'),
			'last_name' => $this->post('last_name'),
			'address1' => $this->post('address1'),
			'address2' => $this->post('address2'),
			'city' => $this->post('city'),
			'state' => $this->post('state'),
			'country_id' => $this->post('countryId'),
			'birthdate' => $this->post('birthday'),
			'gender' => $this->post('gender'),
			'num_landline' => $this->post('num_landline'),
			'num_phone1' => $this->post('phone1'),
			'num_phone2' => $this->post('phone2'),
			'c_skype' => $this->post('skype'),
			'c_msn' => $this->post('msn'),
			'c_yahoo' => $this->post('yahoo'),
			'c_gtalk' => $this->post('google'),
			'coord_lat' => $this->post('coord_lat'),
			'coord_lng' => $this->post('coord_lng'),
		));
		
		$this->response(array(
			'status' => 'TRUE',
			'success' => ($updateProf)?1:0,
		));
	}
	
	public function uploadPicture_post(){
		$updateProf = $this->UM->update('profile',array('user_id'=>$this->post('user_id')),$this->post());
		
		$this->response(array(
			'status' => 'TRUE',
			'success' => ($updateProf)?1:0,
		));
	}
	
/* Login */
	
	public function login_post(){
		$email = array(
			'email' => $this->post('userlogin'),
			'password' => md5($this->post('password')),
		);
		
		$username = array(
			'username' => $this->post('userlogin'),
			'password' => md5($this->post('password')),
		);
		
		$authenticate_email = $this->UM->get('account',$email);
		$authenticate_username = $this->UM->get('account',$username);
		
		if($authenticate_email){
			$authenticate = $authenticate_email;
		}else if($authenticate_username){
			$authenticate = $authenticate_username;
		}else{
			$authenticate = "";
		}
		
		$this->response(array(
			'status' => 'TRUE',
			'success' => ($authenticate)?1:0,
			'user_data' => json_encode($authenticate),
		));
	}
	
/* Verifications */

	public function verify_post(){
		$condition = array(
			'user_id' => $this->post('user_id'),
			'type' => $this->post('type'),
			'code' => $this->post('code'),
		);
		
		$data = array(
				'status' => 1,
		);

		$check_verification = $this->UM->get('verifications',$condition);
		if($check_verification){
			if($check_verification->status){
				$verification = ""; //Status already verified
				$msg = "error_used";
			}else{
				$verification = $this->UM->update('verifications',$condition,$data);
				$msg = "";
			}
		}else{
			$verification = "";
			$msg ="error_invalid";
		}
		
		$this->response(array(
			'status' => 'TRUE',
			'success' => ($verification)?1:0,
			'msg' => $msg
		));
	}
	
	public function setAuth_post(){
		$condition = array(
			'user_id' => $this->post('user_id')
		);
		
		$data = array(
			'status' => $this->post('status')
		);
		
		$this->UM->update('verifications', $condition, $data);
		
		$this->response(array(
			'status' => 'TRUE'
		));
	}
	
/* Forgot Password */
	public function resetPassword_post(){
		$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
		$resetPassword = substr(str_shuffle($chars),0,10); //generate RANDOM password
		
		$data = array(
			'password' => md5($resetPassword),
		);
		
		$reset = $this->UM->update('account',array('id'=>$this->post('id')),$data);
		
		//if($reset){
	
			
		// Load Mailer Library
			$this->load->library('CA_Mailer', '', 'Mailer');
			
		// Send Email
			$mailing = $this->Mailer->send(array(
				'email' => $this->post('email'),
				'type' => 'account_password',
				'data' =>  array(
				'resetPassword' => $resetPassword,
				),
			));
		//}
		
		$this->response(array(
			'status' => 'TRUE',
			'success' => ($reset)?1:0,
		));
		
	}

#change password
	
	public function changePassword_post(){

		#authenticate
		$username = array(
			'username' => $this->post('username'),
			'password' => md5($this->post('old_pass')),
		);
		
		$authenticate_username = $this->UM->get('account',$username);
		
		$reset = FALSE;
		$status = FALSE;

		if($authenticate_username){

			if($this->post('new_pass')==$this->post('con_pass')){
				$data = array(
					'password' => md5($this->post('new_pass')),
				);
				
				$reset = $this->UM->update('account',array('id'=>$this->post('id')),$data);
				
				# Load Mailer Library
				$this->load->library('CA_Mailer', '', 'Mailer');
					
				# Send Email
				$mailing = $this->Mailer->send(array(
					'email' => $this->post('email'),
					'type' => 'account_password',
					'data' =>  array(
					'resetPassword' => $this->post('new_pass'),
					),
				));
			}

			
			$status = TRUE;
			$reset = TRUE;
		}else{

			$status = FALSE;
		}
		
		$this->response(array(
			'status' => $status,
			'success' => ($reset)?1:0,
		));

	}	
	
	public function test_post() {
		$this->response(array('message' => 'User Rest Active 2'));
	}
	
	/* USER RELATION FUNCTIONS (PATIENT TO PATIENT or PATIENT TO PHYSICIAN) */
	public function addFriend_post(){
		if($this->post('isNew')){
			$add = $this->UM->add('friends', array(
				'user_id_1' => $this->post('user_id_1'),
				'user_id_2' => $this->post('user_id_2'),
				'status_1' => 1,
				'status_2' => 0,
				'from' => $this->post('user_id_1'),
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
		
			$add = $this->UM->update('friends',$condition,$params);
		}
			
		$this->response(array(
			'status' => 'TRUE',
			'success' => ($add)?1:0,
			'data' => json_encode($add),
		));
	}
	
	public function deleteFriend_post(){
		$condition = array(
			'user_id_1' => $this->post('user_id_1'),
			'user_id_2' => $this->post('user_id_2'),
		);
		
		$params = array(
			'status_1' => 0,
			'status_2' => 0,
		);
	
		$delete = $this->UM->update('friends',$condition,$params);
			
		$this->response(array(
			'status' => 'TRUE',
			'success' => ($delete)?1:0,
			'data' => json_encode($delete),
		));
	}
	
	public function rejectFriend_post(){
		$condition = array(
			'user_id_1' => $this->post('user_id_1'),
			'user_id_2' => $this->post('user_id_2'),
		);
		
		$params = array(
			'status_1' => 0,
			'status_2' => 0,
		);
	
		$reject = $this->UM->update('friends',$condition,$params);
			
		$this->response(array(
			'status' => 'TRUE',
			'success' => ($reject)?1:0,
			'data' => json_encode($reject),
		));
	}
	
	public function acceptFriend_post(){
		$condition = array(
			'user_id_1' => $this->post('user_id_1'),
			'user_id_2' => $this->post('user_id_2'),
		);
		
		$params = array(
			'status_1' => 1,
			'status_2' => 1,
		);
	
		$accept = $this->UM->update('friends',$condition,$params);
			
		$this->response(array(
			'status' => 'TRUE',
			'success' => ($accept)?1:0,
			'data' => json_encode($accept),
		));
	}
	
	public function isSubscribe_get(){
		$isSubscribe = $this->UM->get('subscribe', array(
			'user_id' => $this->get('user_id'),
			'physician_id' => $this->get('physician_id'),
		));
		
		$this->response(array(
			'status' => 'TRUE',
			'success' => ($isSubscribe)?1:0,
			'data' => json_encode($isSubscribe),
		));
	}
	
	public function subscribe_post(){
		$subscribe = $this->UM->add('subscribe', array(
			'user_id' => $this->post('user_id'),
			'physician_id' => $this->post('physician_id'),
		));
		
		$this->response(array(
			'status' => 'TRUE',
			'success' => ($subscribe)?1:0,
			'data' => json_encode($subscribe),
		));
	}
	
	public function unsubscribe_post(){
		$unsubscribe = $this->UM->delete('subscribe', array(
			'user_id' => $this->post('user_id'),
			'physician_id' => $this->post('physician_id'),
		));
		
		$this->response(array(
			'status' => 'TRUE',
			'success' => ($unsubscribe)?1:0,
			'data' => json_encode($unsubscribe),
		));
	}
	
	
	/*------------------------------------------------------------------------
	-------------------------------- DASHBOARD -------------------------------
	------------------------------------------------------------------------*/
	
	/* [GET] ALL WIDGETS
	Get list of all available widgets for a user_type
	-------------------------------------------------------*/
	public function allWidgets_get(){
		try {
			$widgets = $this->UM->getAll('var_widget', array(
				'type' => $this->input->get('user_type'),
			));
			
			$this->response(array(
				'status' => 'TRUE',
				'widgets' => $widgets,
			));
		}catch(Exception $e){
			$this->response(array(
				'status' => 'FALSE',
				'message' => $e->getMessage(),
			));
		}
	}
	
	/* [GET] WIDGETS
	Get list of widgets for specific user's dashboard
	-------------------------------------------------------*/
	public function widgets_get(){
		try {
			$widgets = $this->UM->getWidgets( $this->input->get('user_id') );
			$this->response(array(
				'status' => 'TRUE',
				'widgets' => $widgets,
			));
		}catch(Exception $e){
			$this->response(array(
				'status' => 'FALSE',
				'message' => $e->getMessage(),
			));
		}
	}
	
	/* [POST] WIDGETS
	Update user's list of widgets, from the top
	-------------------------------------------------------*/
	public function widgets_post(){
		$this->db->trans_begin();
		try {
			// Remove existing user widgets
			$widgets = $this->UM->delete('widget', array(
				'user_id' => $this->input->post('user_id'),
			));
			
			// Add new selected user widgets
			$widgets = $this->input->post('widgets');
			if(is_array($widgets)){
				foreach($widgets as $widget){
					$widgets = $this->UM->add('widget', array(
						'user_id' => $this->input->post('user_id'),
						'widget_id	' => $widget,
						'sort_num	' => 0,
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
	
	public function createAdmin_post() {
		$this->UM->add('account', array(
				'type' => ADMIN_USER_TYPE,
				'username' => $this->post('username'),
				'password' => md5($this->post('password')),
				'email' => $this->post('email'),
		));
		
		$this->response(array(
				'status' => 'TRUE',
		));
	}
	
	public function getAdmins_get() {
		$users = $this->UM->getAll('account', array('type' => ADMIN_USER_TYPE));
		$this->response(array(
				'data' => $users));
	}
	
}
