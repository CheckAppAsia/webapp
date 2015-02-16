<?php

class Notification_Model extends CI_Model {
	
    
    public function add_notification($uid,$type,$data)
    {
        $query = $this->db->query("
                                    INSERT INTO 
                                    user_notifications
                                    (
                                        user_id,
                                        type,
                                        data,
                                        is_read
                                    )
                                    VALUES
                                    (
                                        $uid,
                                        $type,
                                        '$data',
                                        0
                                    )
                                    ");
        $ii = $this->db->insert_id();
        return $ii;
    }
	
	public function get_notifications($uid,$limit){
		$qstring = "
		SELECT
			id,username,actor,type,filename,seen,created,post_id
		FROM
			(
				SELECT
					n.id as id,
					u.username as username,
					concat(up.first_name,' ',up.last_name) as actor,
					n.type as type,
					up.profile_pic as filename,
					is_read as seen,
					n.created as created,
					0 as post_id
				FROM
					user_notifications n,
					user_profile up,
					user u
				WHERE
					n.user_id = $uid
					and
					n.data = up.user_id
					and
					up.user_id = u.id
					and
					n.type != 4
					and
					n.type !=5
					and
					n.type !=9
				
				UNION
				
				SELECT
					n.id as id,
					u.username as username,
					concat(up.first_name,' ',up.last_name) as actor,
					n.type as type,
					up.profile_pic as filename,
					is_read as seen,
					n.created as created,
					pc.post_id as post_id
				FROM
					user_notifications n,
					user_profile up,
					user u,
					post_comment pc
				WHERE
					n.user_id = $uid
					and
					n.data = pc.id
					and
					pc.user_id = up.user_id
					and
					up.user_id = u.id
					and
					(
					n.type = 4
					OR
					n.type = 9
					)
				UNION
				
				SELECT
					n.id as id,
					u.username as username,
					concat(up.first_name,' ',up.last_name) as actor,
					n.type as type,
					up.profile_pic as filename,
					is_read as seen,
					n.created as created,
					data as post_id
				FROM
					user_notifications n,
					user_profile up,
					user u,
					post p
				WHERE
					n.user_id = $uid
					and
					n.data = p.id
					and
					p.user_id = up.user_id
					and
					up.user_id = u.id
					and
					n.type = 5
			)t
		ORDER BY t.created DESC
		
		";
		if($limit>0){
		$qstring .= "LIMIT $limit";
		}
		$query = null;
		if($qstring!=""){
			$query = $this->db->query($qstring);
		}
		return $query->result_array();
	
	}
	public function get_notifications_count($uid){
		$qstring = "
				SELECT
					count(id) as count
				FROM
					(
						SELECT
							n.id as id
						FROM
							user_notifications n,
							user_profile up,
							user u
						WHERE
							n.user_id = $uid
							and
							n.data = up.user_id
							and
							up.user_id = u.id
							and
							n.type != 4
							and
							n.type !=5
							and
							n.type !=9
							and
							n.is_read = 0
						
						UNION
						
						SELECT
							n.id as id
						FROM
							user_notifications n,
							user_profile up,
							user u,
							post_comment pc
						WHERE
							n.user_id = $uid
							and
							n.data = pc.id
							and
							pc.user_id = up.user_id
							and
							up.user_id = u.id
							and
							(
							n.type = 4
							OR
							n.type = 9
							)
							and
							n.is_read = 0
						
						UNION
						
						SELECT
							n.id as id
						FROM
							user_notifications n,
							user_profile up,
							user u,
							post p
						WHERE
							n.user_id = $uid
							and
							n.data = p.id
							and
							p.user_id = up.user_id
							and
							up.user_id = u.id
							and
							n.type = 5
							and
							n.is_read = 0
					)t
		";
		$query = null;
		if($qstring!=""){
			$query = $this->db->query($qstring);
		}
		return $query->row_array();
	
	}
	public function notification_seen($uid){
		$qstring = "
				UPDATE user_notifications
				SET is_read = 1
				WHERE id = $uid
				
		";
		$query = null;
		if($qstring!=""){
			$query = $this->db->query($qstring);
		}
		return $query;
	
	}
    
}