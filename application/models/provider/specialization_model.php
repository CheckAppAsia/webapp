<?php
class specialization_model extends CB_Model {
	public $database = db_provider;
	public $table_name = 'specialization';
	public $id_field = 'user_id';
	
	public function relations(){
		return array(
			'specialization' => array(db_library, db_provider.'.specialization.specialization_id = '.db_library.'.specialization.specialization_id'),
		);
	}
	
}