<?php
require(APPPATH.'libraries/REST_Controller.php');
class Main extends REST_Controller {
	
	public function __construct() {
		parent::__construct();

		$this->load->model('pharmacy/pharmacy_model');
	}
	
	public function register_post() {
		$data = array (
				'code' => $this->post('code'),
				'name' => $this->post('name'),
				'address' => $this->post('address'),
				'phone_number' => $this->post('phone_number'),
				'email_address' => $this->post('email_address'),
				'status' => 0,
				'date_created' => time()
		);
		
		$result = $this->pharmacy_model->create($data);
		
		if(is_bool($result))
			$this->response(array('status' => 'FALSE', 'message' => 'Pharmacy Registration failed.'));
		else
			$this->response(array('status' => 'TRUE', 'message' => 'Pharmacy Registered.', 'id' => $result));
	}
	
	public function getPharmaByCode_get() {
		$pharma = $this->pharmacy_model->read(array('code' => $this->get('code')));
		
		if(count($pharma) > 0 )
			$this->response(array('status' => 'TRUE', 'message' => 'Existing Pharmacy', 'data' => $pharma));
		else
			$this->response(array('status' => 'FALSE', 'message' => 'No Existing Pharmacy.'));
	}
	
	public function getPharmaById_get() {
		$pharma = $this->pharmacy_model->read(array('pharma_id' => $this->get('id')));
		
		if(count($pharma) > 0 )
			$this->response(array('status' => 'TRUE', 'message' => 'Existing Pharmacy', 'data' => $pharma));
		else
			$this->response(array('status' => 'FALSE', 'message' => 'No Existing Pharmacy.'));
	}
	
	public function updatePharma_post() {
		$data = array (
			'code' => $this->post('code'),
			'name' => $this->post('name'),
			'address' => $this->post('address'),
			'phone_number' => $this->post('phone_number'),
			'email_address' => $this->post('email_address')
		);
		
		$result = $this->pharmacy_model->update(array('pharma_id' => $this->post('pharma_id')), $data);
		
		if(!$result)
			$this->response(array('status' => 'FALSE', 'message' => 'Error in updating Pharmacy information.'));
		
		$this->response(array('status' => 'TRUE', 'message' => 'Pharmacy information updated.'));
	}
	
	public function updatePharmaStatus_post() {
		$data = array (
			'status' => $this->post('status')
		);
		
		$result = $this->pharmacy_model->update(array('pharma_id' => $this->post('pharma_id')), $data);

		if(!$result)
			$this->response(array('status' => 'FALSE', 'message' => 'Error in updating Pharmacy status.'));
		
		$this->response(array('status' => 'TRUE', 'message' => 'Pharmacy status updated.'));
	}
}