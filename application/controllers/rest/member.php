<?php
require(APPPATH.'libraries/REST_Controller.php');
class Member extends REST_Controller {
	
	/* [GET] PROFILE
	Get member profile
	----------------------------------------------------------*/
	public function profile_get(){
		try {
			// Determine return fields
			$fields = ($this->get('fields'))?$this->get('fields'):'id,email,username,title,first_name,middle_name,last_name,birthdate,gender,language,ethnicity,race,religion,marital,address,city,state,country,location,coord_lat,coord_lng,profile_pic';
			
			// Check [account] details
			$this->load->model('member/account_model');
			$user_account = $this->account_model->read(intval($this->get('id')), 'profile', $fields);
			if(count($user_account)===0){ throw new Exception('User not found'); }
			
			// Expound location
			$this->load->model('main/location_model');
			$location = $this->location_model->read(intval($user_account[0]->location), 'country', 'location.id,city,state,zip,country.name as country, country as country_id, coord_lat, coord_lng');
			
			if(count($location)==1){
				$user_account[0]->location = $location[0];
			}else{
				$user_account[0]->location = array('id'=>0, 'city'=>'', 'state'=>'', 'zip'=>'', 'country'=>'', 'country_id'=>0, 'coord_lat'=>100, 'coord_lng'=>100);
			}
			
			// Respond with requested user data
			$this->response(array(
				'status' => 'TRUE',
				'data' => $user_account[0],
			));
		}catch(Exception $e){
			$this->response(array(
				'status' => 'FALSE',
				'message' => $e->getMessage(),
			));
		}
	}
	
	/* [POST] PROFILE
	Update a member profile
	----------------------------------------------------------*/
	public function profile_post(){
		$this->db->trans_begin();
		try {
			$this->load->model('member/profile_model');
			
			// Validate and Filter fields
			$fields = $this->profile_model->filter(
				$this->post(NULL, TRUE),
				array('title','first_name','middle_name','last_name','birthdate','gender','language','ethnicity','race','religion','marital','address','city','state','country','location','coord_lat','coord_lng','profile_pic')
			);
			if(count($fields)===0){
				throw new Exception('No fields to update');
			}
			
			// Attempt to update the profile
			$this->profile_model->update(array(
				'user_id' => $this->post('id'),
			), $fields);
			
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

    /* [GET] health
    Get list of specific patient's health values
    -------------------------------------------------------*/
    public function health_get(){
        try {
            // Determine return fields
            $fields = ($this->get('fields'))?$this->get('fields'):'user_id,history,allergies,remarks';

            // Check [health] details
            $this->load->model('member/health_model');
            $health_profile = $this->health_model->read(intval($this->get('id')), NULL, $fields);
            if(count($health_profile)===0){ throw new Exception('Health Profile not found'); }

            // Respond with requested user data
            $this->response(array(
                'status' => 'TRUE',
                'data' => $health_profile[0],
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
        $this->db->trans_begin();
		try {
			$this->load->model('member/health_model');
			
			// Validate and Filter fields
            $fields = $this->health_model->filter(
                $this->post(NULL, TRUE),
                array('history','allergies','remarks')
            );
			if(count($fields)===0){
                throw new Exception('No fields to update');
            }
            
			// Attempt to update the profile
            $this->health_model->update(array(
                'user_id' => $this->post('user_id'),
            ), $fields);

            // Commit database queries if no error is encountered
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
	
	/* [POST] APPOINTMENT
	Attempt to book an appointment
	----------------------------------------------------------*/
	public function appointment_post(){
		$this->db->trans_begin();
		try {
			$this->load->model('institution/AppointmentModel');
			
			$appointment_id = $this->AppointmentModel->create(array(
				'clinic_id' => $this->input->post('clinic_id'),
				'patient_id' => $this->input->post('patient_id'),
				'physician_id' => $this->input->post('physician_id'),
				'type' => $this->input->post('type'),
				'schedule' =>  $this->input->post('schedule'),
				
				// for follow-ups, ability to create appointment directly, not pending
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

    /* [GET] EMERGENCY CONTACT 
    Get list of specific patient's emergency contacts 
    -------------------------------------------------------*/
    public function emergency_get(){
        try {
            // Determine return fields
            $fields = ($this->get('fields'))?$this->get('fields'):'*';

            // Check [health] details
            $this->load->model('member/emergency_model');
            $emergency_contact = $this->emergency_model->read(intval($this->get('id')), NULL, $fields);
            //if(count($emergency_contact)===0){ throw new Exception('Emergency Contacts not found'); }

            // Respond with requested user data
            $this->response(array(
                'status' => 'TRUE',
                'data' => $emergency_contact,
            ));
        }catch(Exception $e){
            $this->response(array(
                'status' => 'FALSE',
                'message' => $e->getMessage(),
            ));
        }
    }
	
	/* [POST] EMERGENCY CONTACT 
	Create emergency contact for member 
	----------------------------------------------------------*/
	public function emergency_post(){
		$this->db->trans_begin();
		try {
			$this->load->model('member/emergency_model');
			$this->emergency_model->create(array(
				'user_id' => $this->post('user_id'),
				'contact_type' => $this->post('contact_type'),
				'first_name' => $this->post('first_name'),
				'middle_name' => $this->post('middle_name'),
				'last_name' => $this->post('last_name'),
				'suffix' => $this->post('suffix'),
				'gender' => $this->post('gender'),
				'address_type' => $this->post('address_type'),
				'address' => $this->post('address'),
				'city' => $this->post('city'),
				'state' => $this->post('state'),
				'country' => $this->post('country'),
				'phonenum1' => $this->post('phonenum1'),
				'phonenum2' => $this->post('phonenum2'),
				'email' => $this->post('email'),
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
	
	/* [GET] SEARCH MEMBER 
	Search for member profile
	----------------------------------------------------------*/
	public function search_post(){
		try {
			// Determine return fields
			$fields = ($this->post('fields'))?$this->post('fields'):'id,email,username,title,first_name,middle_name,last_name,birthdate,gender,language,ethnicity,race,religion,marital,address,city,state,country,location,coord_lat,coord_lng,profile_pic';
			
			// Check [account] details
			$this->load->model('member/account_model');
			$user_account = $this->account_model->read(array("last_name LIKE '%".$this->post('last_name')."%'"=>NULL), 'profile', $fields);
			if(count($user_account)===0){ throw new Exception('User not found'); }
			
			// Respond with requested user data
			$this->response(array(
				'status' => 'TRUE',
				'data' => $user_account,
			));
		}catch(Exception $e){
			$this->response(array(
				'status' => 'FALSE',
				'message' => $e->getMessage(),
			));
		}
	}
}
