<?php
class medical_school_model extends CB_Model {
	public $database = db_provider;
	public $table_name = 'medical_school';
	public $id_field = 'id';
	
	public function relations(){
		return array(
			
		);
	}
	
}