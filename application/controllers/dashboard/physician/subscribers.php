<?php
class Subscribers extends CA_Controller{
	public $layout= 'col3';
	
	public function __construct() {
		parent::__construct();
		$this->requireLogin();
	}
		
	public function index(){
		//
		//$this->carabiner->css('dashboard/physician/colleagues.css');
		//$this->carabiner->js('dashboard/physician/colleagues.js');
		//
		//$friend_list = $this->getPatients('friendList', array(
		//	'user_id' => $this->self['id'],
		//));
		//
		//$friend_request = $this->getPatients('friendRequests', array(
		//	'user_id' => $this->self['id'],
		//));
		//
		//$friend_invites = $this->getPatients('friendInvites', array(
		//	'user_id' => $this->self['id'],
		//));
		//
		//$this->render('dashboard/physician/colleagues',array(
		//	'friends' => json_decode($friend_list['data']),
		//	'requests' => json_decode($friend_request['data']),
		//	'invites' => json_decode($friend_invites['data']),
		//), "col3");
		
		$this->carabiner->css('dashboard/physician/subscribers.css');
		$this->carabiner->js('dashboard/physician/subscribers.js');
		
		$subscribers_list = $this->getPhysician('subscribersList', array(
			'user_id' => $this->self['id'],
		));
		
		//echo '<pre>';print_r(json_decode($subscribers_list['data']));die();
		
		$this->render('dashboard/physician/subscribers',array(
			'subscribers' => json_decode($subscribers_list['data']),
		), "col3");
			
    }
}