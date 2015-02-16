<div class="heading-box">
	<h4 class=" inner-all">Availability Settings</h4>
</div>

<div class="availability">
	<?php echo form_open('dashboard/physician/appointments/saveAvailability'); ?>
		
		<div class="form_div">
		
			<!----- DAILY TIME ----->
			<h4 class="form_heading">Daily Time</h4>
			<div class="form_group">
				<div class="col-sm-6">
					<div class="innerR">
						<label class="form_label">Start Hour</label>
						<select name="hour_start" class="form_select hour">
						<?php for($i=0;$i<=18;$i++){ ?>
							<option value="<?php echo $i; ?>" <?php echo ($availability->hour_start==$i)?'SELECTED':''; ?>>
								<?php echo str_pad($i,2,'0',STR_PAD_LEFT); ?>:00
							</option>
						<?php } ?>
						</select>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="innerR">
						<label class="form_label">End Hour</label>
						<select name="hour_end" class="form_select hour">
						<?php for($i=8;$i<=24;$i++){ ?>
							<option value="<?php echo $i; ?>" <?php echo ($availability->hour_end==$i)?'SELECTED':''; ?>>
								<?php echo str_pad($i,2,'0',STR_PAD_LEFT); ?>:00
							</option>
						<?php } ?>
						</select>
					</div>
				</div>
			</div>
			
			<div class="clearfix"></div>
			
			<!----- DAYS OF THE WEEK ----->
			<h4 class="form_heading days_week">Days of the Week</h4>
			<div class="form_group">
				<label class="col-sm-3 days_week_check"><input type="checkbox" class="form_check" value="1" name="day_mon" <?php echo ($availability->avail_mon)?'CHECKED':''; ?> /> Monday</label>
				<label class="col-sm-3 days_week_check"><input type="checkbox" class="form_check" value="1" name="day_tue" <?php echo ($availability->avail_tue)?'CHECKED':''; ?> /> Tuesday</label>
				<label class="col-sm-3 days_week_check"><input type="checkbox" class="form_check" value="1" name="day_wed" <?php echo ($availability->avail_wed)?'CHECKED':''; ?> /> Wednesday</label>
				<label class="col-sm-3 days_week_check"><input type="checkbox" class="form_check" value="1" name="day_thu" <?php echo ($availability->avail_thu)?'CHECKED':''; ?> /> Thursday</label>
				<label class="col-sm-3 days_week_check"><input type="checkbox" class="form_check" value="1" name="day_fri" <?php echo ($availability->avail_fri)?'CHECKED':''; ?> /> Friday</label>
				<label class="col-sm-3 days_week_check"><input type="checkbox" class="form_check" value="1" name="day_sat" <?php echo ($availability->avail_sat)?'CHECKED':''; ?> /> Saturday</label>
				<label class="col-sm-3 days_week_check"><input type="checkbox" class="form_check" value="1" name="day_sun" <?php echo ($availability->avail_sun)?'CHECKED':''; ?> /> Sunday</label>
				<div class="clearfix"></div>
			</div>
			
			<!----- SAVE BUTTON ----->
			<div class="separator bottom"></div>
			<div class="separator bottom"></div>
			<div class="separator bottom"></div>
			<button type="submit" name="profSave" class="btn blue form_button">
				<i class="fa fa-fw fa-check-square-o"></i>Save Changes
			</button>
			
			<div class="clearfix"></div>
		</div>
	
	<?php echo form_close(); ?>
	<div class="clearfix"></div>
	
	<table class="availability_table" border="0" cellspacing="0" cellpadding="0" style="display:none">
		<thead>
			<tr>
				<td>&nbsp;</td>
				<td>Mon</td>
				<td>Tue</td>
				<td>Wed</td>
				<td>Thu</td>
				<td>Fri</td>
				<td>Sat</td>
				<td>Sun</td>
			</tr>
		</thead>
		<tbody>
			<?php for($i=0; $i<12; $i++){ ?>
			<tr>
				<td><?php echo $i?>:30 am</td>
				<td class="droppable"></td>
				<td class="droppable"></td>
				<td class="droppable"></td>
				<td class="droppable"></td>
				<td class="droppable"></td>
				<td class="droppable"></td>
				<td class="droppable"></td>
			</tr>
			<tr>
				<td><?php echo $i+1?>:00 am</td>
				<td class="droppable"></td>
				<td class="droppable"></td>
				<td class="droppable"></td>
				<td class="droppable"></td>
				<td class="droppable"></td>
				<td class="droppable"></td>
				<td class="droppable"></td>
			</tr>
			<?php } ?>
			<?php for($i=0; $i<12; $i++){ ?>
			<tr>
				<td><?php echo $i?>:30 pm</td>
				<td class="droppable"></td>
				<td class="droppable"></td>
				<td class="droppable"></td>
				<td class="droppable"></td>
				<td class="droppable"></td>
				<td class="droppable"></td>
				<td class="droppable"></td>
			</tr>
			<tr>
				<td><?php echo $i+1?>:00 pm</td>
				<td class="droppable"></td>
				<td class="droppable"></td>
				<td class="droppable"></td>
				<td class="droppable"></td>
				<td class="droppable"></td>
				<td class="droppable"></td>
				<td class="droppable"></td>
			</tr>
			<?php } ?>
		</tbody>
	</table>
</div>
