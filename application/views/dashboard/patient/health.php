<div class="medical_box col-sm-12">
	<?php $ctr=1; foreach($healths as $health){ ?>
	<div class="<?php echo ($ctr%3!=0)?'bdr_right ':''; ?>bdr_bottom margin-none col-sm-4" id="health_box_<?php echo $health->health_id; ?>">
		<div class="blood_type">
			<h4><input type="text" class="health_value" data-health_id="<?php echo $health->health_id; ?>" value="<?php echo $health->value; ?>" /></h4>
			<label><?php echo $health->name; ?></label><br />
			<span class="health_updated"><?php
				if($health->updated!="0000-00-00 00:00:00"){
					echo date("M j, Y H:i A", strtotime($health->updated));
				}else{
					echo date("M j, Y H:i A", strtotime($health->created));
				}
			?></span>
		</div>
	</div>
	<?php $ctr++; } ?>
	
	<div class="clearfix"></div>
	<div class="margin-none col-sm-12">
		<div class="allergies">
			<span>Family History</span>
			<p><?php echo $profile->family_history; ?></p>
			<div class="separator bottom"></div>
			
			<span>Known Allergies</span>
			<p><?php echo $profile->known_allergies; ?></p>
			<div class="separator bottom"></div>
			
			<span>Other Known Medical Conditions</span>
			<p><?php echo $profile->other; ?></p>
		</div>
	</div>
</div>