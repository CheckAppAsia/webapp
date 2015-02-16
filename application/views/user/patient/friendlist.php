<div class="tab_content">

	<div class="tab list active">
		<div class="heading-box">
			<h4 class=" inner-all">Friend List</h4>
		</div>
		<div class="friends-list">
			<?php
				//echo "<pre>";print_r($friends);die();
			
				foreach($friends as $friend){
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
			<?php if(count($data)==0){ ?>
			<span class="inner-all empty">0 friends at the moment. :(</span>
			<?php } ?>
			<div class="clearfix"></div>
		</div>
	</div>
	
</div>