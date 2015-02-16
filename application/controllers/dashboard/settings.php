<?php
class Settings extends CA_Controller{
	public $layout = 'col3';
	
	public function __construct() {
		parent::__construct();
		$this->requireLogin();
	}
	
	#change password
	public function changePassword(){
		$changePassword = $this->postUser('changePassword', array(
			'id' => $this->self['id'],
			'username' => $this->self['username'],
			'email' => $this->self['email'],
			'old_pass' => $_POST['old_pass'],
			'new_pass' => $_POST['new_pass'],
			'con_pass' => $_POST['con_pass'],
		));
		echo json_encode($changePassword);
	}

	#change privacy settings value
	public function changePrivacy(){
		$setting_id = $_POST['setting_id'];
		$setting_val = $_POST['setting_val'];
		$setting['status'] = 0;
		$setting['message'] = 0;
		
		$this->load->library('user_settings');
		$res = $this->user_settings->changeSetting($this->self['id'],$setting_id,$setting_val);

		if($res){
			$setting['status'] = 1;
		}
		echo json_encode($setting);
		
		
	}


	/* ACCOUNT SETTINGS
	Edit global account settings
	-------------------------------------------------------*/
	public function index(){
		$this->carabiner->css('dashboard/settings.css');
		$this->carabiner->js('dashboard/settings/settings.js');
		$this->render('dashboard/settings', array(
			'topnav' => 'top_patient_profile',
		));
    }
	
	/* PRIVACY SETTINGS
	Change profile visibility
	-------------------------------------------------------*/
	public function privacy(){
		$this->carabiner->css('dashboard/settings.css');
		$this->carabiner->js('dashboard/settings/privacy.js');

		//$this->load->library('user_settings');
		//$my_settings = $this->user_settings->retrieveSettings($this->self['id']);
		$my_settings = array(0,0,0);
		
		$this->render('dashboard/privacy_set',array(
			'topnav' => 'top_patient_profile',
			'settings'=> $my_settings,
		));
	}
	
	/* SECURITY SETTINGS
	Change profile visibility
	-------------------------------------------------------*/
	public function security(){
		$this->render('dashboard/security_set', array(
			'topnav' => 'top_settings',
		));
	}
	
}