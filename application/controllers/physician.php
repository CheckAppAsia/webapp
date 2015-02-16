<?php
class Physician extends CA_Controller {
	
	/**
	 * Initialize REST services
	 */
	public function __construct() {
		parent::__construct();
	}
	
	/**
	 * Call REST service for viewing profile (get ID on session)
	 */
	public function index() {
		$this->addCSS('user/user.css');
		$this->addJS('user/user.js');
		$this->render('physician/timeline');
	}
	
	/**
	 * Call REST service for viewing patients
	 */
	public function patients() {
		$userData = $this->session->userdata('user_data');
				
		$patients = $this->getPhysician('retrievePatients', array(
				'user_id' => $userData['id']
				) );
		
		$userInfo = $this->getUser('GetFullUserInfo', array (
				'username' => $userData['username']
				));
		
		
		$patients = $patients['item'];
		
		
		$vData['patients'] = $patients;
		$vData['profile'] = json_decode($userInfo['uprofile']);
		
		$this->addCSS('physician/patients.css');
		$this->addJS('physician/patients.js');
		$this->render('physician/patients', $vData);
	}
	
	public function profile() {
		$this->addCSS('user/profile.css');
		$this->addJS('user/profile.js');
		$this->render('physician/profile');
	}
	
	/*public function colleagues() {
		$this->addCSS('physician/colleagues.css');
		$this->addJS('physician/colleagues.js');
		$this->render('physician/colleagues');
	}*/
	
	/* still need fix, proper link */
	public function record() {
		$this->addCSS('physician/record.css');
		$this->addJS('physician/record.js');
		$this->render('physician/record');
	}
	
	public function appointment() {
		$this->addCSS('physician/appointment.css');
		$this->addJS('physician/appointment.js');
		$this->render('physician/appointment');
	}
	
	/**
	 * Subscribe Physician
	 */
	public function subscribe(){
		if($this->input->post()){
			$data = array(
				'user_id' => $this->input->post('user_id'),
				'physician_id' => $this->input->post('physician_id'),
			);
			//notification
			$this->load->library('notification');
			$res = $this->notification->user_subscribed($this->input->post('physician_id'),$this->input->post('user_id'));	
			//notification
			$subscribe = $this->postPhysician('subscribe', $data);
			$this->redirect(true,$this->input->post('username'));
		}else{
			$this->denyAccess();
		}
	}
	
	/**
	 * Unsubscribe Physician
	 */
	public function unsubscribe(){
		if($this->input->post()){
			$data = array(
				'user_id' => $this->input->post('user_id'),
				'physician_id' => $this->input->post('physician_id'),
			);
			
			$unsubscribe = $this->postPhysician('unsubscribe', $data);
			$this->redirect(true,$this->input->post('username'));
		}else{
			$this->denyAccess();
		}
	}
	
	/**
	 * Add Friend
	 */
	public function addColleague(){
		if($this->input->post()){
			$receiver;
			$actor;
			if($this->input->post('user_id_1') && $this->input->post('user_id_2')){
				$data = array(
					'user_id_1' => $this->input->post('user_id_1'),
					'user_id_2' => $this->input->post('user_id_2'),
					'current_user' => $this->session->userdata('user_data')['id'],
					'isNew' => 0,
				);
				$receiver = $this->input->post('user_id_2');
				$actor = $this->input->post('user_id_1');
			}else{
				$data = array(
					'user_id_1' => $this->session->userdata('user_data')['id'],
					'user_id_2' => $this->input->post('target'),
					'isNew' => 1,
				);
				$receiver = $this->input->post('target');
				$actor = $this->session->userdata('user_data')['id'];
			}
			
			$addColleague = $this->postPhysician('addColleague', $data);
			
			//notification
			$this->load->library('notification');
			$res = $this->notification->friend_request_made($receiver,$actor);	
			//notification
			$this->redirect(true,$this->input->post('username'));
		}else{
			$this->denyAccess();
		}
	}
	
	/**
	 * Accept Friend
	 */
	public function acceptColleague(){
		if($this->input->post()){
			$data = array(
				'user_id_1' => $this->input->post('user_id_1'),
				'user_id_2' => $this->input->post('user_id_2'),
			);
			
			$acceptFriend = $this->postPhysician('acceptColleague', $data);
			
			//notification
			$this->load->library('notification');
			$res = $this->notification->friend_request_accepted($this->input->post('user_id_1'),$this->input->post('user_id_2'));	
			//notification
			$this->redirect(true,$this->input->post('username'));
		}else{
			$this->denyAccess();
		}
	}
	
	/**
	 * Reject Friend
	 */
	public function rejectColleague(){
		if($this->input->post()){
			$data = array(
				'user_id_1' => $this->input->post('user_id_1'),
				'user_id_2' => $this->input->post('user_id_2'),
			);
			
			$rejectFriend = $this->postPhysician('rejectColleague', $data);
			$this->redirect(true,$this->input->post('username'));
		}else{
			$this->denyAccess();
		}
	}
	
	/**
	 * Delete Friend
	 */
	public function deleteColleague(){
		if($this->input->post()){
			$data = array(
				'user_id_1' => $this->input->post('user_id_1'),
				'user_id_2' => $this->input->post('user_id_2'),
			);
			
			$deleteFriend = $this->postPhysician('deleteColleague', $data);
			$this->redirect(true,$this->input->post('username'));
		}else{
			$this->denyAccess();
		}
	}
	
	
	/**
	 * Utility Function Used by Subscribe/Unsubscribe
	 */
	private function redirect($success,$username){
		if($success){
			redirect($this->config->base_url()."user/".$username."/profile");
		}else{
			print_r('Action Failed');
		}
	}
	
	private function denyAccess(){
		print_r('Unauthorized Access!');
	}
	
	
	public function colleagues($username) {
		$userinfo = $this->getUserBasicInfo($username);
		
		#
		$this->load->library('user_profile');
		$target_physician_profile = $this->user_profile->get_physician_profile($userinfo->id);
		#
		
		$data = array(
			'user_id' => $this->session->userdata('user_data')['id'],
		);
		
		//$getFriends = $this->getPatients('getFriends', $data);
		$getFriends = $this->getPatients('getFriends', array(
			'user_id' => $userinfo->user_id,
		));
		
		$getMutualFriends = $this->getPatients('mutualFriendList', array(
			'user_id' => $this->self['id'],
			'target_id' => $userinfo->user_id,
		));
		
		//print_r(json_decode($getFriends['data']));die();
		//echo '<pre>';
		//print_r(json_decode($getFriends['data']));die();
		
		//$this->carabiner->css('user/friends.css');
		$this->layout = 'col3';
		$this->carabiner->css('user/public.css');
		$this->carabiner->js('user/public.js');
		$this->carabiner->css('user/physician/colleagues.css');
		$this->carabiner->js('user/physician/colleagues.js');
		$this->render('user/physician/colleagues',array(
			'target' => $userinfo,
			'user_id' => $this->self['id'],
			'friends' => json_decode($getFriends['data']),
			'mutual_friends' => json_decode($getMutualFriends['data']),
			'topnav' => 'top_physician',
			'right_chat' => true,
			'target_physician_profile' => $target_physician_profile,
		));
	}
	
	/*--------------------------
	UTILITIES
	--------------------------*/
	private function getUserBasicInfo($username){
		
		if(!$username){
			redirect(base_url('user/'.$this->session->userdata('user_data')['username']));
		}
		
		$user = $this->getUser('GetFullUserInfo', array(
			'username' => $username,
		));
		$userinfo = json_decode($user['uprofile']);
		
		return $userinfo[0];
	}
	
	
}