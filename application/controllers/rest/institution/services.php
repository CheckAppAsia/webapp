<?php
require(APPPATH.'libraries/REST_Controller.php');
class Services extends REST_Controller {
	
	public function __construct() {
		parent::__construct();

		$this->load->model('institution/services_model');
		$this->load->model('institution/requirements_model');
	}
	
	public function register_post() {
		$data = array (				
				'institution_id' => $this->post('institution_id'),
				'code' => $this->post('code'),
				'name' => $this->post('name'),
				'address' => $this->post('address'),
				'contact_number' => $this->post('contact_number'),
				'email_address' => $this->post('email_address'),
				'about' => $this->post('about'),
				'status' => 0,
				'created' => date('Y-m-d H:i:s')
		);
		
		$result = $this->services_model->create($data);
		
		if(is_bool($result))
			$this->response(array('status' => 'FALSE', 'message' => 'Institution Service Registration failed.'));
		else
			$this->response(array('status' => 'TRUE', 'message' => 'Institution Service Registered.', 'id' => $result));
	}
	
	public function getServiceByCode_get() {
		$serv = $this->services_model->read(array('code' => $this->get('code')));
		
		if(count($serv) > 0 ) {
			$req = $this->getRequirements($serv[0]->id);
			
			$serv[0]->requirements = $req;
			
			$this->response(array('status' => 'TRUE', 'message' => 'Existing Institution Service', 'data' => $serv));
		}else
			$this->response(array('status' => 'FALSE', 'message' => 'No Existing Institution Service.'));
	}
	
	public function getServiceById_get() {
		$serv = $this->services_model->read(array('id' => $this->get('id')));
		
		if(count($serv) > 0 ) {
			$req = $this->getRequirements($serv[0]->id);
			$this->response(array('status' => 'TRUE', 'message' => 'Existing Institution Service', 'data' => $serv));
		} else
			$this->response(array('status' => 'FALSE', 'message' => 'No Existing Institution Service.'));
	}
	
	public function updateService_get() {
		$data = array (
			'code' => $this->get('code'),
			'name' => $this->get('name'),
			'address' => $this->get('address'),
			'contact_number' => $this->get('contact_number'),
			'email_address' => $this->get('email_address'),
			'about' => $this->get('about')
		);
		
		$result = $this->services_model->update(array('id' => $this->get('id')), $data);
		
		if(!$result)
			$this->response(array('status' => 'FALSE', 'message' => 'Error in updating Institution Service information.'));
		
		$this->response(array('status' => 'TRUE', 'message' => 'Institution Service Information updated.'));
	}
	
	public function updateServiceStatus_post() {
		$data = array (
			'status' => $this->post('status')
		);
		
		$result = $this->services_model->update(array('id' => $this->post('id')), $data);

		if(!$result)
			$this->response(array('status' => 'FALSE', 'message' => 'Error in updating Institution Service status.'));
		
		$this->response(array('status' => 'TRUE', 'message' => 'Institution Service status updated.'));
	}
	
	public function createRequirement_get() {
		$data = array (				
				'service_id' => $this->get('service_id'),
				'req_name' => $this->get('name'),
				'req_description' => $this->get('description'),
				'req_priority' => $this->get('priority'),
				'date_created' => time(),
				'status' => 0,
		);
		
		$result = $this->requirements_model->create($data);
		
		if(is_bool($result))
			$this->response(array('status' => 'FALSE', 'message' => 'Institution Service Requirement Registration failed.'));
		else
			$this->response(array('status' => 'TRUE', 'message' => 'Institution Service Requirement Registered.', 'id' => $result));
	}
	
	private function getRequirements($serviceId) {
		$req = $this->requirements_model->read(array('service_id' => $serviceId));
		
		if(count($req) == 0 ) 
			return NULL;
			
		return $req;
	}
	
	public function getRequirement_get() {
		$req = $this->requirements_model->read(array('id' => $this->get('id')));
		
		if(is_bool($req))
			$this->response(array('status' => 'FALSE', 'message' => 'Institution Service Requirement Registration failed.'));
		else
			$this->response(array('status' => 'TRUE', 'message' => 'Institution Service Requirement.', 'data' => $req));
	}
	
	public function updateRequirement_get() {
		$data = array (
				'req_name' => $this->get('name'),
				'req_description' => $this->get('description'),
				'req_priority' => $this->get('priority'),
		);
		
		$result = $this->requirements_model->update(array('requirement_id' => $this->post('requirement_id')), $data);
		
		if(!$result)
			$this->response(array('status' => 'FALSE', 'message' => 'Error in updating Institution Service Requirement information.'));
		
		$this->response(array('status' => 'TRUE', 'message' => 'Institution Service Information Requirement updated.'));
		
	}
	
	public function updateRequirementStatus_post() {
		$data = array (
				'status' => $this->post('status')
		);
		
		$result = $this->requirements_model->update(array('id' => $this->post('id')), $data);
		
		if(!$result)
			$this->response(array('status' => 'FALSE', 'message' => 'Error in updating Institution Service Requirement status.'));
		
		$this->response(array('status' => 'TRUE', 'message' => 'Institution Service Requirement status updated.'));
	}
}