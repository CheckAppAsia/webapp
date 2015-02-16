<?php
class appointment_model extends CB_Model {
	public $database = db_institution;
	public $table_name = 'appointment';
	public $id_field = 'id';
	
	public function relations(){
		return array(
			'institution' => array(db_institution, 'appointment.institution_id = institution.id'),
			'account' => array(db_member, 'appointment.member_id = account.id'),
			'profile' => array(db_member, 'appointment.member_id = profile.user_id'),
		);
	}
	
}