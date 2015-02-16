<?php
class Services extends CA_Controller {
	public $layout = 'col3';
	
	public function __construct(){
		parent::__construct();
		$this->requireLogin();
	}
		
	public function index(){
		// Get ALL record types
		$this->load->model('Var_Model', 'VM');
		$allRecords = $this->VM->getAll('records');
		
		// Get CHECKED record types
		$yesRecords = $this->getInstitution('labs', array(
			'institution_id' => $this->self['institution']->id,
			'json' => 1,
		));
		$yesRecords = json_decode($yesRecords['labs']);
		
		// Get Custom-named Services
		$services = $this->getInstitution('services', array(
			'institution_id' => $this->self['institution']->id,
			'json' => 1,
		));
		$services = json_decode($services['labs']);
		
		$this->carabiner->css('dashboard/institution/service.css');
		$this->carabiner->js('dashboard/institution/service.js');
		$this->carabiner->js('_util/ajax.js');
		$this->carabiner->js('_util/alert_r.js');
		$this->render('dashboard/institution/service', array(
			'allRecords' => $allRecords,
			'yesRecords' => $yesRecords,
			'services' => $services,
			'right_chat' => true,
		));
    }
	
	public function saveRecordTypes(){
		$saveTypes = $this->postInstitution('labs', array(
			'institution_id' => $this->self['institution']->id,
			'labs' => array_keys($this->input->post('recordType')),
		));
		
		if($saveTypes['status']=='TRUE'){
			$this->notify(1, 'Successfully saved your your services.');
			redirect(base_url('dashboard/institution/services'));
		}else{
			$this->notify(0, $saveTypes['message']);
			redirect(base_url('dashboard/institution/services'));
		}
	}
	
	public function addService(){
		$this->ajaxResponse($this->postInstitution('addService', array(
			'institution_id' => $this->self['institution']->id,
			'name' => $this->input->post('name'),
		)));
	}
	
	public function removeService(){
		$this->ajaxResponse($this->postInstitution('deleteService', array(
			'service_id' => $this->input->post('id'),
		)));
	}
	
}
