<?php
class Institution_Model extends CA_Model {
	protected $tbl_institution = 'institution';
	protected $tbl_physicians = 'institution_physicians';
	protected $tbl_labs = 'institution_labs';
	protected $tbl_services = 'institution_services';
	protected $tbl_admin = 'institution_admin';
	
	protected $pk_institution = 'id';
	protected $pk_services = 'id';
	
	public function getByAdmin($admin_id){
		$this->db->select('institution.*')
			->from('institution_admin')
			->where('user_id', $admin_id)
			->join('institution', 'institution.id = institution_admin.institution_id','left');
		$query = $this->db->get();
		return $query->row();
	}
	
	public function getPhysicianListWithProfiles($id, $status=1){
		$this->db->select('institution_physicians.*,user_profile.title,user_profile.first_name,user_profile.last_name,user_profile.profile_pic')
			->from('institution_physicians')
			->where('institution_id', $id)
			->where('status', $status)
			->join('user', 'user.id = institution_physicians.physician_id')
			->join('user_profile', 'user_profile.user_id = institution_physicians.physician_id');
		$query = $this->db->get();
		return $query->result();
	}
	
}