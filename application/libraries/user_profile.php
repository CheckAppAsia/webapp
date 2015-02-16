<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 



class user_profile {
    
    public function get_physician_profile($id)
	{
		$CI =   &get_instance();
        $CI->load->database('default');
        
        $CI->load->model('user_profile_model');
		#email
        $profile = $CI->user_profile_model->get_physician_profile($id);
		
		
        return $profile;
    }
	
}

/* End of file Profile_completion.php */