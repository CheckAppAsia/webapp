<?php
require(APPPATH.'libraries/REST_Controller.php');
class Branches extends REST_Controller {
	
	public function __construct() {
		parent::__construct();

		$this->load->model('pharmacy/branches_model');
	}
	
	public function create_post() {
		$data = array (
				'pharma_id' => $this->post('pharma_id'),
				'code' => $this->post('code'),
				'name' => $this->post('name'),
				'address' => $this->post('address'),
				'phone_number' => $this->post('phone_number'),
				'email_address' => $this->post('email_address'),
				'status' => 1,
				'date_created' => time()
		);
		
		$result = $this->branches_model->create($data);
		
		if(is_bool($result))
			$this->response(array('status' => 'FALSE', 'message' => 'Pharmacy Branch Registration failed.'));
		else
			$this->response(array('status' => 'TRUE', 'message' => 'Pharmacy Branch Registered.', 'id' => $result));
	}
	
	public function getBranchByCode_get() {
		$pharma = $this->branches_model->read(array('code' => $this->get('code')));
		
		if(count($pharma) > 0 )
			$this->response(array('status' => 'TRUE', 'message' => 'Existing Pharmacy', 'data' => $pharma));
		else
			$this->response(array('status' => 'FALSE', 'message' => 'No Existing Pharmacy.'));
	}
	
	public function getBranches_get() {
		$pharma = $this->branches_model->read();
		
		if(count($pharma) > 0 )
			$this->response(array('status' => 'TRUE', 'message' => 'Existing Pharmacy', 'data' => $pharma));
		else
			$this->response(array('status' => 'FALSE', 'message' => 'No Existing Pharmacy.'));
	}
	
	public function getBranchByPharma_get() {
		$pharma = $this->branches_model->read(array('pharma_id' => $this->get('pharma_id')));
		
		if(count($pharma) > 0 )
			$this->response(array('status' => 'TRUE', 'message' => 'Existing Pharmacy', 'data' => $pharma));
		else
			$this->response(array('status' => 'FALSE', 'message' => 'No Existing Pharmacy.'));
	}
	
	public function getBranchById_get() {
		$pharma = $this->branches_model->read(array('branch_id' => $this->get('id')));
		
		if(count($pharma) > 0 )
			$this->response(array('status' => 'TRUE', 'message' => 'Existing Pharmacy', 'data' => $pharma));
		else
			$this->response(array('status' => 'FALSE', 'message' => 'No Existing Pharmacy.'));
	}
	
	public function updateBranch_post() {
		$data = array (
			'code' => $this->post('code'),
			'name' => $this->post('name'),
			'address' => $this->post('address'),
			'phone_number' => $this->post('phone_number'),
			'email_address' => $this->post('email_address')
		);
		
		$result = $this->branches_model->update(array('branch_id' => $this->post('branch_id')), $data);
		
		if(!$result)
			$this->response(array('status' => 'FALSE', 'message' => 'Error in updating Pharmacy Branch information.'));
		
		$this->response(array('status' => 'TRUE', 'message' => 'Pharmacy Branch information updated.'));
	}
	
	public function updateBranchStatus_post() {
		$data = array (
			'status' => $this->post('status')
		);
		
		$result = $this->branches_model->update(array('pharma_id' => $this->post('branch_id')), $data);

		if(!$result)
			$this->response(array('status' => 'FALSE', 'message' => 'Error in updating Pharmacy Branch status.'));
		
		$this->response(array('status' => 'TRUE', 'message' => 'Pharmacy Branch status updated.'));
	}

	public function getUsers_get() {
		$this->load->model('pharmacy/users_model');
		$this->load->model('main/user_model');
		
		$users = $this->users_model->read(array('branch_id' => $this->get('branchId')));
		
		$count = count($users);
		for($i = 0; $i < $count; $i++) {
			$userInfo = $this->user_model->read(array('id' => $users[$i]->main_user_id));
			
			$users[$i]->mainUserInfo = $userInfo[0];
		}
		
		$this->response(array('status' => 'TRUE', 'message' => 'Branch Users', 'data' => $users));
	}
}