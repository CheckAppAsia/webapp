<?php $cut_ruri = explode("/",$ruri); ?>
<div class="content_box">
	<div class="inner-all">
		<h2>Branch Information</h2><br />
		<h4>Branch Code: <?=$branch->code?></h4>
		<h4>Branch Name: <?=$branch->name?></h4>
		<h4>Date Registered: <?=date('Y-m-d', $branch->date_created)?></h4>
		<h4>Branch Address: <?=$branch->address?></h4>
		<h4>Contact Number: <?=$branch->phone_number?></h4>
		<h4>Email Address: <?=$branch->email_address?></h4>
		<br />
		<a href="/dashboard/pharmacy/branches"><span>Back to List</span></a>
		<hr>
		<table class="nav_fullw">
			<tr>
				<td class="<?php echo (!isset($cut_ruri[4]))?"active":"" ?> first"><a href="<?php echo base_url('dashboard/pharmacy/branches/view/'.$branch->branch_id); ?>">
					<span>List of Handled Medicines</span>
				</a></td>
				<td class="<?php echo (isset($cut_ruri[4]) && $cut_ruri[4] == "others")?"active":"" ?> first"><a href="<?php echo base_url('dashboard/pharmacy/branches/view/'.$branch->branch_id.'/others'); ?>">
					<span>List of Handled Products</span>
				</a></td>
				<td class="<?php echo (isset($cut_ruri[4]) && $cut_ruri[4] == "users")?"active":"" ?> second"><a href="<?php echo base_url('dashboard/pharmacy/branches/view/'.$branch->branch_id.'/users'); ?>">
					<span>List of Branch Users</span>
				</a></td>
			</tr>
		</table>
		
		<br />
		<?php 
		$this->load->view($content, array('data' => $content_data));
		?>
	</div>
</div>