<?php
require(APPPATH.'libraries/CA_Controller.php');
class Profile extends CA_Controller {

	public function index() {
		$user= $this->session->userdata('user_data');
		$current_user = $user['id'];
		//$current_user = 7;
		
		$user_profile = $this->getUser('profile', array('id'=>$current_user));
		
		if($this->input->post()){
			
			$validate_entry = $this->postUser('profileValidation', $this->input->post());
			
			if($validate_entry['status'] == 'TRUE'){
				$address = $this->input->post('address1');
				$result = file_get_contents("http://maps.googleapis.com/maps/api/geocode/json?sensor=false&address=" . urlencode($address) );
				$geocodedinfo=json_decode($result, true);
				
				$_POST['loc_x'] = $geocodedinfo['results'][0]['geometry']['location']['lat'];
				$_POST['loc_y'] = $geocodedinfo['results'][0]['geometry']['location']['lng'];
				
				$_POST['user_id'] = $this->session->userdata('user_data')['id'];
				
				$update_profile = $this->postUser('updateProfile', $this->input->post());
			}else{
				echo '<pre>';
				print_r(json_decode($validate_entry['errors']));
				echo '</pre>';
			}
			
			$user_profile = $this->getUser('profile', array('id'=>$current_user));
			$this->carabiner->css('account/profile.css');
			$this->carabiner->js('account/profile.js');
			$this->render('account/profile',json_decode($user_profile['profile']));
		}else{
			$this->carabiner->css('account/profile.css');
			$this->carabiner->js('account/profile.js');
			$this->render('account/profile',json_decode($user_profile['profile']));
		}
		
		
	}
	
	public function update(){
		
		if($this->input->post()){
			$address = $this->input->post('address1');
			$result = file_get_contents("http://maps.googleapis.com/maps/api/geocode/json?sensor=false&address=" . urlencode($address) );
			$geocodedinfo=json_decode($result, true);

			$_POST['loc_x'] = $geocodedinfo['results'][0]['geometry']['location']['lat'];
			$_POST['loc_y'] = $geocodedinfo['results'][0]['geometry']['location']['lng'];

			$_POST['user_id'] = $this->session->userdata('user_data')['id'];

			$update_profile = $this->postUser('updateProfile', $this->input->post());
			
			//redirect(base_url('user/'.$this->session->userdata('user_data')['username']).'/profile');
			//$user_profile = $this->getUser('profile', array('id'=>$current_user));
			/*
			$this->carabiner->css('account/profile.css');
			$this->carabiner->js('account/profile.js');
			$this->render('account/profile',json_decode($user_profile['profile']));
			*/
		}

	}
	
}