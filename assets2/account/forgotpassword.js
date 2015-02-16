$(document).ready(function(){

	$(".forgotpassword-form form").submit(function(){
		var has_error = false;
			
		// Check if all fields are filled up
		$(".forgotpassword-form form .input-tx").each(function(){
			if($(this).val()==""){
				has_error = true;
				$(this).css("background","#fcc");
			}
		});
		
		if(has_error){
			return false;
		}else{
			return true;
		}
	});
	
	$(".forgotpassword-form").on('keypress', ".input-tx", function(){
		$(this).css("background","");
	});

});