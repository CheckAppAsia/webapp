<!--
<div class="heading-box">
	<h4 class=" inner-all">My Doctors</h4>
</div>
-->
<div class="doctor_list">
	<div class="inner-all">
		<h2 class="form_heading">My Doctors</h2>
		<div class="doctor">
		
			<?php foreach($physicians as $physician){ ?>
			<div class="doctor_box">
				<a href="<?php echo base_url('user/'.$physician->username); ?>">
					<img src="<?php echo CA_Media::userpic($physician->profile_pic,'50'); ?>" />
					<span class="fullname"><?php echo $physician->title; ?> <?php echo $physician->first_name; ?> <?php echo $physician->last_name; ?></span>
					<span class="clinic">
						<?php echo $physician->email; ?> / Activity: <?php echo date("M j, Y h:i A", strtotime($physician->activity)); ?>
					</span>
				</a>
				<div class="clearfix"></div>
			</div>
			<?php } ?>
			
		</div>
		<div class="clearfix"></div>
	</div>
</div>
