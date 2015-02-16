<div class="appoint-tabs">
	<ul>
		<a href="<?php echo base_url('dashboard/physician/appointments/day'); ?>">
		<li data-target="daily" <?php if($appointment_nav_active=='day'){ echo 'class="active"'; } ?>>
			<i class="fa fa-sun-o"></i>Day
		</li></a>
		
		<a href="<?php echo base_url('dashboard/physician/appointments/calendar'); ?>">
		<li data-target="monthly" <?php if($appointment_nav_active=='month'){ echo 'class="active"'; } ?>>
			<i class="fa fa-calendar"></i>Calendar
		</li></a>
		
		<a href="<?php echo base_url('dashboard/physician/appointments'); ?>">
		<li data-target="previous" <?php if($appointment_nav_active=='list'){ echo 'class="active"'; } ?>>
			<i class="fa fa-list-ul"></i>List
		</li></a>
		
		<a href="<?php echo base_url('dashboard/physician/appointments/pending'); ?>">
		<li data-target="pending" <?php if($appointment_nav_active=='pending'){ echo 'class="active"'; } ?>>
			<i class="fa fa-exclamation-circle"></i>Pending
		</li></a>
		
		<a href="<?php echo base_url('dashboard/physician/appointments/availability'); ?>">
		<li data-target="pending" <?php if($appointment_nav_active=='availability'){ echo 'class="active"'; } ?>>
			<i class="fa fa-check-square-o"></i>Availability
		</li></a>
		
		<a href="<?php echo base_url('dashboard/physician/appointments/create'); ?>">
		<li data-target="pending" <?php if($appointment_nav_active=='create'){ echo 'class="active"'; } ?>>
			<i class="fa fa-thumb-tack"></i>Create
		</li></a>
	</ul>
</div>