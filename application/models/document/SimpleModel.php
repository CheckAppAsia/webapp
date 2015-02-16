<?php
class SimpleModel extends CB_Model {
	public $database = db_documents;
	public $table_name = 'simple';
	public $id_field = 'document_id';
	
	public function relations(){
		return array(
			
		);
	}
	
}