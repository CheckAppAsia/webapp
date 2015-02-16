$(document).ready(function(){

	$(".lightbox.book .submit").on('click',function(){
		var patient_id = $(".lightbox.book").find(".pateint-id").val();
		var date = $(".lightbox.book").find(".form-control.date").val();
		var hour = $(".lightbox.book").find(".form-control.hour").val();
		var min = $(".lightbox.book").find(".form-control.minutes").val();
		var ampm = $(".lightbox.book").find(".form-control.ampm").val();
		var notes = $(".lightbox.book").find(".form-control.notes").val();
		var physician_id = $(".lightbox.book").find(".physician").val();
			
		if(date!="" && hour!="" && min!="" && ampm!=""){
			if(hour!="12"){
				hour = (ampm=="PM") ? parseInt(hour) + 12 : hour;
			}
			var schedule = date+" "+hour+":"+min+":00";
			$.ajax({
				dataType: "json",
				type: "POST",
				url: baseUrl+"patient/book", 
				data: {
					'patient_id':patient_id,
					'physician_id':physician_id,
					'schedule' : schedule,
					'notes': notes
				},
				success: function(response){
					if(response.status=="TRUE"){
						$(".lightbox.book").find(".success").slideDown();
						$(".lightbox.book").find(".fail").fadeOut();
					}else{
						$(".lightbox.book").find(".fail").find("p").text(response.message);
						$(".lightbox.book").find(".fail").slideDown();
						$(".lightbox.book").find(".success").fadeOut();
					}
				}
			});
		}
	
	});
	
	$(".lightbox-bg, .lightbox .close").on('click',function(){
		$(".lightbox.book").find(".success").hide();
		$(".lightbox.book").find(".fail").hide();
	});

});