<?php
class Ajax extends CA_Controller{

	public function index(){
		echo 'Welcome to Checkapp Ajax';
	}
	
	public function friend(){
		
		$friend_data = array(
			'current_user' => $this->self['id'],
			'target_user' => 0,
		);
		
		if(!isset($_POST['action']) || empty($_POST['action'])){
			echo 'Action not found!';
		}else if($_POST['action'] == 'add'){
			$friend_data['target_user'] = $_POST['target_id'];
			$friend_data['user_relation_type'] = $_POST['user_relation_type'];
			$process = $this->postPatients('friendAdd',$friend_data);
			#notif start
			$this->load->library('notification');
			$res = $this->notification->friend_request_made($_POST['target_id'],$this->self['id']);	
			#notif end
		}else if($_POST['action'] == 'cancel'){
			$friend_data['target_user'] = $_POST['target_id'];
			$process = $this->postPatients('friendCancel',$friend_data);
		}else if($_POST['action'] == 'accept'){
			$friend_data['target_user'] = $_POST['target_id'];
			$process = $this->postPatients('friendAccept',$friend_data);
			#notif start
			$this->load->library('notification');
			$res = $this->notification->friend_request_accepted($_POST['target_id'],$this->self['id']);	
			#notif end
		}else if($_POST['action'] == 'reject'){
			$friend_data['target_user'] = $_POST['target_id'];
			$process = $this->postPatients('friendReject',$friend_data);
		}else if($_POST['action'] == 'remove'){
			$friend_data['target_user'] = $_POST['target_id'];
			$process = $this->postPatients('friendRemove',$friend_data);
		}
		
		if(isset($_POST['target_username']) && !empty($_POST['target_username'])){
			$url = base_url().'user/'.$_POST['target_username'];
			header('location: '.$url);
		}else{
			echo 1;
		}
		
	}
	
	public function subscribe(){
	
		$subscribe_data = array(
			'current_user' => $this->self['id'],
			'target_user' => 0,
		);
		
		if(!isset($_POST['action']) || empty($_POST['action'])){
			echo 'Action not found!';
		}else if($_POST['action'] == 'subscribe'){
			$subscribe_data['target_user'] = $_POST['target_id'];
			$process = $this->postPatients('subscribe',$subscribe_data);
			#notif start
			$this->load->library('notification');
			$res = $this->notification->user_subscribed($_POST['target_id'],$this->self['id']);	
			#notif end
		}else if($_POST['action'] == 'unsubscribe'){
			$subscribe_data['target_user'] = $_POST['target_id'];
			$process = $this->postPatients('unsubscribe',$subscribe_data);
		}else if($_POST['action'] == 'remove'){
			$subscribe_data['target_user'] = $_POST['target_id'];
			$process = $this->postPhysician('removeSubscriber',$subscribe_data);
		}
		
		if(isset($_POST['target_username']) && !empty($_POST['target_username'])){
			$url = base_url().'user/'.$_POST['target_username'];
			header('location: '.$url);
		}else{
			echo 1;
		}
		
	}

} 