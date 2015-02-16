<div class="appointments inner-all">
	<div class="day">
		<h2 class="form_heading">Appointments</h2>
		<?php if(count($appointments)==0){ echo 'You have no appointments yet.'; } ?>
		<ul>
			<?php foreach($appointments as $appointment){ ?>
			<li class="inner-all">
				<a href="<?php echo base_url('dashboard/patient/appointments/'.$appointment->id); ?>" class="btn red pull-right diagnosis-result">See Diagnosis Result</a>
				
				<img src="<?php echo CA_Media::userpic($appointment->profile_profile_pic,'50'); ?>" class="pull-left" />
				<a href="<?php echo base_url('user/'.$appointment->account_username); ?>" class="doctor">
					<?php echo $appointment->profile_first_name; ?> <?php echo $appointment->profile_last_name; ?>
				</a>
				<!-- <span class="test">X-ray</span>-->
				<span class="clinic"><?php echo $appointment->institution_name.', '.$appointment->institution_address; ?></span>
				<span class="arrival">
					<i class="fa fa-clock-o"></i> <?php echo date('M j, Y h:i A', strtotime($appointment->schedule)); ?>
				</span>
				<div class="clearfix"></div>
			</li>
			<?php } ?>
		</ul>
	</div>
</div>