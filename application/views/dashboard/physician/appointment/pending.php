<div class="appoint-tabs-content">
	
	<div class="appoint-pending active">
		<div class="heading-box">
			<h4 class=" inner-all">Pending Bookings</h4>
		</div>
		<div class="pending-list">
			<?php if(count($bookings)===0){ echo '<span class="empty">You have no pending bookings.</span>'; } ?>
			<ul>
			<?php if(count($bookings)){foreach($bookings as $booking){ ?>
				<li>
					<?php echo form_open('dashboard/physician/appointments/setApprovalStatus'); ?>
						<input type="hidden" name="appointment_id" value="<?php echo $booking->id; ?>" />
						<button name="status" value="5" class="decline btn white pull-right">Decline</button>
						<button name="status" value="1" class="accept btn blue pull-right">Accept</button>
					<?php echo form_close(); ?>
					
					<img src="<?php echo CA_Media::userpic($booking->profile_profile_pic,'150'); ?>" class="avatar">
					<div class="patient-info">
						<a href="" class="patient-name"><?php echo $booking->profile_first_name; ?> <?php echo $booking->profile_last_name; ?></a>
						<span class="date"><?php echo date("M j, Y - h:i A", strtotime($booking->schedule)); ?></span>
						<span class="clinic">&nbsp;</span>
					</div>
				</li>
			<?php }} ?>
			</ul>
		</div>
	</div>
</div>