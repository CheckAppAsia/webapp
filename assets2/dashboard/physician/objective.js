$(function(){

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

});