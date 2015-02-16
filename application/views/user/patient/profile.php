<div class="tab-content">
	<div class="personal-profile inner-all active" id="personal-profile">
		<div class="row">
			<?php
				if($this->session->userdata('user_logged')) {
					if($this->session->userdata('user_data')['username']==$userinfo->username && $userinfo->username!=""){
			?>
			<a href="<?php echo base_url()?>dashboard/patient/profile">
				<button class="btn white make-editable pull-right" data-id="personal-profile">
					<i class="fa fa-edit"></i>
					Edit
				</button>
			</a>
			<?php } } ?>
			<div class="view-only inner-all">
				<h4>Basic Informations</h4>
				<div class="separator bottom"></div>
				<div class="col-sm-12 info">
					<label class="col-sm-2">Fullname</label>
					<?php 
						if($userinfo->title==1){ $title="Mr"; }
						else if($userinfo->title==2){ $title="Ms"; }
						else{ $title="Mrs"; }
					?>
					<span class="col-sm-10"><?php echo $userinfo->first_name." ".$userinfo->middle_name." ".$userinfo->last_name ?></span>
					<div class="clearfix"></div>
				</div>
				<div class="separator bottom"></div>
				<div class="col-sm-12 info">
					<label class="col-sm-2">Address 1</label>
					<span class="col-sm-10"><?php echo $userinfo->address1 ?></span>
					<div class="clearfix"></div>
				</div>
				<div class="separator bottom"></div>
				<div class="col-sm-12 info">
					<label class="col-sm-2">Address 2</label>
					<span class="col-sm-10"><?php echo $userinfo->address2 ?></span>
					<div class="clearfix"></div>
				</div>
				<div class="separator bottom"></div>
				<div class="col-sm-12 info">
					<label class="col-sm-2">Birthday</label>
					<span class="col-sm-10"><?php echo substr($userinfo->birthdate,0,10) ?></span>
					<div class="clearfix"></div>
				</div>
				<div class="separator bottom"></div>
				<div class="col-sm-12 info">
					<label class="col-sm-2">Gender</label>
					<?php
						if($userinfo->gender==1){ $gender = "Male"; }
						else if($userinfo->gender==1){ $gender = "Female"; }
						else{ $gender = "Undisclosed";  }
					?>
					<span class="col-sm-10"><?php echo $gender; ?></span>
					<div class="clearfix"></div>
				</div>
				<div class="separator bottom"></div>
				<div class="separator bottom"></div>
				<h4>Contact</h4>
				<div class="separator bottom"></div>
				<div class="col-sm-12">
					<div class="col-sm-6 info">
						<label class="col-sm-3">Phone #1</label>
						<span class="col-sm-9"><?php echo $userinfo->num_phone1 ?></span>
					</div>
					<div class="col-sm-6 info">
						<label class="col-sm-3">Phone #2</label>
						<span class="col-sm-9"><?php echo $userinfo->num_phone2 ?></span>
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="separator bottom"></div>
				<div class="col-sm-12">
					<div class="col-sm-6 info">
						<label class="col-sm-3">Skype</label>
						<span class="col-sm-9"><?php echo $userinfo->c_skype ?></span>
					</div>
					<div class="col-sm-6 info">
						<label class="col-sm-3">Yahoo</label>
						<span class="col-sm-9"><?php echo $userinfo->c_yahoo ?></span>
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="separator bottom"></div>
				<div class="col-sm-12">
					<div class="col-sm-6 info">
						<label class="col-sm-3">Google</label>
						<span class="col-sm-9"><?php echo $userinfo->c_gtalk ?></span>
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
			<a href="<?php echo $this->config->base_url()?>dashboard/profile">
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
					<label class="col-sm-3">Family History</label>
					<span class="col-sm-9"><?php echo $med->family_history?></span>
					<div class="clearfix"></div>
				</div>
				<div class="separator bottom"></div>
				<div class="col-sm-12 info">
					<label class="col-sm-3">Known Allergies</label>
					<span class="col-sm-9"><?php echo $med->known_allergies?></span>
					<div class="clearfix"></div>
				</div>
				<div class="separator bottom"></div>
				<div class="col-sm-12 info">
					<label class="col-sm-3">Others</label>
					<span class="col-sm-9"><?php echo $med->other ?></span>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
	</div>
	
</div>
	