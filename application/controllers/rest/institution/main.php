<?php
require(APPPATH.'libraries/REST_Controller.php');
class Main extends REST_Controller {
	
	public function __construct() {
		parent::__construct();

		$this->load->model('institution/institution_model');
	}
	
	public function register_post() {
		$data = array (
				'code' => $this->post('code'),
				'name' => $this->post('name'),
				'address' => $this->post('address'),
				'contact_number' => $this->post('contact_number'),
				'email_address' => $this->post('email_address'),
				'about' => $this->post('about'),
				'status' => 0,
				'date_created' => time()
		);
		
		$result = $this->institution_model->create($data);
		
		if(is_bool($result))
			$this->response(array('status' => 'FALSE', 'message' => 'Institution Registration failed.'));
		else
			$this->response(array('status' => 'TRUE', 'message' => 'Institution Registered.', 'id' => $result));
	}
	
	public function getInstitutionByCode_get() {
		$inst = $this->institution_model->read(array('code' => $this->get('code')));
		
		if(count($inst) > 0 )
			$this->response(array('status' => 'TRUE', 'message' => 'Existing Institution', 'data' => $inst));
		else
			$this->response(array('status' => 'FALSE', 'message' => 'No Existing Institution.'));
	}
	
	public function getInstitutionById_get() {
		$inst = $this->institution_model->read(array('id' => $this->get('id')));
		
		if(count($inst) > 0 )
			$this->response(array('status' => 'TRUE', 'message' => 'Existing Institution', 'data' => $inst));
		else
			$this->response(array('status' => 'FALSE', 'message' => 'No Existing Institution.'));
	}
	
	public function updateInstitution_get() {
		$data = array (
			'code' => $this->get('code'),
			'name' => $this->get('name'),
			'address' => $this->get('address'),
			'contact_number' => $this->get('contact_number'),
			'email_address' => $this->get('email_address'),
			'about' => $this->get('about')
		);
		
		$result = $this->institution_model->update(array('id' => $this->get('id')), $data);
		
		if(!$result)
			$this->response(array('status' => 'FALSE', 'message' => 'Error in updating Institution information.'));
		
		$this->response(array('status' => 'TRUE', 'message' => 'Institution Information updated.'));
	}
	
	public function updateInstitutionStatus_post() {
		$data = array (
			'status' => $this->post('status')
		);
		
		$result = $this->institution_model->update(array('id' => $this->post('id')), $data);

		if(!$result)
			$this->response(array('status' => 'FALSE', 'message' => 'Error in updating Institution status.'));
		
		$this->response(array('status' => 'TRUE', 'message' => 'Institution status updated.'));
	}
}