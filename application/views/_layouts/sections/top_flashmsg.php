<?php if($data['alert_class']!=''){ ?>
	<div class="inner-all alert-msg alert-<?php echo $data['alert_class']; ?>">
		<?php echo $data['alert_msg']; ?>
	</div>
	<div class="separator bottom alert-separator"></div>
<?php } ?>