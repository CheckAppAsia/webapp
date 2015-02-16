$(document).ready(function(){

	/*
	$(".make-editable").on('click',function(){
		var target = $(this).attr("data-id");
		
		$(this).hide();
		$("."+target+" .view-only").fadeOut('fast',function(){ $("."+target+" .edit-field").show() });
	});
	*/
	
	// $(".status .time").text(moment($(".status .time").text()+" +0800", "YYYY-MM-DD hh:mm:ss ZZ").fromNow());
	/*
	$(".datepicker_bday").datepicker({
		showOtherMonths: true,
		selectOtherMonths: true,
		dateFormat:'yy-mm-dd',
		changeMonth: true,
		changeYear: true,
		maxDate:0,
	});
	*/

	$("#personal-profile form").on("submit",function(){
		year = $(".date_now").attr("data-year");
		month = $(".date_now").attr("data-month");
		day = $(".date_now").attr("data-day");
		date_now = new Date(month+"/"+day+"/"+year);
		
		year_input = $(".form_select.year option:selected").text();
		month_input = $(".form_select.month option:selected").text();
		day_input = $(".form_select.day option:selected").text();
		date_input = new Date(month_input+"/"+day_input+"/"+year_input);
		
		if(date_now <= date_input){
			$('html, body').animate({
				scrollTop: $(".form_label.bday").offset().top - 100
			}, 350, function(){
				$(".form_select.month, .form_select.day, .form_select.year").effect("highlight",'1000');
			});
			return false;
		}else{
			return true;
		}
	});

});