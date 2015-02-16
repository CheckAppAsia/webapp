<?php
class friends_model extends CB_Model {
	public $database = db_social;
	public $table_name = 'friends';
	public $id_field = 'user_id_1';
	
	public function relations(){
		return array(
			'account_1' => array(db_member, 'friends.user_id_1 = account.id'),
			'profile_1' => array(db_member, 'friends.user_id_1 = profile.user_id'),
			'account_2' => array(db_member, 'friends.user_id_2 = account.id'),
			'profile_2' => array(db_member, 'friends.user_id_2 = profile.user_id'),
		);
	}
	
}