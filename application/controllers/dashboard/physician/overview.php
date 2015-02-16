<?php
class Overview extends CA_Controller{
	public $layout = 'col3';
	
	public function __construct() {
		parent::__construct();
		$this->requireLogin();
	}
		
	public function index(){
		$this->carabiner->js('_util/ajax.js');
		$this->carabiner->js('_util/alert_r.js');
		$this->carabiner->css('_util/dashboard.css');
		$this->carabiner->js('_util/dashboard.js');
		$this->carabiner->css('dashboard/physician/overview.css');
		
		$provider_id = $this->self['id']; 
		//get all appointments data
		$this->load->model('document/appointment_model');

			// $this->load->model('document/AppointmentModel');
			$fields = '
				appointment.*,
				
				institution.name AS institution_name,
				institution.address AS institution_address,
				institution.profile_pic AS institution_profile_pic,
				
				account.email AS account_email,
				account.username AS account_username,
				
				profile.title AS profile_title,
				profile.first_name AS profile_first_name,
				profile.middle_name AS profile_middle_name,
				profile.last_name AS profile_last_name,
				profile.birthdate AS profile_birthdate,
				profile.gender AS profile_gender,
				profile.address AS profile_address,
				profile.profile_pic AS profile_profile_pic
				';
			
			$condition = array(
				$this->appointment_model->table_name.".schedule >=" => date('Y-m-d 00:00:00', strtotime('yesterday')),
				$this->appointment_model->table_name.".schedule <=" => date('Y-m-d 00:00:00', strtotime('+ 2 days')),
				$this->appointment_model->table_name.".provider_id" => $provider_id,
			);
			
			$appointments = $this->appointment_model->read(
				$condition,
				'institution,account,profile',
				$fields
			);

			// debug($appointments); exit;
		$appointmentdates = array();
		$yesterday = date("Y-m-d", strtotime('yesterday'));
		$today = date("Y-m-d");		
		$tomorrow = date("Y-m-d", strtotime('tomorrow')); 

		foreach($appointments AS $k => $v)
		{
				if (strpos($v->schedule, $yesterday) !== FALSE ) $appointmentdates['yesterday'][$this->trimtime($v->schedule)] = $appointments[$k];
				if (strpos($v->schedule, $today) !== FALSE ) $appointmentdates['today'][$this->trimtime($v->schedule)] = $appointments[$k];
				if (strpos($v->schedule, $tomorrow)  !== FALSE ) $appointmentdates['tomorrow'][$this->trimtime($v->schedule)] = $appointments[$k]; 
		}
 
		$this->carabiner->js('dashboard/physician/overview.js');
		$this->render('dashboard/physician/overview', array('appointments' => $appointmentdates));
    }
	
	//returns the schedule time for sorting arrays
	function trimtime($time)
	{	
		$time = substr($time, -8, 5);
		return str_ireplace(':', '', $time);
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
		redirect(base_url('dashboard/physician/overview'));
	}
	
	/* [AJAX-JSON] LOAD WIDGET DATA
	Get output for a widget, may call other functions
	-------------------------------------------------------*/
	public function loadWidgetData(){
		switch($this->input->get('widget_id')){
			case 1:
				$appointment = $this->getPhysician('upcomingAppointment', array(
					'physician_id' => $this->self['id'],
				));
				$appointment = json_decode($appointment['info']);
				
				if(isset($appointment->schedule)){
					$schedule1 = date('M j, Y', strtotime($appointment->schedule));
					$schedule2 = date('h:i A', strtotime($appointment->schedule));
				}else{
					$schedule1 = '&nbsp;';
					$schedule2 = 'None';
				}
				
				$data = array(
					'color' => 'blue_green',
					'icon' => 'fa-check-square-o',
					'value1' => $schedule1,
					'value2' => $schedule2,
				);
				break;
			case 2:
				$data = array(
					'color' => 'yellow',
					'icon' => 'fa-tags',
					'value1' => 'This month',
					'value2' => '$5,260',
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