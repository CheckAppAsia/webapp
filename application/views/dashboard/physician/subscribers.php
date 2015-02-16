<div class="tab list active">
	<div class="heading-box">
		<h4 class=" inner-all">Subscribers List</h4>
	</div>
	<div class="pending_list">
		<?php foreach($subscribers as $subscribe){ ?>
			<div class="request" target_id="<?php echo $subscribe->id; ?>">
				<button class="remove btn red pull-right">
					<i class="fa fa-times-circle"></i>
					<span> Remove</span>
				</button>
				
				<img src="<?php echo CA_Media::userpic($subscribe->profile_pic,'100'); ?>" class="avatar pull-left" />
				<a href="<?php echo base_url(); ?>user/<?php echo $subscribe->username;?>" class="fullname"><?=$subscribe->first_name.' '.$subscribe->last_name?></a>
				<span class="address"><?=$subscribe->address1?></span>
				<div class="clearfix"></div>
			</div>
		<?php } ?>
	</div>
</div>