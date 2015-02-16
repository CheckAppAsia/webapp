$(document).ready(function(){
	
	$(".tab_head li").on("click",function(){
		tab = $(this).attr("data-tab");
		$(".tab_head li.active").removeClass("active");
		$(this).addClass("active");
		$(".tab_body .active").hide().removeClass("active");
		$(".tab_body ."+tab).addClass("active").stop(true,true).fadeIn();
		
	});
	
});

function verify(id,uid){
	$.ajax({ 
		'url': baseUrl+"admin/physician/verify_document",
		'data': {
			'id':id,
			'uid':uid,
			'status':1
		},
		'dataType': "json",
		'type': "POST",
		'success': function(data){
			window.location.reload();
		}
	});
}
function unverify(id,uid){
	$.ajax({ 
		'url': baseUrl+"admin/physician/verify_document",
		'data': {
			'id':id,
			'uid':uid,
			'status':0
		},
		'dataType': "json",
		'type': "POST",
		'success': function(data){
			window.location.reload();
		}
	});
}