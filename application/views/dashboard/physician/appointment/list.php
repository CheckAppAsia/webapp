<div class="simple_tabs">
	<span class="tab-open" data-tab-id="apnt_previous">Previous</span>
	<span class="active tab-open" data-tab-id="apnt_today">Today</span>
	<span class="tab-open" data-tab-id="apnt_upcoming">Upcoming</span>
</div>

<?php

	/* derfault params */
	$startOfDate = strtotime(date('Y-m-d 00:00:00'));
	$endOfToday = strtotime(date('Y-m-d 23:59:59'));
	
	$previousAppointments = array();
	$todaysAppointments = array();
	$upcommingAppointments = array();
	
	foreach($appointments as $appointment){
		$schedule = strtotime($appointment->schedule);
	
		if($schedule<$startOfDate){
			array_push($previousAppointments,$appointment);
		}else if($schedule>$startOfDate && $schedule<$endOfToday){
			array_push($todaysAppointments,$appointment);
		}else if($schedule>$endOfToday){
			array_push($upcommingAppointments,$appointment);
		}
	}

?>

<div class="apnt_tabs" id="apnt_previous" style="display:none">
	<div class="inner-all">
	
		<?php
			if(count($previous_appointments)>0){
		?>
	
		<div class="record_ppage pull-left">
			<select>
				<option>10</option>
				<option>20</option>
				<option>50</option>
			</select>
			<span>records per page</span>
		</div>
		
		<div class="search_filter pull-right">
			<span>Filter:</span>
			<input type="text" />
		</div>
		
		<table class="simple_table">
			<thead>
				<tr>
					<td><span>Date</span></td>
					<td><span>Patient</span></td>
					<td><span>Diagnosis</span></td>
					<td></td>
				</tr>
			</thead>
			<tbody>
				<?php
					$i=1;
					foreach($previous_appointments as $appointment){
				?>
				<tr class="<?php echo ($i%2==1)?"odd":"even" ?>">
					<td><span><?php echo date('M d, Y h:ia', strtotime($appointment->schedule)) ?></span></td>
					<td>
						<span>
							<!--<img src="<?php echo CA_Media::userpic($appointment->profile_profile_pic,'50'); ?>" />-->
							<?php echo $appointment->profile_first_name." ".$appointment->profile_last_name?>
						</span>
					</td>
					<td><span>some diagnosis results blah blah blah...</span></td>
					<td><a href="<?php echo base_url('dashboard/physician/appointments/'.$appointment->id); ?>"><span>View Diagnosis</span></a></td>
				</tr>
				<?php $i++; } ?>
			</tbody>
		</table>
		
		<div class="showing pull-left">
			<span> Showing 1 to 10 of 3 entries </span>
		</div>
		
		<div class="simple_pagination pull-right">
			<span class="prev">previous</span>
			<span class="active">1</span>
			<span>2</span>
			<span>3</span>
			<span class="next">next</span>
		</div>
		<?php
			}else{
		?>
		
		<span class="empty">No Previous Appointments</span>
		
		<?php } ?>
		
		<div class="clearfix"></div>
	</div>
</div>

<div class="apnt_tabs active" id="apnt_today" >
	<div class="inner-all">
	
		<?php
			if(count($today_appointments) > 0){
		?>
		<table class="simple_table">
			<thead>
				<tr>
					<td><span>Name</span></td>
					<td><span>Station</span></td>
					<td><span>Status</span></td>
					<td><span>Action</span></td>
				</tr>
			</thead>
			<tbody>
				<?php
					foreach($today_appointments as $appointment){
				?>
				<tr>
					<td><span><?php echo $appointment->profile_first_name." ".$appointment->profile_last_name?></span></td>
					<td style="text-align:center;">
						<form action="<?php echo base_url('dashboard/physician/appointments/transferappointment'); ?>" method="POST">
							<input type="hidden" name="appointment_id" value="<?php echo $appointment->id; ?>"/>
							<select name="provider_id">
							<?php
								foreach($staffs as $staff){
									echo '<option value="'.$staff->provider_id.'" '.(($current_user_id==$staff->provider_id)?'SELECTED="SELECTED"':'').'>'.$staff->profile_title.'. '.$staff->profile_first_name.' '.$staff->profile_last_name.' - '.$staff->role.'</option>';
								}
							?>
							</select>
							<button class="accept btn blue">Transfer</button>
						</form>
					</td>
					<td style="text-align:center;">
						<!--<select class="form_select">
							<option>Cancel</option>
							<option>Nurse's Queue</option>
							<option>Doctor's Queue</option>
							<option>For Encoding</option>
							<option>Diagnostic Queue</option>
							<option>Done</option>
						</select>-->
						<form action="<?php echo base_url('dashboard/physician/appointments/appointmentchangestatus'); ?>" method="POST">
							<input type="hidden" name="appointment_id" value="<?php echo $appointment->id; ?>"/>
							<select name="status">
								<option value="1" <?=(($appointment->status==1)?'SELECTED="SELECTED"':'')?>>Waiting</option>
								<option value="2" <?=(($appointment->status==2)?'SELECTED="SELECTED"':'')?>>In-progress</option>
								<option value="3">Done</option>
								<option value="4">Cancel</option>
							</select>
							<button class="accept btn blue">Update</button>
						</form>
					</td>
					<td>
						<a class="lightbox-mode" data-target="diagnose" data-appt_id="<?php echo $appointment->id?>"><span>Diagnose</span></a>
					</td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
		
		<?php
			}else{
		?>
		
		<span class="empty">No Appointment for today</span>
		
		<?php } ?>
	
	</div>
</div>

<div class="apnt_tabs active" id="apnt_upcoming" style="display:none">
	<div class="inner-all">
	
		<?php
			if(count($upcoming_appointments)>0){
		?>
	
		<div class="record_ppage pull-left">
			<select>
				<option>10</option>
				<option>20</option>
				<option>50</option>
			</select>
			<span>records per page</span>
		</div>
		
		<div class="search_filter pull-right">
			<span>Filter:</span>
			<input type="text" />
		</div>
		
		<table class="simple_table">
			<thead>
				<tr>
					<td><span>Date</span></td>
					<td><span>Patient</span></td>
				</tr>
			</thead>
			<tbody>
				<?php
					$i = 0;
					foreach($upcoming_appointments as $appointment){
					$class = ($i++%2==0)?"odd":"even";
				?>
				<tr class="<?php echo $class?>">
					<td><span><?php echo date('M d, Y h:ia', strtotime($appointment->schedule)) ?></span></td>
					<td><span><?php echo $appointment->profile_first_name." ".$appointment->profile_last_name?></span></td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
		
		<div class="showing pull-left">
			<span> Showing 1 to 10 of 3 entries </span>
		</div>
		
		<div class="simple_pagination pull-right">
			<span class="prev">previous</span>
			<span class="active">1</span>
			<span>2</span>
			<span>3</span>
			<span class="next">next</span>
		</div>
		
		<?php
			}else{
		?>
		
		<span class="empty">No Upcoming Appointments</span>
		
		<?php } ?>
		
		<div class="clearfix"></div>
	</div>
</div>

<!-- BOOKING LIGHTBOX -->
<div class="lightbox diagnose" style="display:none">
	<div class="heading">
		<span class="close">x</span>
		<h2 class="margin-none">Diagnose</h2>
	</div>
	<div class="diagnose_select inner-all">
		<a href="" class="simple">Simple Diagnose</a>
		<a href="" class="emr">EMR</a>
	<div>
	
</div>