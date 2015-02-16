<div class="appointments inner-all">
	<div class="day">
		<h2 class="form_heading">Pending Bookings</h2>
		<?php if(count($bookings)==0){ echo 'You have no pending appointment bookings.'; } ?>
		<ul>
			<?php foreach($bookings as $booking){ ?>
			<li class="inner-all">
				<!-- <a class="btn white pull-right diagnosis-result">Cancel</a> -->
				<img src="<?php echo CA_Media::userpic($booking->profile_profile_pic,'50'); ?>" class="pull-left" />
				<a href="<?php echo base_url('user/'.$booking->account_username); ?>" class="doctor">
					<?php echo $booking->profile_first_name; ?> <?php echo $booking->profile_last_name; ?>
				</a>
				<span class="test">Awaiting approval from the Physician</span>
				<!-- <span class="clinic" style="font-size:10px;"><?php echo $booking->profile_first_name; ?> <?php echo $booking->profile_last_name; ?></span> -->
				<span class="arrival">
					<i class="fa fa-clock-o"></i> <?php echo date('M j, Y h:i A', strtotime($booking->schedule)); ?>
				</span>
				<div class="clearfix"></div>
			</li>
			<?php } ?>
		</ul>
	</div>
</div>