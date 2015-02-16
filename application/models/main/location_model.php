<?php
class location_model extends CB_Model {
	public $database = db_main;
	public $table_name = 'location';
	public $id_field = 'id';
	
	public function relations(){
		return array(
			'country' => array(db_library, 'location.country = country.id'),
		);
	}
	
	public function determine($params){
		$matches = $this->read($params);
		if(count($matches)>0){
			return $matches[0]->id;
		}else{
			return $this->create($params);
		}
	}
	
}