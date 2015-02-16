
<?php //echo'<pre>';print_r($appointments);die(); ?>
<div class="appoint-tabs-content">
	<div class="appoint-daily active" >
		<div class="inner-all appointment-heading">
			<div class="pull-left">
				<a class="strong">
					<?php echo date('l F j, Y', strtotime($selected_date)); ?>
				</a>
			</div>
			<div class="clearfix"></div>
		</div>
		<div class="appointment-body">
			<ul class="timeline-appointments border-bottom">
				<?php
				if($full_day){ $tstart=0; $tend=24; }else{ $tstart=8; $tend=19; }
				for($timeCtr=$tstart; $timeCtr<$tend; $timeCtr++){ ?>
					<?php $chour = str_pad($timeCtr, 2, '0', STR_PAD_LEFT); ?>
					
					<!-- HOUR ROW -->
					<li <?php echo (isset($appointments[$chour.':00']) || isset($appointments[$chour.':30'])) ? "class='occupied'":"" ?>>
						<!-- LABEL -->
						<div class="time">
							<?php
								if($timeCtr>12){
									$visibleHour = $timeCtr-12;
								}else{
									$visibleHour = $timeCtr;
								}
								echo $visibleHour;
							?>:00
							<span class="text-primary"><?php
								if($timeCtr<12){
									echo 'am';
								}else if($timeCtr>12){
									echo 'pm';
								}else{
									echo 'nn';
								}
							?></span>
						</div>
						<i class="fa fa-circle-o dot"></i>
						
						<!-- APPOINTMENTS -->
						<div class="appointments">
							<ul class="list-unstyled">
								
								<!-- HOUR :00 -->
								<li <?php echo (isset($appointments[$chour.':00']) ) ? "class='active'":"" ?>>
									<?php if(isset($appointments[$chour.':00'])){ ?>
										<?php foreach($appointments[$chour.':00'] as $appointment){ ?>
										<div class="apt">
											<img src="<?php echo CA_Media::userpic($appointment->profile_profile_pic,'150'); ?>" class="patient-pic" data-appt="<?php echo $appointment->id; ?>" data-userid="<?php echo $appointment->id; ?>" data-username="<?php echo $appointment->account_username; ?>" />
											<span class="patient_note"><?php echo $appointment->remarks; ?></span>
										&nbsp;</div>
										<?php } ?>
									<?php }else if(!isset($appointments[$chour.':30'])){ ?>
									<div class="apt">
										<span class="text-faded">Empty time slot ...</span>
									&nbsp;</div>
									<?php } ?>
								</li>
								
								<!-- HOUR :30 -->
								<li <?php echo (isset($appointments[$chour.':30']) ) ? "class='active'":"" ?>>
									<div class="apt">
										<?php if(isset($appointments[$chour.':30'])){ ?>
											<?php foreach($appointments[$chour.':30'] as $appointment){ ?>
												<img src="<?php echo CA_Media::userpic($appointment->profile_profile_pic,'150'); ?>" class="patient-pic" data-appt="<?php echo $appointment->id; ?>" data-userid="<?php echo $appointment->id; ?>" data-username="<?php echo $appointment->account_username; ?>" />
												<span class="patient_note"><?php echo $appointment->patient_note; ?></span>
											<?php } ?>
										<?php } ?>
									&nbsp;</div>
								</li>
								
							</ul>
						</div>
					</li>
				<?php } ?>
				
			</ul>
		</div>
		<div id="appoint-action">
			<div class="arrow-up"></div>
			<a href="<?php echo base_url('dashboard/physician/appointments/1'); ?>" class="appt_link"><i class="fa fa-edit"></i>Edit Details</a>
			<a class="lightbox-mode" data-target="reschedule"><i class="fa fa-calendar-o"></i>Change date</a>
			<!-- <a href=""><i class="fa fa-mail-reply"></i>See Previous Appointments</a> -->
			<a href="" class="user_link"><i class="fa fa-user"></i>View Patient Profile</a>
			<a class="close"><i class="fa fa-times"></i>Cancel</a>
		</div>
	</div>
	
</div>

<div class="lightbox reschedule" style="display:none">
	<div class="heading">
		<span class="close">x</span>
		<h2 class="margin-none">Appointment Details</h2>
	</div>
	<div class="success result inner-all">
		<p>Appointment rescheduled.</p>
	</div>
	<div class="fail result inner-all">
		<p>Something went wrong. Please try again.</p>
	</div>
	<div class="form inner-all" >
		<div class="separator bottom"></div>
		<div class="form-group">
			<label class="col-sm-3"></label>
			<div class="col-sm-9">
				<span class="from_to">From</span>
			</div>
			<div class="clearfix"></div>
		</div>
		<div class="form-group">
			<label class="col-sm-3">Date:</label>
			<div class="col-sm-9">
				<input type="text" class="form-control datepicker date" placeholder="Date" name="date">
			</div>
			<div class="clearfix"></div>
		</div>
		<div class="form-group">
			<label class="col-sm-3">Time:</label>
			<div class="col-sm-9">
				<div class="col-sm-4">
					<select name="hour" class="form-control hour">
						<?php for($i=0;$i<12;$i++){ ?>
						<option value="<?php echo $i+1 ?>" <?php echo (($i+1)==8)?"selected":"" ?>><?php echo $i+1 ?></option>
						<?php } ?>
					</select>
				</div>
				<div class="col-sm-4">
					<select name="minutes" class="form-control minutes">
						<option value="0">00</option>
						<option value="30">30</option>
					</select>
				</div>
				<div class="col-sm-4">
					<select name="ampm" class="form-control ampm">
						<option value="am">AM</option>
						<option vale="pm">PM</option>
					</select>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
		<div class="separator bottom"></div>
		<div class="separator bottom"></div>
		<div class="separator bottom"></div>
		<div class="form-group">
			<label class="col-sm-3"></label>
			<div class="col-sm-9">
				<span class="from_to">To</span>
			</div>
			<div class="clearfix"></div>
		</div>
		<div class="form-group">
			<label class="col-sm-3">Date:</label>
			<div class="col-sm-9">
				<input type="text" class="form-control datepicker date" placeholder="Date" name="date">
			</div>
			<div class="clearfix"></div>
		</div>
		<div class="form-group">
			<label class="col-sm-3">Time:</label>
			<div class="col-sm-9">
				<div class="col-sm-4">
					<select name="hour" class="form-control hour">
						<?php for($i=0;$i<12;$i++){ ?>
						<option value="<?php echo $i+1 ?>" <?php echo (($i+1)==8)?"selected":"" ?>><?php echo $i+1 ?></option>
						<?php } ?>
					</select>
				</div>
				<div class="col-sm-4">
					<select name="minutes" class="form-control minutes">
						<option value="0">00</option>
						<option value="30">30</option>
					</select>
				</div>
				<div class="col-sm-4">
					<select name="ampm" class="form-control ampm">
						<option value="am">AM</option>
						<option vale="pm">PM</option>
					</select>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
		<div class="separator bottom"></div>
		<div class="separator bottom"></div>
		<div class="form-group">
			<label class="col-sm-3">Notes:</label>
			<div class="col-sm-9">
				<textarea class="form-control notes" name="notes"></textarea>
			</div>
			<div class="clearfix"></div>
		</div>
		<div class="separator bottom"></div>
		<div class="form-group">
			<div class="col-sm-3"></div>
			<div class="col-sm-9">
				<button type="sumbit" class="btn blue submit">Submit</button>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
</div>