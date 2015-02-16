<?php
class Appointment_Model extends CA_Model {
	protected $tbl_appointment = 'appointment';
	protected $tbl_user = 'user';
	protected $tbl_user_profile = 'user_profile';
	protected $tbl_prescription = 'appointment_meds';
	protected $tbl_record = 'appointment_record';
	
	protected $pk_appointment = 'id';
	
	public function getAppointment($id){
		$this->db->select('appointment.*, uPat.id as patient_id, uPhy.id as physician_id, uPat.username as patUN, pPat.first_name as patFN, pPat.last_name as patLN, pPat.profile_pic as patPP, uPhy.username as phyUN, pPhy.first_name as phyFN, pPhy.last_name as phyLN, pPhy.profile_pic as phyPP')
			->from($this->tbl_appointment)
			->where($this->tbl_appointment.'.id', $id)
			->join('user uPat', 'uPat.id = appointment.patient_id')
			->join('user_profile pPat', 'pPat.user_id = appointment.patient_id')
			->join('user uPhy', 'uPhy.id = appointment.physician_id')
			->join('user_profile pPhy', 'pPhy.user_id = appointment.physician_id');
		
		$query = $this->db->get();
		return $query->row();
	}
	
	public function getAppointments($physician, $patient, $range=array(), $status=1){
		$cmd = $this->db->select('appointment.id, appointment.status, uPat.id as patient_id, uPat.username as patUN, uPhy.id as physician_id, pPat.first_name as patFN, pPat.last_name as patLN, pPat.profile_pic as patPP, uPhy.username as phyUN, pPhy.first_name as phyFN, pPhy.last_name as phyLN, pPhy.profile_pic as phyPP, schedule, patient_note')
			->from('appointment')
			->order_by('schedule DESC');
			
		if(is_array($status)){
			$cmd->where_in('status', $status);
		}else{
			$cmd->where('status', $status);
		}
			
		if($range['type']=='page'){
			$cmd->limit($range['items'], ($range['page']-1)*$range['items']);
		}else if($range['type']=='date'){
			$cmd->where('DATE(schedule) >=', $range['start']);
			$cmd->where('DATE(schedule) <=', $range['end']);
		}
		
		if($physician>0){
			$cmd->where('physician_id', $physician);
		}
		
		if($patient>0){
			$cmd->where('patient_id', $patient);
		}
		
		$cmd->join('user uPat', 'uPat.id = appointment.patient_id')
			->join('user_profile pPat', 'pPat.user_id = appointment.patient_id')
			->join('user uPhy', 'uPhy.id = appointment.physician_id')
			->join('user_profile pPhy', 'pPhy.user_id = appointment.physician_id');
		$query = $this->db->get();
		return $query->result();
	}
	
	public function getUpcomingAppointment($physician=0, $patient=0){
		$cmd = $this->db->select('appointment.id, appointment.status, uPat.id as patient_id, uPat.username as patUN, uPhy.id as physician_id, pPat.first_name as patFN, pPat.last_name as patLN, pPat.profile_pic as patPP, uPhy.username as phyUN, pPhy.first_name as phyFN, pPhy.last_name as phyLN, pPhy.profile_pic as phyPP, schedule')
			->from('appointment')
			->where('status', 1)
			->where('schedule >', date('Y-m-d H:i:s'))
			->order_by('schedule DESC')
			->limit(1, 0);
		
		if($physician>0){ $cmd->where('physician_id', $physician); }
		if($patient>0){ $cmd->where('patient_id', $patient); }
		
		$cmd->join('user uPat', 'uPat.id = appointment.patient_id')
			->join('user_profile pPat', 'pPat.user_id = appointment.patient_id')
			->join('user uPhy', 'uPhy.id = appointment.physician_id')
			->join('user_profile pPhy', 'pPhy.user_id = appointment.physician_id');
		$query = $this->db->get();
		return $query->row();
	}
	
}