<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 



class Profile_completion {
    
    public function check_completion($id,$type)
	{
		$CI =   &get_instance();
        $CI->load->database('default');
        $points=0;
		$total=0;
        
        $CI->load->model('profile_completion_model');

		#email
        $email = $CI->profile_completion_model->check_email_verification($id);
		if(!empty($email) && $email['status']!=0){ $points++; }
		$total++;
		
		#name
        $name = $CI->profile_completion_model->check_name($id);
		if($name['title']!=""){ $points++; }
		$total++;
		if($name['first_name']!=""){ $points++; }
		$total++;
		if($name['last_name']!=""){ $points++; }
		$total++;
		
		#address
        $address = $CI->profile_completion_model->check_address($id);
		if($address['address1']!="" | $address['address2']!=""){ $points++; }
		$total++;
		
		#birthdate 
        $birthdate = $CI->profile_completion_model->check_birthdate($id);
		if($birthdate['birthdate']!="0000-00-00 00:00:00.000000"){ $points++; }
		$total++;
		
		#gender
        $gender = $CI->profile_completion_model->check_gender($id);
		if($gender['gender']!=0){ $points++; }
		$total++;
		
		#profile_pic
        $profile_pic = $CI->profile_completion_model->check_profile_pic($id);
		if($profile_pic['profile_pic']!="" | $profile_pic['profile_pic']!="default.jpg"){ $points++; }
		$total++;
		
		if($type==2){
			#physician_profile
			$physician_profile = $CI->profile_completion_model->check_physician_profile($id);
			if($physician_profile['about']!=""){ $points++; }
			$total++;
			if($physician_profile['specializations']!=""){ $points++; }
			$total++;
			if($physician_profile['license_no']!=""){ $points++; }
			$total++;
			
			#physician_document
			$physician_document = $CI->profile_completion_model->check_physician_document($id);
			if($physician_document['count']>0){ $points++; }
			$total++;
        }
        return ($points/$total)*100;
    }
	
}

/* End of file Profile_completion.php */
