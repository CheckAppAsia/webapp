<div class="widget-head">
	<ul >
		<li class="active">
			<a class="glyphicons user tab-open" data-tab-id="personal-profile" >
				<i></i>
				<span>Personal Profile</span>
			</a>
		</li>
		<li>
			<a class="glyphicons nameplate tab-open" data-tab-id="medical-profile" >
				<i></i>
				<span>Professional Profile</span>
			</a>
		</li>
		<!--
		<li>
			<a class="glyphicons nameplate tab-open" data-tab-id="medical-school" >
				<i></i>
				<span>Medical School</span>
			</a>
		</li>
		-->
		<li>
			<a class="glyphicons ok_2 tab-open" data-tab-id="verifications" >
				<i></i>
				<span>Physician Verification</span>
			</a>
		</li>
	</ul>
	<div class="clearfix"></div>
</div>
<div class="col-separator-h"></div>
<div class="tab-content">
	
	<!-- [TAB] PERSONAL PROFILE -->
	<div class="personal-profile active" id="personal-profile">
		<?php echo form_open('dashboard/profile/updatePersonal'); ?>
		<div class="form_div">
			<input type="hidden" name="profileType" value="physician">
			<h4 class="form_heading">Basic Information</h4>
			
			<!-- Title -->
			<span class="form_label">Title</span>
			<select name="title" class="form_select" style="width:100px">
			<?php  foreach(array("Mr.", "Ms.", "Mrs.", "Lady", "Sir", "Dr.", "Dra.", "Prof.") as $value){ ?>
				<option value="<?php echo $value; ?>" <?php echo ($value == $profile->title) ?  "selected='selected'" : ""; ?>> <?php echo $value; ?></option>
			<?php } ?>
			</select>
			
			<!-- First Name -->
			<span class="form_label">First Name</span>
			<input type="text" name="first_name" value="<?php echo $profile->first_name; ?>" class="form_text">
			
			<!-- Middle Name -->
			<span class="form_label">Middle Name</span>
			<input type="text" name="middle_name"  value="<?php echo $profile->middle_name; ?>" class="form_text" >

			<!-- Last Name -->
			<span class="form_label">Last Name</span>
			<input type="text" name="last_name"  value="<?php echo $profile->last_name; ?>" class="form_text" >
			
			<!-- Gender -->
			<span class="form_label">Gender</span>
			<label class="gender">
				<input type="radio" name="gender" value="1" <?php echo ($profile->gender==1) ? "checked":""?> />
				Male
			</label>
			<label class="gender">
				<input type="radio" name="gender" value="2" <?php echo ($profile->gender==2) ? "checked":""?> />
				Female
			</label>
			
			<!-- BIRTHDAY -->
			<span class="form_label bday">Birthday</span>
			<div class="form_group">
				<input type="hidden" class="date_now" data-year="<?php echo date("Y") ?>" data-month="<?php echo date("m") ?>" data-day="<?php echo date("d") ?>" />
				<?php
					$str_month = date("m", strtotime($profile->birthdate));
					$str_day = date("d", strtotime($profile->birthdate));
					$str_year = date("Y", strtotime($profile->birthdate));
				?>
				
				<!-- Month -->
				<div class="col-sm-4">
					<div class="innerR">
						<select class="form_select month" name="month">
							<option value="01">Month</option>
							<?php
							$calinfo = cal_info(0);
							foreach($calinfo['months'] as $index=>$month){
								$index = str_pad($index, 2, '0', STR_PAD_LEFT);
							?>
								<option value="<?php echo $index; ?>" <?php echo ($str_month==$index)?"SELECTED":""; ?>><?php echo $month; ?></option>
							<?php } ?>
						</select>
					</div>
				</div>
				
				<!-- Day -->
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
				
				<!-- Year -->
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
			
			<!-- Address -->
			<span class="form_label">Street Address</span>
			<input type="text" name="address" class="form_text" value="<?php echo $profile->address; ?>">
			<div class="form_group">
				<div class="col-sm-4">
					<div class="innerR">
						<span class="form_label">City</span>
						<input type="text" name="city" class="form_text" value="<?php echo $profile->location->city; ?>">
					</div>
				</div>
				<div class="col-sm-4">
					<div class="innerR">
						<span class="form_label">State/Provice</span>
						<input type="text" name="state" class="form_text" value="<?php echo $profile->location->state; ?>">
					</div>
				</div>
				<div class="col-sm-4">
					<div class="innerR">
						<span class="form_label">Country</span>
						<select name="countryId">
							<?php foreach($allCountries as $country){ ?>
								<option value="<?php echo $country->id; ?>" <?php echo ($country->id==$profile->location->country_id)?'SELECTED':''; ?>>
									<?php echo $country->name ?>
								</option>
							<?php } ?>
						</select>
						<!-- <input type="text" id="country" name="country" class="form_text" value="<?php echo $profile->location->country; ?>">
						<input type="hidden" id="countryId" name="countryId" value="<?php echo $profile->location->country_id; ?>"> -->
					</div>
				</div>
			</div>
			
			<!-- Language -->
			<span class="form_label">Spoken Language</span>
			<input type="text" name="language"  value="<?php echo $profile->language; ?>" class="form_text" >
			
			<!-- Ethnicity -->
			<span class="form_label">Ethnicity</span>
			<input type="text" name="ethnicity"  value="<?php echo $profile->ethnicity; ?>" class="form_text" >
			
			<!-- Race -->
			<span class="form_label">Race</span>
			<input type="text" name="race"  value="<?php echo $profile->race; ?>" class="form_text" >
			
			<!-- Religion -->
			<span class="form_label">Religion</span>
			<input type="text" name="religion"  value="<?php echo $profile->religion; ?>" class="form_text" >
			
			<!-- Marital -->
			<span class="form_label">Marital Status</span>
			<label class="gender">
				<input type="radio" name="marital" value="0" <?php echo ($profile->marital==0) ? "checked":""?> /> Unspecified
			</label>
			<label class="gender">
				<input type="radio" name="marital" value="1" <?php echo ($profile->marital==1) ? "checked":""?> /> Single
			</label>
			<label class="gender">
				<input type="radio" name="marital" value="2" <?php echo ($profile->marital==2) ? "checked":""?> /> Married
			</label>
			<div class="clear"></div>
			
			<!-- Save Changes Button -->
			<button type="submit" name="profSave" class="btn blue">
				<i class="fa fa-fw fa-check-square-o"></i>Save Changes
			</button>
		</div>
		<?php echo form_close(); ?>
	</div>
	
	
	<!-- [TAB] PROFESSIONAL PROFILE -->
	<div class="medical-profile" id="medical-profile" style="display:none">
		<div class="form_div">
			
			<!-- PROFESSIONAL INFORMATION
			-------------------------------------------------->
			<h4 class="form_heading">Professional Information</h4>
			<input type="hidden" name="user_id" value="<?php echo $profile->id; ?>">
			
			
			<!-- LICENSE NUMBERS  -->
			<span class="form_label">License numbers</span>
			<?php echo form_open('dashboard/physician/profile/addLicenseNumber'); ?>
				<div class="form_group">
					<div class="col-sm-4">
						Type
					</div>
					<div class="col-sm-4">
						Number
					</div>
					<div class="col-sm-4">
						Remarks
					</div>
				</div>
				<?php foreach($license_numbers as $license_number){ ?>
				<div class="form_group">
					<input type="hidden" name="license[id][]" value="<?php echo $license_number->id; ?>" />
					<div class="col-sm-4">
						<div class="innerR">
							<input type="text" name="license[type][]" value="<?php echo $license_number->type; ?>" class="form_text" />
						</div>
					</div>
					<div class="col-sm-4">
						<div class="innerR">
							<input type="text" name="license[number][]" value="<?php echo $license_number->number; ?>" class="form_text" />
						</div>
					</div>
					<div class="col-sm-4">
						<div class="innerR">
							<input type="text" name="license[remarks][]" value="<?php echo $license_number->remarks; ?>" class="form_text" />
						</div>
					</div>
				</div>
				<?php } ?>
				<div class="form_group">
					<input type="hidden" name="license[id][]" value="0" />
					<div class="col-sm-4">
						<div class="innerR">
							<input type="text" name="license[type][]" value="" class="form_text" />
						</div>
					</div>
					<div class="col-sm-4">
						<div class="innerR">
							<input type="text" name="license[number][]" value="" class="form_text" />
						</div>
					</div>
					<div class="col-sm-4">
						<div class="innerR">
							<input type="text" name="license[remarks][]" value="" class="form_text" />
						</div>
					</div>
				</div>
				<button class="btn blue" name="addSpecialization" id="addSpecialization" type="submit">
					<i class="fa fa-fw fa-check-square-o"></i>Add License Number
				</button>
			<?php echo form_close(); ?>
			<br /><br /><br />
			
			
			<!-- SPECIALIZATION  -->
			<span class="form_label">Specialization</span>
			<input type="text" id="specialization" name="specialization" class="form_text spzl" >
			<input type="hidden" id="specializationId" name="specializationId">
			<div id="specializationList">
				<?php   
				if (is_array($my_specializations)) :
				foreach($my_specializations as $specialization) : ?>
				
				<div style="border: #eee solid 1px; min-width:20px; margin: 3px; float: left; padding: 5px;">
				<?php echo $specialization->name; ?><i class="fa fa-times pull-right"></i></div>
				
				<?php endforeach;
				endif; ?>
			</div>
			<div style="clear: both;"></div>
			<button class="btn blue addSpecialization" name="addSpecialization" id="addSpecialization"   type="button">
				<i class="fa fa-fw fa-check-square-o"></i>Add Specialization
			</button>
			<br /><br /><br />
			
			
			<!-- AFFILIATION -->
			<span class="form_label">Affiliation</span>
			<input type="text" id="affiliation" name="affiliation" class="form_text" >
			<input type="hidden" id="affiliationId" name="affiliationId">
			<div id="affiliationList" style="padding:5px 0px; font-size: 11px;">
				<?php foreach($my_affiliations as $affiliation){ ?>
					<div style="border:#eee solid 1px; min-width:20px; margin:3px; float:left; padding:5px;">
					<?php echo $affiliation->affiliation; ?><i class="fa fa-times pull-right"></i></div>
				<?php } ?>
			</div>
			<div style="clear: both;"></div>
			<button class="btn blue" name="addAffiliation" id="addAffiliation" type="button">
				<i class="fa fa-fw fa-check-square-o"></i>Add Affiliation
			</button>
			<br /><br /><br />
			
			
			<!-- EDUCATIONAL BACKGROUND
			-------------------------------------------------->
			<h4 class="form_heading">Educational Background
				<div class="add-form btn white pull-right">
					<i class="fa fa-plus"></i>
					<span id="showEducForm">Add Education</span>
				</div>
			</h4>
			
			<!-- ADD SCHOOL -->
			<?php echo form_open('dashboard/physician/profile/addSchool', array("id" => "addEducForm")); ?>
			<div style="display:none" id="physProfEducForm">
				<span class="form_label">Course</span>
				<input type="text" name="course" class="form_text">
				<span class="form_label">University / Medical School</span>
				<input type="text" id="schoolName" name="school_name" class="form_text">
				<input type="hidden" id="schoolNameId" class="form_text">
				
				<div class="form_group">
					<div class="col-sm-4">
						<div class="innerR">
							<span class="form_label">City</span>
							<input type="text" name="city" class="form_text">
						</div>
					</div>
					<div class="col-sm-4">
						<div class="innerR">
							<span class="form_label">State/Provice</span>
							<input type="text" name="state" class="form_text">
						</div>
					</div>
					<div class="col-sm-4">
						<div class="innerR">
							<span class="form_label">Country</span>
							<input type="text" id="schoolCountry" name="country" class="form_text">
							<input type="hidden" id="countryId" name="country_id" value="">
						</div>
					</div>
				</div>
			
				<span class="form_label">Year Graduated</span>
				<input type="text" name="year_end"  maxlength="4" class="form_text">
				<!-- <span class="form_label">Honors Received</span>
				<input type="text" id="honor" name="honor" class="form_text"> -->
				<span class="form_label">
					<button type="submit" name="addEduc" class="btn blue">
						<i class="fa fa-fw fa-check-square-o"></i>Save Education
					</button>
				</span>
			</div>
			<?php echo form_close(); ?>
			
			<br><br>
			<!-- SCHOOL LIST -->
			<div id="schoolListing">
				<span class="form_label">Medical School List</span>
				<!-- <h4 class="form_heading">School List</h4> -->
				<?php foreach($med_schools as $school){ ?>
				<div class="schoolInfo">
					<div class="schoolDetails">
						<div class="schoolCourse"><h3><?php echo $school->course; ?>
							<span style="float:right;" class="editSchool"><a href="#">Edit</a></span>
						</h3></div>
						<div class="schoolName"><?php echo $school->school_name; ?></div>
						<div class="schoolYear"><?php echo $school->year_end; ?></div>
						<div>Honors Received</div>
						<div class="physicianHonors">
							
						</div>
					</div>	
					<div style="display:none" class="editSchoolForm">
						<span class="form_label">Course</span>
						<input type="text" name="course" class="form_text" value="<?php echo $school->course; ?>">
						<span class="form_label">University / Medical School</span>
						<input type="text" id="schoolName" name="school_name" class="form_text" value="<?php echo $school->school_name; ?>">
						
						<div class="form_group">
							<div class="col-sm-4">
								<div class="innerR">
									<span class="form_label">City</span>
									<input type="text" name="city" class="form_text">
								</div>
							</div>
							<div class="col-sm-4">
								<div class="innerR">
									<span class="form_label">State/Provice</span>
									<input type="text" name="state" class="form_text">
								</div>
							</div>
							<div class="col-sm-4">
								<div class="innerR">
									<span class="form_label">Country</span>
									<input type="text" id="schoolCountry" name="country" class="form_text">
									<input type="hidden" id="countryId" name="country_id" value="">
								</div>
							</div>
						</div>
						
						<span class="form_label">Year Graduated</span>
						<input type="text" name="year_end" class="form_text" value="<?php echo $school->year_end; ?>">
						<span class="form_label">Add Honors Received</span>
						<input type="text" name="honor" class="form_text"">
						<input type="hidden" class="school_id" class="form_text" value="<?php echo $school->id; ?>">
						<div id="honor_list">
						</div>
						<span class="form_label">
							<button class="btn blue" name="addHonor" id="addHonor" type="button">
							<i class="fa fa-fw fa-check-square-o"></i>Add Honor
							</button>
						</span>
						<span class="form_label">
							<button type="submit" name="editEduc" class="btn blue">
								<i class="fa fa-fw fa-check-square-o"></i>Save Education
							</button>
							<button class="btn blue cancelEduc">
								<i class="fa fa-fw fa-check-square-o"></i>Cancel
							</button>
						</span>
					</div>
				</div>
				<?php } ?>
			</div>
		</div>
	</div>
	
	
	<!-- [TAB] PHYSICIAN VERIFICATION -->
	<div class="verifications" id="verifications" style="display:none">
		<?php echo form_open_multipart('dashboard/physician/profile/uploadDocument', array('id'=>'MyUploadForm')); ?>
		<div class="form_div">
			<h4 class="form_heading">Verification Documents</h4>
			<input name="phy_document" id="phy_document" type="file" />
			<input type="submit"  id="submit-btn" class="submit-btn" value="Upload" />
			<img src="<?php echo $this->config->base_url(); ?>assets2/img/ajax-loader.gif" id="loading-img" style="display:none;" alt="Please Wait"/>
			
			<?php foreach($data['physician_documents'] as $doc){ ?>
				<div style="padding:10px">
					Status: <?php if($doc['status']==1){ echo 'verified'; }else{ echo 'not yet verified'; } ?><br/>
					<img src="<?php echo CA_Media::phy_doc($doc['file'],'thumb'); ?>" /> 
				</div>
			<?php } ?>
		</div>
		<?php echo form_close(); ?>
	</div>
	
	
</div>