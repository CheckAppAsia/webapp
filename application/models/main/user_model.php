<?php
class user_model extends CB_Model {
	public $database = db_main;
	public $table_name = 'user';
	public $id_field = 'id';
	
	public function relations(){
		return array(
			
		);
	}
	
}