<?php
class Timeline_Model extends CA_Model {
	protected $tbl_post = 'post';
	protected $tbl_comment = 'post_comment';
	protected $tbl_like = 'post_like';
	
	protected $pk_post = 'id';
	protected $pk_comment = 'id';
	
}