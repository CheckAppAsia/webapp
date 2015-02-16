<div class="view-only inner-all">
	<h4>Professional Profile</h4>
	<?php
		$med = json_decode($medprofile['profile']);
	?>
	<div class="separator bottom"></div>
	<div class="col-sm-12 info">
		<label class="col-sm-3">Specialization</label>
		<span class="col-sm-9"><?= $med->specializations ?></span>
		<div class="clearfix"></div>
	</div>
	<div class="separator bottom"></div>
	<div class="col-sm-12 info">
		<label class="col-sm-3">License No.</label>
		<span class="col-sm-9"><?= $med->license_no ?></span>
		<div class="clearfix"></div>
	</div>
	<div class="separator bottom"></div>
	<div class="col-sm-12 info">
		<label class="col-sm-3">Short Bio</label>
		<p class="col-sm-9"><?= $med->about ?></p>
		<div class="clearfix"></div>
	</div>
</div>