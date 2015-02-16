<?php
class Account extends CA_Controller{

	public function index(){
		
	}
	
	/* LOGIN
	Shows login page (submits to self)
	-------------------------------------------------------*/
	public function login(){
		
		if($this->input->post()){
			// Call User REST to check login details
			$loginRest = $this->postUser('login', array(
				'userlogin' => $this->input->post('userlogin'),
				'password' => $this->input->post('password'),
			));
						
			if($loginRest->status==TRUE){
				// Save data to session
				$this->session->set_userdata('user_logged', TRUE);
				$this->session->set_userdata('user_data', $loginRest->data);
				
				// If provider, save institution onto session
				/*if($this->self['type']==2){
					$this->session->set_userdata('institution', $loginRest->data->institution);
				}*/
				
				// Redirect after login
				if($this->input->get('return')){
					redirect(base_url($this->input->get_post('return')));
				}else{
					redirect(base_url());
				}
				
			}else{
				// Invalid Login
				$loginError = $loginRest->message;
			}
		}
		
		// Render login page
		$this->title = 'Login to CheckApp';
		$this->carabiner->css('account/login.css');
		$this->carabiner->js('account/login.js');
		$this->render('account/login', array(
			'errorMessage' => (isset($loginError))?$loginError:FALSE,
		));
	}
	
	/* LOGOUT
	Direct logout action link
	-------------------------------------------------------*/
	public function logout() {
		$this->session->sess_destroy();
		redirect(base_url());
	}
	
	/* SIGNUP
	Signup page and related actions
	-------------------------------------------------------*/
	public function signup(){
		if($this->input->post()){
			// Call sign-up REST for an attempt
			$signupRest = $this->postUser('signup', array(
				'type' => $this->input->post('user_type'),
				'email' => $this->input->post('email'),
				'username' => $this->input->post('username'),
				'password' => $this->input->post('password'),
				'first_name' => $this->input->post('first_name'),
				'last_name' => $this->input->post('last_name'),
			));

			if($signupRest->status==TRUE){
				// Redirect after signup
				if($this->input->get_post('return')){
					redirect(base_url($this->input->get_post('return')));
				}else{
					redirect(base_url('account/welcome'));
				}
			}else{
				// Invalid Login
				echo $signupRest->message;
			}
		
		}
	}
	
	/* WELCOME
	Successful signup, please verify email
	-------------------------------------------------------*/
	public function welcome() {
		$this->carabiner->css('account/welcome.css');
		$this->carabiner->js('account/welcome.js');
		$this->render('account/welcome');
	}
	
	/* VERIFY EMAIL
	Verify email landing and code processing
	-------------------------------------------------------*/
	public function verify(){
		if($this->input->get()){
			// Call verification REST for checking
			$verifyRest = $this->postUser('verify', array(
				'user_id' => $this->input->get('u'),
				'code' => $this->input->get('c'),
			));
			
			if($verifyRest->status==TRUE){
			
				// Providers
				if(intval($this->input->get('t')) == 2) {
					$this->postUser('setAuth', array(
						'user_id' => $userId,
						'status' => 2
					));
				}
				
				// Show verification success message
				$this->carabiner->css('account/login.css');
				$this->carabiner->js('account/login.js');
				$this->render('account/verify');
				
			}else{
				// Show verification error page
				$this->carabiner->css('account/login.css');
				$this->carabiner->js('account/login.js');
				$this->render('account/verify_error', array(
					'message' => $verifyRest->message,
				));
			}
		
		}
	}
	
	/* FORGOT PASSWORD
	Shows forgot password page
	-------------------------------------------------------*/
	public function forgot(){
		$data = array(
			'error' => 0,
			'success' => 0,
		);
		if($this->input->post()){
			
			$checkEmail = $this->getUser('userAccountDetails', array(
				'email' => $this->input->post('email'),
			));
		
			if(isset($checkEmail) && isset($checkEmail->data[0]->id)){
				
				$post = array(
					'email' => $checkEmail->data[0]->email,
					'id' => $checkEmail->data[0]->id,
				);
				
				$resetPassword = $this->postUser('resetPassword',$post);
				$data['success'] = 1;
				
			}else{
				$data['error'] = 1;
				$data['invalid_email'] = $this->input->post('email');
			}
		}
		$this->carabiner->css('account/forgotpassword.css');
		$this->carabiner->js('account/forgotpassword.js');
		$this->render('account/forgotpassword', $data);
	}
	
}