<?php
/*THIS FILE REPLACED EMR.PHP*/
#basic document rest, to be updated once db is final.
require(APPPATH.'libraries/REST_Controller.php');
class Document extends REST_Controller {
	
	public function __construct() {
		parent::__construct();
		
	}
	
	public function all_get(){
		try {
			// Determine return fields
			//$fields = ($this->get('fields'))?$this->get('fields'):'id,email,username,title,first_name,middle_name,last_name,birthdate,gender,language,ethnicity,race,religion,marital,address,location,coord_lat,coord_lng,profile_pic';
			$fields = '*';

			$condition = array('member_profile' => intval($this->get('id')));

			// Check [account] details
			$this->load->model('document/DocumentModel');
			$emrs = $this->DocumentModel->read($condition, '', $fields);
			if(count($emrs)===0){ throw new Exception('User not found'); }
			
			// Respond with requested user data
			$this->response(array(
				'status' => 'TRUE',
				'data' => $emrs,
			));
		}catch(Exception $e){
			$this->response(array(
				'status' => 'FALSE',
				'message' => $e->getMessage(),
			));
		}
	}

	public function createdocument_post(){
		$this->db->trans_begin();
		try {
			#document
			$this->load->model('document/DocumentModel');
			
			$params = array();
			if($this->input->post('type') != null)
				$params['type'] = $this->input->post('type');
			if($this->input->post('member_profile') != null)
				$params['member_profile'] = $this->input->post('member_profile');
			if($this->input->post('provider_profile') != null)
				$params['provider_profile'] = $this->input->post('provider_profile');
			if($this->input->post('clinic_profile') != null)
				$params['clinic_profile'] = $this->input->post('clinic_profile');
			if($this->input->post('status') != null)
				$params['status'] = $this->input->post('status');
			
			$this->DocumentModel->create($params);
			/* TO BE IMPLEMENTED | CURRENTLY UNSUPPORTED
			
			#user_profile
			$this->load->model('document/EmrUserProfileModel');
			
			#member
			$params = array();
			if($this->input->post('member_profile') != null)
				$params['user_id'] = $this->input->post('member_profile');
			
			
			$this->EmrUserProfileModel->create($params);

			#provider
			$params = array();
			if($this->input->post('provider_profile') != null)
				$params['user_id'] = $this->input->post('provider_profile');
			
			
			$this->EmrUserProfileModel->create($params);

			#institution_profile
			$this->load->model('document/DocumentClinicProfileModel');

			$params = array();
			if($this->input->post('institution_profile') != null)
				$params['institution_id'] = $this->input->post('institution_profile');
			
			
			$this->DocumentClinicProfileModel->create($params);
			*/
			
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
}