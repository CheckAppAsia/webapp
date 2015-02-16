<div class="appointments inner-all">
	<div class="day">
		<h2 class="form_heading">Incoming</h2>
		<?php if(count($appointments)==0){ echo 'You have no incoming appointments yet.'; } ?>
		<ul>
			<?php foreach($appointments as $appointment){ ?>
			<li class="inner-all">
				<a href="<?php echo base_url('dashboard/patient/appointments/'.$appointment->id); ?>" class="btn red pull-right diagnosis-result">Cancel</a>
				
				<img src="<?php echo CA_Media::userpic($appointment->profile_profile_pic,'50'); ?>" class="pull-left" />
				<a href="<?php echo base_url('user/'.$appointment->account_username); ?>" class="doctor">
					<?php echo $appointment->profile_first_name; ?> <?php echo $appointment->profile_last_name; ?>
				</a>
				<!-- <span class="test">X-ray</span>-->
				<span class="clinic"><?php echo $appointment->institution_name.', '.$appointment->institution_address; ?></span>
				<span class="arrival">
					<i class="fa fa-clock-o"></i> <?php echo date('M j, Y h:i A', strtotime($appointment->schedule)); ?>
				</span>
				<br />
				<span class="arrival">
					Note: <?php echo $appointment->remarks; ?>
				</span>
				<div class="clearfix"></div>
			</li>
			<?php } ?>
		</ul>
	</div>
</div>