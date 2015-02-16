<?php
class Physician_Model extends CA_Model {
	protected $tbl_appointment = 'appointment';
	protected $tbl_clinic = 'physician_clinic';
	protected $tbl_clinic_labs = 'physician_clinic_labs';
	protected $tbl_documents = 'physician_documents';
	protected $tbl_patients = 'physician_patients';
	protected $tbl_profile = 'physician_profile';
	protected $tbl_school = 'physician_school';
	protected $tbl_secretary = 'physician_secretary';
	protected $tbl_availability = 'physician_settings';
	protected $tbl_user = 'user';
	protected $tbl_user_profile = 'user_profile';
	protected $tbl_specialization = 'physician_specialization';
	protected $tbl_specializations = 'specialization';
	protected $tbl_affiliation = 'physician_affiliation';
	protected $tbl_affiliations = 'affiliation';
	protected $tbl_honors = 'phycician_honors';
	
	
	protected $pk_availability = 'physician_id';
	
	public function getPatientList($physician_id, $isOnline=0){
		$cmd = $this->db->select('*')
			->from($this->tbl_patients)
			->where('physician_id', $physician_id)
			->join($this->tbl_user, "{$this->tbl_patients}.patient_id = {$this->tbl_user}.id")
			->join($this->tbl_user_profile, "{$this->tbl_patients}.patient_id = {$this->tbl_user_profile}.user_id");
			
		if($isOnline>0){
			$cmd->where("{$this->tbl_user}.activity >", date("Y-m-d H:i:s", time()-300));
		}
		
		$query = $cmd->get();
		return $query->result();
	}
	
	public function getAllSchools($physician_id){
		$cmd = $this->db->select('*')
			->from($this->tbl_school)
			->where('user_id', $physician_id);
		$query = $cmd->get();
		return $query->result();
	}
	
	/*-------------------------- LEGACY FUNCTIONS -----------------------*/
	private $tPhysicians = 'physician_profile';
	private $tVerification = 'user_verifications';
	private $tUser = 'user';
	private $tUserProfile = 'user_profile';
	private $tUserCountry = 'country';
	
	public function getAll() {
		$this->db->select('*')
				->from($this->tUser)
				->join($this->tUserProfile, $this->tUser.'.id = '.$this->tUserProfile.'.user_id')
				->join($this->tPhysicians, $this->tUser.'.id = '.$this->tPhysicians.'.user_id')
				->join($this->tVerification, $this->tUser.'.id = '.$this->tVerification.'.user_id');
		
		$query = $this->db->get();
		
		$result = $query->result_array();
				
		return $result;
	}
	
	public function getById($id = null) {
		$this->db->select('*')
				->from($this->tPhysicians)
				->join($this->tUserProfile, $this->tUserProfile.'.user_id = '.$this->tPhysicians.'.user_id')
				->join($this->tUserCountry, $this->tUserCountry.'.country_id = '.$this->tUserProfile.'.country_id')
				->join($this->tVerification, $this->tUserProfile.'.user_id = '.$this->tVerification.'.user_id')
				->where($this->tPhysicians.'.user_id', $id);
		
		$query = $this->db->get();
		
		$result = $query->result_array();
		
		return $result[0];
	}
	
	public function getAllSpecializations($physician_id){
		$cmd = $this->db->select($this->tbl_specializations . '.*')
		->from($this->tPhysicians)
		->from($this->tbl_specialization, $this->tbl_specialization.'physician_id = '.$this->tPhysicians.'.physician_id')
		->join($this->tbl_specializations, $this->tbl_specializations.'.specialization_id = '.$this->tbl_specialization.'.specialization_id')
		->where('user_id', $physician_id);
		$query = $cmd->get();
		return $query->result();
	}
	
	public function getAllAffiliations($physician_id){
		$cmd = $this->db->select($this->tbl_affiliations . '.*')
		->from($this->tPhysicians)
		->from($this->tbl_affiliation, $this->tbl_affiliation.'physician_id = '.$this->tPhysicians.'.physician_id')
		->join($this->tbl_affiliations, $this->tbl_affiliations.'.affiliation_id = '.$this->tbl_affiliation.'.affiliation_id')
		->where('user_id', $physician_id);
		$query = $cmd->get();
		return $query->result();
	}
	
	
public function getMyHonors($physician_id){
		$cmd = $this->db->select($this->tbl_honors . '.*')
		->from($this->tPhysicians)
		->join($this->tbl_honors, $this->tbl_honors.'physician_id = '.$this->tPhysicians.'.physician_id')
		->where('user_id', $physician_id);
		$query = $cmd->get();
		return $query->result();
	}
	
	/*
	private $tPhysicians = 'physician_profile';
	private $tSecretary = 'physician_secretary';
	private $tClinic = 'physician_clinic';
	private $tClinicLab = 'physician_clinic_labs';
	private $tPatients = 'physician_patients';
	private $tUser = 'user';
	private $tUserProfile = 'user_profile';
	private $tColleagues = 'user_friends';
	private $tVerification = 'user_verifications';
	
	protected $tbl_subscribe = 'user_subscribe';
	protected $tbl_colleagues = 'user_friends';
		
	public function __construct() {
		parent::__construct();
	}
	
	public function getPatients($id = null) {
		$this->db->select('*')
				->from($this->tPatients)
				->join($this->tUserProfile, $this->tUserProfile.'.user_id = '.$this->tPatients.'.patient_id')
				->join($this->tUser, $this->tUser.'.id = '.$this->tPatients.'.patient_id', 'LEFT')
				->where($this->tPatients.'.physician_id', $id);
		
		$query = $this->db->get();
		
		$result = $query->result_array();
		
		return $result;
	}
	
	public function getColleagues($id = null) {
		$this->db->select('*')
			->from($this->tColleagues)
			->join($this->tUserProfile, $this->tUserProfile.'.user_id = '.$this->tColleagues.'.user_id_2')
			->join($this->tPhysicians, $this->tPhysicians.'.user_id = '.$this->tColleagues.'.user_id_2', 'RIGHT')
			->join($this->tUser, $this->tUser.'.id = '.$this->tColleagues.'.user_id_2', 'RIGHT')
			->where($this->tColleagues.'.user_id_1', $id);
		
		$query = $this->db->get();
		
		$result = $query->result_array();
		
		return $result;
	}
	
	public function save($data = array()) {
		$this->db->insert($this->tPhysicians, $data);
		
		$id = $this->db->insert_id();
		
		return $id;
	}
	
	public function addPatient($data = array()) {
		$this->db->insert($this->tPatients, $data);
		
		$id = $this->db->insert_id();
		
		return $id;
	}
	
	public function update($data = array()) {
		$user_id = $data['user_id'];
		
		unset($data['user_id']);
		
		$result = $this->db->where('user_id', $user_id)
				->update($this->tPhysicians, $data);
		
		return $result;
	}
	*/
}