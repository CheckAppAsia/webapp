<?php
class institution_model extends CB_Model {
	public $database = db_institution;
	public $table_name = 'institution';
	public $id_field = 'id';
	
	public function relations(){
		return array(
			'staff' => array(db_institution, 'institution.id = staff.institution_id'),
		);
	}
	
}