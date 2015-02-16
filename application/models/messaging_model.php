<?php

class Messaging_Model extends CI_Model {
	
    public function retrieveThreads($uid){
        $query = $this->db->query(" SELECT
                                        tid, actor, username,subject,message,filename,seen,created
                                    FROM
                                    (
										SELECT
											tid, actor, username,subject,message,filename,seen,created
										FROM
										(
											SELECT 
												t.id as tid,
												u.username as username,
												concat(up.first_name,' ',up.last_name) as actor,
												t.subject as subject,
												tm.message as message,
												up.profile_pic as filename,
												t.user_read_1 as seen,
												tm.created as created
											FROM
												thread t,
												thread_message tm,
												user u,
												user_profile up
											WHERE 
												t.user_id_1 = ".$uid."
												AND
												t.user_id_2 = u.id
												AND
												u.id = up.user_id
												AND
												t.id = tm.thread_id
											
											UNION
											SELECT 
												t.id as tid,
												u.username as username,
												concat(up.first_name,' ',up.last_name) as actor,
												t.subject as subject,
												tm.message as message,
												up.profile_pic as filename,
												t.user_read_2 as seen,
												tm.created as created
											FROM
												thread t,
												thread_message tm,
												user u,
												user_profile up
											WHERE 
												t.user_id_2 = ".$uid."
												AND
												t.user_id_1 = u.id
												AND
												u.id = up.user_id
												AND
												t.id = tm.thread_id
										) t
										ORDER BY t.created DESC
                                    ) u
                                    GROUP BY u.tid
                                    ORDER BY u.created DESC
                                    ");
        return $query->result_array();
    }
    
    public function createThread($type,$typeID,$sender,$receiver,$subject)
    {
        $query = $this->db->query("
                                    INSERT INTO 
                                    thread
                                    (
                                        type,
                                        type_id,
                                        user_id_1,
                                        user_id_2,
                                        subject,
                                        user_read_1,
                                        user_read_2
                                    )
                                    VALUES
                                    (
                                        $type,
                                        $typeID,
                                        $sender,
                                        $receiver,
                                        '$subject',
                                        1,
                                        0
                                    )
                                    ");
        $ii = $this->db->insert_id();
        return $ii;
    }
    
    public function createMessage($thread_id,$sender,$receiver,$message)
    {
        $query1 = $this->db->query("
                                    UPDATE
                                        thread
                                    SET 
                                        user_read_1 = 1
                                    WHERE
                                        id = $thread_id AND user_id_1 = $sender
                                    ");
		$query2 = $this->db->query("
                                    UPDATE
                                        thread
                                    SET 
                                        user_read_2 = 1
                                    WHERE
                                        id = $thread_id AND user_id_2 = $sender
                                    ");
        $query = $this->db->query("
                                    INSERT INTO 
                                    thread_message
                                    (
                                        thread_id,
                                        user_from,
                                        user_to,
                                        message
                                    )
                                    VALUES
                                    (
                                        $thread_id,
                                        $sender,
                                        $receiver,
                                        '$message'
                                    )
                                    ");
        $ii = $this->db->insert_id();
        return $ii;
    }
    
	public function retrieveTid($type,$type_id){
		$query = $this->db->query("
                                    SELECT id
                                    FROM thread
                                    WHERE type=$type AND type_id=$type_id
                                    ");
        return $query->row_array();
	}
	
    public function retrieveMessage($thread_message_id)
    {
        
        $query = $this->db->query("
                                    SELECT *
                                    FROM thread_message
                                    WHERE id=$thread_message_id
                                    ");
        return $query->result_array();
    }
    
    public function retrieveThread($thread_id,$uid)
    {
		$query1 = $this->db->query("
                                    UPDATE
                                        thread
                                    SET 
                                        user_read_1 = 1
                                    WHERE
                                        id = $thread_id AND user_id_1 = $uid
                                    ");
		$query2 = $this->db->query("
                                    UPDATE
                                        thread
                                    SET 
                                        user_read_2 = 1
                                    WHERE
                                        id = $thread_id AND user_id_2 = $uid
                                    ");
        $query = $this->db->query("
                                    SELECT 
                                        tm.user_from as from_id,
                                        tm.user_to as to_id,
                                        tm.message as message,
                                        u1.username as from_user,
                                        u2.username as to_user,
										up1.profile_pic as from_file,
										up2.profile_pic as to_file,
                                        tm.created as created
                                    FROM 
                                        thread_message tm,
                                        user u1,
                                        user u2,
										user_profile up1,
										user_profile up2
                                    WHERE 
                                        thread_id=$thread_id
                                        AND
                                        tm.user_from = u1.id
                                        AND
                                        tm.user_to = u2.id
										AND
										u1.id = up1.user_id
										AND
										u2.id = up2.user_id
                                    ORDER BY
                                        created DESC
                                    ");
        return $query->result_array();
    }
    
    public function trashMessage($thread_message_id)
    {
        $query = $this->db->query("
                                    DELETE FROM thread_message
                                    WHERE
                                        id=$thread_message_id
                                    ");
        return $thread_message_id;
    }
}