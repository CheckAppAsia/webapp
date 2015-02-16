<div class="clinic_list">
	<div class="inner-all">
		<h2 class="form_heading">
			My Clinics
			<button class="btn blue pull-right lightbox-mode" data-target="add_clinic_lb"><i class="fa fa-plus"></i> Add Clinic</button>
		</h2>
		
		<div class="clinics">
			<div class="clinic inner-all">
				<button class="btn red pull-right"><i class="fa fa-times"></i> Remove</button>
				<button class="btn blue pull-right"><i class="fa fa-plus"></i> Add Staff</button>
				<span class="c_name">Makati Medical Center</span>
				<span class="c_addr"><i class="fa fa-map-marker"></i>Amorsolo Street, Makati 1229</span>
				<span class="c_staff"><b>2</b> Staff</span>
				<ul class="staff">
					<li>staff1</li>
					<li>staff2</li>
				</ul>
			</div>
			<div class="clinic inner-all">
				<button class="btn red pull-right"><i class="fa fa-times"></i> Remove</button>
				<button class="btn blue pull-right"><i class="fa fa-plus"></i> Add Staff</button>
				<span class="c_name">St. Lukes Medical Center</span>
				<span class="c_addr"><i class="fa fa-map-marker"></i>Rizal Drive corner, Bonifacio Global City, 32nd St, Taguig</span>
				<span class="c_staff"><b>3</b> Staff</span>
				<ul class="staff">
					<li>staff1</li>
					<li>staff2</li>
					<li>staff3</li>
				</ul>
			</div>
		</div>
		
		
		<div class="clearfix"></div>
	</div>
</div>

<!-- Lightbox - Add Clinic -->
<div class="lightbox add_clinic_lb" style="display:none">
	<div class="heading">
		<span class="close">x</span>
		<h2 class="margin-none">Add Clinic</h2>
	</div>
	
	<div class="form_div">
		<span class="form_label">Clinic Name:</span>
		<input type="text" class="form_text" placeholder="Type in Clinic Name" />
		
		<span class="form_label">Address:</span>
		<input type="text" class="form_text" placeholder="Type in Address" id="clinic_addr"/>
		
		<div class="google_map_box" id="map-canvas">google map here</div>
		
		<button class="form_button btn blue">Save</button>
	</div>
	
</div>