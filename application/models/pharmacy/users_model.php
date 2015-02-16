<?php
class users_model extends CB_Model {
	public $database = db_pharma;
	public $table_name = 'pharmacy_users';
	public $id_field = 'user_id';
	
	public function relations(){
// 		return array(
// 			'account' => array(db_member, 'health.user_id = account.id'),
// 			'profile' => array(db_member, 'health.user_id = profile.user_id'),
// 			'verification' => array(db_member, 'health.user_id = verification.user_id'),
// 		);
	}

}