<?php
require(APPPATH.'libraries/REST_Controller.php');
class Institution extends REST_Controller {
	
	public function __construct(){
		parent::__construct();
		$this->load->model('institution_model', 'IM');
	}
	
	/*---------------------------------
	[POST] initialize
	Description:
		Create institution / sign-up process
	Parameters:
		(int) user_id* = original admin, initial institution representative
		(str) description* = about page text
		(str) address* = full address of institution, will be geocoded
		(str) landline1
		(str) landline2
		(str) mobile1
		(str) mobile2
	Response Object:
		(boo) status = if success of fail boolean
		(str) message = only is status=FALSE, the error message
	---------------------------------*/
	public function initialize_post(){
		$this->db->trans_begin();
		try {
			$this->load->model('user_model', 'UM');
			
			$user_id = $this->UM->add('account', array(
				'type' => 3,
				'username' => $this->post('username'),
				'password' => md5($this->post('password')),
				'email' => $this->post('email'),
			));
			
			$this->UM->add('profile', array(
				'user_id' => $user_id,
				'first_name' => $this->post('name'),
			));
			
			$this->IM->add('institution', array(
				"id" => $user_id,
				"name" => $this->post('name'),
				"description" => ($this->post('description'))?$this->post('description'):'',
				"address" => ($this->post('address'))?$this->post('address'):'',
				"landline1" => ($this->post('landline1'))?$this->post('landline1'):'',
				"landline2" => ($this->post('landline2'))?$this->post('landline2'):'',
				"mobile1" => ($this->post('mobile1'))?$this->post('mobile1'):'',
				"mobile2" => ($this->post('mobile2'))?$this->post('mobile2'):'',
				"coord_lat" => 100,
				"coord_lng" => 100,
			));
			
			$this->IM->add('admin', array(
				"user_id" => $user_id,
				"institution_id" => $user_id,
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
	
	/*---------------------------------
	[GET] info
	Description:
		Get specific institution information
	Parameters:
		(int) institution_id* = primary key institution identifier
		(int) user_id* = primary key user administrator
		~ either [institution_id] or [user_id] can be passed
	Response Object:
		(boo) status = if success of fail boolean
		(str) message = only is status=FALSE, the error message
		(obj) info = object containing institution information
	---------------------------------*/
	public function info_get(){
		try {
			if($this->input->get('institution_id')){
				$info = $this->IM->getPK('institution', $this->input->get('institution_id'));
			}else if($this->input->get('user_id')){
				$info = $this->IM->getByAdmin($this->input->get('user_id'));
			}
			
			if(!isset($info)){
				throw new Exception('Institution not found!');
			}
			
			$this->response(array(
				'status' => 'TRUE',
				'info' => ($this->input->get('json'))?json_encode($info):$info,
			));
		}catch(Exception $e){
			$this->response(array(
				'status' => 'FALSE',
				'message' => $e->getMessage(),
			));
		}
	}
	
	/*---------------------------------
	[POST] info
	Description:
		Update specific institution information
	Parameters:
		(int) institution_id* = primary key institution identifier
		(int) user_id* = primary key user administrator
		~ either [institution_id] or [user_id] can be passed
		(str) description = about page text
		(str) address = full address of institution, will be geocoded
		(str) landline1
		(str) landline2
		(str) mobile1
		(str) mobile2
	Response Object:
		(boo) status = if success of fail boolean
		(str) message = only is status=FALSE, the error message
	---------------------------------*/
	public function info_post(){
		$this->db->trans_begin();
		try {
			$this->load->model('user_model', 'UM');
			
			$updateArray = $this->IM->filterInput(array(
				'input' => $this->input->post(NULL, TRUE),
				'allow' => 'name,description,address,landline1,landline2,mobile1,mobile2',
				'atLeastOne' => true,
			));
			
			if(isset($updateArray['address'])){
				if($updateArray['address']!=''){
					$coords = array(100,100); // geocode
					$updateArray['coord_lat'] = $coords[0];
					$updateArray['coord_lng'] = $coords[1];
				}
			}
			if($this->input->post('institution_id')){
				$this->IM->update('institution', $this->post('institution_id'), $updateArray);
			}else if($this->input->post('user_id')){
				$this->IM->updateByAdmin('institution', $this->post('user_id'), $updateArray);
			}else{
				throw new Exception('You did not provide either an institution_id nor a user_id');
			}
			
			$this->UM->update('profile', $this->post('institution_id'), array(
				'first_name' => $updateArray['name'],
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
	
	/*---------------------------------
	[GET] requests
	Description:
		Get all Physician REQUESTS to be listed under this institution
	Parameters:
		(int) institution_id* = primary key institution identifier
		(int) page = page number, starts with 1. items per page is 10
	Response Object:
		(boo) status = if success of fail boolean
		(str) message = only is status=FALSE, the error message
		(arr) list = array, list of physicianRequest objects
	---------------------------------*/
	public function requests_get(){
		try {
			if(!$this->get('institution_id')){ throw new Exception('Institution ID must be provided'); }
			
			$prequests = $this->IM->getPhysicianListWithProfiles($this->get('institution_id'), 0);
			
			$this->response(array(
				'status' => 'TRUE',
				'list' => ($this->input->get('json'))?json_encode($prequests):$prequests,
			));
		}catch(Exception $e){
			$this->response(array(
				'status' => 'FALSE',
				'message' => $e->getMessage(),
			));
		}
	}
	
	/*---------------------------------
	[POST] approveRequest
	Description:
		APPROVE a specific Physician REQUEST to be listed under this institution
	Request:
		
	Response:
		
	---------------------------------*/
	public function approveRequest_post(){
		$this->db->trans_begin();
		try {
			
			// code here
			
		}catch(Exception $e){
			$this->db->trans_rollback();
			$this->response(array(
				'status' => 'FALSE',
				'message' => $e->getMessage(),
			));
		}
	}
	
	/*---------------------------------
	[POST] rejectRequest
	Description:
		REJECT a specific Physician REQUEST to be listed under this institution
	Request:
		
	Response:
		
	---------------------------------*/
	public function rejectRequest_dpost(){
		$this->db->trans_begin();
		try {
			
			// code here
			
		}catch(Exception $e){
			$this->db->trans_rollback();
			$this->response(array(
				'status' => 'FALSE',
				'message' => $e->getMessage(),
			));
		}
	}
	
	/*---------------------------------
	[GET] physicians
	Description:
		Get all ALREADY-APPROVED Physicians listed under this institution
	Request:
		
	Response:
		
	---------------------------------*/
	public function physicians_get(){
		try {
			if(!$this->get('institution_id')){
				$this->response(array('status'=>'FALSE','message'=>'ID must be provided'));
			}
			
			$physicians = $this->IM->getPhysicianListWithProfiles($this->get('institution_id'));
			
			$this->response(array(
				'status' => 'TRUE',
				'list' => ($this->input->get('json'))?json_encode($physicians):$physicians,
			));
		}catch(Exception $e){
			$this->response(array(
				'status' => 'FALSE',
				'message' => $e->getMessage(),
			));
		}
	}
	
	/*---------------------------------
	[POST] updatePhysician
	Description:
		Update physician information-connection under this institution
	Request:
		
	Response:
		
	---------------------------------*/
	public function updatePhysician_post(){
		$this->db->trans_begin();
		try {
			
			// code here
			
		}catch(Exception $e){
			$this->db->trans_rollback();
			$this->response(array(
				'status' => 'FALSE',
				'message' => $e->getMessage(),
			));
		}
	}
	
	/*---------------------------------
	[POST] removePhysician
	Description:
		Remove a specific physician under this institution listing
	Request:
		
	Response:
		
	---------------------------------*/
	public function removePhysician_post(){
		$this->db->trans_begin();
		try {
			
			// code here
			
		}catch(Exception $e){
			$this->db->trans_rollback();
			$this->response(array(
				'status' => 'FALSE',
				'message' => $e->getMessage(),
			));
		}
	}
	
	/*---------------------------------
	[GET] labs
	Description:
		Gets list of "checked" laboratory services
	Parameters:
		(int) institution_id* = primary key institution identifier
		(boo) json = pass as 1 to encode response into JSON
	Response Object:
		(boo) status = if success of fail boolean
		(str) message = only is status=FALSE, the error message
		(arr) labs = array, list of record_type IDs
	---------------------------------*/
	public function labs_get(){
		try {
			$labs = $this->IM->getAll('labs', array(
				'institution_id' => $this->input->get('institution_id'),
			));
			
			foreach($labs as &$lab){ $lab = intval($lab->record_type); }
			
			$this->response(array(
				'status' => 'TRUE',
				'labs' => ($this->input->get('json'))?json_encode($labs):$labs,
			));
		}catch(Exception $e){
			$this->response(array(
				'status' => 'FALSE',
				'message' => $e->getMessage(),
			));
		}
	}
	
	/*---------------------------------
	[POST] labs
	Description:
		Sets new list of "checked" laboratory services. Un-checks IDs not specified.
	Parameters:
		(int) institution_id* = primary key institution identifier
		(arr) labs = list of record type IDs
	Response Object:
		(boo) status = if success of fail boolean
		(str) message = only is status=FALSE, the error message
	---------------------------------*/
	public function labs_post(){
		$this->db->trans_begin();
		try {
			
			$this->IM->delete('labs', array(
				'institution_id' => $this->input->post('institution_id'),
			));
			foreach($this->input->post('labs') as $recordTypeId){
				$this->IM->add('labs', array(
					'institution_id' => $this->input->post('institution_id'),
					'record_type' => $recordTypeId,
				));
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
	
	/*---------------------------------
	[GET] services
	Description:
		Gets list of custom-names services of the institution
	Parameters:
		(int) institution_id* = primary key institution identifier
		(boo) json = pass as 1 to encode response into JSON
	Response Object:
		(boo) status = if success of fail boolean
		(str) message = only is status=FALSE, the error message
		(arr) services = array, list of custom service names
	---------------------------------*/
	public function services_get(){
		try {
			$services = $this->IM->getAll('services', array(
				'institution_id' => $this->input->get('institution_id'),
			));
			
			$this->response(array(
				'status' => 'TRUE',
				'labs' => ($this->input->get('json'))?json_encode($services):$services,
			));
		}catch(Exception $e){
			$this->response(array(
				'status' => 'FALSE',
				'message' => $e->getMessage(),
			));
		}
	}
	
	/*---------------------------------
	[POST] addService
	Description:
		Adds a new custom-named service for the institution
	Parameters:
		(int) institution_id* = primary key institution identifier
		(str) name* = name of the custom institution service
	Response Object:
		(boo) status = if success of fail boolean
		(str) message = only is status=FALSE, the error message
	---------------------------------*/
	public function addService_post(){
		$this->db->trans_begin();
		try {
			$serviceId = $this->IM->add('services', array(
				'institution_id' => $this->input->post('institution_id'),
				'name' => $this->input->post('name'),
			));
			
			$serviceInfo = $this->IM->getPK('services', $serviceId);
			
			$this->db->trans_commit();
			$this->response(array(
				'status' => 'TRUE',
				'info' => $serviceInfo,
			));
		}catch(Exception $e){
			$this->db->trans_rollback();
			$this->response(array(
				'status' => 'FALSE',
				'message' => $e->getMessage(),
			));
		}
	}
	
	/*---------------------------------
	[POST] deleteService
	Description:
		Deletes one of the custom-named service from the institution
	Parameters:
		(int) service_id* = primary key service identifier
	Response Object:
		(boo) status = if success of fail boolean
		(str) message = only is status=FALSE, the error message
	---------------------------------*/
	public function deleteService_post(){
		$this->db->trans_begin();
		try {
			$this->IM->delete('services', array(
				'id' => $this->input->get_post('service_id'),
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
	
}