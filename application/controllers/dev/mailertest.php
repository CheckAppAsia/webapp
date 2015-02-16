<?php
class MailerTest extends CA_Controller {
	
	public function index() {
		
		$this->load->library('CA_Mailer', '', 'Mailer');
		$mailing = $this->Mailer->send(array(
			'email' => 'jetriconew@gmail.com',
			'type' => 'account_verify',
			'data' =>  array(
				'verification_link' => 'ABCDE',
			),
		));
		
	}
}