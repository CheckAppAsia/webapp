<?php $cut_ruri = explode("/",$ruri); ?>
<div class="nav_heading">
	<span>Profile & Settings</span>
	<?php #print_r($cut_ruri) ?>
</div>
<table class="nav_fullw">
	<tr>
		<td class="<?php echo ($cut_ruri[1]=="profile" && $cut_ruri[2]=="index")?"active":"" ?> first"><a href="<?php echo base_url('dashboard/patient/profile'); ?>">
			<span>Overview</span>
		</a></td>
		<td class="<?php echo ($cut_ruri[1]=="profile" && $cut_ruri[2]=="edit")?"active":"" ?> second"><a href="<?php echo base_url('dashboard/patient/profile/edit'); ?>">
			<span>Edit Profile</span>
		</a></td>
		<td class="<?php echo ($cut_ruri[1]=="settings" && $cut_ruri[2]=="index")?"active":"" ?> third"><a href="<?php echo base_url('dashboard/settings'); ?>">
			<span>Account Settings</span>
		</a></td>
		<td class="<?php echo ($cut_ruri[1]=="settings" && $cut_ruri[2]=="privacy")?"active":"" ?> fourth"><a href="<?php echo base_url('dashboard/settings/privacy'); ?>">
			<span>Security & Privacy</span>
		</a></td>
		<td class="<?php echo ($cut_ruri[1]=="emergency" && $cut_ruri[2]=="index")?"active":"" ?> fifth"><a href="<?php echo base_url('dashboard/patient/emergency'); ?>">
			<span>Emergency Contacts</span>
		</a></td>
	</tr>
</table>

