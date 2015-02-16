<?php
class DiagnosticLabModel extends CB_Model {
	public $database = db_documents;
	public $table_name = 'diagnostic_lab';
	public $id_field = 'id';
	
	public function relations(){
		return array(
			
		);
	}
	
}