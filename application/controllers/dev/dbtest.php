<?php
class dbtest extends CI_Controller {
	
	public function index(){
		$this->db->select('emr.*');
		$this->db->from('checkapp_member.account patient');
		$this->db->where('patient.id', 1);
		$this->db->join('checkapp_emr.emr emr', 'emr.patient_id = patient.id');
		$EMRs = $this->db->get()->result_array();
		debug($EMRs);
	}
	
}