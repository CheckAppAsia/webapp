<?php $cut_ruri = explode("/",$ruri); ?>
<div class="nav_heading">
	<span>Social Timeline</span>
    <?php #print_r($cut_ruri) ?>
</div>
<table class="nav_fullw">
	<tr>
		<td class="<?php echo ($cut_ruri[1]=="timeline" && $cut_ruri[2]=="index")?"active":"" ?> first"><a href="<?php echo base_url('dashboard/patient/timeline/'); ?>">
			<span>Newsfeed</span>
		</a></td>
		<td class="<?php echo ($cut_ruri[1]=="timeline" && $cut_ruri[2]=="personal")?"active":"" ?> second"><a href="<?php echo base_url('dashboard/patient/timeline/personal'); ?>">
			<span>Personal Timeline</span>
		</a></td>
	</tr>
</table>

