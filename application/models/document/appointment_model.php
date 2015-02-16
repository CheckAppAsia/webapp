<?php
class Appointment_model extends CB_Model {
	public $database = db_documents;
	public $table_name = 'appointment';
	public $id_field = 'id';
	
	public function relations(){
		return array(
			'institution' => array(db_institution, 'appointment.institution_id = institution.id'),
			'account' => array(db_member, 'appointment.member_id = account.id'),
			'profile' => array(db_member, 'appointment.member_id = profile.user_id'),
		);
	}


	public function start_consultation($post)
	{
		// debug($post); exit;
		$this->db->select('start_time');
		$this->db->where('provider_id', $post['provider_id']);
		$this->db->where('member_id', $post['member_id']);
		$this->db->where('id', $post['appointment_id']);
		$result = $this->db->get($this->database.'.appointment');
		$time = $result->row()->start_time;

		if ($time == '0000-00-00 00:00:00')
		{
			$time = date("Y-m-d H:i:s");
			$data = array(
				'start_time' => $time
				);
			$this->db->where('id', $post['appointment_id']);
			$this->db->update($this->database.'.appointment', $data); 
		}
 
		return date('M d, Y H:i:s', strtotime($time));
	}	 
} 
