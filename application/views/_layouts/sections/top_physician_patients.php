<?php $cut_ruri = explode("/",$ruri); ?>
<div class="nav_heading">
	<span>My Patients</span>
</div>
<table class="nav_fullw">
	<tr>
		<td class="<?php echo ($cut_ruri[1]=="patients")?"active":"" ?> first"><a href="">
			<span>Patient List</span>
		</a></td>
		<td class="second"><a href="">
			<span><div class="space-tab">&nbsp;</div></span>
		</a></td>
	</tr>
</table>

