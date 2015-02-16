$(document).ready(function(){
	
	$(".service-add-btn").on('click', function(){
		$(".service-add-new").slideDown();
	});
	
	$(".service-add-new .btn").on('click', function(){
		$(".service-add-new").slideUp();
		_ajax('dashboard/institution/services/addService',{
			name: $(".service-add-new input").val()
		},function(response){
			if(response.status=='TRUE'){
				var tmpServiceBox = $("#factory .service-item").clone().appendTo(".service-list");
				tmpServiceBox.attr("id", "service_"+response.info.id);
				$("h4", tmpServiceBox).text(response.info.name);
				$(".service-add-new input").val("");
			}
		},'POST');
	});
	
	$(".services .delete").on('click', function(){
		$(this).parent().slideUp();
		_ajax('dashboard/institution/services/removeService',{
			id: $(this).data('id'),
			mirror: $(this).data('id')
		},function(response){
			if(response.status!='TRUE'){
				$("#service_"+response.mirror).slideDown();
			}
		},'POST');
	});
	
});