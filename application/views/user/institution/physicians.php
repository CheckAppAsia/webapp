<div class="heading-box">
	<h4 class="inner-all">Physician List</h4>
</div>

<div class="physician-list">
	<?php foreach($physicians as $physician){ ?>
	<div class="media inner-all odd">
		<?php if($physician->profile_pic!=''){ ?>
			<img width="100" style="visibility: visible;" src="<?php echo base_url().'media/userpic/'.$physician->profile_pic; ?>" class="thumb pull-left">
		<?php }else{ ?>
			<img width="100" style="visibility: visible;" src="<?php echo base_url(); ?>assets2/img/system/blank_profile.jpg" class="thumb pull-left">
		<?php } ?>
		<div class="media-body">
			<h4 class=""><?php echo $physician->title.''.$physician->first_name.''.$physician->last_name.''; ?></h4>
			<p><?php echo $physician->position; ?></p>
		</div>
	</div>
	<?php } ?>
</div>