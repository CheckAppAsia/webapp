<div class="content_box">
	<div class="inner-all">
		<a href="branches/add"><span>Add Branch</span></a>
		<br />
		<br />
		<table class="simple_table">
			<thead>
				<tr>
					<td width="15%"><span>Code</span></td>
					<td width="39%"><span>Name</span></td>
					<td width="15%"><span>Phone Number</span></td>
					<td width="15%"><span>Email Address</span></td>
					<td><span>Status</span></td>
					<td width="15%"><span>Action</span></td>
				</tr>
			</thead>
			<tbody>
				<?php 
				$i = 0;
				foreach($branches as $branch) :
				$str = 'odd';
				if($i == 0) {
					$i = 1;
					$str = 'even';
				} else {
					$i = 0;
					$str = 'odd';
				}
				?>
				<tr class="<?php echo $str?>">
					<td>
						<span><?php echo $branch->code?></span>
					</td>
					<td>
						<span><?php echo $branch->name?></span>
					</td>
					<td>
						<span><?php echo $branch->phone_number?></span>
					</td>
					<td>
						<span><?php echo $branch->email_address?></span>
					</td>
					<td>
						<span><?php echo $statWords[$branch->status];?></span>
					</td>
					<td>
						<a href="/dashboard/pharmacy/branches/view/<?php echo $branch->branch_id;?>"><span>View</span></a>
					</td>
				</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</div>