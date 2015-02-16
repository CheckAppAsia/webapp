<?php
require(APPPATH.'libraries/REST_Controller.php');
class Messaging extends REST_Controller {
	
	public function __construct(){
		parent::__construct();
		$this->load->model('messaging_model','m_model');
	}
	
	public function createThread_get(){
        $this->db->trans_begin();
        try {
            $newThread = $this->m_model->createThread($this->get('type'),
                                                      $this->get('type_id'),
                                                      $this->get('sender'),
                                                      $this->get('receiver'),
                                                      $this->get('subject'));
            $this->db->trans_complete();
            $this->response(array(
                'status' => 'TRUE',
                'message' => 'thread created'.$newThread,
            ));
        }catch(Exception $e){
            $this->db->trans_rollback();
			$this->response(array(
				'status' => 'FALSE',
				'message' => $e->getMessage(),
			));
		}
	}
	
	public function sendMessage_get(){
        $this->db->trans_begin();
        try {
            $newThread = $this->m_model->createThread($this->get('type'),
                                                      $this->get('type_id'),
                                                      $this->get('sender'),
                                                      $this->get('receiver'),
                                                      $this->get('subject'));
            $newMessage = $this->m_model->createMessage($newThread,
                                                      $this->get('sender'),
                                                      $this->get('receiver'),
                                                      $this->get('message'));
            $this->db->trans_complete();
            $this->response(array(
                'status' => 'TRUE',
                'message' => $newThread,
            ));
        }catch(Exception $e){
            $this->db->trans_rollback();
			$this->response(array(
				'status' => 'FALSE',
				'message' => $e->getMessage(),
			));
		}
	}
    
    
	public function replyToThread_get(){
		$this->db->trans_begin();
        try {
            
            $newMessage = $this->m_model->createMessage($this->get('thread_id'),
                                                      $this->get('sender'),
                                                      $this->get('receiver'),
                                                      $this->get('message'));
            $this->db->trans_complete();
            $this->response(array(
                'status' => 'TRUE',
                'message' => $this->get('thread_id'),
            ));
        }catch(Exception $e){
            $this->db->trans_rollback();
			$this->response(array(
				'status' => 'FALSE',
				'message' => $e->getMessage(),
			));
		}
	}
    
    public function retrieveThreads_get(){
        $this->db->trans_begin();
        try {
            
            $threads = $this->m_model->retrieveThreads($this->get('uid'));
            $this->db->trans_complete();
			$count = 0;
			foreach($threads as $thread){
				if($thread['seen']==0){
					$count++;
				}
			}
            $this->response(array(
                'status' => 'TRUE',
                'message' => $threads,
                'count' => $count
            ));
        }catch(Exception $e){
            $this->db->trans_rollback();
			$this->response(array(
				'status' => 'FALSE',
				'message' => $e->getMessage(),
			));
		}
    }
    
	public function retrieveThread_get(){
		$this->db->trans_begin();
        try {
            
            $thread = $this->m_model->retrieveThread($this->get('thread_id'),$this->get('uid'));
            $this->db->trans_complete();
			
            $this->response(array(
                'status' => 'TRUE',
                'message' => $thread
            ));
        }catch(Exception $e){
            $this->db->trans_rollback();
			$this->response(array(
				'status' => 'FALSE',
				'message' => $e->getMessage(),
			));
		}
	}
    
    public function saveDraft_post(){
        
    }
    
    
    public function trashMessage_post(){
        $this->db->trans_begin();
        try {
            
            $trashMessage = $this->m_model->trashMessage($this->get('thread_message_id'));
            $this->db->trans_complete();
            $this->response(array(
                'status' => 'TRUE',
                'message' => 'message deleted'.$trashMessage,
            ));
        }catch(Exception $e){
            $this->db->trans_rollback();
			$this->response(array(
				'status' => 'FALSE',
				'message' => $e->getMessage(),
			));
		}
    }
	
	public function retrieveTid_get(){
		$this->db->trans_begin();
        try {
            
            $tid = $this->m_model->retrieveTid($this->get('type'),$this->get('type_id'));
            $this->db->trans_complete();
			
            $this->response(array(
                'status' => 'TRUE',
                'message' => $tid
            ));
        }catch(Exception $e){
            $this->db->trans_rollback();
			$this->response(array(
				'status' => 'FALSE',
				'message' => $e->getMessage(),
			));
		}
	}
	
}