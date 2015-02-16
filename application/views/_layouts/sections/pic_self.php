<div class="user-pic-name">
	<div class="user-pic">
		<div class="profile-avatar">
			<img class="img-responsive" src="<?php echo CA_Media::userpic($currentUser['profile_pic'],'150'); ?>" />
			
			<?php echo form_open_multipart('dashboard/profile/changePhoto'); ?>
				<input type="file" class="avatar_upload" name="profile_photo" />
			<?php echo form_close(); ?>
			<div class="avatar_upload_box">
				<i class="fa fa-pencil"></i>
			</div>
			
		</div>
	</div>
	
	<div class="user-name">
		<div class="inner-all">
			<h5 style="text-align:center">
				<!--<i class="fa fa-circle text-success pull-right"></i>-->
				<?php if($currentUser['type']==3){ ?>
					<?php echo $currentUser['institution']->name; ?>
				<?php }else{ ?>
					<?php echo $currentUser['title']; ?>
					<?php echo $currentUser['first_name']; ?>
					<?php echo $currentUser['last_name']; ?>
					<div class="more_desc">
					<?php
						$from = new DateTime(date("Y-m-d", strtotime($currentUser['birthdate'])));
						$to   = new DateTime('today');
						?>
						<span class="pull-left"><?php echo $from->diff($to)->y ?> yrs old</span>
						<span class="pull-right"><?php echo ($currentUser['gender']==1)?"Male":"Female"; ?></span>
						<div class="clearfix"></div>
						<span class="pull-left"><?php echo $currentUser['location']->city; ?></span>
						<span class="pull-right"><?php echo $currentUser['location']->country; ?></span>
					</div>
				<?php } ?>
				<div class="clearfix"></div>
			</h5>
		</div>
	</div>
	
</div>
