<?php
$home = '';
$physician = '';
$patient = '';
$medicine = '';
$settings = '';
switch($active) {
	case 'home':
		$home = 'class="active"';
	break;
	case 'physician':
		$physician = 'class="active"';
	break;
	case 'patient':
		$patient = 'class="active"';
	break;
	case 'medicine':
		$medicine = 'class="active"';
	break;
	case 'settings':
		$settings = 'class="active"';
	break;
	case 'users':
		$users = 'class="active"';
	break;
}
?>
	<div class="col-sm-2">
		<ul class="sidebar">
			<li <?php echo $home;?>><a href="/admin/dashboard">Home</a></li>
			<li <?php echo $physician;?>><a href="/admin/dashboard/physicians">Physicians</a></li>
			<li <?php echo $patient;?>><a href="/admin/dashboard/patients">Patients</a></li>
			<li <?php echo $users;?>><a href="/admin/users">Admin Users</a></li>
			<!-- <li <?php echo $medicine;?>><a href="/admin/dashboard/medicine">Medicine</a></li>
			<li <?php echo $settings;?>><a href="/admin/dashboard/settings">Settings</a></li> -->
			<li><a href="/admin/logout">Logout</a></li>
		</ul>
	</div>