window.CA_FEED = {
	checkpoint:'',
	isLoading:false,
	divs:{
		factory:'',
		feedList:'',
		loader:''
	},
	
	/* INITIALIZE
	--------------------------*/
	init:function(config){
		this.divs.factory = config.factory;
		this.divs.feedList = config.feedList;
		this.divs.loader = config.loader;
		this.checkpoint = config.checkpoint;
		
		$(".post-form .post-type ul li a").on("click",function(){
			var textarea = $(".post-form .tab-content .active textarea").val();
			$(".post-form .tab-content textarea").val(textarea);
		});
		
		$(".share_content .action-share-submit").on('click', function(){
			if(!CA_FEED.isLoading){
				CA_FEED.isLoading = true;
				_ajax('social/post_create', {
					post_id: $(this).data('postid'),
					message: $(".share_content textarea").val()
				}, function(response){
					CA_FEED.isLoading = false;
					$(".lightbox.share").hide();
					$(".lightbox-bg").hide();
				}, 'POST');
			}
		});
		$(".share_content .action-share-cancel").on('click', function(){
			$(".lightbox.share").hide();
			$(".lightbox-bg").hide();
		});
	},
	
	/* INIT FORM
	--------------------------*/
	hasForm:function(){
		// Privacy Drop-down
		$(".post-type .dropdown-toggle .dropdown-menu li").on('click',function(){
			icon = $(this).attr("data-icon");
			$(this).parent().parent().find(".post-viewing i").removeClass().addClass(icon);
			
			$(".post-type .dropdown-toggle .dropdown-menu").stop(true,true).animate({
				'top':'24px',
				'opacity':0
			},150,function(){ $(this).hide() });
		});
		
		// Link Preview
		$('.post-form-link').on('paste', function(){
			setTimeout(function() {
				_ajax('social/lint', {
					url: $('.post-form-link').val(),
				}, function(response){
					$('.post-form-link').hide();
					$(".link-preview").show();
					$(".link-preview .lint-img").attr("src", response.data.image);
					$(".link-preview .lint-title").text(response.data.title);
					$(".link-preview .lint-desc").text(response.data.description);
					$(".link-preview .lint-url").text(response.data.url);
					$(".linkval_image").val(response.data.image);
					$(".linkval_title").val(response.data.title);
					$(".linkval_desc").val(response.data.description);
					$(".linkval_url").val(response.data.url);
				});
				$('.post-form-link').prop('disabled', true);
			}, 100);
		});
	},
	
	/* NEWSFEED
	--------------------------*/
	loadNews:function(){
		if(!this.isLoading){
			this.isLoading= true;
			
			_ajax('social/load_feed', {
				'checkpoint': this.checkpoint
			},function(response){
				if(response.feed.length==0){
					$(CA_FEED.divs.feedList).append("<span class='empty'No more posts to display.</span>");
					$(CA_FEED.divs.loader).hide();
				}else{
					for(index in response.feed){
						CA_FEED.addFeedBox(response.feed[index]);
					}
					this.checkpoint = new Date(response.feed[response.feed.length-1].created).getTime()/1000;
				}
				CA_FEED.isLoading=false;
			});
			
		}
	},
	
	/* TIMELINE
	--------------------------*/
	loadPosts:function(targetId){
		if(!this.isLoading){
			this.isLoading= true;
			
			_ajax('social/load_timeline', {
				'targetId': targetId,
				'checkpoint': this.checkpoint
			},function(response){
				if(response.feed.length==0){
					$(CA_FEED.divs.feedList).append("<span class='empty'>No more posts to display.</span>");
					$(CA_FEED.divs.loader).hide();
				}else{
					for(index in response.feed){
						CA_FEED.addFeedBox(response.feed[index]);
					}
					this.checkpoint = new Date(response.feed[response.feed.length-1].created).getTime()/1000;
				}
				CA_FEED.isLoading=false;
			});
			
		}
	},
	
	/* VIEW SINGLE POST
	--------------------------*/
	loadPost:function(postId){
		if(!this.isLoading){
			this.isLoading= true;
			
			_ajax('social/post_get', {
				'postId': postId
			},function(response){
				CA_FEED.addFeedBox(response.postInfo);
				CA_FEED.isLoading=false;
			});
			
		}
	},
	
	/* ADD FEED BOX
	--------------------------*/
	addFeedBox:function(post){
		var tmpPostBox = $(this.divs.factory+" .feed").clone().appendTo(this.divs.feedList);
		tmpPostBox.addClass("user_type_"+post.user_type);
		tmpPostBox.attr("id", "post_"+post.id);
		
		/*----- DISPLAY DATA -----*/
		if(post.profile_pic!=""){
			//$('.poster-pic img', tmpPostBox).attr("src", mediaUrl+"/userpic/"+post.profile_pic );
			$('.poster-pic img', tmpPostBox).attr("src", userpic(post.profile_pic,'50') );
		}else{
			$('.poster-pic img', tmpPostBox).attr("src", baseUrl+"/assets2/img/system/blank_profile.jpg");
		}

		$('.top-info .poster-name', tmpPostBox).text( post.first_name +" "+post.last_name );
		if(post.user_type==1 || post.user_type==2){
			$('.top-info .poster-name', tmpPostBox).attr("href", baseUrl+"user/"+post.username );
		}else{
			$('.top-info .poster-name', tmpPostBox).attr("href", baseUrl+"institution/"+post.user_id );
		}
		$('.top-info .message', tmpPostBox).text( post.message );
		if(post.attach_type != 1){
			$('.top-info .post-photo img', tmpPostBox).hide();
		}
		$('.top-info .edit-msg', tmpPostBox).text( post.message );
		$('.top-info .timestamp', tmpPostBox).text( moment(post.created+" -0400", "YYYY-MM-DD hh:mm:ss ZZ").fromNow() );
		$('.post-directlink', tmpPostBox).attr("href", baseUrl+"post/"+post.id);
		
		/*----- ATTACHMENT -----*/
		switch(post.attach_type){
			case "1":
				//$(".post-photo img", tmpPostBox).attr("src", mediaUrl+"/attach/"+post.attach_data);
				$(".post-photo img", tmpPostBox).attr("src", attach(post.attach_data,'thumb'));
				break;
			case "2":
				var video = document.createElement('video');
				video.controls=true;
				video.src = mediaUrl+"/attach/"+post.attach_data;
				$(".post-video", tmpPostBox).append(video);
				break;
			case "3":
				var link_data = JSON.parse(post.attach_data);
				$(".post-link .lint-img", tmpPostBox).parent().attr("href", link_data.url);
				$(".post-link .lint-img", tmpPostBox).attr("src", link_data.image);
				$(".post-link .lint-title a", tmpPostBox).attr("href", link_data.url);
				$(".post-link .lint-title a", tmpPostBox).text(link_data.title);
				$(".post-link .lint-desc", tmpPostBox).text(link_data.desc);
				$(".post-link .lint-url", tmpPostBox).text(link_data.url);
				break;
			default:
				break;
		}
		
		/*----- LIKES -----*/
		if(post.me_liked==1){
			$('.action-like', tmpPostBox).hide();
		}else{
			$('.action-unlike', tmpPostBox).hide();
		}
		
		if(post.likes>0){
			if(post.likes==1){
				$('.post-likes', tmpPostBox).text( post.likes+" like" );
			}else{
				$('.post-likes', tmpPostBox).text( post.likes+" likes" );
			}
		}
		
		/*----- COMMENTS -----*/
		if(post.comments.length>0){
			for(comIx in post.comments){
				this.addCommentBox("#post_"+post.id+" .comments", post.comments[comIx]);
			}
		}else{
			$('.comment-separator', tmpPostBox).hide();
		}
		
		if(post.all_comments > post.comments.length){
			$('.view-all span', tmpPostBox).text( post.all_comments );
		}else{
			$('.view-all', tmpPostBox).hide();
		}
		
		/*----- ACTION: EDIT -----*/
		$(".post-editing", tmpPostBox).hide();
		
		$(".post-edit", tmpPostBox).data('postid', post.id);
		$(".post-edit", tmpPostBox).on('click', function(){
			$("#post_"+$(this).data('postid')+" .top-info .message").hide();
			$("#post_"+$(this).data('postid')+" .top-info .post-editing").show();
		});
		
		$(".post-edit-cancel", tmpPostBox).data('postid', post.id);
		$(".post-edit-cancel", tmpPostBox).on('click', function(){
			$("#post_"+$(this).data('postid')+" .top-info .message").show();
			$("#post_"+$(this).data('postid')+" .top-info .post-editing").hide();
		});
		
		$(".post-edit-save", tmpPostBox).data('postid', post.id);
		$(".post-edit-save", tmpPostBox).on('click', function(){
			if(!CA_FEED.isLoading){
				CA_FEED.isLoading = true;
				$("#post_"+$(this).data('postid')+" .edit-msg").prop('disabled', true);
				_ajax('social/post_edit', {
					post_id: $(this).data('postid'),
					message: $("#post_"+$(this).data('postid')+" .edit-msg").val(),
					mirror:{ container:"#post_"+$(this).data('postid') }
				}, function(response){
					if(response.status==true){
						var newVal = $(response.mirror.container+" .top-info .edit-msg").val();
						$(response.mirror.container+" .top-info .message").text(newVal);
						$(response.mirror.container+" .top-info .message").show();
						$(response.mirror.container+" .top-info .post-editing").hide();
						$(response.mirror.container+" .top-info .edit-msg").prop('disabled', false);
						$(response.mirror.container).effect("highlight", {color:"#afa"}, 2000);
					}else{
						$(response.mirror.container).effect("highlight", {color:"#faa"}, 1000);
					}
					CA_FEED.isLoading = false;
				}, 'POST');
			}
		});
		
		/*----- ACTION: DELETE -----*/
		$(".post-delete", tmpPostBox).data('postid', post.id);
		$(".post-delete", tmpPostBox).on('click', function(){
			if(!CA_FEED.isLoading){
				CA_FEED.isLoading = true;
				
				confirm_delete = confirm("Are you sure you want to delete this post? \n\n OK = Yes, Cancel = No");
				if(confirm_delete == true){
					_ajax('social/post_delete', {
						post_id: $(this).data('postid'),
						mirror:{ container:"#post_"+$(this).data('postid') }
					}, function(response){
						if(response.status==true){
							$(response.mirror.container).slideUp();
						}else{
							$(response.mirror.container).effect("highlight", {color:"#faa"}, 2000);
						}
						CA_FEED.isLoading = false;
					}, 'POST');
				}else{
					CA_FEED.isLoading = false;
				}
			}
		});
		
		/*----- ATTACHMENT CLICKS -----*/
		$(".post-photo img", tmpPostBox).on('click', function(){
			// enlarge photo with lightbox
		});
		
		/*----- ACTION: LIKE -----*/
		$(".action-like", tmpPostBox).data('postid', post.id);
		$(".action-like", tmpPostBox).on('click', function(){
			if(!CA_FEED.isLoading){
				CA_FEED.isLoading = true;
				_ajax('social/like_create', {
					post_id: $(this).data('postid'),
					mirror:{ container:"#post_"+$(this).data('postid') }
				}, function(response){
					$(response.mirror.container+' .action-like').hide();
					$(response.mirror.container+' .action-unlike').show();
					if(response.likes==0){
						$(response.mirror.container+' .post-likes').text("");
					}else if(response.likes==1){
						$(response.mirror.container+' .post-likes').text( response.likes+" like" );
					}else{
						$(response.mirror.container+' .post-likes').text( response.likes+" likes" );
					}
					CA_FEED.isLoading = false;
				}, 'POST');
			}
		});
		
		/*----- ACTION: UNLIKE -----*/
		$(".action-unlike", tmpPostBox).data('postid', post.id);
		$(".action-unlike", tmpPostBox).on('click', function(){
			if(!CA_FEED.isLoading){
				CA_FEED.isLoading = true;
				_ajax('social/like_delete', {
					post_id: $(this).data('postid'),
					mirror:{ container:"#post_"+$(this).data('postid') }
				}, function(response){
					$(response.mirror.container+' .action-like').show();
					$(response.mirror.container+' .action-unlike').hide();
					if(response.likes==0){
						$(response.mirror.container+' .post-likes').text("");
					}else if(response.likes==1){
						$(response.mirror.container+' .post-likes').text( response.likes+" like" );
					}else{
						$(response.mirror.container+' .post-likes').text( response.likes+" likes" );
					}
					CA_FEED.isLoading = false;
				}, 'POST');
			}
		});
		
		/*----- ACTION: SHARE -----*/
		$(".action-share", tmpPostBox).data('postid', post.id);
		$(".action-share", tmpPostBox).on('click', function(){
			var myPostBox = $("#post_"+$(this).data('postid'));
			$(".share_content .img_preview").attr("src",$(".poster-pic img", myPostBox).attr("src"));
			$(".share_content .title").text($(".poster-name", myPostBox).text()+":");
			$(".share_content .from").text("");
			$(".share_content .desc").text($(".message", myPostBox).text());
			$(".share_content .action-share-submit").data('postid', $(this).data('postid'));
		});
		
		/*----- ACTION: COMMENT -----*/
		$(".comment-form form .input-tx", tmpPostBox).data('postid', post.id);
		$(".comment-form form", tmpPostBox).on('submit', function(e){
			e.preventDefault();
			if(!CA_FEED.isLoading){
				CA_FEED.isLoading = true;
				_ajax('social/comment_create', {
					post_id: $('.input-tx', this).data('postid'),
					message: $('.input-tx', this).val(),
					mirror:{ container:"#post_"+$('.input-tx', this).data('postid') }
				}, function(response){
					CA_FEED.addCommentBox(response.mirror.container+" .comments", response.comment_record);
					$(response.mirror.container+' .comment-form form .input-tx').val("");
					CA_FEED.isLoading = false;
				}, 'POST');
			}
		});
		
		/*----- DISPLAY -----*/
		tmpPostBox.fadeIn();
	},
	
	/* ADD COMMENT BOX
	--------------------------*/
	addCommentBox:function(container, comment){
		var tmpCommBox = $(this.divs.factory+" .comment-box").clone().appendTo(container);
			
		if(comment.profile_pic!=""){
			$('.user-pic', tmpCommBox).attr("src", mediaUrl+"/userpic/50/"+comment.profile_pic );
		}else{
			$('.user-pic', tmpCommBox).attr("src", mediaUrl+"/userpic/50/defualt.jpg");
		}
		
		$('.comm-user', tmpCommBox).text( comment.first_name+" "+comment.last_name );
		$('.comm-user', tmpCommBox).attr("href", baseUrl+"user/"+comment.username );
		$('.message', tmpCommBox).text( comment.message );
		$('.timestamp', tmpCommBox).text( moment(comment.created+" -0400", "YYYY-MM-DD hh:mm:ss ZZ").fromNow() );
		
	}
};