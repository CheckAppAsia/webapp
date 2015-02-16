<div class="container">
	<div class="row row-app">		
		<div class="col-md-10 col-sm-7">
			<div class="col-sm-12 inner-LR">
				<div class="col-separator">
					<div class="widget-head border-bottom">
						<ul>
							<li class="active">
								<a class="glyphicons nameplate tab-open" data-tab-id="list-patients" >
									<i></i>
									<span>List Patients</span>
								</a>
							</li>
							<li>
								<a class="glyphicons user tab-open" data-tab-id="add-patient" >
									<i></i>
									<span>Add a Patient</span>
								</a>
							</li>
							<li>
								<a class="glyphicons envelope tab-open" data-tab-id="message-all" >
									<i></i>
									<span>Message All</span>
								</a>
							</li>
						</ul>
					</div>
					<div class="col-separator-h"></div>
					<div class="tab-content">
						<div class="list-patients inner-all active" id="list-patients">
							
							<?php foreach($patients as $pat) : ?>
							<div class="inner-all border-bottom">
								<div class="media">
									<button class="pull-right btn white view-record-details">
										<i class="fa fa-arrow-right"></i>
									</button>
									<img width="100"  src="https://www.checkapp.asia/beta/assets/img/users/no_image_thumb.jpg" class="thumb pull-left" >
									<div class="media-body innerAll half">
										<h4 class=""><?=$pat->first_name.' '.$pat->last_name?></h4>
										<p>
											<?php 
											$birth = $pat->birthdate;
											$birth = explode(' ', $birth);
											$year = explode('-', $birth[0]);
											
											$birth = date('Y') - $year[0];
											?>
											<?=($pat->gender == 1 ? 'Male' : 'Female')?>, <?=$birth?> years old
											<br>Patient 1234567890
										</p>
									</div>
								</div>
							</div>
							<?php endforeach; ?>
						</div>
						<div class="add-patient inner-all" id="add-patient" style="display:none">
							<form method="POST">
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label class="col-md-3">Username</label>
											<div class="col-md-9">
												<div class="input-group">
													<input type="text" id="username" name="username" class="form-control">
													<span class="input-group-addon right-side">
														<i class="fa fa-question-circle"></i>
													</span>
												</div>
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-3">First Name</label>
											<div class="col-md-9">
												<div class="input-group">
													<input type="text" id="first-name" name="first_name" class="form-control">
													<span class="input-group-addon right-side">
														<i class="fa fa-question-circle"></i>
													</span>
												</div>
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-3">Last Name</label>
											<div class="col-md-9">
												<div class="input-group">
													<input type="text" id="last-name" name="last_name" class="form-control">
													<span class="input-group-addon right-side">
														<i class="fa fa-question-circle"></i>
													</span>
												</div>
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-3">Date of Birth</label>
											<div class="col-md-9">
												<div class="input-group">
													<input type="text" id="birthday" name="birthdate" class="form-control">
													<span class="input-group-addon right-side">
														<i class="fa fa-calendar"></i>
													</span>
												</div>
											</div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="col-md-3">Gender</label>
											<div class="col-md-9">
												<select name="gender" class="form-control">
													<option>Select Gender</option>
													<option selected="" value="Male">Male</option>
													<option value="Female">Female</option>
												</select>
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-3">Age</label>
											<div class="col-md-9">
												<input type="text" id="age" name="age" class="form-control">
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-3">Email</label>
											<div class="col-md-9">
												<div class="input-group">
													<input type="text" id="email" name="email" class="form-control">
													<span class="input-group-addon right-side">
														<i class="fa fa-question-circle"></i>
													</span>
												</div>
											</div>
										</div>
									</div>
								</div>
								<button type="submit" name="patSave" class="btn blue submit">
									<i class="fa fa-fw fa-check-square-o"></i>
									Add
								</button>
							</form>
						</div>
						
						<div class="message-all inner-all" id="message-all" style="display:none">
							<div class="heading">
								<span class="glyphicons edit">
									<i></i>
									Send Message/Alert to all your Patients
								</span>
							</div>
							<div class="separator bottom"></div>
							<div class="separator bottom"></div>
							<div class="inner-all">
								<label>Subject</label>
								<div class="input-group">
									<input type="text" id="subject" name="subject" placeholder="Subject" class="form-control">
									<span class="input-group-addon right-side">
										<i class="fa fa-question-circle"></i>
									</span>
								</div>
								<div class="separator bottom"></div>
								<label>Subject</label>
								<div class="input-group">
									<textarea type="text" name="send_message" placeholder="Message body" value="" class="form-control" required=""></textarea>
									<span class="input-group-addon right-side">
										<i class="fa fa-question-circle"></i>
									</span>
								</div>
								<div class="separator bottom"></div>
								<div class="separator bottom"></div>
								<button type="submit" name="profSave" class="btn blue submit">
									<i class="fa fa-fw fa-check-square-o"></i>
									Send to all
								</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
	</div>

</div>