<div class="simple_tabs">
	<span class="active tab-open" data-tab-id="friends_list"><i class="fa fa-group"></i> Friend List (<?=count((array)$friends)?>)</span>
	<?php if($currentUser['id']!=$target->user_id) { ?>
	<span class="tab-open" data-tab-id="mutual"><i class="fa fa-male"></i><i class="fa fa-female"></i> Mutual Friends (<?=count((array)$mutual_friends)?>)</span>
	<?php } ?>
</div>

<div class="tab_content">
	<div class="tab list active" id="friends_list">
		<div class="friends-list">
			<?php
				foreach($friends as $friend){
					$profile_pic = ($friend->profile_pic=="") ? "https://checkapp-sg.s3.amazonaws.com/userpic/50/default.jpg" : CA_Media::userpic($friend->profile_pic,'50');
			?>
			<div class="friend">
				<div class="friend_box">
					<a href="<?php echo base_url(); ?>user/<?php echo $friend->username;?>">
						<img src="<?php echo $profile_pic; ?>" class="avatar pull-left"/>
						<span class="fullname"><?=$friend->first_name.' '.$friend->last_name?></span>
					</a>
					<span class="address" ><?=$friend->address1?></span>
					<div class="clearfix"></div>
				</div>
			</div>
			<?php } ?>
			<?php if(count($friends)==0){ ?>
			<span class="inner-all empty">0 friends at the moment. :(</span>
			<?php } ?>
			<div class="clearfix"></div>
		</div>
	</div>
	<div class="tab mutual" style="display:none" id="mutual">
		<!--<div class="heading-box">
			<h4 class=" inner-all">Pending Friend Request</h4>
		</div>-->
		<div class="friends-list">
			<?php
				foreach($mutual_friends as $mutual){
					if($mutual->profile_pic==""){ $profile_pic = "https://checkapp-sg.s3.amazonaws.com/userpic/50/default.jpg"; }
					else{ $profile_pic = CA_Media::userpic($mutual->profile_pic,'50'); }
			?>
			<div class="friend">
				<div class="friend_box">
					<a href="<?php echo base_url(); ?>user/<?php echo $mutual->username;?>">
						<img src="<?php echo $profile_pic; ?>" class="avatar pull-left"/>
						<span class="fullname"><?=$mutual->first_name.' '.$mutual->last_name?></span>
					</a>
					<span class="address" ><?=$mutual->address1?></span>
					<div class="clearfix"></div>
				</div>
			</div>
			<?php } ?>
			<?php if(count($mutual_friends)==0){ ?>
			<span class="inner-all empty">0 mutual friends at the moment. :(</span>
			<?php } ?>
			<div class="clearfix"></div>
		</div>
	</div>
</div> 