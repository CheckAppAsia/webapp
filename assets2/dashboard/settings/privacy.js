$(document).ready(function(){
    
    $("#profile_pset").change(function(){
        $.ajax({ 
            'url': baseUrl+"dashboard/settings/changePrivacy",
            'data': {
                'setting_id':$("#profile_pset").attr("var"),
                'setting_val':$("#profile_pset").val()
            },
            'dataType': "json",
            'type': "POST",
            'success': function(data){
                if(data.status==1){
                    alert("Successfully changed setting.");
                    
                }else{
                    alert("Change setting failed. Please try again.");
                }
            }
        });
    });

    $("#lookup_pset").change(function(){
        $.ajax({ 
            'url': baseUrl+"dashboard/settings/changePrivacy",
            'data': {
                'setting_id':$("#lookup_pset").attr("var"),
                'setting_val':$("#lookup_pset").val()
            },
            'dataType': "json",
            'type': "POST",
            'success': function(data){
                if(data.status==1){
                    alert("Successfully changed setting.");
                    
                }else{
                    alert("Change setting failed. Please try again.");
                }
            }
        });
    });

});