<?php
class Frontpage extends CA_Controller{
		
	public function index(){
		if(isset($this->self['id'])){
			// Logged in, send to Dashboard Overview
			redirect(base_url('dashboard/'.$this->self['utype'].'/overview'));
		}else{
			// Not logged in, show web home
			$this->carabiner->css('website/welcome.css');
			$this->carabiner->js('website/welcome.js');
			$this->render('website/welcome');
		}
    }
	
}