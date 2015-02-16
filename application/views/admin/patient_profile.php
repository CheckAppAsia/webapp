<div class="admin container">
<?php $this->load->view('admin/links', $active);?>
	<div class="col-sm-9 admin-content">
		<div class="inner-all">
			<div class="user_view">
				<h4>View Patient</h4>
				<div class="col-sm-2 left">
					<div class="profile_pic">
						<img src="<?php echo base_url(); ?>assets2/img/system/blank_profile.jpg" />
					</div>
				</div>
				<div class="col-sm-10 right">
					<ul class="tab_head">
						<li class="active" data-tab="basic_information">Basic Information</li>
						<li data-tab="message">Message Patient</li>
					</ul>
					<div class="tab_body inner-all">
						<div class="basic_information active content inner-all">
							<label>Name</label>
							<span class="info_data"><?php echo $patient->first_name.' '.$patient->last_name;?></span>
							
							<label>Address</label>
							<span class="info_data"><?php echo $patient->address1;?></span>
							
							<label>Gender</label>
							<span class="info_data"><?php echo $patient->gender;?></span>
							
							<label>Birth Date</label>
							<span class="info_data"><?php echo date_format($patient->birthdate, 'Y-m-d');?></span>
							
							<label>Date of Registration</label>
							<span class="info_data"><?php echo date_format($patient->created, 'Y-m-d');?></span>
							
							<label>Phone Number 1</label>
							<span class="info_data"><?php echo $patient->num_phone1;?></span>
							
							<label>Phone Number 2</label>
							<span class="info_data"><?php echo $patient->num_phone2;?></span>
							
							<label>Current Status</label>
							<span class="info_data"><?php echo $status[(int)$patient->status];?></span>
							
							
						</div>
						<div class="message content inner-all" style="display:none">
							Message Patient
						</div>
						
						<div class="actions">
							<a href="/admin/dashboard/patients"><button class="btn white pull-right">Back to list</button></a>
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
	
</div>