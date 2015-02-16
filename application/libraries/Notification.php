<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
/*
 Notification Library
 by AncientAlien
 
 Sample usage:
 Controller:
 $this->load->library('notification');
 $res = $this->notification->friend_request_made($user_id,$requested_id);
 
 Notification types:
 1 = friend_request_made /
 2 = friend_request_accepted /
 3 = user_subscribed /
 4 = commented_on_post /
 5 = posted_on_wall /
 6 = sent_message /
 7 = booking_request_made
 8 = booking_request_accepted
 
 9 = commented_on_post_on_wall /
 
*/
class Notification {
    
    public function friend_request_made($receiver_id,$actor_id)
	{
		$CI =   &get_instance();
        $CI->load->database('default');
        $query=null;
        
        $CI->load->model('notification_model');
        $query = $CI->notification_model->add_notification($receiver_id,1,$actor_id);
        
        return $query;
    }
    public function friend_request_accepted($receiver_id,$actor_id)
    {
		$CI =   &get_instance();
        $CI->load->database('default');
        $query=null;
        
        $CI->load->model('notification_model');
        $query = $CI->notification_model->add_notification($receiver_id,2,$actor_id);
        
        return $query;
    }
	
    public function user_subscribed($receiver_id,$actor_id)
    {
		$CI =   &get_instance();
        $CI->load->database('default');
        $query=null;
        
        $CI->load->model('notification_model');
        $query = $CI->notification_model->add_notification($receiver_id,3,$actor_id);
        
        return $query;
    }
	
    public function commented_on_post($receiver_id,$comment_id)
    {
        $CI =   &get_instance();
        $CI->load->database('default');
        $query=null;
        
        $CI->load->model('notification_model');
        $query = $CI->notification_model->add_notification($receiver_id,4,$comment_id);
        
        return $query;
    }
    public function posted_on_wall($receiver_id,$actor_id)
    {
        $CI =   &get_instance();
        $CI->load->database('default');
        $query=null;
        
        $CI->load->model('notification_model');
        $query = $CI->notification_model->add_notification($receiver_id,5,$actor_id);
        
        return $query;
    }
    public function sent_message($receiver_id,$actor_id)
    {
        $CI =   &get_instance();
        $CI->load->database('default');
        $query=null;
        
        $CI->load->model('notification_model');
        $query = $CI->notification_model->add_notification($receiver_id,6,$actor_id);
        
        return $query;
    }
    public function booking_request_made($receiver_id,$actor_id)
	{
		$CI =   &get_instance();
        $CI->load->database('default');
        $query=null;
        
        $CI->load->model('notification_model');
        $query = $CI->notification_model->add_notification($receiver_id,7,$actor_id);
        
        return $query;
    }
    public function booking_request_accepted($receiver_id,$actor_id)
	{
		$CI =   &get_instance();
        $CI->load->database('default');
        $query=null;
        
        $CI->load->model('notification_model');
        $query = $CI->notification_model->add_notification($receiver_id,8,$actor_id);
        
        return $query;
    }
    public function commented_on_post_on_wall($receiver_id,$comment_id)
    {
        $CI =   &get_instance();
        $CI->load->database('default');
        $query=null;
        
        $CI->load->model('notification_model');
        $query = $CI->notification_model->add_notification($receiver_id,9,$comment_id);
        
        return $query;
    }
	
	public function get_notifications($user_id,$limit){
		$CI =   &get_instance();
        $CI->load->database('default');
        $query=null;
        
        $CI->load->model('notification_model');
        $query = $CI->notification_model->get_notifications($user_id,$limit);
		$count = $CI->notification_model->get_notifications_count($user_id);
		$query = array_merge($query,$count);
        return $query;
	}
	
	public function get_notifications_count($user_id){
		$CI =   &get_instance();
        $CI->load->database('default');
        $query=null;
        
        $CI->load->model('notification_model');
        $query = $CI->notification_model->get_notifications_count($user_id);
        return $query;
	}
	public function notification_seen($nid){
		$CI =   &get_instance();
        $CI->load->database('default');
        $query=null;
        
        $CI->load->model('notification_model');
        $query = $CI->notification_model->notification_seen($nid);
        return $query;
	}
    
    
}

/* End of file Notification.php */