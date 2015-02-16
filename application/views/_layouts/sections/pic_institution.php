<div class="user-pic-name">
	<div class="user-pic">
		<div class="profile-avatar">
			<?php
				if($target->profile_pic==""){ $profile_pic = base_url()."assets2/img/system/blank_profile.jpg"; }
				else{ $profile_pic = base_url()."media/userpic/".$target->profile_pic; }
			?>
			<img class="img-responsive" src="<?=$profile_pic?>" />
		</div>
	</div>
	<div class="user-name">
		<div class="inner-all">
			<h5>
				<i class="fa fa-circle text-success pull-right"></i>
				<?php echo $target->institution->name; ?>
				<div class="clearfix"></div>
			</h5>
		</div>
	</div>
</div>