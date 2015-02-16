<?php $cut_ruri = explode("/",$ruri); ?>
&nbsp;
<ul class="sidebar_left">
	<li class="<?php echo ($cut_ruri[1]=="overview")?"active":"" ?>"><a href="<?php echo base_url('dashboard/physician/overview'); ?>">
		<i class="sb_ico dashboard"></i> Dashboard
	</a></li>
	
	<li class="navSeparator"></li>
	
	<li class="<?php echo ($cut_ruri[1]=="patients")?"active":"" ?>"><a href="<?php echo base_url('dashboard/physician/patients'); ?>">
		<i class="sb_ico group"></i> My Patients
	</a></li>
	
	<li class="<?php echo ($cut_ruri[1]=="appointments")?"active":"" ?>"><a href="<?php echo base_url('dashboard/physician/appointments/day'); ?>">
		<i class="fa fa-check-square-o"></i> Appointments
	</a></li>
	
	<!-- <li class="<?php echo ($cut_ruri[1]=="questionnaire")?"active":"" ?>"><a href="<?php echo base_url('dashboard/physician/questionnaire'); ?>">
		<i class="fa fa-file-text-o"></i> Questionnaire
	</a></li> -->
	
	<!-- <li><a href="#">
		<i class="fa fa-plus-square"></i> Clinics (n/a)
	</a></li> -->
	
	<!-- <li><a href="#">
		<i class="fa fa-building-o"></i> Institutions (n/a)
	</a></li> -->
	
	<li class="navSeparator"></li>
	
	<li class="<?php echo ($cut_ruri[1]=="profile")?"active":"" ?>"><a href="<?php echo base_url('dashboard/physician/profile'); ?>">
		<i class="sb_ico user"></i> Edit Profile
	</a></li>
	
	<li class="<?php echo ($cut_ruri[1]=="newsfeed")?"active":"" ?>"><a href="<?php echo base_url('social/newsfeed'); ?>">
		<i class="fa fa-th-list"></i> Newsfeed
	</a></li>

	<li class="<?php echo ($cut_ruri[1]=="timeline")?"active":"" ?>"><a href="<?php echo base_url('dashboard/physician/timeline'); ?>">
		<i class="sb_ico timeline"></i> Social Timeline
	</a></li>
	
	<li class="<?php echo ($cut_ruri[1]=="colleagues")?"active":"" ?>"><a href="<?php echo base_url('dashboard/physician/colleagues'); ?>">
		<i class="sb_ico doctor"></i> Colleagues
	</a></li>
	
	<li class="<?php echo ($cut_ruri[1]=="subscribers")?"active":"" ?>"><a href="<?php echo base_url('dashboard/physician/subscribers'); ?>">
		<i class="fa fa-group"></i> Subscribers
	</a></li>
	
	<!-- <li class="<?php echo ($cut_ruri[1]=="groups")?"active":"" ?>"><a href="<?php echo base_url('dashboard/groups'); ?>">
		<i class="fa fa-group"></i> Groups
	</a></li> -->

	<li class="navSeparator"></li>
	
	<li class="<?php echo ($cut_ruri[1]=="messages")?"active":"" ?>"><a href="<?php echo base_url('dashboard/messages'); ?>">
		<i class="sb_ico message"></i> Messages
	</a></li>
	
	<li class="<?php echo ($cut_ruri[1]=="notifications")?"active":"" ?>"><a href="<?php echo base_url('dashboard/notifications'); ?>">
		<i class="fa fa-bell"></i> Notifications
	</a></li>
	
	<li class="<?php echo ($cut_ruri[1]=="settings")?"active":"" ?>"><a href="<?php echo base_url('dashboard/settings'); ?>">
		<i class="fa fa-gear"></i> Settings
	</a></li>
</ul>
