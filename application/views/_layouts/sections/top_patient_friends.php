<?php $cut_ruri = explode("/",$ruri); ?>
<div class="nav_heading">
	<span>Friends</span>
</div>
<table class="nav_fullw">
	<tr>
		<td class="<?php echo ($cut_ruri[1]=="friends" && $cut_ruri[2]=="index")?"active":"" ?> first"><a href="<?php echo base_url('dashboard/patient/friends'); ?>">
			<span>All Friends (<?php echo $friend_count['list']; ?>)</span>
		</a></td>
		<td class="<?php echo ($cut_ruri[1]=="friends" && $cut_ruri[2]=="recent")?"active":"" ?> second"><a href="<?php echo base_url('dashboard/patient/friends/recent'); ?>">
			<span>Recently Added <span class="count">(<?php echo $friend_count['recent']; ?>)</span></span>
		</a></td>
		<td class="<?php echo ($cut_ruri[1]=="friends" && $cut_ruri[2]=="request")?"active":"" ?> third"><a href="<?php echo base_url('dashboard/patient/friends/request'); ?>">
			<span>Friend Request <span class="count">(<?php echo $friend_count['total_request']; ?>)</span></span>
		</a></td>
	</tr>
</table>

