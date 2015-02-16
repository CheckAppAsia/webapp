<?php
header('Cache-Control: no-cache, must-revalidate');
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Content-type: application/json');

if(isset($response)) {

	echo json_encode($response);
}
else
{
	echo json_encode(array('status' => 'false', 'message'=>'Error'));
}

?>