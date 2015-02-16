<?php
class pharmacy_model extends CB_Model {
	public $database = db_pharma;
	public $table_name = 'pharmacies';
	public $id_field = 'pharma_id';
	
	public function relations(){
// 		return array(
// 			'account' => array(db_member, 'health.user_id = account.id'),
// 			'profile' => array(db_member, 'health.user_id = profile.user_id'),
// 			'verification' => array(db_member, 'health.user_id = verification.user_id'),
// 		);
	}

}