<div class="row margin-none">
<?php
	debug($newsfeed);
?>	
	<div class="post-form inner-all">
		<div class="post-type">
			<div class="pull-right dropdown-toggle" data-toggle-hide="15" data-toggle-show="34">
				<div class="post-viewing" >
					<i class="fa fa-globe"></i>
				</div>
				<ul class="viewing-option dropdown-menu">
					<li data-icon="fa fa-globe"><i class="fa fa-globe"></i> Public</li>
					<li data-icon="fa fa-group"><i class="fa fa-group"></i> Friends Only</li>
					<li data-icon="fa fa-eye"><i class="fa fa-eye"></i> Only Me</li>
				</ul>
			</div>
			<ul class="option">
				<li class="active">
					<a data-tab-id="text-form" class="tab-open">
						<span>Text</span>
						<i class="fa fa-pencil"></i>
					</a>
				</li>
				<li class="">
					<a data-tab-id="photos-form" class="tab-open">
						<span>Photos</span>
						<i class="fa fa-camera"></i>
					</a>
				</li>
				<li class="">
					<a data-tab-id="link-form" class="tab-open">
						<span>Link</span>
						<i class="fa fa-link"></i>
					</a>
				</li>
				<li class="">
					<a data-tab-id="video-form" class="tab-open">
						<span>Video</span>
						<i class="fa fa-video-camera"></i>
					</a>
				</li>
			</ul>
		</div>
		<div class="tab-content">
			<div id="text-form" class="active">
				<form action="<?php echo base_url('social/post_create'); ?>" method="POST">
					<div class="arrow-box">
						<div class="arrow-pointer text"></div>
						<textarea class="input-tx" name="message"></textarea>
					</div>
					<button class="btn blue pull-right submit">Share</button>
					<input type="hidden" name="target_id" value="<?php echo $target->id; ?>" />
                    <input type="hidden" name="attach_type" value="<?php echo ATTACH_NONE; ?>" />
					<input type="hidden" name="return" value="<?php echo base_url($this->uri->uri_string()); ?>" />
					<div class="clearfix"></div>
				</form>
			</div>
			<div id="photos-form" style="display:none">
				<form action="<?php echo base_url('social/post_create'); ?>" method="POST" enctype="multipart/form-data">
					<div class="arrow-box">
						<div class="arrow-pointer photos"></div>
						<textarea class="input-tx" name="message"></textarea>
					</div>
					<input type="file" name="attachment" class="file-type pull-left">
					<button class="btn blue pull-right submit">Share</button>
					<input type="hidden" name="target_id" value="<?php echo $target->id; ?>" />
                    <input type="hidden" name="attach_type" value="<?php echo ATTACH_PHOTO; ?>" />
					<input type="hidden" name="return" value="<?php echo base_url($this->uri->uri_string()); ?>" />
					<div class="clearfix"></div>
				</form>
			</div>
			<div id="link-form" style="display:none">
				<form action="<?php echo base_url('social/post_create'); ?>" method="POST">
					<div class="arrow-box">
						<div class="arrow-pointer link"></div>
						<textarea class="input-tx" name="message"></textarea>
					</div>
					<input type="text" class="post-form-link input-tx" placeholder="Paste your link here...">
					<div class="link-preview">
						<div class="col-sm-3">
							<img class="lint-img img-responsive" />
						</div>
						<div class="col-sm-9">
							<div class="row"><div class="lint-title col-sm-12"></div></div>
							<div class="row"><div class="lint-desc col-sm-12"></div></div>
							<div class="row"><div class="lint-url col-sm-12"></div></div>
						</div>
					</div>
					<button class="btn blue pull-right submit">Share</button>
					<input type="hidden" class="linkval_image" name="link[image]" />
					<input type="hidden" class="linkval_title" name="link[title]" />
					<input type="hidden" class="linkval_desc" name="link[desc]" />
					<input type="hidden" class="linkval_url" name="link[url]" />
					<input type="hidden" name="target_id" value="<?php echo $target->id; ?>" />
                    <input type="hidden" name="attach_type" value="<?php echo ATTACH_LINK; ?>" />
					<input type="hidden" name="return" value="<?php echo base_url($this->uri->uri_string()); ?>" />
					<div class="clearfix"></div>
				</form>
			</div>
			<div id="video-form" style="display:none">
				<form action="<?php echo base_url('social/post_create'); ?>" method="POST" enctype="multipart/form-data">
					<div class="arrow-box">
						<div class="arrow-pointer video"></div>
						<textarea class="input-tx" name="message"></textarea>
					</div>
					<input type="file" name="attachment" class="file-type pull-left">
					<button class="btn blue pull-right submit">Share</button>
					<input type="hidden" name="target_id" value="<?php echo $target->id; ?>" />
                    <input type="hidden" name="attach_type" value="<?php echo ATTACH_VIDEO; ?>" />
					<input type="hidden" name="return" value="<?php echo base_url($this->uri->uri_string()); ?>" />
					<div class="clearfix"></div>
				</form>
			</div>
		</div>
	</div>
	<div class="sort-box">
		<ul>
			<li>Recent activity in your network</li>
			<!-- <li class="dot">&#8226;</li>
			<li>Top</li> -->
		</ul>
	</div>
	<div id="feeds">
		
	</div>
	
</div>

<div id="factory">

	<!-- FEED ITEM -->
	<div class="feed">
		<div class="poster-pic">
			<img src="">
		</div>
		<div class="feed-inner">
			<div class="caret"></div>
			<div class="feed-box">
				<div class="top-info inner-all">
					<div class="feed-option dropdown-toggle pull-right" data-toggle-hide="0" data-toggle-show="5">
						<i class="fa fa-angle-down"></i>
						<ul class="feed-option-list dropdown-menu">
							<li class="post-edit">
								<i class="fa fa-pencil"></i>
								Edit
							</li>
							<li class="post-delete">
								<i class="fa fa-times"></i>
								Delete
							</li>
						</ul>
					</div>
					<a class="poster-name" href=""></a><br />
					<span class="message"></span>
					<div class="post-editing">
						<textarea class="edit-msg"></textarea>
						<button class="post-edit-save">Save</button>
						<button class="post-edit-cancel">Cancel</button>
					</div>
					<div class="post-attach post-photo"><img src="" /></div>
					<div class="post-attach post-video"></div>
					<div class="post-attach post-link">
						<div class="col-sm-3">
							<a target="_blank"><img class="lint-img img-responsive" /></a>
						</div>
						<div class="col-sm-9">
							<div class="row"><div class="lint-title col-sm-12"><a target="_blank"></a></div></div>
							<div class="row"><div class="lint-desc col-sm-12"></div></div>
							<div class="row"><div class="lint-url col-sm-12"></div></div>
						</div>
					</div>
					<div class="clearfix"></div>
					<div class="post-action">
						<div class="action pull-left">
							<a class="hover action-like">Like</a>
							<a class="hover action-unlike">Unlike</a>
							<a>Reply</a>
							<a class="hover action-share lightbox-mode" data-target="share">Share</a>
							<span class="post-likes"></span>
						</div>
						<a class="post-directlink" href="#"><div class="timestamp pull-left"></div></a>
						<div class="clearfix"></div>
					</div>
				</div>
				<div class="comment-section">
					<div class="up arrow"></div>
					<div class="comments"></div>
					<div class="view-all">
						<hr />
						<div class="inner-all">
							<a class="post-directlink" href="#">View all <span></span> comments..</a>
						</div>
					</div>
					<div class="comment-form inner-all">
						<form>
							<input type="text" class="input-tx" data-postid="" placeholder="Comment here..." />
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<!-- COMMENT ITEM -->
	<div class="comment-box inner-all">
		<a class="pull-left" href="">
			<img src="" class="user-pic" />
		</a>
		<div class="comment-content">
			<a class="comm-user" href=""></a><br />
			<span class="message"></span>
			<div class="post-action">
				<div class="timestamp pull-left"></div>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
	
</div>


<!-- SHARE -->
<div class="lightbox share" style="display:none">
	<div class="heading">
		<span class="close">x</span>
		<h2 class="margin-none">Share this post</h2>
	</div>

	<div class="share_content inner-all">
		<textarea placeholder="Write something..."></textarea>
		<hr>
		<div class="share_preview">
			<img src="<?php echo CA_Media::userpic('default.jpg','150'); ?>" class="img_preview pull-left" />
			<strong class="title">Some title blah blah blah</strong>
			<span class="from">dev.checkapp.asia</span>
			<p class="desc">lorem ipsum dolor isit amen blah blah blah lorem ipsum dolor isit amen blah blah blah lorem ipsum dolor isit amen blah blah blah lorem ipsum dolor isit amen blah blah blah lorem ipsum dolor isit amen blah blah blah lorem ipsum dolor isit amen blah blah blah</p>
			<div class="clearfix"></div>
		</div>
		<hr>
		<button class="btn white pull-right actions action-share-cancel">Cancel</button>
		<button class="btn blue pull-right actions action-share-submit">Share</button>
		<div class="clearfix"></div>
	</div>
</div>
