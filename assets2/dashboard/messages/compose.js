$(document).ready(function(){
    
    $("#messageSendBtn").click(function(){
		$("#loading-img").show();
		$("#messageSendBtn").hide();
        $.ajax({ 
            'url': baseUrl+"dashboard/messages/sendMessage",
            'data': {
                'from':$("#uid").val(),
                'to':$("#to_uid").val(),
                'subject':$("#subject").val(),
                'message':$("#message_body").val()
            },
            'dataType': "json",
            'type': "POST",
            'success': function(data){
                if(data.status=="TRUE"){
                    //alert("Message Sent.");
                    window.location=baseUrl+"dashboard/messages";
                }else{
                    alert("Oops. Something weird happened. Please try again.");
					$("#loading-img").hide();
					$("#messageSendBtn").show();
                }
                
            }
        });
    });
    
});