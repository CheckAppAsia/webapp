<ul class="list-group">
	<li class="active"><a href="<?php echo base_url('dashboard/institution/overview'); ?>">
		<i class="fa fa-dashboard"></i> Dashboard
	</a></li>
	
	<li><a href="<?php echo base_url(); ?>">
		<i class="fa fa-rss"></i> News Feed
	</a></li>
	
	<li><a href="<?php echo base_url('institution/'.$currentUser['id']); ?>">
		<i class="fa fa-th-list"></i> Timeline
	</a></li>
	
	<li class="navSeparator"><hr></li>
	
	<li><a href="<?php echo base_url('dashboard/institution/profile'); ?>">
		<i class="fa fa-building-o"></i> Profile
	</a></li>
	
	<li><a href="<?php echo base_url('dashboard/institution/physicians'); ?>">
		<i class="fa fa-user-md"></i> Physicians
	</a></li>
	
	<li><a href="<?php echo base_url('dashboard/institution/services'); ?>">
		<i class="fa fa-ambulance"></i> Services
	</a></li>
	
	<li><a href="<?php echo base_url('dashboard/institution/bookings'); ?>">
		<i class="fa fa-check-square-o"></i> <del>Bookings</del>
	</a></li>
	
	<li><a href="<?php echo base_url('dashboard/institution/admins'); ?>">
		<i class="fa fa-key"></i> <del>Admins</del>
	</a></li>
	
	<li class="navSeparator"><hr></li>
	
	<li><a href="<?php echo base_url('dashboard/messages'); ?>">
		<i class="fa fa-bell"></i> Notifications
	</a></li>
	
	<li><a href="<?php echo base_url('dashboard/patient/records'); ?>">
		<i class="fa fa-gear"></i> <del>Settings</del>
	</a></li>
</ul>
<?php echo $ruri; ?>