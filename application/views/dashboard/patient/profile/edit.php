<!--
<div class="widget-head">
	<ul>
		<li class="active">
			<a class="glyphicons user tab-open" data-tab-id="personal-profile" >
				<i></i>
				<span>Personal Profile</span>
			</a>
		</li>
		<li>
			<a class="glyphicons nameplate tab-open" data-tab-id="medical-profile" >
				<i></i>
				<span>Medical Profile</span>
			</a>
		</li>
	</ul>
</div>
-->

<div class="simple_tabs">
	<span class="active tab-open" data-tab-id="personal-profile">Personal Profile</span>
	<span class="tab-open" data-tab-id="medical-profile">Medical Profile</span>
</div>

<div class="tab-content">
	
	<!-- PERSONAL PROFILE -->
	<div class="personal-profile active" id="personal-profile">
		<?php echo form_open('dashboard/profile/updatePersonal'); ?>
			<input type="hidden" id="id" name="id" value="<?php echo $patient_profile->id; ?>">
			<div class="form_div">
				<h4 class="form_heading">Basic Information</h4>
				<span class="form_label">Title</span>
				<select name="title" class="form_select" style="width:100px">
					<option value="Mr." <?php echo ($patient_profile->title=='Mr.') ? "selected='selected'":""?>>Mr.</option>
					<option value="Ms." <?php echo ($patient_profile->title=='Ms.') ? "selected='selected'":""?>>Ms.</option>
					<option value="Mrs." <?php echo ($patient_profile->title=='Mrs.') ? "selected='selected'":""?>>Mrs.</option>
					<option value="Lady" <?php echo ($patient_profile->title=='Lady') ? "selected='selected'":""?>>Lady</option>
					<option value="Sir" <?php echo ($patient_profile->title=='Sir') ? "selected='selected'":""?>>Sir</option>
				</select>
				<!--
				<input type="text" name="title" value="<?php echo $patient_profile->title; ?>" class="form_text">
				-->
				
				<span class="form_label">First Name</span>
				<input type="text" name="first_name" value="<?php echo $patient_profile->first_name; ?>" class="form_text">
				
				<span class="form_label">Middle Name</span>
				<input type="text" name="middle_name"  value="<?php echo $patient_profile->middle_name; ?>" class="form_text" >

				<span class="form_label">Last Name</span>
				<input type="text" name="last_name"  value="<?php echo $patient_profile->last_name; ?>" class="form_text" >
				
				<span class="form_label">Gender</span>
				<label class="gender">
					<input type="radio" name="gender" value="1" <?php echo ($patient_profile->gender==1) ? "checked":""?> />
					Male
				</label>
				<label class="gender">
					<input type="radio" name="gender" value="2" <?php echo ($patient_profile->gender==2) ? "checked":""?> />
					Female
				</label>
				<!--
				<select name="gender" class="form_select">
					<option>Select Gender</option>
					<option value="1" <?php echo ($patient_profile->gender==1) ? "selected='selected'":""?>>Male</option>
					<option value="2" <?php echo ($patient_profile->gender==2) ? "selected='selected'":""?>>Female</option>
				</select>
				-->

				<span class="form_label bday">Birthday</span>
				<div class="form_group">
					<input type="hidden" class="date_now" data-year="<?php echo date("Y") ?>" data-month="<?php echo date("m") ?>" data-day="<?php echo date("d") ?>" />
					<?php
						$str_month = date("m", strtotime($patient_profile->birthdate));
						$str_day = date("d", strtotime($patient_profile->birthdate));
						$str_year = date("Y", strtotime($patient_profile->birthdate));
					?>
					<div class="col-sm-4">
						<div class="innerR">
							<select class="form_select month" name="month">
								<option value="01">Month</option>
								<option value="01" <?php echo ($str_month == "01") ? "selected='selected'":""; ?>>January</option>
								<option value="02" <?php echo ($str_month == "02") ? "selected='selected'":""; ?>>February</option>
								<option value="03" <?php echo ($str_month == "03") ? "selected='selected'":""; ?>>March</option>
								<option value="04" <?php echo ($str_month == "04") ? "selected='selected'":""; ?>>April</option>
								<option value="05" <?php echo ($str_month == "05") ? "selected='selected'":""; ?>>May</option>
								<option value="06" <?php echo ($str_month == "06") ? "selected='selected'":""; ?>>June</option>
								<option value="07" <?php echo ($str_month == "07") ? "selected='selected'":""; ?>>July</option>
								<option value="08" <?php echo ($str_month == "08") ? "selected='selected'":""; ?>>August</option>
								<option value="09" <?php echo ($str_month == "09") ? "selected='selected'":""; ?>>September</option>
								<option value="10" <?php echo ($str_month == "10") ? "selected='selected'":""; ?>>October</option>
								<option value="11" <?php echo ($str_month == "11") ? "selected='selected'":""; ?>>November</option>
								<option value="12" <?php echo ($str_month == "12") ? "selected='selected'":""; ?>>December</option>
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
								<option value="<?php echo $value ?>" <?php echo ($str_day == $value) ? "selected='selected'":""; ?>><?php echo $i + 1?></option>
								<?php } ?>
							</select>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="innerR">
							<select class="form_select year" name="year">
								<option value="<?php echo date("Y")?>">Year</option>
								<?php for($i=0; $i<120; $i++){ ?>
								<option value="<?php echo date("Y") - $i?>" <?php echo ($str_year == (date("Y") - $i)) ? "selected='selected'":""; ?>><?php echo date("Y") - $i?></option>
								<?php } ?>
							</select>
						</div>
					</div>
				</div>
				<!--
				<input type="text" name="birthday" class="form_text datepicker_bday" required="" value="<?php echo substr($patient_profile->birthdate,0,10)?>">
				-->
				<?php // debug($patient_profile); ?>
				<?php // debug($health_profile); ?>
				<span class="form_label">Address</span>
				<input type="text" name="address" class="form_text" value="<?php echo $patient_profile->address; ?>" >
				<div class="form_group">
					<div class="col-sm-4">
						<div class="innerR">
							<span class="form_label">City</span>
							<input type="text" name="city" class="form_text" value="<?php echo $patient_profile->city; ?>">
						</div>
					</div>
					<div class="col-sm-4">
						<div class="innerR">
							<span class="form_label">State/Provice</span>
							<input type="text" name="state" class="form_text" value="<?php echo $patient_profile->state; ?>">
						</div>
					</div>
					<div class="col-sm-4">
						<div class="innerR">
							<span class="form_label">Country</span>
							<input id="country" type="text" name="country" class="form_text" value="<?php echo $patient_profile->country; ?>">
							<input type="hidden" id="countryId" name="countryId" value="<?php echo $patient_profile->country; ?>">
						</div>
					</div>
				</div>
				<!--
				<span class="form_label">Address 2</span>
				<input type="text" name="address2" class="form_text" value="">
				-->
				
				<br>
				<!--<h4 class="form_heading">Contact Details</h4>
				<span class="form_label">Phone 1</span>
				<input type="text" name="phone1" class="form_text" value="<?php //echo $patient_profile->num_phone1; ?>">

				<span class="form_label">Phone 2</span>
				<input type="text" name="phone2" class="form_text" value="<?php //echo $patient_profile->num_phone2; ?>">

				<span class="form_label">Skype</span>
				<input type="text" name="skype" class="form_text" value="<?php //echo $patient_profile->c_skype; ?>">

				<span class="form_label">Yahoo</span>
				<input type="text" name="yahoo" class="form_text" value="<?php //echo $patient_profile->c_yahoo; ?>">

				<span class="form_label">Google</span>
				<input type="text" name="google" class="form_text" value="<?php //echo $patient_profile->c_gtalk; ?>">
				-->
				<button type="submit" name="profSave" class="btn blue">
					<i class="fa fa-fw fa-check-square-o"></i>Save Changes
				</button>
			</div>
		<?php echo form_close(); ?>
	</div>
	
	<div class="medical-profile" id="medical-profile" style="display:none">
		<?php echo form_open('dashboard/patient/profile/updateMedical'); ?>
			<div class="form_div">
				<h4 class="form_heading">Medical Background</h4>
				
				<span class="form_label">Family History</span>
				<textarea name="history" class="form_textarea"><?php echo $health_profile->history; ?></textarea>
				
				<span class="form_label">Known Allergies</span>
				<textarea name="allergies" class="form_textarea"><?php echo $health_profile->allergies; ?></textarea>
				
				<span class="form_label">Other Known Medical Conditions</span>
				<textarea name="remarks" class="form_textarea"><?php echo $health_profile->remarks; ?></textarea>
				
				<button type="submit" name="profSave" class="btn blue">
					<i class="fa fa-fw fa-check-square-o"></i>Save Changes
				</button>
			</div>
		<?php echo form_close(); ?>
	</div>
	
</div>
