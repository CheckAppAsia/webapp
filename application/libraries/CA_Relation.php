<?php

class CA_Relation{

	/**
	 *	@relation_type
	 *	0 - no relation
	 *	1 - friend / colleague
	 *	2 - current user send request
	 *	3 - current user receive request
	 *	4 - subscribed
	 *	5 - follower
	 */
	public static function getUserRelation($current_user,$current_type,$target_id, $target_type){
		$db = &get_instance()->db;

		//Patient to Patient or Physician to Physician
		if(($current_type == 1 && $target_type == 1) || ($current_type == 2 && $target_type == 2)){
		
			$db->select('user_id_1,user_id_2,status_1,status_2,type')
				->from('user_friends')
				->where('(user_id_1='.$current_user.' AND user_id_2='.$target_id.') OR (user_id_1='.$target_id.' AND user_id_2='.$current_user.')');
				
			$res = $db->get()->row();
			
			if(empty($res)){
				return $relation_type = 0;
			}else if($res->status_1 == 1 && $res->status_2 == 1){
				$relation_type = 1;
			}else if($res->status_1 == 1 && $res->status_2 == 0){
				$relation_type = 2;
			}else if($res->status_1 == 0 && $res->status_2 == 1){
				$relation_type = 3;
			}else if($res->status_1 == 0 && $res->status_2 == 0){
				$relation_type = 0;
			}
			
			//if current user is not equal to user_id_1, REVERSE result for type 2 and 3
			if($current_user != $res->user_id_1){
				switch($relation_type){
					case 2:
						$relation_type = 3;
						break;
					case 3:
						$relation_type = 2;
						break;
					default:
						break;
				}
			}
			
			return $relation_type;
		
		//Patient to Physician
		}else if($current_type == 1 && $target_type == 2){
			$db->select('user_id,physician_id')
				->from('user_subscribe')
				->where('(user_id='.$current_user.' AND physician_id='.$target_id.')');
			
			$res = $db->get()->row();
			
			if(empty($res)){
				$relation_type = 0;
			}else{
				$relation_type = 4;
			}
			
			return $relation_type;
		}
		
	}
	
	public static function getFriendList($user_id){
		$db = &get_instance()->db;
		
		$friend_list = array();
		
		$db->select('u.id,u.username,up.first_name,up.last_name,up.address1,up.profile_pic')
			->from('user_friends uf,user u, user_profile up')
			->where('(uf.user_id_1='.$user_id.' AND uf.status_1=1 AND uf.status_2=1 AND u.id=uf.user_id_2 AND up.user_id=uf.user_id_2)');
			
		$res = $db->get()->result_array();
		
		foreach($res as $r){
			array_push($friend_list,$r);
		}
		
		$db->select('u.id,u.username,up.first_name,up.last_name,up.address1,up.profile_pic')
			->from('user_friends uf,user u, user_profile up')
			->where('(uf.user_id_2='.$user_id.' AND uf.status_1=1 AND uf.status_2=1 AND u.id=uf.user_id_1 AND up.user_id=uf.user_id_1)');
			
		$res = $db->get()->result_array();
		
		foreach($res as $r){
			array_push($friend_list,$r);
		}
		
		
		return $friend_list;
	}
	
	public static function getMutualFriends($user_id,$target_id){
		$db = &get_instance()->db;
		
		$friend_list_1 = array();
		
		$db->select('u.id,u.username,up.first_name,up.last_name,up.address1,up.profile_pic')
			->from('user_friends uf,user u, user_profile up')
			->where('(uf.user_id_1='.$user_id.' AND uf.status_1=1 AND uf.status_2=1 AND u.id=uf.user_id_2 AND up.user_id=uf.user_id_2)');
			
		$res = $db->get()->result_array();
		
		foreach($res as $r){
			//array_push($friend_list_1,$r);
			$friend_list_1[$r['id']] = $r;
		}
		
		$db->select('u.id,u.username,up.first_name,up.last_name,up.address1,up.profile_pic')
			->from('user_friends uf,user u, user_profile up')
			->where('(uf.user_id_2='.$user_id.' AND uf.status_1=1 AND uf.status_2=1 AND u.id=uf.user_id_1 AND up.user_id=uf.user_id_1)');
			
		$res = $db->get()->result_array();
		
		foreach($res as $r){
			//array_push($friend_list_1,$r);
			$friend_list_1[$r['id']] = $r;
		}
		
		$friend_list_2 = array();
		
		$db->select('u.id,u.username,up.first_name,up.last_name,up.address1,up.profile_pic')
			->from('user_friends uf,user u, user_profile up')
			->where('(uf.user_id_1='.$target_id.' AND uf.status_1=1 AND uf.status_2=1 AND u.id=uf.user_id_2 AND up.user_id=uf.user_id_2)');
			
		$res = $db->get()->result_array();
		
		foreach($res as $r){
			//array_push($friend_list_2,$r);
			$friend_list_2[$r['id']] = $r;
		}
		
		$db->select('u.id,u.username,up.first_name,up.last_name,up.address1,up.profile_pic')
			->from('user_friends uf,user u, user_profile up')
			->where('(uf.user_id_2='.$target_id.' AND uf.status_1=1 AND uf.status_2=1 AND u.id=uf.user_id_1 AND up.user_id=uf.user_id_1)');
			
		$res = $db->get()->result_array();
		
		foreach($res as $r){
			//array_push($friend_list_2,$r);
			$friend_list_2[$r['id']] = $r;
		}
		
		$mutual_friends = array();
		
		$mutual_friends = array_intersect_key($friend_list_1,$friend_list_2);
		
		return $mutual_friends;
	}
	
	/* Unsupported Situation:
	user_id_1 and user_id_2 is currently not interchangeable.
	it should be interchangeable whether current user is _1 or _2.
	- comment from jet 2014-07-02 to whoever made this function
	-------------------------------------------------------------*/
	public static function getFriendRequests($user_id){
		$db = &get_instance()->db;
		
		$friend_list = array();
		
		$db->select('u.id,u.username,up.first_name,up.last_name,up.address1,up.profile_pic')
			->from('user_friends uf,user u, user_profile up')
			->where('(uf.user_id_2='.$user_id.' AND uf.status_2=0 AND uf.status_1=1 AND uf.user_id_1=u.id AND uf.user_id_1=up.user_id)');
		
		$res = $db->get()->result_array();
		
		foreach($res as $r){
			array_push($friend_list,$r);
		}
		
		$db->select('u.id,u.username,up.first_name,up.last_name,up.address1,up.profile_pic')
			->from('user_friends uf,user u, user_profile up')
			->where('(uf.user_id_1='.$user_id.' AND uf.status_2=1 AND uf.status_1=0 AND uf.user_id_2=u.id AND uf.user_id_2=up.user_id)');
		
		$res = $db->get()->result_array();
		
		foreach($res as $r){
			array_push($friend_list,$r);
		}
		
		return $friend_list;
	}
	
	/* Unsupported Situation:
	user_id_1 and user_id_2 is currently not interchangeable.
	it should be interchangeable whether current user is _1 or _2.
	- comment from jet 2014-07-02 to whoever made this function
	-------------------------------------------------------------*/
	public static function getFriendInvites($user_id){
		$db = &get_instance()->db;
		
		$friend_list = array();
		
		$db->select('u.id,u.username,up.first_name,up.last_name,up.address1,up.profile_pic')
			->from('user_friends uf,user u, user_profile up')
			->where('(uf.user_id_1='.$user_id.' AND uf.status_1=1 AND uf.status_2=0 AND uf.user_id_2=u.id AND uf.user_id_2=up.user_id)');
			
		$res = $db->get()->result_array();
		
		foreach($res as $r){
			array_push($friend_list,$r);
		}
		
		$db->select('u.id,u.username,up.first_name,up.last_name,up.address1,up.profile_pic')
			->from('user_friends uf,user u, user_profile up')
			->where('(uf.user_id_2='.$user_id.' AND uf.status_1=0 AND uf.status_2=1 AND uf.user_id_1=u.id AND uf.user_id_1=up.user_id)');
		
		$res = $db->get()->result_array();
		
		foreach($res as $r){
			array_push($friend_list,$r);
		}
		
		return $friend_list;
	}
	
	public static function removeFriend($current_user,$target_user){
		$db = &get_instance()->db;
		$db->where('((user_id_1='.$current_user.' && user_id_2='.$target_user.') OR (user_id_1='.$target_user.' && user_id_2='.$current_user.'))');
		return $db->update('user_friends', array(
			'status_1' => 0,
			'status_2' => 0,
			'updated' => date('Y-m-d H:i:s'),
		));
	}
	
	public static function addFriend($current_user,$target_user,$user_relation_type){
		$db = &get_instance()->db;
		
		$db->select('user_id_1,user_id_2')
			->from('user_friends')
			->where('(user_id_1='.$current_user.' AND user_id_2='.$target_user.') OR (user_id_1='.$target_user.' AND user_id_2='.$current_user.')');
			
		$res = $db->get()->row();
		
		if(!empty($res)){
			$db->where('((user_id_1='.$current_user.' && user_id_2='.$target_user.') OR (user_id_1='.$target_user.' && user_id_2='.$current_user.'))');
			
			if($res->user_id_1 == $current_user){
				$status_1 = 1;
				$status_2 = 0;
			}else{
				$status_1 = 0;
				$status_2 = 1;
			}
			
			return $db->update('user_friends', array(
				'status_1' => $status_1,
				'status_2' => $status_2,
				'updated' => date('Y-m-d H:i:s'),
			));
		
		}else{
			return $db->insert('user_friends', array(
				'user_id_1' => $current_user,
				'user_id_2' => $target_user,
				'status_1' => 1,
				'status_2' => 0,
				'type' => $user_relation_type,
				'created' => date('Y-m-d H:i:s'),
				'updated' => date('Y-m-d H:i:s'),
			));
		}
	}
	
	public static function cancelFriend($current_user,$target_user){
		$db = &get_instance()->db;
		$db->where('((user_id_1='.$current_user.' && user_id_2='.$target_user.') OR (user_id_1='.$target_user.' && user_id_2='.$current_user.'))');
		return $db->update('user_friends', array(
			'status_1' => 0,
			'status_2' => 0,
			'updated' => date('Y-m-d H:i:s'),
		));
	}
	
	public static function rejectFriend($current_user,$target_user){
		$db = &get_instance()->db;
		$db->where('((user_id_1='.$current_user.' && user_id_2='.$target_user.') OR (user_id_1='.$target_user.' && user_id_2='.$current_user.'))');
		return $db->update('user_friends', array(
			'status_1' => 0,
			'status_2' => 0,
			'updated' => date('Y-m-d H:i:s'),
		));
	}
	
	public static function acceptFriend($current_user,$target_user){
		$db = &get_instance()->db;
		$db->where('((user_id_1='.$current_user.' && user_id_2='.$target_user.') OR (user_id_1='.$target_user.' && user_id_2='.$current_user.'))');
		return $db->update('user_friends', array(
			'status_1' => 1,
			'status_2' => 1,
			'updated' => date('Y-m-d H:i:s'),
		));
	}
	
	/**
	 *	Subscribe Functions
	 */
	
	public static function getSubscribeList($user_id){
		$db = &get_instance()->db;
		
		$db->select('u.id,u.username,up.first_name,up.last_name,up.address1,up.profile_pic')
			->from('user_subscribe us,user u, user_profile up')
			->where('(us.user_id='.$user_id.' AND us.physician_id=u.id AND us.physician_id=up.user_id)');
			
		$res = $db->get()->result_array();
		return $res;
	}
	
	public static function subscribe($current_user,$target_user){
		$db = &get_instance()->db;
		
		return $db->insert('user_subscribe', array(
			'user_id' => $current_user,
			'physician_id' => $target_user,
			'created' => date('Y-m-d H:i:s'),
		));
	}
	
	public static function unsubscribe($current_user,$target_user){
		$db = &get_instance()->db;
		
		return $db->delete('user_subscribe', array(
			'user_id' => $current_user,
			'physician_id' => $target_user,
		));
	}
	
	/**
	 *	Subscribers Functions
	 */
	
	public static function getSubscribersList($user_id){
		$db = &get_instance()->db;
		
		$db->select('u.id,u.username,up.first_name,up.last_name,up.address1,up.profile_pic')
			->from('user_subscribe us,user u, user_profile up')
			->where('(us.physician_id='.$user_id.' AND us.user_id=u.id AND us.user_id=up.user_id)');
			
		$res = $db->get()->result_array();
		return $res;
	}
	
	public static function removeSubscriber($current_user,$target_user){
		$db = &get_instance()->db;
		
		return $db->delete('user_subscribe', array(
			'user_id' => $target_user,
			'physician_id' => $current_user,
		));
	}

}