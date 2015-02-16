<?php
class Profile extends CA_Controller{
	public $layout = 'col3';
	
	var $paramVar = array();
	
	public function __construct() {
		parent::__construct();
		$this->requireLogin();
	}
	
	/* EDIT PHYSICIAN PROFILE
	Render form page for updating physician profile
	-------------------------------------------------------*/
	public function index(){

		// Get physician personal and professional profile
		$profile = $this->getProvider('profile', array(
			'user_id' => $this->self['id'],
		)); //debug($profile); exit;
		
		// Get physician medical schools
		$med_schools = $this->getProvider('schools', array(
			'user_id' => $this->self['id'],
		));
		
		// Get physician specialization
		$specializations = $this->getProvider('specializations', array(
			'user_id' => $this->self['id'],
		));
		
		// Get physician affiliation
		$affiliations = $this->getProvider('affiliations', array(
			'user_id' => $this->self['id'],
		));
		
		// Get physician license numbers
		$license_numbers = $this->getProvider('license_numbers', array(
			'user_id' => $this->self['id'],
		));
		
		// Get all countries from library
		$allCountries = $this->getLibrary('countries', array(
			'user_id' => $this->self['id'],
		)); 
	 
		//debug($allCountries); exit;
		
		// Get physician verification documents
		/*$this->load->library('physician_documents');
		$physician_documents = $this->physician_documents->get_documents($this->self['id'],0);
		$this->data['physician_documents'] = $physician_documents;*/
		$physician_documents = array();
		
		// Render view
		$this->carabiner->css('dashboard/physician/profile.css');
		$this->carabiner->js('dashboard/physician/profile.js');
		$this->render('dashboard/physician/profile', array(
			'profile' => $profile->data,
			'med_schools' => $med_schools->data,
			'my_specializations' => $specializations->data,
			'my_affiliations' => $affiliations->data,
			'license_numbers' => $license_numbers->data,
			'physician_documents' => $physician_documents,
			'allCountries' => $allCountries->data,
		));
    }
	
	/* [REDIRECT-ACTION] ADD LICENSE NUMBER
	Saves the new list of license numbers
	-------------------------------------------------------*/
	public function addLicenseNumber(){
		$formatted_licenses = array();
		$licenses = $this->input->post('license');
		
		// loop through 
		foreach($licenses['id'] as $index=>$license_id){
			// if existing license, or if the new license textbox has type and number
			if($license_id>0 || ($licenses['type'][$index]!='' && $licenses['number'][$index]!='')){
				// add the license array onto the formatted list to be passed to REST
				$formatted_licenses[] = array(
					'id' => $license_id,
					'type' => $licenses['type'][$index],
					'number' => $licenses['number'][$index],
					'remarks' => $licenses['remarks'][$index],
				);
			}
		}
		
		$updateRest = $this->postProvider('license_numbers', array(
			'user_id' => $this->self['id'],
			'license_numbers' => $formatted_licenses,
		)); //debug($updateRest); exit;
		
		if($updateRest->status){
			$this->notify(1, 'License numbers saved!');
		}else{
			$this->notify(0, $updateRest->message);
		}
		redirect(base_url('dashboard/physician/profile'));
	}
	
	/* [AJAX] ADD SPECIALIZATION
	Save professional profile data onto database
	-------------------------------------------------------*/
	public function xAddSpecialization(){
		$result = $this->postPhysician('specialization', array(
			'physician_id' => $this->self['id'],
			'specialization' => $this->input->post('specialization'),
			'specialization_id' => $this->input->post('specialization_id'),
		));
		
		$specializations = $this->getPhysician('specializations', array(
			'user_id' => $this->self['id'],
		));
	}
	
	/* [AJAX] REMOVE SPECIALIZATION
	Save professional profile data onto database
	-------------------------------------------------------*/
	public function xRemoveSpecialization(){
		
	}
	
	/* [AJAX] ADD AFFILIATION
	Save professional profile data onto database
	-------------------------------------------------------*/
	public function xAddAffiliation(){
		
	}
	
	/* [AJAX] ADD MEDICAL SCHOOL
	Save professional profile data onto database
	-------------------------------------------------------*/
	public function xAddMedicalSchool(){
		
	}
	
	/* [AJAX] EDIT MEDICAL SCHOOL
	Save professional profile data onto database
	-------------------------------------------------------*/
	public function xEditMedicalSchool(){
		
	}
	
	
	/*------------------------------------------------------------------------------*/
	/*---------------------------- LEGACY FUNCTIONS --------------------------------*/
	/*------------------------------------------------------------------------------*/
	
	
	/* UPDATE PROFESSIONAL
	Save professional profile data onto database
	-------------------------------------------------------*/
	public function updateProfessional(){
		
		
		if($_POST) {
			
			$data = $this->input->post();
		
			$paramArr = array();
			foreach($data as $key => $value) {
				if(in_array($key, $this->paramVar)) {
					$paramArr[$key] = $value;
					unset($data[$key]);
				}
			}
			
			$result = $this->postPhysician('updatePhysician', $data);
			
			
			if($result['status']){
				$this->notify(1, 'Profile successfully updated');
			}else{
				$this->notify(0, $result['message']);
			}

			redirect(base_url('dashboard/physician/profile'));
			
		}
		
		
		//$result = $this->postPhysician('updatePhysician', $this->input->post());
		
		/*
		if($result['status']){
			$this->notify(1, 'Profile successfully updated');
		}else{
			$this->notify(0, $result['message']);
		}
		redirect(base_url('dashboard/physician/profile'));
		*/
	}
	
	/* ADD SCHOOL
	Save professional profile data onto database
	-------------------------------------------------------*/
	public function addSchool(){
		
		$result = $this->postPhysician('school', array(
				'user_id' => $this->self['id'],
				'course' => $this->input->post('course'),
				'school_name' => $this->input->post('school_name'),
				'year_start' => $this->input->post('year_start'),
				'year_end' => $this->input->post('year_end'),
				//'honor_received' => $this->input->post('honor_received'),
				'city' => $this->input->post('city'),
				'state' => $this->input->post('state'),
				'country_id' => $this->input->post('country_id'),
				
			));
		
	//	if($result['status']){
		//	echo "success";
			
	//	}
		//redirect(base_url('dashboard/physician/profile'));
	}
	
	/* UPLOAD DOCUMENT
	Upload a file for physician verifications
	-------------------------------------------------------*/
	public function uploadDocument(){
		try {
			$file = $_FILES['phy_document'];
			
			// Check for PHP upload errors
			if($file['error']==0){
				# -drin start #
				
				$processed_images = CA_Media::process($file);
				//print_r($processed_images);
				# -drin end #
				
				// Load Amazon Library
				$this->load->add_package_path(APPPATH.'third_party/amazon/');
				$this->load->library('CA_S3', '', 'Amazon');
				
				
				// Upload file to S3 bucket
				$upload = $this->Amazon->uploadObject($processed_images['thumb_450'], 'physician_documents/450/'.$processed_images['name']);
				$upload = $this->Amazon->uploadObject($processed_images['resized'], 'physician_documents/max/'.$processed_images['name']);
				unlink($file['tmp_name']);
				unlink($processed_images['thumb_50']);
				unlink($processed_images['thumb_150']);
				unlink($processed_images['thumb_450']);
				unlink($processed_images['resized']);
				#
				// Check Amazon upload result
				if($upload['status']==1){
					#save to db
					$this->load->library('physician_documents');
					$save_document = $this->physician_documents->add_document($this->self['id'], 1,$processed_images['name']);
					
					$this->notify(1, 'Successfully uploaded your document.');
				}else{
					throw new Exception("Error uploading file to S3");
				}
			}else{
				throw new Exception("Error in file upload");
			}
		}catch(Exception $e){
			$this->notify(0, $e->getMessage());
			
		}
		
		redirect($this->config->base_url().'dashboard/physician/profile');
	}
	
	
/* ADD SPECIALIZATION
	Save professional profile data onto database
	-------------------------------------------------------*/
	public function addSpecialization(){
		
		$result = $this->postPhysician('specialization', array(
				'physician_id' => $this->self['id'],
				'specialization' => $this->input->post('specialization'),
				'specialization_id' => $this->input->post('specialization_id'),
			));
		
		$specializations = $this->getPhysician('specializations', array(
				'user_id' => $this->self['id'],
		));
		
		//echo json_encode($specializations['specializations']);
		/*
		if($result['status']){
			$this->notify(1, 'Medical School successfully updated');
		}else{
			$this->notify(0, $result['message']);
		}
		*/
	}
	
	/* ADD AFFILIATION
	 Save professional profile data onto database
	-------------------------------------------------------*/
	public function addAffiliation(){
	
		$result = $this->postPhysician('affiliation', array(
				'physician_id' => $this->self['id'],
				'affiliation' => $this->input->post('affiliation'),
				'affiliation_id' => $this->input->post('affiliation_id'),
		));
		
		$affiliations = $this->getPhysician('affiliations', array(
				'user_id' => $this->self['id'],
		));
	
		//echo json_encode($affiliations['affiliations']);
		/*
			if($result['status']){
		$this->notify(1, 'Medical School successfully updated');
		}else{
		$this->notify(0, $result['message']);
		}
		*/
	}
	
	
/* ADD honors
	 Save professional profile data onto database
	-------------------------------------------------------*/
	public function addHonor(){
	
		$result = $this->postPhysician('honor', array(
				'physician_id' => $this->self['id'],
				'honor' => $this->input->post('honor'),
				'school_id' => $this->input->post('school_id'),
		));
		
		//print_r($result);
		
		/*
		$affiliations = $this->getPhysician('honors', array(
				'user_id' => $this->self['id'],
		));
	
		//echo json_encode($affiliations['affiliations']);
		
			if($result['status']){
		$this->notify(1, 'Medical School successfully updated');
		}else{
		$this->notify(0, $result['message']);
		}
		*/
	}
	
}