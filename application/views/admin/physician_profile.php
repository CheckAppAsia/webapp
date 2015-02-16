<div class="admin container">

	<?php $this->load->view('admin/links', $active);?>
	<div class="col-sm-9 admin-content">
		<div class="inner-all">
			<div class="user_view">
				<h4>View Physician</h4>
				<div class="col-sm-2 left">
					<div class="profile_pic">
						<img src="<?php echo base_url(); ?>assets2/img/system/blank_profile.jpg" />
					</div>
				</div>
				<div class="col-sm-10 right">
					<ul class="tab_head">
						<li class="active" data-tab="basic_information">Basic Information</li>
						<li data-tab="medical_bg">Medical Profile</li>
<!-- 						<li data-tab="medical_exp">Medical Experience</li> -->
						<li data-tab="message">Message Physician</li>
					</ul>
					<div class="tab_body inner-all">
						<div class="basic_information active content inner-all">
							<label>Name</label>
							<span class="info_data"><?php echo $physician->first_name.' '.$physician->last_name;?></span>
							
							<label>Address</label>
							<span class="info_data"><?php echo $physician->address1;?></span>
							
							<label>Gender</label>
							<span class="info_data"><?php echo $physician->gender;?></span>
							
							<label>Birth Date</label>
							<span class="info_data"><?php echo date_format($physician->birthdate, 'Y-m-d');?></span>
							
							<label>Date of Registration</label>
							<span class="info_data"><?php echo date_format($physician->created, 'Y-m-d');?></span>
							
							<label>Phone Number 1</label>
							<span class="info_data"><?php echo $physician->num_phone1;?></span>
							
							<label>Phone Number 2</label>
							<span class="info_data"><?php echo $physician->num_phone2;?></span>
							
							<label>Current Status</label>
							<span class="info_data"><?php echo $status[(int)$physician->status];?></span>
						</div>
						
						<div class="medical_bg content inner-all" style="display:none">
							<label>Specialization</label>
							<span class="info_data"><?php echo $physician->specialization_1;?></span>
							<label>License Number</label>
							<span class="info_data"><?php echo $physician->license_no;?></span>
							<label>Medical School and Year</label>
							<span class="info_data"><?php echo $physician->medical_school.', '.$physician->medical_school_year;?></span>
							<label>Short Biography</label>
							<span class="info_data"><?php echo $physician->about;?></span>
							<br />
							<label>Uploaded Documents</label>
							<?php
								foreach($data['physician_documents'] as $doc){
							?>
									<div style="padding:10px">
										Status: <?php if($doc['status']==1){ echo 'verified <button onclick="unverify('.$doc['id'].','.$doc['physician_id'].')">unverify</button>'; }else{ echo 'not yet verified <button onclick="verify('.$doc['id'].','.$doc['physician_id'].')">verify</button>'; } ?> <br/>
										<img src="<?=CA_Media::phy_doc($doc['file'],'thumb')?>" /> 
									</div>
							<?php		
								}
							?>
						</div>
						
						<!-- <div class="medical_exp content inner-all" style="display:none"> -->
<!-- 							Medical Experience -->
<!-- 						</div> -->
						
						<div class="message content inner-all" style="display:none">
							<label>Subject</label>
							<input type="text" name="subject" value=""><br />
							<label>Message</label>
							<textarea rows="10" cols="30"></textarea>
							<br />
							<input type="submit" value="Send Message" class="btn blue pull-left">
						</div>
						
						<div class="actions">
							<a href="/admin/dashboard/physicians"><button class="btn white pull-right">Back to list</button></a>
							<?php if((int)$physician->status == 2) { ?>
								<a href="/admin/physician/verify/<?php echo $physician->user_id;?>"><button class="btn blue pull-left">Authenticate</button></a>
							<?php } else if((int)$physician->status == 1) { ?>
								<a href=""><button class="btn red pull-left">Enable/Disable</button></a>
							<?php } ?>
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
	
</div>