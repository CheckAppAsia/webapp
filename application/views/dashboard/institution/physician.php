<?php if(count($prequests)>0){ ?>
	<div class="heading-box">
		<h4 class="inner-all">Physician Requests to be listed under this Institution</h4>
	</div>
	<div class="prequest-list">
		<?php //debug($prequests); ?>
		<?php foreach($prequests as $physician){ ?>
		<div class="media inner-all odd">
			<?php if($physician->profile_pic!=''){ ?>
				<img width="100" style="visibility: visible;" src="<?php echo base_url().'media/userpic/'.$physician->profile_pic; ?>" class="thumb pull-left">
			<?php }else{ ?>
				<img width="100" style="visibility: visible;" src="<?php echo base_url(); ?>assets2/img/system/blank_profile.jpg" class="thumb pull-left">
			<?php } ?>
			<div class="media-body">
				<h4 class=""><?php echo $physician->title.''.$physician->first_name.''.$physician->last_name.''; ?></h4>
				<p><?php echo $physician->position; ?></p>
				
				<a href="">APPROVE</a>
				<br /><br />
				<a href="">REJECT</a>
			</div>
		</div>
		<?php } ?>
	</div>
<?php } ?>

<div class="heading-box">
	<h4 class="inner-all">Physicians under this Institution</h4>
</div>
<div class="physician-list">
	<?php //debug($physicians); ?>
	<?php if(count($physicians)>0){ ?>
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
				
				<a href="">REMOVE</a>
			</div>
		</div>
		<?php } ?>
	<?php }else{ ?>
		<div class="inner-all">You have no physicians listed yet</div>
	<?php } ?>
</div>