$(function(){

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