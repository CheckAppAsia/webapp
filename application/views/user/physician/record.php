<div class="container layout-app">
	<div class="row row-app">
		
		<div class="col-md-2 col-sm-5">
			<div class="col-separator-first col-separator">
				<div class="user-pic-name">
					<div class="user-pic">
						<div class="profile-avatar">
							<img src="" class="img-responsive" />
						</div>
					</div>
					<div class="user-name">
						<div class="inner-all">
							<h4>
								<i class="fa fa-circle text-success pull-right"></i>
								Bryan Mendoza
							</h4>
						</div>
					</div>
				</div>
				<div class="col-separator-h"></div>
				<ul class="list-group">
					<li>
						<a href="">
							<i class="fa fa-book"></i>
							Timeline
						</a>
					</li>
					<li>
						<a href="">
							<i class="fa fa-user"></i>
							My Profile
						</a>
					</li>
					<li>
						<a href="">
							<i class="fa fa-building-o"></i>
							My Clinic
						</a>
					</li>
					<li>
						<a href="">
							<i class="fa fa-envelope"></i>
							Messages
						</a>
					</li>
					<li>
						<a href="">
							<i class="fa fa-stethoscope"></i>
							Appointments
						</a>
					</li>
					<li>
						<a href="">
							<i class="fa fa-user-md"></i>
							Patients
						</a>
					</li>
					<li>
						<a href="">
							<i class="fa fa-group"></i>
							Colleagues
						</a>
					</li>
				</ul>
			</div>
		</div>
		
		<div class="col-md-10 col-sm-7">
			<div class="col-sm-12 inner-LR">
				<div class="col-separator">
					<div class="widget-head">
						<ul>
							<li class="active">
								<a class="glyphicons nameplate tab-open" data-tab-id="patient-profile" >
									<i></i>
									<span>Patient Profile</span>
								</a>
							</li>
							<li>
								<a class="glyphicons package tab-open" data-tab-id="medical-record" >
									<i></i>
									<span>Medical Records</span>
								</a>
							</li>
						</ul>
					</div>
					<div class="col-separator-h"></div>
					<div class="tab-content">
						<div class="patient-profile active" id="patient-profile">
							<div class="patient-info-box">
								<div class="inner-all">
									<div class="media">
										<a>
											<button class="pull-right btn white">
												<i class="fa fa-fw fa-edit"></i>
												Edit
											</button>
										</a>
										<img width="100"  class="thumb pull-left" src="https://www.checkapp.asia/beta/assets/images/blank_profile.jpg" style="visibility: visible;">
										<div class="media-body innerAll half">
											<h4 class="media-heading text-large">menar cu</h4>
											<p>
												Male<br>
												Patient: 000001
											</p>
										</div>
									</div>
								</div>
							</div>
							<div class="col-separator-h"></div>
							<div class="row measurements-box">
								<div class="col-md-4 weight">
									<div class="inner-all box">
										<span class="text-large strong">N/A</span>
										<br>Weight (kg)
									</div>
								</div>
								<div class="col-md-4 height">
									<div class="inner-all box">
										<span class="text-large strong">N/A</span>
										<br>Height (cm)
									</div>
								</div>
								<div class="col-md-4 age">
									<div class="inner-all box">
										<span class="text-large strong">N/A</span>
										<br>Age (years)
									</div>
								</div>
							</div>
							<div class="row physical-activity">
								<div class="col-md-6 blood-pressure margin-none">
									<div class="inner-all box">
										<div class="media inner-all">
											<div class="pull-left">
												Blood presure
												<div class="strong">0/0 mmHh</div>
											</div>
											<div class="media-body inner-all">
												<div class="progress progress-small margin-none">
													<div style="width: 0%" class="progress-bar progress-bar-primary"></div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-6 margin-none">
									<div class="inner-all box">
										<div class="media inner-all">
											<div class="pull-left">
												Exercise
												<div class="strong">0 hours, 0 mins</div>
											</div>
											<div class="media-body inner-all">
												<div class="progress progress-small margin-none">
													<div style="width: 0%" class="progress-bar progress-bar-primary"></div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-separator-h"></div>
							<h4 class="inner-all margin-none border-bottom" style="background:#fff">
								<i class="fa fa-fw fa-clock-o pull-right text-muted"></i>
								Patient History
							</h4>
						</div>
						<div class="medical-record" id="medical-record" style="display:none">
							<div class="widget-head w-tabs">
								<ul>
									<li>
										<a class="glyphicons hospital_h tab-open" data-tab-id="health-background">
											<i></i>
											<span>Health Background</span>
										</a>
									</li>
									<li>
										<a class="glyphicons sampler tab-open" data-tab-id="immunizations">
											<i></i>
											<span>Immunizations</span>
										</a>
									</li>
									<li>
										<a class="glyphicons more_items tab-open" data-tab-id="diagnosis">
											<i></i>
											<span>Diagnosis</span>
										</a>
									</li>
									<li>
										<a class="glyphicons nameplate  tab-open" data-tab-id="medical-history">
											<i></i>
											<span>Medical History</span>
										</a>
									</li>
									<li>
										<a class="glyphicons hospital tab-open" data-tab-id="prescription">
											<i></i>
											<span>Prescription</span>
										</a>
									</li>
									<li>
										<a class="glyphicons notes_2 tab-open" data-tab-id="clinical-notes">
											<i></i>
											<span>Clinical Notes</span>
										</a>
									</li>
								</ul>
							</div>
							<div class="col-separator-h"></div>
							<div class="tab-content">
								<div class="all-records active" id="all-records">
									<!-- show only if no records
									<h4>No medical records yet</h4>
									-->
									<ul class="list-group">
										<li>
											<div class="media inner-all">
												<button class="pull-right btn white view-record-details">
													<i class="fa fa-arrow-right"></i>
												</button>
												<div class="media-body">
													<h4 class="media-heading strong">(asdasd)</h4>
													<ul class="list-unstyled">
														<li>
															<i class="fa fa-user-md"></i>
															No Doctor Specified
														</li>
														<li>
															<i class="fa fa-calendar"></i>
															January 01, 1970 (Thursday)
														</li>
													</ul>
												</div>
											</div>
										</li>
									</ul>
								</div>
								<div class="health-background" id="health-background" style="display:none">
									<div class="inner-LR border-bottom heading">
										<h4 class="margin-none pull-left">Health Profile</h4>
										<button class="btn blue pull-right">
											<i class="fa fa-arrow-circle-up"></i>
											<span>Update Health Profile</span>
										</button>
										<div class="clearfix"></div>
									</div>
									<div class="inner-all health-profile-data">
										<div>
											<label>Blood Type:</label>
										</div>
										<div>
											<label>Allergies:</label>
											<i class="fa fa-question-circle"></i>
										</div>
										<div>
											<label>Family Health History:</label>
											<i class="fa fa-question-circle"></i>
										</div>
										<div>
											<label>Social and Lifestyle:</label>
											<i class="fa fa-question-circle"></i>
										</div>
									</div>
								</div>
								<div class="immunizations" id="immunizations" style="display:none">
									<div class="inner-all">
										<div class="inner-LR border-bottom heading">
											<h4 class="margin-none pull-left">Immunizations</h4>
											<button class="btn blue pull-right">
												<i class="fa fa-arrow-circle-up"></i>
												<span>Add Immunizations Record</span>
											</button>
											<div class="clearfix"></div>
										</div>
										<ul class="list-group">
											<li>
												<div class="media inner-all">
													<button class="pull-right btn white view-record-details">
														<i class="fa fa-arrow-right"></i>
													</button>
													<div class="media-body">
														<h4 class="media-heading strong">(asdasd)</h4>
														<ul class="list-unstyled">
															<li>
																<i class="fa fa-user-md"></i>
																No Doctor Specified
															</li>
															<li>
																<i class="fa fa-calendar"></i>
																January 01, 1970 (Thursday)
															</li>
														</ul>
													</div>
												</div>
											</li>
										</ul>
									</div>
								</div>
								<div class="diagnosis" id="diagnosis" style="display:none">
									<div class="inner-all">
										<div class="inner-LR border-bottom heading">
											<h4 class="margin-none pull-left">Diagnosis</h4>
											<button class="btn blue pull-right">
												<i class="fa fa-arrow-circle-up"></i>
												<span>Add Diagnosis Record</span>
											</button>
											<div class="clearfix"></div>
										</div>
										<ul class="list-group">
											<li>
												<div class="media inner-all">
													<button class="pull-right btn white view-record-details">
														<i class="fa fa-arrow-right"></i>
													</button>
													<div class="media-body">
														<h4 class="media-heading strong">(asdasd)</h4>
														<ul class="list-unstyled">
															<li>
																<i class="fa fa-user-md"></i>
																No Doctor Specified
															</li>
															<li>
																<i class="fa fa-calendar"></i>
																January 01, 1970 (Thursday)
															</li>
														</ul>
													</div>
												</div>
											</li>
										</ul>
									</div>
								</div>
								<div class="medical-history" id="medical-history" style="display:none">
									<div class="inner-all">
										<div class="inner-LR border-bottom heading">
											<h4 class="margin-none pull-left">Medical</h4>
											<button class="btn blue pull-right">
												<i class="fa fa-arrow-circle-up"></i>
												<span>Add Medical History</span>
											</button>
											<div class="clearfix"></div>
										</div>
										<div class="inner-all">
											<h4>No Medical History yet</h4>
										</div>
									</div>
								</div>
								<div class="prescription" id="prescription" style="display:none">
									<div class="inner-all">
										<div class="inner-LR border-bottom heading">
											<h4 class="margin-none pull-left">Prescription</h4>
											<button class="btn blue pull-right">
												<i class="fa fa-arrow-circle-up"></i>
												<span>Add prescription record</span>
											</button>
											<div class="clearfix"></div>
										</div>
										<div class="inner-all">
											<h4>No prescription records yet</h4>
										</div>
									</div>
								</div>
								<div class="clinical-notes" id="clinical-notes" style="display:none">
									<div class="inner-all">
										<div class="inner-LR border-bottom heading">
											<h4 class="margin-none pull-left">Clinical Notes</h4>
											<button class="btn blue pull-right">
												<i class="fa fa-arrow-circle-up"></i>
												<span>Add Clinical Notes</span>
											</button>
											<div class="clearfix"></div>
										</div>
										<div class="inner-all">
											<h4>No clinical notesyet</h4>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
	</div>

</div>