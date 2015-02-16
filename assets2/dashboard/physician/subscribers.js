$(document).ready(function(){

	$(".simple_tabs li").on("click",function(){
		tab = $(this).attr("data-target");
		
		$(".simple_tabs li.active").removeClass("active");
		$(this).addClass("active");
		$(".tab_content .tab.active").hide().removeClass("active");
		$(".tab_content .tab."+tab).show().addClass("active");
	});
	
	$(".remove").on("click",function(){
		var obj = $(this);
		
		$.ajax({ 
			'url': baseUrl+"ajax/subscribe",
			'data': {
				'action':'remove',
				'target_id':obj.parent().attr('target_id'),
				'target_username':''
			},
			'dataType': "json",
			'type': "POST",
			'success': function(data){
				obj.parent().fadeOut();
			}
		})
	});
	
}); 