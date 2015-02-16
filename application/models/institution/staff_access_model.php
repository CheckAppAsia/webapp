<?php
class staff_access_model extends CB_Model {
	public $database = db_institution;
	public $table_name = 'staff_access';
	public $id_field = 'provider_id';
	
	public function relations(){
		return array(
			'account' => array(db_provider, 'staff.provider_id = account.id'),
			'profile' => array(db_provider, 'staff.provider_id = profile.user_id'),
		);
	}
	
}