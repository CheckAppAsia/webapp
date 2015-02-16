<?php
class Prescription_model extends CI_Model {
 
	function search_drug($q)
	{
		$this->db->select(array('id','generic_name', 'brand_name ', 'strength', 'form'));
		// $this->db->select(array('id', 'brand_name AS name'));		
		$this->db->like('generic_name', $q);
		$this->db->or_like('brand_name', $q); 
		$result = $this->db->get('dev_library.medicines_ph');
		return $result->result();
	}
	
}