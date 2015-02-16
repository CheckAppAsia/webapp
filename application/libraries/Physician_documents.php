<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 



class Physician_documents {
    
    public function add_document($id,$type,$filename)
	{
		$CI =   &get_instance();
        $CI->load->database('default');
        $query=null;
        
        $CI->load->model('physician_documents_model');
        $query = $CI->physician_documents_model->add_document($id,$type,$filename);
        
        return $query;
    }
	
	public function remove_document($id,$uid){
		$CI =   &get_instance();
        $CI->load->database('default');
        $query=null;
        
        $CI->load->model('physician_documents_model');
        $query = $CI->physician_documents_model->remove_document($id,$uid);
        
        return $query;
	}
    
	public function get_documents($id,$limit){
		$CI =   &get_instance();
        $CI->load->database('default');
        $query=null;
        
        $CI->load->model('physician_documents_model');
        $query = $CI->physician_documents_model->get_documents($id,$limit);
        
        return $query;
	}
	
	
	public function get_verified_count($id){
		$CI =   &get_instance();
        $CI->load->database('default');
        $query=null;
        
        $CI->load->model('physician_documents_model');
        $query = $CI->physician_documents_model->get_verified_count($id);
        
        return $query;
	}
	
	public function verify($id,$uid,$status){
		$CI =   &get_instance();
        $CI->load->database('default');
        $query=null;
        
        $CI->load->model('physician_documents_model');
        $query = $CI->physician_documents_model->verify_doc($id,$uid,$status);
        
        return $query;
	}
    
}

/* End of file Physician_verifications.php */