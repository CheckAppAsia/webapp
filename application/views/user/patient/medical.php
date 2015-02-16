<div class="medical-profile inner-all" id="medical-profile">
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