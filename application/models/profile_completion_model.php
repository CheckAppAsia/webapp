<?php


class profile_completion_model extends CI_Model {
	
    
	public function check_email_verification($uid){
		$qstring = "
				SELECT
					status
				FROM
					user_verifications
				WHERE
					user_id = $uid
		";
		$query = null;
		if($qstring!=""){
			$query = $this->db->query($qstring);
		}
		return $query->row_array();
	}
	
	public function check_name($uid){
		$qstring = "
				SELECT
					title, first_name, last_name
				FROM
					user_profile
				WHERE
					user_id = $uid
		";
		$query = null;
		if($qstring!=""){
			$query = $this->db->query($qstring);
		}
		return $query->row_array();
	}
	
	public function check_address($uid){
		$qstring = "
				SELECT
					address1, address2
				FROM
					user_profile
				WHERE
					user_id = $uid
		";
		$query = null;
		if($qstring!=""){
			$query = $this->db->query($qstring);
		}
		return $query->row_array();
	}
	
	public function check_birthdate($uid){
		$qstring = "
				SELECT
					birthdate
				FROM
					user_profile
				WHERE
					user_id = $uid
		";
		$query = null;
		if($qstring!=""){
			$query = $this->db->query($qstring);
		}
		return $query->row_array();
	}
	
	public function check_profile_pic($uid){
		$qstring = "
				SELECT
					profile_pic
				FROM
					user_profile
				WHERE
					user_id = $uid
		";
		$query = null;
		if($qstring!=""){
			$query = $this->db->query($qstring);
		}
		return $query->row_array();
	}
	
	public function check_gender($uid){
		$qstring = "
				SELECT
					gender
				FROM
					user_profile
				WHERE
					user_id = $uid
		";
		$query = null;
		if($qstring!=""){
			$query = $this->db->query($qstring);
		}
		return $query->row_array();
	}
	
	public function check_physician_profile($uid){
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
	
	public function check_physician_document($uid){
		$qstring = "
				SELECT
					count(id) as count
				FROM
					physician_documents
				WHERE
					physician_id = $uid
					AND
					status != 2;
		";
		$query = null;
		if($qstring!=""){
			$query = $this->db->query($qstring);
		}
		return $query->row_array();
	}
	
	
}