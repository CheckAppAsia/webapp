<?php
require(APPPATH.'libraries/REST_Controller.php');
class Social extends REST_Controller {

    /* [GET] NEWSFEED 
    Get list of specific patient's newsfeed 
    -------------------------------------------------------*/
    public function newsfeed_get(){
        try {
            // Determine return fields
            $fields = ($this->get('fields'))?$this->get('fields'):'*';
            
			// Check [health] details
            $this->load->model('social/post_model');
            $newsfeed = $this->post_model->read(array('target_id'=>$this->get('target_id')), NULL, $fields);
            //if(count($emergency_contact)===0){ throw new Exception('Emergency Contacts not found'); }

            // Respond with requested user data
            $this->response(array(
                'status' => 'TRUE',
                'data' => $newsfeed,
            ));
        }catch(Exception $e){
            $this->response(array(
                'status' => 'FALSE',
                'message' => $e->getMessage(),
            ));
        }
    }

    /* [POST] NEWSFEED 
    Post specific patient's newsfeed 
    -------------------------------------------------------*/
    public function newsfeed_post(){
        $this->db->trans_begin();
        try {
            $this->load->model('social/post_model');
            $this->post_model->create(array(
                'user_type' => $this->post('user_type'),
                'user_id' => $this->post('user_id'),
                'target_type' => $this->post('target_type'),
                'target_id' => $this->post('target_id'),
                'message' => $this->post('message'),
                'attach_type' => $this->post('attach_type'),
                'attach_data' => $this->post('attach_data'),
                'privacy' => $this->post('privacy'),
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

	public function friends_get() {
		try {
			$this->load->model('social/friends_model');
			
			#User Friend (MIGRATE TO MODEL QUERY)
			$social_friends = db_social.'.friends';
			$member_account = db_member.'.account';
			$member_profile = db_member.'.profile';
			$provider_account = db_provider.'.account';
			$provider_profile = db_provider.'.profile';
			
			$recent_day = 10;
			
			$db = &get_instance()->db;
			#END
			
			$fields = '
				friends.*,
				
				account.id AS account_id,
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
			
			#Friends Condition 1 (current user is user_id_1)
			$sets_of_condition = array();
			
			$uid = 'user_id_1='.$this->get('user_id');
			array_push($sets_of_condition,$uid);
			$type = 'type='.$this->get('user_type');
			array_push($sets_of_condition,$type);
			
			$status = "";
			switch($this->get('type')){
				case 'added':
					$status = 'status_1=1 AND status_2=1';
					break;
				case 'recent':
					$status = 'status_1=1 AND status_2=1';
					$updated = 'friends.updated >= DATE_SUB(CURDATE(), INTERVAL '.$recent_day.' DAY)';
					array_push($sets_of_condition,$updated);
					break;
				case 'friend_request':
					$status = 'status_1=0 AND status_2=1';
					break;
				case 'sent_request':
					$status = 'status_1=1 AND status_2=0';
					break;
				default:
					break;
			}
			array_push($sets_of_condition,$status);
			
			$condition_1 = "(".implode(") AND (",$sets_of_condition).")";
			
			// $friends_1 = $this->friends_model->read(
			// 	$condition_1,
			// 	'account_2,profile_2',
			// 	$fields
			// );
			
			#User Friend (MIGRATE TO MODEL QUERY)
			$relation_account = ($this->get('user_type')==1)?$member_account:$provider_account;
			$relation_profile = ($this->get('user_type')==1)?$member_profile:$provider_profile;
			
			$db->select($fields)
				->from($social_friends)
				->where($condition_1)
				->join($relation_account, 'friends.user_id_2 = account.id')
				->join($relation_profile, 'friends.user_id_2 = profile.user_id');
				
			$friends_1 = $db->get()->result_array();
			#END
			
			#Friends Condition 2 (current user is user_id_2)
			$sets_of_condition = array();
			
			$uid = 'user_id_2='.$this->get('user_id');
			array_push($sets_of_condition,$uid);
			$type = 'type='.$this->get('user_type');
			array_push($sets_of_condition,$type);
			
			$status = "";
			switch($this->get('type')){
				case 'added':
					$status = 'status_1=1 AND status_2=1';
					break;
				case 'recent':
					$status = 'status_1=1 AND status_2=1';
					$updated = 'friends.updated >= DATE_SUB(CURDATE(), INTERVAL '.$recent_day.' DAY)';
					array_push($sets_of_condition,$updated);
					break;
				case 'friend_request':
					$status = 'status_1=1 AND status_2=0';
					break;
				case 'sent_request':
					$status = 'status_1=0 AND status_2=1';
					break;
				default:
					break;
			}
			array_push($sets_of_condition,$status);
			
			$condition_2 = "(".implode(") AND (",$sets_of_condition).")";
			
			// $friends_2 = $this->friends_model->read(
			// 	$condition_2,
			// 	'account_1,profile_1',
			// 	$fields
			// );
			
			#User Friend (MIGRATE TO MODEL QUERY)
			$relation_account = ($this->get('user_type')==1)?$member_account:$provider_account;
			$relation_profile = ($this->get('user_type')==1)?$member_profile:$provider_profile;
			$db->select($fields)
				->from($social_friends)
				->where($condition_2)
				->join($relation_account, 'friends.user_id_1 = account.id')
				->join($relation_profile, 'friends.user_id_1 = profile.user_id');
				
			$friends_2 = $db->get()->result_array();
			#END
			
			$friend_list = array_merge($friends_1,$friends_2);
		
			#Respond with requested user data
			$this->response(array(
				'status' => 'TRUE',
				'data' => $friend_list,
			));
		}catch(Exception $e){
			$this->response(array(
				'status' => 'FALSE',
				'message' => $e->getMessage(),
			));
		}
	}
	
	public function updateUserRelation_post() {
		$this->db->trans_begin();
		try {
			$this->load->model('social/friends_model');
			
			#Validate and Filter fields
			$fields = $this->friends_model->filter(
				$this->post(NULL, TRUE),
				array('status_1','status_2','type')
			);
			
			if(count($fields)===0){
				throw new Exception('No fields to update');
			}
			
			#Attempt to update the appointment
			$this->friends_model->update(array(
				'user_id_1' => $this->post('user_id_1'),
				'user_id_2' => $this->post('user_id_2'),
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
	
	public function addUserRelation_post() {
		$this->db->trans_begin();
		try {
			$current_date = date('Y-m-d H:i:s');
		
			#Add [friends] record
			$this->load->model('social/friends_model');
			$staff = $this->friends_model->create(array(
				'user_id_1' => $this->post('user_id'),
				'user_id_2' => $this->post('target_id'),
				'status_1' => 1,
				'status_2' => 0,
				'type' => $this->post('type'),
				'updated' => $current_date,
				'created' => $current_date,
			));
			
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
	
	public function relationData_get() {
		$this->db->trans_begin();
		try {
			$this->load->model('social/friends_model');
			
			$current_user = '';
			
			$fields = '
				friends.*,
				';
				
			$condition = array(
				'user_id_1' => $this->get('user_id'),
				'user_id_2' => $this->get('target_id'),
			);
			
			$friendData_1 = $this->friends_model->read(
				$condition,
				'',
				$fields
			);
			
			$condition = array(
				'user_id_1' => $this->get('target_id'),
				'user_id_2' => $this->get('user_id'),
			);
			
			$friendData_2 = $this->friends_model->read(
				$condition,
				'',
				$fields
			);
		
			$friendData = array_merge($friendData_1,$friendData_2);
			
			if(isset($friendData_1) && !empty($friendData_1)){ $friendData['current_user']="user_id_1"; }
			if(isset($friendData_2) && !empty($friendData_2)){ $friendData['current_user']="user_id_2"; }
		
			$this->response(array(
				'status' => 'TRUE',
				'data' => $friendData,
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

}
