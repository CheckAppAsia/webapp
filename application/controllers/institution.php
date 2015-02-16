<?php
class Institution extends CA_Controller{
	
	public function index(){
		$this->carabiner->css('website/welcome.css');
		$this->carabiner->js('website/welcome.js');
		$this->render('institution/home');
	}
	
	public function signup(){
		$initialize = $this->postInstitution('initialize', array(
			'user_id' => $signup['status'],
			'name' => $this->input->post('instname'),
			'description' => $this->input->post('description'),
			'address' => $this->input->post('address'),
			'landline1' => $this->input->post('landline1'),
			
			'username' => $this->input->post('username'),
			'password' => $this->input->post('password'),
			'email' => $this->input->post('email'),
		));
		
		if($initialize['status']=='TRUE'){
			redirect(base_url('account/login'));
		}else{
			redirect(base_url('account/login').'?error='.$initialize['message']);
		}
	}
	
	public function timeline($id){
		$institutionInfo = $this->getInstitutionData($id);
		
		$this->carabiner->css('_util/feed.css');
		$this->carabiner->js('_util/feed.js');
		$this->carabiner->js('_util/ajax.js');
		$this->carabiner->js('_util/alert_r.js');
		$this->carabiner->js('_util/moment.js');
		$this->carabiner->css('social/timeline.css');
		$this->carabiner->js('social/timeline.js');
		$this->render('social/timeline', array(
			'target' => $institutionInfo,
			'topnav' => 'top_institution',
		), 'col3');
	}
	
	public function profile($id){
		$institutionInfo = $this->getInstitutionData($id);
		
		$this->carabiner->css('user/institution/profile.css');
		$this->carabiner->js('user/institution/profile.js');
		$this->render('user/institution/profile', array(
			'target' => $institutionInfo,
			'topnav' => 'top_institution',
		), 'col3');
	}
	
	public function physicians($id){
		$institutionInfo = $this->getInstitutionData($id);
		
		$physicians = $this->getInstitution('physicians', array(
			'institution_id' => $id,
			'json' => 1,
		));
		$physicians = json_decode($physicians['list']);
		
		$this->carabiner->css('user/institution/physician.css');
		$this->carabiner->js('user/institution/physician.js');
		$this->render('user/institution/physicians', array(
			'target' => $institutionInfo,
			'topnav' => 'top_institution',
			'physicians' => $physicians,
		), 'col3');
	}
	
	public function services($id){
		$institutionInfo = $this->getInstitutionData($id);
		
		// Get ALL record types
		$this->load->model('Var_Model', 'VM');
		$allLabs = $this->VM->getAll('records');
		
		// Get CHECKED record types
		$yesLabs = $this->getInstitution('labs', array(
			'institution_id' => $id,
			'json' => 1,
		));
		$yesLabs = json_decode($yesLabs['labs']);
		
		// Get Custom-named Services
		$services = $this->getInstitution('services', array(
			'institution_id' => $this->self['institution']->id,
			'json' => 1,
		));
		$services = json_decode($services['labs']);
		
		$this->carabiner->css('user/institution/service.css');
		$this->carabiner->js('user/institution/service.js');
		$this->render('user/institution/service', array(
			'target' => $institutionInfo,
			'allLabs' => $allLabs,
			'yesLabs' => $yesLabs,
			'services' => $services,
			'topnav' => 'top_institution',
		), 'col3');
	}
	
	/* getInstitutionData()
	-----------------------------*/
	private function getInstitutionData($id){
		$user = $this->getUser('GetFullUserInfo', array(
			'id' => $id,
		));
		$return = json_decode($user['uprofile']);
		$return = $return[0];
		
		$institution = $this->getInstitution('info', array(
			'institution_id' => $id,
			'json' => 1,
		));
		$return->institution = json_decode($institution['info']);
		
		return $return;
		
	}
	
}