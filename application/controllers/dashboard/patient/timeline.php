<?php
class Timeline extends CA_Controller {
	public $layout = 'col3';
	
	public function index(){
	
		$target = $this->getUserBasicInfo($this->self['username']);
		$newsfeed = $this->getSocial('newsfeed', array('target_id'=>$this->self['id']));
		
		$this->carabiner->js('_util/ajax.js');
		$this->carabiner->js('_util/alert_r.js');
		
		$this->carabiner->js('_util/moment.js');
		$this->carabiner->css('_util/feed.css');
		$this->carabiner->js('_util/feed.js');
		
		$this->carabiner->css('social/newsfeed.css');
		$this->carabiner->js('social/newsfeed.js');
		$this->render('social/newsfeed', array(
			'target' => $target,
			'newsfeed' => $newsfeed->data,
			'username' => $target->username,
			'topnav' => 'top_patient_timeline',
		));

	}
	
	public function personal(){
	
		$target = $this->getUserBasicInfo($this->self['username']);
		
		$this->carabiner->js('_util/ajax.js');
		$this->carabiner->js('_util/alert_r.js');
		
		$this->carabiner->js('_util/moment.js');
		$this->carabiner->css('_util/feed.css');
		$this->carabiner->js('_util/feed.js');
		
		$this->carabiner->css('social/timeline.css');
		$this->carabiner->js('social/timeline.js');
		$this->render('social/timeline', array(
			'target' => $target,
			'username' => $target->username,
			'topnav' => 'top_patient_timeline',
		));
	}

	
	private function getUserBasicInfo($username){
		
		if(!$username){
			redirect(base_url('user/'.$this->session->userdata('user_data')['username']));
		}
		
		$user = $this->getMember('profile', array(
			'id' => $this->self['id'],
		));
		
		return $user->data;
	}

}
