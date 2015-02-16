<?php
class Overview extends CA_Controller{
	public $layout = 'col3';
	
	public function __construct() {
		parent::__construct();
		$this->requireLogin();
	}
		
	public function index(){
		//$userWidgets = $this->getUser('widgets', array('user_id'=>$this->self['id']));
		//$allWidgets = $this->getUser('allWidgets', array('user_type'=>$this->self['type']));
		
		//echo '<pre>';print_r($userWidgets);die();
		
		//$enbaled_widget_ids = array();
		//foreach($userWidgets['widgets'] as $widget){
		//	$enbaled_widget_ids[] = intval($widget->widget_id);
		//}
		
		$this->carabiner->js('_util/ajax.js');
		$this->carabiner->js('_util/alert_r.js');
		$this->carabiner->css('_util/dashboard.css');
		$this->carabiner->js('_util/dashboard.js');


		// $this->carabiner->css('dashboard/patient/overview.css');
		// $this->carabiner->js('dashboard/patient/overview.js');
		$this->carabiner->css('_theme/css/bootstrap.min.css');
		$this->carabiner->css('social/newsfeed.css');
		// $this->carabiner->js('social/timeline.js');
		$this->render('dashboard/patient/overview', array(
			//'userWidgets'=> $userWidgets['widgets'],
			//'allWidgets'=> $allWidgets['widgets'],
			//'enbaled_widget_ids'=> $enbaled_widget_ids,
		));
    }
	
	/* [ACTION] ALL WIDGETS
	Get list of all available widgets for a user_type
	-------------------------------------------------------*/
	public function saveWidgetList(){
		$widgets = ($this->input->post('widgets'))?$this->input->post('widgets'):array();
		$saveWidgets = $this->postUser('widgets', array(
			'user_id' => $this->self['id'],
			'widgets' => $widgets,
		));
		if($saveWidgets['status']=='TRUE'){
			$this->notify(1, 'Dashboard widgets saved');
		}else{
			$this->notify(0, $saveWidgets['message']);
		}
		redirect(base_url('dashboard/patient/overview'));
	}
	
	/* [AJAX-JSON] LOAD WIDGET DATA
	Get output for a widget, may call other functions
	-------------------------------------------------------*/
	public function loadWidgetData(){
		switch($this->input->get('widget_id')){
			case 3:
				$data = array(
					'color' => 'blue_green',
					'icon' => 'fa-check-square-o',
					'value1' => 'Bloog Glucose',
					'value2' => '223',
				);
				break;
			default:
				$data = array(
					'color' => 'blue_green',
					'icon' => 'fa-check-square-o',
					'value1' => 'Unknown widget',
					'value2' => '?',
				);
				break;
		}
		$this->ajaxResponse($data);
	}
	
}