<div class="heading-box">
	<h4 class="inner-all">Colleagues</h4>
</div>
<div class="colleague-box">
	<div class="tab-content">
		<?php if(count($colleagues) == 0) {?>
		<div class="inner-all colleague">
			<div class="media">
				<div class="media-body innerAll half">
					No Colleagues
				</div>
			</div>
		</div>
		<?php } else {?>
			<?php foreach($colleagues as $coll){ ?>
			<div class="inner-all colleague">
				<div class="media">
					<img width="50" style="visibility: visible;" src="<?php echo CA_Media::userpic($coll->profile_pic,'50'); ?>" class="thumb pull-left">
					<div class="media-body innerAll half">
						<p>
							<a href="<?php echo base_url('user/'.$coll->username); ?>">
								<h4><?php echo $coll->first_name.' '.$coll->last_name;?></h4>
							</a>
						</p>
					</div>
				</div>
			</div>
			<?php } ?>
		<?php } ?>
	</div>
</div>