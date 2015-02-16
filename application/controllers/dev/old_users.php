<?php
class old_users extends CI_Controller {
	
	public function index(){
		$this->db->select('*');
		$this->db->from('checkapp.user u');
		$this->db->join('checkapp.user_profile p', 'u.id=p.user_id');
		$old_users = $this->db->get()->result_array();
		
		echo '<h3>main::user</h3>';
		echo 'INSERT INTO user (id, type, email, username, password) VALUES<br />';
		foreach($old_users as $i=>$u){
			echo "(".($i+1).",".$u['type'].",'".$u['email']."','".$u['username']."','".$u['password']."'),<br />";
		}
		
		echo '<hr /><h3>member::account</h3>';
		echo 'INSERT INTO account (id, email, username) VALUES<br />';
		foreach($old_users as $i=>$u){
			if($u['type']==1){
				echo "(".($i+1).",'".$u['email']."','".$u['username']."'),<br />";
			}
		}
		
		echo '<hr /><h3>member::profile</h3>';
		echo 'INSERT INTO profile (user_id, title, first_name, middle_name, last_name, birthdate, gender, language, ethnicity, race, religion, marital, address, location, coord_lat, coord_lng, profile_pic) VALUES<br />';
		foreach($old_users as $i=>$u){
			if($u['type']==1){
				echo "(".($i+1).", '".$u['title']."', '".$u['first_name']."', '".$u['middle_name']."', '".$u['last_name']."', '".$u['birthdate']."', ".$u['gender'].", '', '', '', '', '', '".$u['address1']."', 0, ".$u['coord_lat'].", ".$u['coord_lng'].", '".$u['profile_pic']."'),<br />";
			}
		}
		
		echo '<hr /><h3>provider::account</h3>';
		echo 'INSERT INTO account (id, email, username) VALUES<br />';
		foreach($old_users as $i=>$u){
			if($u['type']==2){
				echo "(".($i+1).",'".$u['email']."','".$u['username']."'),<br />";
			}
		}
		
		echo '<hr /><h3>provider::profile</h3>';
		echo 'INSERT INTO profile (user_id, title, first_name, middle_name, last_name, birthdate, gender, language, ethnicity, race, religion, marital, address, location, coord_lat, coord_lng, profile_pic) VALUES<br />';
		foreach($old_users as $i=>$u){
			if($u['type']==2){
				echo "(".($i+1).", '".$u['title']."', '".$u['first_name']."', '".$u['middle_name']."', '".$u['last_name']."', '".$u['birthdate']."', ".$u['gender'].", '', '', '', '', '', '".$u['address1']."', 0, ".$u['coord_lat'].", ".$u['coord_lng'].", '".$u['profile_pic']."'),<br />";
			}
		}
	}
	
}