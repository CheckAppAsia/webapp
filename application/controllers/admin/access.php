<?php 
class Access extends CA_Controller{
	public  $layout = 'admin';
	
	public function __construct() {
		parent::__construct();
		
		$this->config->load('checkapp_config');
	}

	public function index(){
		$this->carabiner->css('admin/login.css');
		$this->carabiner->js('admin/login.js');
		$this->render('admin/login');
    }
    
	public function login(){
		
		if($this->input->post()){
			$response = $this->postUser('login', $this->input->post());
			$response = (array)json_decode($response['user_data']);
			
			if($response['type'] != ADMIN_USER_TYPE) {
				$this->notify(0, 'Error Access Credentials');
			} else {
				$this->session->set_userdata('admin_logged', $response);
				redirect('/admin/dashboard');
			}
		} else {
			$this->notify(0, 'Error Access Credentials');
		}
		redirect('/admin');
    }
    
	public function logout(){
		$this->session->unset_userdata('admin_logged');
		
		redirect('/admin');
    }
}