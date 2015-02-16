<!-- PATIENT LIST -->
<div class="list-patients inner-all active" id="list-patients">
	<?php if(count($patients) == 0) { ?>
		<div class="inner-all">
			<div class="media">
				<div class="media-body innerAll half">
					<h2 class="form_heading">No Patients</h2>
				</div>
			</div>
		</div>
	<?php } else { ?>
		<?php $patientHid = array(); ?>
		<?php foreach($patients as $pat){ ?>
			<?php $patientHid[] = (int)$pat->patient_id; ?>
			<div class="inner-all border-bottom">
				<a href="<?php echo base_url('user/'.$pat->username);?>"> 
					<div class="media">
						<button class="pull-right btn white view-record-details">
							<i class="fa fa-arrow-right"></i>
						</button>
						<img width="50"  src="<?php echo CA_Media::userpic($pat->profile_pic,'50'); ?>" class="thumb pull-left" >
						<div class="media-body innerAll half">
							<h4 class=""><?php echo $pat->first_name.' '.$pat->last_name; ?></h4>
							<!-- <p>
								<?php 
								$birth = $pat->birthdate;
								$birth = explode(' ', $birth);
								$year = explode('-', $birth[0]);
								$birth = date('Y') - $year[0];
								?>
								<?php echo ($pat->gender == 1 ? 'Male' : 'Female')?>, <?echo $birth;?> years old
								<br>Patient 1234567890
							</p> -->
						</div>
					</div>
				</a>
			</div>
		<?php } ?>
	<?php } ?>
</div>

<!-- ADD NEW PATIENT -->
<div class="add-patient inner-all" id="add-patient" style="display:none">
	<?php echo form_open('dashboard/physician/patients/add'); ?>
		<input type="hidden" name="physician_id" value="<?php echo $currentUser['id'];?>">
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label class="col-md-3">Username</label>
					<div class="col-md-9">
						<div class="input-group">
							<input type="text" id="username" name="username" class="form-control">
							<span class="input-group-addon right-side">
								<i class="fa fa-question-circle"></i>
							</span>
						</div>
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="form-group">
					<label class="col-md-3">First Name</label>
					<div class="col-md-9">
						<div class="input-group">
							<input type="text" id="first-name" name="first_name" class="form-control">
							<span class="input-group-addon right-side">
								<i class="fa fa-question-circle"></i>
							</span>
						</div>
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="form-group">
					<label class="col-md-3">Last Name</label>
					<div class="col-md-9">
						<div class="input-group">
							<input type="text" id="last-name" name="last_name" class="form-control">
							<span class="input-group-addon right-side">
								<i class="fa fa-question-circle"></i>
							</span>
						</div>
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="form-group">
					<label class="col-md-3">Date of Birth</label>
					<div class="col-md-9">
						<div class="input-group">
							<input type="text" id="birthday" name="birthdate" class="form-control">
							<span class="input-group-addon right-side">
								<i class="fa fa-calendar"></i>
							</span>
						</div>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label class="col-md-3">Gender</label>
					<div class="col-md-9">
						<select name="gender" class="form-control">
							<option>Select Gender</option>
							<option selected="" value="1">Male</option>
							<option value="2">Female</option>
						</select>
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="form-group">
					<label class="col-md-3">Age</label>
					<div class="col-md-9">
						<input type="text" id="age" name="age" class="form-control">
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="form-group">
					<label class="col-md-3">Email</label>
					<div class="col-md-9">
						<div class="input-group">
							<input type="text" id="email" name="email" class="form-control">
							<span class="input-group-addon right-side">
								<i class="fa fa-question-circle"></i>
							</span>
						</div>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
		<button type="submit" name="patSave" class="btn blue submit">
			<i class="fa fa-fw fa-check-square-o"></i>
			Add
		</button>
	<?php echo form_close(); ?>
</div>

<!-- MESSAGE ALL -->
<div class="message-all inner-all" id="message-all" style="display:none">
	<div class="heading">
		<span class="glyphicons edit">
			<i></i>
			Send Message/Alert to all your Patients
		</span>
	</div>
	<div class="separator bottom"></div>
	<div class="separator bottom"></div>
	<div class="inner-all">
		<?php echo form_open('dashboard/physician/patients/messageall'); ?>
			<input type="hidden" name="physician_id" value ="<?php echo $currentUser['id'];?>">
			<input type="hidden" name="patients" value = "<?php //echo json_encode($patientHid);?>">
			<label>Subject</label>
			<div class="input-group">
				<input type="text" id="subject" name="subject" placeholder="Subject" class="form-control">
				<span class="input-group-addon right-side">
					<i class="fa fa-question-circle"></i>
				</span>
			</div>
			<div class="separator bottom"></div>
			<label>Subject</label>
			<div class="input-group">
				<textarea type="text" name="send_message" placeholder="Your Message" value="" class="form-control" required=""></textarea>
				<span class="input-group-addon right-side">
					<i class="fa fa-question-circle"></i>
				</span>
			</div>
			<div class="separator bottom"></div>
			<div class="separator bottom"></div>
			<button type="submit" name="profSave" class="btn blue submit">
				<i class="fa fa-fw fa-check-square-o"></i>
				Send to all
			</button>
		<?php echo form_close(); ?>
	</div>
</div>
