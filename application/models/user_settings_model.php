<?php
#Settings model

class User_Settings_Model extends CI_Model {
	
	public function changeSetting($user_id,$set_id,$set_val){

		$qstring="";
		$query = null;

		$checkString = "SELECT user_id FROM user_settings WHERE user_id=$user_id AND setting_id=$set_id";
		$checkQuery = $this->db->query($checkString);

		if($checkQuery->num_rows() > 0){
			$qstring = "UPDATE user_settings SET value = '$set_val' WHERE user_id = $user_id AND setting_id=$set_id";
		}else{
			$qstring = "INSERT INTO user_settings(user_id,setting_id,value) VALUES($user_id,$set_id,'$set_val')";	
		}

		
		if($qstring!=""){
			$query = $this->db->query($qstring);
		}

		return $query;

	}

	public function retrieveSettings($user_id){
		$qstring="";
		$query = null;

		$qstring = "SELECT setting_id,value FROM user_settings WHERE user_id=$user_id";	

		if($qstring!=""){
			$query = $this->db->query($qstring);
		}

		return $query->result_array();
	}
    
}