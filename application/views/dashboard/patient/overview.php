<div id="newsfeed">
	<div class="post-form">
		<form method="post">
			<div class="post-form-container">
				<textarea class="post-message pull-left" rows="1" placeholder="What's up?!"></textarea>
				<button title="post" type="submit" class="btn post-submit pull-right">
				  <i class="fa fa-pencil"></i>
				</button>
				<div class="btn-group post-attachment pull-right">
					<button title="attach" type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
						<i class="fa fa-paperclip"></i>
					</button>
					<ul class="dropdown-menu" role="menu">
						<li><a href="#"><i class="fa fa-camera"></i><span>Photo</span></a></li>
						<li><a href="#"><i class="fa fa-link"></i><i class="fa fa-camera"></i><span>Link</span></a></li>
						<li><a href="#"><i class="fa fa-video-camera"></i><span>Video</span></a></li>
					</ul>
				</div>
			</div>
		</form>
	</div>
	<div class="feed">
		<div class="post" post-type="text">
			<div class="post-avatar">
				<a href="#"><img src="https://checkapp-sg.s3.amazonaws.com/userpic/150/default.jpg" /></a>
			</div>
			<div class="post-content">
				<div class="post-user-action">
					<span class="post-time">30 mins ago</span>
					<a href="#">John Doe</a> posted:
				</div>
				<div class="post-message">Suscipit proin elementum cras imperdiet luctus nibh cras dui vestibulum sit nam ad odio iaculis id a tellus sed morbi consectetur imperdiet rhoncus ad eu in quam. Fames ultricies vestibulum vulputate hac magnis ligula nisi a mollis platea dignissim a pharetra euismod lacinia.</div>
			</div>
		</div>
		<div class="post" post-type="connection">
			<div class="post-avatar">
				<a href="#"><img src="https://checkapp-sg.s3.amazonaws.com/userpic/150/default.jpg" /></a>
			</div>
			<div class="post-content">
				<div class="post-user-action">
					<span class="post-time">2 hours ago</span>
					<a href="#">Juan dela Cruz</a> followed:
				</div>
				<div class="post-follow">
					<div class="post-avatar">
						<a href="#"><img src="https://checkapp-sg.s3.amazonaws.com/userpic/150/default.jpg" /></a>
					</div>
					<div class="post-user-followed">
						<button class="action">Unfollow</button>
						<a class="followed" href="#">Dr. Maria dela Cruz</a>
						<p class="practice">Pediatrics</p>
					</div>
				</div>
			</div>
		</div>
		<div class="post" post-type="connection">
			<div class="post-avatar">
				<a href="#"><img src="https://checkapp-sg.s3.amazonaws.com/userpic/150/default.jpg" /></a>
			</div>
			<div class="post-content">
				<div class="post-user-action">
					<span class="post-time">3 hours ago</span>
					<a href="#">Juan dela Cruz</a> followed:
				</div>
				<div class="post-follow"><!-- 
					<div class="post-avatar">
						<a href="#"><img src="/checkapp/assets2/_theme/img/institution.png" /></a>
					</div> -->
					<div class="post-user-followed">
						<button class="action">Follow</button>
						<a class="followed" href="#">Some Medical Center</a>
						<p class="description">Mandaluyong City</p>
					</div>
				</div>
			</div>
		</div>
		<div class="post" post-type="text">
			<div class="post-avatar">
				<a href="#"><img src="https://checkapp-sg.s3.amazonaws.com/userpic/150/default.jpg" /></a>
			</div>
			<div class="post-content">
				<div class="post-user-action">
					<span class="post-time">2 days ago</span>
					<a href="#">Jane Doe</a> posted:
				</div>
				<div class="post-message">Suscipit proin elementum cras imperdiet luctus nibh cras dui vestibulum sit nam ad odio iaculis id a tellus sed morbi consectetur imperdiet rhoncus ad eu in quam. <a href="http://www.google.com/">http://www.google.com</a></div>
			</div>
		</div>
	</div>
</div>

<div style="display:none" class="db_activities">
	<div class="previous col-sm-3">
		<div class="inner-all">
			<span class="title">Previous day</span>
			<b>Medication (3)</b>
		</div>
	</div>
	
	<div class="today col-sm-6">
		<div class="inner-all">
			<span class="title">Today</span>
			
			<div class="today_content">
				<div class="navi_prev col-sm-1">
					<i class="fa fa-chevron-left"></i>
				</div>
				<table class="col-sm-10">
					<tr class="red">
						<td>Medication</td>
						<td>:</td>
						<td>07:00 AM - 1 tablet paracetamol 500mg</td>
					</tr>
					<tr>
						<td>Appointment</td>
						<td>:</td>
						<td>11:00 AM - Dr. John Doe</td>
					</tr>
					<tr>
						<td>Medication</td>
						<td>:</td>
						<td>03:00 PM - 1 tablet paracetamol 500mg</td>
					</tr>
					<tr>
						<td>Medication</td>
						<td>:</td>
						<td>11:00 PM - 1 tablet paracetamol 500mg</td>
					</tr>
				</table>
				<div class="navi_next col-sm-1">
					<i class="fa fa-chevron-right"></i>
				</div>
			</div>
		</div>
		
		<span class="today_time">Friday, August 1, 2014 8:03 PM</span>
	</div>
	
	<div class="next col-sm-3">
		<div class="inner-all">
			<span class="title">Next day</span>
			<b>Medication (3)</b>
		</div>
	</div>

	<div class="clearfix"></div>
</div>
<!-- 
<div class="col-md-12 inner-all">
	<div class="highcharts bgp"></div>
</div> -->

<!--
<div class="inner-all">
	<img src="<?php echo base_url(); ?>assets2/_theme/img/dashboard.png">
</div>
-->

<!--
<div class="pull-right inner-all">
	<div class="edit_widget">
		<i class="edit fa fa-gear"></i>
		<div class="options" style="display:none;">
			<?php echo form_open('dashboard/patient/overview/saveWidgetList'); ?>
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


<!-- EXTRA PATIENT BOXES -->
<!--
<div class="blood_pressure col-md-4">
	<div class="inner-all">
		<div class="box">
			<span class="title">Blood Pressure</span>
			<span class="date">Jun. 15, 2014</span>
			<div class="value systolic">
				<i class="fa fa-tint"></i>
				<div class="label">
					<span>Systolic</span>
					<label>mmHg</label>
				</div>
				<span class="amount">148</span>
				<div class="clearfix"></div>
			</div>
			<div class="value diastolic">
				<i class="fa fa-tint"></i>
				<div class="label">
					<span>Diastolic</span>
					<label>mmHg</label>
				</div>
				<span class="amount">86</span>
				<div class="clearfix"></div>
			</div>
			<div class="value pulse">
				<i class="fa fa-heart"></i>
				<div class="label">
					<span>Pulse</span>
					<label>beats/min</label>
				</div>
				<span class="amount">68</span>
				<div class="clearfix"></div>
			</div>
			
		</div>
	</div>
</div>

-->
<div class="clearfix"></div>

<!-- PASS IDs TO SCRIPT -->
<script type="text/javascript">
	var enbledWidgets = <?php echo isset($enbaled_widget_ids) ? json_encode($enbaled_widget_ids) : []; ?>;
</script>
