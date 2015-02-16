<?php
require(APPPATH.'libraries/CA_Controller.php');
class Friend extends CA_Controller {

	public function __construct(){
        parent::__construct();
    }
	
	
	public function index(){
		print_r('Friend controller');
	}
	
	public function add(){
		if($this->input->post()){
		
			if($this->input->post('user_id_1') && $this->input->post('user_id_2')){
				$data = array(
					'user_id_1' => $this->input->post('user_id_1'),
					'user_id_2' => $this->input->post('user_id_2'),
					'current_user' => $this->session->userdata('user_data')['id'],
					'isNew' => false,
				);
			}else{
				$data = array(
					'user_id_1' => $this->session->userdata('user_data')['id'],
					'user_id_2' => $this->input->post('target'),
					'isNew' => true,
				);
			}
			
			$addFriend = $this->postUser('addFriend', $data);
			$this->redirect(true,$this->input->post('username'));
		}else{
			$this->denyAccess();
		}
	}
	
	public function accept(){
		if($this->input->post()){
			$data = array(
				'user_id_1' => $this->input->post('user_id_1'),
				'user_id_2' => $this->input->post('user_id_2'),
			);
			
			$acceptFriend = $this->postUser('acceptFriend', $data);
			$this->redirect(true,$this->input->post('username'));
		}else{
			$this->denyAccess();
		}
	}
	
	public function reject(){
		if($this->input->post()){
			$data = array(
				'user_id_1' => $this->input->post('user_id_1'),
				'user_id_2' => $this->input->post('user_id_2'),
			);
			
			$rejectFriend = $this->postUser('rejectFriend', $data);
			$this->redirect(true,$this->input->post('username'));
		}else{
			$this->denyAccess();
		}
	}
	
	public function delete(){
		if($this->input->post()){
			$data = array(
				'user_id_1' => $this->input->post('user_id_1'),
				'user_id_2' => $this->input->post('user_id_2'),
			);
			
			$deleteFriend = $this->postUser('deleteFriend', $data);
			$this->redirect(true,$this->input->post('username'));
		}else{
			$this->denyAccess();
		}
	}
	
	public function subscribe(){
		if($this->input->post()){
			$data = array(
				'user_id' => $this->input->post('user_id'),
				'physician_id' => $this->input->post('physician_id'),
			);
			
			$subscribe = $this->postUser('subscribe', $data);
			$this->redirect(true,$this->input->post('username'));
		}else{
			$this->denyAccess();
		}
	}
	
	public function unsubscribe(){
		if($this->input->post()){
			$data = array(
				'user_id' => $this->input->post('user_id'),
				'physician_id' => $this->input->post('physician_id'),
			);
			
			$unsubscribe = $this->postUser('unsubscribe', $data);
			$this->redirect(true,$this->input->post('username'));
		}else{
			$this->denyAccess();
		}
	}
	
	/* UTILITIES */
	
	private function redirect($success,$username){
		if($success){
			redirect($this->config->base_url()."user/".$username);
		}else{
			print_r('Action Failed');
		}
	}
	
	private function denyAccess(){
		print_r('Unauthorized Access!');
	}
	
}