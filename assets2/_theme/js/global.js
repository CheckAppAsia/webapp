var tmpChatFriendBox = {};

$(document).ready(function(){
	
	
	/* Reseter */
	$(window).resize(function(){
		if($(window).width() >= 992){
			//console.log(1);
			$(".sidebar_widget, .friends_widget").hide();
			$("body").css("overflow","auto");
		}
	});
	
	$(".js-toggle").on('click',function(){
		if($(this).hasClass("sidebar_left")){
			$(".sidebar_widget").show('slide',{direction:'left'},450);
			$("body").css("overflow","hidden");
		}else if($(this).hasClass("sidebar_right")){
			$(".friends_widget").show('slide',{direction:'right'},450);
			$("body").css("overflow","hidden");
		}else{
			var target = $(this).attr("data-target");
			target = $(target);
			
			if(target.hasClass("collapse"))
			target.animate("height","180px").removeClass("collapse");
			else
			target.animate("height","1px").addClass("collapse");
		}
	});
	
	/* Navbar Global js dropdown item */
	$("body").on("mouseenter", ".dropdown-toggle", function(){
		var position = $(this).attr("data-toggle-show");
		$(this).find(".dropdown-menu").stop(true,true).show().stop(true,true).animate({
			'top':position+'px',
			'opacity':1
		},250);
	});
	$("body").on("mouseleave", ".dropdown-toggle", function(){
		var position = $(this).attr("data-toggle-hide");
		$(this).find(".dropdown-menu").stop(true,true).animate({
			'top':position+'px',
			'opacity':0
		},150,function(){ $(this).hide() });
	});
	
	/* Tab Open - show/hide */
	$(".tab-open").on('click',function(){
		$(this).parent().children(".active").removeClass("active");
		$(this).addClass("active");
		
		var tab_id = $(this).attr("data-tab-id");
		$("#"+tab_id).parent().children(".active").removeClass("active").hide();
		$("#"+tab_id).addClass("active").show();
	});
	
	/* Profile pic upload */
	$(".user-pic .profile-avatar").mousemove(function(e){
		var div = $(this);
		var x = e.pageX - div.offsetLeft;
		var y = e.pageY - div.offsetTop;
		
		$(".avatar_upload").css({
			left: ((e.pageX - div.offset().left)-10)+"px",
			top: ((e.pageY - div.offset().top)-10)+"px"
		});
	});
	$(".avatar_upload").on('change',function(){
		$(this).parent().submit();
	});
	
	/* Forms */
	$(".form_text, .form_textarea").on({
		focus:function(){
			if($(this).parent().hasClass("form_group")){
				$(this).parent().addClass("active");
			}else{
				$(this).addClass("active");
			}
		},
		blur:function(){
			if($(this).parent().hasClass("form_group")){
				$(this).parent().removeClass("active");
			}else{
				$(this).removeClass("active");
			}
		}
	});
	/*
	$(".form_text, .form_textarea").on({
		focus:function(){
			$(this).addClass("active");
		},
		blur:function(){
			$(this).removeClass("active");
		}
	});
	*/
	
	
	/* Lightbox */
	$("body").on('click',".lightbox-mode", function(){
		var target = $(this).attr("data-target");
		$(".lightbox-bg").attr("data-opened",target).fadeIn(350,function(){ $(".lightbox."+target).fadeIn('fast'); });
	});
	$(".lightbox-bg, .lightbox .close").on('click',function(){
		close_lightbox();
	});
	function close_lightbox(){
		var target = $(".lightbox-bg").attr("data-opened");
		$(".lightbox."+target).fadeOut('fast',function(){ $(".lightbox-bg").fadeOut('fast')  });
	}
	
	/* Datepicker */
	$(".datepicker").datepicker({
		showOtherMonths: true,
		selectOtherMonths: true,
		dateFormat:'yy-mm-dd',
		changeMonth: true,
		changeYear: true,
		minDate: 0,
	});
	
	/* Alert */
	setTimeout(function(){
		$(".alert-msg").slideUp();
		$(".alert-separator").slideUp();
	},5000);
	
	/* Book Now - Patient */
	$("#book_now_date").datepicker({
		showOtherMonths: true,
		selectOtherMonths: true,
		dateFormat:'yy-mm-dd',
		changeMonth: true,
		changeYear: true,
		minDate: 0,
		onSelect: function(date){
			//window.location = baseUrl + "search?date="+date;
			$("#book_now_search").submit();
		},
	});
	$(".book-now-box").on('click',function(){
		$("#book_now_date").focus();
	});
	
	/* Preview Image */
	$("body").on("click",".lb_preview",function(){
		var img  = new Image();
		img.src = $(this).attr("src");
		
		top_half = img.height / 2;
		left_half = img.width / 2;

		$(".lightbox-bg").html("<img src='"+img.src+"' class='preview_fullsize' style='margin-top:-"+top_half+"px;margin-left:-"+left_half+"px'>");
		$(".lightbox-bg").fadeIn();
		
		$(".lightbox-bg").on("click",function(){
			$(".lightbox-bg").fadeOut();
		});
	});
	$("body").on("click",".preview_fullsize",function(){
		$(".lightbox-bg").fadeOut("fast");
	});
	
	/* Notifications */
	if(loggedIn == 1){
		// get_notifs_ajax();
		// setInterval(function(){get_notifs_ajax();},15000);
	}
	
	
	if($(".chat-bar").length){
		_ajax('social/online',{},function(response){
			// Fill-in Doctors/Patients List
			$(".chat-bar .online-head-1 span").text(response.head1);
			$(".chat-bar .list_doctors ul").html("")
			for(cdi in response.doctors){
				var tmpChatFriendBox = $(".chat-factory .chat-doctor").clone().appendTo(".chat-bar .list_doctors ul");
				$("img", tmpChatFriendBox).attr("src", mediaUrl+"/userpic/50/"+response.doctors[cdi].profile_pic);
				$("span", tmpChatFriendBox).text(response.doctors[cdi].first_name+" "+response.doctors[cdi].last_name);
				$("a", tmpChatFriendBox).attr("href", baseUrl+"user/"+response.doctors[cdi].username);
				$("a", tmpChatFriendBox).attr("onclick", "javascript:chatWith('"+response.doctors[cdi].username+"', '"+response.doctors[cdi].first_name+" "+response.doctors[cdi].last_name+"')");
			}
			
			// Fill-in Friends/Colleagues List
			$(".chat-bar .online-head-2 span").text(response.head2);
			$(".chat-bar .list_friends ul").html("")
			for(cfi in response.friends){
				var tmpChatFriendBox = $(".chat-factory .chat-friend").clone().appendTo('.chat-bar .list_friends ul');
				$("img", tmpChatFriendBox).attr("src", mediaUrl+"/userpic/50/"+response.friends[cfi].profile_pic);
				$("span", tmpChatFriendBox).text(response.friends[cfi].first_name+" "+response.friends[cfi].last_name);
				$("a", tmpChatFriendBox).attr("href", "javascript:void(0)");
				$("a", tmpChatFriendBox).attr("onclick", "javascript:chatWith('"+response.friends[cfi].username+"', '"+response.friends[cfi].first_name+" "+response.friends[cfi].last_name+"')");
			}
		});
	}
	
	
	//education form slide
	$("#showEducForm").on('click',function(){
			$("#physProfEducForm").slideDown();
	});
	
	//show edit school
	$(".schoolInfo .editSchool").each(function(){
		$(this).on('click', function(e){
			$(this).parents(".schoolInfo").find(".editSchoolForm").slideDown();
			$(this).parents(".schoolInfo").find(".schoolDetails").hide();
			e.preventDefault();
	        return;
		});
	});
	
	$("#schoolListing .cancelEduc").each(function(){
		$(this).on('click', function(e){
			$(this).parents(".schoolInfo").find(".editSchoolForm").slideUp();
			$(this).parents(".schoolInfo").find(".schoolDetails").show();
			e.preventDefault();
	        return;
		});
	});
	
	
	//add educ form
	$("#addEducForm").bind('submit', function (e) {
        $.ajax({ 
            'url': baseUrl+"dashboard/physician/profile/addSchool",
            'data':  $(this).serialize(),
            'dataType': "json",
            'type': "POST",
            'success': function(){
            }
        });
        
        e.preventDefault();
        return;
	});
	
	
	//add specialization
	$(".addSpecialization").on('click', function (e) {
		
        $.ajax({ 
            'url': baseUrl+"dashboard/physician/profile/addSpecialization",
            'data': {
            	'specialization':  $(".spzl").val(),
                'specialization_id':  $("#specializationId").val(),
    		},
            'dataType': "json",
            'type': "POST",
            'success': function(data){
            
          //  var t = '<div style="border: #eee solid 1px; min-width:20px; margin: 3px; float: left; padding: 5px;">
			//	ddd<i class="fa fa-times pull-right"></i></div>'
            	
            	//$("#specializationList").html(data);
            	
            }
        });
	});
	
	
	//add affiliation
	$("#addAffiliation").on('click', function (e) {
		
        $.ajax({ 
            'url': baseUrl+"dashboard/physician/profile/addAffiliation",
            'data': {
            	'affiliation':  $("#affiliation").val(),
                'affiliation_id':  $("#affiliationId").val(),
    		},
            'dataType': "json",
            'type': "POST",
            'success': function(data){
            
          //  var t = '<div style="border: #eee solid 1px; min-width:20px; margin: 3px; float: left; padding: 5px;">
			//	ddd<i class="fa fa-times pull-right"></i></div>'
            	
            	//$("#affiliationList").html(data);
            	
            }
        });
	});
	
	
	//add affiliation
	$("#addHonor").on('click', function (e) {
		
		
		console.log($(this).parents('.schoolInfo').find(".school_id").html());
		return;
		
        $.ajax({ 
            'url': baseUrl+"dashboard/physician/profile/addHonor",
            'data': {
            	'honor':  $("#honor").val(),
            	'school_id':  1,
    		},
            'dataType': "json",
            'type': "POST",
            'success': function(data){
            }
        });
	});
	
	
});

/* Notifications */
function see_notification(id, type, data){
	
	$.ajax({ 
		'url': baseUrl+"dashboard/notifications/clicked",
		'data': {
			'id':id,
			'type':type,
			'data':data
		},
		'dataType': "json",
		'type': "POST",
		'success': function(data){
			//alert(1);
			//window.open(data);
			window.location.href = data ;
		}
	});
}

function formatDate(x){
	var datetime = x.split(" ");
	var date = datetime[0].split("-");
	var time = datetime[1].split(":");
	var d = new Date(date[0],date[1]-1,date[2],time[0],time[1],time[2]);
	var months = ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'];
	var hours = ['12','1','2','3','4','5','6','7','8','9','10','11','12','1','2','3','4','5','6','7','8','9','10','11'];
	var ampm = ['am','am','am','am','am','am','am','am','am','am','am','am','pm','pm','pm','pm','pm','pm','pm','pm','pm','pm','pm','pm'];
	
	return months[d.getMonth()] + '-' + d.getDate() + '-' + d.getFullYear() + "<br/>" + hours[d.getHours()] + ":" + (d.getMinutes()<10?'0':'') + d.getMinutes() + ampm[d.getHours()];
}

var global_count_threads = 0,
	global_count_notif = 0,
	first_run = true;

function get_notifs_ajax(){
	$.ajax({ 
		'url': baseUrl+"dashboard/notifications/get_notifications",
		'data': {
		
		},
		'dataType': "json",
		'type': "POST",
		'success': function(data){
			if(data.threads.count>0){
				$("#ajax_notif_msg_count").html(data.threads.count);
				$("#ajax_notif_msg_count").show();
				if(global_count_threads<data.threads.count){
					global_count_threads=data.threads.count;
					if(first_run!=true){
						$("#ajax_notif_msg_count").effect("pulsate",800);
					}
				}
			}else{
				$("#ajax_notif_msg_count").hide();
			}
			if(data.notifs.count>0){
				$("#ajax_notif_count").html(data.notifs.count);
				$("#ajax_notif_count").show();
				if(global_count_notif<data.notifs.count){
					global_count_notif=data.notifs.count;
					if(first_run!=true){
						$("#ajax_notif_count").effect("pulsate",800);
					}
				}
			}else{
				$("#ajax_notif_count").hide();
			}
			first_run=false;
			
			var msg_counter = 0;
			var msgs = "";
			if(data.threads.message != undefined){
				$.each(data.threads.message, function(i, item1) {
					if(item1.actor != undefined){
						msgs+=	'<li class="media inner-all" onclick="window.location.href=\''+baseUrl+'dashboard/messages?mid='+item1.tid+'\'">';
						msgs+=	'<a class="pull-left" href="'+baseUrl+'user/'+item1.username+'">';
						if(item1.filename!=""){
						msgs+=	'<img class="media-object thumb" src="' + userpic(item1.filename,'50') + '" width="50">';
						}else{
						msgs+=	'<img class="media-object thumb" src="' + userpic('default.jpg','50') + '" width="50">';
						}
						msgs+=	'</a>';
						msgs+=	'<span class="label">';
						msgs+=	formatDate(item1.created);
						msgs+=	'</span>';
						msgs+=	'<div class="media-body">';
						msgs+=	'<h5 class="media-heading">';
						msgs+=	item1.actor.substring(0,20);
						msgs+=	'</h5>';
						msgs+=	'<p class="margin-none">';
						msgs+=	item1.message.substring(0,20);
						msgs+=	'</p>';
						msgs+=	'</div>';
						msgs+=	'</li>';
					}
				});
			}
			if(data.threads.message.item != undefined){
				$.each(data.threads.message.item, function(i, item1) {
					if(item1.actor != undefined){
						msgs+=	'<li class="media inner-all" onclick="window.location.href=\''+baseUrl+'dashboard/messages?mid='+item1.tid+'\'">';
						msgs+=	'<a class="pull-left" href="'+baseUrl+'user/'+item1.username+'">';
						if(item1.filename!=""){
						msgs+=	'<img class="media-object thumb" src="' + userpic(item1.filename,'50') + '" width="50">';
						}else{
						msgs+=	'<img class="media-object thumb" src="' + userpic('default.jpg','50') + '" width="50">';
						}
						msgs+=	'</a>';
						msgs+=	'<span class="label">';
						msgs+=	formatDate(item1.created);
						msgs+=	'</span>';
						msgs+=	'<div class="media-body">';
						msgs+=	'<h5 class="media-heading">';
						msgs+=	item1.actor.substring(0,20);
						msgs+=	'</h5>';
						msgs+=	'<p class="margin-none">';
						msgs+=	item1.message.substring(0,20);
						msgs+=	'</p>';
						msgs+=	'</div>';
						msgs+=	'</li>';
					}
				});
			}
			
			var ntf_counter = 0;
			var ntfs = "";
			$.each(data.notifs, function(i, item2){
				if(item2.actor != undefined){
					var notif_data = "";
					var notif_text = "";
					switch(item2.type){
						case "1":
							notif_data = item2.username;
							notif_text = "sent you a friend request";
							break;
						case "2":
							notif_data = item2.username;
							notif_text = "accepted your friend request";
							break;
						case "3":
							notif_data = item2.username;
							notif_text = "subscribed to you";
							break;
						case "4":
							notif_data = item2.post_id;
							notif_text = "commented on your post";
							break;
						case "5":
							notif_data = item2.post_id;
							notif_text = "posted on your wall";
							break;
						case "6":
							notif_data = item2.actor;
							notif_text = "sent you a message";
							break;
						case "7":
							notif_data = item2.username;
							notif_text = "requested a booking";
							break;
						case "8":
							notif_data = item2.username;
							notif_text = "accepted your booking";
							break;
						case "9":
							notif_data = item2.post_id;
							notif_text = "commented on a post on your wall";
							break;
						default:
							notif_data = "---";
							notif_text = "---";
							break;
					}
					ntfs += '<li class="media inner-all" onclick="see_notification('+item2.id+','+item2.type+',\''+notif_data+'\')">';
					ntfs +=	'<a class="pull-left" href="'+baseUrl+'user/'+item2.username+'">';
					if(item2.filename!=""){
					//ntfs +=	'<img class="media-object thumb" src="//checkapp-sg.s3.amazonaws.com/userpic/50/' + item2.filename + '" width="50">';
					//msgs+=	'<img class="media-object thumb" src="//checkapp-sg.s3.amazonaws.com/userpic/50/' + item1.filename + '" width="50">';
					ntfs+=	'<img class="media-object thumb" src="' + userpic(item2.filename,'50') + '" width="50">';
					}else{
					ntfs +=	'<img class="media-object thumb" src="//checkapp-sg.s3.amazonaws.com/userpic/50/default.jpg" width="50">';
					}
					ntfs +=	'</a>';
					ntfs +=	'<span class="label">';
					ntfs +=	formatDate(item2.created);
					ntfs +=	'</span>';
					ntfs +=	'<div class="media-body">';
					ntfs +=	'<h5 class="media-heading">';
					ntfs +=	item2.actor.substring(0,20);
					ntfs +=	'</h5>';
					ntfs +=	'<p class="margin-none">';
					ntfs +=	notif_text;
					ntfs +=	'</p>';
					ntfs +=	'</div>';
					ntfs +=	'</li>';
				}
			});
			
			$("#ajax_notif_msgs").html(msgs);
			$("#ajax_notifs").html(ntfs);
			
		}
	});
}
	
function userpic(filename,size){
	var url;
	switch(size){
		case 'max' :
			url = base_s3+"/userpic/max/"+filename;
			break;
		case '50' :
			url = base_s3+"/userpic/50/"+filename;
			break;
		case '150' :
			url = base_s3+"/userpic/150/"+filename;
			break;
		default :
			url = base_s3+"/userpic/150/"+filename;
			break;
	}
	return url;
}

function attach(filename,size){
	var url;
	switch(size){
		case 'max' :
			url = base_s3+"/attach/max/"+filename;
			break;
		case 'thumb' :
			url = base_s3+"/attach/450/"+filename;
			break;
		default :
			url = base_s3+"/attach/450/"+filename;
			break;
	}
	return url;
}


/* UTILITY FUNCTIONS
--------------------------------------------------------*/
function _ajax(action, params, callback, method){
	if(typeof method == "undefined"){ method="GET"; }
	$.ajax({
		type:method,
		url:baseUrl+action,
		data:params,
		success:function(response){
			callback(JSON.parse(response));
		}
	});
}

function alert_r(data){
	alert(JSON.stringify(data,null,'     '));
}