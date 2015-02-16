<!-- PROFILE COVER AREA
--------------------------------->
<div class="basic_info">
<?php if($currentUser['id']!=$target->user_id || TRUE){ ?>
	
	<!-- Remove friend -->
	<?php if($target->relation=='friend' && $currentUser['id']!=$target->user_id){ ?>
		<label for="remove_friend" class="remove_friend"><i class="fa fa-times"></i></label>
		<form action="<?php echo base_url()?>ajax/friend" method="post" style="display:none">
			<input type="hidden" name="action" value="remove" />
			<input type="hidden" name="target_id" value="<?php echo $target->user_id ?>" />
			<input type="hidden" name="target_username" value="<?php echo $target->username ?>" />
			<button id="remove_friend"></button>
		</form>
	<?php } ?>
	
	
	<div class="inner-all">
	
		<!-- Profile picture -->
		<div class="profile_pic pull-right">
			<img src="<?php echo CA_Media::userpic($target->profile_pic,'150'); ?>" class="lb_preview" />
		</div>
		
		<!-- Online status -->
		<div class="status">
			<i class="fa fa-chevron-circle-left"></i>
			<span class="online">online</span>
			<span class="time"><?php echo date("H:m a", strtotime($target->activity)); ?></span>
		</div>
		
		<!-- Information -->
		<div class="info">
			<span class="fullname block_text">
				<?php echo $target->first_name; ?>
				<?php echo $target->middle_name; ?>
				<?php echo $target->last_name; ?>
			</span>
			<span class="address block_text">
				<i class="fa fa-home"></i> <?php echo $target->location->text; ?>
			</span>
			<div class="work_age">
				<span class="work"><i class="fa fa-briefcase"></i> <?php echo $target->work; ?></span>
				<span class="age"><i class="fa fa-star"></i> <?php echo $target->age; ?> years old</span>
			</div>
		</div>
		
		<div class="clearfix"></div>
	</div>
	
</div>
<?php } ?>

<!-- PROFILE NAVIGATION
--------------------------------->
<?php
$cut_ruri = explode("/",$ruri);
$cut_ruri[4] = (isset($cut_ruri[4]))? $cut_ruri[4] : "";
?>
<table class="nav_fullw">
	<tr>
		<!-- TAB: Timeline -->
		<td class="<?php echo ($cut_ruri[2]=="index" && $cut_ruri[4]=="")? "active":"" ?> first">
			<a href="<?php echo base_url('user/'.$target->username.''); ?>">
				<span>Timeline</span>
			</a>
		</td>
		
		<!-- TAB: About -->
		<td class="<?php echo ($cut_ruri[2]=="profile")? "active":"" ?> second">
			<a href="<?php echo base_url('user/'.$target->username.'/profile'); ?>">
				<span>About</span>
			</a>
		</td>
		
		<!-- BUTTON: Add Friend -->
		<?php if($target->relation!='friend' && $currentUser['id']!=$target->user_id || TRUE){ ?>
		<td class="third">
			<label for="add_friend">
				<span><i class="fa fa-plus"></i> Add Friend</span>
			</label>
		</td>
		<?php } ?>
		
		<td class="fourth">
			<label for="add_friend">
				<span><i class="fa fa-plus"></i> Add Friend</span>
			</label>
		</td>
		
	</tr>
</table>