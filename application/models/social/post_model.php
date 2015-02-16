<?php
class post_model extends CB_Model {
	public $database = db_social;
	public $table_name = 'post';
	public $id_field = 'user_id';
	
	public function relations(){
		return array(
			'post_comment' => array(db_social, 'post.id = post_comment.post_id'),
			'post_like' => array(db_social, 'post.id = post_like.post_id'),
		);
	}
	
}
