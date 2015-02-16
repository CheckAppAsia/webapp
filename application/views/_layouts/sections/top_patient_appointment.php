<?php $cut_ruri = explode("/",$ruri); ?>
<div class="nav_heading">
	<span>Appointments</span>
</div>
<table class="nav_fullw">
	<tr>
		<td class="first"><a href="">
			<span>Overview</span>
		</a></td>
		<td class="<?php echo ($cut_ruri[1]=="appointments" && $cut_ruri[2]=="incoming")?"active":"" ?> second"><a href="<?php echo base_url('dashboard/patient/appointments/incoming'); ?>">
			<span>Incoming</span>
		</a></td>
		<td class="<?php echo ($cut_ruri[1]=="appointments" && $cut_ruri[2]=="pending")?"active":"" ?> third"><a href="<?php echo base_url('dashboard/patient/appointments/pending'); ?>">
			<span>Pending / Hold</span></span>
		</a></td>
		<td class="fourth"><a href="">
			<span>Recurring</span>
		</a></td>
		<td class="<?php echo ($cut_ruri[1]=="appointments" && $cut_ruri[2]=="history")?"active":"" ?> fifth"><a href="<?php echo base_url('dashboard/patient/appointments/history'); ?>">
			<span>History</span>
		</a></td>
	</tr>
</table>

