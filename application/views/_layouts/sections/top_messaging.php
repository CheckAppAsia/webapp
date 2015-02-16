<?php
	$cut_ruri = explode("/",$ruri);
?>
<div class="messaging widget-head">
	<ul>
		<li class="<?php echo ($cut_ruri[2]=="compose")? "active":"" ?>">
			<a class="glyphicons user tab-open" href="<?php echo base_url('dashboard/messages/compose'); ?>">
				<i></i>
				<span>Compose</span>
			</a>
		</li>
		<li class="<?php echo ($cut_ruri[2]=="index")? "active":"" ?>">
			<a class="glyphicons user tab-open" href="<?php echo base_url('dashboard/messages'); ?>">
				<i></i>
				<span>Inbox</span>
			</a>
		</li>
	</ul>
</div>