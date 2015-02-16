<?php
class license_number_model extends CB_Model {
	public $database = db_provider;
	public $table_name = 'license_number';
	public $id_field = 'user_id';
	
	public function relations(){
		return array(
			
		);
	}
	
}