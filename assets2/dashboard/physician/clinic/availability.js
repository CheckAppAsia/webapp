$(function() {

	$("#slider-range").slider({
		range: true,
		min: 0,
		max: 24,
		step: 1,
		values: [8, 12],
		slide: function( event, ui ) {
			$("#av_time").val(time_fixer(ui.values[0]) + ampm_fixer(ui.values[0]) + " - " + time_fixer(ui.values[1]) + ampm_fixer(ui.values[1]));
		}
	}).each(function() {
		//
		// Add labels to slider whose values 
		// are specified by min, max and whose
		// step is set to 1
		//

		// Get the options for this slider
		var opt = $(this).slider("option");
  
		// Get the number of possible values
		var vals = opt.max - opt.min;
  
		// Space out values
		for (var i = 0; i <= vals; i++) {
			var el = $('<label>'+(i)+'</label>').css('left',(i/vals*100)+'%');
			$("#slider-range").append(el);
		}
  
	});
	
	var t_min = $("#slider-range").slider("values", 0);
	var t_max = $("#slider-range").slider("values", 1);
	$("#av_time").val(time_fixer(t_min) + ampm_fixer(t_min) + " - " + time_fixer(t_max) + ampm_fixer(t_max));
	
	function time_fixer(time){
		if(time<=12)
			time = (time==12) ? 0 : time;
		else
			time = time - 12;
			
		return time;
	}
	
	function ampm_fixer(time){
		var ampm;
		if(time<=12)
			ampm = (time==12) ? "pm" : "am";
		else
			ampm = "pm";
			
		return ampm
	}

});