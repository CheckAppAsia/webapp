$(document).ready(function(){
	
	$(".health_value").on('change', function(){
		_ajax('dashboard/patient/health/update', {
			health_id: $(this).data('health_id'),
			value: $(this).val(),
			mirror: {
				health_id: $(this).data('health_id')
			}
		}, function(response){
			if(response.status==true){
				$("#health_box_"+response.mirror.health_id).effect("highlight", {color:"#afa"}, 2000);
				$("#health_box_"+response.mirror.health_id+" .health_updated").text("just now");
			}else{
				$("#health_box_"+response.mirror.health_id).effect("highlight", {color:"#faa"}, 2000);
			}
		}, 'POST');
	});
	
});