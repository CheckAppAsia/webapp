<?php
class User_Model extends CA_Model {
	protected $tbl_account = 'user';
	protected $tbl_profile = 'user_profile';
	protected $tbl_patientprofile = 'patient_profile';
	protected $tbl_physicianprofile = 'physician_profile';
	protected $tbl_verifications = 'user_verifications';
	protected $tbl_widget = 'user_widgets';
	protected $tbl_var_widget = 'var_widgets';
	
	protected $pk_account = 'id';
	protected $pk_profile = 'user_id';
	protected $pk_patientprofile = 'user_id';
	protected $pk_physicianprofile = 'user_id';
	
	public function __construct() {
		parent::__construct();
		
	}
	
	public function getUserByUsername($username){
		$this->db->select('user_profile.*,user.id,user.type,user.email,user.username,user.activity')
			->from('user')
			->where('username', $username)
			->join('user_profile', 'user_profile.user_id = user.id');
		$query = $this->db->get();
		return $query->result();
	}
	
	public function getUserById($id){
		$this->db->select('user_profile.*,user.id,user.type,user.email,user.username,user.activity')
			->from('user')
			->where('id', $id)
			->join('user_profile', 'user_profile.user_id = user.id');
		$query = $this->db->get();
		return $query->result();
	}
	
	public function getWidgets($user_id){
		$this->db->select("{$this->tbl_widget}.user_id, {$this->tbl_widget}.widget_id, {$this->tbl_var_widget}.name")
			->from($this->tbl_widget)
			->where('user_id', $user_id)
			->join($this->tbl_var_widget, "{$this->tbl_widget}.widget_id = {$this->tbl_var_widget}.id", 'LEFT');
		$query = $this->db->get();
		return $query->result();
	}
	
}