<?php
class Questionnaire extends CA_Controller{
	public $layout= 'col3';
	
	public function __construct() {
		parent::__construct();
		$this->requireLogin();
	}
		
	public function index(){
		/*
		SETUP: 1 physician = 1 questionnaire
		- will be changed to 1 physician can create multiple questionnaires
		- on that case, flow will be changed
		*/
		
		// Fetch physician's questionnaire
		$myQuestionnaire = $this->getPhysician('questionnaire', array(
			'physician_id' => $this->self['id'],
		));
		$myQuestionnaire = json_decode($myQuestionnaire['info']);
		
		// If no questionnaire yet, auto-create
		if(!$myQuestionnaire){
			$myQuestionnaire = $this->postPhysician('questionnaire', array(
				'physician_id' => $this->self['id'],
			));
			$myQuestionnaire = json_decode($myQuestionnaire['info']);
		}
		
		// Redirect to edit questionnaire
		redirect('dashboard/physician/questionnaire/'.$myQuestionnaire->id);
    }
	
	public function edit($id){
		$myQuestionnaire = $this->getPhysician('questionnaire', array(
			'physician_id' => $this->self['id'],
			'includeItems' => 1,
		));
		
		$questionnaire = json_decode($myQuestionnaire['info']);
		$questions = json_decode($myQuestionnaire['items']);
		
		$this->carabiner->css('dashboard/physician/form.css');
		$this->carabiner->js('dashboard/physician/form.js');
		$this->render('dashboard/physician/questionnaire/edit', array(
			'questionnaire' => $questionnaire,
			'questions' => $questions,
		));
    }
	
	public function saveItems(){
		$questions = array();
		$iquestions = $this->input->post('question');
		$itype = $this->input->post('type');
		
		foreach($iquestions as $index=>$iquestion){
			$questions[] = array(
				'question' => $iquestion,
				'type' => $itype[$index],
			);
		}
		
		$saveQuestionnaire = $this->postPhysician('questionnaire', array(
			'questionnaire_id' => $this->input->post('questionnaire_id'),
			'questions' => $questions,
		));
		
		if($saveQuestionnaire['status']=='TRUE'){
			$this->notify(1, 'Questionnaire items were saved.');
		}else{
			$this->notify(0, $saveQuestionnaire['message']);
		}
		redirect('dashboard/physician/questionnaire/'.$this->input->post('questionnaire_id'));
	}
	
}