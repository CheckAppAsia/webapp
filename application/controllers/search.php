<?php
class Search extends CA_Controller{

    public function __construct() {
		parent::__construct();
		
    }
    
	public function index() {
		
        $this->data['sLat']=14.6090537;
        $this->data['sLng']=121.02225650000003;
		$this->data['sresults']=array();
		$this->data['sterm']="";
		$this->data['sLoc']="";
        if(isset($this->self['id'])){
			$this->layout = 'col3';
			$this->render('search',$this->data);
		}else{
			$this->layout = 'col1';
			$this->render('search',$this->data);
		}
	}
	
	public function results() {
        // Get patient's profile
		$patient_profile = $this->postMember('search', array('last_name'=>$_POST['searchuru']));
		
		$this->data['sresults']=$patient_profile->data;
        $this->data['sterm']=$_POST['searchuru'];
        $this->data['sLat']=$sLat;
        $this->data['sLng']=$sLng;
        $this->data['sLoc']=$sLoc;

        // Render view
        if(isset($this->self['id'])){
            $this->layout = 'col3';
            $this->render('search',$this->data);
        }else{
            $this->layout = 'col1';
            $this->render('search',$this->data);
        }
	}

/*	
    public function results() {
		$this->load->library('searchlib');
        $sTerm="";
        $sLoc = $this->db->escape_str(preg_replace('@[^0-9a-z\. ]+@i', '', (isset($_POST['searchLoc']) ? $_POST['searchLoc'] : "")));
        //
        if(isset($_POST['searchuru'])){
            $sTerm = $this->db->escape_str(preg_replace('@[^0-9a-z\. ]+@i', '', $_POST['searchuru']));
			$sLat = $this->db->escape_str(preg_replace('@[^0-9a-z\. ]+@i', '', (isset($_POST['searchLat']) ? $_POST['searchLat'] : 0)));
			$sLng = $this->db->escape_str(preg_replace('@[^0-9a-z\. ]+@i', '', (isset($_POST['searchLng']) ? $_POST['searchLng'] : 0)));
        }else if(isset($_POST['searchurus'])){
            $sTerm = $this->db->escape_str(preg_replace('@[^0-9a-z\. ]+@i', '', $_POST['searchurus']));
			$sLat = $this->db->escape_str(preg_replace('@[^0-9a-z\. ]+@i', '', (isset($_POST['searchLats']) ? $_POST['searchLats'] : 0)));
			$sLng = $this->db->escape_str(preg_replace('@[^0-9a-z\. ]+@i', '', (isset($_POST['searchLngs']) ? $_POST['searchLngs'] : 0)));
			
        }
        
        $casenum = 0;
        if($this->session->userdata['user_data']){
            $casenum = $this->session->userdata['user_data']->type;
        }
        
        $res = $this->searchlib->results(
			$casenum,
			$sTerm,
			$this->db->escape_str(preg_replace('@[^0-9a-z\. ]+@i', '', (isset($_POST['searchType']) ? $_POST['searchType'] : null))),
			$sLat,
			$sLng,
			$this->db->escape_str(preg_replace('@[^0-9a-z\. ]+@i', '', (isset($_POST['searchRad']) ? $_POST['searchRad'] : 0))),
			$this->db->escape_str(preg_replace('@[^0-9a-z\. ]+@i', '', (isset($_POST['limit']) ? $_POST['limit'] : 0)))
		);
		//$res = array();
        //echo $res;
        
        if(isset($_POST['limit'])){
            echo json_encode($res);
        }else{
			//print_r($res);
            $this->data['sresults']=$res;
            $this->data['sterm']=$sTerm;
            $this->data['sLat']=$sLat;
            $this->data['sLng']=$sLng;
            $this->data['sLoc']=$sLoc;
            if(isset($this->self['id'])){
				$this->layout = 'col3';
                $this->render('search',$this->data);
            }else{
				$this->layout = 'col1';
                $this->render('search',$this->data);
            }
        }
	}
*/    
    public function friend(){
        $this->load->library('searchlib');
        $sTerm;
        $uid;
        $sTerm = $this->db->escape_str(preg_replace('@[^0-9a-z\. ]+@i', '', $_POST['to']));
        $uid = $this->db->escape_str(preg_replace('@[^0-9a-z\. ]+@i', '', $_POST['uid']));
        
        
        
        $res = $this->searchlib->friend(
			$sTerm,
			$uid
		);
       
        echo json_encode($res);
        
    }
    
    
public function country() {
		
		$this->load->library('searchlib');
		$sTerm = $this->db->escape_str(preg_replace('@[^0-9a-z\. ]+@i', '', $_POST['searchuru']));
		if($this->session->userdata['user_data']){
			$casenum = $this->session->userdata['user_data']['type'];
		}
		
		$res = $this->searchlib->country($sTerm);
		if(isset($_POST['limit'])){

			echo json_encode($res);

		}

	}
	
	
	public function school() {
	 
		$this->load->library('searchlib');
		$sTerm = $this->db->escape_str(preg_replace('@[^0-9a-z\. ]+@i', '', $_POST['searchuru']));

		// if($this->session->userdata['user_data']){
		// 	$casenum = $this->session->userdata['user_data']['type'];
		// } 

		$res = $this->searchlib->school(addslashes($sTerm));
		if(isset($_POST['limit'])){
	
			echo json_encode($res);
	
		}
	
	}
	
	
public function specialization() {
		
		$this->load->library('searchlib');
		$sTerm = $this->db->escape_str(preg_replace('@[^0-9a-z\. ]+@i', '', $_POST['searchuru']));
		// if($this->session->userdata['user_data']){
		// 	$casenum = $this->session->userdata['user_data']['type'];
		// }
		// echo $sTerm; exit;
		$res = $this->searchlib->specialization($sTerm);
		if(isset($_POST['limit'])){

			echo json_encode($res);

		}

	}
	
	public function Affiliation() {
	
		$this->load->library('searchlib');
		$sTerm = $this->db->escape_str(preg_replace('@[^0-9a-z\. ]+@i', '', $_POST['searchuru']));
		// if($this->session->userdata['user_data']){
		// 	$casenum = $this->session->userdata['user_data']['type'];
		// }
	
		$res = $this->searchlib->Affiliation($sTerm);
		if(isset($_POST['limit'])){
	
			echo json_encode($res);
	
		}
	
	}
    
}

/* End of file search.php */
/* Location: ./application/controllers/search.php */
