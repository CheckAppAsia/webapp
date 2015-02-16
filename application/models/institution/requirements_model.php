<?php
class requirements_model extends CB_Model {
	public $database = db_institution;
	public $table_name = 'requirements';
	public $id_field = 'id';
	
	public function relations(){
		return;
	}
	
}