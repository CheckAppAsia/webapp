<!--
<div class="widget-head">
	<ul>
		<li class="active">
			<a class="glyphicons user tab-open" data-tab-id="emergency-list" >
				<i></i>
				<span>Personal Profile</span>
			</a>
		</li>
		<li>
			<a class="glyphicons nameplate tab-open" data-tab-id="emergency-form" >
				<i></i>
				<span>Medical Profile</span>
			</a>
		</li>
	</ul>
</div>
-->

<div class="simple_tabs">
	<span class="active tab-open" data-tab-id="emergency-list">List</span>
	<span class="tab-open" data-tab-id="emergency-form">Add New</span>
</div>

<div class="tab-content">
	
	<!-- EMERGENCY LIST -->
	<div class="emergency-list active" id="emergency-list">
		<div class="form_div">
			<?php if($emergency_contacts) { ?>
			<table>
				<tr>
					<td width="150">First Name</td>
					<td width="150">Middle Name</td>
					<td width="150">Last Name</td>
					<td width="150">Phone Number 1</td>
					<td width="150">Phone Number 2</td>
				</tr>
				<tr><td colspan="4">&nbsp;</td></tr>
				<?php foreach($emergency_contacts as $contact) { ?>
				<tr>
					<td><?php echo $contact->first_name; ?></td>
					<td><?php echo $contact->middle_name; ?></td>
					<td><?php echo $contact->last_name; ?></td>
					<td><?php echo $contact->phonenum1; ?></td>
					<td><?php echo $contact->phonenum2; ?></td>
				</tr>
				<?php } ?>
			</table>
			<?php }else{ ?>
				<h4 class="form_heading">No Emergency Contacts Available</h4>
			<?php } ?>
		</div>
	</div>
	
	<!-- EMERGENCY FORM -->
	<div class="emergency-form" id="emergency-form" style="display:none">
		<?php echo form_open('dashboard/patient/emergency/addEmergency'); ?>
			<input type="hidden" id="id" name="id" value="<?php echo $patient_profile->id; ?>">
			<div class="form_div">
				<h4 class="form_heading">Contact Information</h4>
				<p class="error-box inner-all" style="display:none">testing</p>
				<span class="form_label">Type</span>
				<select name="contact_type" class="form_select" style="width:100px">
					<option value="Guardian">Guardian</option>
					<option value="Next of Kin">Next of Kin</option>
					<option value="Person to contact in case of emergency">Person to contact in case of emergency</option>
					<option value="Spouse">Spouse</option>
					<option value="Sibling">Sibling</option>
					<option value="Parent">Parent</option>
					<option value="Relative">Relative</option>
					<option value="Other">Other</option>
				</select>
				
				<span class="form_label">First Name</span>
				<input type="text" name="first_name" value="" class="input-tx">
				
				<span class="form_label">Middle Name</span>
				<input type="text" name="middle_name"  value="" class="input-tx" >

				<span class="form_label">Last Name</span>
				<input type="text" name="last_name"  value="" class="input-tx" >

				<span class="form_label">Suffix</span>
				<input type="text" name="suffix"  value="" class="input-tx" >

				<span class="form_label bday">Birthday</span>
				<div class="form_group">
					<input type="hidden" class="date_now" data-year="<?php echo date("Y") ?>" data-month="<?php echo date("m") ?>" data-day="<?php echo date("d") ?>" />
					<div class="col-sm-4">
						<div class="innerR">
							<select class="form_select month" name="month">
								<option value="01">Month</option>
								<option value="01">January</option>
								<option value="02">February</option>
								<option value="03">March</option>
								<option value="04">April</option>
								<option value="05">May</option>
								<option value="06">June</option>
								<option value="07">July</option>
								<option value="08">August</option>
								<option value="09">September</option>
								<option value="10">October</option>
								<option value="11">November</option>
								<option value="12">December</option>
							</select>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="innerR">
							<select class="form_select day" name="day">
								<option value="01">Day</option>
								<?php
									for($i=0; $i<31; $i++){
										$zero = ($i<=8)?"0":"";
										$value = $zero . ($i + 1);
								?>
								<option value="<?php echo $value ?>"><?php echo $i + 1?></option>
								<?php } ?>
							</select>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="innerR">
							<select class="form_select year" name="year">
								<option value="<?php echo date("Y")?>">Year</option>
								<?php for($i=0; $i<120; $i++){ ?>
								<option value="<?php echo date("Y") - $i?>"><?php echo date("Y") - $i?></option>
								<?php } ?>
							</select>
						</div>
					</div>
				</div>
				<br>	
				<span class="form_label">Gender</span>
				<label class="gender">
					<input type="radio" name="gender" value="1" checked />
					Male
				</label>
				<label class="gender">
					<input type="radio" name="gender" value="2" />
					Female
				</label>
				<span class="form_label">Address Type</span>
				<select name="address_type" class="form_select" style="width:100px">
					<option value="Personal">Personal</option>
					<option value="Office/School">Office/School</option>
					<option value="Home">Home</option>
					<option value="Other">Other</option>
				</select>
				<span class="form_label">Address</span>
				<input type="text" name="address" class="input-tx" value="" >
				<div class="form_group">
					<div class="col-sm-4">
						<div class="innerR">
							<span class="form_label">City</span>
							<input type="text" name="city" class="input-tx" value="">
						</div>
					</div>
					<div class="col-sm-4">
						<div class="innerR">
							<span class="form_label">State/Provice</span>
							<input type="text" name="state" class="input-tx" value="">
						</div>
					</div>
					<div class="col-sm-4">
						<div class="innerR">
							<span class="form_label">Country</span>
							<input id="country" type="text" name="country" class="input-tx" value="">
							<input type="hidden" id="countryId" name="countryId" value="">
						</div>
					</div>
				</div>
				
				<br>
				<h4 class="form_heading">Contact Details</h4>
				<span class="form_label">Phone 1</span>
				<input type="text" name="phone1" class="input-tx" value="">

				<span class="form_label">Phone 2</span>
				<input type="text" name="phone2" class="input-tx" value="">

				<span class="form_label">Email</span>
				<input type="text" name="email" class="input-tx" value="">
				
				<button type="submit" name="profSave" class="btn blue">
					<i class="fa fa-fw fa-check-square-o"></i>Save Changes
				</button>
			</div>
		<?php echo form_close(); ?>
	</div>
	
</div>
