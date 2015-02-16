<?php
class Notifications extends CA_Controller {
	public $layout = 'col3';
	
	public function __construct() {
		parent::__construct();
		$this->requireLogin();
		
		$this->load->library('notification');
		$notifs = $this->notification->get_notifications($this->self['id'], 0);
		$this->data['notifs'] = $notifs;
	}
	
	public function index() {
		$this->carabiner->css('dashboard/notifications.css');
		$this->render('dashboard/notifications', array(), "col3");
	}
	
	public function get_notifications(){
		$notifications = array();
		if($this->session->userdata('user_logged')){
			$threads = $this->getMessage('retrieveThreads',array('uid' => $this->session->userdata['user_data']['id']));
			$notifications['threads']=$threads;
			$this->load->library('notification');
			$notifs = $this->notification->get_notifications($this->session->userdata['user_data']['id'],0);
			$notifications['notifs']=$notifs;
		}
		echo json_encode($notifications);
	}
	
	//NOTIFICATION
	public function clicked() {
		$link = "#";
		switch($_POST['type']){
			case 1:
				// friend_request_made
				$this->load->library('notification');
				$res = $this->notification->notification_seen($_POST['id']);
				$link = $this->config->base_url()."user/".$_POST['data']."/profile";
				break;
			case 2:
				// friend_request_accepted
				$this->load->library('notification');
				$res = $this->notification->notification_seen($_POST['id']);
				$link = $this->config->base_url()."user/".$_POST['data']."/profile";
				break;
			case 3:
				// user_subscribed
				$this->load->library('notification');
				$res = $this->notification->notification_seen($_POST['id']);
				$link = $this->config->base_url()."user/".$_POST['data']."/profile";
				break;
			case 4:
				// commented_on_post
				$this->load->library('notification');
				$res = $this->notification->notification_seen($_POST['id']);
				$link = $this->config->base_url()."post/".$_POST['data'];
				break;
			case 5:
				// posted_on_wall
				$this->load->library('notification');
				$res = $this->notification->notification_seen($_POST['id']);
				$link = $this->config->base_url()."post/".$_POST['data'];
				break;
			case 6:
				// sent_message
				$this->load->library('notification');
				$res = $this->notification->notification_seen($_POST['id']);
				$link = $this->config->base_url()."dashboard/messages?id=".$_POST['data'];
				break;
			case 7:
				// booking_request_made
				$this->load->library('notification');
				$res = $this->notification->notification_seen($_POST['id']);
				$link = $this->config->base_url()."dashboard/physician/appointments/pending";
				break;
			case 8:
				// booking_request_accepted
				$this->load->library('notification');
				$res = $this->notification->notification_seen($_POST['id']);
				$link = $this->config->base_url()."dashboard/patient/appointments";
				break;
			case 9:
				// commented_on_post_on_wall
				$this->load->library('notification');
				$res = $this->notification->notification_seen($_POST['id']);
				$link = $this->config->base_url()."post/".$_POST['data'];
				break;
		}
		echo json_encode($link);

	}
}