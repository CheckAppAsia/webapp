<div class="simple_tabs">
	<ul>
		<li data-target="list" class="active">
			<i class="fa fa-group"></i>Colleague List (<?=count((array)$friends)?>)
		</li>
		<li data-target="mutual" >
			<i class="fa fa-male"></i><i class="fa fa-female"></i>Mutual Colleagues (<?=count((array)$mutual_friends)?>)
		</li>
	</ul>
</div>

<div class="tab_content">
	<div class="tab list active">
		<div class="friends-list">
			<?php
				foreach($friends as $friend){
					//if($friend->id != $user_id){
					if($friend->profile_pic==""){ $profile_pic = "https://checkapp-sg.s3.amazonaws.com/userpic/50/default.jpg"; }
					else{ $profile_pic = CA_Media::userpic($friend->profile_pic,'50'); }
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
			<span class="inner-all empty">0 colleagues at the moment. :(</span>
			<?php } ?>
			<div class="clearfix"></div>
		</div>
	</div>
	<div class="tab mutual" style="display:none">
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
			<span class="inner-all empty">0 mutual colleagues at the moment. :(</span>
			<?php } ?>
			<div class="clearfix"></div>
		</div>
	</div>
</div> 