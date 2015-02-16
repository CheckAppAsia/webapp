<div class="heading-box">
	<h4 class=" inner-all">Diagnosis on Appointment <?php echo $appointment->id; ?></h4>
</div>
<div class="diagnosis-box">
	<div class="patient-box inner-all">
		<div class="patient-info">
			<img class="pull-left" src="<?php echo CA_Media::userpic($appointment->profile_profile_pic,'150'); ?>">
			<a href="<?php echo base_url('user/'.$appointment->account_username); ?>" class="patient-name">
				<?php echo $appointment->profile_first_name; ?> <?php echo $appointment->profile_last_name; ?>
			</a>
			<span class="clinic">
				&nbsp;
			</span>
			<span class="arrival">
				&nbsp;
			</span>
			<div class="clearfix"></div>
		</div>
		<hr />
	</div>
	<div class="diagnosis-form inner-all">
		
		<!-- Tab's Nav -->
		<ul class="tab_nav">
			<li data-tab-id="schedule">Schedule</li>
			<li class="active" data-tab-id="diagnosis">Diagnosis</li>
			<li data-tab-id="collab">Collaboration</li>
			<!-- <li data-tab="qestionnaire">Questionnaire</li>
			<li data-tab="med_profile">Medical Profile</li>
			<li data-tab="med_record">Medical Records</li> -->
		</ul>
		<div class="clearfix"></div>
		
		<!-- SCHEDULE -->
		<div class="tab schedule active" style="display:none;">
		<?php echo form_open('dashboard/physician/appointments/saveSchedule'); ?>
			<input type="hidden" name="id" value="<?php echo $appointment->id; ?>" />
			
			<!-- SCHEDULE -->
			<span class="label">Schedule</span>
			<input type="text" name="schedule" value="<?php echo date("Y-m-d", strtotime($appointment->schedule)); ?>" class="input-tx datepicker" />
			
			<?php $MyHour = date("H", strtotime($appointment->schedule)); ?>
			<select name="resched_hour" class="time hour">
				<?php for($i=0;$i<12;$i++){ ?>
				<option value="<?php echo str_pad($i+1,2,'0',STR_PAD_LEFT) ?>" <?php echo ($MyHour==$i+1 || $MyHour==$i+13)?"selected":"" ?>><?php echo $i+1 ?></option>
				<?php } ?>
			</select>
			
			<?php $MyMinute = date("i", strtotime($appointment->schedule)); ?>
			<select name="resched_minutes" class="time minutes">
				<option value="00" <?php echo ($MyMinute=='00')?"selected":"" ?>>00</option>
				<option value="30" <?php echo ($MyMinute=='30')?"selected":"" ?>>30</option>
			</select>
			
			<?php $MyAmpm = date("A", strtotime($appointment->schedule)); ?>
			<select name="resched_ampm" class="time ampm">
				<option value="AM" <?php echo ($MyAmpm=='AM')?"selected":"" ?>>AM</option>
				<option vale="PM" <?php echo ($MyAmpm=='PM')?"selected":"" ?>>PM</option>
			</select>
			
			<input type="submit" name="action" value="Reschedule" class="btn red" />
			<br /><br /><br /><br />
			
			<!-- PATIENT'S NOTES -->
			<span class="label">Patient's Notes</span>
			<span class="patient_notes"><?php echo $appointment->remarks; ?></span>
			<br /><br /><br /><br />
			
			<!-- END TIME -->
			<span class="label">Appointment Completion</span>
			Completion Time: <strong><?php echo $appointment->end_time; ?></strong>
			<span class="side_notes">Once you have completed with the patient's diagnosis and other details, please indicate the time here for record purposes. You may also pre-set this time value before or during the appointment to notify succeeding patients of possible delays and schedule conflicts.
			</span>
			<input type="text" name="end_time" class="input-tx" value="<?php echo date("Y-m-d H:i a"); ?>" />
			<input type="submit" name="action" value="Update" class="btn blue" />
			<br /><br /><br /><br />
			
			<!-- HOLD APPOINTMENT -->
			<span class="label">Hold Appointment</span>
			<span class="side_notes">You may optionally put the appointment on hold for further notice to the patient. If the hold status reached the original schedule of the appointment, it will automatically be cancelled.</span>
			<input type="submit" name="action" value="Hold appointment" class="btn white" />
			<br /><br /><br /><br />
			
			<!-- FOLLOW UP -->
			<span class="label">Set a Follow-up Appointment</span>
			<span class="side_notes">You may optionally create a follow-up appointment for this patient.</span>
			<input type="submit" name="action" value="Create follow-up" class="btn blue" />
			<br /><br /><br /><br />
			
		<?php echo form_close(); ?>
		</div>
		
		<!-- DIAGNOSIS -->
		<div class="tab diagnosis" style="display:block">
		<?php echo form_open('dashboard/physician/appointments/saveDiagnosis'); ?>
			<input type="hidden" name="id" value="<?php echo $appointment->id; ?>" />
			
			<!-- DIAGNOSIS -->
			<span class="label">Diagnosis</span>
			<textarea name="diagnosis" class="form-control diagnose_text"><?php echo $appointment->diagnosis; ?></textarea>
			<br /><br /><br />
			
			<!-- PRESCRIPTION -->
			<span class="label">Prescription</span>
			<?php if(count($prescriptions)){ ?>
				<?php foreach($prescriptions as $prescription){ ?>
					<strong><?php echo $prescription->medicine; ?></strong>
					<?php echo $prescription->notes; ?><br />
				<?php } ?>
			<?php }else{ ?>
				<label>Medication / Notes</label>
				<div class="prescription_fields">
					<input type="text" name="pres_c[]" value="" class="input-tx half" /><span class="splitter">/</span><input type="text" name="pres_n[]" value="" class="input-tx half" />
					<input type="text" name="pres_c[]" value="" class="input-tx half" /><span class="splitter">/</span><input type="text" name="pres_n[]" value="" class="input-tx half" />
					<input type="text" name="pres_c[]" value="" class="input-tx half" /><span class="splitter">/</span><input type="text" name="pres_n[]" value="" class="input-tx half" />
				</div>
				<span class="add_more prescription">+Add more</span>
			<?php } ?><br /><br /><br />
			
			<!-- SUGGESTED MED_RECORDS -->
			<span class="label">Suggested Tests & Exams</span>
			<?php if(count($records)){ ?>
				<?php foreach($records as $record){ ?>
					<strong><?php echo $record->record_name; ?></strong>
					<?php echo $record->notes; ?><br />
				<?php } ?>
			<?php }else{ ?>
				<label>Exam or Lab Test / Notes</label>
				<div class="test_fields">
					<input type="text" name="rec_c[]" value="" class="input-tx half" /><span class="splitter">/</span><input type="text" name="rec_n[]" value="" class="input-tx half" />
					<input type="text" name="rec_c[]" value="" class="input-tx half" /><span class="splitter">/</span><input type="text" name="rec_n[]" value="" class="input-tx half" />
					<input type="text" name="rec_c[]" value="" class="input-tx half" /><span class="splitter">/</span><input type="text" name="rec_n[]" value="" class="input-tx half" />
				</div>
				<span class="add_more test">+Add more</span>
			<?php } ?><br /><br /><br />
			
			<button name="action" value="save_details" class="btn blue">Save Changes</button>
		<?php echo form_close(); ?>
			<div class="clone" style="display:none">
				<div class="clone_presc">
					<input type="text" name="pres_c[]" value="" class="input-tx half" /><span class="splitter">/</span><input type="text" name="pres_n[]" value="" class="input-tx half" />
				</div>
				<div class="clone_test">
					<input type="text" name="rec_c[]" value="" class="input-tx half" /><span class="splitter">/</span><input type="text" name="rec_n[]" value="" class="input-tx half" />
				</div>
			</div>
		</div>
		
		<!-- QUESTIONNAIRE -->
		<div class="tab qestionnaire" style="display:none">
			<label>Questionnaire</label><br />
			&nbsp;
			<?php foreach($questionnaireAnswers as $questionnaireAnswer){ ?>
				<span style="font-weight:bold;"><?php echo $questionnaireAnswer->question; ?></span><br />
				<?php echo $questionnaireAnswer->answer; ?><br />
				<br />
			<?php } ?>
		</div>
		
		<!-- PATIENT PROFILE -->
		<div class="tab med_profile" style="display:none">
			<span class="label">Medical Profile</span>
			
		</div>
		
		<!-- PATIENT RECORDS -->
		<div class="tab med_record" style="display:none">
			<span class="label">Medical Records</span>
			
		</div>
			
		<!-- COLLABORATION -->
		<div class="tab collab" style="display:none">
			<span class="label">Collaboration with Patient</span>
			
			<!-- Reply Box -->
			<div class="reply">
				<textarea class="form-control" placeholder="enter message" id="replyMessage"></textarea>
				<button class="btn blue submit pull-right" id="messageReplyBtn">reply</button>
				<div class="clearfix"></div>
			</div>
			
			<!-- Thread Contents -->
			<div id="conversation-contents">
			</div>
			
		</div>
		
	</div>
</div>

<div class="clone thread" style="display:none">
	<div class='msgcontainer'>
		<span class='timestamp pull-right'></span>
		<img src="" class='avatar pull-left'/>
		<span class='username'></span>
		<p></p>
		<div class='clearfix'></div>
	</div>
</div>
<input type="hidden" id="appointment_id" value="<?php echo $appointment->id; ?>" />
<input type="hidden" id="receiver_id" value="<?php if($this->session->userdata['user_data']['id']==$appointment->physician_id){ echo $appointment->patient_id; }else{ echo $appointment->physician_id; } ?>" />
<input type="hidden" id="initialtid" value="<?php if($tid!=""){echo $tid;}else{echo 0;} ?>">
<script>
    var sender = <?=$this->session->userdata['user_data']['id']?>;
    var sendername = "<?=$this->session->userdata['user_data']['username']?>";
</script>