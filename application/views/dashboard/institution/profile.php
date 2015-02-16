<?php $thisInst = &$data['currentUser']['institution']; ?>
<form action="<?php echo base_url('dashboard/institution/profile/save'); ?>" method="POST">
	<div class="heading-box">
		<h4 class=" inner-all">Institution Information</h4>
	</div>
	<div class="content-box inner-all">
		<!-- NAME -->
		<label for="firstname">Name</label>
		<div class="input-group">
			<input type="text" id="name" name="name" value="<?php echo $thisInst->name; ?>" class="form-control" >
			<span class="input-group-addon right-side">
				<i class="fa fa-question-circle"></i>
			</span>
		</div>
		<div class="separator bottom"></div>
		
		<!-- DESCRIPTION -->
		<label for="middlename">Description</label>
		<div class="input-group">
			<textarea id="description" name="description" rows="4" class="form-control"><?php echo $thisInst->description; ?></textarea>
			<span class="input-group-addon right-side">
				<i class="fa fa-question-circle"></i>
			</span>
		</div>
		<div class="separator bottom"></div>
		
		<!-- ADDRESS -->
		<label for="address">Address</label>
		<div class="input-group">
			<input type="text" id="address" name="address" class="form-control" value="<?php echo $thisInst->address; ?>">
			<span class="input-group-addon right-side"><i class="fa fa-home"></i></span>
		</div>
		<div class="separator bottom"></div>
		
	</div>
	
	<div class="heading-box">
		<h4 class=" inner-all">Contact Details</h4>
	</div>
	<div class="content-box inner-all">
		<div class="row">
			<!-- LANDLINE 1 -->
			<div class="col-md-6 inner-LR5">
				<label for="phone1">Telephone number 1</label>
				<div class="input-group">
					<span class="input-group-addon left-side">
						<i class="fa fa-phone"></i>
					</span>
					<input type="text" id="landline1" name="landline1" class="form-control" value="<?php echo $thisInst->landline1; ?>">
				</div>
				<div class="separator bottom"></div>
			</div>
			
			<!-- LANDLINE 2 -->
			<div class="col-md-6 inner-LR5">
				<label for="phone2">Telephone Number 2</label>
				<div class="input-group">
					<span class="input-group-addon left-side">
						<i class="fa fa-phone"></i>
					</span>
					<input type="text" id="landline2" name="landline2" class="form-control" value="<?php echo $thisInst->landline2; ?>">
				</div>
				<div class="separator bottom"></div>
			</div>
		</div>
		<div class="row">
			<!-- MOBILE 1 -->
			<div class="col-md-6 inner-LR5">
				<label for="phone1">Mobile Number 1</label>
				<div class="input-group">
					<span class="input-group-addon left-side">
						<i class="fa fa-phone"></i>
					</span>
					<input type="text" id="mobile1" name="mobile1" class="form-control" value="<?php echo $thisInst->mobile1; ?>">
				</div>
				<div class="separator bottom"></div>
			</div>
			
			<!-- MOBILE 2 -->
			<div class="col-md-6 inner-LR5">
				<label for="phone2">Mobile Number 2</label>
				<div class="input-group">
					<span class="input-group-addon left-side">
						<i class="fa fa-phone"></i>
					</span>
					<input type="text" id="mobile2" name="mobile2" class="form-control" value="<?php echo $thisInst->mobile2; ?>">
				</div>
				<div class="separator bottom"></div>
			</div>
		</div>
		
	</div>
	
	<button type="submit" name="profSave" class="btn blue pull-right">
		<i class="fa fa-fw fa-check-square-o"></i>Save Changes
	</button>
</form>