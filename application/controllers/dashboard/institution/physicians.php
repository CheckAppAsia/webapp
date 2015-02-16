<?php
class Physicians extends CA_Controller{
	public $layout = 'col3';
	
	public function __construct(){
		parent::__construct();
		$this->requireLogin();
	}
		
	public function index(){
		$prequests = $this->getInstitution('requests', array(
			'institution_id' => $this->self['institution']->id,
			'json' => 1,
		));
		
		$physicians = $this->getInstitution('physicians', array(
			'institution_id' => $this->self['institution']->id,
			'json' => 1,
		));
		
		$this->carabiner->css('dashboard/institution/physician.css');
		$this->carabiner->js('dashboard/institution/physician.js');
		$this->render('dashboard/institution/physician', array(
			'prequests' => json_decode($prequests['list']),
			'physicians' => json_decode($physicians['list']),
			'right_chat' => true,
		));
    }
	
	public function approve(){
		$this->ajaxResponse($this->postInstitution('approveRequest', array(
			'institution_id' => $this->self['institution']->id,
			'physician_id' => $this->input->post('physician_id'),
		)));
	}
	
	public function reject(){
		$this->ajaxResponse($this->postInstitution('rejectRequest', array(
			'institution_id' => $this->self['institution']->id,
			'physician_id' => $this->input->post('physician_id'),
		)));
	}
	
	public function update(){
		$this->ajaxResponse($this->postInstitution('updatePhysician', array(
			'institution_id' => $this->self['institution']->id,
			'physician_id' => $this->input->post('physician_id'),
			'since' => $this->input->post('since'),
			'position' => $this->input->post('position'),
		)));
	}
	
	public function remove(){
		$this->ajaxResponse($this->postInstitution('removePhysician', array(
			'institution_id' => $this->self['institution']->id,
			'physician_id' => $this->input->post('physician_id'),
		)));
	}
	
}