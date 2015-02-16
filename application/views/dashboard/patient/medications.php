<div class="heading-box">
	<h4 class=" inner-all">Medications</h4>
</div>
<div class="medications">
	<?php foreach($medications as $medication){ ?>
	<ul class="med">
		<li>
			<div class="label col-sm-3">Medicine</div>
			<div class="value col-sm-9"><?php echo $medication->medicine; ?></div>
			<div class="clearfix"></div>
		</li>
		
		<li>
			<div class="label col-sm-3">Prescribed by</div>
			<div class="value col-sm-9"><a href="<?php echo base_url('user/'.$medication->username); ?>"><?php echo $medication->title; ?> <?php echo $medication->first_name; ?> <?php echo $medication->last_name; ?></a></div>
			<div class="clearfix"></div>
		</li>
		
		<?php if($medication->amount_left>0){ ?><li>
			<div class="label col-sm-3">Amount left</div>
			<div class="value col-sm-9"><?php echo $medication->amount_left; ?></div>
			<div class="clearfix"></div>
		</li><?php } ?>
		
		<?php if($medication->interval_hr>0){ ?><li>
			<div class="label col-sm-3">Interval (hours)</div>
			<div class="value col-sm-9"><?php echo $medication->interval_hr; ?></div>
			<div class="clearfix"></div>
		</li><?php } ?>
		
		<?php if($medication->start_time != '0000-00-00 00:00:00'){ ?><li>
			<div class="label col-sm-3">Began taking on</div>
			<div class="value col-sm-9"><?php echo date('M j, Y h:i A', strtotime($medication->start_time)); ?></div>
			<div class="clearfix"></div>
		</li><?php } ?>
		
		<?php if($medication->notes!=''){ ?><li>
			<div class="label col-sm-3">Physician's Notes</div>
			<div class="value col-sm-9"><?php echo $medication->notes; ?></div>
			<div class="clearfix"></div>
		</li><?php } ?>
	</ul>
	<?php } ?>
	<div class="clearfix"></div>
</div>