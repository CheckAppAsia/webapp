<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
/*
 Photo Library v1.1
 by AncientAlien
 
 Sample Usage
 Controller: //////////////////
 $this->load->library('photo');
 $res = $this->photo->getPhoto(
                                  $type,
								  $filename
                              );
 
 typeVals: //////////////
	-	attach
	-	clinic
	-	medical
	-	userpic
 

*/
class Photo {
    
    public function getPhoto($type,$filename)
    {
        $CI =   &get_instance();
		$baseUrl = $CI->config->item('base_url');
		
		if($filename!=0 && $filename!=''){
			$src = $baseUrl."media/".$type."/".$filename;
			if (getimagesize($src) !== false) {
				$src = $src;
			} else {
				$src = $baseUrl."assets2/img/system/blank_profile.jpg";
			}
		}else{
			$src = $baseUrl."assets2/img/system/blank_profile.jpg";
		}
        return $src;
    }
    
    
}

/* End of file Photo.php */