$(function(){

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

});