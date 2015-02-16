<?php
class profile_model extends CB_Model {
	public $database = db_member;
	public $table_name = 'profile';
	public $id_field = 'user_id';
	
	public function relations(){
		return array(
			'account' => array(db_member, 'profile.user_id = account.id'),
			'health' => array(db_member, 'profile.user_id = health.user_id'),
			'verification' => array(db_member, 'profile.user_id = verification.user_id'),
		);
	}
	
}