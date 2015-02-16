<div class="heading-box">
	<h4 class=" inner-all">Services</h4>
</div>
<div class="records inner-all">
	<form action="<?php echo base_url('dashboard/institution/services/saveRecordTypes'); ?>" method="POST">
		<span class="specify">Specify which medical records your institution can provide</span>
		<span class="small-desc">This will let patients from checkapp to book your services when they need medical exams recommended by their physicians</span>
		
		<?php foreach($allRecords as $allRecord){ ?>
		<div class="record">
			<label>
				<input type="checkbox" name="recordType[<?php echo $allRecord->id; ?>]" <?php if(in_array($allRecord->id, $yesRecords)){ echo 'CHECKED'; } ?> />
				<?php echo $allRecord->name; ?>
			</label>
		</div>
		<?php } ?>
		
		<div class="clearfix"></div>
		<div class="separator bottom"></div>
		<button type="submit" class="btn blue pull-right">
			<i class="fa fa-fw fa-check-square-o"></i>Save Changes
		</button>
		<div class="clearfix"></div>
	</form>
</div>


<div class="heading-box">
	<a class="pull-right btn white action service-add-btn">
		<i class="fa fa-plus"></i>
		<span>Add</span>
	</a>
	<h4 class="inner-all">Other</h4>
</div>

<div class="services">
	<ul class="service-list">
		<li class="service-add-new">
			<div class="col-md-10">
				<input type="text" class="col-md-12" />
			</div>
			<div class="col-md-2">
				<button type="submit" class="btn blue pull-right">
					<i class="fa fa-check-circle"></i>
				</button>
			</div>
			<div class="clearfix"></div>
		</li>
		<?php foreach($services as $service){ ?>
		<li id="service_<?php echo $service->id; ?>">
			<a class="pull-right action delete hover" data-id="<?php echo $service->id; ?>">
				<i class="fa fa-times"></i>
			</a>
			<h4><?php echo $service->name; ?></h4>
		</li>
		<?php } ?>
	</ul>
</div>

<div id="factory">
	<li class="service-item">
		<h4></h4>
	</li>
</div>