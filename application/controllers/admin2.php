<?php
class Admin extends CA_Controller{
	public  $layout = 'admin';
	
	public function index(){
		$this->carabiner->css('admin/login.css');
		$this->carabiner->js('admin/login.js');
		$this->render('admin/login');
    }
	
}