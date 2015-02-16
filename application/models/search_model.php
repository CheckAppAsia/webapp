<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
    SEARCH_MODEL
    by AncientAlien
    
	TODO:
		- UPDATE SQL
            sbt
                    type 0 -ok
                    type 1 -ok 
                    type n -ok
            sbpub   -ok
            sbpat   -ok
            sbdoc   -ok
        
    FUNCTION LIST: 
        - search_by_type($term,$type,$lat,$lng,$rad,$limit)
            search specific types
        - search_by_public($term,$lat,$lng,$rad,$limit)
            searchable by public
        - search_by_patient($term,$lat,$lng,$rad,$limit)
            searchable by patient
        - search_by_doctor($term,$lat,$lng,$rad,$limit)
            searchable by physician
            
    SEARCH TYPE VALUES: used as $type on search_by_type function
    0	 ->  all
    1    ->  patients
    2    ->  doctors
    3    ->  institution
    
    TIPS:
    Navigation: USE FIND to locate function! SQL TOO MANY NEW LINES FOR BETTER READABILITY! PARDON THE DEV! XD
        QUICK FINDS
            sbt case institution - case 3 for search_by_type
            sbt case doctors - case 2 for search_by_type
            sbt case patient - case 1 for search_by_type
            sbt case all - case null for search_by_type
            sbpub - search_by_public
            sbpat - search_by_patient
            sbdoc - search_by_doctor
    Returned user_type legend:
        1 -> patient
        2 -> doctor
        3 -> institution
*/



    class Search_model extends CI_Model {
        
        public function __construct()
        {
            parent::__construct();
        }
        
        public function search_user($term,$uid){
			$queryString = "
			SELECT
				`u`.id as uid,
				`u`.type as user_type,
				`u`.username as username,
				concat(`up`.first_name,' ',`up`.middle_name,' ',`up`.last_name) as title,
				`up`.profile_pic as filename
			FROM
				`user` `u`,
				`user_profile` `up`
			WHERE
				u.id != ".$uid."
				AND
				u.id = up.user_id
				AND
				u.username LIKE '%".$term."%'
			ORDER BY username
			LIMIT 10
			";
			
            $query = $this->db->query($queryString);
            return $query->result_array();
        }
        
        ////////////////\\\\\\\\\\\\\\\\\///////////////////////
        public function search_friend($term,$uid){
			$queryString = "
			SELECT
				`u`.id as uid,
				`u`.type as user_type,
				`u`.username as username,
				concat(`up`.first_name,' ',`up`.middle_name,' ',`up`.last_name) as title,
				`up`.profile_pic as filename
			FROM
				`user` `u`,
				`user_profile` `up`
			WHERE
				u.id = up.user_id
				AND
				u.id IN (
					SELECT 
						user_id_2
					FROM
						user_friends
					WHERE
						user_id_1=".$uid."
						AND
						status_1 = 1
						AND
						status_2 = 1
						
					UNION
					
					SELECT 
						user_id_1
					FROM
						user_friends
					WHERE
						user_id_2=".$uid."
						AND
						status_1 = 1
						AND
						status_2 = 1
						
					UNION
					
					SELECT
						physician_id
					FROM
						physician_patients
					WHERE
						patient_id = ".$uid."
						
					UNION
					
					SELECT
						patient_id
					FROM
						physician_patients
					WHERE
						physician_id = ".$uid."
				)
				AND
				(
					concat(`up`.first_name,' ',`up`.middle_name,' ',`up`.last_name) LIKE '%".$term."%' 
					OR  
					`u`.`email` LIKE '%".$term."%' 
					OR  
					`up`.`first_name` LIKE '%".$term."%' 
					OR  
					`up`.`middle_name` LIKE '%".$term."%' 
					OR  
					`up`.`last_name` LIKE '%".$term."%' 
					OR  
					concat(COALESCE(`up`.first_name, ''),' ',COALESCE(`up`.middle_name, ''),' ',COALESCE(`up`.last_name, '')) LIKE '%".$term."%' 
					OR  
					`u`.`username` LIKE '%".$term."%' 
					OR  
					`up`.`title` LIKE '%".$term."%' 
				)
			ORDER BY username
			LIMIT 5
			";
			
            $query = $this->db->query($queryString);
            return $query->result_array();
        }
        ////////////////\\\\\\\\\\\\\\\\\///////////////////////
        public function search_by_type($term,$type,$lat,$lng,$rad,$limit)
        {
            $queryString;
			switch($type){
                //sbt case institution
                case 3:
                    //default is km remove  * 1.609344 for miles
					$queryString = "
					SELECT
						`ins`.id as uid,
						3 as user_type,
						`ins`.name as username,
						`ins`.name as title,
						`ins`.address as subtitle,
						`ins`.description as description,
						COALESCE((((acos(sin((".$lat."*pi()/180)) * 
							sin((`ins`.`coord_lat`*pi()/180))+cos((".$lat."*pi()/180)) * 
							cos((`ins`.`coord_lat`*pi()/180)) * cos(((".$lng."- `ins`.`coord_lng`)* 
							pi()/180))))*180/pi())*60*1.1515 * 1.609344
						), 0) as distance,
						`ins`.profile_pic as filename
					FROM
						`institution` `ins`
					WHERE
						(
						`ins`.name LIKE '%".$term."%' 
						)
					HAVING
						distance <= ".$rad."
					ORDER BY distance
					
					";
                    if($limit!=0){
                        $queryString .= " LIMIT 5";
                    }
                    break;
                
                //sbt case doctors
                case 2:
					$queryString = "
					SELECT
						`up`.user_id as uid,
						`u`.type as user_type,
						`u`.username as username,
						concat(`up`.first_name,' ',`up`.middle_name,' ',`up`.last_name) as title,
						concat(`up`.address1,`up`.address2) as subtitle,
						concat(`dp`.about,'<br/>',`dp`.specializations ) as description,
						COALESCE((((acos(sin((".$lat."*pi()/180)) * 
							sin((`up`.`coord_lat`*pi()/180))+cos((".$lat."*pi()/180)) * 
							cos((`up`.`coord_lat`*pi()/180)) * cos(((".$lng."- `up`.`coord_lng`)* 
							pi()/180))))*180/pi())*60*1.1515 * 1.609344
						), 0) as distance,
						`up`.profile_pic as filename,
						count(`pdoc`.id) as vd_count
					FROM
						`user` `u`,
						`user_profile` `up`,
						`physician_profile` `dp`,
						`physician_documents` `pdoc`
					WHERE
						`pdoc`.physician_id = `u`.id
						AND
						`u`.type = 2
						AND
						`u`.id = `up`.user_id
						AND
						`u`.id = `dp`.user_id
						AND
						(
						concat(`up`.first_name,' ',`up`.middle_name,' ',`up`.last_name) LIKE '%".$term."%' 
						OR  
						`u`.`email` LIKE '%".$term."%' 
						OR  
						`up`.`first_name` LIKE '%".$term."%' 
						OR  
						`up`.`middle_name` LIKE '%".$term."%' 
						OR  
						`up`.`last_name` LIKE '%".$term."%' 
						OR  
						concat(COALESCE(`up`.first_name, ''),' ',COALESCE(`up`.middle_name, ''),' ',COALESCE(`up`.last_name, '')) LIKE '%".$term."%' 
						OR  
						`u`.`username` LIKE '%".$term."%' 
						OR  
						`up`.`title` LIKE '%".$term."%' 
						)
					HAVING
						distance <= ".$rad."
					ORDER BY distance
					";
                    if($limit!=0){
                        $queryString .= " LIMIT 5";
                    }
                    break;
                case 1:
                //sbt case patient
					
					$queryString = "
					SELECT
						`up`.user_id as uid,
						`u`.type as user_type,
						`u`.username as username,
						concat(`up`.first_name,' ',`up`.middle_name,' ',`up`.last_name) as title,
						concat(`up`.address1,`up`.address2) as subtitle,
						concat(`pp`.family_history ,' <br/>','Known allergies:',`pp`.known_allergies,' <br/>','Others:',`pp`.other) as description,
						COALESCE((((acos(sin((".$lat."*pi()/180)) * 
							sin((`up`.`coord_lat`*pi()/180))+cos((".$lat."*pi()/180)) * 
							cos((`up`.`coord_lat`*pi()/180)) * cos(((".$lng."- `up`.`coord_lng`)* 
							pi()/180))))*180/pi())*60*1.1515 * 1.609344
						), 0) as distance,
						`up`.profile_pic as filename
					FROM
						`user` `u`,
						`user_profile` `up`,
						`patient_profile` `pp`
					WHERE
						`u`.type = 1
						AND
						`u`.id = `up`.user_id
						AND
						`u`.id = `pp`.user_id
						AND
						(
						concat(`up`.first_name,' ',`up`.middle_name,' ',`up`.last_name) LIKE '%".$term."%' 
						OR  
						`u`.`email` LIKE '%".$term."%' 
						OR  
						`up`.`first_name` LIKE '%".$term."%' 
						OR  
						`up`.`middle_name` LIKE '%".$term."%' 
						OR  
						`up`.`last_name` LIKE '%".$term."%' 
						OR  
						concat(COALESCE(`up`.first_name, ''),' ',COALESCE(`up`.middle_name, ''),' ',COALESCE(`up`.last_name, '')) LIKE '%".$term."%' 
						OR  
						`u`.`username` LIKE '%".$term."%' 
						OR  
						`up`.`title` LIKE '%".$term."%' 
						)
					HAVING
						distance <= ".$rad."
					ORDER BY distance
					";
                    if($limit!=0){
                        $queryString .= " LIMIT 5";
                    }
                    break;
                default:
                //sbt case all
					$queryString = "
					SELECT 
						uid, user_type, username, title, subtitle, description, distance, filename
					FROM (
						SELECT
							`up`.user_id as uid,
							`u`.type as user_type,
							`u`.username as username,
							concat(`up`.first_name,' ',`up`.middle_name,' ',`up`.last_name) as title,
							concat(`up`.address1,`up`.address2) as subtitle,
							concat(`dp`.about,'<br/>',`dp`.specializations ) as description,
							COALESCE((((acos(sin((".$lat."*pi()/180)) * 
								sin((`up`.`coord_lat`*pi()/180))+cos((".$lat."*pi()/180)) * 
								cos((`up`.`coord_lat`*pi()/180)) * cos(((".$lng."- `up`.`coord_lng`)* 
								pi()/180))))*180/pi())*60*1.1515 * 1.609344
							), 0) as distance,
							`up`.profile_pic as filename
						FROM
							`user` `u`,
							`user_profile` `up`,
							`physician_profile` `dp`
						WHERE
							`u`.type = 2
							AND
							`u`.id = `up`.user_id
							AND
							`u`.id = `dp`.user_id
							AND
							(
							concat(`up`.first_name,' ',`up`.middle_name,' ',`up`.last_name) LIKE '%".$term."%' 
							OR  
							`u`.`email` LIKE '%".$term."%' 
							OR  
							`up`.`first_name` LIKE '%".$term."%' 
							OR  
							`up`.`middle_name` LIKE '%".$term."%' 
							OR  
							`up`.`last_name` LIKE '%".$term."%' 
							OR  
							concat(COALESCE(`up`.first_name, ''),' ',COALESCE(`up`.middle_name, ''),' ',COALESCE(`up`.last_name, '')) LIKE '%".$term."%' 
							OR  
							`u`.`username` LIKE '%".$term."%' 
							OR  
							`up`.`title` LIKE '%".$term."%' 
							)
						UNION 
						SELECT
							`up`.user_id as uid,
							`u`.type as user_type,
							`u`.username as username,
							concat(`up`.first_name,' ',`up`.middle_name,' ',`up`.last_name) as title,
							concat(`up`.address1,`up`.address2) as subtitle,
							concat(`pp`.family_history ,' <br/>','Known allergies:',`pp`.known_allergies,' <br/>','Others:',`pp`.other) as description,
							COALESCE((((acos(sin((".$lat."*pi()/180)) * 
								sin((`up`.`coord_lat`*pi()/180))+cos((".$lat."*pi()/180)) * 
								cos((`up`.`coord_lat`*pi()/180)) * cos(((".$lng."- `up`.`coord_lng`)* 
								pi()/180))))*180/pi())*60*1.1515 * 1.609344
							), 0) as distance,
							`up`.profile_pic as filename
						FROM
							`user` `u`,
							`user_profile` `up`,
							`patient_profile` `pp`
						WHERE
							`u`.type = 1
							AND
							`u`.id = `up`.user_id
							AND
							`u`.id = `pp`.user_id
							AND
							(
							concat(`up`.first_name,' ',`up`.middle_name,' ',`up`.last_name) LIKE '%".$term."%' 
							OR  
							`u`.`email` LIKE '%".$term."%' 
							OR  
							`up`.`first_name` LIKE '%".$term."%' 
							OR  
							`up`.`middle_name` LIKE '%".$term."%' 
							OR  
							`up`.`last_name` LIKE '%".$term."%' 
							OR  
							concat(COALESCE(`up`.first_name, ''),' ',COALESCE(`up`.middle_name, ''),' ',COALESCE(`up`.last_name, '')) LIKE '%".$term."%' 
							OR  
							`u`.`username` LIKE '%".$term."%' 
							OR  
							`up`.`title` LIKE '%".$term."%' 
							)
						UNION
						SELECT
							`ins`.id as uid,
							3 as user_type,
							`ins`.name as username,
							`ins`.name as title,
							`ins`.address as subtitle,
							`ins`.description as description,
							COALESCE((((acos(sin((".$lat."*pi()/180)) * 
								sin((`ins`.`coord_lat`*pi()/180))+cos((".$lat."*pi()/180)) * 
								cos((`ins`.`coord_lat`*pi()/180)) * cos(((".$lng."- `ins`.`coord_lng`)* 
								pi()/180))))*180/pi())*60*1.1515 * 1.609344
							), 0) as distance,
							`ins`.profile_pic as filename
						FROM
							`institution` `ins`
						WHERE
							(
							`ins`.name LIKE '%".$term."%' 
							)
					) t
					HAVING
						distance <= ".$rad."
					ORDER BY t.distance
					";
                    if($limit!=0){
                        $queryString .= " LIMIT 5";
                    }
                    break;
            }
            $query = $this->db->query($queryString);
            return $query->result_array();   
        }
        ////////////////\\\\\\\\\\\\\\\\\///////////////////////
        public function search_by_public($term,$lat,$lng,$rad,$limit)
        {
            //sbpub
			$queryString = "
			SELECT 
				uid, user_type, username, title, subtitle, description, distance, filename
			FROM (
				SELECT
					`up`.user_id as uid,
					`u`.type as user_type,
					`u`.username as username,
					concat(`up`.first_name,' ',`up`.middle_name,' ',`up`.last_name) as title,
					concat(`up`.address1,`up`.address2) as subtitle,
					concat(`dp`.about,'<br/>',`dp`.specializations ) as description,
					COALESCE((((acos(sin((".$lat."*pi()/180)) * 
						sin((`up`.`coord_lat`*pi()/180))+cos((".$lat."*pi()/180)) * 
						cos((`up`.`coord_lat`*pi()/180)) * cos(((".$lng."- `up`.`coord_lng`)* 
						pi()/180))))*180/pi())*60*1.1515 * 1.609344
					), 0) as distance,
					`up`.profile_pic as filename
				FROM
					`user` `u`,
					`user_profile` `up`,
					`physician_profile` `dp`
				WHERE
					`u`.type = 2
					AND
					`u`.id = `up`.user_id
					AND
					`u`.id = `dp`.user_id
					AND
					(
					concat(`up`.first_name,' ',`up`.middle_name,' ',`up`.last_name) LIKE '%".$term."%' 
					OR  
					`u`.`email` LIKE '%".$term."%' 
					OR  
					`up`.`first_name` LIKE '%".$term."%' 
					OR  
					`up`.`middle_name` LIKE '%".$term."%' 
					OR  
					`up`.`last_name` LIKE '%".$term."%' 
					OR  
					concat(COALESCE(`up`.first_name, ''),' ',COALESCE(`up`.middle_name, ''),' ',COALESCE(`up`.last_name, '')) LIKE '%".$term."%' 
					OR  
					`u`.`username` LIKE '%".$term."%' 
					OR  
					`up`.`title` LIKE '%".$term."%' 
					)
				UNION
				SELECT
					`ins`.id as uid,
					3 as user_type,
					`ins`.name as username,
					`ins`.name as title,
					`ins`.address as subtitle,
					`ins`.description as description,
					COALESCE((((acos(sin((".$lat."*pi()/180)) * 
						sin((`ins`.`coord_lat`*pi()/180))+cos((".$lat."*pi()/180)) * 
						cos((`ins`.`coord_lat`*pi()/180)) * cos(((".$lng."- `ins`.`coord_lng`)* 
						pi()/180))))*180/pi())*60*1.1515 * 1.609344
					), 0) as distance,
					`ins`.profile_pic as filename
				FROM
					`institution` `ins`
				WHERE
					(
					`ins`.name LIKE '%".$term."%' 
					)
			) t
			HAVING
				distance <= ".$rad."
			ORDER BY t.distance
			";
            if($limit!=0){
				$queryString .= " LIMIT 5";
			}
            $query = $this->db->query($queryString);
            return $query->result_array();
        }
        ////////////////\\\\\\\\\\\\\\\\\///////////////////////
        public function search_by_patient($term,$lat,$lng,$rad,$limit)
        {
            //sbpat
			$queryString = "
			SELECT 
				uid, user_type, username, title, subtitle, description, distance, filename
			FROM (
				SELECT
					`up`.user_id as uid,
					`u`.type as user_type,
					`u`.username as username,
					concat(`up`.first_name,' ',`up`.middle_name,' ',`up`.last_name) as title,
					concat(`up`.address1,`up`.address2) as subtitle,
					concat(`dp`.about,'<br/>',`dp`.specializations ) as description,
					COALESCE((((acos(sin((".$lat."*pi()/180)) * 
						sin((`up`.`coord_lat`*pi()/180))+cos((".$lat."*pi()/180)) * 
						cos((`up`.`coord_lat`*pi()/180)) * cos(((".$lng."- `up`.`coord_lng`)* 
						pi()/180))))*180/pi())*60*1.1515 * 1.609344
					), 0) as distance,
					`up`.profile_pic as filename
				FROM
					`user` `u`,
					`user_profile` `up`,
					`physician_profile` `dp`
				WHERE
					`u`.type = 2
					AND
					`u`.id = `up`.user_id
					AND
					`u`.id = `dp`.user_id
					AND
					(
					concat(`up`.first_name,' ',`up`.middle_name,' ',`up`.last_name) LIKE '%".$term."%' 
					OR  
					`u`.`email` LIKE '%".$term."%' 
					OR  
					`up`.`first_name` LIKE '%".$term."%' 
					OR  
					`up`.`middle_name` LIKE '%".$term."%' 
					OR  
					`up`.`last_name` LIKE '%".$term."%' 
					OR  
					concat(COALESCE(`up`.first_name, ''),' ',COALESCE(`up`.middle_name, ''),' ',COALESCE(`up`.last_name, '')) LIKE '%".$term."%' 
					OR  
					`u`.`username` LIKE '%".$term."%' 
					OR  
					`up`.`title` LIKE '%".$term."%' 
					)
				UNION 
				SELECT
					`up`.user_id as uid,
					`u`.type as user_type,
					`u`.username as username,
					concat(`up`.first_name,' ',`up`.middle_name,' ',`up`.last_name) as title,
					concat(`up`.address1,`up`.address2) as subtitle,
					concat(`pp`.family_history ,' <br/>','Known allergies:',`pp`.known_allergies,' <br/>','Others:',`pp`.other) as description,
					COALESCE((((acos(sin((".$lat."*pi()/180)) * 
						sin((`up`.`coord_lat`*pi()/180))+cos((".$lat."*pi()/180)) * 
						cos((`up`.`coord_lat`*pi()/180)) * cos(((".$lng."- `up`.`coord_lng`)* 
						pi()/180))))*180/pi())*60*1.1515 * 1.609344
					), 0) as distance,
					`up`.profile_pic as filename
				FROM
					`user` `u`,
					`user_profile` `up`,
					`patient_profile` `pp`
				WHERE
					`u`.type = 1
					AND
					`u`.id = `up`.user_id
					AND
					`u`.id = `pp`.user_id
					AND
					(
					concat(`up`.first_name,' ',`up`.middle_name,' ',`up`.last_name) LIKE '%".$term."%' 
					OR  
					`u`.`email` LIKE '%".$term."%' 
					OR  
					`up`.`first_name` LIKE '%".$term."%' 
					OR  
					`up`.`middle_name` LIKE '%".$term."%' 
					OR  
					`up`.`last_name` LIKE '%".$term."%' 
					OR  
					concat(COALESCE(`up`.first_name, ''),' ',COALESCE(`up`.middle_name, ''),' ',COALESCE(`up`.last_name, '')) LIKE '%".$term."%' 
					OR  
					`u`.`username` LIKE '%".$term."%' 
					OR  
					`up`.`title` LIKE '%".$term."%' 
					)
				UNION
				SELECT
					`ins`.id as uid,
					3 as user_type,
					`ins`.name as username,
					`ins`.name as title,
					`ins`.address as subtitle,
					`ins`.description as description,
					COALESCE((((acos(sin((".$lat."*pi()/180)) * 
						sin((`ins`.`coord_lat`*pi()/180))+cos((".$lat."*pi()/180)) * 
						cos((`ins`.`coord_lat`*pi()/180)) * cos(((".$lng."- `ins`.`coord_lng`)* 
						pi()/180))))*180/pi())*60*1.1515 * 1.609344
					), 0) as distance,
					`ins`.profile_pic as filename
				FROM
					`institution` `ins`
				WHERE
					(
					`ins`.name LIKE '%".$term."%' 
					)
			) t
			HAVING
				distance <= ".$rad."
			ORDER BY t.distance
			";
            if($limit!=0){
				$queryString .= " LIMIT 5";
			}
            $query = $this->db->query($queryString);
            return $query->result_array();
        }
        ////////////////\\\\\\\\\\\\\\\\\///////////////////////
        public function search_by_doctor($term,$lat,$lng,$rad,$limit)
        {
            //sbdoc
			$queryString = "
			SELECT 
				uid, user_type, username, title, subtitle, description, distance, filename
			FROM (
				SELECT
					`up`.user_id as uid,
					`u`.type as user_type,
					`u`.username as username,
					concat(`up`.first_name,' ',`up`.middle_name,' ',`up`.last_name) as title,
					concat(`up`.address1,`up`.address2) as subtitle,
					concat(`dp`.about,'<br/>',`dp`.specializations ) as description,
					COALESCE((((acos(sin((".$lat."*pi()/180)) * 
						sin((`up`.`coord_lat`*pi()/180))+cos((".$lat."*pi()/180)) * 
						cos((`up`.`coord_lat`*pi()/180)) * cos(((".$lng."- `up`.`coord_lng`)* 
						pi()/180))))*180/pi())*60*1.1515 * 1.609344
					), 0) as distance,
					`up`.profile_pic as filename
				FROM
					`user` `u`,
					`user_profile` `up`,
					`physician_profile` `dp`
				WHERE
					`u`.type = 2
					AND
					`u`.id = `up`.user_id
					AND
					`u`.id = `dp`.user_id
					AND
					(
					concat(`up`.first_name,' ',`up`.middle_name,' ',`up`.last_name) LIKE '%".$term."%' 
					OR  
					`u`.`email` LIKE '%".$term."%' 
					OR  
					`up`.`first_name` LIKE '%".$term."%' 
					OR  
					`up`.`middle_name` LIKE '%".$term."%' 
					OR  
					`up`.`last_name` LIKE '%".$term."%' 
					OR  
					concat(COALESCE(`up`.first_name, ''),' ',COALESCE(`up`.middle_name, ''),' ',COALESCE(`up`.last_name, '')) LIKE '%".$term."%' 
					OR  
					`u`.`username` LIKE '%".$term."%' 
					OR  
					`up`.`title` LIKE '%".$term."%' 
					)
				UNION 
				SELECT
					`up`.user_id as uid,
					`u`.type as user_type,
					`u`.username as username,
					concat(`up`.first_name,' ',`up`.middle_name,' ',`up`.last_name) as title,
					concat(`up`.address1,`up`.address2) as subtitle,
					concat(`pp`.family_history ,' <br/>','Known allergies:',`pp`.known_allergies,' <br/>','Others:',`pp`.other) as description,
					COALESCE((((acos(sin((".$lat."*pi()/180)) * 
						sin((`up`.`coord_lat`*pi()/180))+cos((".$lat."*pi()/180)) * 
						cos((`up`.`coord_lat`*pi()/180)) * cos(((".$lng."- `up`.`coord_lng`)* 
						pi()/180))))*180/pi())*60*1.1515 * 1.609344
					), 0) as distance,
					`up`.profile_pic as filename
				FROM
					`user` `u`,
					`user_profile` `up`,
					`patient_profile` `pp`
				WHERE
					`u`.type = 1
					AND
					`u`.id = `up`.user_id
					AND
					`u`.id = `pp`.user_id
					AND
					(
					concat(`up`.first_name,' ',`up`.middle_name,' ',`up`.last_name) LIKE '%".$term."%' 
					OR  
					`u`.`email` LIKE '%".$term."%' 
					OR  
					`up`.`first_name` LIKE '%".$term."%' 
					OR  
					`up`.`middle_name` LIKE '%".$term."%' 
					OR  
					`up`.`last_name` LIKE '%".$term."%' 
					OR  
					concat(COALESCE(`up`.first_name, ''),' ',COALESCE(`up`.middle_name, ''),' ',COALESCE(`up`.last_name, '')) LIKE '%".$term."%' 
					OR  
					`u`.`username` LIKE '%".$term."%' 
					OR  
					`up`.`title` LIKE '%".$term."%' 
					)
				UNION
				SELECT
					`ins`.id as uid,
					3 as user_type,
					`ins`.name as username,
					`ins`.name as title,
					`ins`.address as subtitle,
					`ins`.description as description,
					COALESCE((((acos(sin((".$lat."*pi()/180)) * 
						sin((`ins`.`coord_lat`*pi()/180))+cos((".$lat."*pi()/180)) * 
						cos((`ins`.`coord_lat`*pi()/180)) * cos(((".$lng."- `ins`.`coord_lng`)* 
						pi()/180))))*180/pi())*60*1.1515 * 1.609344
					), 0) as distance,
					`ins`.profile_pic as filename
				FROM
					`institution` `ins`
				WHERE
					(
					`ins`.name LIKE '%".$term."%' 
					)
			) t
			HAVING
				distance <= ".$rad."
			ORDER BY t.distance
			";
            
            if($limit!=0){
				$queryString .= " LIMIT 5";
			}
            $query = $this->db->query($queryString);
            return $query->result_array();
        }
        
        
    public function search_country($term){
			$queryString = "
			SELECT
				*
			FROM
				country
			WHERE
				name LIKE '%".$term."%'
			ORDER BY name
			";
			
            $query = $this->db->query($queryString);
           return $query->result_array();
            
        }
        
        public function search_school($term){

        	// $db2 = $this->load->database('dev_library');
        	$queryString = "
			SELECT
				*
			FROM
				dev_library.school
			WHERE
				name LIKE '%".$term."%'
			ORDER BY name
			";
        		// echo $queryString; exit;
        	$query = $this->db->query($queryString);
        	return $query->result_array();
        
        }
        
    public function search_specialization($term){
    	//only show the non selected items 
			$queryString = "
			SELECT
				*
			FROM
				dev_library.specialization s
			WHERE NOT EXISTS
				(
					SELECT 1
					FROM dev_provider.specialization p
					WHERE p.specialization_id = s.specialization_id
				)
			AND	s.specialization LIKE '%".$term."%'
			ORDER BY specialization
			";
			
            $query = $this->db->query($queryString);
            // print_r($query); exit;
           return $query->result_array();
            
        }
        
        public function search_affiliation($term){
   //      	$queryString = "
			// SELECT
			// 	*
			// FROM
			// 	dev_library.affiliation a
			// WHERE NOT EXISTS
			// 	(
			// 		SELECT 1
			// 		FROM dev_provider.affiliation p
			// 		WHERE p.affiliation_id = a.affiliation_id
			// 	)
			// 	AND a.affiliation LIKE '%".$term."%'
			// ORDER BY affiliation
			// ";
          	$queryString = "
			SELECT
				*
			FROM
				dev_library.affiliation a
			WHERE a.affiliation LIKE '%".$term."%'
			ORDER BY affiliation
			";      		
        	$query = $this->db->query($queryString);
        	return $query->result_array();
        
        }
        
    }
?>