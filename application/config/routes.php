<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$route = array(
	'default_controller' => 'frontpage',
		
	'admin' => 'admin/access',
	'admin/login' => 'admin/access/login',
	'admin/logout' => 'admin/access/logout',
		
	'api/(:any)' => 'api/$1',
	'api' => 'api/index',
	
	// STATIC PAGES
	'about' => 'website/about',
	'contact' => 'website/contact',
	'privacy' => 'website/privacy',
	
	// SOCIAL MEDIA
	'post/(:num)' => 'social/post_page/$1',
	
	// USER PROFILE
	'user/(:any)/family_history' => 'patient/family_history/$1',
	'user/(:any)/medical_history' => 'patient/medical_history/$1',
	'user/(:any)/medical_profile' => 'patient/medical_profile/$1',
	'user/(:any)/sos_contact' => 'patient/sos_contact/$1',
	//'user/(:any)/friends' => 'patient/friends/$1',
	'user/(:any)/subscriptions' => 'patient/subscriptions/$1',
	
	'user/(:any)/professional' => 'physician/professional/$1',
	'user/(:any)/patients' => 'physician/patients/$1',
	'user/(:any)/colleagues' => 'physician/colleagues/$1',
	'user/(:any)/schedule' => 'physician/schedule/$1',
	
	'user/(:any)/profile' => 'user/profile/$1',
	'user/(:any)/friends' => 'user/friends/$1',
	'user/(:any)/(:any)' => 'user/$2/$1',
	'user/(:any)' => 'user/index/$1',
	
	// DASHBOARD: Physician
	'dashboard/physician/appointments/day' => 'dashboard/physician/appointments/view_day',
	'dashboard/physician/appointments/day/(:any)' => 'dashboard/physician/appointments/view_day/$1',
	'dashboard/physician/appointments/calendar' => 'dashboard/physician/appointments/view_month',
	'dashboard/physician/appointments/(:num)' => 'dashboard/physician/appointments/diagnose/$1',
	'dashboard/physician/questionnaire/' => 'dashboard/physician/questionnaire',
	'dashboard/physician/questionnaire/(:num)' => 'dashboard/physician/questionnaire/edit/$1',
	
	// DASHBOARD: Patient
	'dashboard/patient/appointments' => 'dashboard/patient/appointments',
	'dashboard/patient/appointments/(:num)' => 'dashboard/patient/appointments/view/$1',
	'dashboard/patient/overview' =>'dashboard/patient/overview',
	
	// INSTITUTION
	'institution/(:num)' => 'institution/timeline/$1',
	'institution/(:num)/(:any)' => 'institution/$2/$1',
	
	// REST SERVICES
	'admin/(:any)' => 'admin/$1',
	'rest/(:any)' => 'rest/$1'
);