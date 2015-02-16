<div class="heading-box">
	<h4 class=" inner-all">Setup an Appointment</h4>
</div>

<div class="create_form inner-all">
	<?php echo form_open('dashboard/physician/appointments/createSubmit'); ?>
	
		<span class="form_label">Patient</span>
		<?php if($patient){ ?>
			<input type="hidden" name="patient_id" value="<?php echo $patient->id; ?>" />
			<img src="<?php echo CA_Media::userpic($patient->profile_pic,'50'); ?>" class="patient_pic pull-left" />
			<span class="patient_fullname"><?php echo $patient->first_name. " " .$patient->last_name; ?></span>
			<div class="clearfix"></div>
		<?php }else{ ?>
			<input type="hidden" name="patient_id" id="patient_id" value="0" />
			<input type="hidden" id="physician_id" value="<?php echo $currentUser['id']; ?>" />
			<input class="form_text ui-autocomplete-input" type="text" id="patient_name" autocomplete="off" />
		<?php } ?>
		
		<span class="form_label">Notes</span>
		<textarea name="notes" class="form_textarea"></textarea>
		
		<span class="form_label">Schedule</span>
		<?php $datetime = new DateTime('tomorrow'); ?>
		<input type="text" class="form_text datepicker" name="followup_time" value="<?php echo $datetime->format('Y-m-d'); ?>" />
		<div class="form_group">
			<div class="col-sm-4">
				<div class="innerR">
					<select name="follow_hour" class="time hour form_select">
						<?php for($i=0;$i<12;$i++){ ?>
						<option value="<?php echo $i+1 ?>" <?php echo (($i+1)==8)?"selected":"" ?>><?php echo $i+1 ?></option>
						<?php } ?>
					</select>
				</div>
			</div>
			<div class="col-sm-4">
				<div class="innerR">
					<select name="follow_minutes" class="time minutes form_select">
						<option value="0">00</option>
						<option value="30">30</option>
					</select>
				</div>
			</div>
			<div class="col-sm-4">
				<div >
					<select name="follow_ampm" class="time ampm form_select">
						<option value="am">AM</option>
						<option vale="pm">PM</option>
					</select>
				</div>
			</div>
		</div>
		
		<input type="submit" name="action" value="Set appointment" class="btn blue" />
	<?php echo form_close(); ?>
</div>