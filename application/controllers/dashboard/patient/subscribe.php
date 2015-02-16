<?php
class Subscribe extends CA_Controller {
	public $layout = 'col3';
	
	public function __construct() {
		parent::__construct();
		$this->requireLogin();
	}

	public function index() {
		//echo 1;die();
		$this->carabiner->css('dashboard/patient/subscribe.css');
		$this->carabiner->js('dashboard/patient/subscribe.js');
		
		$subscribe_list = $this->getPatients('subscribeList', array(
			'user_id' => $this->self['id'],
		));
		
		//print_r($subscribe_list);
		
		//
		//$friend_request = $this->getPatients('friendRequests', array(
		//	'user_id' => $this->self['id'],
		//));
		//
		//$friend_invites = $this->getPatients('friendInvites', array(
		//	'user_id' => $this->self['id'],
		//));
		
		$this->render('dashboard/patient/subscribe',array(
			'subscribes' => json_decode($subscribe_list['data']),
			//'requests' => json_decode($friend_request['data']),
			//'invites' => json_decode($friend_invites['data']),
		), "col3");
	}
}