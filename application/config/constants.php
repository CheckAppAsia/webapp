<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

define('BASE_URL', "http://".$_SERVER['HTTP_HOST'].str_replace(basename($_SERVER['SCRIPT_NAME']),"",$_SERVER['SCRIPT_NAME']));

define('REST_DOCUMENT_URL', BASE_URL.'rest/document');
define('REST_INSTITUTION_URL', BASE_URL.'rest/institution');
define('REST_MEMBER_URL', BASE_URL.'rest/member');
define('REST_MESSAGE_URL', BASE_URL.'rest/messaging');
define('REST_PROVIDER_URL', BASE_URL.'rest/provider');
define('REST_SOCIAL_URL', BASE_URL.'rest/social');
define('REST_USER_URL', BASE_URL.'rest/user');
define('REST_LIBRARY_URL', BASE_URL.'rest/library');

define('REST_PHARMACY_TRANSACTIONS_URL', BASE_URL.'rest/pharmacy/transactions');
define('REST_PHARMACY_BRANCHES_URL', BASE_URL.'rest/pharmacy/branches');
define('REST_PHARMACY_PRODUCTS_URL', BASE_URL.'rest/pharmacy/products');
define('REST_PHARMACY_USERS_URL', BASE_URL.'rest/pharmacy/users');

/*
define('REST_PHYSICIAN_URL', BASE_URL.'rest/physician');
define('REST_SECRETARY_URL', BASE_URL.'rest/secretaries');
define('REST_PATIENTS_URL', BASE_URL.'rest/patients');
*/

define('db_documents', 'dev_documents');
define('db_institution', 'dev_institution');
define('db_library', 'dev_library');
define('db_main', 'dev_main');
define('db_member', 'dev_member');
define('db_messaging', 'dev_messaging');
define('db_provider', 'dev_provider');
define('db_social', 'dev_social');
define('db_pharma', 'dev_pharmacy');

define('ADMIN_USER_TYPE', 99);

define('MESSAGE_INBOX', '10');
define('MESSAGE_DRAFT', '11');
define('MESSAGE_SENT', '20');
define('MESSAGE_TRASH', '90');
define('MESSAGE_DELETED', '99');

define('COLLPENDING', '98');
define('COLLAPPROVE', '1');
define('COLLREMOVE', '0');

define('NOTICE_SEND_MESSAGE', 10);
define('NOTICE_ADD_COLLEAGUE', 20);
define('NOTICE_CONFIRM_COLLEAGUE', 21);
define('NOTICE_ADD_FRIEND', 30);
define('NOTICE_CONFIRM_FRIEND', 31);

define('USER_VERIFY_EMAIL', 0);
define('USER_PATIENT', 1);
define('USER_PHYSICIAN', 2);
define('USER_INSTITUTION', 3);
define('USER_VERIFY_PHYSICIAN', 4);
define('USER_SECRETARY', 5);

define('ATTACH_NONE', 0);
define('ATTACH_PHOTO', 1);
define('ATTACH_VIDEO', 2);
define('ATTACH_LINK', 3);
define('ATTACH_SHARE', 4);
define('ATTACH_ACTIVITY', 5);

define('POST_VISIBLE', 1);
define('POST_DELETED', 2);

define('TXN_PENDING', 99);
define('TXN_CANCEL', 98);
define('TXN_PROCESS', 90);


/*
|--------------------------------------------------------------------------
| File and Directory Modes
|--------------------------------------------------------------------------
|
| These prefs are used when checking and setting modes when working
| with the file system.  The defaults are fine on servers with proper
| security, but you may wish (or even need) to change the values in
| certain environments (Apache running a separate process for each
| user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
| always be used to set the mode correctly.
|
*/
define('FILE_READ_MODE', 0644);
define('FILE_WRITE_MODE', 0666);
define('DIR_READ_MODE', 0755);
define('DIR_WRITE_MODE', 0777);

/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/

define('FOPEN_READ',							'rb');
define('FOPEN_READ_WRITE',						'r+b');
define('FOPEN_WRITE_CREATE_DESTRUCTIVE',		'wb'); // truncates existing file data, use with care
define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE',	'w+b'); // truncates existing file data, use with care
define('FOPEN_WRITE_CREATE',					'ab');
define('FOPEN_READ_WRITE_CREATE',				'a+b');
define('FOPEN_WRITE_CREATE_STRICT',				'xb');
define('FOPEN_READ_WRITE_CREATE_STRICT',		'x+b');


/* End of file constants.php */
/* Location: ./application/config/constants.php */
