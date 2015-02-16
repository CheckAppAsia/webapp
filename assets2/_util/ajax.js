function _ajax(action, params, callback, method){
	if(typeof method == "undefined"){ method="GET"; }
	$.ajax({
		type:method,
		url:baseUrl+action,
		data:params,
		success:function(response){
			callback(JSON.parse(response));
		}
	});
}