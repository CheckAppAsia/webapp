<div class="appoint-tabs-content">
	<div class="appoint-monthly">
		<div class="heading-box">
			<h4 class=" inner-all">Monthly View</h4>
		</div>
		<table class="table-calendar" cellspacing="0" cellpadding="0" border="0">
			<thead>
				<tr class="cal-navi">
					<td class="prev">&laquo;</td>
					<td colspan="5">
						<span class="month" data-month="<?php echo date("n") ?>"><?php echo date("F") ?></span>
						<span class="year" data-year="<?php echo date("Y") ?>"><?php echo date("Y") ?></span>
					</td>
					<td class="next">&raquo;</td>
				</tr>
				<tr class="days-text">
					<td>Sun</td>
					<td>Mon</td>
					<td>Tue</td>
					<td>Wed</td>
					<td>Thu</td>
					<td>Fri</td>
					<td>Sat</td>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td></td>
					<td class="day-off"></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td><span class="days-num">1</span></td>
				</tr>
				<tr>
					<td><span class="days-num">2</span></td>
					<td class="day-off"><span class="days-num">3</span></td>
					<td><span class="days-num">4</span></td>
					<td><span class="days-num">5</span></td>
					<td class="has-apt"><span class="days-num">6</span></td>
					<td class="has-apt"><span class="days-num">7</span></td>
					<td><span class="days-num">8</span></td>
				</tr>
				<tr>
					<td><span class="days-num">9</span></td>
					<td class="day-off"><span class="days-num">10</span></td>
					<td><span class="days-num">11</span></td>
					<td><span class="days-num">12</span></td>
					<td><span class="days-num">13</span></td>
					<td><span class="days-num">14</span></td>
					<td class="has-apt"><span class="days-num">15</span></td>
				</tr>
				<tr>
					<td><span class="days-num">16</span></td>
					<td class="day-off"><span class="days-num">17</span></td>
					<td><span class="days-num">18</span></td>
					<td><span class="days-num">19</span></td>
					<td class="has-apt"><span class="days-num">20</span></td>
					<td><span class="days-num">21</span></td>
					<td><span class="days-num">22</span></td>
				</tr>
				<tr>
					<td><span class="days-num">23</span></td>
					<td class="day-off"><span class="days-num">24</span></td>
					<td><span class="days-num">25</span></td>
					<td><span class="days-num">26</span></td>
					<td><span class="days-num">27</span></td>
					<td><span class="days-num">28</span></td>
					<td><span class="days-num">29</span></td>
				</tr>
				<tr>
					<td><span class="days-num">30</span></td>
					<td class="day-off"></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
				</tr>
			</tbody>
		</table>
		<div class="legends pull-right">
			<div class="legend">
				<span class="indicator day-off"></span>
				<span>Day off</span>
			</div>
			<div class="legend">
				<span class="indicator has-appoint"></span>
				<span>Has Appointment</span>
			</div>
		</div>
		
		<div class="monthly-statistics col-sm-6" style="display:none">
			<div class="top main">
				<span class="amount">26</span>
				<label>Total booked for this month</label>
			</div>
			<div class="bottom main">
				<div class="accepted sub col-sm-6">
					<span class="amount">21</span>
					<label>Accepted</label>
				</div>
				<div class="declined sub col-sm-6">
					<span class="amount">5</span>
					<label>Declined</label>
				</div>
			</div>
		</div>
		
	</div>
	
</div>
<script type="text/javascript">
	var onCalendar = true;
	var dateLink = "<?php echo base_url('dashboard/physician/appointments/day/'); ?>";
	var photoLink = "<?php echo base_url('media/userpic/'); ?>";
	var phpDateToday = "<?php echo date("j-n-Y"); ?>";
</script>