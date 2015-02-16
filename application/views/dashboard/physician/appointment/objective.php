<div class="form_div vital_sign">
	<div class="inner-all">
		<h2 class="form_heading">Vital Signs</h2>
		
		<div class="vitals_box">
			<input type="hidden" value="1" id="vital_count">
			<div class="vitals v1">
				<div class="inner-all">
					<div class="form_group">
						<div class="col-sm-6">
							<div class="innerR">
								<span class="form_label">Date | Time</span>
								<input type="text" class="form_text" />
							</div>
						</div>
						<div class="col-sm-6">
							<div class="innerR">
								<span class="form_label">Mental Status</span>
								<select class="form_select">
									<option>Select</option>
								</select>
							</div>
						</div>
					</div>
					
					<div class="form_group">
						<div class="col-sm-6">
							<div class="innerR">
								<span class="form_label">BP</span>
								<input type="text" class="form_text half" />
								<span class="bp_over">/</span>
								<input type="text" class="form_text half" />
							</div>
						</div>
						<div class="col-sm-6">
							<div class="innerR">
								<span class="form_label">PR</span>
								<input type="text" class="form_text" />
							</div>
						</div>
					</div>
					
					<div class="form_group">
						<div class="col-sm-4">
							<div class="innerR">
								<span class="form_label">Temp</span>
								<input type="text" class="form_text" />
							</div>
						</div>
						<div class="col-sm-4">
							<div class="innerR">
								<span class="form_label">RR</span>
								<input type="text" class="form_text" />
							</div>
						</div>
						<div class="col-sm-4">
							<div class="innerR">
								<span class="form_label">Pain Scale </span>
								<div class="form_group">
									<input type="text" class="form_text left pain_scale_text" />
									<span class="form_group_icon right"><i class="fa fa-edit pain_scale lightbox-mode" data-target="pain_scale_lb"></i></span>
									
								</div>
							</div>
						</div>
					</div>
					
					<span class="form_label">Notes</span>
					<textarea class="form_textarea" placeholder="Type in Notes"></textarea>
					
					<span class="form_label">Taken by</span>
					<input type="text" class="form_text" />
				</div>
			</div>
		</div>
		
		<button class="form_button btn blue">Save</button>
		<button class="form_button btn red add_vitals"><i class="fa fa-plus"></i>Add</button>
	</div>
</div>


<div class="form_div diagnostic_results">
	<div class="inner-all">
		<h2 class="form_heading">
			General Physical Examination
		</h2>
		
		<div class="form_label with_action">
			<span>General Appearance</span>
			<button class="btn blue pull-right pre_fill_btn" data-target="ga"><i class="fa fa-check-square-o"></i></button>
			<span class="pre_fill">awake; alert; well-developed; well-nourished; (-) acute distress</span>
			<div class="clear"></div>
		</div>
		<textarea class="form_textarea ga" placeholder="Type in General Appearance"></textarea>
		
		<div class="form_label with_action">
			<span>Neurological</span>
			<button class="btn blue pull-right pre_fill_btn" data-target="neu"><i class="fa fa-check-square-o"></i></button>
			<span class="pre_fill">awake; alert; well-developed; well-nourished; (-) acute distress</span>
			<div class="clear"></div>
		</div>
		<textarea class="form_textarea neu" placeholder="Type in Neurological"></textarea>
		
		<div class="form_label with_action">
			<span>Cardiovascular</span>
			<button class="btn blue pull-right pre_fill_btn" data-target="car"><i class="fa fa-check-square-o"></i></button>
			<button class="btn red pull-right"><i class="fa fa-plus"></i></button>
			<span class="pre_fill">awake; alert; well-developed; well-nourished; (-) acute distress</span>
			<div class="clear"></div>
		</div>
		<textarea class="form_textarea car" placeholder="Type in Cardiovascular"></textarea>
		
		<div class="form_label with_action">
			<span>Abdomen</span>
			<button class="btn blue pull-right pre_fill_btn" data-target="abd"><i class="fa fa-check-square-o"></i></button>
			<button class="btn red pull-right"><i class="fa fa-plus"></i></button>
			<span class="pre_fill">awake; alert; well-developed; well-nourished; (-) acute distress</span>
			<div class="clear"></div>
		</div>
		<textarea class="form_textarea abd" placeholder="Type in Abdomen"></textarea>
		
		<div class="form_label with_action">
			<span>HEENT</span>
			<button class="btn blue pull-right pre_fill_btn" data-target="heent"><i class="fa fa-check-square-o"></i></button>
			<button class="btn red pull-right"><i class="fa fa-plus"></i></button>
			<span class="pre_fill">awake; alert; well-developed; well-nourished; (-) acute distress</span>
			<div class="clear"></div>
		</div>
		<textarea class="form_textarea heent" placeholder="Type in HEENT"></textarea>
		
		<div class="form_label with_action">
			<span>Genitourinary</span>
			<button class="btn blue pull-right pre_fill_btn" data-target="gen"><i class="fa fa-check-square-o"></i></button>
			<button class="btn red pull-right"><i class="fa fa-plus"></i></button>
			<span class="pre_fill">awake; alert; well-developed; well-nourished; (-) acute distress</span>
			<div class="clear"></div>
		</div>
		<textarea class="form_textarea gen" placeholder="Type in Genitourinary"></textarea>
		
		<div class="form_label with_action">
			<span>Neck</span>
			<button class="btn blue pull-right pre_fill_btn" data-target="neck"><i class="fa fa-check-square-o"></i></button>
			<button class="btn red pull-right"><i class="fa fa-plus"></i></button>
			<span class="pre_fill">awake; alert; well-developed; well-nourished; (-) acute distress</span>
			<div class="clear"></div>
		</div>
		<textarea class="form_textarea neck" placeholder="Type in Neck"></textarea>
		
		<div class="form_label with_action">
			<span>Extremities</span>
			<button class="btn blue pull-right pre_fill_btn" data-target="ext"><i class="fa fa-check-square-o"></i></button>
			<button class="btn red pull-right"><i class="fa fa-plus"></i></button>
			<span class="pre_fill">awake; alert; well-developed; well-nourished; (-) acute distress</span>
			<div class="clear"></div>
		</div>
		<textarea class="form_textarea ext" placeholder="Type in Extremities"></textarea>
		
		<div class="form_label with_action">
			<span>Chestwall</span>
			<button class="btn blue pull-right pre_fill_btn" data-target="che"><i class="fa fa-check-square-o"></i></button>
			<button class="btn red pull-right"><i class="fa fa-plus"></i></button>
			<span class="pre_fill">awake; alert; well-developed; well-nourished; (-) acute distress</span>
			<div class="clear"></div>
		</div>
		<textarea class="form_textarea che" placeholder="Type in Chestwall"></textarea>
		
		<div class="form_label with_action">
			<span>Rectal</span>
			<button class="btn blue pull-right pre_fill_btn" data-target="rec"><i class="fa fa-check-square-o"></i></button>
			<button class="btn red pull-right"><i class="fa fa-plus"></i></button>
			<span class="pre_fill">awake; alert; well-developed; well-nourished; (-) acute distress</span>
			<div class="clear"></div>
		</div>
		<textarea class="form_textarea rec" placeholder="Type in Rectal"></textarea>
		
		<div class="form_label with_action">
			<span>Lungs</span>
			<button class="btn blue pull-right pre_fill_btn" data-target="lungs"><i class="fa fa-check-square-o"></i></button>
			<button class="btn red pull-right"><i class="fa fa-plus"></i></button>
			<span class="pre_fill">awake; alert; well-developed; well-nourished; (-) acute distress</span>
			<div class="clear"></div>
		</div>
		<textarea class="form_textarea lungs" placeholder="Type in Lungs"></textarea>
		
		<div class="form_label with_action">
			<span>Skin</span>
			<button class="btn blue pull-right pre_fill_btn" data-target="skin"><i class="fa fa-check-square-o"></i></button>
			<button class="btn red pull-right"><i class="fa fa-plus"></i></button>
			<span class="pre_fill">awake; alert; well-developed; well-nourished; (-) acute distress</span>
			<div class="clear"></div>
		</div>
		<textarea class="form_textarea skin" placeholder="Type in Skin"></textarea>
		
	</div>
</div>


<div class="form_div diagnostic_results">
	<div class="inner-all">
		<h2 class="form_heading">
			Diagnostic Results
			<label for="upload_diagnostic" class="pull-right"><button class="btn blue">Upload</button></label>
		</h2>
		<input type="file" id="upload_diagnostic" />
		
		<div class="upload_container">
			<span>No uploaded images.</span>
		</div>
	</div>
</div>

<!-- Vital Clone -->
<div class="clone_vital" style="display:none">
	<div class="vitals">
		<div class="inner-all">
			<div class="form_group">
				<div class="col-sm-6">
					<div class="innerR">
						<span class="form_label">Date | Time</span>
						<input type="text" class="form_text" />
					</div>
				</div>
				<div class="col-sm-6">
					<div class="innerR">
						<span class="form_label">Mental Status</span>
						<select class="form_select">
							<option>Select</option>
						</select>
					</div>
				</div>
			</div>
			
			<div class="form_group">
				<div class="col-sm-6">
					<div class="innerR">
						<span class="form_label">BP</span>
						<input type="text" class="form_text half" />
						<span class="bp_over">/</span>
						<input type="text" class="form_text half" />
					</div>
				</div>
				<div class="col-sm-6">
					<div class="innerR">
						<span class="form_label">PR</span>
						<input type="text" class="form_text" />
					</div>
				</div>
			</div>
			
			<div class="form_group">
				<div class="col-sm-4">
					<div class="innerR">
						<span class="form_label">Temp</span>
						<input type="text" class="form_text" />
					</div>
				</div>
				<div class="col-sm-4">
					<div class="innerR">
						<span class="form_label">RR</span>
						<input type="text" class="form_text" />
					</div>
				</div>
				<div class="col-sm-4">
					<div class="innerR">
						<span class="form_label">Pain Scale </span>
						<div class="form_group">
							<input type="text" class="form_text left pain_scale_text" />
							<span class="form_group_icon right"><i class="fa fa-edit pain_scale lightbox-mode" data-target="pain_scale_lb"></i></span>
							
						</div>
					</div>
				</div>
			</div>
			
			<span class="form_label">Notes</span>
			<textarea class="form_textarea" placeholder="Type in Notes"></textarea>
			
			<span class="form_label">Taken by</span>
			<input type="text" class="form_text" />
		</div>
	</div>
</div>

<!-- Pain Scale Lightbox -->
<!-- BOOKING LIGHTBOX -->
<div class="lightbox pain_scale_lb" style="display:none">
	<div class="heading">
		<span class="close">x</span>
		<h2 class="margin-none">Pain Scale</h2>
	</div>
	<div class="pain_scale_box">
		<img src="<?php echo base_url()."assets2/_theme/img/pain_scale.png" ?>" class="pain_scale_img" />
		<div class="inner-all">
			<input type="text" class="form_text right" />
			<button class="form_button btn blue set_pain_scale">Set Pain Scale</button>
		</div>
	</div>
</div>