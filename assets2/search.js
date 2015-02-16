//autocomplete codes for search frontpage, search page, friend

$(document).ready(function(){
    
    //start of friend autocomplete
    if ($('#to').length > 0) {
        
        $("#to").blur(function(){
            if($('#to_uid').val()==""){
                $("#to").val("");
            }
        });
        $("#to").autocomplete(
        {
            source: function(request, response) {
                $('#to_uid').val("");
                $.ajax({ 
                    'url': baseUrl+"search/friend",
                    'data': {
                        'to':$("#to").val(),
                        'uid':$("#uid").val()
                    },
                    'dataType': "json",
                    'type': "POST",
                    'success': function(data){
                        response(data);
                    }
                })
            }, 
            minLength: 1,
            focus: function( event, ui ) {
                $("#to").val(ui.item.title+" ("+ui.item.username+")");
                $("#to_uid").val(ui.item.uid);
                return false;
            },
            select: function( event, ui ) {
                $("#to").val(ui.item.title+" ("+ui.item.username+")");
                $("#to_uid").val(ui.item.uid);
                return false;
            } 
        }).data( "ui-autocomplete" )._renderItem = function( ul, item ) {
            var src_img = "";
            var inner_html = "";
            var URL_MAIN = baseUrl;
            if(item.filename == "")
                src_img = '//checkapp-sg.s3.amazonaws.com/userpic/50/default.jpg';
            else {
                src_img = "//checkapp-sg.s3.amazonaws.com/userpic/50/" + item.filename;
            }
            /*if(item.user_type==1){ //patient
                inner_html = '<a href="'+ URL_MAIN + "patient/" + item.uid +'"><div class="list_item_container">';
            }
            else if(item.user_type==2){ //physician
                inner_html = '<a href="'+ URL_MAIN + "physician/" + item.uid +'"><div class="list_item_container">';
            }
            else if(item.user_type==3){ //institution
                inner_html = '<a href="'+ URL_MAIN + "institution/" + item.uid +'"><div class="list_item_container">';
            }
            */
            inner_html = '<a><div class="list_item_container">';
            inner_html += '<div class="image pull-left">';
            inner_html += '<img class="media-object thumb" style="margin-right: 5px;" width="35" src="'+ src_img +'"></div>';
            //inner_html += '<div class="media-body">';
            inner_html += '<span class="media-description">' + "(" +  (item.username).toUpperCase()  + ") " + (item.title).toUpperCase() +'</span>';
            //inner_html += '</div>';
            if(item.user_type==2){
                inner_html += '<div class="image pull-right">';
                inner_html += '<i class="fa fa-user-md" ></i></div>';
            }
            inner_html += '</div><div class="clearfix"></div></a>';

            return $( "<li class='media'></li>" )
            .data( "item.autocomplete", item )
            .append(inner_html)
            .appendTo( ul );
        };
    }
    //end of friend autocomplete
    if ($('#searchuru').length > 0) {
        
        $("#searchuru").keypress(function(){
            getLocation();  
        });

        $("#searchuru").autocomplete(
        {
            source: function(request, response) {
                $.ajax({ 
                    'url': baseUrl+"search/results",
                    'data': {
                        'searchuru':$("#searchuru").val(),
                        'searchLat':$("#ip_latitude").val(),
                        'searchLng':$("#ip_longitude").val(),
                        'searchRad':99999999999,
                        'limit':5
                    },
                    'dataType': "json",
                    'type': "POST",
                    'success': function(data){
                        response(data);
                    }
                })
            }, 
            minLength: 1,
            focus: function( event, ui ) {
                $("#searchuru").val(ui.item.title);
                return false;
            },
            select: function( event, ui ) {
                $( "#searchuru" ).val(ui.item.title);
                return false;
            } 
        }).data( "ui-autocomplete" )._renderItem = function( ul, item ) {
            var src_img = "";
            var inner_html = "";
            var URL_MAIN = baseUrl;
            if(item.filename == "")
                src_img = '//checkapp-sg.s3.amazonaws.com/userpic/50/default.jpg';
            else {
                src_img = "//checkapp-sg.s3.amazonaws.com/userpic/50/" + item.filename;
            }
            if(item.user_type==1){ //patient
                inner_html = '<a href="'+ URL_MAIN + "user/" + item.username +'/profile"><div class="list_item_container">';
            }
            else if(item.user_type==2){ //physician
                inner_html = '<a href="'+ URL_MAIN + "user/" + item.username +'/profile"><div class="list_item_container">';
            }
            else if(item.user_type==3){ //institution
                inner_html = '<a href="'+ URL_MAIN + "institution/" + item.uid +'"><div class="list_item_container">';
            }
            
            inner_html += '<div class="image pull-left">';
            inner_html += '<img class="media-object thumb" style="margin-right: 5px;" width="35" src="'+ src_img +'"></div>';
            //inner_html += '<div class="media-body">';
            inner_html += '<span class="media-description">' + "(" +  (item.username).toUpperCase()  + ") " + (item.title).toUpperCase() +'</span>';
            //inner_html += '</div>';
            if(item.user_type==2){
                inner_html += '<div class="image pull-right">';
                inner_html += '<i class="fa fa-user-md" ></i></div>';
            }
            inner_html += '</div><div class="clearfix"></div></a>';

            return $( "<li class='media'></li>" )
            .data( "item.autocomplete", item )
            .append(inner_html)
            .appendTo( ul );
        };
    }
    //
    if ($('#searchurus').length > 0) {

        $("#searchurus").keypress(function(){
            getLocation();  
        });

        $("#searchurus").autocomplete(
        {
            source: function(request, response) {
                $.ajax({ 
                    'url': baseUrl+"search/results",
                    'data': {
                        'searchuru':$("#searchurus").val(),
                        'searchLat':$("#ip_latitude").val(),
                        'searchLng':$("#ip_longitude").val(),
                        'searchRad':$("#searchRad").val(),
                        'searchType':$("#searchType").val(),
                        'limit':5
                    },
                    'dataType': "json",
                    'type': "POST",
                    'success': function(data){
                        response(data);
                    }
                });
            }, 
            minLength: 1,
            focus: function( event, ui ) {
                $("#searchurus").val(ui.item.title);
                return false;
            },
            select: function( event, ui ) {
                $( "#searchurus" ).val(ui.item.title);
                return false;
            }
        }).data( "ui-autocomplete" )._renderItem = function( ul, item ) {
            var src_img = "";
            var inner_html = "";
            var URL_MAIN = baseUrl;
            if(item.filename == "")
                src_img = '//checkapp-sg.s3.amazonaws.com/userpic/50/default.jpg';
            else {
                src_img = "//checkapp-sg.s3.amazonaws.com/userpic/50/" + item.filename;
            }
            if(item.user_type==1){ //patient
                inner_html = '<a href="'+ URL_MAIN + "user/" + item.username +'"><div class="list_item_container">';
            }
            else if(item.user_type==2){ //physician
                inner_html = '<a href="'+ URL_MAIN + "user/" + item.username +'"><div class="list_item_container">';
            }
            else if(item.user_type==3){ //institution
                inner_html = '<a href="'+ URL_MAIN + "institution/" + item.uid +'"><div class="list_item_container">';
            }
            
            inner_html += '<div class="image pull-left">';
            inner_html += '<img class="media-object thumb" style="margin-right: 5px;" width="35" src="'+ src_img +'"></div>';
            //inner_html += '<div class="media-body">';
            inner_html += '<span class="media-description">' + "(" +  (item.username).toUpperCase()  + ") " + (item.title).toUpperCase() +'</span>';
            //inner_html += '</div>';
            if(item.user_type==2){
                inner_html += '<div class="image pull-right">';
                inner_html += '<i class="fa fa-user-md" ></i></div>';
            }
            inner_html += '</div><div class="clearfix"></div></a>';

            return $( "<li class='media'></li>" )
            .data( "item.autocomplete", item )
            .append(inner_html)
            .appendTo( ul );
        };
    }
    //
    $("#searchLoc").change(function(){
		//alert(1);
        codeAddress();   
    });
});
/*gmaps*/
function initialize() {
    var mapOptions = {
      center: new google.maps.LatLng(-34.397, 150.644),
      zoom: 8
    };
    var map = new google.maps.Map(document.getElementById("map-canvas"),
        mapOptions);
    //alert('code');
}
//initialize();

function codeAddress() {
	
    geocoder = new google.maps.Geocoder();
    var address = document.getElementById('searchLoc').value;
    var lat = 14.6090537;
    var lng = 121.02225650000003;
    //, 
	
    geocoder.geocode( { 'address': address}, function(results, status) {
        if (status == google.maps.GeocoderStatus.OK) {
            lat = results[0].geometry.location.lat();
            lng = results[0].geometry.location.lng();
            $("#searchLat").val(lat);
            $("#searchLng").val(lng);
            $("#searchLats").val(lat);
            $("#searchLngs").val(lng);
            /*map.setCenter(results[0].geometry.location);
            var marker = new google.maps.Marker({
            map: map,
            position: results[0].geometry.location
            });*/

        } else {
            alert('Location could not be verified.');
        }
    });
	
}

$(document).ready(function(){
	
	if ($('#country').length > 0) { // this line was added by Aldrin to avoid producing errors if #country was not found on page
		
		$("#country").autocomplete(
		        {
		            	source: function(request, response) {
		                    $.ajax({ 
		                        'url': baseUrl+"search/country",
		                        'data': {
		                        	 'searchuru': $("#country").val(),
		                             'limit':5
		                        },
		                        'dataType': "json",
		                        'type': "POST",
		                        'success': function(data){
		                            response(data);
		                        }
		                        
		                    });
		                }, 
			            minLength: 1,
			            focus: function( event, ui ) {
			                $("#country").val(ui.item.name);
			                return false;
			            },
			            select: function( event, ui ) {
			                $("#country").val(ui.item.name);
			                $("#countryId").val(ui.item.country_id);
			                return false;
			            } 
			        }).data( "ui-autocomplete" )._renderItem = function( ul, item ) {
			
			
			            var src_img = "";
			            var inner_html = "";
			            var URL_MAIN = baseUrl;
			            if(item.filename == "")
			                src_img = '//checkapp-sg.s3.amazonaws.com/userpic/50/default.jpg';
			            else {
			                src_img = "//checkapp-sg.s3.amazonaws.com/userpic/50/" + item.filename;
			            }
			
			            inner_html = '<a><div class="list_item_container">';
			            inner_html += '<span class="media-description">' + (item.name) + '</span>';
			            inner_html += '</div><div class="clearfix"></div></a>';
			            return $( "<li class='media'></li>" )
			            .data( "item.autocomplete", item )
			            .append(inner_html)
			            .appendTo( ul );
			        };
	}	// this line was added by Aldrin to avoid producing errors if #country was not found on page	
	
	
	
	//school auto complete
if ($('#schoolName').length > 0) { // this line was added by Aldrin to avoid producing errors if #country was not found on page
		
		$("#schoolName").autocomplete(
		        {
		            	source: function(request, response) {
		                    $.ajax({ 
		                        'url': baseUrl+"search/school",
		                        'data': {
		                        	 'searchuru': $("#schoolName").val(),
		                             'limit':5
		                        },
		                        'dataType': "json",
		                        'type': "POST",
		                        'success': function(data){
		                            response(data);
		                        }
		                        
		                    });
		                }, 
			            minLength: 1,
			            focus: function( event, ui ) {
			                $("#schoolName").val(ui.item.name);
			                return false;
			            },
			            select: function( event, ui ) {
			                $("#schoolName").val(ui.item.name);
			               $("#schoolNameId").val(ui.item.country_id);
			                return false;
			            } 
			        }).data( "ui-autocomplete" )._renderItem = function( ul, item ) {
			           //  console.log(item.name);
			            var inner_html = "";
			            inner_html = '<a><div class="list_item_container">';
			            inner_html += '<span class="media-description">' + (item.name) + '</span>';
			            inner_html += '</div><div class="clearfix"></div></a>';
			            return $( "<li class='media'></li>" )
			            .data( "item.autocomplete", item )
			            .append(inner_html)
			            .appendTo( ul );
			        };
	}	
	
if($("#specialization").length > 0) {

$("#specialization").autocomplete(
        {
            	source: function(request, response) {
                    $.ajax({ 
                        'url': baseUrl+"search/specialization",
                        'data': {
                        	 'searchuru': $("#specialization").val(),
                             'limit':5
                        },
                        'dataType': "json",
                        'type': "POST",
                        'success': function(data){
                            response(data);
                            
                            //if not in the list clear value
                            if(0 == data.length) {
                            	
                            	 $("#specializationId").val('');
                            	
                            }
                        }
                        
                    });
                }, 
	            minLength: 3,
	            focus: function( event, ui ) {
	                $("#specialization").val(ui.item.specialization);
	                return false;
	            },
	            select: function( event, ui ) { 
                    $("#specialization").val(ui.item.specialization);
                    $(".spzl").val(ui.item.specialization);
	                $("#specializationId").val( ui.item.specialization_id ); 
                    return false;
	            } 
	        }).data( "ui-autocomplete" )._renderItem = function( ul, item ) {
                 var inner_html = "";
                inner_html = '<a><div class="list_item_container">';
             inner_html += '<span class="media-description">' + item.specialization + '</span>';
             inner_html += '</div><div class="clearfix"></div></a>';
            return $( "<li>" )
            .append( inner_html )
            .appendTo( ul );
};
// .data( "ui-autocomplete" )._renderItem = function( ul, item ) {
// 	           // console.log(item);
// 	            var inner_html = "";
//                 inner_html = '<a><div class="list_item_container">';
// 	            inner_html += '<span class="media-description">' + (item.specialization) + '</span>';
// 	            inner_html += '</div><div class="clearfix"></div></a>';
 
// 	            return $( "<li class='media'></li>" )
// 	            .append(inner_html)
// 	            .appendTo( ul );
// 	        };
}
	        
if($("#affiliation").length > 0) {	        
  //affiliation
$("#affiliation").autocomplete(
        {
            	source: function(request, response) {
                    $.ajax({ 
                        'url': baseUrl+"search/affiliation",
                        'data': {
                        	 'searchuru': $("#affiliation").val(),
                             'limit':5
                        },
                        'dataType': "json",
                        'type': "POST",
                        'success': function(data){
                            response(data);
                            
                            //if not in the list clear value
                            if(0 == data.length) {
                            	
                            	 $("#affiliationId").val('');
                            	
                            }
                        }
                        
                    });
                }, 
	            minLength: 1,
	            focus: function( event, ui ) {
	                $("#affiliation").val(ui.item.affiliation);
	                return false;
	            },
	            select: function( event, ui ) {
	                $("#affiliation").val(ui.item.affiliation);
	                $("#affiliationId").val(ui.item.affiliation_id);
	                return false;
	            } 
	        }).data( "ui-autocomplete" )._renderItem = function( ul, item ) {
	
	            var inner_html = "";
	                      inner_html = '<a><div class="list_item_container">';
	            inner_html += '<span class="media-description">' + (item.affiliation) + '</span>';
	            inner_html += '</div><div class="clearfix"></div></a>';
	            return $( "<li class='media'></li>" )
	            .data( "item.autocomplete", item )
	            .append(inner_html)
	            .appendTo( ul );
	        };
	        
		}
	        
});
