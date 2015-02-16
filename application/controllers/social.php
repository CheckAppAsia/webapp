<?php
class Social extends CA_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library('CA_Social');
	}
	
	/* [PAGE] NEWS FEED
	Render full page of news feed: list of posts
	-------------------------------------------------------*/
	public function newsfeed(){
		$this->carabiner->css('_util/feed.css');
		$this->carabiner->js('_util/feed.js');
		$this->carabiner->js('_util/ajax.js');
		$this->carabiner->js('_util/alert_r.js');
		$this->carabiner->js('_util/moment.js');
		$this->carabiner->css('social/newsfeed.css');
		$this->carabiner->js('social/newsfeed.js');
		$this->layout = 'col3';
		$this->render('social/newsfeed', array(
			'right_chat' => true,
		));
	}
	
	/* [PAGE] DISPLAY POST
	Render full page of a post with theme
	-------------------------------------------------------*/
	public function post_page($id){
		$this->carabiner->css('_util/feed.css');
		$this->carabiner->js('_util/feed.js');
		$this->carabiner->js('_util/ajax.js');
		$this->carabiner->js('_util/alert_r.js');
		$this->carabiner->js('_util/moment.js');
		$this->carabiner->css('social/post.css');
		$this->carabiner->js('social/post.js');
		$this->layout = 'col3';
		$this->render('social/post', array(
			'postId' => $id,
			'right_chat' => true,
		));
	}
	
	/* [PARTIAL] DISPLAY POST
	Render a post without the theme, for modal displays
	-------------------------------------------------------*/
	public function post_modal(){
		
	}
	
	/* [AJAX-JSON] NEWS FEED
	Load list of posts for current user's news feed
	-------------------------------------------------------*/
	public function load_feed(){
		try {
			$feed = CA_Social::getFeed($this->self['id'], $this->input->get('checkpoint'), $this->input->get('public'));
			$this->ajaxResponse(array(
				'status' => TRUE,
				'feed' => $feed,
			));
		}catch(Exception $e){
			$this->ajaxResponse(array(
				'status' => FALSE,
				'message' => $e->getMessage(),
			));
		}
	}
	
	/* [AJAX-JSON] TIMELINE
	Load list of posts on target's wall (apply privacy)
	-------------------------------------------------------*/
	public function load_timeline(){
		try {
			$feed = CA_Social::getPosts($this->input->get('targetId'), $this->input->get('checkpoint'), 2, TRUE, $this->self['id']);
			$this->ajaxResponse(array(
				'status' => TRUE,
				'feed' => $feed,
			));
		}catch(Exception $e){
			$this->ajaxResponse(array(
				'status' => FALSE,
				'message' => $e->getMessage(),
			));
		}
	}
	
	
	/*------------------------------------------------------------------------
	---------------------------- USER RELATIONS ------------------------------
	------------------------------------------------------------------------*/
	
	/* [ACTION] SEND FRIEND REQUEST
	
	-------------------------------------------------------*/
	public function friend_add(){
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
			
			$addFriend = $this->postPatients('addFriend', $data);
			//notification
			$this->load->library('notification');
			$res = $this->notification->friend_request_made($receiver,$actor);	
			//notification
			$this->redirect(true,$this->input->post('username'));
		}else{
			$this->denyAccess();
		}
	}
	
	/* [ACTION] ACCEPT FRIEND REQUEST
	
	-------------------------------------------------------*/
	public function friend_accept(){
		if($this->input->post()){
			$data = array(
				'user_id_1' => $this->input->post('user_id_1'),
				'user_id_2' => $this->input->post('user_id_2'),
			);
			
			$acceptFriend = $this->postPatients('acceptFriend', $data);
			//notification
			$this->load->library('notification');
			$res = $this->notification->friend_request_accepted($this->input->post('user_id_1'),$this->input->post('user_id_2'));	
			//notification
			$this->redirect(true,$this->input->post('username'));
		}else{
			$this->denyAccess();
		}
	}
	
	/* [ACTION] DECLINE FRIEND REQUEST
	
	-------------------------------------------------------*/
	public function friend_reject(){
		if($this->input->post()){
			$data = array(
				'user_id_1' => $this->input->post('user_id_1'),
				'user_id_2' => $this->input->post('user_id_2'),
			);
			
			$rejectFriend = $this->postPatients('rejectFriend', $data);
			$this->redirect(true,$this->input->post('username'));
		}else{
			$this->denyAccess();
		}
	}
	
	/* [ACTION] REMOVE AS FRIEND
	
	-------------------------------------------------------*/
	public function friend_remove(){
		if($this->input->post()){
			$data = array(
				'user_id_1' => $this->input->post('user_id_1'),
				'user_id_2' => $this->input->post('user_id_2'),
			);
			
			$deleteFriend = $this->postPatients('deleteFriend', $data);
			$this->redirect(true,$this->input->post('username'));
		}else{
			$this->denyAccess();
		}
	}
	
	/* salvaged from patient controller. will be replaced. -jet 2014-06-16 */
	private function redirect($success,$username){if($success){redirect($this->config->base_url()."user/".$username."/profile");}else{print_r('Action Failed');}}
	private function denyAccess(){ print_r('Unauthorized Access!'); }
	
	
	/* [ACTION] SUBSCRIBE
	Patient-to-Physician Action
	-------------------------------------------------------*/
	public function subscribe(){
		
	}
	
	/* [AJAX-JSON] REFER PATIENT
	Physician(actor) refers Patient to another Physician
	-------------------------------------------------------*/
	public function refer_patient(){
		
	}
	
	/* [AJAX-JSON] REFER PHYSICIAN
	Patient(actor) refers Physician to another Patient
	-------------------------------------------------------*/
	public function refer_physician(){
		
	}
	
	
	/*------------------------------------------------------------------------
	----------------------------- ACTIONS: POST ------------------------------
	------------------------------------------------------------------------*/
	
	/* [AJAX-JSON] URL LINTER
	Scrape website details when sharing a link
	-------------------------------------------------------*/
	public function lint(){
		try {
			require_once(APPPATH.'third_party/opengraph/OpenGraph.php');
			$graph = OpenGraph::fetch($this->input->get('url'));
			
			$url_data = array();
			foreach ($graph as $key => $value) {
				$url_data[$key] = $value;
			}
			
			$this->ajaxResponse(array(
				'status' => TRUE,
				'data' => $url_data,
			));
		}catch(Exception $e){
			$this->ajaxResponse(array(
				'status' => FALSE,
				'message' => $e->getMessage(),
			));
		}
	}
	
	/* [AJAX-JSON] GET POST DETAILS
	
	-------------------------------------------------------*/
	public function post_get(){
		try {
			$postInfo = CA_Social::getPost($this->input->get('postId'), -1, TRUE, $this->self['id']);
			$this->ajaxResponse(array(
				'status' => TRUE,
				'postInfo' => $postInfo,
			));
		}catch(Exception $e){
			$this->ajaxResponse(array(
				'status' => FALSE,
				'message' => $e->getMessage(),
			));
		}
	}
	
	/* [AJAX-JSON] CREATE A POST
	
	-------------------------------------------------------*/
	public function post_create(){
		try {
				$this->requireLogin();
				if($this->input->post()){
            		// Call emergency REST for an attempt
            		$socialRest = $this->postSocial('newsfeed', array(
                		'user_type' => $this->self['type'],
                		'user_id' => $this->self['id'],
               		 	'target_type' => $this->self['type'],
                		'target_id' => $this->input->post('target_id'),
                		'message' => $this->input->post('message'),
                		'attach_type' => $this->input->post('attach_type'),
                		'attach_data' => $this->input->post('attach_data'),
                		'privacy' => $this->input->post('privacy'),
					));

            		// Check for save status and msgbox
            		if($socialRest->status==TRUE){
            	    	$this->notify(1, 'Post has been created.');
            		}else{
            		    $this->notify(0, $socialRest->message);
            		}
            		
					// Redirect back to edit profile page
            		redirect(base_url('dashboard/patient/timeline'));
        		}
/*
				$attach = array('type' => 0,'data' => '');
					
				if(isset($_FILES['attachment'])){
					// Attachment: File
					$attach = CA_Social::attach_file($_FILES['attachment']);
						
				}else if($this->input->post('link')){
					// Attachment: Links
					$link_data = $this->input->post('link');
					$attach['type'] = ATTACH_LINK;
					$attach['data'] = json_encode(array(
						'title' => $link_data['title'],
						'desc' => $link_data['desc'],
						'image' => $link_data['image'],
						'url' => $link_data['url'],
						));
						
				}else if($this->input->post('post_id')){
					// Attachment: Share
					$postInfo = CA_Social::getPost($this->input->post('post_id'), 0, FALSE);
					$attach['type'] = ATTACH_SHARE;
					$attach['data'] = json_encode(array(
						'post_id' => $this->input->post('post_id'),
						'original_id' => $postInfo['user_id'],
						'original_msg' => $postInfo['message'],
						'attach_type' => $postInfo['attach_type'],
						'attach_data' => $postInfo['attach_data'],
						));
						
				}
					
				// Execute create post queries
				$post_id = CA_Social::createPost(
					$this->self['id'],
					$this->input->post('target_id'),
					$this->input->post('message'),
					$attach
					);
					
				// Get the same post for output
				$newPost = CA_Social::getPost($post_id, 0, FALSE);
					
				// Success alert on next page
				$this->notify(1, 'Post has been created.');
*/
		}catch(Exception $e){
			// Error alert on next page
			$this->notify(1, $e->getMessage());
		}
		redirect($this->input->post('return'));
	}
	
	/* [AJAX-JSON] EDIT POST
	
	-------------------------------------------------------*/
	public function post_edit(){
		try {
			$postInfo = CA_Social::getPost($this->input->post('post_id'), 0, FALSE, $this->self['id']);
			if($postInfo['user_id']==$this->self['id']){
				CA_Social::updatePost($this->input->post('post_id'), $this->input->post('message'));
			}else{
				throw new Exception('You must be the owner of the post to delete.');
			}
			$this->ajaxResponse(array(
				'status' => TRUE,
			));
		}catch(Exception $e){
			$this->ajaxResponse(array(
				'status' => FALSE,
				'message' => $e->getMessage(),
			));
		}
	}
	
	/* [AJAX-JSON] DELETE POST
	
	-------------------------------------------------------*/
	public function post_delete(){
		try {
			$postInfo = CA_Social::getPost($this->input->post('post_id'), 0, FALSE, $this->self['id']);
			if($postInfo['user_id']==$this->self['id']){
				CA_Social::deletePost($this->input->post('post_id'));
			}else{
				throw new Exception('You must be the owner of the post to delete.');
			}
			$this->ajaxResponse(array(
				'status' => TRUE,
			));
		}catch(Exception $e){
			$this->ajaxResponse(array(
				'status' => FALSE,
				'message' => $e->getMessage(),
			));
		}
	}
	
	
	/*------------------------------------------------------------------------
	--------------------------- ACTIONS: COMMENT -----------------------------
	------------------------------------------------------------------------*/
	
	/* XXXXXXXX
	xxxxxxxxxx
	-------------------------------------------------------*/
	public function comment_create(){
		try {
			$comment_id = CA_Social::createComment($this->self['id'], $this->input->post('post_id'), $this->input->post('message'));
			$record = CA_Social::getComment($comment_id);
			$wall_post = CA_Social::getPost($this->input->post('post_id'),0,FALSE);
			
			if($wall_post['user_id'] != $this->self['id']){
				#notification
				$this->load->library('notification');
				$res = $this->notification->commented_on_post($wall_post['user_id'],$comment_id);	
			
			}else if($wall_post['target_id'] != 0 & $wall_post['target_id'] != $this->self['id']){
				#notification
				$this->load->library('notification');
				$res = $this->notification->commented_on_post_on_wall($wall_post['target_id'],$comment_id);	
				
			}
			
			$this->ajaxResponse(array(
				'status' => TRUE,
				'comment_record' => $record,
			));
		}catch(Exception $e){
			$this->ajaxResponse(array(
				'status' => FALSE,
				'message' => $e->getMessage(),
			));
		}
	}
	
	/* XXXXXXXX
	xxxxxxxxxx
	-------------------------------------------------------*/
	public function comment_delete(){
		try {
			
			
		}catch(Exception $e){
			$this->ajaxResponse(array(
				'status' => FALSE,
				'message' => $e->getMessage(),
			));
		}
	}
	
	/* XXXXXXXX
	xxxxxxxxxx
	-------------------------------------------------------*/
	public function like_create(){
		try {
			CA_Social::createLike($this->self['id'], $this->input->post('post_id'));
			$newLikes = CA_Social::getLikeCount($this->input->post('post_id'));
			
			$this->ajaxResponse(array(
				'status' => TRUE,
				'likes' => $newLikes,
			));
		}catch(Exception $e){
			$this->ajaxResponse(array(
				'status' => FALSE,
				'message' => $e->getMessage(),
			));
		}
	}
	
	/* XXXXXXXX
	xxxxxxxxxx
	-------------------------------------------------------*/
	public function like_delete(){
		try {
			CA_Social::deleteLike($this->self['id'], $this->input->post('post_id'));
			$newLikes = CA_Social::getLikeCount($this->input->post('post_id'));
			
			$this->ajaxResponse(array(
				'status' => TRUE,
				'likes' => $newLikes,
			));
		}catch(Exception $e){
			$this->ajaxResponse(array(
				'status' => FALSE,
				'message' => $e->getMessage(),
			));
		}
	}
	
	/* ONLINE
	Returns doctors and friends who are online
	-------------------------------------------------------*/
	public function online(){
		if($this->self['type']==1){
			// PATIENT CHAT BAR
			$doctors = $this->getPatients('physicians', array(
				'patient_id' => $this->self['id'],
				'online' => 1,
			));
			$doctors = json_decode($doctors['physicians']);
			
			$friends = $this->getPatients('getFriends', array(
				'user_id' => $this->self['id'],
				'online' => 1,
			));
			$friends = json_decode($friends['data']);
			
			$this->ajaxResponse(array(
				'head1' => 'Doctors Online',
				'doctors' => $doctors,
				'head2' => 'Friends Online',
				'friends' => $friends,
			));
			
		}else if($this->self['type']==2){
			// PHYSICIAN CHAT BAR
			$patients = $this->getPhysician('patients', array(
				'physician_id' => $this->self['id'],
				'online' => 1,
			));
			$patients = json_decode($patients['patients']);
			
			$friends = $this->getPatients('getFriends', array(
				'user_id' => $this->self['id'],
				'online' => 1,
			));
			$friends = json_decode($friends['data']);
			
			$this->ajaxResponse(array(
				'head1' => 'Patients Online',
				'doctors' => $patients,
				'head2' => 'Colleagues Online',
				'friends' => $friends,
			));
			
		}else{
			// UNKNWON USER TYPE
			$this->ajaxResponse(array(
				'head1' => '',
				'doctors' => array(),
				'head2' => '',
				'friends' => array(),
			));
		}
	}
	
}
