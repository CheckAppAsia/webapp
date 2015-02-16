<?php
class patient_model extends CB_Model {
	public $database = db_institution;
	public $table_name = 'patient';
	public $id_field = 'institution_id';
	
	public function relations(){
		return array(
			'institution' => array(db_institution, 'patient.institution_id = institution.id'),
			'account' => array(db_member, 'patient.member_id = account.id'),
			'profile' => array(db_member, 'patient.member_id = profile.user_id'),
		);
	}
	
}