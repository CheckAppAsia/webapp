$(document).ready(function(){
	/*
	$(".make-editable").on('click',function(){
		var target = $(this).attr("data-id");
		
		$(this).hide();
		$("."+target+" .view-only").fadeOut('fast',function(){ $("."+target+" .edit-field").show() });
	});
	$(".datepicker_bday").datepicker({
		showOtherMonths: true,
		selectOtherMonths: true,
		dateFormat:'yy-mm-dd',
		changeMonth: true,
		changeYear: true,
		yearRange: "-120:+0",
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

    $(".emergency-form form").submit(function(){
		var has_error = false;
		var notRequired = ["middle_name", "suffix", "phone2", "email"]; 

        $(".error-box").fadeOut('fast');
        $(".error-box").text("");

        // Check if all fields are filled up
        $(".emergency-form form .input-tx").each(function(){
            if($(this).val()==""){
				if($.inArray($(this).attr('name'), notRequired) == -1) {
					has_error = true;
					$(this).addClass("require-field");
                	$(".error-box").text("Please fill up empty fields.").slideDown();
				}
			}
        });

        if(has_error){
            return false;
        }else{
            $(".error-box").slideUp();
            return true;
        }
    });

    $(".emergency-form").on('keypress', ".require-field", function(){
        $(this).removeClass("require-field").addClass("had-error");
    }).on('blur', ".had-error", function(){
        if($(this).val()=="")
            $(this).addClass("require-field")
    });
});
