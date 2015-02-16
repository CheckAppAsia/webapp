<?php
class Timeline extends CA_Controller {
	public $layout = 'col3';
	
	public function index(){

		//$target = $this->getUserBasicInfo($this->self['username']);
		$target = $this->self;
		
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
		));

	}
	
	
	private function getUserBasicInfo($username){
		
		if(!$username){
			redirect(base_url('user/'.$this->session->userdata('user_data')['username']));
		}
		
		$user = $this->getProvider('profile', array(
			'id' => $this->self['id'],
		));
		
		return $user->data;
	}

}