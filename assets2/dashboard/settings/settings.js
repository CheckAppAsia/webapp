$(document).ready(function(){

	$("#save_btn").click(function(){
		$("#save_btn").hide();
		$.ajax({ 
            'url': baseUrl+"dashboard/settings/changePassword",
            'data': {
                'old_pass':$("#old_pass").val(),
                'new_pass':$("#new_pass").val(),
                'con_pass':$("#con_pass").val()
            },
            'dataType': "json",
            'type': "POST",
            'success': function(data){
				if(data.status==1){
                    alert("Successfully changed password.");
                    $("#old_pass").val("");
                    $("#new_pass").val("");
                    $("#con_pass").val("");
					$("#save_btn").show();
                }else{
					alert("Change password failed. Please check your credentials and try again.");
					$("#save_btn").show();
                }
            }
        })
	});
	
});
