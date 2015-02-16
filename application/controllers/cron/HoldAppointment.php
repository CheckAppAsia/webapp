<?php
class HoldAppointment extends CA_Controller{
	
	public function index() {
		$this->load->model('Appointment_Model', 'AM');
		$this->AM->update('appointment', array(
			'schedule <' => date('Y-m-d H:i:s'),
		), array(
			'status' => 4,
		));
		echo date('Y-m-d H:i:s');
	}
	
}