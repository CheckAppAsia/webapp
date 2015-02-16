<?php
class emergency_model extends CB_Model {
	public $database = db_member;
	public $table_name = 'emergency_contact';
	public $id_field = 'user_id';
	
	public function relations(){
		return array(
			'account' => array(db_member, 'emergency_contact.user_id = account.id'),
			'profile' => array(db_member, 'emergency_contact.user_id = profile.user_id'),
			'verification' => array(db_member, 'emergency_contact.user_id = verification.user_id'),
		);
	}
	
}
