<div class="container">

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
				<?php $this->load->view('physician/sidebar');?>
			</div>
		</div>
		
		<div class="col-md-10 col-sm-7">
			<div class="col-lg-10 col-md-9 col-sm-12">
				<div class="col-separator">
					<div class="row margin-none">
						<div class="col-md-12 col-sm-12 share-widget">
							<div class="widget-head">
								<ul>
									<li class="active">
										<a class="glyphicons user tab-open" data-tab-id="share-tab">
											<i></i>
										</a>
									</li>
									<li>
										<a class="glyphicons picture tab-open" data-tab-id="picture-tab">
											<i></i>
										</a>
									</li>
									<li>
										<a class="glyphicons link tab-open" data-tab-id="link-tab">
											<i></i>
										</a>
									</li>
									<li>
										<a class="glyphicons facetime_video tab-open" data-tab-id="video-tab">
											<i></i>
										</a>
									</li>
								</ul>
							</div>
							<div class="widget-body">
								<div class="tab-content">
									<div class="tab-pane active" id="share-tab">
										<div class="inner-all">
											<form>
												<textarea name="message" class="form-control" rows="2" placeholder="Share what you've been up to..."></textarea>
												<div class="checkbox">
													<label>
														<input type="checkbox" name="public" checked="checked" />
														Public
													</label>
												</div>
												<button class="btn blue" type="submit">Post</button>
											</form>
										</div>
									</div>
									<div class="tab-pane" id="picture-tab" style="display:none;">
										<div class="inner-all">
											<form>
												<textarea name="message" class="form-control" rows="2" placeholder="Share a picture..."></textarea>
												<input type="file" class="picture-file" name="file">
												<div class="checkbox">
													<label>
														<input type="checkbox" name="public" checked="checked" />
														Public
													</label>
												</div>
												<button class="btn blue" type="submit">Post</button>
											</form>
										</div>
									</div>
									<div class="tab-pane" id="link-tab" style="display:none;">
										<div class="inner-all">
											<form>
												<textarea name="message" class="form-control" rows="2" placeholder="Say anything you want..."></textarea>
												<textarea name="link" class="form-control link-textarea" rows="2" placeholder="Share a link..."></textarea>
												<div class="checkbox">
													<label>
														<input type="checkbox" name="public" checked="checked" />
														Public
													</label>
												</div>
												<button class="btn blue" type="submit">Post</button>
											</form>
										</div>
									</div>
									<div class="tab-pane" id="video-tab" style="display:none;">
										<div class="inner-all">
											<form>
												<textarea name="message" class="form-control" rows="2" placeholder="Share a video message..."></textarea>
												<input type="file" class="video-file" name="file">
												<div class="checkbox">
													<label>
														<input type="checkbox" name="public" checked="checked" />
														Public
													</label>
												</div>
												<button class="btn blue" type="submit">Post</button>
											</form>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-separator-h"></div>
					<div class="row margin-none">
						<div class="col-12 feeds">
							<div class="inner-LR">
								<div class="inner-LR feeds-heading">
									<h4>Recent Activity</h4>
								</div>
								<div class="feeds-body">
									<!-- Sample Link Post -->
									<div class="feed">
										<i class="list-icon fa fa-share"></i>
										<div class="feed-inner">
											<div class="caret"></div>
											<div class="feed-box">
												<div class="top-info inner-all">
													<button class="btn white delete pull-right">
														<i class="fa fa-fw fa-times-circle-o"></i>
														Delete
													</button>
													<i class="fa fa-user"></i>
													<a href="" >menard</a>
													<span> shared a link</span>
													<div class="timestamp">
														<i class="fa fa-clock-o"></i>
														2 minutes ago
													</div>
													<p>nothing to say</p>
												</div>
												<div class="media inner-all">
													<a class="pull-left" href="">
														<div class="preview"></div>
													</a>
													<div class="media-body">
														<a href="">Asia's First Social and Commercial Healthcare| Login </a>
													</div>
												</div>
												<div class="comment-section">
													<div class="comments">
														<div class="inner-all odd">
															<a class="pull-right" href="">
																<i class="fa fa-fw fa-times-circle-o"></i>
															</a>
															<a class="pull-left" href="">
																<img src="" class="user-pic" />
															</a>
															<div class="comment-content">
																<a href="">menard</a>
																<span>waaaaaaaaaazaaaa /o/</span>
																<div class="timestamp">
																	<i class="fa fa-clock-o"></i>
																	2 minutes ago
																</div>
															</div>
														</div>
														<div class="inner-all even">
															<a class="pull-right" href="">
																<i class="fa fa-fw fa-times-circle-o"></i>
															</a>
															<a class="pull-left" href="">
																<img src="" class="user-pic" />
															</a>
															<div class="comment-content">
																<a href="">bryan</a>
																<span>yyo o/</span>
																<div class="timestamp">
																	<i class="fa fa-clock-o"></i>
																	3 minutes ago
																</div>
															</div>
														</div>
													</div>
													<div class="comment-form inner-all">
														<input type="text" class="input-tx" placeholder="Comment here..." />
													</div>
												</div>
											</div>
										</div>
									</div>
									
									<!-- Sample Regular Post -->
									<div class="feed">
										<i class="list-icon fa fa-share"></i>
										<div class="feed-inner">
											<div class="caret"></div>
											<div class="feed-box">
												<div class="top-info inner-all">
													<button class="btn white delete pull-right">
														<i class="fa fa-fw fa-times-circle-o"></i>
														Delete
													</button>
													<i class="fa fa-user"></i>
													<a href="" >menard</a>
													<span> Whats on your mind...</span>
													<div class="timestamp">
														<i class="fa fa-clock-o"></i>
														2 minutes ago
													</div>
												</div>
												<div class="comment-section">
													<div class="comments">
														<div class="inner-all odd">
															<a class="pull-right" href="">
																<i class="fa fa-fw fa-times-circle-o"></i>
															</a>
															<a class="pull-left" href="">
																<img src="" class="user-pic" />
															</a>
															<div class="comment-content">
																<a href="">menard</a>
																<span>waaaaaaaaaazaaaa /o/</span>
																<div class="timestamp">
																	<i class="fa fa-clock-o"></i>
																	2 minutes ago
																</div>
															</div>
														</div>
														<div class="inner-all even">
															<a class="pull-right" href="">
																<i class="fa fa-fw fa-times-circle-o"></i>
															</a>
															<a class="pull-left" href="">
																<img src="" class="user-pic" />
															</a>
															<div class="comment-content">
																<a href="">bryan</a>
																<span>yyo o/</span>
																<div class="timestamp">
																	<i class="fa fa-clock-o"></i>
																	3 minutes ago
																</div>
															</div>
														</div>
													</div>
													<div class="comment-form inner-all">
														<input type="text" class="input-tx" placeholder="Comment here..." />
													</div>
												</div>
											</div>
										</div>
									</div>
									
									<!-- Sample Image Post -->
									<div class="feed">
										<i class="list-icon fa fa-share"></i>
										<div class="feed-inner">
											<div class="caret"></div>
											<div class="feed-box">
												<div class="top-info inner-all">
													<button class="btn white delete pull-right">
														<i class="fa fa-fw fa-times-circle-o"></i>
														Delete
													</button>
													<i class="fa fa-user"></i>
													<a href="" >menard</a>
													<span> Posted a picture</span>
													<div class="timestamp">
														<i class="fa fa-clock-o"></i>
														2 minutes ago
													</div>
													<p>test image</p>
												</div>
												<div class="media inner-all">
													<a class="pull-left" href="">
														<div class="preview">
															<img src="" />
														</div>
													</a>
												</div>
												<div class="comment-section">
													<div class="comments">
														<div class="inner-all odd">
															<a class="pull-right" href="">
																<i class="fa fa-fw fa-times-circle-o"></i>
															</a>
															<a class="pull-left" href="">
																<img src="" class="user-pic" />
															</a>
															<div class="comment-content">
																<a href="">menard</a>
																<span>waaaaaaaaaazaaaa /o/</span>
																<div class="timestamp">
																	<i class="fa fa-clock-o"></i>
																	2 minutes ago
																</div>
															</div>
														</div>
														<div class="inner-all even">
															<a class="pull-right" href="">
																<i class="fa fa-fw fa-times-circle-o"></i>
															</a>
															<a class="pull-left" href="">
																<img src="" class="user-pic" />
															</a>
															<div class="comment-content">
																<a href="">bryan</a>
																<span>yyo o/</span>
																<div class="timestamp">
																	<i class="fa fa-clock-o"></i>
																	3 minutes ago
																</div>
															</div>
														</div>
													</div>
													<div class="comment-form inner-all">
														<input type="text" class="input-tx" placeholder="Comment here..." />
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