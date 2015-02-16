<?php
class verification_model extends CB_Model {
	public $database = db_member;
	public $table_name = 'verification';
	public $id_field = 'user_id';
	
	public function relations(){
		return array(
			'account' => array(db_member, 'verification.user_id = account.id'),
			'profile' => array(db_member, 'verification.user_id = profile.user_id'),
			'health' => array(db_member, 'verification.user_id = health.user_id'),
		);
	}
	
}