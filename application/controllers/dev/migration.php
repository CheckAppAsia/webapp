<?php
class Migration extends CB_Controller{
	
	/* SIGNUP
	Signup page and related actions
	-------------------------------------------------------*/
	public function signup(){
		if($this->input->post('user_type')==1){
			$result = $this->postMember('signup', array(
				'user_type' => $this->input->post('user_type'),
				'username' => $this->input->post('username'),
				'password' => $this->input->post('password'),
				'email' => $this->input->post('email'),
				'first_name' => $this->input->post('first_name'),
				'last_name' => $this->input->post('last_name'),
				'format' => 'json',
			));
		}else if($this->input->post('user_type')==2){
			$result = $this->postProvider('signup', array(
				'user_type' => $this->input->post('user_type'),
				'username' => $this->input->post('username'),
				'password' => $this->input->post('password'),
				'email' => $this->input->post('email'),
				'first_name' => $this->input->post('first_name'),
				'last_name' => $this->input->post('last_name'),
				'format' => 'json',
			));
		}
		if($result['status']=='TRUE'){
			redirect(base_url('account/welcome'));
		}else{
			$this->notify(0, $result['message']);
			redirect(base_url('beta/frontpage'));
		}
	}
	
}