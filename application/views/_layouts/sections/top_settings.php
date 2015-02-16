<?php $cut_ruri = explode("/",$ruri); ?>
<div class="messaging widget-head">
	<ul>
		<li class="<?php echo ($cut_ruri[1]=="settings" && $cut_ruri[2]=="index")?"active":""; ?>">
			<a class="glyphicons user tab-open" href="<?php echo base_url('dashboard/settings'); ?>">
				<i></i>
				<span>General</span>
			</a>
		</li>
		<li class="<?php echo ($cut_ruri[1]=="settings" && $cut_ruri[2]=="privacy")?"active":""; ?>">
			<a class="glyphicons eye_close tab-open" href="<?php echo base_url('dashboard/settings/privacy'); ?>">
				<i></i>
				<span>Privacy</span>
			</a>
		</li>
		<li class="<?php echo ($cut_ruri[1]=="settings" && $cut_ruri[2]=="security")?"active":""; ?>">
			<a class="glyphicons unlock tab-open" href="<?php echo base_url('dashboard/settings/security'); ?>">
				<i></i>
				<span>Security</span>
			</a>
		</li>
	</ul>
</div>