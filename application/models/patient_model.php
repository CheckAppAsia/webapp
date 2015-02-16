<?php
class Patient_Model extends CA_Model {
	protected $tbl_patientprofile = 'patient_profile';
	protected $tbl_health = 'patient_health';
	protected $tbl_appointment = 'appointment';
	protected $tbl_meds = 'appointment_meds';
	protected $tbl_physicianprofile = 'physician_profile';
	protected $tbl_physicians = 'physician_patients';
	protected $tbl_friends = 'user_friends';
	protected $tbl_profile = 'user_profile';
	protected $tbl_user = 'user';
	protected $tbl_var_health = 'var_health';
	
	protected $pk_patientprofile = 'user_id';
	protected $pk_physicianprofile = 'user_id';
	protected $pk_profile = 'user_id';
	
	public function __construct() {
		parent::__construct();
	}
	
	public function getPhysicianList($patient_id, $isOnline=0){
		$cmd = $this->db->select('*')
			->from($this->tbl_physicians)
			->where('patient_id', $patient_id)
			->join($this->tbl_user, "{$this->tbl_physicians}.physician_id = {$this->tbl_user}.id")
			->join($this->tbl_profile, "{$this->tbl_physicians}.physician_id = {$this->tbl_profile}.user_id");
		
		if($isOnline>0){
			$cmd->where("{$this->tbl_user}.activity >", date("Y-m-d H:i:s", time()-300));
		}
			
		$query = $cmd->get();
		return $query->result();
	}
	
	public function getHealth($patient_id){
		$cmd = $this->db->select($this->tbl_health.'.*, '.$this->tbl_var_health.'.name')
			->from($this->tbl_health)
			->where('user_id', $patient_id)
			->join($this->tbl_var_health, "{$this->tbl_var_health}.id = {$this->tbl_health}.health_id", "LEFT");
		$query = $cmd->get();
		return $query->result();
	}
	
	public function getMedications($patient_id){
		$patient_id = intval($patient_id);
		$cmd = $this->db->select("{$this->tbl_meds}.*, {$this->tbl_profile}.user_id as physician_id, {$this->tbl_user}.username, {$this->tbl_profile}.title, {$this->tbl_profile}.first_name, {$this->tbl_profile}.last_name, {$this->tbl_profile}.profile_pic")
			->from($this->tbl_meds)
			->join($this->tbl_appointment, "{$this->tbl_appointment}.id={$this->tbl_meds}.appointment_id AND {$this->tbl_appointment}.patient_id={$patient_id}")
			->join($this->tbl_user, "{$this->tbl_appointment}.physician_id = {$this->tbl_user}.id")
			->join($this->tbl_profile, "{$this->tbl_appointment}.physician_id = {$this->tbl_profile}.user_id");
		$query = $cmd->get();
		return $query->result();
	}
}