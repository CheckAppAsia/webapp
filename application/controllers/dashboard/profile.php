<?php
class Profile extends CA_Controller{
	
	public function __construct() {
		parent::__construct();
		$this->requireLogin();
	}
	
	/* UPDATE PERSONAL
	Save personal profile data onto database
	-------------------------------------------------------*/
	public function updatePersonal(){
		if($this->input->post()){
			
			// Call REST to save data
			if($this->self['type']==1){
				$updateRest = $this->postMember('profile', array_merge($this->input->post(), array(
					'user_id' =>  $this->self['id'],
					'birthdate' => $this->input->post('year')."-".$this->input->post('month')."-".$this->input->post('day'),
				)));
			}else if($this->self['type']==2){
				$updateRest = $this->postProvider('profile', array_merge($this->input->post(), array(
					'user_id' =>  $this->self['id'],
					'birthdate' => $this->input->post('year')."-".$this->input->post('month')."-".$this->input->post('day'),
				)));
			}
			// debug($updateRest); exit;
			
			// Check for save status and msgbox
			if($updateRest->status){
				$this->notify(1, 'Profile successfully updated');
			}else{
				$this->notify(0, $updateRest->message);
			}
			
			// Redirect back to edit profile page
			redirect(base_url('dashboard/'.$this->self['utype'].'/profile'));
		}
	}
	
	/* CHANGE PHOTO
	Upload a new profile photo
	-------------------------------------------------------*/
	public function changePhoto(){
		try {
			$file = $_FILES['profile_photo'];
			
			// Check for PHP upload errors
			if($file['error']==0){
				# -drin start #
				
				$processed_images = CA_Media::process($file);
				//print_r($processed_images);
				# -drin end #
				
				// Load Amazon Library
				$this->load->add_package_path(APPPATH.'third_party/amazon/');
				$this->load->library('CA_S3', '', 'Amazon');
				
				// Delete old profile pic from bucket
				if($this->self['profile_pic']!='default.jpg'){
					$delete = $this->Amazon->deleteObject('userpic/max/'.$this->self['profile_pic']);
					$delete = $this->Amazon->deleteObject('userpic/150/'.$this->self['profile_pic']);
					$delete = $this->Amazon->deleteObject('userpic/50/'.$this->self['profile_pic']);
				}

				// Upload file to S3 bucket
				$upload = $this->Amazon->uploadObject($processed_images['thumb_50'], 'userpic/50/'.$processed_images['name']);
				$upload = $this->Amazon->uploadObject($processed_images['thumb_150'], 'userpic/150/'.$processed_images['name']);
				$upload = $this->Amazon->uploadObject($processed_images['resized'], 'userpic/max/'.$processed_images['name']);
				unlink($file['tmp_name']);
				unlink($processed_images['thumb_50']);
				unlink($processed_images['thumb_150']);
				unlink($processed_images['thumb_450']);
				unlink($processed_images['resized']);
				
				// Check Amazon upload result
				if($upload['status']==1){
					if($this->self['type']==1){
						$uploadPhoto = $this->postMember('profile', array(
							'user_id' => $this->self['id'],
							'profile_pic' => $processed_images['name'],
						));
					}else if($this->self['type']==2){
						$uploadPhoto = $this->postProvider('profile', array(
							'user_id' => $this->self['id'],
							'profile_pic' => $processed_images['name'],
						));
					}
					$this->self['profile_pic'] = $processed_images['name'];
					$this->session->set_userdata('user_data', (object)$this->self);
					
					$this->notify(1, 'Successfully changed your profile picture.');
				}else{
					throw new Exception("Error uploading file to S3");
				}
			}else{
				throw new Exception("Error in file upload");
			}
		}catch(Exception $e){
			$this->notify(0, $e->getMessage());
		}
		
		// Redirect to my timeline
		redirect(base_url('dashboard/'.$this->self['utype']));
	}
	
}
