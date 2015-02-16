<?php
class CA_Social {
	public $paging_post = 10;
	public $paging_comment = 2;
	
	
	/* GET NEWSFEED
	Gets the list of posts for the user's news feed
	-------------------------------------------------------*/
	public static function getFeed($user_id, $checkpoint=null, $public=null){
		if(!$checkpoint){ $checkpoint=time(); }
		$db = &get_instance()->db;
		$user_id = intval($user_id);
		
		$allFriends = array($user_id);
		
		// Get friends
		$db->select('user_id_1,user_id_2')
			->from('user_friends')
			->where('user_friends.status_1=1 AND user_friends.status_2=1 AND (user_friends.user_id_1='.$user_id.' OR user_friends.user_id_2='.$user_id.')', null, false);
		$friends = $db->get()->result_array();
		
		foreach($friends as $friend){
			if($friend['user_id_1']==$user_id){
				$allFriends[] = $friend['user_id_2'];
			}else if($friend['user_id_2']==$user_id){
				$allFriends[] = $friend['user_id_1'];
			}
		}
		
		// Get physicians subscribed to
		$db->select('physician_id')
			->from('user_subscribe')
			->where('user_id', $user_id);
		$subscriptions = $db->get()->result_array();
		
		foreach($subscriptions as $subscription){
			$allFriends[] = $subscription['physician_id'];
		}
		
		// Execute query
		$db->select('post.*, user.type as user_type, user.username, user_profile.first_name, user_profile.last_name, user_profile.profile_pic')
			->from('post')
			->where_in('post.user_id', $allFriends)
			->where('post.target_type', 0)
			->where('post.created <', date('Y-m-d H:i:s', $checkpoint))
			->limit(10, 0)
			->order_by('created DESC')
			->join('user', 'user.id = post.user_id')
			->join('user_profile', 'user_profile.user_id = post.user_id');
		$posts = $db->get()->result_array();
		
		// Check for comments and likes
		if(count($posts)>0){ $posts = self::includeComments($posts, 2); }
		if(count($posts)>0){ $posts = self::includeLikes($posts, $user_id); }
		
		return $posts;
	}
	
	
	/* GET TIMELINE
	Get list of posts on a specific user's timeline
	-------------------------------------------------------*/
	public static function getPosts($user_id, $checkpoint=null, $comments=0, $likes=FALSE, $viewer=0){
		$db = &get_instance()->db;
		
		$user_id = intval($user_id);
		$checkpoint = date('Y-m-d H:i:s', $checkpoint);
		
		// Get initial list of post records
		$db->select('post.*, user.type as user_type, user.username, user_profile.first_name, user_profile.last_name, user_profile.profile_pic')
			->from('post')
			->where('((post.target_type=0 AND post.user_id='.$user_id.') OR (post.target_type>0 AND post.target_id='.$user_id.')) AND post.created <"'.$checkpoint.'"', null, false)
			->limit(10, 0)
			->order_by('created DESC')
			->join('user', 'user.id = post.user_id')
			->join('user_profile', 'user_profile.user_id = post.user_id');
		$posts = $db->get()->result_array();
		
		// if caller specified a positive number of comments, pass thru ::includeComments
		if($comments != 0 && count($posts)>0){ $posts = self::includeComments($posts, $comments); }
		
		// if caller specified TRUE to return likes, pass thru ::includeLikes
		if($likes && count($posts)>0){ $posts = self::includeLikes($posts, $viewer); }
		
		return $posts;
	}
	
	
	/* GET POST
	Get details of a specific post
	-------------------------------------------------------*/
	public static function getPost($post_id, $comments=2, $likes=TRUE, $viewer=0){
		// get post information via post_id provided
		$db = &get_instance()->db;
		$db->select('post.*, user.type as user_type, user.username, user_profile.first_name, user_profile.last_name, user_profile.profile_pic')
			->from('post')
			->where('post.id', $post_id)
			->limit(1, 0)
			->join('user', 'user.id = post.user_id')
			->join('user_profile', 'user_profile.user_id = post.user_id');
		$posts = array($db->get()->row_array());
		
		// if caller specified a positive number of comments, pass thru ::includeComments
		if($comments != 0){ $posts = self::includeComments($posts, $comments); }
		
		// if caller specified TRUE to return likes, pass thru ::includeLikes
		if($likes){ $posts = self::includeLikes($posts, $viewer); }
		
		return $posts[0];
	}
	
	
	/* CREATE POST
	Directly inserts a new record of post and notifies
	-------------------------------------------------------*/
	public static function createPost($actor_id, $target_id, $message, $attachment){
		// Execute database record creation
		$db = &get_instance()->db;
		$db->insert('post', array(
			'target_type' => ($target_id==$actor_id || $target_id==0)?0:1,
			'target_id' => ($target_id==$actor_id)?0:$target_id,
			'user_id' => $actor_id,
			'message' => $message,
			'attach_type' => $attachment['type'],
			'attach_data' => $attachment['data'],
		));
		
		// Send notification if posted on another person's wall
		if($target_id!=$actor_id){
			get_instance()->load->library('notification');
			get_instance()->notification->posted_on_wall($target_id, $db->insert_id());	
		}
			
		return $db->insert_id();
	}
	
	
	/* UPDATE POST
	Directly updates message of a specific post
	-------------------------------------------------------*/
	public static function updatePost($post_id, $message){
		$db = &get_instance()->db;
		$db->where('id', $post_id);
		return $db->update('post', array(
			'message' => $message,
		));
	}
	
	
	/* DELETE POST
	Directly deletes a post
	-------------------------------------------------------*/
	public static function deletePost($post_id){
		$db = &get_instance()->db;
		return $db->delete('post', array(
			'id' => $post_id,
		));
	}
	
	
	/* GET COMMENTS
	Get list of comments for a specific post
	-------------------------------------------------------*/
	public static function getComments($post_id, $pageNum=1){
		$db = &get_instance()->db;
		$db->select('id,message,created,updated')
			->from('post_comment')
			->where('post_id', $post_id)
			->limit(self::$paging_post, ($pageNum-1)*self::$paging_post)
			->order_by('created DESC');
		return $db->get()->result_array();
	}
	
	
	/* GET COMMENT
	Get details of a specific comment
	-------------------------------------------------------*/
	public static function getComment($comm_id){
		$db = &get_instance()->db;
		$db->select('post_comment.id,post_comment.message,post_comment.created,post_comment.updated,user.username,user_profile.first_name,user_profile.last_name,user_profile.profile_pic')
			->from('post_comment')
			->where('post_comment.id', $comm_id)
			->join('user', 'user.id = post_comment.user_id')
			->join('user_profile', 'user_profile.user_id = post_comment.user_id');
		return $db->get()->row();
	}
	
	
	/* CREATE COMMENT
	Directly adds a new record of comment for a post
	-------------------------------------------------------*/
	public static function createComment($actor_id, $post_id, $message){
		$db = &get_instance()->db;
		$db->insert('post_comment', array(
			'post_id' => $post_id,
			'user_id' => $actor_id,
			'message' => $message,
		));
		return $db->insert_id();
	}
	
	
	/* UPDATE COMMENT
	Directly updates message of a specific comment
	-------------------------------------------------------*/
	public static function updateComment($comment_id, $message){
		$db = &get_instance()->db;
		$db->where('id', $comment_id);
		return $db->update('post_comment', array(
			'message' => $message,
		));
	}
	
	
	/* DELETE COMMENT
	Directly deletes a comment
	-------------------------------------------------------*/
	public static function deleteComment($comment_id){
		$db = &get_instance()->db;
		return $db->delete('post_comment', array(
			'id' => $comment_id,
		));
	}
	
	
	/* GET LIKES
	Get a list of all users who liked a post
	-------------------------------------------------------*/
	public static function getLikes($post_id, $pageNum=1){
		$db = &get_instance()->db;
		$db->select('user_id')
			->from('post_like')
			->where('post_id', $post_id)
			->limit(self::$paging_post, ($pageNum-1)*self::$paging_post)
			->order_by('created DESC');
		return $db->get()->result_array();
	}
	
	
	/* GET LIKE COUNT
	Returns the number of likes for a specific post
	-------------------------------------------------------*/
	public static function getLikeCount($post_id){
		$db = &get_instance()->db;
		$db->select('COUNT(user_id) as numLikes')
			->from('post_like')
			->where('post_id', $post_id);
		$row = $db->get()->row_array();
		return $row['numLikes'];
	}
	
	
	/* CREATE LIKE
	Directly creates a like from user to specific post
	-------------------------------------------------------*/
	public static function createLike($actor_id, $post_id){
		$db = &get_instance()->db;
		$count = $db->from('post_like')
			->where('user_id', $actor_id)
			->where('post_id', $post_id)
			->count_all_results();
			
		if($count == 0){
			return $db->insert('post_like', array(
				'user_id' => $actor_id,
				'post_id' => $post_id,
			));
		}
		return TRUE;
	}
	
	
	/* DELETE LIKE
	Directly unlike the post for a user
	-------------------------------------------------------*/
	public static function deleteLike($actor_id, $post_id){
		$db = &get_instance()->db;
		return $db->delete('post_like', array(
			'user_id' => $actor_id,
			'post_id' => $post_id,
		));
	}
	
	
	/* FILE ATTACHMENTS
	Receives a file to return attach insert_values
	-------------------------------------------------------*/
	public static function attach_file($file){
		$attach = array('type' => 0,'data' => '');
		
		if($file['error']!=0){
			throw new Exception("Error in file upload");
		}else{
			// Get file extension
			$ext = array_pop(explode(".", $file['name']));
			
			// Check if file extension is allowed and what media type
			if(in_array($ext, array('jpg','png','gif','bmp'))){
				// Attachment: Photo
				
				# process file
				$processed_images = CA_Media::process($file);
				
				# Load Amazon Library
				$CI =   &get_instance();
				$CI->load->add_package_path(APPPATH.'third_party/amazon/');
				$CI->load->library('CA_S3', '', 'Amazon');
				
				# Upload file to S3 bucket
				$upload = $CI->Amazon->uploadObject($processed_images['thumb_450'], 'attach/450/post_'.$processed_images['name']);
				$upload = $CI->Amazon->uploadObject($processed_images['resized'], 'attach/max/post_'.$processed_images['name']);
				unlink($file['tmp_name']);
				unlink($processed_images['thumb_50']);
				unlink($processed_images['thumb_150']);
				unlink($processed_images['thumb_450']);
				unlink($processed_images['resized']);
				
				// Check Amazon upload result
				if($upload['status']==1){
					$attach = array(
						'type' => ATTACH_PHOTO,
						'data' => 'post_'.$processed_images['name'],
					);
				}else{
					throw new Exception("Error uploading file to S3");
				}
				
			}else if(in_array($ext, array('mp4','flv','3gp','avi','mov', 'm4v', 'wmv', 'mpg'))){
				// Attachment: Video
				$attach = array(
					'type' => ATTACH_VIDEO,
					'data' => 'post_'.uniqid().'.'.$ext,
				);
			}else{
				// Unknown file format, delete
				unlink($file['tmp_name']);
			}
		}
		
		return $attach;
	}
	
	
	/* self::includeComments()
	--------------------------------
	Description:
		- Array of Posts can pass through this function to append a comment property
		- Comment property is an array of comments
		- Each comment element is an array of comment info
	Appends:
		comment => [
			[comment_info_1],
			[comment_info_2],
			[comment_info_3],
		]
	Notes:
		- OPTIMIZE!
	-------------------------------------------------------*/
	private static function includeComments($posts, $numComments){
		$db = &get_instance()->db;
		$newPosts = array();
		
		// get post IDs for SQL query, and initially set [comment] property as empty array
		$post_ids = array();
		foreach($posts as &$post){
			array_push($post_ids, $post['id']);
			$post['comments'] = array();
			$newPosts[$post['id']] = &$post;
		}
		
		// get list of related comments from db via post_ids gathered
		$rawComments = $db->select('post_comment.*, user.type as user_type, user.username, user_profile.first_name, user_profile.last_name, user_profile.profile_pic')
			->from('post_comment')
			->where_in('post_id', $post_ids)
			->order_by('post_id DESC, created DESC')
			->join('user', 'user.id = post_comment.user_id')
			->join('user_profile', 'user_profile.user_id = post_comment.user_id');
			
		
		$rawComments = $db->get()->result_array();
		
		// append the fetched comment records onto respective post objects
		$commentCount = array();
		foreach($rawComments as &$rawComment){
			// if count = limit number of comments via the caller's specified number: $numComments
			if(count($newPosts[ $rawComment['post_id'] ]['comments']) < $numComments || $numComments==-1){
				array_push($newPosts[ $rawComment['post_id'] ]['comments'], $rawComment);
			}
			
			if(!isset($commentCount[$rawComment['post_id']])){
				$commentCount[$rawComment['post_id']] = 0;
			}
			$commentCount[$rawComment['post_id']]++;
			
		}
		
		foreach($newPosts as &$newPost){
			$newPost['comments'] = array_reverse($newPost['comments']);
			if(isset($commentCount[ $newPost['id'] ])){
				$newPost['all_comments'] = $commentCount[ $newPost['id'] ];
			}else{
				$newPost['all_comments'] = 0;
			}
		}
		
		return array_values($newPosts);
	}
	
	
	/* self::includeLikes()
	--------------------------------
	Description:
		- Array of Posts can pass through this function to append a [likes] property
		- [likes] property is an integer = count of likes for that post
	Appends:
		likes => 0
	-------------------------------------------------------*/
	private static function includeLikes($posts, $viewer=0){
		$db = &get_instance()->db;
		$newPosts = array();
		
		// get post IDs for SQL query, and initially set [likes] property as integer 0
		$post_ids = array();
		foreach($posts as &$post){
			array_push($post_ids, $post['id']);
			$post['likes'] = 0;
			$post['me_liked'] = 0;
			$newPosts[$post['id']] = &$post;
		}
		
		// get list of like counts from db via post_ids gathered
		$rawLikes = $db->select('post_id, COUNT(user_id) as numLikes')
			->from('post_like')
			->where_in('post_id', $post_ids)
			->group_by('post_id')
			->order_by('post_id DESC');
			
		// append the fetched like counts onto respective post objects
		$rawLikes = $db->get()->result_array();
		foreach($rawLikes as &$rawLike){
			$newPosts[ $rawLike['post_id'] ]['likes'] = $rawLike['numLikes'];
		}
		
		// check if viewer already liked the post, to show like/unlike at start
		if($viewer){
			$meLikes = $db->select('post_id, COUNT(user_id) as numLikes')
				->from('post_like')
				->where('user_id', $viewer)
				->where_in('post_id', $post_ids)
				->group_by('post_id')
				->order_by('post_id DESC');
			$meLikes = $db->get()->result_array();
			foreach($meLikes as &$meLike){
				$newPosts[ $meLike['post_id'] ]['me_liked'] = 1;
			}
		}
		
		return array_values($newPosts);
	}
	
}