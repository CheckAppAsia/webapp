$(document).ready(function(){

	/* Unique ID generator */
	var guid = (function() {
		function s4() {
			return Math.floor((1 + Math.random()) * 0x10000)
			   .toString(16)
			   .substring(1);
	  }
	  return function() {
		return s4() + s4() + '-' + s4() + '-' + s4() + '-' +
			   s4() + '-' + s4() + s4() + s4();
	  };
	})();
	
	/* Add Question */
	$(".add-form").on('click',function(){
		type = $(".answer-option input:checked").attr("data-type");
		if(type=="yesno"){
			uniqueID = guid();
			$(".clone.form-item."+type).clone().appendTo(".form-item-list").removeClass("clone").find("input").attr("name",uniqueID).end().fadeIn();	
		}else{
			$(".clone.form-item."+type).clone().appendTo(".form-item-list").removeClass("clone").fadeIn();
		}
	});
	
	/* Remove Question */
	$(".form-item-list").on('click','.fa-times',function(){
		$(this).parent().parent().remove();
	});

});