$(document).ready(function(){
	
	/* Show/Hide appointment Actions */
	var actions;
	$(".appoint-daily").on('mouseenter', '.appointments li.active .apt', function(){
		var target = $(this).find(".patient-pic").offset();
			targetY = target.top - $(window).scrollTop();
			targetX = target.left - $(window).scrollLeft();
			parent = $(".appoint-daily").offset();
			parentY = parent.top - $(window).scrollTop();
			parentX = parent.left - $(window).scrollLeft();
			finalY = (targetY - parentY) + 33;
			finalX = (targetX - parentX) - 5;
			username = $(this).find(".patient-pic").attr('data-username');
			appt_id = $(this).find(".patient-pic").attr('data-appt');
		
		$("#appoint-action .user_link").attr("href",baseUrl+"user/"+username+"/profile");
		$("#appoint-action .appt_link").attr("href",baseUrl+"dashboard/physician/appointments/"+appt_id);
		
		$("#appoint-action").css({
			top:finalY+"px",
			left:finalX+"px", 
		}).stop(true,true).fadeIn('fast');
		
		$(".appoint-daily .patient-pic.active").removeClass("active");
		$(this).find(".patient-pic").addClass("active");
		
		$(".appoint-daily").on('mouseenter', '.patient-pic', function(){
			target = $(this).offset();
			targetY = target.top - $(window).scrollTop();
			targetX = target.left - $(window).scrollLeft();
			parent = $(".appoint-daily").offset();
			parentY = parent.top - $(window).scrollTop();
			parentX = parent.left - $(window).scrollLeft();
			finalY = (targetY - parentY) + 33;
			finalX = (targetX - parentX) - 5;
			username = $(this).attr('data-username');
			appt_id = $(this).attr('data-appt');
			
			$("#appoint-action .user_link").attr("href",baseUrl+"user/"+username+"/profile");
			$("#appoint-action .appt_link").attr("href",baseUrl+"dashboard/physician/appointments/"+appt_id);
			$("#appoint-action").css({
				top:finalY+"px",
				left:finalX+"px", 
			}).stop(true,true).fadeIn('fast');
		});
		
		// Close Appointment Menu
		$(".appoint-daily").on('click',"#appoint-action .close",function(){
			$(".appoint-daily .patient-pic.active").removeClass("active");
			$("#appoint-action").stop(true,true).fadeOut('fast');
		});
		
		clearTimeout(actions);
	}).on('mouseleave', '.appointments li.active', function(){
		actions = setTimeout(function(){
			$(".appoint-daily .patient-pic.active").removeClass("active");
			$("#appoint-action").stop(true,true).fadeOut('fast');
		}, 650);
	});
	
	$("body").on('mouseenter', "#appoint-action", function(){
		clearTimeout(actions);
	}).on('mouseleave', "#appoint-action", function(){
		actions = setTimeout(function(){
			$(".appoint-daily .patient-pic.active").removeClass("active");
			$("#appoint-action").stop(true,true).fadeOut('fast');
		}, 650);
	});
	
	/*
	$(".appoint-daily").on('click','.patient-pic', function(e) {
		e.stopPropagation();
	});
	$(document).on('click', function (e) {
		$(".appoint-daily .patient-pic.active").removeClass("active");
		$("#appoint-action").fadeOut('fast');
	});
	*/
	
	/* Change Date */
	$(".change_date").on("click",function(){
		return false; // anti-link
	});
	
	
	/******************************
	**		CALENDAR MODULE		**
	****************************/
	
	/* Get days in month*/
	function daysInMonth(year, month){
		return new Date(year, month, 0).getDate();
	}
	
	/* Determine what day is 1st day of month */
	function firstDayInMonth(year, month){
		return new Date(year, month, 1).getDay();
	}

	function prevNext(action){
		var months_txt = {'1':'January', '2':'Febuary', '3':'March', '4':'April', '5':'May', '6':'June', '7':'July', '8':'August', '9':'September', '10':'October', '11':'November', '12':'December'};
		month_holder = $(".table-calendar .cal-navi td .month");
		year_holder = $(".table-calendar .cal-navi td .year");
		cur_month = month_holder.attr("data-month");
		cur_year = year_holder.attr("data-year");
		
		if(action=="prev"){
			month = (cur_month==1) ? 12 : cur_month-1;
			year = (cur_month==1) ? cur_year-1 : cur_year;
		}else if(action=="next"){
			month = (cur_month==12) ? 1 : parseInt(cur_month)+1;
			year = (cur_month==12) ? parseInt(cur_year)+1 : cur_year;
		}else{
			month = (cur_month==12) ? 1 : parseInt(cur_month);
			year = (cur_month==12) ? parseInt(cur_year) : cur_year;
		}
		
		month_holder.attr("data-month",month).text(months_txt[month]);
		year_holder.attr("data-year",year).text(year);
		
		generateCalendar(year, month);
	}
	
	function generateCalendar(year, month){
		total_days = daysInMonth(year,month);
		first_day = firstDayInMonth(year,month-1);

		calendar_html = "";
		first_week = true;
		new_week = 0;
		for(var i=0; i<total_days; i++){
			if(new_week==0){
				calendar_html = calendar_html + "<tr>";
			}
		
			if(first_week){
				for(var x=0; x<first_day; x++){
					calendar_html = calendar_html + "<td></td>";
					new_week++;
				}
			}
			first_week = false;
			
			/* Check if date is today */
			cut_dates = phpDateToday.split("-");
			phpDay = cut_dates[0];
			phpMonth = cut_dates[1];
			phpYear = cut_dates[2];
			today = "";
			if(phpDay==(i+1) && phpMonth==month && phpYear==year){
				today = "today";
			}
			
			
			calendar_html = calendar_html + "<td id=\"cal_day_"+(i+1)+"\" class=\""+today+"\"><a href=\""+dateLink+"/"+year+"-"+month+"-"+(i+1)+"\"><span class='days-num'>"+(i+1)+"</span></a></td>";
			new_week++;
			
			if(i==(total_days-1)){
				for(var z=new_week; z<7; z++){
					calendar_html = calendar_html + "<td></td>";
				}
			}
			
			if(new_week==7){
				calendar_html = calendar_html + "</tr>";
				new_week = 0;
			}
		}
		$(".table-calendar tbody").html(calendar_html);
		load_appointments(year+"-"+month);
	}

	function load_appointments(month){
		
		_ajax('dashboard/physician/appointments/load_month/'+month, {}, function(response){
			for(dctr in response){
				var tmpCtr = parseInt(dctr, 10);
				$("#cal_day_"+tmpCtr).addClass('has-apt');
				for(actr in response[dctr]){
					if(response[dctr][actr][0]==3){
						$("#cal_day_"+tmpCtr).append('<img src="'+mediaUrl+"/userpic/50/"+response[dctr][actr][1]+'" style="width:20px; margin:2px; opacity:.4;" />');
					}else{
						$("#cal_day_"+tmpCtr).append('<img src="'+mediaUrl+"/userpic/50/"+response[dctr][actr][1]+'" style="width:20px; margin:2px;" />');
					}
				}
			}
		})
	}
	
	if(typeof onCalendar != "undefined"){
		prevNext();
	}
	$(".table-calendar .cal-navi .prev").on("click",function(){
		prevNext('prev');
	});
	$(".table-calendar .cal-navi .next").on("click",function(){
		prevNext('next');
	});
	$(".table-calendar").on('click','tbody td',function(){
		window.location = $(this).find("a").attr('href');
	});
	
	/* Diagnosis Tab */
	$(".diagnosis-form .tab_nav li").on("click",function(){
		tab = $(this).attr("data-tab");
		
		$(".diagnosis-form .tab_nav li.active").removeClass("active");
		$(this).addClass("active");
		
		$(".diagnosis-form .tab.active").removeClass("active").hide();
		$(".diagnosis-form .tab."+tab).addClass("active").show();
	});
	
	/* Create Form */
	if($("#patient_name").length>0){
		$("#patient_name").autocomplete({
			source: function(request, response) {
				$('#to_uid').val("");
				$.ajax({ 
					'url': baseUrl+"search/friend",
					'data': {
						'to':$("#patient_name").val(),
						'uid':$("#physician_id").val()
					},
					'dataType': "json",
					'type': "POST",
					'success': function(data){
						response(data);
					}
				})
			}, 
			minLength: 1,
			focus: function( event, ui ) {
				$("#patient_name").val(ui.item.title+" ("+ui.item.username+")");
				$("#patient_id").val(ui.item.uid);
				return false;
			},
			select: function( event, ui ) {
				$("#patient_name").val(ui.item.title+" ("+ui.item.username+")");
				$("#patient_id").val(ui.item.uid);
				return false;
			} 
		}).data( "ui-autocomplete" )._renderItem = function( ul, item ) {
			var src_img = "";
			var inner_html = "";
			var URL_MAIN = baseUrl;
			if(item.filename == "")
				src_img = '//checkapp-sg.s3.amazonaws.com/userpic/50/default.jpg';
			else {
				src_img = "//checkapp-sg.s3.amazonaws.com/userpic/50/" + item.filename;
			}
			inner_html = '<a><div class="list_item_container">';
			inner_html += '<div class="image pull-left">';
			inner_html += '<img class="media-object thumb" style="margin-right: 5px;" width="35" src="'+ src_img +'"></div>';
			inner_html += '<span class="media-description">' + "(" +  (item.username).toUpperCase()  + ") " + (item.title).toUpperCase() +'</span>';
			if(item.user_type==2){
				inner_html += '<div class="image pull-right">';
				inner_html += '<i class="fa fa-user-md" ></i></div>';
			}
			inner_html += '</div><div class="clearfix"></div></a>';

			return $( "<li class='media'></li>" )
			.data( "item.autocomplete", item )
			.append(inner_html)
			.appendTo( ul );
		};
	}
	
});