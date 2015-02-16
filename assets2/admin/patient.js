$(document).ready(function(){
	
	$(".tab_head li").on("click",function(){
		tab = $(this).attr("data-tab");
		$(".tab_head li.active").removeClass("active");
		$(this).addClass("active");
		$(".tab_body .active").hide().removeClass("active");
		$(".tab_body ."+tab).addClass("active").stop(true,true).fadeIn();
		
	});
	
});