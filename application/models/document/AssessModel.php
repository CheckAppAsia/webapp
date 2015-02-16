<?php
class AssesModel extends CB_Model {
	public $database = db_documents;
	public $table_name = 'emr_assess';
	public $id_field = 'id';
	
	public function relations(){
		return array(
			
		);
	}
	
}