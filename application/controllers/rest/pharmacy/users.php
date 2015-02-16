<?php
require(APPPATH.'libraries/REST_Controller.php');
class Users extends REST_Controller {
	
	public function __construct() {
		parent::__construct();

		$this->load->model('pharmacy/users_model');
	}
	
	public function saveUser_post() {
		$data = array (
				'pharma_id' => $this->post('pharma_id'),
				'fname' => $this->post('fname'),
				'lname' => $this->post('lname'),
				'user_type' => $this->post('user_type'),
				'main_user_id' => $this->saveUserCredentials($this->post('username'), $this->post('password'), $this->post('email_address')),
				'status' => 0,
				'date_created' => time()
		);
		
		$result = $this->users_model->create($data);
		
		if(is_bool($result))
			$this->response(array('status' => 'FALSE', 'message' => 'Pharmacy User Registration failed.'));
		else
			$this->response(array('status' => 'TRUE', 'message' => 'Pharmacy User Registered.', 'id' => $result));
	}
	
	public function saveBranchUser_post() {
		$data = array (
				'pharma_id' => $this->post('pharma_id'),
				'branch_id' => $this->post('branch_id'),
				'fname' => $this->post('fname'),
				'lname' => $this->post('lname'),
				'user_type' => $this->post('user_type'),
				'main_user_id' => $this->saveUserCredentials($this->post('username'), $this->post('password'), $this->post('email_address')),
				'status' => 2,
				'date_created' => time()
		);
		
		$result = $this->users_model->create($data);
		
		if(is_bool($result))
			$this->response(array('status' => 'FALSE', 'message' => 'Pharmacy User Registration failed.'));
		else
			$this->response(array('status' => 'TRUE', 'message' => 'Pharmacy Branch User Registered.', 'id' => $result));
	}
	
	private function saveUserCredentials($username, $password, $email) {
		$this->load->model('main/user_model');
		$user_id = $this->user_model->create(array(
				'type' => '4',
				'email' => $email,
				'username' => $username,
				'password' => $this->encryptPassword($password),
		));
		
		return $user_id;
	}
	
	
	private function encryptPassword($password) {
		return md5($password);
	}
	
	public function getUser_get() {
		$user = $this->users_model->read(array('user_id' => $this->get('id')));
		
		if(count($user) > 0 )
			$this->response(array('status' => 'TRUE', 'message' => 'Existing User', 'data' => $user));
		else
			$this->response(array('status' => 'FALSE', 'message' => 'No Existing User.'));
	}
	
	public function login_post() {
		$data = array (
			'username' => $this->post('username'),
			'password' => $this->encryptPassword($this->post('password'))
		);
		
		$result = $this->users_model->read($data);
		
		if(count($result) > 0 )
			$this->response(array('status' => 'TRUE', 'message' => 'Login Successful', 'data' => $result));
		else
			$this->response(array('status' => 'FALSE', 'message' => 'Login Failed.'));
	}
	
	public function updateUser_post() {
		$data = array (
			'fname' => $this->post('fname'),
			'lname' => $this->post('lname'),
		);
		
		$result = $this->users_model->update(array('user_id' => $this->post('user_id')), $data);
		
		if(!$result)
			$this->response(array('status' => 'FALSE', 'message' => 'Error in updating User.'));
		
		$this->response(array('status' => 'TRUE', 'message' => 'Pharmacy User information updated.'));
	}
	
	public function changePassword_post() {
		$data = array (
			'password' => $this->encryptPassword($this->post('password')),
		);
		
		$result = $this->users_model->update(array('user_id' => $this->post('user_id')), $data);
		
		if(!$result)
			$this->response(array('status' => 'FALSE', 'message' => 'Error in updating User.'));
		
		$this->response(array('status' => 'TRUE', 'message' => 'Pharmacy User information updated.'));
	}
	
	public function updateStatus_post() {
		$data = array (
			'status' => $this->post('status')
		);
		
		$result = $this->users_model->update(array('user_id' => $this->post('user_id')), $data);

		if(!$result)
			$this->response(array('status' => 'FALSE', 'message' => 'Error in updating Pharmacy User status.'));
		
		$this->response(array('status' => 'TRUE', 'message' => 'Pharmacy User status updated.'));
	}
}