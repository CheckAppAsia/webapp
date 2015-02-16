$(document).ready(function() { 
	$("#cropBtn").click(function(){
		// alert(x1+":"+x2+"-"+y1+":"+y2+"-"+height+":"+width);
		$(this).hide();
		$("#loading-crop").show();
		$.ajax({ 
			"url": baseUrl+"photohandler/save",
			"data": {
				"filename":filename,
				"destination":"physician_verifications",
				"x1":x1,
				"x2":x2,
				"y1":y1,
				"y2":y2,
				"height":height,
				"width":width
			},
			"dataType": "json",
			"type": "POST",
			"success": function(data){
				$(this).show();
				$("#loading-crop").hide();
				$("#done").show();
				
			}
		});
	});
	$("#done").click(function(){
		window.parent.document.getElementById('photo_handler_container').style.display = 'none'; 
		//$("#photo_handler_container").hide();
	});
	$("#done").hide();
	$("#cropBtn").hide();
}); 