$(function(){

	$(".lightbox-mode").on('click',function(){
		appt_id = $(this).attr("data-appt_id");
		
		$(".lightbox.diagnose .diagnose_select .simple").attr("href",baseUrl+"dashboard/physician/appointments/"+appt_id);
		
	});

});