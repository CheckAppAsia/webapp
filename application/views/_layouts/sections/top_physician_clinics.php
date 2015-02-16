<?php $cut_ruri = explode("/",$ruri); ?>
<div class="nav_heading">
	<span>My Clinics</span>

</div>
<table class="nav_fullw">
	<tr>
		<td class="<?php echo ($cut_ruri[1]=="clinics" && $cut_ruri[2]=="index")?"active":"" ?> first"><a href="<?php echo base_url('dashboard/physician/clinics'); ?>">
			<span>List</span>
		</a></td>
		<td class="<?php echo ($cut_ruri[1]=="clinics" && $cut_ruri[2]=="availability")?"active":"" ?> second"><a href="<?php echo base_url('dashboard/physician/clinics/availability'); ?>">
			<span>Availability</span>
		</a></td>
	</tr>
</table>

