<?php
class services_model extends CB_Model {
	public $database = db_institution;
	public $table_name = 'services';
	public $id_field = 'id';
	
	public function relations(){
		return;
	}
	
}