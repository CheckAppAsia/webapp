<?php
class SystemBasedModel extends CB_Model {
	public $database = db_documents;
	public $table_name = 'emr_system_based';
	public $id_field = 'emr_id';
	
	public function relations(){
		return array(
			
		);
	}
	
}