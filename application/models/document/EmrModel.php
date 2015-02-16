<?php
class EmrModel extends CB_Model {
	public $database = db_documents;
	public $table_name = 'emr';
	public $id_field = 'document_id';
	
	public function relations(){
		return array(
			
		);
	}
	
}