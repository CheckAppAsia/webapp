<?php 
class Users extends CA_Controller{
	public  $layout = 'admin';
	
	public function __construct() {
		parent::__construct();
		
		if(!$this->session->userdata('admin_logged'))
			redirect('/admin');
		
		$this->config->load('checkapp_config');
	}
	
    public function index(){    	
    	$users = $this->getUser('getAdmins');

    	$this->carabiner->css('admin/dashboard.css'); // for the layout css (temporary only)
    	$this->carabiner->css('admin/profile.css');
    	$this->carabiner->js('admin/profile.js');
    	$this->render('admin/users', array (
    			'admins' => $users['data'],
    			'active' => 'users'
    	));
    }
    
    public function create() {
    	if($this->input->post()) {
    		$this->postUser('createAdmin', $this->input->post());
    	}
    	
    	redirect('/admin/users');
    }
}
