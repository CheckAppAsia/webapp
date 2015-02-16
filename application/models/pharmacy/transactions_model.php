<?php
class transactions_model extends CB_Model {
	public $database = db_pharma;
	public $table_name = 'pharmacy_transactions';
	public $id_field = 'txn_id';
	
	public function relations(){
		
	}

}