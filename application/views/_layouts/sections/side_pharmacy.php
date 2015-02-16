<?php $cut_ruri = explode("/",$ruri); ?>
&nbsp;
<ul class="sidebar_left">
	<li class="<?php echo ($cut_ruri[1]=="overview")?"active":"" ?>"><a href="<?php echo base_url('dashboard/pharmacy/overview'); ?>">
		<i class="sb_ico dashboard"></i> Dashboard
	</a></li>
	
	<li class="navSeparator"></li>
	<li class="<?php echo ($cut_ruri[1]=="orders")?"active":"" ?>"><a href="<?php echo base_url('dashboard/pharmacy/orders'); ?>">
		<i class="fa fa-shopping-cart"></i> Orders
	</a></li>
	<li class="<?php echo ($cut_ruri[1]=="reports")?"active":"" ?>"><a href="<?php echo base_url('dashboard/pharmacy/reports'); ?>">
		<i class="fa fa-search"></i> Reports
	</a></li>
	<li class="<?php echo ($cut_ruri[1]=="inventory")?"active":"" ?>"><a href="<?php echo base_url('dashboard/pharmacy/inventory'); ?>">
		<i class="fa fa-book"></i> Inventory
	</a></li>
	<li class="navSeparator"></li>
	<li class="<?php echo ($cut_ruri[1]=="customers")?"active":"" ?>"><a href="<?php echo base_url('dashboard/pharmacy/customers'); ?>">
		<i class="fa fa-users"></i> Customers
	</a></li>
	<li class="<?php echo ($cut_ruri[1]=="doctors")?"active":"" ?>"><a href="<?php echo base_url('dashboard/pharmacy/doctors'); ?>">
		<i class="fa fa-user-md"></i>Doctors
	</a></li>
	<li class="<?php echo ($cut_ruri[1]=="branches")?"active":"" ?>"><a href="<?php echo base_url('dashboard/pharmacy/branches'); ?>">
		<i class="fa fa-user-md"></i>Branches
	</a></li>
	<li class="navSeparator"></li>	
	
	
	<li class="navSeparator"></li>
	
	<li class="<?php echo ($cut_ruri[1]=="profile")?"active":"" ?>"><a href="#">
		<i class="fa fa-user"></i> Edit Profile
	</a></li>
	
	<li class="<?php echo ($cut_ruri[1]=="newsfeed")?"active":"" ?>"><a href="<?php echo base_url('social/newsfeed'); ?>">
		<i class="fa fa-bullhorn"></i> Newsfeed
	</a></li>

	<li class="<?php echo ($cut_ruri[1]=="timeline")?"active":"" ?>"><a href="<?php echo base_url('dashboard/pharmacy/timeline'); ?>">
		<i class="fa fa-list"></i> Social Timeline
	</a></li>
	

	
	<li class="<?php echo ($cut_ruri[1]=="subscribers")?"active":"" ?>"><a href="<?php echo base_url('dashboard/pharmacy/subscribers'); ?>">
		<i class="fa fa-group"></i> Subscribers
	</a></li>
	
	<!-- <li class="<?php echo ($cut_ruri[1]=="groups")?"active":"" ?>"><a href="<?php echo base_url('dashboard/groups'); ?>">
		<i class="fa fa-group"></i> Groups
	</a></li> -->

	<li class="navSeparator"></li>
	
	<li class="<?php echo ($cut_ruri[1]=="messages")?"active":"" ?>"><a href="<?php echo base_url('dashboard/messages'); ?>">
		<i class="fa fa-envelope"></i> Messages
	</a></li>
	
	<li class="<?php echo ($cut_ruri[1]=="notifications")?"active":"" ?>"><a href="<?php echo base_url('dashboard/notifications'); ?>">
		<i class="fa fa-bell"></i> Notifications
	</a></li>
	
	<li class="<?php echo ($cut_ruri[1]=="settings")?"active":"" ?>"><a href="<?php echo base_url('dashboard/settings'); ?>">
		<i class="fa fa-gear"></i> Settings
	</a></li>
</ul>
