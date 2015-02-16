<?php
class CA_Mailer {
	private $_mailer;
	private $_CI;
	
    public function __construct(){
		$this->_CI =& get_instance();
		$this->_CI->config->load('email');
		$this->_CI->load->library('email');
    }
	
	public function send($params){
		// Prepare email object
		$email = $this->_CI->email;
		$email = $this->prepare( $email, $params['email'] );
		
		// Populate email content
		$type = $params['type'];
		$email = $this->$type( $email, $params['data'] );
		
		// Send email object
		$result = $email->send();
	}
	
	private function prepare($email, $to){
		// Return email object
		return $email
			->from(
				$this->_CI->config->item('from_email'),
				$this->_CI->config->item('from_name')
			)
			->reply_to($this->_CI->config->item('reply_to'))    
			->to($to);
	}
	
	/*------------------------------------------------------------------------
	------------------------------ EMAIL TYPES -------------------------------
	------------------------------------------------------------------------*/
	
	private function account_verify($email, $data){
		// Build Email HTML
		$html = $this->_CI->load->view('_emails/account_verify', array(
			'verification_link' => $data['verification_link'],
		), TRUE);
		
		// Return email object
		return $email
			->subject('CheckApp Asia - Welcome!')
			->message($html);
	}
	
	private function account_password($email, $data){
		// Build Email HTML
		$html = $this->_CI->load->view('_emails/account_password', array(
			'resetPassword' => $data['resetPassword'],
		), TRUE);
		
		// Return email object
		return $email
			->subject('CheckApp Asia - Forgot Password!')
			->message($html);
	}
	
	
	
	
}