<div class="admin container">

<?php $this->load->view('admin/links', $active);?>
	
	<div class="col-sm-9 admin-content">
		<div class="patient_div inner-all">
			<h4>Patients</h4>
			<ul class="tab_head">
				<li class="active" data-tab="all">All</li>
				<li data-tab="active2">Active</li>
				<li data-tab="for_veri">For Verifications</li>
				<li data-tab="disabled">Disabled</li>
			</ul>
			<div class="tab_body inner-all">
				<div class="all active content">
					<table>
						<thead>
							<tr>
								<td><i class="fa fa-unsorted"></i>Name</td>
								<td><i class="fa fa-unsorted"></i>Date Registered</td>
								<td><i class="fa fa-unsorted"></i>Status</td>
								<td>Action</td>
							</tr>
						</thead>
						<tbody>
							<?php foreach($patients as $patient) :?>
							
							<tr class="odd">
								<td><?php echo $patient->first_name.' '.$patient->last_name;?></td>
								<td><?php echo date_format($patient->created, 'Y-m-d');?></td>
								<td><?php echo $status[(int)$patient->status];?></td>
								
								<td>
									<a href="/admin/patient/viewProfile/<?php echo $patient->id;?>">View</a>
								</td>
							</tr>
							<?php endforeach;?>
							<tr class="even">
								<td>lorem</td>
								<td>ipsum</td>
								<td>dolor</td>
								<td>
									<a href="">View</a> |
									<a href="">Active</a>
								</td>
							</tr>
							<tr class="odd">
								<td>lorem</td>
								<td>ipsum</td>
								<td>dolor</td>
								<td>
									<a href="">View</a> |
									<a href="">Active</a>
								</td>
							</tr>
							<tr class="even">
								<td>lorem</td>
								<td>ipsum</td>
								<td>dolor</td>
								<td>
									<a href="">View</a> |
									<a href="">Active</a>
								</td>
							</tr>
							<tr class="odd">
								<td>lorem</td>
								<td>ipsum</td>
								<td>dolor</td>
								<td>
									<a href="">View</a> |
									<a href="">Active</a>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
				
				<div class="active2 content inner-all" style="display:none">
					active
				</div>
				
				<div class="for_veri content inner-all" style="display:none">
					for verifications
				</div>
				
				<div class="disabled content inner-all" style="display:none">
					disabled
				</div>
				
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
	
</div>