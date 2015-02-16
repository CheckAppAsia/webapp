<?php
class Messages extends CA_Controller {
	public $layout = 'col3';
	
	public function __construct() {
		parent::__construct();
		$this->requireLogin();
	}
	
	public function compose() {
		@$this->data['compose_to_id'] = $_POST['compose_id'];
		@$this->data['compose_to_name'] = $_POST['compose_name']." (".$_POST['compose_username'].")";
		@$this->data['compose_subject'] = $_POST['compose_subject'];
        @$this->data['compose_body'] = $_POST['compose_body'];
	
		$this->carabiner->css('dashboard/messages/compose.css');
		$this->carabiner->js('dashboard/messages/compose.js');
		$this->render('dashboard/messages/compose',array(
			'topnav' => 'top_messaging',
		),"col3");
	}
    
	public function index() {
		$threads = $this->getMessage('retrieveThreads', array('uid' => $this->self['id']));
		$this->data['threads'] = $threads;
		
        $this->data['topnav'] = 'top_messaging';
		
		$this->carabiner->css('dashboard/messages/inbox.css');
		$this->carabiner->js('dashboard/messages/inbox.js');
		$this->render('dashboard/messages/conversations', $this->data, "col3");
	}
	
    public function sendMessage(){
        $sendMessage = $this->getMessage('sendMessage', array(
            'type' => 1,
            'type_id' => 1,
            'sender' => $this->self['id'],
            'receiver' => $_POST['to'],
            'subject' => $this->db->escape_str($_POST['subject']),
            'message' => $this->db->escape_str($_POST['message'])
        ));
        echo json_encode($sendMessage);
    }
	
    public function createThread(){
        $createThread = $this->getMessage('createThread', array(
            'type' => $_POST['type'],
            'type_id' => $_POST['type_id'],
            'sender' => $this->self['id'],
            'receiver' => $_POST['receiver_id']
        ));
        echo json_encode($createThread);
    }
    
    public function retrieveThread(){
        $thread = $this->getMessage('retrieveThread', array(
            'thread_id' => $_POST['thread_id'],
			'uid' => $this->self['id']
        ));
        echo json_encode($thread);
    }
    
    public function replyToThread(){
        $thread = $this->getMessage('replyToThread', array(
            'thread_id' => $_POST['thread_id'],
            'sender' => $this->self['id'],
            'receiver' => $_POST['receiver'],
            'message' => $this->db->escape_str($_POST['message'])
        ));
        echo json_encode($thread);
    }
    public function replyToThreadAppointment(){
		$thread;
		if($_POST['thread_id']>0){
			$thread = $this->getMessage('replyToThread', array(
				'thread_id' => $_POST['thread_id'],
				'sender' => $this->self['id'],
				'receiver' => $this->db->escape_str($_POST['receiver']),
				'message' => $this->db->escape_str($_POST['message'])
			));
		}else{
			$thread = $this->getMessage('sendMessage', array(
				'type' => 2,
				'type_id' => $_POST['appointment_id'],
				'sender' => $this->self['id'],
				'receiver' => $_POST['receiver'],
				'subject' => $this->db->escape_str('appointment_'.$_POST['appointment_id']),
				'message' => $this->db->escape_str($_POST['message'])
			));
		}
		
        echo json_encode($thread);
    }
	
}