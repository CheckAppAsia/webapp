<?php
class account_model extends CB_Model {
	public $database = db_member;
	public $table_name = 'account';
	public $id_field = 'id';
	
	public function relations(){
		return array(
			'profile' => array(db_member, 'account.id = profile.user_id'),
			'health' => array(db_member, 'account.id = health.user_id'),
			'verification' => array(db_member, 'account.id = verification.user_id'),
			'location' => array(db_main, 'profile.location = location.id'),
		);
	}
	
}