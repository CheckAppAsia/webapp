<?php
class EmrUserProfileModel extends CB_Model {
	public $database = db_documents;
	public $table_name = 'user_profile';
	public $id_field = 'id';
	
	public function relations(){
		return array(
			
		);
	}
	
}