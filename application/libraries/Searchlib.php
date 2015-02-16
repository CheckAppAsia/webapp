<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/////////////////////////////////
//	NOTE: search_model SQL not updated yet
// Search Library
// by AncientAlien
//
// Sample Usage
// Controller: //////////////////
// $this->load->library('searchlib');
// $res = $this->searchlib->results(
//                                  $searchTerm//(string),
//                                  null,//(integer, refer to searchTypeVals),
//                                  $searchLat//(float),
//                                  $searchLng//(float),
//                                  $searchRad//(int),
//                                  $limit//(int, limits number of records)
//                              );
//
// searchTypeVals: //////////////
// 0   ->  all
// 2    ->  doctors
// 1    ->  patients
// 3    ->  institutions
//
//
/////////////////////////////////
class Searchlib {

	public function results($casenum,$search_term,$type,$lat,$lng,$rad,$limit)
	{
		$CI =   &get_instance();
		$CI->load->database('default');

		$query=null;

		$search_term = $search_term;//$_REQUEST['searchuru'];
		//$type = $_REQUEST['searchType']!="";
		$type = $type;
		$lat = $lat;//$_REQUEST['searchLat'];
		$lng = $lng;//$_REQUEST['searchLng'];
		$rad = $rad;//$_REQUEST['searchRad'];
		$limit = $limit;//$_REQUEST['limit'];


		if($search_term!=""){
			$CI->load->model('search_model');
			switch($casenum){
				default:
					if($type!=null){
						$query = $CI->search_model->search_by_type($search_term,$type,$lat,$lng,$rad,$limit);
					}else{
						$query = $CI->search_model->search_by_public($search_term,$lat,$lng,$rad,$limit);
					}
					break;
				case 1:
					if($type!=null){
						$query = $CI->search_model->search_by_type($search_term,$type,$lat,$lng,$rad,$limit);
					}else{
						$query = $CI->search_model->search_by_patient($search_term,$lat,$lng,$rad,$limit);
					}
					break;
				case 2:
					if($type!=null){
						$query = $CI->search_model->search_by_type($search_term,$type,$lat,$lng,$rad,$limit);
					}else{
						$query = $CI->search_model->search_by_doctor($search_term,$lat,$lng,$rad,$limit);
					}
					break;
			}



		}
		return $query;
	}

	public function friend($search_term,$uid){
		$CI =   &get_instance();
		$CI->load->database('default');
		$query=null;

		$search_term = $search_term;
		if($search_term!=""){
			$CI->load->model('search_model');
			$query = $CI->search_model->search_friend($search_term,$uid);
		}
		return $query;
	}

	public function user($search_term,$uid){
		$CI =   &get_instance();
		$CI->load->database('default');
		$query=null;

		$search_term = $search_term;
		if($search_term!=""){
			$CI->load->model('search_model');
			$query = $CI->search_model->search_user($search_term,$uid);
		}
		return $query;
	}

	public function country($search_term){
		$CI =   &get_instance();
		$CI->load->database('default');
		$query=null;

		$search_term = $search_term;
		if($search_term!=""){
			$CI->load->model('search_model');
			$query = $CI->search_model->search_country($search_term);
		}
		return $query;
	}

	public function school($search_term){
		$CI =   &get_instance();
		$CI->load->database('default');
		$query=null;

		$search_term = $search_term; 
		if($search_term!=""){
			$CI->load->model('search_model');
			$query = $CI->search_model->search_school($search_term);
		}
		return $query;
	}

	public function specialization($search_term){
		$CI =   &get_instance();
		$CI->load->database('default');
		$query=null;

		$search_term = $search_term;
		if($search_term!=""){
			$CI->load->model('search_model');
			$query = $CI->search_model->search_specialization($search_term);
		}
		return $query;
	}
	
	public function affiliation($search_term){
		$CI =   &get_instance();
		$CI->load->database('default');
		$query=null;
	
		$search_term = $search_term;
		if($search_term!=""){
			$CI->load->model('search_model');
			$query = $CI->search_model->search_affiliation($search_term);
		}
		return $query;
	}

}

/* End of file Searchlib.php */