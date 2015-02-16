<a href="/dashboard/pharmacy/branches/addUser/<?php echo $branch->branch_id;?>"><span>Add Branch User</span></a>
<table class="simple_table">
	<thead>
		<tr>
			<td>Name</td>
			<td>Username</td>
			<td>Date Registered</td>
			<td>Status</td>
			<td>Action</td>
		</tr>
	</thead>
	<tbody>
		<?php
		foreach($data['users'] as $user) : 
		?>
			<tr>
				<td><?php echo $user->fname.' '.$user->lname?></td>
				<td><?php echo $user->mainUserInfo->username?></td>
				<td><?php echo date('Y-m-d', $user->date_created)?></td>
				<td><?php echo $data['status'][$user->status]?></td>
				<td><a href="#">View</a></td>
			</tr>
		<?php endforeach;?>
	</tbody>
</table>