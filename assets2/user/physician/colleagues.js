$(document).ready(function(){

	$(".simple_tabs li").on("click",function(){
		tab = $(this).attr("data-target");
		
		$(".simple_tabs li.active").removeClass("active");
		$(this).addClass("active");
		$(".tab_content .tab.active").hide().removeClass("active");
		$(".tab_content .tab."+tab).show().addClass("active");
	});
	
});