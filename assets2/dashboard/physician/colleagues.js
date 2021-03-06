$(document).ready(function(){

	$(".simple_tabs li").on("click",function(){
		tab = $(this).attr("data-target");
		
		$(".simple_tabs li.active").removeClass("active");
		$(this).addClass("active");
		$(".tab_content .tab.active").hide().removeClass("active");
		$(".tab_content .tab."+tab).show().addClass("active");
	});
	
	$(".unfriend").on("click",function(){
		var obj = $(this);
		
		$.ajax({ 
			'url': baseUrl+"ajax/friend",
			'data': {
				'action':'remove',
				'target_id':obj.parent().attr('target_id'),
				'target_username':''
			},
			'dataType': "json",
			'type': "POST",
			'success': function(data){
				obj.parent().parent().fadeOut();
			}
		})
	});
	
	$(".accept").on("click",function(){
		var obj = $(this);
		
		$.ajax({ 
			'url': baseUrl+"ajax/friend",
			'data': {
				'action':'accept',
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
	
	$(".reject").on("click",function(){
		var obj = $(this);
		
		$.ajax({ 
			'url': baseUrl+"ajax/friend",
			'data': {
				'action':'reject',
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
	
	$(".cancel").on("click",function(){
		var obj = $(this);
		
		$.ajax({ 
			'url': baseUrl+"ajax/friend",
			'data': {
				'action':'cancel',
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