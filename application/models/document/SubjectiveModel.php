<?php
class SubjectiveModel extends CB_Model {
	public $database = db_documents;
	public $table_name = 'emr_subjective';
	public $id_field = 'emr_id';
	
	public function relations(){
		return array(
			
		);
	}
	
}