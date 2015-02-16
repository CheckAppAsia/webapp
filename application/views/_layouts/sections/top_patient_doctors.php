<?php $cut_ruri = explode("/",$ruri); ?>
<div class="nav_heading">
	<span>My Doctors</span>
</div>
<table class="nav_fullw">
	<tr>
		<td class="first"><a href="">
			<span>Timeline</span>
		</a></td>
		<td class="<?php echo ($cut_ruri[1]=="doctors")?"active":"" ?> second"><a href="<?php echo base_url('dashboard/patient/doctors'); ?>">
			<span>My Doctors <span class="count">(xx)</span></span>
		</a></td>
		<td class="third"><a href="">
			<span>Following <span class="count">(xx)</span></span>
		</a></td>
		<td class="fourth"><a href="">
			<span>My Clinics</span>
		</a></td>
	</tr>
</table>

