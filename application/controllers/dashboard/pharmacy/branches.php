<?php
class Branches extends CA_Controller{
	public $layout = 'pharmacy';
	
	public function __construct() {
		parent::__construct();
		// $this->requireLogin();
	}
		
	public function index(){
		$this->load->config('checkapp_config');
		
		$statWords = $this->config->item('branchStatus');
		
		$branches = $this->getPharmacy_Branches('getBranchByPharma', array('pharma_id' => $this->self['pharma_id']));
		
		$this->carabiner->css('dashboard/pharmacy/overview.css');
		$this->carabiner->js('dashboard/pharmacy/overview.js');
		$this->render('dashboard/pharmacy/branches/index', array(
			'topnav' => 'top_pharmacy_branches',
			'branches' => $branches->data,
			'statWords' => $statWords
		));
    }
    
	public function view($branchId, $type = null){
		$this->load->config('checkapp_config');
		
		$statWords = $this->config->item('branchStatus');
		
		$branch = $this->getPharmacy_Branches('getBranchById', array('id' => $branchId));
		
		switch($type) {
			case 'users':
				$users = $this->getPharmacy_Branches('getUsers', array('branchId' => $branchId));
					
				$this->carabiner->css('dashboard/pharmacy/overview.css');
				$this->carabiner->js('dashboard/pharmacy/overview.js');
				$this->render('dashboard/pharmacy/branches/view_branch', array(
						'topnav' => 'top_pharmacy_branches',
						'branch' => $branch->data[0],
						'statWords' => $statWords,
						'content' => 'dashboard/pharmacy/branches/users',
						'content_data' => array('users'=> $users->data, 'status' => $this->config->item('branchUserStatus'), 'branch' => $branch->data[0])
				));
			break;
			case 'others':
				$users = array();
					
				$this->carabiner->css('dashboard/pharmacy/overview.css');
				$this->carabiner->js('dashboard/pharmacy/overview.js');
				$this->render('dashboard/pharmacy/branches/view_branch', array(
						'topnav' => 'top_pharmacy_branches',
						'branch' => $branch->data[0],
						'content' => 'dashboard/pharmacy/branches/other_products',
						'content_data' => array()
				));
			break;
			default:
				$products = $this->getPharmacy_Products('getProductsByPharmaBranch', array('getProductsByPharmaBranch_get'));
				$this->carabiner->css('dashboard/pharmacy/overview.css');
				$this->carabiner->js('dashboard/pharmacy/overview.js');
				$this->render('dashboard/pharmacy/branches/view_branch', array(
						'topnav' => 'top_pharmacy_branches',
						'branch' => $branch->data[0],
						'statWords' => $statWords,
						'content' => 'dashboard/pharmacy/branches/medicines',
						'content_data' => array()
				));
			break;
		}
    }
    
    public function add() {
    	if($this->input->post()) {
    		$bData = array (
    			'pharma_id' => 1, //todo: change dynamically
    			'code' => $this->input->post('code'),
    			'name' => $this->input->post('name'),
    			'address' => $this->input->post('address'),
    			'phone_number' => $this->input->post('phone_number'),
    			'email_address' => $this->input->post('email_address')
    		);
    		
    		$bUser = array (
    				'pharma_id' => $bData['pharma_id'],
    				'fname' => $this->input->post('fname'),
    				'lname' => $this->input->post('lname'),
    				'user_type' => $this->input->post('user_type'),
    				'username' => $this->input->post('username'),
    				'password' => $this->input->post('password'),
    				'email_address' => $this->input->post('bemail_address'),
    		);

    		$branch = $this->postPharmacy_Branches('create', $bData);
    		
    		if(!isset($branch->id))
    			$saveError = $branch->message;
    		else {
    			$bUser['branch_id'] = $branch->id;
    	    		
    			$result = $this->postPharmacy_Users('saveBranchUser', $bUser);
    			
    			redirect('/dashboard/pharmacy/branches');
    		}    		
    	}
    	
    	$this->carabiner->css('dashboard/pharmacy/overview.css');
    	$this->carabiner->js('dashboard/pharmacy/overview.js');
    	$this->render('dashboard/pharmacy/branches/add_branch', array(
    			'topnav' => 'top_pharmacy_branches',
    			'errorMessage' => (isset($saveError))?$saveError:FALSE,
    	));
    }
    
    public function addUser($branchId) {
    	if($this->input->post()) {
    		$bUser = array (
    				'pharma_id' => $this->input->post('pharma_id'),
    				'branch_id' => $this->input->post('branch_id'),
    				'fname' => $this->input->post('fname'),
    				'lname' => $this->input->post('lname'),
    				'user_type' => $this->input->post('user_type'),
    				'username' => $this->input->post('username'),
    				'password' => $this->input->post('password'),
    				'email_address' => $this->input->post('bemail_address'),
    		);
    		 
    		$result = $this->postPharmacy_Users('saveBranchUser', $bUser);
    		
    		redirect('/dashboard/pharmacy/branches/view/'.$bUser['branch_id'].'/users');
    	}
    	
    	$branch = $this->getPharmacy_Branches('getBranchById', array('id' => $branchId));
    	
    	$this->carabiner->css('dashboard/pharmacy/overview.css');
    	$this->carabiner->js('dashboard/pharmacy/overview.js');
    	$this->render('dashboard/pharmacy/branches/view_branch', array(
    			'topnav' => 'top_pharmacy_branches',
    			'branch' => $branch->data[0],
    			'content' => 'dashboard/pharmacy/branches/add_user',
    			'content_data' => array('branch' => $branch->data[0]),
    			'errorMessage' => (isset($saveError))?$saveError:FALSE,
    	));
    }
}
