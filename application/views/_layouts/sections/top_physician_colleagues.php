<?php $cut_ruri = explode("/",$ruri); ?>
<div class="nav_heading">
	<span>Colleagues</span>
</div>
<table class="nav_fullw">
	<tr>
		<td class="<?php echo ($cut_ruri[1]=="colleagues" && $cut_ruri[2]=="index")?"active":"" ?> first"><a href="<?php echo base_url('dashboard/physician/colleagues'); ?>">
			<span>All Colleague (<?php echo $friend_count['list']; ?>)</span>
		</a></td>
		<td class="<?php echo ($cut_ruri[1]=="colleagues" && $cut_ruri[2]=="recent")?"active":"" ?> second"><a href="<?php echo base_url('dashboard/physician/colleagues/recent'); ?>">
			<span>Recently Added <span class="count">(<?php echo $friend_count['recent']; ?>)</span></span>
		</a></td>
		<td class="<?php echo ($cut_ruri[1]=="colleagues" && $cut_ruri[2]=="request")?"active":"" ?> third"><a href="<?php echo base_url('dashboard/physician/colleagues/request'); ?>">
			<span>Colleague Request <span class="count">(<?php echo $friend_count['total_request']; ?>)</span></span>
		</a></td>
	</tr>
</table>

