<div class="heading-box">
	<h4 class=" inner-all">Create Prescription</h4>
</div>
<div class="heading-box">
	<h4 class=" inner-all">Search Drug: <input type="text" id="search-drug" name="search_drug" data-url="<?php echo base_url('/dashboard/physician/prescription/search');?>"></h4>
</div>

<div class="create_form inner-all">
	<?php echo form_open(''); ?>
	
		<table>
			<thead>
				<th>Brand name</th>
				<th>Generic Name</th>
				<th>Strength</th>
				<th>Form</th>
				<th>Qty</th>
				<th>Compliance</th>
				<th>Status</th>
			</thead>
			<tbody id="medicine">
			</tbody>
		</table>
		<input type="submit" name="action" value="Prescribe" class="btn blue" />
	<?php echo form_close(); ?>
</div>