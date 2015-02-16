<?php
class profile_model extends CB_Model {
	public $database = db_provider;
	public $table_name = 'profile';
	public $id_field = 'user_id';
	
	public function relations(){
		return array(
			'account' => array(db_provider, 'profile.user_id = account.id'),
			'verification' => array(db_provider, 'profile.user_id = verification.user_id'),
		);
	}
	
}