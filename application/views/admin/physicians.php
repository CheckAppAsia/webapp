<div class="admin container">

	<?php $this->load->view('admin/links', $active);?>
	
	<div class="col-sm-9 admin-content">
		<div class="patient_div inner-all">
			<h4>Physicians</h4>
			<ul class="tab_head">
				<li class="active" data-tab="all">All</li>
				<li data-tab="verify">Verification</li>
				<li data-tab="forauth">For Authentication</li>
				<li data-tab="disabled">Disabled</li>
			</ul>
			<div class="tab_body inner-all">
				<div class="all active content">
					<table>
						<thead>
							<tr>
								<td><i class="fa fa-unsorted"></i>Name</td>
								<td><i class="fa fa-unsorted"></i>Specialization</td>
								<td><i class="fa fa-unsorted"></i>Date Registered</td>
								<td><i class="fa fa-unsorted"></i>Status</td>
								<td>Action</td>
							</tr>
						</thead>
						<tbody>
							<?php
							$flag = true;
							$auth = array();
							$forAuth = array();
							$dis = array();
							foreach($physicians as $docs) :
								switch((int)$docs->status) {
									case 0:
									case 1:
										$forVer[] = $docs;
									break;
									case 1:
										$auth[] = $docs;
									break;
									case 2:
										$forAuth[] = $docs;
									break;
								}	
							
								if($flag) {
									echo '<tr class="odd">';
									$flag = false;
								} else {
									echo '<tr class="even">';
									$flag = true;
								}
								?>
									<td><?php echo $docs->first_name.' '.$docs->last_name;?></td>
									<td><?php echo $docs->specizaliztion_1;?></td>
									<td><?php echo $docs->created;?></td>
									<td><?php echo $status[(int)$docs->status];?></td>
									<td>
										<a href="/admin/physician/viewProfile/<?php echo $docs->id;?>">View</a>
									</td>
								</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
				</div>
				
				<div class="verify content inner-all" style="display:none">
					<table>
						<thead>
							<tr>
								<td><i class="fa fa-unsorted"></i>Name</td>
								<td><i class="fa fa-unsorted"></i>Specialization</td>
								<td><i class="fa fa-unsorted"></i>Date Registered</td>
								<td><i class="fa fa-unsorted"></i>Status</td>
								<td>Action</td>
							</tr>
						</thead>
						<tbody>
							<?php
							$flag = true;
							foreach($forVer as $docs) :
								if($flag) {
									echo '<tr class="odd">';
									$flag = false;
								} else {
									echo '<tr class="even">';
									$flag = true;
								}
								?>
									<td><?php echo $docs->first_name.' '.$docs->last_name;?></td>
									<td><?php echo $docs->specizaliztion_1;?></td>
									<td><?php echo $docs->created;?></td>
									<td><?php echo $status[(int)$docs->status];?></td>
									<td>
										<a href="/admin/physician/viewProfile/<?php echo $docs->id;?>">View</a>
									</td>
								</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
				</div>
				
				<div class="forauth content inner-all" style="display:none">
					<table>
						<thead>
							<tr>
								<td><i class="fa fa-unsorted"></i>Name</td>
								<td><i class="fa fa-unsorted"></i>Specialization</td>
								<td><i class="fa fa-unsorted"></i>Date Registered</td>
								<td><i class="fa fa-unsorted"></i>Status</td>
								<td>Action</td>
							</tr>
						</thead>
						<tbody>
							<?php
							$flag = true;
							foreach($forAuth as $docs) :
								if($flag) {
									echo '<tr class="odd">';
									$flag = false;
								} else {
									echo '<tr class="even">';
									$flag = true;
								}
								?>
									<td><?php echo $docs->first_name.' '.$docs->last_name;?></td>
									<td><?php echo $docs->specizaliztion_1;?></td>
									<td><?php echo $docs->created;?></td>
									<td><?php echo $status[(int)$docs->status];?></td>
									<td>
										<a href="/admin/physician/viewProfile/<?php echo $docs->id;?>">Authenticate</a>
									</td>
								</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
				</div>
				
				<div class="disabled content inner-all" style="display:none">
					disabled
				</div>
				
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
	
</div>