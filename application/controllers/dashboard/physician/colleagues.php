<?php
class Colleagues extends CA_Controller{
	public $layout= 'col3';
	
	public function __construct() {
		parent::__construct();
		$this->requireLogin();
	}
		
	public function index(){
		$this->carabiner->css('dashboard/physician/colleagues.css');
		$this->carabiner->js('dashboard/physician/colleagues.js');
		
		# $friend_list = $this->getPatients('friendList', array(
		# 	'user_id' => $this->self['id'],
		# ));
		# 
		# $friend_request = $this->getPatients('friendRequests', array(
		# 	'user_id' => $this->self['id'],
		# ));
		# 
		# $friend_invites = $this->getPatients('friendInvites', array(
		# 	'user_id' => $this->self['id'],
		# ));
		
		$colleagues_list = $this->getColleagues();
		$colleagues_count = $this->countColleagues($colleagues_list);

		# echo"<pre>";print_r($colleagues_list);die();
		
		$this->carabiner->css('dashboard/patient/friends/list.css');
		$this->carabiner->js('dashboard/patient/friends/list.js');
		$this->render('dashboard/physician/colleagues/list',array(
			'friends' => $colleagues_list['list']->data,
			'friend_count' => $colleagues_count,
			'topnav' => 'top_physician_colleagues',
		), "col3");
		
		# $this->render('dashboard/physician/colleagues',array(
		# 	'friends' => json_decode($friend_list['data']),
		# 	'requests' => json_decode($friend_request['data']),
		# 	'invites' => json_decode($friend_invites['data']),
		# ), "col3");
    }
	
	/** @TODO need to change rendered view (currently using list.php)
	 *	@PAGE RECENT FRIEND
	 *	List all recently added friends of the current user
	 *	Recently add for the past <10> days (value can be change in REST social.php)
	 */
	public function recent() {
		$colleagues_list = $this->getColleagues();
		$colleagues_count = $this->countColleagues($colleagues_list);

		$this->carabiner->css('dashboard/patient/friends/list.css');
		$this->carabiner->js('dashboard/patient/friends/list.js');
		$this->render('dashboard/physician/colleagues/list',array(
			'friends' => $colleagues_list['recent']->data,
			'friend_count' => $colleagues_count,
			'topnav' => 'top_physician_colleagues',
		), "col3");
	}
	
	/**
	 *	@PAGE COLLEAGUE REQUEST
	 *	List of all colleague request from others
	 *	List of all colleague request sent by the current user to others
	 */
	public function request() {
		$colleagues_list = $this->getColleagues();
		$colleagues_count = $this->countColleagues($colleagues_list);

		$this->carabiner->css('dashboard/patient/friends/request.css');
		$this->carabiner->js('dashboard/patient/friends/request.js');
		$this->render('dashboard/physician/colleagues/request',array(
			'requests' => $colleagues_list['requests']->data,
			'invites' => $colleagues_list['invites']->data,
			'friend_count' => $colleagues_count,
			'topnav' => 'top_physician_colleagues',
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
		
		redirect(base_url('dashboard/physician/colleagues/'));
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
		
		redirect(base_url('dashboard/physician/colleagues/'));
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
		
		redirect(base_url('dashboard/physician/colleagues/'));
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
	private function getColleagues() {
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
			'user_type' => 2,
		));
		
		#Recently added friends
		$friend_list['recent'] = $this->getSocial('friends', array(
			'user_id' => $this->self['id'],
			'type' => 'recent',
			'user_type' => 2,
		));	
	
		#All incoming friend requests
		$friend_list['requests'] = $this->getSocial('friends', array(
			'user_id' => $this->self['id'],
			'type' => 'friend_request',
			'user_type' => 2,
		));
		
		#All sent friend requests
		$friend_list['invites'] = $this->getSocial('friends', array(
			'user_id' => $this->self['id'],
			'type' => 'sent_request',
			'user_type' => 2,
		));
		
		return $friend_list;
	}
	
	/**
	 *	@FUNCTION COUNT COLLEAGUES
	 *	Helper function for counting colleagues
	 */
	private function countColleagues($colleagues) {
		$colleagues_count = array(
			'list' => count($colleagues['list']->data),
			'recent' => count($colleagues['recent']->data),
			'requests' => count($colleagues['requests']->data),
			'invites' => count($colleagues['invites']->data),
			'total_request' => count($colleagues['requests']->data)+count($colleagues['invites']->data),
		);
		
		return $colleagues_count;
	}
	
	
}