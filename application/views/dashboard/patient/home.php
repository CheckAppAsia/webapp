<?php
require(APPPATH.'libraries/CA_Controller.php');
class Home extends CA_Controller {
	
	public function index() {
		$cuser = $this->session->userdata('user_data');
		
		if($cuser['type']==1){ $this->dashPatient(); }
		else if($cuser['type']==2){ $this->dashPhysician(); }
		else{}
	}
	
	public function dashPatient(){
		
		// fetch patient dashboard data summary
		
		// this->render patient shits
		
	}
	
	public function dashPhysician(){
		
		// fetch physician dashboard data summary
		
		// this->render physician shits
		
	}
	
}