<?php
class ReferralInstitutionModel extends CB_Model {
	public $database = db_documents;
	public $table_name = 'referral_institution';
	public $id_field = 'id';
	
	public function relations(){
		return array(
			
		);
	}
	
}