<div class="overview_profile">
	<div class="inner-all">
		
		<div class="op_avatar pull-left col-sm-3">
			<img src="<?php echo CA_Media::userpic($currentUser['profile_pic'],'150'); ?>" />
		</div>
		
		<div class="op_basic pull-left col-sm-9">
			<h1 class="fname"><?php echo $patient_profile->title; ?> <?php echo $patient_profile->first_name." ".$patient_profile->middle_name." ".$patient_profile->last_name ?></h1>
			
			<span class="address">
				<i class="fa fa-map-marker"></i>
				<?php echo $patient_profile->address; ?>
			</span>
			
			<span class="birthday">
				<i class="fa fa-gift"></i>
				<?php echo date("F d, Y", strtotime($patient_profile->birthdate)); ?>
			</span>
			
			<?php if($patient_profile->gender!=0){ $gender=($patient_profile->gender==1)?"male":"female"; ?>
			<span class="gender">
				<i class="fa fa-<?php echo $gender?>"></i>
				<?php echo $gender ?>
			</span>
			<?php } ?>
			
<!--			
			<hr>
			<span class="pull-left col-sm-6">
				<i class="fa fa-phone"></i>
				<?php //echo $patient_profile->num_phone1; ?>
			</span>
			<span class="pull-left col-sm-6">
				<i class="fa fa-phone"></i>
				<?php //echo $patient_profile->num_phone2; ?>
			</span>
			<span class="pull-left col-sm-6">
				<i class="fa fa-skype"></i>
				<?php //echo $patient_profile->c_skype; ?>
			</span>
			<span class="pull-left col-sm-6">
				<i class="fa fa-yahoo">Y</i>
				<?php //echo $patient_profile->c_yahoo; ?>
			</span>
			<span class="pull-left col-sm-6">
				<i class="fa fa-google-plus"></i>
				<?php //echo $patient_profile->c_gtalk; ?>
			</span>
-->
		</div>
		
		<div class="clearfix"></div>



		<?php if( !empty($health_profile->history) || !empty($health_profile->allergies) || !empty($health_profile->remarks) ) { ?>
		<hr/>
		<div class="op_medinfo col-md-12">
			<h2 class="op_medinfo_header">Medical Information</h2>
			<?php if(!empty($health_profile->history)) {?>
			<h3 class="op_medinfo_subheader">Family History</h3>
			<div class="op_medinfo_content"><?php echo nl2br($health_profile->history); ?></div>
			<?php } ?>
			<?php if(!empty($health_profile->allergies)) {?>
			<h3 class="op_medinfo_subheader">Known Allergies</h3>
			<div class="op_medinfo_content"><?php echo nl2br($health_profile->allergies); ?></div>
			<?php } ?>
			<?php if(!empty($health_profile->remarks)) {?>
			<h3 class="op_medinfo_subheader">Other Known Medical Conditions</h3>
			<div class="op_medinfo_content"><?php echo nl2br($health_profile->remarks); ?></div>
			<?php } ?>
		</div>
		<?php } ?>
		<!--
		<div class="op_contacts">
			<div class="pull-left col-sm-6">
				<i class="fa fa-phone"></i>
				<?php echo $patient_profile->num_phone1; ?>
			</div>
			<div class="pull-left col-sm-6">
				<i class="fa fa-phone"></i>
				<?php echo $patient_profile->num_phone2; ?>
			</div>
			<div class="pull-left col-sm-6">
				<i class="fa fa-phone"></i>
				<?php echo $patient_profile->c_skype; ?>
			</div>
			<div class="pull-left col-sm-6">
				<i class="fa fa-phone"></i>
				<?php echo $patient_profile->c_yahoo; ?>
			</div>
			<div class="pull-left col-sm-6">
				<i class="fa fa-phone"></i>
				<?php echo $patient_profile->c_gtalk; ?>
			</div>
		</div>
		-->
		
		<div class="clearfix"></div>
	</div>
</div>
