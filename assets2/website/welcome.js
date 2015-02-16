var emailValue = "";
var usernameValue = "";

$(document).ready(function(){
	
	$("#username").on('blur',function(){
		checkUsername();
	});
	
	$("#username").on('keyup',function(){
		if($(this).val() != usernameValue){
			usernameValue = $(this).val();
			checkUsername();
		}
	});
	
	function checkUsername(){
		var username = $("#username").val();
		$.ajax({
			dataType: "json",
			type: "GET",
			url: baseUrl+"rest/user/accountAvailability", 
			data: { 'username' : username },
			complete: function(data){
				if(!data.status){
					$("#username").addClass("exist").attr("data-exist",1).next(".form-warning").fadeIn('fast');
				}else{
					$("#username").attr("data-exist",0).next(".form-warning").fadeOut('fast');
				}
			}
		});
	}
	
	$("#email").on('blur',function(){
		checkEmail();
	});
	
	$("#email").on('keyup', function(){
		if($(this).val() != emailValue){
			emailValue = $(this).val();
			checkUsername();
		}
	});
	
	function checkEmail(email){
		var email = $("#email").val();
		$.ajax({
			dataType: "json",
			type: "GET",
			url: baseUrl+"rest/user/accountAvailability", 
			data: { 'email' : email },
			complete: function(data){
				if(!data.status){
					$("#email").addClass("exist").attr("data-exist",1).next(".form-warning").fadeIn('fast');
				}else{
					$("#email").attr("data-exist",0).next(".form-warning").fadeOut('fast');
				}
			}
		});
	}

	$(".sign-up-form form").submit(function(){
		var has_error = false;
		
		var username = $("#username").val();
		checkUsername(username);
		
		var email = $("#email").val();
		checkEmail(email);
		
		$(".error-box").fadeOut('fast');
		$(".error-box").text("");
		
		// Check if all fields are filled up
		$(".sign-up-form form .input-tx").each(function(){
			if($(this).val()==""){
				has_error = true;
				$(this).addClass("require-field");
				$(".error-box").text("Please fill up empty fields.").slideDown();
			}
		});
		
		/*
		// Check if password match
		if($(".password").val() != $(".retype-password").val()){
			has_error = true;
			$(".password, .retype-password").addClass("require-field");
			$(".error-box").text("Your passwords did not match.").slideDown();
		}
		*/
		
			
		if($("#username").attr("data-exist")==1){
			has_error = true;
			$("#username").addClass("require-field");
		}
				
		if($("#email").attr("data-exist")==1){
			has_error = true;
			$("#email").addClass("require-field");
		}
		
		if(has_error){
			return false;
		}else{
			$(".error-box").slideUp();
			return true;
		}
	});
	
	$(".sign-up-form").on('keypress', ".require-field", function(){
		$(this).removeClass("require-field").addClass("had-error");
	}).on('blur', ".had-error", function(){
		if($(this).val()=="")
			$(this).addClass("require-field")
	});

});