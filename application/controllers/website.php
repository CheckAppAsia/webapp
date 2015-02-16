<?php
class Website extends CA_Controller{
	
	public function about(){
		$this->carabiner->css('website/about.css');
		$this->carabiner->js('website/about.js');
		$this->render('website/about');
	}
	
	public function contact(){
		$this->carabiner->css('website/contact.css');
		$this->carabiner->js('website/contact.js');
		$this->render('website/contact');
	}
	
	public function privacy(){
		$this->carabiner->css('website/privacy.css');
		$this->carabiner->js('website/privacy.js');
		$this->render('website/privacy');
	}
	
}