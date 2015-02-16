<?php
class verification_model extends CB_Model {
	public $database = db_provider;
	public $table_name = 'verification';
	public $id_field = 'user_id';
	
	public function relations(){
		return array(
			'account' => array(db_provider, 'verification.user_id = account.id'),
			'profile' => array(db_provider, 'verification.user_id = profile.user_id'),
		);
	}
	
}