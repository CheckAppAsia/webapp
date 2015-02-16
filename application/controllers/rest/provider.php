<?php
require(APPPATH.'libraries/REST_Controller.php');
class Provider extends REST_Controller {
	
	/* [GET] PROFILE
	Get provider profile
		[user_id]* the provider's user_id
		[fields] comma-separated list of fields to fetch
	----------------------------------------------------------*/
	public function profile_get(){
		try {
			// Determine return fields
			$fields = ($this->get('fields'))?$this->get('fields'):'account.id,email,username,title,first_name,middle_name,last_name,birthdate,gender,language,ethnicity,race,religion,marital,address,location,profile.coord_lat,profile.coord_lng,profile_pic';
			
			// Check [account] details
			$this->load->model('provider/account_model');
			$user_account = $this->account_model->read(intval($this->get('user_id')), 'profile', $fields);
			if(count($user_account)===0){ throw new Exception('User not found'); }
			
			// Expound location
			$this->load->model('main/location_model');
			$location = $this->location_model->read(intval($user_account[0]->location), 'country', 'location.id,city,state,zip,country.name as country, country as country_id, coord_lat, coord_lng');
			
			if(count($location)==1){
				$user_account[0]->location = $location[0];
			}else{
				$user_account[0]->location = array('id'=>0, 'city'=>'', 'state'=>'', 'zip'=>'', 'country'=>'', 'country_id'=>0, 'coord_lat'=>100, 'coord_lng'=>100);
			}
			
			// Respond with requested user data
			$this->response(array(
				'status' => 'TRUE',
				'data' => $user_account[0],
			));
		}catch(Exception $e){
			$this->response(array(
				'status' => 'FALSE',
				'message' => $e->getMessage(),
			));
		}
	}
	
	/* [POST] PROFILE
	Update a provider profile
		[user_id]* the provider's user_id
		[title] the person's "salutation" before the name
		[first_name] user's first name
		[middle_name] user's middle name
		[last_name] user's last name
		[birthdate] user's borth date: YYYY-MM-DD
		[gender] user's gender 0=unspecified 1=male 2=female
		[language] user's spoken language, text
		[ethnicity] user's ethnicity, text
		[race] user's race, text
		[religion] user's religion, text
		[marital] user's marital status, 0=single 1=married
		[street] user's street, text
		[city] user's city, text
		[state] user's state, text
		[zip] user's zip, text
		[country] user's country_id, integer
		[profile_pic] filename of the profile photo
	----------------------------------------------------------*/
	public function profile_post(){
		$this->db->trans_begin();
		try {
			$this->load->model('provider/profile_model');
			
			// Validate and Filter fields
			$fields = $this->profile_model->filter(
				$this->post(NULL, TRUE),
				array('title','first_name','middle_name','last_name','birthdate','gender','language','ethnicity','race','religion','marital','address','profile_pic')
			);
			if(count($fields)===0){ throw new Exception('No fields to update'); }
			
			// Get country name of passed country ID
			$this->load->model('library/country_model');
			$selectedCountry = $this->country_model->read(intval($this->input->post('countryId')));
			
			// Geocode address into coordinates
			$geocodeBase = 'http://maps.googleapis.com/maps/api/geocode/json?';
			$result = file_get_contents($geocodeBase.http_build_query(array(
				'sensor' => false,
				'address' => urlencode(implode(', ', array(
					'street' => $this->input->post('address'),
					'city' => $this->input->post('city'),
					'state' => $this->input->post('state'),
					'country' => $selectedCountry[0]->name,
				))),
			)));
			$geocodedinfo = json_decode($result, true);
			if(count($geocodedinfo['results'])==0){ throw new Exception('Unable to pin-point your address on the map!'); }
			$fields['coord_lat'] = $geocodedinfo['results'][0]['geometry']['location']['lat'];
			$fields['coord_lng'] = $geocodedinfo['results'][0]['geometry']['location']['lng'];
			
			// Get Location ID
			$this->load->model('main/location_model');
			$fields['location'] = $this->location_model->determine(array(
				'city' => $this->input->post('city'),
				'state' => $this->input->post('state'),
				'country' => $this->input->post('countryId'),
			));
			
			// Attempt to update the profile
			$this->profile_model->update(array(
				'user_id' => $this->post('user_id'),
			), $fields);
			
			// Commit database queries if no error is encountered
			$this->db->trans_commit();
			$this->response(array(
				'status' => true,
			));
		}catch(Exception $e){
			// Error, roll-back queries!
			$this->db->trans_rollback();
			$this->response(array(
				'status' => false,
				'message' => $e->getMessage(),
			));
		}
	}
	
	/* [GET] PATIENTS
	Get list of patients for specific institution via a physician's access level
	If "institution_id" is not defined, will fetch all patients of provider_id
		[institution_id] the institution the patient is under
		[provider_id] the provider account the patients are under
	----------------------------------------------------------*/
	public function patients_get(){
		try {
			if(intval($this->input->get('institution_id')) > 0){
				$this->load->model('institution/patient_model');
				$patients = $this->patient_model->read(intval($this->input->get('institution_id')), 'account,profile');
			}else{
				$this->load->model('institution/patient_model');
				$patients = $this->patient_model->read(array(
					'institution.provider_id' => intval($this->input->get('provider_id')),
				), 'account,profile,institution');
			}
			
			$this->response(array(
				'status' => 'TRUE',
				'data' => $patients,
			));
		}catch(Exception $e){
			$this->response(array(
				'status' => 'FALSE',
				'message' => $e->getMessage(),
			));
		}
	}
	
	/* [GET] SCHOOLS
	Get the provider's list of schools he previously entered
		[user_id] the provider where to get the schools
	----------------------------------------------------------*/
	public function schools_get(){
		try {
			$this->load->model('provider/medical_school_model');
			$medical_schools = $this->medical_school_model->read(array(
				'user_id' => intval($this->input->get('user_id')),
			));
			
			$this->response(array(
				'status' => 'TRUE',
				'data' => $medical_schools,
			));
		}catch(Exception $e){
			$this->response(array(
				'status' => 'FALSE',
				'message' => $e->getMessage(),
			));
		}
	}
	
	/* [GET] SPECIALIZATIONS
	Get the provider's list of specializations he previously entered
		[user_id] the provider where to get the specializations
	----------------------------------------------------------*/
	public function specializations_get(){
		try {
			$this->load->model('provider/specialization_model');
			$specializations = $this->specialization_model->read(array(
				'user_id' => intval($this->input->get('user_id')),
			), 'specialization', 'user_id, '.db_library.'.specialization.specialization_id, specialization AS name');
			
			$this->response(array(
				'status' => 'TRUE',
				'data' => $specializations,
			));
		}catch(Exception $e){
			$this->response(array(
				'status' => 'FALSE',
				'message' => $e->getMessage(),
			));
		}
	}
	
	/* [GET] AFFILIATIONS
	Get the provider's list of affiliations
		[user_id] the provider where to get the affiliations
	----------------------------------------------------------*/
	public function affiliations_get(){
		try {
			$affiliations = array();
			
			$this->response(array(
				'status' => 'TRUE',
				'data' => $affiliations,
			));
		}catch(Exception $e){
			$this->response(array(
				'status' => 'FALSE',
				'message' => $e->getMessage(),
			));
		}
	}
	
	/* [GET] LICENSE NUMBERS
	Get the provider's list of license numbers
		[user_id] the provider where to get the license numbers
	----------------------------------------------------------*/
	public function license_numbers_get(){
		try {
			$this->load->model('provider/license_number_model');
			$license_numbers = $this->license_number_model->read(array(
				'user_id' => intval($this->input->get('user_id')),
			),null,'id,type,number,status,remarks');
			
			$this->response(array(
				'status' => 'TRUE',
				'data' => $license_numbers,
			));
		}catch(Exception $e){
			$this->response(array(
				'status' => 'FALSE',
				'message' => $e->getMessage(),
			));
		}
	}
	
	/* [POST] LICENSE NUMBERS
	Save the provider's list of license numbers
	Adds a record if one of the license number doesn't exist yet
	Needs to pass even the existing license numbers
		[user_id] the provider where to save the license numbers
		[license_numbers] array, list of license number arrays
			[id] Database ID of the existing license, pass as 0 if new
			[type] user-input type of license
			[number] user-input license number
			[remarks] user-input remarks for the license
	----------------------------------------------------------*/
	public function license_numbers_post(){
		$this->db->trans_begin();
		try {
			$this->load->model('provider/license_number_model');
			
			foreach($this->input->post('license_numbers') as $license_number){
				// convert ID to integer just to be sure no SQL injection
				$license_number['id'] = intval($license_number['id']);
				
				// license database ID is 0, new license, add record
				if($license_number['id']==0){
					$license_number['user_id'] = $this->input->post('user_id');
					$this->license_number_model->create($license_number);
					
				// license already exists, update
				}else{
					if($license_number['type']=='' || $license_number['number']==''){
						// license type or number has been emptied, deleted license record
						$this->license_number_model->delete(array(
							'id' => $license_number['id'],
							'user_id' => $this->input->post('user_id'),
						));
					}else{
						// normal update, all required fields still exist
						$this->license_number_model->update(array(
							'id' => $license_number['id'],
							'user_id' => $this->input->post('user_id'),
						), array(
							'type' => $license_number['type'],
							'number' => $license_number['number'],
							'remarks' => $license_number['remarks'],
						));
					}
				}
			}
			
			// Commit database queries if no error is encountered
			$this->db->trans_commit();
			$this->response(array(
				'status' => true,
			));
		}catch(Exception $e){
			// Error, roll-back queries!
			$this->db->trans_rollback();
			$this->response(array(
				'status' => false,
				'message' => $e->getMessage(),
			));
		}
	}
	
}