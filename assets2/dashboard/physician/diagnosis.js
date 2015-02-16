$(document).ready(function(){
	
	/* Add more fields */
	$(".add_more").on("click",function(){
		if($(this).hasClass("prescription")){
			$(".clone .clone_presc").clone().appendTo(".prescription_fields");
		}else{
			$(".clone .clone_test").clone().appendTo(".test_fields");
		}
	});
	
	selectThread($("#initialtid").val());
    
    $("#messageReplyBtn").click(function(){
		$("#messageReplyBtn").hide();
		$("#loading-img").show();
        $.ajax({ 
            'url': baseUrl+"dashboard/messages/replyToThreadAppointment",
            'data': {
                'appointment_id':$("#appointment_id").val(),
                'thread_id':$("#initialtid").val(),
                'receiver':$("#receiver_id").val(),
                'message':$("#replyMessage").val()
            },
            'dataType': "json",
            'type': "POST",
            'success': function(data){
                if(data.status=="TRUE"){
					$("#replyMessage").val("");
					selectThread(data.message);
                }else{
                    alert("Oops. Something weird happened. Please try again.");
                }
            }
        });
    });
	
});

//messaging

    
function selectThread(tid){
    $("#initialtid").val(tid);
	$("#messageReplyBtn").hide();
	
    
	$.ajax({ 
		'url': baseUrl+"dashboard/messages/retrieveThread",
		'data': {
			'thread_id':tid
		},
		'dataType': "json",
		'type': "POST",
		'success': function(data){
			displayThread(data.message);
		}
	});
}
function displayThread(messages){
	
    var xfactor = 0;
    var contents = "";
	$("#messageReplyBtn").show();
    if(messages){
	$("#conversation-contents").html("");
    $.each(messages, function(i, item) {
        
        if(item.message==undefined){
            $.each(item, function(i, item){
                if(xfactor==0){
                    if(item.from_user==sender){
                        receiver=item.to_id;   
                    }else{
                        receiver=item.from_id;   
                    }
                }
                $(".clone.thread .msgcontainer").clone().appendTo("#conversation-contents")
					.find(".timestamp").text(item.created).end()
					.find("img.avatar").attr("src",userpic(item.from_file,'50')).end()
					.find(".username").text(item.from_user).end()
					.find("p").text(item.message).end();
            });
        }else{
            if(xfactor==0){
                if(item.from_user==sender){
                    receiver=item.to_id;   
                }else{
                    receiver=item.from_id;   
                }
            }
           $(".clone.thread .msgcontainer").clone().appendTo("#conversation-contents")
				.find(".timestamp").text(item.created).end()
				.find("img.avatar").attr("src",userpic(item.from_file,'50')).end()
				.find(".username").text(item.from_user).end()
				.find("p").text(item.message).end();
        }
    });
    }
    
}