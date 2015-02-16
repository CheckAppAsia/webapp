<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
/*
 Settings Library
 by Aldrin
 
 Sample usage:
 Controller:
 $this->load->library('user_settings');
 $res = $this->user_settings->changeSetting($user_id,$var_id,$set_val);
 
 Privacy setting values
 0 = everyone
 1 = only you
 2 = doctors
 3 = friends

 
*/
class User_Settings {
    
	public function changeSetting($user_id,$var_id,$set_val){
		$CI =   &get_instance();
        $CI->load->database('default');
        $query=null;
        try{
            $CI->load->model('user_settings_model');
            $query = $CI->user_settings_model->changeSetting($user_id,$var_id,$set_val);
            return true;
        }catch(Exception $e){
            return false;
        }
        
	}

    public function retrieveSettings($user_id){
        $CI =   &get_instance();
        $CI->load->database('default');
        $query=null;
        
        $CI->load->model('user_settings_model');
        $query = $CI->user_settings_model->retrieveSettings($user_id);

        $settings = array();
        $count = 1;
        foreach($query as $setting){
            $settings[$setting['setting_id']] = $setting['value'];
        }
        
        return $settings;
    } 
}

/* End of file Settings.php */