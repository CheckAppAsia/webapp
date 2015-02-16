<?php
class DiagnosticRadiologyModel extends CB_Model {
	public $database = db_documents;
	public $table_name = 'diagnostic_radiology';
	public $id_field = 'id';
	
	public function relations(){
		return array(
			
		);
	}
	
}