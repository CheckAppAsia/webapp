<?php
class Questionnaire_Model extends CA_Model {
	protected $tbl_questionnaire = 'questionnaire';
	protected $tbl_answer = 'questionnaire_answer';
	protected $tbl_item = 'questionnaire_item';
	protected $tbl_question = 'questionnaire_question';
	
	protected $pk_questionnaire= 'id';
	
	public function getQuestions($items){
		$this->db->select("id,question,type")
			->from($this->tbl_question)
			->where_in('id', $items);
		$query = $this->db->get();
		return $query->result();
	}
	
	public function getAnswers($patient_id, $items){
		$this->db->select("{$this->tbl_answer}.question_id, {$this->tbl_question}.question, {$this->tbl_answer}.answer")
			->from($this->tbl_answer)
			->where('user_id', $patient_id)
			->where_in('question_id', $items)
			->join($this->tbl_question, "{$this->tbl_answer}.question_id = {$this->tbl_question}.id", 'LEFT');
		$query = $this->db->get();
		return $query->result();
	}
}