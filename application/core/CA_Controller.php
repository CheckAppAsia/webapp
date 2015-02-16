<?php
class CA_Controller extends CI_Controller {
	protected $title = 'CheckApp.asia';
	protected $layout = 'col1';
	protected $self = array();
	protected $institution = array();
	protected $target = array();
	protected $data = array();
	
	public function __construct(){
		parent::__construct();
		
		// Global Logged-in User actions
		if($this->session->userdata('user_logged')){
			// Populate $this->self for use of children controllers
			$this->self = (array)$this->session->userdata('user_data');
			$utypes = array('','patient','physician','institution', 'pharmacy');
			$this->self['utype'] = $utypes[$this->self['type']];
			
			// Update account activity
			if($this->self['type']==1){
				// Update user activity time
				// $this->postMember('activity', array('id' => $this->self['id']));
				
			}else if($this->self['type']==2){
				// Update user activity time
				// $this->postProvider('activity', array('id' => $this->self['id']));
				
				// Populate $this->institution
				if($this->session->userdata('institution')){
					$this->institution = (array)$this->session->userdata('institution');
				}else{
					$this->institution = array('id'=>0);
				}
			} else if($this->self['type'] == 4) {
				
			}
		}
	}
	
	/* AJAX RESPONSE
	Output a JSON-encoded response
	-------------------------------------------------------*/
	protected function ajaxResponse($data){
		if($this->input->get_post('mirror')){
			$data['mirror'] = $this->input->get_post('mirror');
		}
		echo json_encode($data);
	}
	
	/* REQUIRE LOGIN
	Redirect to login page if user is not logged in
	-------------------------------------------------------*/
	protected function requireLogin(){
		if(!isset($this->self['id'])){
			redirect(base_url('account/login').'?return='.$this->uri->uri_string());
		}
	}
	
	/* NOTIFY
	Remember an alert message to be shown on next page
	-------------------------------------------------------*/
	protected function notify($type, $msg){
		$types = array('error','success','caution','info');
		$this->session->set_flashdata('alert_class', $types[$type]);
		$this->session->set_flashdata('alert_msg', $msg);
	}
	
	/* RENDER LAYOUT
	Display view enclosed with theme
	-------------------------------------------------------*/
	protected function render($view, $data=array()){
		/* THIS LIBRARY CALL NEEDS TO BE MIGRATED
		$this->load->library('profile_completion');
		$data['profile_completion'] = (isset($this->self['id'])) ? $this->profile_completion->check_completion($this->self['id'],$this->self['type']) : "";
		*/
		$data['profile_completion'] = '';
		
		// Include current user data into view data
		$data['currentUser'] = $this->self;
		
		// Check for alert messages
		$data['alert_class'] = $this->session->flashdata('alert_class');
		$data['alert_msg'] = $this->session->flashdata('alert_msg');
		
		// Include routed URI for sidebar active indicators
		$data['ruri'] = $this->uri->ruri_string();
		
		// Apply CA_Controller's data holder
		$data = array_merge($data, $this->data);
		
		// Load full theme
		$this->carabiner->css('_layouts/'.$this->layout.'.css');
		$this->carabiner->js('_layouts/'.$this->layout.'.js');
		$this->load->view('_layouts/main', array(
			'view' => $view,
			'data' => $data,
			'layout' => '_layouts/'.$this->layout,
			'title' => $this->title,
		));
	}
	
	/* CALL FUNNEL
	Organizes REST call requests and sends to baseRest
	-------------------------------------------------------*/
	public function __call($funcName, $args) {
		// Determine REST Method and Call name
		if(strpos($funcName,'post')===0){
			$apiType = substr($funcName, 4);
			$reqMeth = 'post';
		}else if(strpos($funcName,'get')===0){
			$apiType = substr($funcName, 3);
			$reqMeth = 'get';
		}
		
		// If REST Method and Call name are recognized
		if(isset($apiType) && isset($reqMeth)){
			// Check for REST URI Constant
			$apiConstant = 'REST_'.strtoupper($apiType).'_URL';
			if(!defined($apiConstant)){
// 				echo 'Unknown REST Constant: '.$apiConstant; die();
				return false;
			}
			// Send to executor and return response
			return $this->baseRest('rest'.$apiType, constant($apiConstant), $reqMeth, $args[0].'.json', $args[1]);
		}else{
			// Function name not recognized
			// echo 'Unknown function $this->'.$funcName.'();'; die();
			return false;
		}
	}
	
	/* BASE REST
	Initializes and executes requested REST call
	-------------------------------------------------------*/
	private function baseRest($varName, $apiUrl, $meth, $func, $data){
		if(!isset($this->$varName)){
			$this->load->library('Rest', array('server' => $apiUrl), $varName);
		}
		$data['format'] = 'json';
		return $this->$varName->$meth($func, $data);
	}
	
}
