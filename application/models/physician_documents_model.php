<?php

#statuses:
#0 = unverified
#1 = verified
#2 = deleted

class physician_documents_model extends CI_Model {
	
    
    public function add_document($id,$type,$filename)
    {
        $query = $this->db->query("
                                    INSERT INTO 
                                    physician_documents
                                    (
                                        physician_id,
                                        type,
                                        file,
                                        status
                                    )
                                    VALUES
                                    (
                                        $id,
                                        $type,
                                        '$filename',
                                        0
                                    )
                                    ");
        $ii = $this->db->insert_id();
        return $ii;
    }
	
	public function get_documents($id,$limit){
		$qstring = "
			SELECT *
			FROM physician_documents
			WHERE physician_id = $id AND status != 2;
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
	
	public function get_verified_count($uid){
		$qstring = "
				SELECT
					count(id) as count
				FROM
					physician_documents
				WHERE
					physician_id = $uid
					AND
					status = 1;
		";
		$query = null;
		if($qstring!=""){
			$query = $this->db->query($qstring);
		}
		return $query->row_array();
	}
	
	public function remove_document($id,$uid){
		$qstring = "
				UPDATE physician_documents
				SET status = 2
				WHERE id = $id AND physician_id = $uid
		";
		$query = null;
		if($qstring!=""){
			$query = $this->db->query($qstring);
		}
		return $query;
	}
	
	public function verify_doc($id,$uid,$status){
		$qstring = "
				UPDATE physician_documents
				SET status = $status
				WHERE id = $id AND physician_id = $uid
		";
		$query = null;
		if($qstring!=""){
			$query = $this->db->query($qstring);
		}
		return $query;
	}
	
}