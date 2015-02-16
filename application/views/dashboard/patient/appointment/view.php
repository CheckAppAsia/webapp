<div class="heading-box">
	<h4 class=" inner-all">Diagnosis on Appointment <?php echo $appointment->id; ?></h4>
</div>
<div class="diagnosis-box">
	<div class="patient-box inner-all">
		<div class="patient-info">
			<img class="pull-left" src="<?php echo CA_Media::userpic($appointment->phyPP,'50'); ?>">
			<a href="<?php echo base_url('user/'.$appointment->phyUN); ?>" class="patient-name">
				<?php echo $appointment->phyFN; ?> <?php echo $appointment->phyLN; ?>
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
	<div class="diagnosis-data">
		<div class="inner-all">
			<!-- DIAGNOSIS -->
			<span class="label" style="font-weight:bold;">Diagnosis</span>
			<span class="value"><?php echo $appointment->diagnosis; ?></span>
			

			<!-- PRESCRIPTION -->
			<span class="label" style="font-weight:bold;">Prescription</span>
			<ul class="value_list">
			<?php if(count($prescriptions)){ ?>
				<?php foreach($prescriptions as $prescription){ ?>
					<li><strong><?php echo $prescription->medicine; ?></strong>, <?php echo $prescription->notes; ?></li>
				<?php } ?>
			<?php } ?>
			</ul>

			<!-- SUGGESTED MED_RECORDS -->
			<span class="label" style="font-weight:bold;">Suggested Tests & Exams</span>
			<ul class="value_list">
			<?php if(count($records)){ ?>
				<?php foreach($records as $record){ ?>
					<li><strong><?php echo $record->record_name; ?></strong>, <?php echo $record->notes; ?></li>
				<?php } ?>
			<?php } ?>
			</ul>
			
			<!-- COLLABORATION -->
			<span class="label" style="font-weight:bold;">Collaboration with Physician</span>
			
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
