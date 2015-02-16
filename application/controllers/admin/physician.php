<?php 
class Physician extends CA_Controller{
	public  $layout = 'admin';
	
	public function __construct() {
		parent::__construct();
	}

    public function verify($userId = null) {
    	$result = $this->postUser('setAuth', array(
						'user_id' => $userId,
						'status' => 1
						)
					);
    	
    	$this->notify(1, 'Physician successfully verified.');
    	
    	redirect('/admin/dashboard/physicians');
    }
    
    public function viewProfile($userId){
    	$this->config->load('checkapp_config');
    	
    	$physician = $this->postPhysician('retrievePhysician', array('userId' => $userId));
		
		$this->load->library('physician_documents');
		$physician_documents = $this->physician_documents->get_documents($userId,0);
		$this->data['physician_documents'] = $physician_documents;

    	$this->carabiner->css('admin/dashboard.css'); // for the layout css (temporary only)
    	$this->carabiner->css('admin/profile.css');
    	$this->carabiner->js('admin/profile.js');
    	$this->render('admin/physician_profile', array (
    			'physician' => $physician['profile'],
    			'status' => $this->config->item('user_status'),
    			'active' => 'physician'
    	));
    }
	
	public function verify_document(){
		$this->load->library('physician_documents');
		$save_document = $this->physician_documents->verify($_POST['id'],$_POST['uid'],$_POST['status']);
		echo json_encode($save_document);
	}
}
