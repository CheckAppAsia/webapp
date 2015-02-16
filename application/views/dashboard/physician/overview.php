<div class="db_activities">
	<div class="previous col-sm-3">
		<div class="inner-all">
			<span class="title">Previous day</span>
			<?php 
			//check yesterday
			if (isset($appointments['yesterday']) && count($appointments['yesterday'])>0)  :
				ksort($appointments['yesterday']);
				foreach ($appointments['yesterday'] AS $y => $yv) :
					echo miltime($y).' :: '.$yv->profile_title.''.$yv->profile_first_name.'  '.$yv->profile_last_name; 
				endforeach;
			endif;
			?>
		</div>
	</div>
	
	<div class="today col-sm-6">
		<div class="inner-all">
			<span class="title">Today's Appointments</span> 
					<?php 
					//check yesterday
					if (isset($appointments['today']) && count($appointments['today'])>0) :
						 ksort($appointments['today']);  

						foreach ($appointments['today'] AS $y => $yv) : 
						?>
							<form action="<?php echo base_url('dashboard/physician/appointments/view'); ?>" method="post">
							<?php 
							echo miltime($y).' :: '.$yv->profile_title.''.$yv->profile_first_name.'  '.$yv->profile_last_name; ?>
								<input type="hidden" name="appointment_id" value="<?php echo $yv->id; ?>">						
								<input type="hidden" name="member_id" value="<?php echo $yv->member_id; ?>">
								<button type="submit">Start Consultation</button>
							</form>
						<?php
						endforeach;
					endif;
					?> 
		</div>
		<div class="today_time"><?php echo date("l, F d, Y");?></div>
	</div>
	
	<div class="next col-sm-3">
		<div class="inner-all">
			<span class="title">Tomorrow's Appointments</span> 
					<?php 
					//check yesterday
					if (isset($appointments['tomorrow']) && count($appointments['tomorrow'])>0) :
						 ksort($appointments['tomorrow']);  

						foreach ($appointments['tomorrow'] AS $y => $yv) :
							echo miltime($y).' :: '.$yv->profile_title.''.$yv->profile_first_name.'  '.$yv->profile_last_name; 
						?> 
						<?php
						endforeach;
					endif;
					?> 
		</div>
	</div>

	<div class="clearfix"></div>
</div>
<!-- 
<div class="col-md-12 inner-all">
	<div class="highcharts bgp"></div>
</div> -->


<!-- 
<div class="pull-right inner-all">
	<div class="edit_widget">
		<i class="edit fa fa-gear"></i>
		<div class="options" style="display:none;">
			<?php echo form_open('dashboard/physician/overview/saveWidgetList'); ?>
				<ul>
					<?php foreach($allWidgets as $widgetType){ ?>
						<li><label>
							<input type="checkbox" name="widgets[]" value="<?php echo $widgetType->id; ?>" <?php echo (in_array($widgetType->id, $enbaled_widget_ids))?'CHECKED':''; ?> />
							<?php echo $widgetType->name; ?>
						</label></li>
					<?php } ?>
					<li>
						<button class="btn red">Save</button>
					</li>
				</ul>
			<?php echo form_close(); ?>
		</div>
	</div>
</div>
<div class="clearfix"></div>
 -->

<!-- BOX WIDGETS -->
<!--
<?php foreach($userWidgets as $widget){ ?>
	<div id="widget_<?php echo $widget->widget_id; ?>" class="simple_data col-md-3">
		<div class="data_icon">
			<i class="fa"></i>
		</div>
		<div class="data_text">
			<span class="data_label data_amount_1"><?php echo $widget->name; ?></span>
			<span class="data_amount data_amount_2">&nbsp;</span>
			<span class="data_label data_widget_name"><?php echo $widget->name; ?></span>
		</div>
	</div>
<?php } ?>
<div class="clear"></div>
-->

<!-- STATIC CHARTS -->
<!--
<div class="col-md-8 inner-all">
	<div class="highcharts line_label"></div>
</div>

<div class="col-md-4 inner-all">
	<div class="highcharts bar_label"></div>
</div>
-->

<div class="clear"></div>

<!-- PASS IDs TO SCRIPT -->
<script type="text/javascript">
	var enbledWidgets = <?php echo isset($enbaled_widget_ids) ? json_encode($enbaled_widget_ids) : '[]'; ?>;

	// $(".start_consultation").on('click', function(){
 //    alert('c');
	// 	});

</script>
