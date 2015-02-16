<?php

class CA_Clinic {

	private providerObj;
	
	function CA_Clinic($id){
		$this->providerObj = $this->getProvider($id);
	}

	private getProvider($id){
		$db->select('u.id, up.*')
			->from('user u, user_profile up')
			->where('(u.id=up.user_id AND u.id='.$id.')');
			
		return $db->get()->row();
	}
	
	public function getStaffs(){
		/**
		 *	TODO getStaffs() function
		 *	- differentiate staff 
		 */
	}
	
	public function getClinic(){
		/**
		 *	TODO getClinic() function
		 *	- temporary returns 1 clinic
		 *	- discuss how clinic works with provider
		 */
		$db->select('pc.*')
			->from('physician_clinic pc')
			->where('(pc.physician_id = '.$this->providerObj['id'].')');
			
		return $db->get()->row();
	}
	
	public function addStaff(){
		/**
		 *	TODO addStaff() function
		 */
	}
	
	public function updateStaffInfo(){
		/**
		 *	TODO updateStaffInfo() function
		 */
	}
	
	public function removeStaff(){
		/**
		 *	TODO removeStaff() function
		 */
	}
	
}





