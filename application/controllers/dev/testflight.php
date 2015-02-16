<?php
class Testflight extends CA_Controller {
	public function __construct() {
		parent::__construct();
	}
	
	public function index() {
		echo 'start ca based<br />';
		echo 'user <br />';
		$user = $this->postUser('test');
		debug($user);
		
		echo '<br />';
		echo '<br />';
		
		echo 'physician<br />';
		$physician = $this->postPhysician('test');
		debug($physician);
		
		echo '<br />';
		echo '<br />';
		
		echo 'patient<br />';
		$patient = $this->postPatients('test');
		debug($patient);
	}
}