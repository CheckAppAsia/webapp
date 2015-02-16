<?php $cut_ruri = explode("/",$ruri); ?>
<div class="nav_heading">
	<span>Orders</span>
	<?php #print_r($cut_ruri) ?>
</div>
<table class="nav_fullw">
	<tr>
		<td class="<?php echo ($cut_ruri[2]=="index")?"active":"" ?> first"><a href="<?php echo base_url('dashboard/pharmacy/orders'); ?>">
			<span>Pending Orders</span>
		</a></td>
		<td class="<?php echo ($cut_ruri[2]=="cancelled")?"active":"" ?> second"><a href="<?php echo base_url('dashboard/pharmacy/orders/cancelled'); ?>">
			<span>Cancelled Orders</span>
		</a></td>
		<td class="<?php echo ($cut_ruri[2]=="processed")?"active":"" ?> second"><a href="<?php echo base_url('dashboard/pharmacy/orders/processed'); ?>">
			<span>Processed Orders</span>
		</a></td>
	</tr>
</table>