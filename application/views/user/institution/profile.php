<div class="col-sm-12">
	<div class="col-separator">
		<div class="col-separator-h"></div>
		<div class="tab-content">
			<div class="personal-profile inner-all active" id="personal-profile">
				<div class="row">
					<div class="view-only inner-all">
						<h4>Basic Information</h4>
						<div class="separator bottom"></div>
						<div class="col-sm-12 info">
							<label class="col-sm-2">Name</label>
							<span class="col-sm-10"><?php echo $target->institution->name; ?></span>
							<div class="clearfix"></div>
						</div>
						<div class="separator bottom"></div>
						<div class="col-sm-12 info">
							<label class="col-sm-2">Description</label>
							<span class="col-sm-10 description"><?php echo $target->institution->description; ?></span>
							<div class="clearfix"></div>
						</div>
						<div class="separator bottom"></div>
						<div class="col-sm-12 info">
							<label class="col-sm-2">Address</label>
							<span class="col-sm-10"><?php echo $target->institution->address; ?></span>
							<div class="clearfix"></div>
						</div>
						<div class="separator bottom"></div>
						<div class="separator bottom"></div>
						<h4>Contact</h4>
						<div class="separator bottom"></div>
						<div class="col-sm-12">
							<div class="col-sm-6 info">
								<label class="col-sm-3">Landline #1</label>
								<span class="col-sm-9"><?php echo $target->institution->landline1; ?></span>
							</div>
							<div class="col-sm-6 info">
								<label class="col-sm-3">Landline #2</label>
								<span class="col-sm-9"><?php echo $target->institution->landline2; ?></span>
							</div>
							<div class="clearfix"></div>
						</div>
						<div class="separator bottom"></div>
						<div class="col-sm-12">
							<div class="col-sm-6 info">
								<label class="col-sm-3">Mobile #1</label>
								<span class="col-sm-9"><?php echo $target->institution->mobile1; ?></span>
							</div>
							<div class="col-sm-6 info">
								<label class="col-sm-3">Mobile #2</label>
								<span class="col-sm-9"><?php echo $target->institution->mobile2; ?></span>
							</div>
							<div class="clearfix"></div>
						</div>
					</div>
				</div>
			</div>
			
			<div class="medical-profile inner-all" id="medical-profile" style="display:none">
				<div class="row">
					<?php
						if($this->session->userdata('user_logged')) {
							if($this->session->userdata('user_data')['username']==$userinfo->username && $userinfo->username!=""){
					?>
					<a href="<?=$this->config->base_url()?>dashboard/profile">
						<button class="btn white make-editable pull-right" data-id="medical-profile">
							<i class="fa fa-edit"></i>
							Edit
						</button>
					</a>
					<?php } } ?>
					<div class="view-only inner-all">
						<h4>Medical details</h4>
						<?php $med = json_decode($medprofile['profile']); ?>
						<div class="separator bottom"></div>
						<div class="col-sm-12 info">
							<label class="col-sm-3">Blood Type</label>
							<span class="col-sm-9"><?= $med->blood_type ?></span>
							<div class="clearfix"></div>
						</div>
						<div class="separator bottom"></div>
						<div class="col-sm-12 info">
							<label class="col-sm-3">Weight</label>
							<span class="col-sm-9"><?= $med->weight ?></span>
							<div class="clearfix"></div>
						</div>
						<div class="separator bottom"></div>
						<div class="col-sm-12 info">
							<label class="col-sm-3">Height</label>
							<span class="col-sm-9"><?= $med->height ?></span>
							<div class="clearfix"></div>
						</div>
					</div>
				</div>
			</div>
			
		</div>
	</div>
</div>