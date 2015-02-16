<?php
class country_model extends CB_Model {
	public $database = db_library;
	public $table_name = 'country';
	public $id_field = 'id';
	
	public function relations(){
		return array(
			
		);
	}
	
}