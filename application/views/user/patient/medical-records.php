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
					<li class="active">
						<a href="">
							<i class="fa fa-book"></i>
							Timeline
						</a>
					</li>
					<li>
						<a href="">
							<i class="fa fa-user"></i>
							Profile
						</a>
					</li>
					<li>
						<a href="">
							<i class="fa fa-stethoscope"></i>
							Medical Records
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
							Healthcare
						</a>
					</li>
					<li>
						<a href="">
							<i class="fa fa-group"></i>
							Friends
						</a>
					</li>
					<li>
						<a href="">
							<i class="fa fa-comments-o"></i>
							Chat
						</a>
					</li>
				</ul>
			</div>
		</div>
		
		<div class="col-md-10 col-sm-7">
			<div class="col-lg-10 col-md-9 col-sm-12">
				<div class="col-sm-12">
					<div class="col-separator">
						<div class="inner-all medical-records">
							<h2>Medical Records</h2>
						</div>
						<div class="col-separator-h"></div>
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
								<div class="inner-all">
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
							</div>
							<div class="health-background" id="health-background" style="display:none">
								<div class="inner-all">
									<div class="inner-LR border-bottom heading">
										<h4 class="margin-none pull-left">Health Profile</h4>
										<button class="btn blue pull-right">
											<i class="fa fa-arrow-circle-up"></i>
											<span>Update Health Profile</span>
										</button>
										<div class="clearfix"></div>
									</div>
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
			
			<div class="col-lg-2 col-md-3 col-sm-12">
				<div class="search-sidebar">
					<div class="input-group search-form">
						<input class="form-control input-tx" type="text" placeholder="Search" autocomplete="off" />
						<div class="input-group-btn">
							<button class="btn">
								<i class="fa fa-search"></i>
							</button>
						</div>
					</div>
					<div class="friends-list">
						<h4>Friends Online</h4>
						<div class="friends">
							<ul>
								<li>
									<a href="#">
										<i class="fa fa-microphone text-success pull-right"></i>
										<i class="fa fa-video-camera text-success pull-right"></i>
										<img src="" class="user-pic" >
										<span>Baba Tiga</span>
									</a>
								</li>
								<li>
									<a href="#">
										<i class="fa fa-microphone text-success pull-right"></i>
										<i class="fa fa-video-camera text-success pull-right"></i>
										<img src="" class="user-pic" >
										<span>Baba Tiga</span>
									</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		
	</div>

</div>