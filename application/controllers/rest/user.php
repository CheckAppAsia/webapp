<?php
require(APPPATH.'libraries/REST_Controller.php');
class User extends REST_Controller {
	
	/* [POST] SIGNUP
	Signup attempt
	----------------------------------------------------------*/
	public function signup_post(){
		$this->db->trans_begin();
		try {
			// Add [user] record
			$this->load->model('main/user_model');
			$user_id = $this->user_model->create(array(
				'type' => $this->post('type'),
				'email' => $this->post('email'),
				'username' => $this->post('username'),
				'password' => md5($this->post('password')),
			));
			
			if($this->post('type')==1){ $modelDirectory='member'; }
			else if($this->post('type')==2){ $modelDirectory='provider'; }
			
			// Add [account] record
			$this->load->model($modelDirectory.'/account_model');
			$user_id = $this->account_model->create(array(
				'id' => $user_id,
				'email' => $this->post('email'),
				'username' => $this->post('username'),
			));
			
			// Add [profile] record
			$this->load->model($modelDirectory.'/profile_model');
			$this->profile_model->create(array(
				'user_id' => $user_id,
				'first_name' => $this->post('first_name'),
				'last_name' => $this->post('last_name'),
				'profile_pic' => 'default.jpg',
			));
			
			// Add [verification] record
			$verficationCode = md5($this->post('username').'_'.date('Y-m-d H:i:s')."_CA-SALT");
			$this->load->model($modelDirectory.'/verification_model');
			$this->verification_model->create(array(
				'user_id' => $user_id,
				'code' => $verficationCode,
				'status' => 0,
				'created' => date('Y-m-d H:i:s'),
				'updated' => date('Y-m-d H:i:s'),
			));
			
			// MEMBER
			if($this->post('type')==1){
				
				// Add [health] record
				$this->load->model('member/health_model');
				$this->health_model->create(array(
					'user_id' => $user_id,
				));
				
				
			// PROVIDER
			}else if($this->post('type')==2){
				
				
				
			}
			
			// Send Verification Email
			$verification_link = base_url()."account/verify/?u=".$user_id."&t=1&c=".$verficationCode;
			$this->load->library('CA_Mailer', '', 'Mailer');
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
				'status' => TRUE,
			));
		}catch(Exception $e){
			// Error, roll-back queries!
			$this->db->trans_rollback();
			$this->response(array(
				'status' => FALSE,
				'message' => $e->getMessage(),
			));
		}
	}
	
	/* [POST] LOGIN
	Login attempt checker
	----------------------------------------------------------*/
	public function login_post(){
		try {
			$this->load->model('main/user_model');
			$userlogin = $this->db->escape($this->post('userlogin'));
			$password = $this->db->escape(md5($this->post('password')));
			$account = $this->user_model->read('(username='.$userlogin.' OR email='.$userlogin.') AND password='.$password, null, 'id,type');
			
			if(count($account)===0){ throw new Exception('Invalid Username or Password. Please try again.'); }
			
			switch($account[0]->type){
				case 1:
					$this->load->model('member/account_model', 'MemberAccount');
					$FullProfile = $this->MemberAccount->read(intval($account[0]->id), 'profile');
					break;
				case 2:
					$this->load->model('provider/account_model', 'ProviderAccount');
					$FullProfile = $this->ProviderAccount->read(intval($account[0]->id), 'profile');
					break;
				case 4:
					$this->load->model('pharmacy/users_model', 'PharmacyAccount');
					$FullProfile = $this->PharmacyAccount->read(array('main_user_id' => intval($account[0]->id)));
					$FullProfile[0]->id = intval($account[0]->id);
					break;
				default:
					throw new Exception('Unknown user type '.$account[0]->type);
					break;
			}
			
			$FullProfile = $FullProfile[0];
			$FullProfile->type = $account[0]->type;
			
			if($account[0]->type != 4) {
				$this->load->model('main/location_model');
				$location = $this->location_model->read(intval($FullProfile->location), 'country', 'location.id,city,state,zip,country.name as country, country as country_id, coord_lat, coord_lng');
			
			
				if(count($location)==1){
					$FullProfile->location = $location[0];
				}else{
					$FullProfile->location = array(
						'id' => 0,
						'city' => '',
						'state' => '',
						'zip' => '',
						'country' => '',
						'country_id' => 0,
						'coord_lat' => 100,
						'coord_lng' => 100,
					);
				}
			}
			
			$this->response(array(
				'status' => TRUE,
				'data' => $FullProfile,
			));
		}catch(Exception $e){
			$this->response(array(
				'status' => FALSE,
				'message' => $e->getMessage(),
			));
		}
	}
	
	/* [GET] ACCOUNT AVAILABILITY
	Check email or username availability
	----------------------------------------------------------*/
	public function accountAvailability_get(){
		try {
			$available = true;
			$this->load->model('main/user_model');
			
			if($this->get('email')){
				$matches = $this->user_model->read(array('email' => $this->get('email')), null, 'id');
				if(count($matches)>0){ $available = false; }
			}
			
			if($this->get('username')){
				$matches = $this->user_model->read(array('username' => $this->get('username')), null, 'id');
				if(count($matches)>0){ $available = false; }
			}
			
			$this->response(array(
				'status' => TRUE,
				'data' => $available,
			));
		}catch(Exception $e){
			$this->response(array(
				'status' => FALSE,
				'message' => $e->getMessage(),
			));
		}
	}
	
	/* [GET] USER ACCOUNT VIA EMAIL
	Get user account via Email
	----------------------------------------------------------*/
	public function userAccountDetails_get(){
		try {
			$this->load->model('main/user_model');
			
			if($this->get('email')){
				$matches = $this->user_model->read(
					array('email' => $this->get('email')),
					null,
					'id,username,email'
				);
			}else{
				$matches = "";
			}
			
			$this->response(array(
				'status' => TRUE,
				'data' => $matches,
			));
		}catch(Exception $e){
			$this->response(array(
				'status' => FALSE,
				'message' => $e->getMessage(),
			));
		}
	}
	
	/* [POST] RESET USER PASSWORD
	Reset password of the user
	----------------------------------------------------------*/
	public function resetPassword_post(){
		try {
			$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
			$resetPassword = substr(str_shuffle($chars),0,10); //generate RANDOM password
			
			$data = array(
				'password' => md5($resetPassword),
			);
			
			$this->load->model('main/user_model');
			$reset = $this->user_model->update(array('id'=>$this->post('id')),$data);
			
			$this->load->library('CA_Mailer', '', 'Mailer');
			
			$mailing = $this->Mailer->send(array(
				'email' => $this->post('email'),
				'type' => 'account_password',
				'data' =>  array(
				'resetPassword' => $resetPassword,
				),
			));
			
			$this->response(array(
				'status' => 'TRUE',
				'success' => ($reset)?1:0,
				'password' => $resetPassword,
			));
		}catch(Exception $e){
			$this->response(array(
				'status' => FALSE,
				'message' => $e->getMessage(),
			));
		}
	}

	#change password
    public function changePassword_post(){
        #authenticate
		$this->load->model('main/user_model');
     
		$userProfile = $this->user_model->read(array('username'=>$this->post('username'),'password'=>md5($this->post('old_pass'))));
	
		$reset = FALSE;
        $status = FALSE;

        if($userProfile){
            if($this->post('new_pass')==$this->post('con_pass')){
                $data = array(
                    'password' => md5($this->post('new_pass')),
                );

                $reset = $this->user_model->update(array('username'=>$this->post('username')),$data);

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
            	
				$status = TRUE;
            	$reset = TRUE;
            } 
        } 

        $this->response(array(
            'status' => $status,
            'success' => ($reset)?1:0,
        ));
    }
	
	/* [POST] verify
	Attempt to verify a specific user
	----------------------------------------------------------*/
	public function verify_post(){
		$this->db->trans_begin();
		try {
			$this->load->model('main/user_model');
			
			// Get basic user data from db_main.user
			$user = $this->user_model->read(array(
				'id' => $this->post('user_id'),
			));
			
			if($user[0]->type==1){
				// Member verification attempt
				$this->load->model('member/verification_model');
			}else if($user[0]->type==2){
				// Provider verification attempt
				$this->load->model('provider/verification_model');
			}
			
			// Attempt to set status=1 to user-code matches
			$affectedUsers = $this->verification_model->update(array(
				'user_id' => $this->post('user_id'),
				'code' => $this->post('code'),
			), array(
				'status' => 1,
			));
			
			if($affectedUsers===0){
				throw new Exception('Unable to verify using the code "'.$this->post('code').'".');
			}else if($affectedUsers===1){
				// Successful, no further actions
			}else{
				throw new Exception('Internal Error: Multiple record matches with same [user_id] and [code].');
			}
			
			// Commit database queries if no error is encountered
			$this->db->trans_commit();
			$this->response(array(
				'status' => TRUE,
			));
		}catch(Exception $e){
			// Error, roll-back queries!
			$this->db->trans_rollback();
			$this->response(array(
				'status' => FALSE,
				'message' => $e->getMessage(),
			));
		}
	}
	
	/* [GET] fullUserInfo
	Get full user information via USERNAME
	----------------------------------------------------------*/
	public function fullUserInfo_get(){
		try {
		
			$getUserType = $this->getUserType($this->get('username'));
			
			if($getUserType != null){
				$db = &get_instance()->db;
				$main_user = db_main.'.user';
				$member_profile = db_member.'.profile';
				$provider_profile = db_provider.'.profile';
				$member_account = db_member.'.account';
				$provider_account = db_provider.'.account';
				
				$fields = '
					user.*,
					account.activity AS activity,
					profile.*
					';
				
				$condition = "(user.username = '".$this->get('username')."')";
				$relation_profile = ($getUserType->type==1)?$member_profile:$provider_profile;
				$relation_account = ($getUserType->type==1)?$member_account:$provider_account;
				
				$db->select($fields)
					->from($main_user)
					->where($condition)
					->join($relation_profile, 'user.id = profile.user_id')
					->join($relation_account, 'user.id = account.id');
					
				$userInfo = $db->get()->row();
				
				// Expound location
				$this->load->model('main/location_model');
				$location = $this->location_model->read(intval($userInfo->location), 'country', 'location.id,city,state,zip,country.name as country, country as country_id, coord_lat, coord_lng');
				
				if(count($location)==1){
					$userInfo->location = $location[0];
				}else{
					$userInfo->location = array('id'=>0, 'city'=>'', 'state'=>'', 'zip'=>'', 'country'=>'', 'country_id'=>0, 'coord_lat'=>100, 'coord_lng'=>100);
				}
				
				#Respond with requested user data
				$this->response(array(
					'status' => 'TRUE',
					'data' => $userInfo,
				));
			}else{
				throw new Exception("User not found!");
			}
			
		}catch(Exception $e){
			$this->response(array(
				'status' => 'FALSE',
				'message' => $e->getMessage(),
			));
		}
	}
	
	#Helper Function
	private function getUserType($username){
		try {
			$this->load->model('main/user_model');
			$fields = '
				user.*
				';
			
			#Provider
			$username = "username='".$username."'";
			
			$condition = "(".$username.")";
			
			$user = $this->user_model->read(
				$condition,
				'',
				$fields
			);
		
			return $user[0];
		}catch(Exception $e){
			return null;
		}
	}
}
