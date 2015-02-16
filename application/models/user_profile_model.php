<?php


class user_profile_model extends CI_Model {
	
    
	public function get_physician_profile($uid){
		$qstring = "
				SELECT
					*
				FROM
					physician_profile
				WHERE
					user_id = $uid
		";
		$query = null;
		if($qstring!=""){
			$query = $this->db->query($qstring);
		}
		return $query->row_array();
	}
	
	
	
	
}