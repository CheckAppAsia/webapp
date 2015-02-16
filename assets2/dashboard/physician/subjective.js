$(function(){

	/* Search Display add/remove */
	$(".search_text").keypress(function(e){
		if(e.which == 13) {
			txt = $(this).val();
			div = $(this).attr("data-target");
			add_search(txt,div);
			$(this).val("");
		}
	});
	function add_search(txt,div){
		$(".clone_search .search_display").clone().appendTo("."+div).find("span").text(txt);
	}
	$("body").on("click",".search_display .fa-times",function(){
		$(this).parent().fadeOut("fast",function(){ $(this).remove(); });
	});
	
	
	

	/* * * * * * * * * *
		Subjective
	 * * * * * * * * * */
	$(".accords").on("click",function(){
		var id = $(this).attr("data-id");
		var _height = $("#"+id+" table").height()
		
		if($("#"+id).hasClass("toggled")){
			$("#"+id).removeClass("toggled").animate({
				height:0
			});
		}else{
			$("#"+id).addClass("toggled").animate({
				height:_height+"px"
			});
		}
	});

	$("#check_all").on('change',function(){
		if($(this).prop("checked")){
			$(".check_all_image").addClass("checked");
			$(".yesno_box .form_check.sub").prop("checked",true).change();
		}else{
			$(".check_all_image").removeClass("checked");
			$(".yesno_box .form_check.sub").prop("checked",false).change();
		}
	
	});
	
	$(".form_check.replace.sub").on('change',function(){
		target = $(this).attr("id");
		if($(this).prop("checked")){
			$(this).next("label").addClass("checked");
			$("."+target+" table .yes").each(function(){
				$(this).prop("checked",true).change();
			});
		}else{
			$(this).next("label").removeClass("checked");
			$("."+target+" table .no").each(function(){
				$(this).prop("checked",false).change();
			});
		}
	});
	
	$(".replace.yes_no").on('change',function(){
		target = $(this).attr("id")
		$("."+target).siblings("label").removeClass("checked");
		$("."+target).addClass("checked");
		
		var count = 0;
		var count_yes = 0;
		/*
		$(this).parents("table").find(".yes_no").each(function(){
			if($(this).hasClass("yes") && $(this).prop("checked")==true){
				count_yes++;
			}
			count++;
		});
		count = count/2;
		if(count == count_yes){
			console.log("all check");
			$(this).parents("table").parent().find(".heading .form_check").prop("checked",true).siblings(".check_allSUB_image").addClass("checked");
		}else{
			console.log("not all check");
			$(this).parents("table").parent().find(".heading .form_check").prop("checked",false).siblings(".check_allSUB_image").removeClass("checked");
		}
		*/
	});
	
	
	
	
	
	/* * * * * * * * * *
		Objective
	 * * * * * * * * * */
	$(".pre_fill_btn").on('click',function(){
		target = $(this).attr("data-target");
		text = $(this).siblings(".pre_fill").text();
		
		$("."+target).val(text);
	});
	
	$(".add_vitals").on("click",function(){
		vital_count = $("#vital_count").val();
		vital_count++;
		 $("#vital_count").val(vital_count);
		$(".clone_vital .vitals").clone().appendTo(".vitals_box").addClass("v"+vital_count);
	});
		
	var last_press;
	$(".vitals_box").on("click",".pain_scale",function(){
		last_press = $(this).parents(".vitals").attr("class");
		last_press = last_press.slice(-2)
	});
	
	$(".set_pain_scale").on("click",function(){
		var value = $(this).siblings(".form_text").val();
		$("."+last_press+" .pain_scale_text").val(value);
		close_lightbox();
		$(this).siblings(".form_text").val("");
	});
	
	/* Copied from global.js */
	function close_lightbox(){
		var target = $(".lightbox-bg").attr("data-opened");
		$(".lightbox."+target).fadeOut('fast',function(){ $(".lightbox-bg").fadeOut('fast')  });
	}
	
	
	
	
	/* * * * * * * * * *
		Assessment
	 * * * * * * * * * */
	
	
	
	
	
	/* * * * * * * * * *
		Plan
	 * * * * * * * * * */
	 
	 
	 
	 
	 
});