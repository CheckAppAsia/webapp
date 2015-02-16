<?php $cut_ruri = explode("/",$ruri); ?>
&nbsp;
<ul class="sidebar_left">
	<li class="<?php echo ($cut_ruri[1]=="overview")?"active":"" ?>"><a href="<?php echo base_url('dashboard/patient/overview'); ?>">
		<i class="sb_ico dashboard"></i> Dashboard
	</a></li>
	
	<li class="<?php echo ($cut_ruri[1]=="profile")?"active":"" ?>"><a href="<?php echo base_url('dashboard/patient/profile'); ?>">
		<i class="sb_ico profile"></i> Profile &amp; Settings
	</a></li>
	<!-- 
	<li class="<?php echo ($cut_ruri[1]=="health")?"active":"" ?>"><a href="<?php echo base_url('dashboard/patient/health'); ?>">
		<i class="sb_ico health"></i> My Health
	</a></li> -->
	
	<li><hr></li>
	
	<li class="<?php echo ($cut_ruri[1]=="doctors")?"active":"" ?>"><a href="<?php echo base_url('dashboard/patient/doctors'); ?>">
		<i class="sb_ico doctor"></i> My Doctors
	</a></li>
	<!-- 
	<li class="<?php echo ($cut_ruri[1]=="medicalrecords")?"active":"" ?>"><a href="<?php echo base_url('dashboard/patient/medicalrecords'); ?>">
		<i class="sb_ico record"></i> Medical Records
	</a></li> -->
	
	<li class="<?php echo ($cut_ruri[1]=="appointments")?"active":"" ?>"><a href="<?php echo base_url('dashboard/patient/appointments/incoming'); ?>">
		<i class="sb_ico appointment"></i> Appointments
	</a></li>
	<!-- 
	<li class="<?php echo ($cut_ruri[1]=="insurance")?"active":"" ?>"><a href="<?php echo base_url('dashboard/patient/insurance'); ?>">
		<i class="sb_ico insurance"></i> Health Insurance
	</a></li> -->
	
	<li><hr></li>
	
	<!-- 
	<li class="<?php echo ($cut_ruri[1]=="timeline")?"active":"" ?>"><a href="<?php echo base_url('dashboard/patient/timeline'); ?>">
		<i class="sb_ico timeline"></i> Social Timeline
	</a></li> -->
	
	<li class="<?php echo ($cut_ruri[1]=="friends" || $cut_ruri[1]=="user")?"active":"" ?>"><a href="<?php echo base_url('dashboard/patient/friends'); ?>">
		<i class="sb_ico friends"></i> Friends
	</a></li>
	<!-- 
	<li class="<?php echo ($cut_ruri[1]=="groups")?"active":"" ?>"><a href="<?php echo base_url('dashboard/patient/groups'); ?>">
		<i class="sb_ico group"></i> Groups
	</a></li> -->
	
	<li class="<?php echo ($cut_ruri[1]=="messages")?"active":"" ?>"><a href="<?php echo base_url('dashboard/messages'); ?>">
		<i class="sb_ico message"></i> Messages
	</a></li>
	
	<li class="<?php echo ($cut_ruri[1]=="chat")?"active":"" ?>"><a href="" style="color:#999;">
		<i class="sb_ico chat"></i> Chat
	</a></li>
	
	<!--	
	<li><hr></li>
	
	<li><a href="<?php echo base_url(); ?>" style="color:#999;">
		<i class="sb_ico medicine"></i> Buy Medicines
	</a></li>
	
	<li><a href="<?php echo base_url(); ?>" style="color:#999;">
		<i class="sb_ico reference"></i> Drugs References
	</a></li>
	
	<li><a href="<?php echo base_url(); ?>" style="color:#999;">
		<i class="sb_ico directory"></i> Medical Directory
	</a></li>

	<li class="<?php echo ($cut_ruri[1]=="medications")?"active":"" ?>"><a href="<?php echo base_url('dashboard/patient/medications'); ?>">
		<i class="fa fa-plus-square"></i> Medications
	</a></li>
	
	<li class="navSeparator"></li>
	
	<li class="<?php echo ($cut_ruri[1]=="profile")?"active":"" ?>"><a href="<?php echo base_url('dashboard/patient/profile'); ?>">
		<i class="fa fa-user"></i> Edit Profile
	</a></li>
	
	<li class="<?php echo ($cut_ruri[1]=="social")?"active":"" ?>"><a href="<?php echo base_url('social/newsfeed'); ?>">
		<i class="fa fa-th-list"></i> Newsfeed
	</a></li>
	
	<li class="<?php echo ($cut_ruri[1]=="subscribe")?"active":"" ?>"><a href="<?php echo base_url('dashboard/patient/subscribe'); ?>">
		<i class="fa fa-user-md"></i> Subscribes
	</a></li>
	
	<li class="navSeparator"></li>
	
	<li class="<?php echo ($cut_ruri[1]=="notifications")?"active":"" ?>"><a href="<?php echo base_url('dashboard/notifications'); ?>">
		<i class="fa fa-bell"></i> Notifications
	</a></li>
	
	<li class="<?php echo ($cut_ruri[1]=="settings")?"active":"" ?>"><a href="<?php echo base_url('dashboard/settings'); ?>">
		<i class="fa fa-gear"></i> Settings
	</a></li>
	
	
	<li class="navSeparator"></li>
	-->
	
	
</ul>
<?php //print_r($cut_ruri); ?>
