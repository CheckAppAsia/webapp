<div class="friends-list">
	<?php
		foreach($friends as $friend){
	?>
	<div class="friend">
		<div class="friend_box" target_id="<?php echo $friend->account_id; ?>">
			<div class="unfriend pull-right"><i class="fa fa-times"></i></div>
			<a href="<?php echo base_url(); ?>user/<?php echo $friend->account_username;?>">
				<img src="<?php echo CA_Media::userpic($friend->profile_profile_pic,'50'); ?>" style="width:50px;height:50px;"/>
				<span class="fullname"><?=$friend->profile_first_name.' '.$friend->profile_last_name?></span>
			</a>
			<br/>
			<span class="address" style="color:#999;font-size:12px;"><?=$friend->profile_address?></span>
			<div class="clearfix"></div>
		</div>
	</div>
	<?php } ?>
	<?php if(count($friends)==0){ ?>
	<span class="inner-all empty">0 friends at the moment. :(</span>
	<?php } ?>
	<div class="clearfix"></div>
</div>