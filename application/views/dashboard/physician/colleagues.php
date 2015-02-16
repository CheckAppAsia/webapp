<?php
	
		
		//echo"<pre>";print_r($data);die();
?>
<div class="simple_tabs">
	<ul>
		<li data-target="list" class="active">
			<i class="fa fa-list-ul"></i>Colleagues
		</li>
		
		<li data-target="requests" >
			<i class="fa fa-exclamation-circle"></i>Friend Request
		</li>
		
		<li data-target="invites" >
			<i class="fa fa-asterisk"></i>Sent Request
		</li>
	</ul>
</div>

<div class="tab_content">
	<div class="tab list active">
		<div class="heading-box">
			<h4 class=" inner-all">Colleagues</h4>
		</div>
		<div class="friends-list">
			<?php
				foreach($friends as $friend){
					if($friend->profile_pic==""){ $profile_pic = base_url()."assets2/img/system/blank_profile.jpg"; }
					else{ $profile_pic = base_url()."media/userpic/".$friend->profile_pic; }
			?>
			<div class="friend">
				<div class="friend_box" target_id="<?php echo $friend->id; ?>">
					<div class="unfriend pull-right"><i class="fa fa-times"></i></div>
					<a href="<?php echo base_url(); ?>user/<?php echo $friend->username;?>">
						<img src="<?php echo CA_Media::userpic($friend->profile_pic,'50'); ?>" style="width:50px;height:50px;"/>
						<span class="fullname"><?=$friend->first_name.' '.$friend->last_name?></span>
					</a>
					<br/>
					<span class="address" style="color:#999;font-size:12px;"><?=$friend->address1?></span>
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
	
	<div class="tab requests" style="display:none">
		<div class="heading-box">
			<h4 class=" inner-all">Pending Friend Request</h4>
		</div>
		<div class="pending_list">
			<?php foreach($requests as $request){ ?>
				<div class="request" target_id="<?php echo $request->id; ?>">
					<!--<button class="btn white pull-right">Delete Request</button>
					<button class="btn blue pull-right">Accept</button>-->
					
					<button class="reject btn red pull-right">
						<i class="fa fa-thumbs-o-down"></i>
						<span> Reject Request</span>
					</button>
					<button class="accept btn blue pull-right">
						<i class="fa fa-thumbs-o-up"></i>
						<span> Accept Request</span>
					</button>
					
					<img src="<?php echo CA_Media::userpic($request->profile_pic,'50'); ?>" class="avatar pull-left">
					<a href="<?php echo base_url(); ?>user/<?php echo $request->username;?>" class="fullname"><?=$request->first_name.' '.$request->last_name?></a>
					<span class="address"><?=$request->address1?></span>
					<div class="clearfix"></div>
				</div>
			<?php } ?>
		</div>
	</div>
	
	<div class="tab invites" style="display:none">
		<div class="heading-box">
			<h4 class=" inner-all">Friend Request to other</h4>
		</div>
		<div class="pending_list">
			<?php foreach($invites as $invite){ ?>
				<div class="request" target_id="<?php echo $invite->id; ?>">
					<button class="cancel btn red pull-right">
						<i class="fa fa-times-circle"></i>
						<span> Cancel Request</span>
					</button>
					
					<img src="<?php echo CA_Media::userpic($invite->profile_pic,'50'); ?>" class="avatar pull-left" />
					<a href="<?php echo base_url(); ?>user/<?php echo $invite->username;?>" class="fullname"><?=$invite->first_name.' '.$invite->last_name?></a>
					<span class="address"><?=$invite->address1?></span>
					<div class="clearfix"></div>
				</div>
			<?php } ?>
		</div>
	</div>
	
</div> 