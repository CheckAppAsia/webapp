<?php
class User extends CA_Controller {
	public $layout = 'col3';
	
	public function __construct() {
		parent::__construct();
		$target_physician_profile = array();
		
	}
	
	/* [UTIL] fillTargetInfo
	Pre-fill all viewed-user info depending on user type
	-------------------------------------------------------*/
	private function fillTargetInfo($username){
		$target = $this->getUser('fullUserInfo', array(
			'username' => $username,
		))->data;
		
		// Derivable user data
		$target->relation = 'friend';
		$target->work = 'Web Developer';
		$target->location->text = 'huehuehue';
		$target->age = date_create_from_format('Y-m-d H:i:s', $target->birthdate)->diff(new DateTime('now'))->y;
		
		// Member-only data
		if($target->type==1){
			
			
		
		// Provider-only data
		}else if($target->type==2){
			$target->about = 'ABOUT';
			$target->specializations = 'SPEC';
			$target->license_no = 'LICNO';
		}
		
		return $target;
	}
	
	/* [UTIL] commonProfileAssets
	Import assets present in all profile pages
	-------------------------------------------------------*/
	private function commonProfileAssets(){
		$this->carabiner->js('_util/moment.js');
		$this->carabiner->css('_util/feed.css');
		$this->carabiner->js('_util/feed.js');
		$this->carabiner->css('user/public.css');
		$this->carabiner->js('user/public.js');
	}
	
	/* [PAGE] View User Timeline
	Landing page for a specific user's profile
	-------------------------------------------------------*/
	public function index($username){
		$target = $this->fillTargetInfo($username);
		$this->commonProfileAssets();
		
		$this->carabiner->css('social/timeline.css');
		$this->carabiner->js('social/timeline.js');
		$this->render('social/timeline', array(
			'target' => $target,
			'topnav' => 'top_'.( (($target->type==1)?'patient':'physician') ),
		));
	}
	
	/* [PAGE] View User Profile 
	Shows basic information and contact details of the user
	-------------------------------------------------------*/
	public function profile($username){
		$target = $this->fillTargetInfo($username);
		$this->commonProfileAssets();
		
		if($target->type==1){
			// Member Profile
			$this->carabiner->css('user/patient/profile.css');
			$this->carabiner->js('user/patient/profile.js');
			$this->render('user/patient/profile', array(
				'target' => $target,
				'topnav' => 'top_patient',
			));
			
		}else if($target->type==2){
			// Provider Profile
			$this->carabiner->css('user/physician/profile.css');
			$this->carabiner->js('user/physician/profile.js');
			$this->render('user/physician/profile', array(
				'target' => $target,
				'topnav' => 'top_patient',
			));
			
		}else{
			// Unknown redirect to home
			redirect(base_url());
		}
		
	}
	
	/* [PAGE] View User Friends
	List of specific member's friends
	-------------------------------------------------------*/
	public function friends($username) {
		$target = $this->fillTargetInfo($username);
		$this->commonProfileAssets();
		
		$friends = $this->getSocial('friends', array(
			'user_id' => $this->self['id'],
			'type' => 'added',
			'user_type' => 1,
		));
		
		$this->carabiner->css('user/patient/friends.css');
		$this->carabiner->js('user/patient/friends.js');
		$this->render('user/patient/friends',array(
			'target' => $target,
			'friends' => $friends->data,
			'topnav' => 'top_patient',
		), "col3");
	}
	
	/* [PAGE] View User Colleagues
	List of specific provider's colleagues
	-------------------------------------------------------*/
	public function colleagues($username){
		$target = $this->fillTargetInfo($username);
		$this->commonProfileAssets();
		
		$friends = $this->getSocial('friends', array(
			'user_id' => $this->self['id'],
			'type' => 'added',
			'user_type' => 2,
		));
		
		$this->carabiner->css('user/physician/colleagues.css');
		$this->carabiner->js('user/physician/colleagues.js');
		$this->render('user/physician/colleagues', array(
			'target' => $target,
			'friends' => $friends->data,
			'topnav' => 'top_physician',
		));
	}
	
	
	
	
}