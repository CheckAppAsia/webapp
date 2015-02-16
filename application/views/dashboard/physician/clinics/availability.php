<div class="availability_box">
	<div class="inner-all">
		
		<span class="form_label">Select Clinic:</span>
		<select class="form_select">
			<option>Makati Medical Center</option>
			<option>St. Lukes Medical Center</option>
		</select>
		
		<div class="inner-all">
			<div class="add_avail_box">
				<span class="form_label">Select Date:</span>
				<ul class="av_dates">
					<li><label><input type="checkbox" />Monday</label></li>
					<li><label><input type="checkbox" />Tuesday</label></li>
					<li><label><input type="checkbox" />Wednesday</label></li>
					<li><label><input type="checkbox" />Thursday</label></li>
					<li><label><input type="checkbox" />Friday</label></li>
					<li><label><input type="checkbox" />Saturday</label></li>
					<li><label><input type="checkbox" />Sunday</label></li>
					<div class="clearfix"></div>
				</ul>
				<div class="clearfix"></div>
				
				<label for="av_time">Select Time:</label>
				<input type="text" id="av_time" readonly />
				<div class="inner-all">
					<div id="slider-range"></div>
				</div>
				
				<button class="btn blue"><i class="fa fa-plus"></i> Add</button>
			</div>
		</div>
		
		
		<table class="simple_table">
			<thead>
				<tr>
					<td><span>Dates</span></td>
					<td><span>Time</span></td>
					<td></td>
				</tr>
			</thead>
			<tbody>
				<tr class="odd">
					<td><span>Mon, Tue, Wed, Thu, Fri</span></td>
					<td><span>8:00am - 12:00pm</span></td>
					<td align=center><button class="btn red"><i class="fa fa-times"></i> Delete</button></td>
				</tr>
				<tr class="even">
					<td><span>Mon, Tue, Wed, Thu, Fri</span></td>
					<td><span>1:00pm - 6:00pm</span></td>
					<td align=center><button class="btn red"><i class="fa fa-times"></i> Delete</button></td>
				</tr>
				<tr class="odd">
					<td><span>Sat</span></td>
					<td><span>9:00am - 12:00pm</span></td>
					<td align=center><button class="btn red"><i class="fa fa-times"></i> Delete</button></td>
				</tr>
				<tr class="even">
					<td><span>Sat</span></td>
					<td><span>1:00pm - 7:00pm</span></td>
					<td align=center><button class="btn red"><i class="fa fa-times"></i> Delete</button></td>
				</tr>
			</tbody>
		</table>
		
	</div>
</div>