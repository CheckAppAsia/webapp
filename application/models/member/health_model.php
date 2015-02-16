<?php
class health_model extends CB_Model {
	public $database = db_member;
	public $table_name = 'health';
	public $id_field = 'user_id';
	
	public function relations(){
		return array(
			'account' => array(db_member, 'health.user_id = account.id'),
			'profile' => array(db_member, 'health.user_id = profile.user_id'),
			'verification' => array(db_member, 'health.user_id = verification.user_id'),
		);
	}
	
}