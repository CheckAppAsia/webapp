<?php
class Health extends CA_Controller{
	public $layout = 'col3';
	
	public function index(){
		$healths = $this->getPatients('health', array(
			'patient_id' => $this->self['id'],
			'format' => 'json',
		));
		
		$healths = array(
			
		);
		
		$profile = $this->getMember('profile', array(
			'id'=>$this->self['id'],
		));
		$profile->data = (object)array(
			'family_history' => '',
			'known_allergies' => '',
			'other' => '',
		);
		
		$this->carabiner->js('_util/alert_r.js');
		$this->carabiner->js('_util/ajax.js');
		$this->carabiner->css('dashboard/patient/health.css');
		$this->carabiner->js('dashboard/patient/health.js');
		$this->render('dashboard/patient/health', array(
			'profile' => $profile->data,
			'healths' => $healths,
			'topnav' => 'top_patient_health',
		));
	}
	
	
	public function update(){
		$UpdateREST = $this->postPatients('health', array(
			'patient_id' => $this->self['id'],
			'health_id' => $this->input->post('health_id'),
			'value' => $this->input->post('value'),
			'format' => 'json',
		));
		$this->ajaxResponse(array(
			'status' => ($UpdateREST['status']=='TRUE')?true:false,
		));
	}
}