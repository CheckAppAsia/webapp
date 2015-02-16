<div class="simple_tabs">
	<span class="active tab-open" data-tab-id="friend_requests">Colleague Request (<?php echo $friend_count['requests']; ?>)</span>
	<span class="tab-open" data-tab-id="friend_invites">Sent Request (<?php echo $friend_count['invites']; ?>)</span>
</div>

<div class="tab_content">
	
	<div class="tab requests active" id="friend_requests">
		<div class="pending_list">
			<h2 class="form_heading">Pending Colleague Request</h2>
			<?php foreach($requests as $request){ ?>
				<div class="request" target_id="<?php echo $request->account_id; ?>">
					<form method="post" action="<?php echo base_url('dashboard/physician/colleagues/rejectFriend'); ?>">
						<input type="hidden" name="target_id" value="<?php echo $request->account_id; ?>"/>
						<button class="reject btn red pull-right">
							<i class="fa fa-thumbs-o-down"></i>
							<span> Reject Request</span>
						</button>
					</form>
					
					<form method="post" action="<?php echo base_url('dashboard/physician/colleagues/acceptFriend'); ?>">
						<input type="hidden" name="target_id" value="<?php echo $request->account_id; ?>"/>
						<button class="accept btn blue pull-right">
							<i class="fa fa-thumbs-o-up"></i>
							<span> Accept Request</span>
						</button>
					</form>
					
					<img src="<?php echo CA_Media::userpic($request->profile_profile_pic,'50'); ?>" class="avatar pull-left">
					<a href="<?php echo base_url(); ?>user/<?php echo $request->account_username;?>" class="fullname"><?=$request->profile_first_name.' '.$request->profile_last_name?></a>
					<span class="address"><?=$request->profile_address?></span>
					<div class="clearfix"></div>
				</div>
			<?php } ?>
		</div>
	</div>
	
	<div class="tab invites" id="friend_invites" style="display:none">
		<div class="pending_list">
			<h2 class="form_heading">Pending Sent Request</h2>
			<?php foreach($invites as $invite){ ?>
				<div class="request" target_id="<?php echo $invite->account_id; ?>">
				
					<form method="post" action="<?php echo base_url('dashboard/physician/colleagues/cancelFriend'); ?>">
						<input type="hidden" name="target_id" value="<?php echo $invite->account_id; ?>"/>
						<button class="cancel btn red pull-right">
							<i class="fa fa-times-circle"></i>
							<span> Cancel Request</span>
						</button>
					</form>
					
					<img src="<?php echo CA_Media::userpic($invite->profile_profile_pic,'50'); ?>" class="avatar pull-left" />
					<a href="<?php echo base_url(); ?>user/<?php echo $invite->account_username;?>" class="fullname"><?=$invite->profile_first_name.' '.$invite->profile_last_name?></a>
					<span class="address"><?=$invite->profile_address?></span>
					<div class="clearfix"></div>
				</div>
			<?php } ?>
		</div>
	</div>
	
</div> 