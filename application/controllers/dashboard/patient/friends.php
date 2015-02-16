<?php
class Friends extends CA_Controller {
	public $layout = 'col3';
	
	public function __construct() {
		parent::__construct();
		$this->requireLogin();
	}

	/**
	 *	MODULE pages
	 *	-index() URL::dashboard/patient/friends
	 *	-recent() URL::dashboard/patient/friends/recent
	 *	-request() URL::dashboard/patient/friends/request
	 */
	
	/**
	 *	@PAGE FRIEND LIST
	 *	List all added friends of the current user
	 */
	public function index() {
		$friend_list = $this->getFriends();
		$friend_count = $this->countFriends($friend_list);
		
		$this->carabiner->css('dashboard/patient/friends/list.css');
		$this->carabiner->js('dashboard/patient/friends/list.js');
		$this->render('dashboard/patient/friends/list',array(
			'friends' => $friend_list['list']->data,
			'friend_count' => $friend_count,
			'topnav' => 'top_patient_friends',
		), "col3");
	}
	
	/** @TODO need to change rendered view (currently using list.php)
	 *	@PAGE RECENT FRIEND
	 *	List all recently added friends of the current user
	 *	Recently add for the past <10> days (value can be change in REST social.php)
	 */
	public function recent() {
		$friend_list = $this->getFriends();
		$friend_count = $this->countFriends($friend_list);
		
		$this->carabiner->css('dashboard/patient/friends/list.css');
		$this->carabiner->js('dashboard/patient/friends/list.js');
		$this->render('dashboard/patient/friends/list',array(
			'friends' => $friend_list['recent']->data,
			'friend_count' => $friend_count,
			'topnav' => 'top_patient_friends',
		), "col3");
	}
	
	/**
	 *	@PAGE FRIEND REQUEST
	 *	List of all friend request from others
	 *	List of all friend request sent by the current user to others
	 */
	public function request() {
		$friend_list = $this->getFriends();
		$friend_count = $this->countFriends($friend_list);
				
		$this->carabiner->css('dashboard/patient/friends/request.css');
		$this->carabiner->js('dashboard/patient/friends/request.js');
		$this->render('dashboard/patient/friends/request',array(
			'requests' => $friend_list['requests']->data,
			'invites' => $friend_list['invites']->data,
			'friend_count' => $friend_count,
			'topnav' => 'top_patient_friends',
		), "col3");
	}
	
	/**
	 *	AJAX Functions
	 *	-addFriend()
	 *	-rejectFriend()
	 *	-cancelFriend()
	 */
	
	/**
	 *	@FUNCTION ADD FRIEND
	 *	Ajax function for adding friends
	 */
	public function addFriend(){
		$getFriend = $this->getSocial('relationData', array(
			'user_id' => $this->self['id'],
			'target_id' => $this->input->post('target_id'),
		));
		
		if(isset($getFriend->data) && !empty($getFriend->data)){
			switch($getFriend->data->current_user){
				case 'user_id_1':
					$condition = array(
						'user_id_1' => $getFriend->data->{0}->user_id_1,
						'user_id_2' => $getFriend->data->{0}->user_id_2,
						'status_1' => 1,
						'status_2' => 0,
					);
					break;
				case 'user_id_2':
					$condition = array(
						'user_id_1' => $getFriend->data->{0}->user_id_1,
						'user_id_2' => $getFriend->data->{0}->user_id_2,
						'status_1' => 0,
						'status_2' => 1,
					);
					break;
				default:
					break;
			}
			
			$addFriend = $this->postSocial('updateUserRelation',$condition);
		}else if($this->input->post('target_id')!=0 || $this->input->post('target_id')!=''){
			$addFriend = $this->postSocial('addUserRelation', array(
				'user_id' => $this->self['id'],
				'target_id' => $this->input->post('target_id'),
				'type' => '1',
			));
		}
		
		redirect(base_url('dashboard/patient/friends/'));
	}
	
	/**
	 *	@FUNCTION ACCEPT FRIEND
	 *	Ajax function for accepting friend request
	 */
	public function acceptFriend(){
		$getFriend = $this->getSocial('relationData', array(
			'user_id' => $this->self['id'],
			'target_id' => $this->input->post('target_id'),
		));
		
		if(isset($getFriend->data) && !empty($getFriend->data)){
			switch($getFriend->data->current_user){
				case 'user_id_1':
					$condition = array(
						'user_id_1' => $getFriend->data->{0}->user_id_1,
						'user_id_2' => $getFriend->data->{0}->user_id_2,
						'status_1' => 1,
						'status_2' => 1,
					);
					break;
				case 'user_id_2':
					$condition = array(
						'user_id_1' => $getFriend->data->{0}->user_id_1,
						'user_id_2' => $getFriend->data->{0}->user_id_2,
						'status_1' => 1,
						'status_2' => 1,
					);
					break;
				default:
					break;
			}
			
			$addFriend = $this->postSocial('updateUserRelation',$condition);
		}else{
			//friend_not found
		}
		
		redirect(base_url('dashboard/patient/friends/'));
	}
	
	/**
	 *	@FUNCTION REJECT FRIEND
	 *	Ajax function for rejecting friend request
	 */
	public function rejectFriend(){
		$getFriend = $this->getSocial('relationData', array(
			'user_id' => $this->self['id'],
			'target_id' => $this->input->post('target_id'),
		));
		
		if(isset($getFriend->data) && !empty($getFriend->data)){
			switch($getFriend->data->current_user){
				case 'user_id_1':
					$condition = array(
						'user_id_1' => $getFriend->data->{0}->user_id_1,
						'user_id_2' => $getFriend->data->{0}->user_id_2,
						'status_1' => 0,
						'status_2' => 0,
					);
					break;
				case 'user_id_2':
					$condition = array(
						'user_id_1' => $getFriend->data->{0}->user_id_1,
						'user_id_2' => $getFriend->data->{0}->user_id_2,
						'status_1' => 0,
						'status_2' => 0,
					);
					break;
				default:
					break;
			}
			
			$addFriend = $this->postSocial('updateUserRelation',$condition);
		}else{
			//friend_not found
		}
		
		redirect(base_url('dashboard/patient/friends/'));
	}
	
	/**
	 *	@FUNCTION CANCEL FRIEND
	 *	Ajax function for cancelling friend request
	 */
	public function cancelFriend(){
		$this->rejectFriend();
	}
	
	/**
	 *	HELPER Functions
	 *	-getFriends()
	 *	-countFriends()
	 */
	 
	/**
	 *	@FUNCTION GET FRIEND
	 *	Helper function for fetching friends
	 */
	private function getFriends() {
		$friend_list = array(
			'list' => array(),
			'recent' => array(),
			'requests' => array(),
			'invites' => array(),
		);
	
		#All added friends
		$friend_list['list'] = $this->getSocial('friends', array(
			'user_id' => $this->self['id'],
			'type' => 'added',
			'user_type' => 1,
		));
		
		#Recently added friends
		$friend_list['recent'] = $this->getSocial('friends', array(
			'user_id' => $this->self['id'],
			'type' => 'recent',
			'user_type' => 1,
		));	
	
		#All incoming friend requests
		$friend_list['requests'] = $this->getSocial('friends', array(
			'user_id' => $this->self['id'],
			'type' => 'friend_request',
			'user_type' => 1,
		));
		
		#All sent friend requests
		$friend_list['invites'] = $this->getSocial('friends', array(
			'user_id' => $this->self['id'],
			'type' => 'sent_request',
			'user_type' => 1,
		));
		
		return $friend_list;
	}
	
	/**
	 *	@FUNCTION COUNT FRIEND
	 *	Helper function for counting friends
	 */
	private function countFriends($friends) {
		$friend_count = array(
			'list' => count($friends['list']->data),
			'recent' => count($friends['recent']->data),
			'requests' => count($friends['requests']->data),
			'invites' => count($friends['invites']->data),
			'total_request' => count($friends['requests']->data)+count($friends['invites']->data),
		);
		
		return $friend_count;
	}
}