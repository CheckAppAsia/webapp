<?php
class PrescriptionModel extends CB_Model {
	public $database = db_documents;
	public $table_name = 'prescription';
	public $id_field = 'id';
	
	public function relations(){
		return array(
			
		);
	}
	
}