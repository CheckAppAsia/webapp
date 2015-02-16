<?php
class Profile extends CA_Controller{
	public $layout = 'col3';
	
	public function __construct(){
		parent::__construct();
		$this->requireLogin();
	}
		
	public function index(){
		$this->carabiner->css('dashboard/institution/profile.css');
		$this->carabiner->js('dashboard/institution/profile.js');
		$this->render('dashboard/institution/profile', array(
			'right_chat' => true,
		));
    }
	
	public function save(){
		$updateInst = $this->postInstitution('info', array(
			'institution_id' => $this->self['id'],
			'name' => $this->input->post('name'),
			'description' => $this->input->post('description'),
			'address' => $this->input->post('address'),
			'landline1' => $this->input->post('landline1'),
			'landline2' => $this->input->post('landline2'),
			'mobile1' => $this->input->post('mobile1'),
			'mobile2' => $this->input->post('mobile2'),
		));
		
		if($updateInst['status']=='TRUE'){
			$this->notify(1, 'Successfully saved your institution information.');
			redirect(base_url('dashboard/institution/profile'));
		}else{
			$this->notify(0, $updateInst['message']);
			redirect(base_url('dashboard/institution/profile'));
		}
	}
	
}
