<div class="admin container">

<?php $this->load->view('admin/links', $active);?>
	
	<div class="col-sm-9 admin-content">
		<div class="patient_div inner-all">
			<h4>Admin Users</h4>
			<ul class="tab_head">
				<li class="active" data-tab="all">All</li>
				<li data-tab="addUser">Add New User</li>
			</ul>
			<div class="tab_body inner-all">
				<div class="all active content">
					<table>
						<thead>
							<tr>
								<td><i class="fa fa-unsorted"></i>Username</td>
								<td><i class="fa fa-unsorted"></i>Date Created</td>
								<td>Action</td>
							</tr>
						</thead>
						<tbody>
							<?php foreach($admins as $admin) :?>
							
							<tr class="odd">
								<td><?php echo $admin->username;?></td>
								<td><?php echo date_format($admin->created, 'Y-m-d');?></td>
								<td>
									<a href="/admin/user/delete/<?php echo $admin->id;?>">Delete</a>
								</td>
							</tr>
							<?php endforeach;?>
						</tbody>
					</table>
				</div>
				
				<div class="addUser content inner-all" style="display:none">
					<form method="post" action="/admin/users/create">
					<label>Username</label>
					<input type="text" name="username" placeholder="Username"> 
					<br />
					<br />
					<label>Password</label>
					<input type="password" name="password" placeholder="Password">
					<br />
					<br />
					<label>Email</label>
					<input type="text" name="email" placeholder="Email Address">
					<br />
					<br />
					
					<span class="info_data"></span>
					<button type="submit" class="btn blue pull-left">Create Admin</button>
					<br />
					<br />
					</form>
				</div>
				
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
	
</div>