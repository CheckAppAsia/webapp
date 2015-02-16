<?php
class DocumentModel extends CB_Model {
	public $database = db_documents;
	public $table_name = 'document';
	public $id_field = 'id';
	
	public function relations(){
		return array(
			'member' => array(db_documents, 'member_profile = user_profile.user_id'),
			'provider' => array(db_documents, 'provider_profile = user_profile.user_id'),
			//'clinic' => array(db_documents, 'clinic_profile = clinic_profile.id'),
		);
	}
	
}